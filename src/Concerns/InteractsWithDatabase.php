<?php

namespace Gricob\FunctionalTestBundle\Concerns;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Tools\SchemaTool;
use Gricob\FunctionalTestBundle\Enums\Events;
use Gricob\FunctionalTestBundle\Event\SchemaEvent;
use Gricob\FunctionalTestBundle\Constraints\HasInDatabase;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Bridge\Doctrine\DataFixtures\ContainerAwareLoader;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\LogicalNot as ReverseConstraint;

trait InteractsWithDatabase
{
    /**
     * @var ObjectManager
     */
    protected $em;

    /**
     * @var ORMExecutor
     */
    protected $executor;

    /**
     * @var SchemaTool
     */
    protected $schemaTool;

    protected function setUpInteractsWithDatabase(): void
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();

        $this->executor = new ORMExecutor($this->em, new ORMPurger($this->em));

        $this->schemaTool = new SchemaTool($this->em);
    }

    protected function createDatabaseSchema(): void
    {
        $dispatcher = $this->getContainer()->get('event_dispatcher');
        $event = new SchemaEvent($this->em);

        $dispatcher->dispatch($event, Events::PRE_CREATE_SCHEMA);

        if ($event->isLoaded()) {
            return;
        }

        $this->schemaTool->createSchema($this->em->getMetadataFactory()->getAllMetadata());

        $dispatcher->dispatch($event, Events::POST_CREATE_SCHEMA);
    }

    protected function dropDatabaseSchema(): void
    {
        $this->schemaTool->dropDatabase();
    }

    protected function loadFixtures($fixtureClasses, $append = true): void
    {
        $loader = $this->getFixtureLoader($fixtureClasses);

        $this->executor->execute($loader->getFixtures(), $append);
    }

    protected function getFixtureLoader(array $fixtureClasses): Loader
    {
        $loader = new ContainerAwareLoader($this->getContainer());

        foreach ($fixtureClasses as $className) {
            $this->loadFixtureClass($loader, $className);
        }

        return $loader;
    }

    protected function loadFixtureClass(ContainerAwareLoader $loader, string $className): void
    {
        $fixture = null;

        if ($this->getContainer()->has($className)) {
            $fixture = $this->getContainer()->get($className);
        } else {
            $fixture = new $className();
        }

        if ($loader->hasFixture($fixture)) {
            unset($fixture);

            return;
        }

        $loader->addFixture($fixture);

        if ($fixture instanceof DependentFixtureInterface) {
            foreach ($fixture->getDependencies() as $dependency) {
                $this->loadFixtureClass($loader, $dependency);
            }
        }
    }

    protected function getReference(string $ref)
    {
        return $this->executor->getReferenceRepository()->getReference($ref);
    }

    protected function assertDatabaseHas(string $entityClass, array $data)
    {
        PHPUnit::assertThat($entityClass, new HasInDatabase($this->em, $data));
    }

    protected function assertDatabaseMissing(string $entityClass, array $data)
    {
        $constraint = new ReverseConstraint(
            new HasInDatabase($this->em, $data)
        );

        PHPUnit::assertThat($entityClass, $constraint);
    }

    abstract protected function getContainer(): Container;
}