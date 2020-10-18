<?php

namespace Gricob\FunctionalTestBundle\Factory;

use Gricob\FunctionalTestBundle\Factory\Interfaces\StateInterface;

class State implements StateInterface
{
    private $name;

    private $definition;

    public function __construct(string $name, array $definition)
    {
        $this->name = $name;
        $this->definition = $definition;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDefinition(): array
    {
        return $this->definition;
    }
}
