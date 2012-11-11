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

use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\ArrayNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\ButtonDropDownDividerNode;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class ButtonDropDownNode extends ArrayNode
{
	
	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getType()
	{
		return "buttonDropDownNode";
	}
	
	/**
	 *
	 * @access public
	 * @param string $name, array $params
	 * @return mixed[]
	 */	
	public function dividerNode($name, array $params = array())
	{
		if ( ! array_key_exists($name, $this->nodes))
		{
			$this->nodes[$name] = new ButtonDropDownDividerNode($this, $name, $params);			
		} else {
			$this->nodes[$name]->mergeParams($params);
		}
				
		return $this->nodes[$name];
	}
	
}
