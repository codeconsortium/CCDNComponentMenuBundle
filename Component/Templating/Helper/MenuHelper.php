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

namespace CCDNComponent\MenuBundle\Component\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper as TemplatingHelper;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class MenuHelper extends TemplatingHelper
{	
	
	/**
	 *
	 * @access protected
	 */
	protected $container;

	/**
	 *
	 * @access protected
	 */
	protected $renderer;
		
	/**
	 *
	 * @access public
	 */
	public function __construct($container, $renderer)
	{
		$this->container = $container;
		
		$this->renderer = $renderer;
	}
	
	/**
	 *
	 * @access public
	 * @return string
	 */
    public function render($menu, array $options = array(), $renderer = null)
    {
        return $this->renderer->render($menu, $options, $this->container);
    }

    /**
 	 *
 	 * @access public
     * @return string
     */
    public function getName()
    {
        return 'ccdn_component_menu';
    }

}