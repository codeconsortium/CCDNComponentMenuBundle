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

namespace CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes;

use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\BaseRenderer;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class HtmlNodeRenderer extends BaseRenderer
{
	
	/**
	 *
	 * @access public
	 * @param $menu, $renderers, $container
	 * @return string
	 */
	public function render($menu, $renderers, $container)
	{
		$output = $menu->getHtml();
				
		return $output;
	}
		
}
