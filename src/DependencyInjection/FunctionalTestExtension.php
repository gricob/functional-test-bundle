<?php

namespace Gricob\FunctionalTestBundle\DependencyInjection;

use Gricob\FunctionalTestBundle\Event\SqLiteSubscriber;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class FunctionalTestExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        if ($config['optimization']['database']['use_cache']) {
            $container->register(SqLiteSubscriber::class)
                ->setArguments([$config['optimization']['database']['cache_dir']])
                ->addTag('kernel.event_subscriber');
        }
    }
}
