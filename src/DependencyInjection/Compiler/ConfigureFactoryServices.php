<?php

namespace Gricob\FunctionalTestBundle\DependencyInjection\Compiler;

use Gricob\FunctionalTestBundle\Factory\Factory;
use Gricob\FunctionalTestBundle\Factory\FactoryMuffinFactory;
use Gricob\FunctionalTestBundle\Factory\Registry;
use League\FactoryMuffin\FactoryMuffin;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Gerard Rico <grico@wearemarketing.com>
 */
class ConfigureFactoryServices implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->getParameter('functional_test.factory_enabled')) {
            return;
        }

        $factory = new Definition(FactoryMuffinFactory::class);

        $factoryMuffinDefinition = new Definition(FactoryMuffin::class);
        $factoryMuffinDefinition->setFactory(new Reference(FactoryMuffinFactory::class));
        $factoryMuffinDefinition->setArguments([
            new Reference('doctrine.orm.default_entity_manager'),
            new Reference(Factory::class),
        ]);

        $registryDefinition = new Definition(Registry::class);

        $globalStates = [];
        $globalStateTags = $container->findTaggedServiceIds('functional_test.state');
        foreach ($globalStateTags as $id => $_) {
            $globalStates[] = new Reference($id);
        }

        $factoryTags = $container->findTaggedServiceIds('functional_test.factory');

        /** @var Definition $factory */
        foreach ($factoryTags as $id => $_) {
            $container->getDefinition($id)->setArguments([
                new Reference(FactoryMuffin::class),
                $globalStates
            ]);

            $registryDefinition->addMethodCall('registerFactory', [new Reference($id)]);
        }

        $factoryDefinition = new Definition(Factory::class);
        $factoryDefinition->setPublic(true);
        $factoryDefinition->setArguments([
            new Reference(Registry::class),
        ]);

        $container->setDefinition(FactoryMuffinFactory::class, $factory);
        $container->setDefinition(FactoryMuffin::class, $factoryMuffinDefinition);
        $container->setDefinition(Registry::class, $registryDefinition);
        $container->setDefinition(Factory::class, $factoryDefinition);
    }
}
