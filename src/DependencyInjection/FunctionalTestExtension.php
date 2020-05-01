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

        $container->setParameter(
            'functional_test.unused_definitions',
            $config['unused_definitions']
        );

        $container->setParameter(
            'functional_test.sqlite.backup_file',
            $config['sqlite']['backup_file']
        );
    }
}
