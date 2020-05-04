<?php

namespace Gricob\FunctionalTestBundle\Testing;

use PHPUnit\Framework\Assert as PHPUnit;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @mixin CommandTester
 */
class CommandResult
{
    protected $commandTester;

    protected function __construct(CommandTester $commandTester)
    {
        $this->commandTester = $commandTester;
    }

    public static function fromCommandTester(CommandTester $commandTester)
    {
        return new CommandResult($commandTester);
    }

    public function assertOk(): self
    {
        $statusCode = $this->commandTester->getStatusCode();

        PHPUnit::assertEquals(
            0,
            $statusCode,
            "Command status code [$statusCode] is not a success status code."
        );

        return $this;
    }

    public function assertSee(string $needle): self
    {
        PHPUnit::assertContains(
            $needle,
            $this->commandTester->getDisplay()
        );

        return $this;
    }

    public function __call($name, $arguments)
    {
        return $this->commandTester->{$name}(...$arguments);
    }
}