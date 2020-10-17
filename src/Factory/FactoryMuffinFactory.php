<?php

namespace Gricob\FunctionalTestBundle\Factory;

use Doctrine\ORM\EntityManagerInterface;
use Gricob\FunctionalTestBundle\Factory\Generator\GeneratorFactory;
use League\FactoryMuffin\FactoryMuffin;
use League\FactoryMuffin\Stores\RepositoryStore;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class FactoryMuffinFactory
{
    public function __invoke(EntityManagerInterface $entityManager, Factory $factory)
    {
        return new FactoryMuffin(new RepositoryStore($entityManager), new GeneratorFactory($factory));
    }
}
