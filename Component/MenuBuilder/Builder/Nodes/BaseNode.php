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
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\LinkNode;
use CCDNComponent\MenuBundle\Component\MenuBuilder\Builder\Nodes\HtmlNode;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class BaseNode
{
	
    /**
     *
	 * @access protected
     */
    protected $nodes;

	/**
	 *
	 * @access protected
	 */
	protected $parent;
	
	/**
	 *
	 * @access protected
	 */
	protected $params;
	
	/**
	 *
	 * @access public
	 * @param $parent, array $params
	 */
    public function __construct($parent, array $params = array())
    {
	    $this->nodes = array();
	
		$this->parent = $parent;
		
		$this->params = $params;
    }

	/**
	 *
	 * @access public
	 * @param array $params
	 */
	public function mergeParams(array $params = array())
	{
		$this->params = array_merge($params, $this->params);
	}

	/**
	 *
	 * @access public
	 * @return string
	 */	
	public function getType()
	{
		return 'baseNode';
	}
	
	/**
	 *
	 * @access public
	 * @return mixed[]
	 */
	public function end()
	{
		return $this->parent;
	}
	
	//
	// Renderer Logic.
	//
	
	
	/**
	 *
	 * @access public
	 * @param $renderers, $container
	 * @return string
	 */
	public function render($renderers, $container)
	{
		$output = "";
		
		if (array_key_exists($this->getType(), $renderers))
		{
			// Finds a suitable renderer for the given node type.
			$output .= $renderers[$this->getType()]->render($this, $renderers, $container);
		} else {
			throw new \Exception('No renderer found for type: "' . $this->getType() . '"');
		}
		
		return $output;
	}

	/**
	 *
	 * @access public
	 * @return array
	 */		
	public function getParams()
	{
		return $this->params;
	}
	
	/**
	 *
	 * @access public
	 * @param string $key
	 * @return mixed[]
	 */
	public function getParam($key)
	{
		if (array_key_exists($key, $this->params))
		{
			if (is_callable($this->params[$key]))
			{
				return $this->params[$key]();
			} else {
				return $this->params[$key];
			}
		}
		
		return null;
	}
	
}
