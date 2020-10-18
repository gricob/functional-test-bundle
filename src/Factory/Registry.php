<?php

namespace Gricob\FunctionalTestBundle\Factory;

use Gricob\FunctionalTestBundle\Exceptions\FactoryNotFoundException;
use Gricob\FunctionalTestBundle\Factory\Interfaces\EntityFactoryInterface;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class Registry
{
    private $factories = [];

    /**
     * @param string $entityClass
     *
     * @return EntityFactoryInterface
     *
     * @throws FactoryNotFoundException
     */
    public function getFactory(string $entityClass): EntityFactoryInterface
    {
        if (!key_exists($entityClass, $this->factories)) {
            throw new FactoryNotFoundException($entityClass);
        }

        return $this->factories[$entityClass];
    }

    public function registerFactory(EntityFactoryInterface $factory)
    {
        $this->factories[$factory->getEntityClass()] = $factory;
    }
}
