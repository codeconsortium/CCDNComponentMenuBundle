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

namespace CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes;

use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\BaseNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\ArrayNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\LinkNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\HtmlNode;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class HtmlNode extends BaseNode
{
		
	/**
	 *
	 * @access protected
	 */
	protected $html;
		
	/**
	 *
	 * @access public
	 * @param $parent, string $html, array $params
	 */
    public function __construct($parent, $html, array $params = array())
    {
        $this->nodes = array();

		$this->parent = $parent;		
		$this->html = $html;
		$this->params = $params;
    }

	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getType()
	{
		return 'htmlNode';
	}

	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getHtml()
	{
		return $this->html;
	}
	
}
