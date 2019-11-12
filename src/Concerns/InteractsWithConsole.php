<?php

namespace Gricob\FunctionalTestBundle\Concerns;

use Gricob\FunctionalTestBundle\Enums\VerbosityLevel;
use Gricob\FunctionalTestBundle\Testing\CommandResult;
use OutOfBoundsException;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\Container;

trait InteractsWithConsole
{
    /**
     * @var int
     */
    protected $verbosityLevel = VerbosityLevel::NORMAL;

    /**
     * @var bool
     */
    protected $decorated = false;

    protected function runCommand(string $name, array $parameters = [], array $inputs = null): CommandResult
    {
        $this->ensureKernelBoot();

        $application = new Application($this->getContainer()->get('kernel'));

        $command = $application->find($name);

        $commandTester = new CommandTester($command);

        $options = [
            'interactive' => false,
            'decorated' => $this->isDecorated(),
            'verbosity' => $this->getVerbosityLevel()
        ];

        if (!is_null($inputs)) {
            $commandTester->setInputs($inputs);
            $options['interactive'] = true;
        }

        $commandTester->execute(
            array_merge(['command' => $command->getName()], $parameters),
            $options
        );

        return CommandResult::fromCommandTester($commandTester);
    }

    public function getVerbosityLevel(): int
    {
        return $this->verbosityLevel;
    }

    public function setVerbosityLevel(int $verbosityLevel): self
    {
        if (!VerbosityLevel::isValid($verbosityLevel)) {
            throw new OutOfBoundsException(
                "The verbosity level [$verbosityLevel] is invalid. 
                Use VerbosityLevel class constants to prevent invalid verbosity level"
            );
        }

        $this->verbosityLevel = $verbosityLevel;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDecorated(): bool
    {
        return $this->decorated;
    }

    /**
     * @param bool $decorated
     */
    public function setDecorated(bool $decorated): void
    {
        $this->decorated = $decorated;
    }

    abstract function getContainer(): Container;

    abstract function ensureKernelBoot(): void;
}