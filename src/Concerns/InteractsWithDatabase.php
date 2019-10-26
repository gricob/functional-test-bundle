<?php

namespace Gricob\SymfonyWebTestBundle\Concerns;

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Component\DependencyInjection\Container;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Bridge\Doctrine\DataFixtures\ContainerAwareLoader;

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

    protected function setUpInteractsWithDatabase()
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();

        $this->executor = new ORMExecutor($this->em, new ORMPurger($this->em));
    }

    protected function createDatabaseSchema(): void
    {
        $metadatas = $this->em->getMetadataFactory()->getAllMetadata();

        $this->schemaTool = new SchemaTool($this->em);
        $this->schemaTool->createSchema($metadatas);
    }

    protected function dropDatabaseSchema(): void
    {
        $this->schemaTool->dropDatabase();
    }

    protected function loadFixtures($fixtureClasses): void
    {
        $loader = $this->getFixtureLoader($fixtureClasses);

        $this->executor->execute($loader->getFixtures());
    }

    protected function getFixtureLoader(array $fixtureClasses)
    {
        $loader = new ContainerAwareLoader($this->getContainer());

        foreach ($fixtureClasses as $className) {
            $this->loadFixtureClass($loader, $className);
        }

        return $loader;
    }

    protected function loadFixtureClass(ContainerAwareLoader $loader, string $className)
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

    protected function getReference(string $ref): object
    {
        return $this->executor->getReferenceRepository()->getReference($ref);
    }

    abstract protected function getContainer(): Container;
}