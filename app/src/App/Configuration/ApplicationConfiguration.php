<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 18/02/17
 * Time: 07:26
 */

namespace App\Configuration;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class ApplicationConfiguration implements ConfigurationInterface
{
    const ROOT_NODE = 'configuration';


    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root(static::ROOT_NODE);

        // TODO add configuration

        return $treeBuilder;
    }
}