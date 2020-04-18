<?php

namespace Gricob\FunctionalTestBundle\Testing;

use Gricob\FunctionalTestBundle\Concerns\InteractsWithConsole;
use Gricob\FunctionalTestBundle\Concerns\InteractsWithDatabase;
use Gricob\FunctionalTestBundle\Concerns\InteractsWithKernel;
use Gricob\FunctionalTestBundle\Concerns\MakesHttpRequests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

class FunctionalTestCase extends BaseWebTestCase
{
    use MakesHttpRequests,
        InteractsWithDatabase,
        InteractsWithConsole,
        InteractsWithKernel;

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
        $this->setUpInteractsWithKernel();

        $this->forwardToTraits('setUp', [
            InteractsWithKernel::class
        ]);
    }

    protected function tearDownTraits(): void
    {
        $this->forwardToTraits('tearDown');
    }

    protected function forwardToTraits(string $method, array $ignoreTraits = []): void
    {
        foreach ($this->getUsedTraits($ignoreTraits) as $trait) {
            $traitName = ($aux = explode('\\', $trait))[count($aux) - 1];

            $setUpMethod = $method . ucfirst($traitName);

            if (method_exists($this, $setUpMethod)) {
                $this->{$setUpMethod}();
            }
        }
    }

    protected function getUsedTraits(array $ignore = []): array
    {
        $traits = [];

        $class = static::class;

        do {
            $traits = array_merge($traits, class_uses($class));
        } while ($class = get_parent_class($class));

        $traits = array_combine($traits, $traits);

        $traits = array_filter($traits, function ($trait) use ($ignore) {
            return !in_array($trait, $ignore);
        });

        return array_reverse($traits);
    }
}
