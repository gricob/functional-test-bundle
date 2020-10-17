<?php

namespace Gricob\FunctionalTestBundle\Factory\Generator;

use Gricob\FunctionalTestBundle\Factory\Factory;
use League\FactoryMuffin\FactoryMuffin;
use League\FactoryMuffin\Generators\EntityGenerator;
use League\FactoryMuffin\Generators\FactoryGenerator;
use League\FactoryMuffin\Generators\GeneratorFactory as BaseGeneratorFactory;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class GeneratorFactory extends BaseGeneratorFactory
{
    /**
     * @var Factory
     */
    private $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function make($kind, $model, FactoryMuffin $factoryMuffin)
    {
        if (is_callable($kind)) {
            return new CallableGenerator($kind, $model, $this->factory);
        }

        if (is_string($kind) && strpos($kind, EntityGenerator::getPrefix()) === 0) {
            return new EntityGenerator($kind, $model, $factoryMuffin);
        }

        if (is_string($kind) && strpos($kind, FactoryGenerator::getPrefix()) === 0) {
            return new FactoryGenerator($kind, $model, $factoryMuffin);
        }
    }
}
