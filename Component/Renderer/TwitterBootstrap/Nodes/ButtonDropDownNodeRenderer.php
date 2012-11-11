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
use CCDNComponent\MenuBundle\Component\MenuBuilder\Nodes\ButtonDropDownDividerNode;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class ButtonDropDownNodeRenderer extends BaseRenderer
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
		$router = $container->get('router');

		$buttonLink       = $this->getRoute($router, $menu->getParam('button_link'), $menu->getParam('button_route_params'));		
		$buttonLabelTrans = $this->getTranslated($translator, $menu->getParam('button_label_trans'), $menu->getParam('button_label_trans_params'), $menu->getParam('button_label_trans_bundle'));
		$buttonTitleTrans = $this->getTranslated($translator, $menu->getParam('button_title_trans'), $menu->getParam('button_title_trans_params'), $menu->getParam('button_title_trans_bundle'));
		$divTitleTrans    = $this->getTranslated($translator, $menu->getParam('div_title'), $menu->getParam('div_title_params'), $menu->getParam('div_title_bundle'));
		
		$buttonTitle = $this->getProperty('title', $buttonTitleTrans);
		$buttonClass = $this->getProperty('class', $menu->getParam('button_class'));
		$buttonStyle = $this->getProperty('style', $menu->getParam('button_style'));
		$buttonRel   = $this->getProperty('rel', $menu->getParam('button_rel'));
		
		$divTitle    = $this->getProperty('title', $divTitleTrans);
		$divClass    = $this->getProperty('class', $menu->getParam('div_class'));
		$divStyle    = $this->getProperty('style', $menu->getParam('div_style'));

		$listClass   = $this->getProperty('class', $menu->getParam('list_class'));
		$listStyle   = $this->getProperty('style', $menu->getParam('list_style'));

		$divDataAttributes = $this->getDataAttributes($menu->getParam('div_data_attributes'));
		$buttonDataAttributes = $this->getDataAttributes($menu->getParam('button_data_attributes'));
		$listDataAttributes = $this->getDataAttributes($menu->getParam('list_data_attributes'));

		$output =  '<div' . $divClass . $divStyle . $divTitle . $divDataAttributes . '>';	
		$output .= '<a' . $buttonClass . $buttonStyle . ' href="' . $buttonLink . '"' . $buttonRel . $buttonTitle . $buttonDataAttributes . '>' . $buttonLabelTrans . '<span class="caret"></span></a>';
		$output .= '<ul' . $listClass . $listStyle . $listDataAttributes . '>';
		
		foreach($menu->getArray() as $key => $value)
		{
			if (is_object($value))
			{
				if ($value->getType() == 'buttonDropDownDividerNode')
				{
					$output .= $value->render($renderers, $container);
				} else {
					$output .= '<li>' . $value->render($renderers, $container) . '</li>';				
				}
			} else {
				$output .= '<li>' . $value . '</li>';
			}
		}
		
		$output .= '</ul>';
		$output .= '</div>';
			
		return $output;
	}
}
