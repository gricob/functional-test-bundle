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

        $constantName = strtoupper($name);

        if (!$refClass->hasConstant($constantName)) {
            throw new \Exception($name.'is not a valid value of '.static::class);
        }

        $value = $refClass->getConstant($constantName);

        return new static($value);
    }
}
