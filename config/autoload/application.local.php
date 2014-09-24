<?
return array(

    'authnet' => array(
    		'application' => array(
    				/**
    				 * set the environment from which you want to process
                     * production is 1, testing is 2, development is 3
                     */
    				'environment' => 3,    
    				   /**
    				    * AuthorizeNet settings
                        * array key 1 is production
                        * array key 2 is test
                        * array key 3 is development
                        */
    				'api_login_id' => array(
    						1 => '8QkXa4uX7pr',
    						2 => '75sqQ96qHEP8',
    						3 => '9pT5guGY4e',
    				),
    				'transaction_key' => array(
    						1 => '85gx9rPu4H67YaNV',
    						2 => '7r83Sb4HUd58Tz5p',
    						3 => '3qvCA943773EBdt8',
    				),
    				'md5_setting' => array(
    						1 => '7027748001',
    						2 => '7027748001',
    						3 => '7027748001'
    				),
    				//below are the settings
    				'relay_url' => array(
    						1 => $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'],
    						2 => 'https://apps.ess.unlv.edu/global/authorizenet/paymentgateway.cfm',
    						3 => $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'],
    				)
    		)
    ),
    /*
     * This is an extension of the bjyauthorize config file but specific to this module
     * ACL Authorization configuration for the Housing application
     * Check out the comments in bjyauthorize.global.php or bjyauthorize.local.php for 
     * more detailed instrumentation of the code. 
     */
    'bjyauthorize' => array(
        'guards' => array(
	     		/* If this guard is specified here (i.e. it is enabled), it will block
	     		 * access to all controllers and actions unless they are specified here.
	     		 * if you do not specify actions under a controller all actions will inherit the controllers privileges 
	             */
	     		'BjyAuthorize\Guard\Controller' => array(
                array(
                    'controller' => 'Application\Controller\Index',
                    'roles' => array(
                        'user', 'guest'
                    )
                ),
	     		    array(
	     		    		'controller' => 'Signature\Controller\Signature',
	     		    		'roles' => array(
	     		    				'user', 'guest'
	     		    		)
	     		    ),
                array(
                    'controller' => 'Application\Controller\Applications',
                    'roles' => array(
                        'user', 'guest'
                    )
                ),
                array(
                    'controller' => 'Application\Controller\Scholarships',
                    'roles' => array(
                        'user'
                    )
                ),
                array(
                    'controller' => 'Application\Controller\Services',
                    'roles' => array(
                        'user'
                    )
                ),
                array(
                    'controller' => 'Application\Controller\International',
                    'roles' => array(
                        'guest'
                    )
                ),
	     		array(
	     			'controller' => 'Application\Controller\Admin',
	     			'roles' => array(
	     			    'admin', 'staff', 'developer'
	     			)
	     		)
            )            
        )
    ),
    /*
     * Doctrine ORM connections to Oracle Databases for Survey
    */
    'doctrine' => array(
    		//choose the entity you need based on the environment
    		'entitymanager' => array(
    				'orm_application_development' => array(
    						'connection'    => 'orm_db09_dev',
    						'configuration' => 'orm_application'
    				),
    				'orm_application_test' => array(
    						'connection'    => 'orm_db09_test',
    						'configuration' => 'orm_application'
    				),
    				'orm_production' => array(
    						'connection'    => 'orm_production',
    						'configuration' => 'orm_application'
    				),
    		),
    		'configuration' => array(
    				'orm_application' => array(
    						'metadata_cache'    => 'array',
    						'query_cache'       => 'array',
    						'result_cache'      => 'array',
    						'driver'            => 'orm_default',
    						'generate_proxies'  => false,
    						'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
    						'proxy_namespace'   => 'DoctrineORMModule\Proxy',
    						'filters'           => array()
    				)
    		),


    ),

);
?>