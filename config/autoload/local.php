<?php

/**
 * Local Configuration Override
 *
 * This configuration override file is for overriding environment-specific and
 * security-sensitive configuration information. Copy this file without the
 * .dist extension at the end and populate values as needed.
 *
 * @NOTE: This file is ignored from Git by default with the .gitignore included
 * in ZendSkeletonApplication. This is a good practice, as it prevents sensitive
 * credentials from accidentally being committed into version control.
 */
return array( 

    'service_manager' => array(
        'services' => array(
            'globals' => array(
                
                'ttl' => 1080000, // set the timeout of the login session for the user logged in ()
                'is_maintenance' => array(
                    'System' => 0,
                    'Documentation' => 0,
                    'Transcript' => 0,
                    'Housing' => 0,
                    'Honors' => 1,
                    'Developer' => 0,
                    'Rebelaidimaging' => 0,
                    //do not edit globals beyond this line
                    'Application' => 0, // do not edit this one keep value at 0
                    'Administration' => 0,
                    'Services' => 0,
                    'Authnet' => 0,
                    'ZfcUser' => 0,
                    'Survey' => 0
                ),
                /**
                 * Authorize.net environment should be set in the 
                 * corresponding config file of each module.
                 * The environment determines which authnet params to be used
                 */
                /* Both Application and ZfcUser modules are using orm_application_* or orm_production */
                'environment' => array(                    
                    'Application' => 3,                                
                    'Survey' => 3,
                    'ZfcUser' => 3     /*this zfcuser directive is to be changed under autoload/zfcuser.local.php*/
                )
            ), /* end of globals */
        ) /* end of services */
    ),

);