<?php

namespace Gricob\FunctionalTestBundle\Concerns;

use Gricob\FunctionalTestBundle\Enums\VerbosityLevel;
use Gricob\FunctionalTestBundle\Testing\CommandResult;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\ContainerInterface;

trait InteractsWithConsole
{
    protected ?VerbosityLevel $verbosityLevel = null;

    protected bool $decorated = false;

    protected function runCommand(string $name, array $parameters = [], array $inputs = null): CommandResult
    {
        $application = new Application(static::getContainer()->get('kernel'));

        $command = $application->find($name);

        $commandTester = new CommandTester($command);

        $options = [
            'interactive' => false,
            'decorated' => $this->isDecorated(),
            'verbosity' => $this->getVerbosityLevel()->raw()
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

    public function getVerbosityLevel(): VerbosityLevel
    {
        return $this->verbosityLevel ?: VerbosityLevel::normal();
    }

    public function setVerbosityLevel(VerbosityLevel $verbosityLevel): self
    {
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

    abstract protected static function getContainer(): ContainerInterface;
}
