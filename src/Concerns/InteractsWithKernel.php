<?php

namespace Gricob\FunctionalTestBundle\Concerns;

use Gricob\FunctionalTestBundle\Support\PriorityQueue;
use Symfony\Bundle\FrameworkBundle\Test\TestContainer;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\KernelInterface;

trait InteractsWithKernel
{
    /** @var array */
    private $kernelOptions = [
        'environment' => 'test'
    ];

    /** @var PriorityQueue */
    private $bootingKernelCallbacks;

    /** @var PriorityQueue */
    private $kernelBootedCallbacks;

    /** @var PriorityQueue */
    private $shuttingDownKernelCallbacks;

    /** @var PriorityQueue */
    private $kernelShuttedDownCallbacks;

    protected function setUpInteractsWithKernel()
    {
        $this->bootingKernelCallbacks = new PriorityQueue();
        $this->kernelBootedCallbacks = new PriorityQueue();
        $this->shuttingDownKernelCallbacks = new PriorityQueue();
        $this->kernelShuttedDownCallbacks = new PriorityQueue();
    }

    protected function getEnvironment(): string
    {
        return $this->kernelOptions['environment'];
    }

    protected function setEnvironment(string $env): self
    {
        $this->kernelOptions['environment'] = $env;

        if ($this->isKernelBooted() and static::$kernel->getEnvironment() != $env) {
            $this->bootTestKernel();
        }

        return $this;
    }

    protected function getKernel(): KernelInterface
    {
        return static::$kernel;
    }

    protected function getContainer(): Container
    {
        $this->ensureKernelBoot();

        return $this->getKernel()->getContainer();
    }

    protected function getTestContainer(): TestContainer
    {
        $this->ensureKernelBoot();

        return static::$container;
    }

    protected function ensureKernelBoot(): void
    {
        if (!$this->isKernelBooted()) {
            $this->bootTestKernel();
        }
    }

    protected function isKernelBooted(): bool
    {
        return self::$booted;
    }

    protected function getKernelOptions(): array
    {
        return $this->kernelOptions;
    }

    protected function bootTestKernel(array $options = [])
    {
        $this->shutDownKernel();

        $options = array_merge($this->kernelOptions, $options);

        foreach ($this->bootingKernelCallbacks as $callback) {
            $callback($options);
        }

        static::bootKernel($options);

        foreach ($this->kernelBootedCallbacks as $callback) {
            $callback();
        }
    }

    protected function shutDownKernel()
    {
        if (!$this->isKernelBooted()) {
            return;
        }

        foreach ($this->shuttingDownKernelCallbacks as $callback) {
            $callback();
        }

        $this->ensureKernelShutdown();

        foreach ($this->kernelShuttedDownCallbacks as $callback) {
            $callback();
        }
    }

    protected function addBootingKernelCallback(\Closure $callback, int $priority = 0)
    {
        $this->bootingKernelCallbacks->push($callback, $priority);
    }

    protected function addKernelBootedCallback(\Closure $callback, int $priority = 0)
    {
        $this->kernelBootedCallbacks->push($callback, $priority);
    }

    protected function addShuttingDownKernelCallback(\Closure $callback, int $priority = 0)
    {
        $this->shuttingDownKernelCallbacks->push($callback, $priority);
    }

    protected function addKernelShuttedDownCallback(\Closure $callback, int $priority = 0)
    {
        $this->kernelShuttedDownCallbacks->push($callback, $priority);
    }
}
