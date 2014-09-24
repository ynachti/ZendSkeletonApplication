<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Authnet for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Authnet;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Form\Annotation\AnnotationBuilder;

class Module implements AutoloaderProviderInterface {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/', __NAMESPACE__),
                ),
            ),
        );
    }

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                'AuthnetDpmWidget' => function ($sm) {
                	$locator = $sm->getServiceLocator();
                	$viewHelper = new \Authnet\View\Helper\AuthnetDpmFormHelper;
                	$authnet_options = $locator->get('authnet_module_options');
                	$viewHelper->setTransactionForm($locator->get('authnet_dpm_form'));
                	$viewHelper->setModuleOptions($authnet_options);
                	return $viewHelper;
                }
            )
        );
    }

    public function getServiceConfig() {
        return array(
            'invokables' => array(
                'Authnet\Form\Request' => 'Authnet\Form\Request',
            ),
            'factories' => array(
                'authnet_module_options' => function ($sm) {
                    $config = $sm->get('Config');
                    return isset($config['authnet']) ? $config['authnet'] :  new Options\ModuleOptions(array());
                },
                'authnet_dpm_form' => function($sm) {
                	$builder = new AnnotationBuilder();
                	$form    = $builder->createForm('Authnet\Form\DpmForm');
                	return $form;
                },
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e) {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

}
