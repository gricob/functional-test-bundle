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
        $container = $this->getContainer();
        $doctrine = $container->get('doctrine');

        if (!$doctrine) {
            throw new \LogicException('Doctrine is required to create objects.');
        }

        $this->factory = new FactoryMuffin(new RepositoryStore($doctrine->getManager()));

        $this->factory->loadFactories($container->getParameter('kernel.root_dir').'/factories');
    }

    protected function instance(string $entityClass, array $attributes = [])
    {
        return $this->factory->instance($entityClass, $attributes);
    }

    protected function create(string $entityClass, array $attributes = [])
    {
        return $this->factory->create($entityClass, $attributes);
    }

    protected function seed(string $entityClass, int $times, array $attributes = [])
    {
        return $this->factory->seed($times, $entityClass, $attributes);
    }

    abstract public function getContainer(): Container;
}
