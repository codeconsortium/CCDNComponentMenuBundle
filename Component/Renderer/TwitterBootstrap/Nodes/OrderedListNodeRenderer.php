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
class OrderedListNodeRenderer extends BaseRenderer
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

		$titleTrans = $this->getTranslated($translator, $menu->getParam('title'), $menu->getParam('title_trans_params'), $menu->getParam('title_trans_bundle'));

		$title = $this->getProperty('title', $titleTrans);
		$class = $this->getProperty('class', $menu->getParam('class'));
		$style = $this->getProperty('style', $menu->getParam('style'));
		
		$dataAttributes = $this->getDataAttributes($menu->getParam('data_attributes'));
		
		$output = '<ol' . $class . $style . $title . $dataAttributes . '>';
		
		foreach($menu->getArray() as $key => $value)
		{
			if (is_object($value))
			{
				$content = $value->render($renderers, $container);
				
				if (strlen($content))
				{
					$output .= '<li>' . $content . '</li>';
				}
			} else {
				if (strlen($value))
				{
					$output .= '<li>' . $value . '</li>';				
				}
			}
		}
		
		$output .= '</ol>';
		
		return $output;
	}
	
}