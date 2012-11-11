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
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\OrderedListNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\UnorderedListNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\LinkNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\HtmlNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\ButtonDropDownNode;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class ArrayNode extends BaseNode
{
	
	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getType()
	{
		return 'arrayNode';
	}
	
	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getArray()
	{
		return $this->nodes;
	}
	
	/**
	 *
	 * @access public
	 * @param string $name, array $params
	 * @return mixed[]
	 */
	public function arrayNode($name, array $params = array())
	{
		if ( ! array_key_exists($name, $this->nodes))
		{
			$this->nodes[$name] = new ArrayNode($this, $params);			
		} else {
			$this->nodes[$name]->mergeParams($params);
		}
		
		return $this->nodes[$name];
	}

	/**
	 *
	 * @access public
	 * @param string $name, array $params
	 * @return mixed[]
	 */
	public function orderedListNode($name, array $params = array())
	{
		if ( ! array_key_exists($name, $this->nodes))
		{
			$this->nodes[$name] = new OrderedListNode($this, $params);			
		} else {
			$this->nodes[$name]->mergeParams($params);
		}
		
		return $this->nodes[$name];
	}

	/**
	 *
	 * @access public
	 * @param string $name, array $params
	 * @return mixed[]
	 */
	public function unorderedListNode($name, array $params = array())
	{
		if ( ! array_key_exists($name, $this->nodes))
		{
			$this->nodes[$name] = new UnorderedListNode($this, $params);			
		} else {
			$this->nodes[$name]->mergeParams($params);
		}
		
		return $this->nodes[$name];
	}

	/**
	 *
	 * @access public
	 * @param string $name, array $params
	 * @return mixed[]
	 */	
	public function buttonDropDownNode($name, array $params = array())
	{
		if ( ! array_key_exists($name, $this->nodes))
		{
			$this->nodes[$name] = new ButtonDropDownNode($this, $params);			
		} else {
			$this->nodes[$name]->mergeParams($params);
		}
		
		return $this->nodes[$name];
	}
	
	/**
	 *
	 * @access public
	 * @param string $name, string $route, array $params
	 * @return mixed[]
	 */
	public function linkNode($name, $route, array $params = array())
	{
		if ( ! array_key_exists($name, $this->nodes))
		{
			$this->nodes[$name] = new LinkNode($this, $name, $route, $params);
		} else {
			$this->nodes[$name]->mergeParams($params);	
		}
		
		return $this->nodes[$name];
	}
	
	/**
	 *
	 * @access public
	 * @param string $name, string $html, array $params
	 * @return mixed[]
	 */
	public function htmlNode($name, $html, array $params = array())
	{
		if ( ! array_key_exists($name, $this->nodes))
		{
			$this->nodes[$name] = new HtmlNode($this, $html, $params);			
		} else {
			$this->nodes[$name]->mergeParams($params);
		}
		
		return $this->nodes[$name];
	}
	
	
	
	//
	// Cross-section Retrieval.
	//
	
	
	/**
	 *
	 * @access public
	 * @param array|string
	 * @return mixed[]
	 */
	public function get($lookup)
	{
		if ( ! count($lookup))
		{
			throw new \Exception('Lookup string must not be empty!');
		}
		
		if (is_array($lookup))
		{
			if ( ! array_key_exists($lookup[0], $this->nodes))
			{
				//throw new \Exception('Lookup index "' . $lookup[0] . '" does not exist!');
				return '';
			}
		
			if ((count($lookup) - 1) > 0)
			{
				return $this->nodes[$lookup[0]]->get(array_slice($lookup, 1));		
			} else {
				return $this->nodes[$lookup[0]];
			}
		} else {
			if ( ! array_key_exists($lookup, $this->nodes))
			{
				//throw new \Exception('Lookup index "' . $lookup . '" does not exist!');
				return '';
			}
			
			return $this->nodes[$lookup];
		}
	}
	
}
