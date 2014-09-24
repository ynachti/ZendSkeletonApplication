<?php

return array(
    'bjyauthorize' => array(
        // set the 'guest' role as default (must be defined in a role provider)
        'default_role' => 'public',
        'authenticated_role' => 'user',
        /* this module uses a meta-role that inherits from any roles that should
         * be applied to the active user. the identity provider tells us which
         * roles the "identity role" should inherit from.
         *
         * for ZfcUser, this will be your default identity provider
         */
        'identity_provider'  => 'BjyAuthorize\Provider\Identity\ZfcUserEntityDb',
		
        /* If you only have a default role and an authenticated role, you can
         * use the 'AuthenticationIdentityProvider' to allow/restrict access
         * with the guards based on the state 'logged in' and 'not logged in'.
         */
        
        //'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
        
        /* role providers simply provide a list of roles that should be inserted
         * into the Zend\Acl instance. the module comes with two providers, one
         * to specify roles in a config file and one to load roles using a
         * Zend\Db adapter.
         */
        'role_providers' => array(
            /* here, 'guest' and 'user are defined as top-level roles, with
             * 'admin' inheriting from user
             */
           'BjyAuthorize\Provider\Role\Config' => array(
               'public' => array(),
               'guest' => array('children' => array('user')),
               'user' => array(	
               		'children' => array(
               		    'staff' => array(
               		        'children' => array(
               		        		'admin'
               		        )
               		),
                       	'admin' => array(
                       	    'children' => array(
                       	    		'developer'                       	    		
                       	    )
               		    ),                       	
                   ),
               ),
           ),
            // this will load roles from the user_role table in a database
            // format: user_role(role_id(varchar), parent(varchar))
            'BjyAuthorize\Provider\Role\EntityDb' => array(
                'table' => 'user_role',
                'identifier_field_name' => 'id',
                'role_id_field' => 'role_id',
                'parent_role_field' => 'parent_id',
            ),
            // this will load roles from
            // the 'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' service
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                // class name of the entity representing the role
                'role_entity_class' => 'BjyAuthorize\Entity\Role',
                // service name of the object manager
                'object_manager' => 'doctrine.entitymanager.orm_default' //'My\Doctrine\Common\Persistence\ObjectManager',
            ),
        ),
                
        /* resource providers provide a list of resources that will be tracked
         * in the ACL. like roles, they can be hierarchical         * 
         */
        'resource_providers' => array(
            'BjyAuthorize\Provider\Resource\Config' => array(
                //developers
                'route/zfcadmin' => array(),
                //main application module
            	'application' => array(),
                'home' => array(),        	
            ),
        ),
    		
        /* rules can be specified here with the format:
         * array(roles (array), resource, [privilege (array|string), assertion])
         * assertions will be loaded using the service manager and must implement
         * Zend\Acl\Assertion\AssertionInterface.
         * *if you use assertions, define them using the service manager!*
         * example of an allow setting: array(array('user'), 'application', array('add', 'list')),
         */
        'rule_providers' => array(
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
                	//application main functionality
                    array(array('user'), 'home'),
                    array(array('user', 'developer'), 'route/zfcadmin'),
                    array(array('user'), 'application'),                		
                ),
            ),
        ),
        
        /* Currently, only controller and route guards exist
         * Consider enabling either the controller or the route guard depending on your needs.
         */
        'guards' => array(
            /* If this guard is specified here (i.e. it is enabled), it will block
             * access to all routes unless they are specified here.
             */
//             'BjyAuthorize\Guard\Route' => array(

//             	//main application functions - Do not edit
//             	/* start of application functions */	
//             	array('route' => 'home', 'roles' => array('guest', 'user', 'developer')),
//             	array('route' => 'zfcuser', 'roles' => array('user')),
//                 array('route' => 'zfcuser/logout', 'roles' => array('user', 'guest')),
//                 array('route' => 'zfcuser/login', 'roles' => array('guest', 'user')),
//                 array('route' => 'zfcuser/register', 'roles' => array('guest')),
//             	// Below is the default index action used by the ZendSkeletonApplication
//             	array('route' => 'home/default', 'roles' => array('guest', 'user')),
//                 array('route' => 'admin', 'roles' => array('user', 'developer')),
                
//             	/* end of application functions */
//             ),
        		
	        /* If this guard is specified here (i.e. it is enabled), it will block
	         * access to all controllers and actions unless they are specified here.
	         * You may omit the 'action' index to allow access to the entire controller
	         */
            'BjyAuthorize\Guard\Controller' => array(
                //array('controller' => 'index', 'action' => 'index', 'roles' => array('guest', 'user')),
                //array('controller' => 'index', 'action' => 'stuff', 'roles' => array('user')),
                // You can also specify an array of actions or an array of controllers (or both)
                // allow "guest" and "admin" to access actions "list" and "manage" on these "index",
                // "static" and "console" controllers
//                array(
//                    'controller' => array('index', 'static', 'console'),
//                    'action' => array('list', 'manage'),
//                    'roles' => array('guest', 'admin')
//                ),
                
                array(
                		'controller' => 'zfcuser', 
                		'action' => 'register', 
                		'roles' => array('developer', 'admin')
                		),                
                array(
                		'controller' => 'zfcuser', 
                		'action' => array('logout','profile'), 
                		'roles' => array('guest', 'user') 
						),
            	array(
            			'controller' => 'zfcuser',
            			'action' => array('index', 'login'),
            			'roles' => array('public', 'guest', 'user')
            			),
                array(
                		'controller' => 'ZfcAdmin\Controller\AdminController', 
                		'action' => 'index', 
                		'roles' => array('developer')
						),


                //array('controller' => 'zfcuser', 'roles' => array()),
            // Below is the default index action used by the ZendSkeletonApplication
            // array('controller' => 'Application\Controller\Index', 'roles' => array('guest', 'user')),
            ),
        ),
    ),
);