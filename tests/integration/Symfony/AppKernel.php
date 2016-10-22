<?php
namespace David2M\Bundle\Prooph\EventStore\Adapter\DoctrineAdapterBundle\Tests\Integration\Symfony;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{

    public function registerBundles()
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Prooph\Bundle\EventStore\ProophEventStoreBundle(),
            new \David2M\Bundle\Prooph\EventStore\Adapter\DoctrineAdapterBundle\ProophEventStoreDoctrineAdapterBundle()
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }

}