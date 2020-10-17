<?php

namespace Gricob\FunctionalTestBundle\Factory\Interfaces;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
interface EntityFactoryInterface
{
    public function getEntityClass(): string;

    public function getDefinition(): array;

    public function instance(array $attributes = [], $states = [], ?int $times = null);

    public function create(array $attributes = [], $states = [], ?int $times = null);

    /**
     * @return StateInterface[]
     */
    public function getStates(): array;
}
