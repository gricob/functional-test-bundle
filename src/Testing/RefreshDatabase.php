<?php

namespace Gricob\FunctionalTestBundle\Testing;

trait RefreshDatabase
{
    protected function setUpRefreshDatabase(): void
    {
        $this->createDatabaseSchema();
    }

    abstract protected function createDatabaseSchema(): void;
}