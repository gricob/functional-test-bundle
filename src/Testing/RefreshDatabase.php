<?php

namespace Gricob\FunctionalTestBundle\Testing;

trait RefreshDatabase
{
    protected function setUpRefreshDatabase(): void
    {
        $this->addKernelBootedCallback(function () {
            $this->createDatabaseSchema();
        }, 80);
    }

    abstract protected function createDatabaseSchema(): void;

    abstract protected function addKernelBootedCallback(\Closure $callback, int $priority);
}