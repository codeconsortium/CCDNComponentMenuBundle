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

namespace CCDNComponent\MenuBundle\Component\MenuBuilder\Chain;

use CCDNComponent\MenuBundle\Component\Menu\MenuBuilderInterface;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class MenuBuilderChain
{

    /**
     *
	 * @access private
     */
    private $menus;

    /**
     *
	 * @access private
     */
	private $menuBuilder;

	/**
	 *
	 * @access public
	 */
    public function __construct($menuBuilder)
    {
        $this->menus = array();

		$this->menuBuilder = $menuBuilder;
    }

    /**
     *
 	 * @access public
	 * @param $menu
     */
    public function addMenu($menu)
    {
        $this->menus[] = $menu;

		$menu->buildMenu($this->menuBuilder);		
    }

    /**
     *
 	 * @access public
	 * @return mixed[]
     */
    public function getMenu($lookupStr)
    {
		$regex = '/[\.]/';

		$lookup = preg_split($regex, $lookupStr, null, PREG_SPLIT_NO_EMPTY);
		
		return $this->menuBuilder->get($lookup);
    }

}
