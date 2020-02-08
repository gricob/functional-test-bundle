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
    protected static $factory = null;

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
        if (is_null(static::$factory)) {
            $container = $this->getContainer();
            $doctrine = $container->get('doctrine');

            if (!$doctrine) {
                throw new \LogicException('Doctrine is required to create objects.');
            }

            self::$factory = new FactoryMuffin(new RepositoryStore($doctrine->getManager()));

            self::$factory->loadFactories($container->getParameter('kernel.root_dir').'/factories');
        }

        return self::$factory;
    }

    abstract function getContainer(): Container;
}