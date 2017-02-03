<?php
namespace Netbull\Mpay24Bundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class NetbullMpay24Extension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->getDefinition('netbull.provider.mpay24')
            ->replaceArgument(0, $config['merchant_id'])
            ->replaceArgument(1, $config['soap_password'])
            ->replaceArgument(2, $config['test'])
            ->replaceArgument(3, $config['debug'])
            ->replaceArgument(4, $config['proxy_host'])
            ->replaceArgument(5, $config['proxy_port'])
            ->replaceArgument(6, $config['proxy_user'])
            ->replaceArgument(7, $config['proxy_pass'])
            ->replaceArgument(8, $config['verify_peer'])
            ->replaceArgument(9, $config['enable_curl_log'])
            ->replaceArgument(10, $config['spid'])
            ->replaceArgument(11, $config['flex_link_password'])
            ->replaceArgument(12, $config['flex_link_test_system'])
            ->replaceArgument(13, $config['log_file'])
            ->replaceArgument(14, $container->getParameter('kernel.logs_dir'))
            ->replaceArgument(15, $config['curl_log_file'])
        ;
    }
}
