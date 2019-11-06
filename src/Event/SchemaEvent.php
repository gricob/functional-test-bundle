<?php

namespace Gricob\FunctionalTestBundle\Event;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Contracts\EventDispatcher\Event;

class SchemaEvent extends Event
{
    private $objectManager;

    private $loaded = false;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager(): ObjectManager
    {
        return $this->objectManager;
    }

    public function isLoaded(): bool
    {
        return $this->loaded;
    }

    public function setLoaded(bool $loaded): void
    {
        $this->loaded = $loaded;
    }
}