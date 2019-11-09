<?php

namespace Gricob\FunctionalTestBundle\Testing;

use Gricob\FunctionalTestBundle\Concerns\InteractsWithConsole;
use Gricob\FunctionalTestBundle\Concerns\InteractsWithDatabase;
use Gricob\FunctionalTestBundle\Concerns\MakesHttpRequests;
use Symfony\Bundle\FrameworkBundle\Test\TestContainer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;
use Symfony\Component\DependencyInjection\Container;

class FunctionalTestCase extends BaseWebTestCase
{
    use MakesHttpRequests,
        InteractsWithDatabase,
        InteractsWithConsole;

    /**
     * @var array
     */
    private $kernelOptions = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpTraits();
    }

    protected function tearDown(): void
    {
        $this->tearDownTraits();

        parent::tearDown();
    }

    protected function setUpTraits(): void
    {
        $traits = $this->getUsedTraits();

        if (isset($traits[InteractsWithDatabase::class]) and isset($traits[RefreshDatabase::class])) {
            $this->setUpInteractsWithDatabase();
            $this->setUpRefreshDatabase();

            unset($traits[InteractsWithDatabase::class]);
            unset($traits[RefreshDatabase::class]);
        }

        foreach ($traits as $trait) {
            $traitName = ($aux = explode('\\', $trait))[count($aux) - 1];

            $setUpMethod = 'setUp' . ucfirst($traitName);

            if (method_exists($this, $setUpMethod)) {
                $this->{$setUpMethod}();
            }
        }
    }

    protected function tearDownTraits(): void
    {
        foreach ($this->getUsedTraits() as $trait) {
            $traitName = ($aux = explode('\\', $trait))[count($aux) - 1];

            $setUpMethod = 'tearDown' . ucfirst($traitName);

            if (method_exists($this, $setUpMethod)) {
                $this->{$setUpMethod}();
            }
        }
    }

    protected function getUsedTraits(): array
    {
        $traits = [];

        $class = static::class;

        do {
            $traits = array_merge($traits, class_uses($class));
        } while ($class = get_parent_class($class));

        $traits = array_combine($traits, $traits);

        return array_reverse($traits);
    }

    protected function getEnvironment(): string
    {
        return $this->kernelOptions['environment'] ?? 'test';
    }

    protected function setEnvironment(string $env): self
    {
        if (static::$kernel->getEnvironment() != $env) {
            $this->ensureKernelShutdown();
        }

        $this->kernelOptions['environment'] = $env;

        return $this;
    }

    protected function getContainer(): Container
    {
        $this->ensureKernelBoot();

        return static::$kernel->getContainer();
    }

    protected function getTestContainer(): TestContainer
    {
        $this->ensureKernelBoot();

        return static::$container;
    }

    protected function ensureKernelBoot()
    {
        if (!static::$container) {
            $this->bootKernel($this->getKernelOptions());
        }
    }

    protected function getKernelOptions(): array
    {
        return $this->kernelOptions;
    }
}
