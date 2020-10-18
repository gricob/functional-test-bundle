<?php

namespace Gricob\FunctionalTestBundle\Factory;

use Gricob\FunctionalTestBundle\Factory\Interfaces\EntityFactoryInterface;
use League\FactoryMuffin\FactoryMuffin;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
abstract class AbstractEntityFactory implements EntityFactoryInterface
{
    private $factoryMuffin;

    /**
     * @var State[]
     */
    private $globalStates = [];

    /**
     * @var State[]
     */
    private $states = [];

    public function __construct(FactoryMuffin $factoryMuffin, array $globalStates = [])
    {
        $this->factoryMuffin = $factoryMuffin;

        foreach ($globalStates as $state) {
            $this->globalStates[$state->getName()] = $state;
        }

        $this->configure();
    }

    public function instance(array $attributes = [], $states = [], ?int $times = null)
    {
        return is_null($times)
            ? $this->factoryMuffin->instance(
                $this->getEntityClass(),
                $this->applyStates($attributes, $states)
            )
            : $this->seed($times, $attributes, $states, false);
    }

    public function create(array $attributes = [], $states = [], ?int $times = null)
    {
        return is_null($times)
            ? $this->factoryMuffin->create(
                $this->getEntityClass(),
                $this->applyStates($attributes, $states)
            )
            : $this->seed($times, $attributes, $states, true);
    }

    /**
     * @return State[]
     */
    public function getStates(): array
    {
        return [];
    }

    private function seed(int $times, array $attributes = [], $states = [], bool $save = true): array
    {
        return $this->factoryMuffin->seed(
            $times,
            $this->getEntityClass(),
            $this->applyStates($attributes, $states),
            $save
        );
    }

    /**
     * @param array $attributes
     * @param array|string $states
     * @return array
     */
    private function applyStates(array $attributes, $states): array
    {
        if (is_string($states)) {
            $states = [$states];
        }

        foreach ($states as $state) {
            if (key_exists($state, $this->globalStates)) {
                $attributes += $this->globalStates[$state]->getDefinition();
            }
        }

        foreach ($states as $state) {
            if (key_exists($state, $this->states)) {
                $attributes += $this->states[$state]->getDefinition();
            }
        }

        return $attributes;
    }

    private function configure()
    {
        $this->factoryMuffin
            ->define($this->getEntityClass())
            ->setDefinitions($this->getDefinition());

        foreach ($this->getStates() as $state) {
            $this->states[$state->getName()] = $state;
        }
    }
}
