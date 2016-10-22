<?php
namespace David2M\Bundle\Prooph\EventStore\Adapter\DoctrineAdapterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('prooph_event_store_doctrine_adapter');

        $rootNode
            ->children()
                ->arrayNode('adapters')
                    ->isRequired()
                    ->prototype('array')
                        ->children()
                            ->scalarNode('connection')
                                ->isRequired()
                            ->end()
                            ->scalarNode('message_factory')
                                ->defaultValue('prooph_event_store.message_factory')
                            ->end()
                            ->scalarNode('message_converter')
                                ->defaultValue('prooph_event_store.message_converter')
                            ->end()
                            ->scalarNode('payload_serializer')
                                ->defaultValue('prooph_event_store.payload_serializer')
                            ->end()
                            ->arrayNode('stream_table_map')
                                ->prototype('scalar')->end()
                            ->end()
                            ->integerNode('load_batch_size')
                                ->defaultValue(1000)
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }

}