<?php
namespace Navigation\Model;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;

class StaffNavigation extends DefaultNavigationFactory
{
     
	protected function getPages(ServiceLocatorInterface $serviceLocator)
	{
        $currentUser = null;
	    $navigation = $serviceLocator->get('staff-menu');
        //$developers = $serviceLocator->get('developers');
        
        if($serviceLocator->get('zfcuser_auth_service')->hasIdentity()):
            $currentUser = $serviceLocator->get('zfcuser_auth_service')->getIdentity()->getNsheId();
        endif;
        //add logic here based on the level of access allowed. 
        
		foreach ($navigation as $key => $item):		
        		if($currentUser != NULL):
        		      $menu []= $item;
//         		      if ($item['access'] == 'developers' && in_array($currentUser, $developers)) {
//         		  	       $menu []= $item;
//         		      }elseif($item['access'] == 'developers' && !in_array($currentUser, $developers)){
//         		           //return false;
//         		      }else{
//         		          $menu []= $item;
//         		      }    		  		 		   
        		else:
        		  return false;
        		endif;
		endforeach;		

		//end of logic
		if (null === $this->pages && $menu !== NULL) {
			$navigation[] = array (
					'label' => 'home',
					'uri'   => '/'
			);
            
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