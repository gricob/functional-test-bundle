<?php

namespace Gricob\FunctionalTestBundle\Event;

use Gricob\FunctionalTestBundle\Enums\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SqLiteSubscriber implements EventSubscriberInterface
{
    private $backupFile;

    public function __construct(string $backupFile)
    {
        $this->backupFile = $backupFile;
    }

    public function onPreCreateSchema(SchemaEvent $event)
    {
        if (@copy($this->backupFile, $this->getDatabaseFile($event))) {
            $event->setLoaded(true);
        }
    }

    public function onPostCreateSchema(SchemaEvent $event)
    {
        @copy($this->getDatabaseFile($event), $this->backupFile);
    }

    private function getDatabaseFile(SchemaEvent $event)
    {
        return $event->getObjectManager()->getConnection()->getDatabase();
    }

    public static function getSubscribedEvents()
    {
        return [
            Events::PRE_CREATE_SCHEMA => ['onPreCreateSchema'],
            Events::POST_CREATE_SCHEMA => ['onPostCreateSchema']
        ];
    }
}
