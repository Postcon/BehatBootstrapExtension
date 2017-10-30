<?php

namespace Behat\BootstrapExtension;

use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;

class Extension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        $builder
            ->children()
                ->scalarNode('bootstrap_file')->defaultNull()->end()
            ->end()
        ;
    }

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $bootstrapPath = $container->getParameter('bootstrap_extension.bootstrap_file');
        $bootstrapPath = $container->getParameterBag()->resolveValue($bootstrapPath);
        if ($bootstrapPath) {
            require_once($bootstrapPath);
        }
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'bootstrap_extension';
    }

    /**
     * @param ExtensionManager $extensionManager
     */
    public function initialize(ExtensionManager $extensionManager)
    {
    }

    /**
     * @param ContainerBuilder $container
     * @param array $config
     */
    public function load(ContainerBuilder $container, array $config)
    {
        $container->setParameter('bootstrap_extension.bootstrap_file', $config['bootstrap_file']);
    }
}
