<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use DoctrineORMModule\Service\EntityManagerFactory;
use DoctrineORMModule\Service\DBALConnectionFactory;
use DoctrineORMModule\Service\ConfigurationFactory as ORMConfigurationFactory;
use DoctrineModule\Service\DriverFactory;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use \Application\Model\StSessionStorage as StSession;
use Doctrine\ORM\Tools\SchemaValidator;


class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $sharedEventManager = $eventManager->getSharedManager();
        // set session timeout to x amount
        $sm = $e->getApplication()->getServiceManager();
        
        /**
         * @desc if the currently loaded module is under maintenance set the
         * variables alert message and the current module name for displaying
         * in the layout.phtml
         * @param \Zend\Mvc\MvcEvent $e
         */
        $sharedEventManager->attach(
        	'Zend\Mvc\Controller\AbstractController',
            'dispatch',
            function($e) {
                //retrieve the global settings from the /config/autoload/global.php
                $application_globals = $e->getApplication()->getServiceManager()->get('globals');
                //set the alert and app variables
                $controller = $e->getTarget();
                $controllerClass = get_class($controller);
                $module = substr($controllerClass, 0, strpos($controllerClass, '\\'));
                if (in_array($module, $application_globals['is_maintenance'])):
                if($module != null){
                	if ($application_globals['is_maintenance'][$module] == 1):
                	$alert = $e->getApplication()->getServiceManager()->get('maintenance_alert');
                	$applicationName = $module;
                	endif;
                	if ($application_globals['is_maintenance']['System'] == 1):
                	$alert = $e->getApplication()->getServiceManager()->get('maintenance_alert');
                	$applicationName = 'The System';
                	endif;
                }
                endif;
                
                //add variable to the view
                $vm = $e->getViewModel();
                $vm->setVariable('isMaintenance', $application_globals['is_maintenance']['System']);
                isset($alert) ? $vm->setVariable('alert', $alert) : NULL;
                isset($applicationName) ? $vm->setVariable('app', $applicationName) : NULL;
            }
        );
        
        /**
         * Initializing the login session for the user 
         * and start the clock
         */
        $sharedEventManager->attach(
        		'ZfcUser\Authentication\Adapter\AdapterChain',
        		'authenticate.pre',
        		function() use ($sm) {
        			$this->initSession($sm);
        		}
        );
        /**
         * Automagically set the layout based on which module is loaded 
         */
        $sharedEventManager->attach(
            'Zend\Mvc\Controller\AbstractController', 
            'dispatch', 
            function($e) {
                $controller = $e->getTarget();
                
                $controllerClass = get_class($controller);
                
                $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
                $config = $e->getApplication()->getServiceManager()->get('config');
                $layout = $e->getApplication()->getServiceManager()->get('view_manager')->getViewModel();
                if (isset($config['module_layouts'][$moduleNamespace][$controllerClass])) {
                	$controller->layout($config['module_layouts'][$moduleNamespace][$controllerClass]);
                }
            }, -2000 ); 
        //$eventManager->attach('dispatch', array($this, 'doctrineValidate'), -1000);
        $eventManager->attach('dispatch', array($this, 'getModuleName'), -1000);
    }
    
    public function getModuleName(MvcEvent $event) {
        $controller = $event->getTarget();
        $controllerClass = get_class($controller);
        $moduleName = substr($controllerClass, 0, strpos($controllerClass, '\\'));
        return $moduleName;
    }
    /**
     * Troubleshooting the schema for doctrine ORM transactions
     * @param MvcEvent $event
     */
    public function doctrineValidate(MvcEvent $event){
    	$application = $event->getParam('application');
    	$serviceManager = $application->getServiceManager();
    	$entityManager = $serviceManager->get('doctrine.entitymanager.orm_default');
    	$validator = new SchemaValidator($entityManager);
    	$errors = $validator->validateMapping();
    	
    	if (count($errors) > 0) {
    		//return the errors found
    		echo "<h3>Schema Validator Debugger</h3>";
    		\Zend\Debug\Debug::dump($errors);

    	}
    }
    
    /**
     * Set session timeout to x amount
     */
    private function initSession($sm) {
    	$mySessionStorage = new StSession();
    	$mySessionManager = $mySessionStorage->getSessionManager();
    	$globals = $sm->get('globals');
    	 
    	// value is set in the config/autoload/local.php
    	$mySessionManager->rememberMe($globals['ttl']);
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'maintenance_alert' => function($sm) {
                    $alert = '<div class="alert in alert-block fade alert-alert">the system is under Maintenance at this time. Please check back later!</div>';
                    return $alert;
                },
                //STUDENT INFO - PRODUCTION 
//                'doctrine.entitymanager.orm_housing_production'        => new EntityManagerFactory('orm_housing_production'),
//                 'doctrine.connection.orm_housing_production'           => new DBALConnectionFactory('orm_housing_production'),
//                 'doctrine.configuration.orm_housing_production'        => new ORMConfigurationFactory('orm_housing_production'),
//                 'doctrine.driver.orm_housing_production'               => new \DoctrineModule\Service\DriverFactory('orm_housing_production'),
                
//                 'get_countries_list' => function ($sm) {
//                     $sm = $sm->getServiceLocator();
//                     $em = $sm->getEntityManager();
//                     $repository = $em->getRepository('Transcript\Entity\Countries');
//                     return $repository->findAll();
//                 },
            ),
        );
    }

}
