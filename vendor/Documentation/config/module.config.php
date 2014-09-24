<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Documentation\Controller\Index' => 'Documentation\Controller\IndexController',
            'Documentation\Controller\Widget' => 'Documentation\Controller\WidgetController',
            'Documentation\Controller\Bizlogic' => 'Documentation\Controller\BizlogicController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'documentation' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/documentation[/]',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Documentation\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes. 
                    'reception' => array(
                    		'type' => 'Segment',
                    		'options' => array(
                    				'route' => 'reception[/]',
                    				'defaults' => array(
                    						'controller' => 'widget',
                    						'action' => 'reception'
                    				)
                    		),
                        ),
                    'widgets' => array(
                    		'type' => 'Segment',
                    		'options' => array(
                    				'route' => 'widgets[/]',
                    				'defaults' => array(
                    						'controller' => 'widget',
                    						'action' => 'index'
                    				)
                    		),
                            'may_terminate' => true,
                            'child_routes' => array(
	                           'payment' => array(
                    		      'type' => 'Segment',
                    		      'options' => array(
                    				    'route' => 'payment',
                    				    'defaults' => array(
                    						'controller' => 'widget',
                    						'action' => 'payment'
                    				    )
                    		      )                    
                                ),  
                                'login' => array(
                                    'type' => 'Segment',
                                	'options' => array(
                                		'route' => 'login',
                                		'defaults' => array(
                                			'controller' => 'widget',
                                			'action' => 'login'
                                		)
                                	)
                                ),
                            )                    
                    ),
                    'business' => array(
                    		'type' => 'Segment',
                    		'options' => array(
                    				'route' => 'business[/]',
                    				'defaults' => array(
                    						'controller' => 'bizlogic',
                    						'action' => 'index'
                    				)
                    		),
                    		'may_terminate' => true,
                    		'child_routes' => array(
                    				'housing' => array(
                    						'type' => 'Segment',
                    						'options' => array(
                    								'route' => 'housing',
                    								'defaults' => array(
                    										'controller' => 'bizlogic',
                    										'action' => 'housing'
                    								)
                    						)
                    				),
                        		    'next-app' => array(
                        		    		'type' => 'Segment',
                        		    		'options' => array(
                        		    				'route' => 'next-app',
                        		    				'defaults' => array(
                        		    						'controller' => 'bizlogic',
                        		    						'action' => 'nextapp'
                        		    				)
                        		    		)
                        		    ),
                    		)
                    ),
                    
                ),
//                 'default' => array(
//                 		'type' => 'Segment',
//                 		'options' => array(
//                 				'route' => '/[:controller[/:action[/]]]',
//                 				'constraints' => array(
//                 						'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                 						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                 				),
//                 				'defaults' => array(
//                 				),
//                 		),
//                 ),
            ),
        ),
    ),
    'view_helper_config' => array(
    		'flashmessenger' => array(
    				'message_open_format'      => '<div%s><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul><li>',
    				'message_close_string'     => '</li></ul></div>',
    				'message_separator_string' => '</li><li>'
    		)
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Documentation' => __DIR__ . '/../view',
        ),
    ),
);
