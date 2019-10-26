<?php

namespace Gricob\SymfonyWebTestBundle\Testing;

use Symfony\Component\DependencyInjection\Container;
use Gricob\SymfonyWebTestBundle\Concerns\MakesHttpRequests;
use Gricob\SymfonyWebTestBundle\Concerns\InteractsWithDatabase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

class WebTestCase extends BaseWebTestCase
{
    use MakesHttpRequests,
        InteractsWithDatabase;

    /**
     * @var array
     */
    private $kernelOptions = [];

    /**
     * @var Container[]
     */
    private $containers;

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
        foreach($this->getUsedTraits() as $trait) {
            $traitName = ($aux = explode('\\', $trait))[count($aux) - 1];

            $setUpMethod = 'setUp' . ucfirst($traitName);

            if(method_exists($this, $setUpMethod)) {
                $this->{$setUpMethod}();
            }
        }
    }

    protected function tearDownTraits(): void
    {
        foreach($this->getUsedTraits() as $trait) {
            $traitName = ($aux = explode('\\', $trait))[count($aux) - 1];

            $setUpMethod = 'tearDown' . ucfirst($traitName);

            if(method_exists($this, $setUpMethod)) {
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
        } while($class = get_parent_class($class));

        return array_reverse($traits);
    }

    protected function getEnvironment(): string
    {
        return $this->kernelOptions['environment'] ?? 'test';
    }

    protected function setEnvironment(string $env): self
    {
        $this->kernelOptions['environment'] = $env;

        return $this;
    }

    protected function getContainer(): Container
    {
        $env = $this->getEnvironment();

        if(!isset($this->containers[$env])) {
            $kernel = $this->bootKernel($this->getKernelOptions());

            $this->containers[$env] = $kernel->getContainer();
        }

        return $this->containers[$env];
    }

    protected function getKernelOptions(): array
    {
        return $this->kernelOptions;
    }
}