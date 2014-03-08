<?php
namespace Minifier\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class MinifierExtension
 *
 * Passes the (overwritten) configuration to the DI container and loads the filter definitions
 */
class MinifierExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('minifier', $config);
        $container->setParameter('minifier.filter.name.css', $config['filter']['name']['css']);
        $container->setParameter('minifier.filter.name.js', $config['filter']['name']['js']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
} 