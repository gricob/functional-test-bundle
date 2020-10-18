<?php

namespace Gricob\FunctionalTestBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('functional_test');
        $root = $treeBuilder->getRootNode()->addDefaultsIfNotSet();

        $this->getBaseConfig($root);
        $this->getSqliteConfig($root);
        $this->getFactoryConfig($root);

        return $treeBuilder;
    }

    private function getBaseConfig(ArrayNodeDefinition $root)
    {
        $root
            ->children()
                ->arrayNode('unused_definitions')
                    ->scalarPrototype()->end()
                ->end()
            ->end();
    }

    private function getSqliteConfig(ArrayNodeDefinition $root)
    {
        $root
            ->children()
                ->arrayNode('sqlite')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('backup_file')->defaultValue('%kernel.cache_dir%/backup.db')
                    ->end()
                ->end()
            ->end();
    }

    private function getFactoryConfig(ArrayNodeDefinition $root)
    {
        $root
            ->children()
                ->arrayNode('factory')
                    ->canBeEnabled()
                ->end()
            ->end();
    }
}
