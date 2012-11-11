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

namespace CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes;

use CCDNComponent\MenuBundle\Component\Renderer\TwitterBootstrap\Nodes\BaseRenderer;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class ButtonDropDownDividerNodeRenderer extends BaseRenderer
{

	/**
	 *
	 * @access public
	 * @param $menu, $renderers, $container
	 * @return string
	 */	
	public function render($menu, $renderers, $container)
	{
		$params = $menu->getParams();
		
		if ( ! $this->isAuthorised($menu->getParam('auth'), $menu->getParam('no_auth_only'), $container))
		{
			return '';
		}
		
		$translator = $container->get('translator');

		$bundle = $menu->getParam('bundle');

		$labelTrans = $this->getTranslated($translator, $this->getLabel($menu), $menu->getParam('label_trans_params'), $menu->getParam('label_trans_bundle'));
		$titleTrans = $this->getTranslated($translator, $menu->getParam('title'), $menu->getParam('title_trans_params'), $menu->getParam('title_trans_bundle'));
		
		$title = $this->getProperty('title', $titleTrans);
		$class = $this->getProperty('class', $menu->getParam('class'), 'divider');
		$style = $this->getProperty('style', $menu->getParam('style'));
		$rel   = $this->getProperty('rel', $menu->getParam('rel'));
		
		$dataAttributes = $this->getDataAttributes($menu->getParam('data_attributes'));
		
		$output = '<li' . $class . $style . $rel . $title . $dataAttributes . '></li>';
		
		return $output;
	}
	
	/**
	 *
	 * @access protected
	 * @param $menu
	 * @return string
	 */
	protected function getLabel($menu)
	{
		$paramLabel = $menu->getParam('label');
		
		if ($paramLabel)
		{
			$label = $paramLabel;			
		} else {
			$label = $menu->getLabel();
		}
		
		return $label;
	}

}
