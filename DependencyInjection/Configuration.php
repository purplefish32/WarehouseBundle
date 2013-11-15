<?php

namespace AIOMedia\WarehouseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration for warehouse bundle
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('aiomedia_warehouse');
        
        $rootNode
            ->children()
                ->scalarNode('hash_method')
                    ->defaultValue('sha1')
                    ->validate()
                        ->ifNotInArray(array ('sha1'))
                            ->thenInvalid('Invalid hash method %s.')
                    ->end()
                ->end()
                ->scalarNode('root')
	                ->isRequired()
	                ->cannotBeEmpty()
                ->end()
                ->arrayNode('storage')
                    ->useAttributeAsKey('name')
                    ->prototype('scalar')->cannotBeEmpty()->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}