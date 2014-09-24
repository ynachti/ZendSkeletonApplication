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

class ScholarshipsController extends AbstractActionController {

    public function indexAction() {


        $obj = new ViewModel(array(
            'title' => 'Financial Aid & Scholarships',
            'apps' => array(
                'Engineering Scholarship' => 'engineering',
                'Cohen Scholarship' => 'cohen',
            )
                )
        );
        $obj->setTemplate('application/applications/index');
        return $obj;
    }
    public function fooAction() {
    
    
    	$obj = new ViewModel(array(
    			'title' => 'Financial Aid & Scholarships',
    			'apps' => array(
    					'Engineering Scholarship' => 'engineering',
    					'Cohen Scholarship' => 'cohen',
    			)
    	)
    	);
    	$obj->setTemplate('application/applications/index');
    	return $obj;
    }

}