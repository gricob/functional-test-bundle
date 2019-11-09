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
        $this->getOptimizationConfig($root);

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

    private function getOptimizationConfig(ArrayNodeDefinition $root)
    {
        $root
            ->children()
                ->arrayNode('optimization')->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('database')->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('use_cache')->defaultTrue()->end()
                                ->scalarNode('cache_dir')
                                    ->defaultValue('%kernel.cache_dir%/backup.db')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
