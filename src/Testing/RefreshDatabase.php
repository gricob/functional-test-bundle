<?php

namespace Gricob\FunctionalTestBundle\Testing;

trait RefreshDatabase
{
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