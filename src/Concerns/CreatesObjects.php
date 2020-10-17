<?php

namespace Gricob\FunctionalTestBundle\Concerns;

use Gricob\FunctionalTestBundle\Factory\Factory;
use Symfony\Component\DependencyInjection\Container;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
trait CreatesObjects
{
    protected function instance(string $entityClass, array $attributes = [], $states = [], int $times = null)
    {
        return $this->getFactory()->instance($entityClass, $attributes, $states, $times);
    }

    protected function create(string $entityClass, array $attributes = [], $states = [], int $times = null)
    {
        return $this->getFactory()->create($entityClass, $attributes, $states, $times);
    }

    private function getFactory(): Factory
    {
        return $this->getContainer()->get(Factory::class);
    }

    abstract public function getContainer(): Container;
}
