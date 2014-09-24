<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Authnet\Controller\Authnet' => 'Authnet\Controller\AuthnetController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'transaction' => array(
                'type' => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/transaction',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Authnet\Controller',
                        'controller' => 'Authnet',
                        'action' => 'index',
                    ),
                ),

            ),
            'relay' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route' => '/payment/relay',
            				'defaults' => array(
            						'controller' => 'Authnet\Controller\Authnet',
            						'action' => 'relay'
            				)
            		),
            		'may_terminate' => true,
            		'child_routes' => array(
            				'default' => array(
            						'type' => 'Segment',
            						'options' => array(
            								'route' => '/[:module[/:response[/:transid]]]',
            								'constraints' => array(
            										'module' => '[a-zA-Z][a-zA-Z0-9_-]*',
            										'response' => '[0-9]*',
            								        'transid' => '[0-9]*'
            								),
            								'defaults' => array(
            										'action' => 'receipt'
            								)
            						)
            				)
            		)
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Authnet' => __DIR__ . '/../view',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            //'MyHelper' => 'student_enrollment\module\Authnet\MyHelper',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'Authnet_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Authnet/Form')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Authnet\Model' => 'Authnet_driver'
                ),
            ),
        ),
    )
);