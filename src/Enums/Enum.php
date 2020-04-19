<?php

namespace Gricob\FunctionalTestBundle\Enums;

abstract class Enum
{
    private $value;

    private function __construct($value)
    {
        $this->value = $value;
    }

    public function raw()
    {
        return $this->value;
    }

    public static function __callStatic($name, $arguments)
    {
        $refClass = new \ReflectionClass(static::class);

        $value = $refClass->getConstant(strtoupper($name));

        return new static($value);
    }
}
