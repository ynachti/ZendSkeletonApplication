<?php
namespace Navigation\Model;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;

class SideMenu extends DefaultNavigationFactory
{
	     
	protected function getPages(ServiceLocatorInterface $serviceLocator)
	{
		$currentUser = null;
	    $navigation = $serviceLocator->get('staff-menu');   
		$menu = array();
		$acl = $serviceLocator->get('isAllowed');
		
		if($serviceLocator->get('zfcuser_auth_service')->hasIdentity()):
		      $currentUser = $serviceLocator->get('zfcuser_auth_service')->getIdentity()->getNsheId();
		endif;
        
        //add logic here based on the level of access allowed. 
        foreach ($navigation as $key => $item):
          	
            $resource = isset($item['resource']) ? $item['resource'] : NULL;
         	$privilege = isset($item['privilege']) ? $item['privilege'] : NULL;

            if($acl->isAllowed($resource, $privilege))
        	{				
	            $menu[] = $item;        
	        }  
		endforeach;
        
        //end of logic
		if (null === $this->pages && isset($menu) ) {
            
			$mvcEvent = $serviceLocator->get('Application')->getMvcEvent();

			$routeMatch = $mvcEvent->getRouteMatch();
			$router     = $mvcEvent->getRouter();
			$pages      = $this->getPagesFromConfig($menu);

			$this->pages = $this->injectComponents(
					$pages,
					$routeMatch,
					$router
			);
		}

		return $this->pages;
	}
}