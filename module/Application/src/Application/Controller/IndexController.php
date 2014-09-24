<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {
	
	public function indexAction() {
		$this->getRequest()->getServer()->get('REMOTE_ADDR');
		$apps = array(			 	
    		    'Application Forms' => array(
    		        'label' => 'Application Forms', 
    		        'icon' => 'fa-file-text-o', 
    		        'route' => 'applications'
    		        ),
    			'Services' => array(
    			    'label' => 'Services', 
    			    'icon' => 'fa-wrench', 
    			    'route' => 'services'
    			    ),
    			'Scholarships' => array(
    			    'label' => 'Scholarships',
    			    'icon' => 'fa-money',
    			    'route' => 'scholarships'
    			    )		   
		);
		$obj = new ViewModel ( array (
				'title' => 'Student Services',
				'content' => 'Please make your selection of the service you are seeking',
				'apps' => $apps
				) );
		return $obj;
	}
}
