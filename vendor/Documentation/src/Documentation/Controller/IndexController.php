<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Documentation for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Documentation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction() {
    	$list = array(
    	    'Widgets' => 'widgets',
    	    //'How-tos' => 'how-to',
    	    //'Best Practices' => 'standards',
    	    //'Naming Conventions' => 'naming-conventions',
    	    'Resources' => 'widgets',
    	    //'Business Logic' => 'business',
    	    //'Database' => 'database',
    	    //'Doctrine ORM' => 'doctrine',    	        
    	);
    	ksort($list);
    	
    	$view = new ViewModel ( array (
    			'title' => 'Documentation',
    			'description' => '<p>This module lists the different aspects of developing in this framework</p>
    	                           <p>This is a work in progress. If you follow some instructions and still run into issues please contact the documentation editor(s) for potential fixes</p>',
    	        'apps' => $list
    	) );
    	$view->setTemplate('documentation/index/list');
    	return $view;
    }
}
