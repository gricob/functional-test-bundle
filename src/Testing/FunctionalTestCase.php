<?php

namespace Gricob\FunctionalTestBundle\Testing;

use Gricob\FunctionalTestBundle\Concerns\InteractsWithDatabase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FunctionalTestCase extends KernelTestCase
{
    private static array $kernelOptions = [];

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
        if (static::$booted and static::$kernel->getEnvironment() != $env) {
            $this->ensureKernelShutdown();
        }

        static::$kernelOptions['environment'] = $env;

        return $this;
    }

    protected static function getContainer(): ContainerInterface
    {
        if (!static::$booted) {
            static::bootKernel(static::$kernelOptions);
        }

        return parent::getContainer();
    }
}
