<?php

namespace Gricob\FunctionalTestBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const DEFAULT_FACTORIES_DIR = '%kernel.root_dir%/factories';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('functional_test');
        $root = $treeBuilder->getRootNode()->addDefaultsIfNotSet();

        $this->getBaseConfig($root);
        $this->getSqliteConfig($root);

        return $treeBuilder;
    }

    private function getBaseConfig(ArrayNodeDefinition $root)
    {
        $root
            ->children()
                ->arrayNode('unused_definitions')
                    ->scalarPrototype()->end()
                ->end()
                ->scalarNode('factories_dir')->defaultValue(self::DEFAULT_FACTORIES_DIR)
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
}
