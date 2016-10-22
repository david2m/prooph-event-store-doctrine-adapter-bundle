<?php
namespace David2M\Bundle\Prooph\EventStore\Adapter\DoctrineAdapterBundle\Tests\Integration;

use Prooph\EventStore\Adapter\Doctrine\DoctrineEventStoreAdapter;

class ContainerTest extends IntegrationTest
{

    /**
     * @test
     */
    public function it_should_return_the_default_doctrine_adapter_service()
    {
        $service = $this->container->get('prooph_event_store.doctrine_adapter.default');
        $this->assertInstanceOf(DoctrineEventStoreAdapter::class, $service);
    }

    /**
     * @test
     */
    public function it_should_return_the_remote_doctrine_adapter_service()
    {
        $service = $this->container->get('prooph_event_store.doctrine_adapter.remote');
        $this->assertInstanceOf(DoctrineEventStoreAdapter::class, $service);
    }

}