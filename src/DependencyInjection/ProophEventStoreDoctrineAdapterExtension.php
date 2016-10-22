<?php
namespace David2M\Bundle\Prooph\EventStore\Adapter\DoctrineAdapterBundle\DependencyInjection;

use Prooph\EventStore\Adapter\Doctrine\DoctrineEventStoreAdapter;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class ProophEventStoreDoctrineAdapterExtension extends ConfigurableExtension
{

    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $this->setAdapterDefinitions($mergedConfig['adapters'], $container);
    }

    /**
     * @param array $adapters
     * @param ContainerBuilder $container
     */
    private function setAdapterDefinitions(array $adapters, ContainerBuilder $container)
    {
        foreach ($adapters as $name => $options) {
            $this->setAdapterDefinition($name, $options, $container);
        }
    }

    /**
     * @param string $name
     * @param array $config
     * @param ContainerBuilder $container
     */
    private function setAdapterDefinition($name, array $config, ContainerBuilder $container)
    {
        $def = new Definition(DoctrineEventStoreAdapter::class);
        $def
            ->addArgument(new Reference($config['connection']))
            ->addArgument(new Reference($config['message_factory']))
            ->addArgument(new Reference($config['message_converter']))
            ->addArgument(new Reference($config['payload_serializer']))
            ->addArgument($config['stream_table_map'])
            ->addArgument($config['load_batch_size']);

        $container->setDefinition('prooph_event_store.doctrine_adapter.' . $name, $def);
    }

}