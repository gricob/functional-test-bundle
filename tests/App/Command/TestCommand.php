<?php

namespace Tests\App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class TestCommand extends Command
{
    protected static $defaultName = 'test:command';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->hasParameterOption('shouldFail')) {
            throw new Exception('Test command failed');
        }

        $output->writeln('Hello from test:command');

        if ($input->hasParameterOption('shouldAsk')) {
            $helper = $this->getHelper('question');

            $response = $helper->ask($input, $output, new Question('What are you doing?'));

            $output->writeln('You are ' . $response);
        }

        return Command::SUCCESS;
    }
}