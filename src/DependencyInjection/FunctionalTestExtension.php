<?php

namespace Gricob\FunctionalTestBundle\DependencyInjection;

use Gricob\FunctionalTestBundle\Event\SqLiteSubscriber;
use Gricob\FunctionalTestBundle\Factory\FactoryMuffinFactory;
use Gricob\FunctionalTestBundle\Factory\Registry;
use League\FactoryMuffin\FactoryMuffin;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Reference;

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

        $container->setParameter(
            'functional_test.factory_enabled',
            $config['factory']['enabled']
        );
    }
}
