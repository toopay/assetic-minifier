<?php
namespace Minifier\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * Sets default values for the assetic filters names
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('minifier')
            ->children()
                ->arrayNode('filter')
                    ->children()
                        ->arrayNode('name')
                            ->children()
                                ->scalarNode('css')->defaultValue('minifier_css')->end()
                                ->scalarNode('js')->defaultValue('minifier_js')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
} 