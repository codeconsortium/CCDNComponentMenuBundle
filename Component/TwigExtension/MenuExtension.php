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

namespace CCDNComponent\MenuBundle\Component\TwigExtension;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class MenuExtension extends \Twig_Extension
{
	
	/**
	 *
	 * @access private
	 */
	private $menuChain;
	
	/**
	 *
	 * @access private
	 */
	private $helper;
	
	/**
	 *
	 * @access public
	 */
	public function __construct($menuChain, $helper)
	{
		$this->menuChain = $menuChain;
		$this->helper = $helper;
	}
	
    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'menu' => new \Twig_Function_Method($this, 'menu', array('is_safe' => array('html'))),
        );
    }

    /**
     *
     * Fetches the menu builder from the menu builder chain.
     *
     * @access public
     * @param 
     * @return 
     */
    public function menu($lookupStr, array $options = array(), $renderer = null)
    {
		$menu = $this->menuChain->getMenu($lookupStr);
		
		return $this->helper->render($menu, $options, $renderer);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'menu';
    }

}
