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

use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class BaseRenderer
{
	
	/**
	 *
	 * @access protected
	 * @param $auth, $noAuth, $container
	 * @return bool
	 */						
	protected function isAuthorised($auth, $noAuth, $container)
	{	
		// No Auth is stuff to be shown only to users who are not logged in.
		if ($noAuth)
		{
			if ($container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY'))
			{
				return false;
			}
		}
		
		if ($auth)
		{
			if ( ! $container->get('security.context')->isGranted($auth))
			{
				return false;
			}
		}
		
		return true;
	}
	
	/**
	 *
	 * @access protected
	 * @param string $property, string $param, string $merge
	 * @return string
	 */
	protected function getProperty($property, $param, $merge = '')
	{
		$out = '';

		if ($param || $merge)
		{
			$out = ' ' . $property . '="' . $param . (strlen($param) ? ' ': '') . $merge . '"';
		}

		return $out;
	}
	
	/**
	 *
	 * @access protected
	 * @param mixed[]
	 * @return string
	 */		
	protected function getDataAttributes($attributes)
	{
		$output = '';

		if (is_array($attributes) && count($attributes))
		{
			foreach($attributes as $key => $attribute)
			{
				if (is_callable($attribute))
				{
					$value = $attribute();
				} else {
					$value = $attribute;
				}
			
				$output .= ' data-' . $key . '="' . $value . '"';
			}
		}
		
		return $output;
	}
	
	/**
	 *
	 * @access protected
	 * @param $translator, string $message, array $messageParams, $messageBundle
	 * @return string
	 */	
	protected function getTranslated($translator, $message, $messageParams, $messageBundle)
	{			
		if ( ! $message)
		{
			return '';
		}
		
		if ( ! $messageBundle)
		{
			return $message;
		}
		
		if ( ! $messageParams)
		{
			$messageParams = array();
		}
	
		return $translator->trans($message, $messageParams, $messageBundle);
	}
	
	/**
	 *
	 * @access protected
	 * @param $router, string $route, array $routeParams
	 * @return string
	 */	
	protected function getRoute($router, $route, $routeParams = array())
	{
		if ( ! $route)
		{
			throw new \Exception('You must specify a Route for the link node!');
		}
		
		if ( ! $routeParams)
		{
			$routeParams = array();
		}
		
		try {			
		 	$url = $router->generate($route, $routeParams);
		} 
		catch (RouteNotFoundException $e) {
			$url = $route;
		}
		
		return $url;
	}
	
}