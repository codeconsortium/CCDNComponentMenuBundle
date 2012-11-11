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

namespace CCDNComponent\MenuBundle\Component\MenuBuilder\Builder;

use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\ArrayNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\LinkNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\HtmlNode;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class MenuBuilder extends ArrayNode
{
	
	/**
	 *
	 * @access protected
	 */
	protected $router;
	
	/**
	 *
	 * @access protected
	 */
	protected $translator;

	/**
	 *
	 * @access public
	 * @param $router, $translator
	 */	
	public function __construct($router, $translator)
	{
		$this->router = $router;
		$this->translator = $translator;
		
		$this->nodes = array();
		$this->parent = $this;
	}

}
