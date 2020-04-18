<?php

namespace Gricob\FunctionalTestBundle\Concerns;

use League\FactoryMuffin\FactoryMuffin;
use League\FactoryMuffin\Stores\RepositoryStore;
use Symfony\Component\DependencyInjection\Container;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
trait CreatesObjects
{
    /**
     * @var FactoryMuffin
     */
    protected $factory = null;

    public function setUpCreatesObjects()
    {
        $this->addKernelBootedCallback(function () {
            $container = $this->getContainer();
            $doctrine = $container->get('doctrine');

            if (!$doctrine) {
                throw new \LogicException('Doctrine is required to create objects.');
            }

            $this->factory = new FactoryMuffin(new RepositoryStore($doctrine->getManager()));

            $this->factory->loadFactories($container->getParameter('kernel.root_dir').'/factories');
        }, 50);
    }

    protected function instance(string $entityClass, array $attributes = [])
    {
        return $this->getFactory()->instance($entityClass, $attributes);
    }

    protected function create(string $entityClass, array $attributes = [])
    {
        return $this->getFactory()->create($entityClass, $attributes);
    }

    protected function seed(string $entityClass, int $times, array $attributes = [])
    {
        return $this->getFactory()->seed($times, $entityClass, $attributes);
    }

    protected function getFactory(): FactoryMuffin
    {
        $this->ensureKernelBoot();

        return $this->factory;
    }

    abstract public function getContainer(): Container;

    abstract protected function addKernelBootedCallback(\Closure $callback, int $priority);
}
