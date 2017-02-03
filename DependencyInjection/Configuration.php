<?php
namespace Netbull\Mpay24Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('netbull_mpay24');

        $rootNode
            ->children()
                ->scalarNode('merchant_id')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->validate()
                        ->ifTrue(function ( $merchantId ) {
                            return preg_match('/^(7|9)\d{4}$/', $merchantId) !== 1;
                        })
                        ->thenInvalid('The merchant ID you have given is wrong, it must be 5-digit number and starts with 7 or 9!')
                    ->end()
                ->end()
                ->scalarNode('soap_password')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('test')->defaultFalse()->end()
                ->scalarNode('debug')->defaultFalse()->end()
                ->scalarNode('proxy_host')->defaultNull()->end()
                ->scalarNode('proxy_port')
                    ->defaultNull()
                    ->validate()
                        ->ifTrue(function ( $proxyPort ) {
                            return preg_match('/^d{4}$/', $proxyPort) !== 1;
                        })
                        ->thenInvalid('The proxy port you have given must be numeric!')
                    ->end()
                ->end()
                ->scalarNode('proxy_user')->defaultNull()->end()
                ->scalarNode('proxy_pass')->defaultNull()->end()
                ->scalarNode('verify_peer')->defaultTrue()->end()
                ->scalarNode('enable_curl_log')->defaultFalse()->end()
                ->scalarNode('spid')->defaultValue('abcdefghjklmnop')->end()
                ->scalarNode('flex_link_password')->defaultValue('**********')->end()
                ->scalarNode('flex_link_test_system')->defaultTrue()->end()
                ->scalarNode('log_file')->defaultValue('netbull_mpay24.log')->end()
                ->scalarNode('log_path')->defaultNull()->end()
                ->scalarNode('curl_log_file')->defaultValue('netbull_mpay24_curl.log')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
