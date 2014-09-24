<?php  
/**
 * edit this file to add navigation for new modules
 * that are added to the framework
 * @desc multi level array descriptive of module structures
 * @author Yassine Nachti <yassine.nachti@unlv.edu>
 */

return array(
    'service_manager' => array(
        'services' => array(

            'header-menu' => array(
                
            		'home' => array(
            				'label' => 'Home',
            				'route' => 'home',
            				'icon' => 'fa fa-home',
            		        'cube-color' => 'red' ,
            		        'order' => 1
            		),                
            		
            ), /* end of header menu */
            
            'staff-menu' => array(
            
            		'home' => array(
            				'label' => 'Dashboard',
            				'route' => 'admin',
            				'icon' => 'fa-home',
            		        'cube-color' => 'red',
            		        'resource' => 'home',
            		        'order' => 1
            		),            
            
            ), /* end of staff menu */
            'student-menu' => array(
            
            		'home' => array(
            				'label' => 'Dashboard',
            				'route' => 'home',
            				'icon' => 'fa-home',
            		        'cube-color' => 'blueDark',
            		        'resource' => 'home',
            		        'order' => 1
            		),           
            		'apply' => array(
            				'label' => 'Apply For',
            				'route' => 'applications',
            				'icon' => 'fa-home',
            		        'cube-color' => 'blueDark',
            		        'resource' => 'applications',
            		        'order' => 2,
            		        'pages' => array(
            		            'index' => array(
            		            	'label' => 'Home',
            		            	'route' => 'applications',
            		            	'action' => 'index',
            		            	'icon' => 'fa-home',
            		            	'resource' => '',
            		            	'order' => 1,
            		            ),
            		            'admission' => array(
            		            	'label' => 'Admission',
            		            	'route' => 'applications',
            		            	'action' => 'admission',
            		            	'icon' => 'fa-briefcase',
            		            	'resource' => '',
            		            	'order' => 1,
            		            ),
            		            'graduation' => array(
            		            	'label' => 'Graduation',
            		            	'route' => 'applications',
            		            	'action' => 'graduation',
            		            	'icon' => 'fa-flag',
            		            	'resource' => '',
            		            	'order' => 3,
            		            ),
            		            'scholarships' => array(
            		            	'label' => 'Scholarships',
            		            	'route' => 'applications',
            		            	'action' => 'scholarships',
            		            	'icon' => 'fa-money',
            		            	'resource' => '',
            		            	'order' => 3,
            		            )
            		            ),
            		),           
            		'request' => array(
            				'label' => 'Request',
            				'route' => 'services',
            				'icon' => 'fa-wrench',
            		        'cube-color' => 'blueDark',
            		        'resource' => '',
            		        'order' => 2,
            		        'pages' => array(
            		            'services-home' => array(
            		            	'label' => 'Requests',
            		            	'route' => 'services',
            		            	'icon' => 'fa-wrench',
            		            	'resource' => '',
            		            	'order' => 1,
            		            )
            		            ),
            		),           
            		'oiss-student' => array(
            				'label' => 'International Student',
            				'route' => 'international-students',
            				'icon' => 'fa-plane',
            		        'cube-color' => 'blueDark',
            		        'resource' => '',
            		        'order' => 3,
            		        'pages' => array(
            		            array(
            		            	'label' => 'Admission',
            		            	'route' => 'international-students',
            		            	'resource' => 'international-students',
            		            	'order' => 1,
            		            )
            		            ),
            		),           
            		'oiss-scholar' => array(
            				'label' => 'International Scholars',
            				'route' => 'international-scholars',
            				'icon' => 'fa-plane',
            		        'cube-color' => 'blueDark',
            		        'resource' => '',
            		        'order' => 3,
            		        'pages' => array(
            		            array(
            		            	'label' => 'Home',
            		            	'route' => 'international-scholars',
            		            	'resource' => 'international-scholars',
            		            	'order' => 1,
            		            )
            		            ),
            		),           
            
            ), /* end of student menu */
            )
        )
    );