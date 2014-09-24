<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(

    'router' => array(
        'routes' => array(            
            'student-services' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/services',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Services',
                        'action' => 'index'
                    )
                )
            ),
            
            'applications' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/applications',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Applications',
                        'action' => 'index'
                    )
                )
            ),
            
            'admin' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route' => '/admin',
            				'defaults' => array(
            						'controller' => 'Application\Controller\Admin',
            						'action' => 'index'
            				)
            		)
            ),
            
            'scholarships' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/scholarships',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Scholarships',
                        'action' => 'index'
                    )
                )
            ),            
            
            'documentation' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route' => '/documentation',
            				'defaults' => array(
            						'controller' => 'Documentation\Controller\Index',
            						'action' => 'index'
            				)
            		)
            ),
            
            'current' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/current',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Current',
                        'action' => 'index'
                    )
                )
            ),
            
            'honors' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/applications/honors',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Current',
                        'action' => 'index'
                    )
                )
            ),
            
            'suevents' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/applications/events',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Current',
                        'action' => 'index'
                    )
                )
            ),
            'transcript' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/applications/transcript',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Current',
                        'action' => 'index'
                    )
                )
            ),
            
            'engineering' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/applications/transcript',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Current',
                        'action' => 'index'
                    )
                )
            ),
            'cohen' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/applications/transcript',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Current',
                        'action' => 'index'
                    )
                )
            ),
            
            'future' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/future',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Future',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*'
                            ),
                            'defaults' => array(
                               
                            )
                        )
                    )
                )
            ),

            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller' => 'Index',
                                'action' => 'index'
                            )
                        )
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
            'paginator' => 'Zend\Paginator\Factory',
            'header-navigation' => 'Navigation\Model\HeaderNavigationFactory',
            'staff-navigation' => 'Navigation\Model\SideMenuFactory',
            'side-menu' => 'Navigation\Model\SideMenuFactory'
        ),

    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo'
            )
        )
    ),

    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Admin' => 'Application\Controller\AdminController',
            'Application\Controller\Current' => 'Application\Controller\CurrentController',
            'Application\Controller\Future' => 'Application\Controller\FutureController',
            'Application\Controller\Applications' => 'Application\Controller\ApplicationsController',
            'Application\Controller\Services' => 'Application\Controller\ServicesController',
            'Application\Controller\Scholarships' => 'Application\Controller\ScholarshipsController',
            'Documentation\Controller\Index' => 'Documentation\Controller\IndexController',
            'Application\Controller\Payment' => 'Application\Controller\PaymentController',
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            
            'Application_driver' => array(
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            
            'orm_default' => array(
                'drivers' => array(
                     'Application\Entity' => 'Application_driver'
                ),
            ),
        ),
    ),
);