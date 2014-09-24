<?php
/**
 * set the custom layouts here under the module name as key list the controllers
 * with their corresponding layout path
 */
return array(
'module_layouts' => array(
        'Signature' => array(
            'Signature\Controller\SignatureController' => 'layout/student'
        ),
        'Transcript' => array(
                'Transcript\Controller\RequestController' => 'layout/student',
                'Transcript\Controller\ElectronicController' => 'layout/student',
                'Transcript\Controller\MailController' => 'layout/student',
                'Transcript\Controller\PickupController' => 'layout/student',
                'Transcript\Controller\TrackController' => 'layout/student',
                'Transcript\Controller\PaymentController' => 'layout/student',
                'Transcript\Controller\SurveyController' => 'layout/student',
        ),
        'Rebelaidimaging' => array(
                'Rebelaidimaging\Controller\AdministrationController' => 'layout/staff',
                'Rebelaidimaging\Controller\ImagesController' => 'layout/staff',
                'Rebelaidimaging\Controller\IndexController' => 'layout/staff',
                'Rebelaidimaging\Controller\StudentController' => 'layout/staff',
        ),
        'Survey' => array(
                'Survey\Controller\IndexController' => 'layout/smart_1_3',
        ),
		'Housing' => array(
				'Housing\Controller\IndexController' => 'layout/layout',		        
				'Housing\Controller\AdminController' => 'layout/staff',		        
				'Housing\Controller\PaymentController' => 'layout/student',		        
				'Housing\Controller\SurveyController' => 'layout/smart_1_3',		        
		),
        'Application' => array(
        		'Application\Controller\AdminController' => 'layout/staff',
        		'Application\Controller\ApplicationsController' => 'layout/student',
        		'Application\Controller\IndexController' => 'layout/student',
        		'Application\Controller\InternationalController' => 'layout/student',
        		'Application\Controller\ScholarshipsController' => 'layout/student',
        		'Application\Controller\ServicesController' => 'layout/student',
        ),
        'Documentation' => array(
        		'Documentation\Controller\IndexController' => 'layout/staff',
                'Documentation\Controller\BizlogicController' => 'layout/staff',
                'Documentation\Controller\WidgetController' => 'layout/staff',                
        )
)
);
?>