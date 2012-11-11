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

namespace CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap;

use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\ArrayNodeRenderer;
use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\OrderedListNodeRenderer;
use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\UnorderedListNodeRenderer;
use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\LinkNodeRenderer;
use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\HtmlNodeRenderer;
use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\ButtonDropDownNodeRenderer;
use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\ButtonDropDownDividerNodeRenderer;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class TwitterBootstrapRenderer
{
	
	/**
	 *
	 * @access protected
	 */
	protected $nodeRenderers;
	
	/**
	 *
	 * @access public
	 */
	public function __construct()
	{
		$this->nodeRenderers = array(
			'arrayNode' => new ArrayNodeRenderer(),
			'orderedListNode' => new OrderedListNodeRenderer(),
			'unorderedListNode' => new UnorderedListNodeRenderer(),
			'linkNode' => new LinkNodeRenderer(),
			'htmlNode' => new HtmlNodeRenderer(),
			'buttonDropDownNode' => new ButtonDropDownNodeRenderer(),
			'buttonDropDownDividerNode' => new ButtonDropDownDividerNodeRenderer(),
		);
	}
	
	/**
	 *
	 * @access public
	 * @param $menu, array $options, $container
	 * @return string
	 */
	public function render($menu, array $options = array(), $container)
	{
		if (is_object($menu))
		{
			// Pass the chain of nodeRenderers to the menu so it can render itself.
			return $menu->render($this->nodeRenderers, $container);
						
		} else {
			throw new \Exception('Invalid menu type!');
		}
		
		return $html;
	}
	
}