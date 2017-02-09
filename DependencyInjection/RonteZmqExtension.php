<?php

namespace RonteLtd\Zmq\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class RonteZmqExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        return new Configuration();
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $type = $config['type'];
        if (
            ($type === '0' || (int)$type)
            && (int)$type < 12
            && (int)$type > -1
        ) {
            $type = (int)$type;
        } elseif (
            defined($type)
            && is_int(constant($type))
            && constant($type) < 12
            && constant($type) > -1
        ) {
            $type = constant($type);
        }
        $container->getDefinition('ronte-zmq.client')
            ->setArguments([$type, $config['url']]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'ronte-zmq';
    }
}
