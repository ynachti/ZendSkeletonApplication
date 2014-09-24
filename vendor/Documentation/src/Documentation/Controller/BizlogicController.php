<?php
namespace Documentation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BizlogicController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel(array(
        		'title' => 'Business Logic',
        		'description' => 'This is where you should find the business logic for each of the modules developed',
        		'apps' => array(
        				'Housing' => 'business/housing',
        		        'Next Application' => 'business/next-app',
        		)
        ));
        $view->setTemplate('documentation/index/list');
        return $view;
    } 
    
    public function housingAction() 
    {
        $view = new ViewModel(array(
        	'title' => 'Housing Application Business Logic',
            'description' => 'Please include the business logic',            
        ));
        $view->setTemplate('documentation/index/plain');
        return $view;
    }
    
    public function nextappAction()
    {
    	$view = new ViewModel(array(
    			'title' => 'Application Business Logic',
    			'description' => 'Please include the business logic',
    	));
    	$view->setTemplate('documentation/index/plain');
    	return $view;
    }
}
?>