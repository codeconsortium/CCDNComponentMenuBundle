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
class ButtonDropDownDividerNode extends BaseNode
{
	
	/**
	 *
	 * @access protected
	 */
	protected $parent;
	
	/**
	 *
	 * @access protected
	 */
	protected $label;

	/**
	 *
	 * @access protected
	 */
	protected $params;
	
	/**
	 *
	 * @access public
	 * @param $parent, string $label, array $params
	 */
    public function __construct($parent, $label, array $params = array())
    {
        $this->nodes = array();

		$this->parent = $parent;
		$this->label = $label;
		$this->params = $params;
    }

	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getType()
	{
		return 'buttonDropDownDividerNode';
	}
	
	/**
	 *
	 * @access public
	 * @return mixed[]
	 */	
	public function getLabel()
	{
		if (array_key_exists('label', $this->params))
		{
			if (is_callable($this->params['label']))
			{
				return $this->params['label']();
			} else {
				return $this->params['label'];
			}					
		} else {
			return $this->label;
		}
	}
	
}
