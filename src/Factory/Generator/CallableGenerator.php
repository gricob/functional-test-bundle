<?php

namespace Gricob\FunctionalTestBundle\Factory\Generator;

use Gricob\FunctionalTestBundle\Factory\Factory;
use League\FactoryMuffin\Generators\GeneratorInterface;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class CallableGenerator implements GeneratorInterface
{
    /**
     * The kind of attribute that will be generated.
     *
     * @var callable
     */
    protected $kind;

    /**
     * The model instance.
     *
     * @var object
     */
    protected $model;

    /**
     * The factory muffin instance.
     *
     * @var Factory
     */
    protected $factory;

    public function __construct(callable $kind, $model, Factory $factory)
    {
        $this->kind = $kind;
        $this->model = $model;
        $this->factory = $factory;
    }

    /**
     * Generate, and return the attribute.
     *
     * The value returned is the result of calling the callable.
     *
     * @return mixed
     */
    public function generate()
    {
        return call_user_func($this->kind, $this->factory);
    }
}
