<?php

namespace AIOMedia\WarehouseBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Loads configuration for music bundle
 */
class AIOMediaWarehouseExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->loadParameters($container);
        $this->loadServices($container);
        
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $container->setParameter('aiomedia_warehouse', $config);
        
        $container->getDefinition('aiomedia_warehouse.manager.warehouse')
                  ->addMethodCall('setConfig', array ($container->getParameter('aiomedia_warehouse')));
        
        return $this;
    }
    
    protected function loadServices(ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/services'));
        $loader->load('managers.yml');
        $loader->load('twig.yml');
        
        return $this;
    }
    
    protected function loadParameters(ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parameters.yml');
        
        return $this;
    }
}