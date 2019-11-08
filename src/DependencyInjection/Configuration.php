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

        $this->getConfigOptimization($treeBuilder->getRootNode());

        return $treeBuilder;
    }

    private function getConfigOptimization(ArrayNodeDefinition $root)
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
