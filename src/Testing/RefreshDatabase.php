<?php

namespace Gricob\FunctionalTestBundle\Testing;

use Doctrine\Bundle\DoctrineBundle\Registry;

trait RefreshDatabase
{
    /**
     * @var Registry
     */
    protected $registry;

    protected function setUpRefreshDatabase(): void
    {
        $this->createDatabaseSchema();
    }

    protected function tearDownRefreshDatabase(): void
    {
        $this->dropDatabaseSchema();
    }

    abstract protected function createDatabaseSchema(): void;

    abstract protected function dropDatabaseSchema(): void;
}