<?php

namespace Tests\App;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Gricob\FunctionalTestBundle\FunctionalTestBundle;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new MonologBundle(),
            new TwigBundle(),
            new SecurityBundle(),
            new DoctrineBundle(),
            new FunctionalTestBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');

        if ($this->getEnvironment() == 'prevent_remove_unused_definitions') {
            $loader->load(__DIR__ . '/config/prevent_remove_unused_definitions.yml');
        }
    }
}