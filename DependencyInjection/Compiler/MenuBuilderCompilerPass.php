<?php

/*
 * This file is part of the CCDNComponent MenuBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\MenuBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class MenuBuilderCompilerPass implements CompilerPassInterface
{

    /**
     *
     * @access public
 	 * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('ccdn_component_menu.component.menu_builder.chain')) {
            return;
        }

        $definition = $container->getDefinition('ccdn_component_menu.component.menu_builder.chain');

        foreach ($container->findTaggedServiceIds('ccdn_component_menu.menu_builder') as $id => $attributes) {
            $definition->addMethodCall('addMenu', array(new Reference($id)));
        }
    }

}
