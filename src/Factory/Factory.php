<?php

namespace Gricob\FunctionalTestBundle\Factory;

use Gricob\FunctionalTestBundle\Factory\Interfaces\EntityFactoryInterface;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class Factory
{
    private $registry;

    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    public function instance(string $entityClass, array $attributes = [], $states = [], ?int $times = null)
    {
        return $this->getFactory($entityClass)->instance($attributes, $states, $times);
    }

    public function create(string $entityClass, array $attributes = [], $states = [], ?int $times = null)
    {
        return $this->getFactory($entityClass)->create($attributes, $states, $times);
    }

    private function getFactory(string $entityClass): EntityFactoryInterface
    {
        return $this->registry->getFactory($entityClass);
    }
}
