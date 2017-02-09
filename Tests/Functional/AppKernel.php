<?php

namespace RonteLtd\Zmq\Tests\Functional;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \RonteLtd\Zmq\RonteZmqBundle(),
            new \RonteLtd\Zmq\Tests\Functional\TestBundle\TestBundle(),
        ];

        return $bundles;
    }

    public function getCacheDir()
    {
        return sys_get_temp_dir().'/RonteLtdZmq/';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.yml');
    }
}
