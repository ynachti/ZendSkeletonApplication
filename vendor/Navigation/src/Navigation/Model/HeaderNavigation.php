<?php
namespace Navigation\Model;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;

class HeaderNavigation extends DefaultNavigationFactory
{
    /**
     * @versionm NOT DONE YET
     * @todo add logic to load the acl with the proper permissions based on flags the student has
     * This is added for the student area top navigation (non-PHPdoc)
     * @see \Zend\Navigation\Service\AbstractNavigationFactory::getPages()
     */
    
	protected function getPages(ServiceLocatorInterface $serviceLocator)
	{
        $currentUser = null;
	    $navigation = $serviceLocator->get('header-menu');
        //$developers = $serviceLocator->get('developers');
        
        if($serviceLocator->get('zfcuser_auth_service')->hasIdentity()):
            $currentUser = $serviceLocator->get('zfcuser_auth_service')->getIdentity()->getNsheId();
        endif;
        //add logic here based on the level of access allowed. 
        
		foreach ($navigation as $key => $item):
		          $menu []= $item;
//         		if($currentUser != NULL):
//         		      if ($item['access'] == 'developers' && in_array($currentUser, $developers)) {
//         		  	       $menu []= $item;
//         		      }elseif($item['access'] == 'developers' && !in_array($currentUser, $developers)){
//         		           return false;
//         		      }else{
//         		          $menu []= $item;
//         		      }    		  		 		   
//         		else:
//         		  return false;
//         		endif;
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