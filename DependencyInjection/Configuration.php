<?php

namespace RonteLtd\Zmq\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ronte-zmq');

        $rootNode
            ->children()
                ->scalarNode('type')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('url')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
