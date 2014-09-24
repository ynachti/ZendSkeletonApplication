<?
return array(
    'doctrine' => array(
    'connection' => array(
            //Global Applications
            'orm_default' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = SEFS-INFRA.SYSAPPS.UNLV.EDU)(PORT = 1521)))
                                                        (CONNECT_DATA = (SERVICE_NAME = slifedev.sefsinfra.sysapps.unlv.edu) (SRVR = DEDICATED))
                                                        )'
            		)
            ),
            'orm_production' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = SEFS-INFRA.SYSAPPS.UNLV.EDU)(PORT = 1521)))
                                                        (CONNECT_DATA = (SERVICE_NAME = slifeprd.sefsinfra.sysapps.unlv.edu) (SRVR = DEDICATED))
                                                        )'
            		)
            ),
            'orm_db09_dev' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02T-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                        (CONNECT_DATA = (SERVICE_NAME = ESS01D.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                        )'
            		)
            ),
            'orm_db09_test' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02T-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                        (CONNECT_DATA = (SERVICE_NAME = ESS01T.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                        )'
            		)
            ),
            'orm_db09' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(					         				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02P-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                        (CONNECT_DATA = (SERVICE_NAME = ESS01P.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                        )'
            		)
            ),
    		//Honors
            'orm_honors' => array(
    				'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
    				'params' => array(    						
    						'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = SEFS-INFRA.SYSAPPS.UNLV.EDU)(PORT = 1521))) 
    				                                    (CONNECT_DATA = (SERVICE_NAME = slifedev.sefsinfra.sysapps.unlv.edu) (SRVR = DEDICATED)))',
    				)
    		),
            //Housing
            'orm_housing_production' => array(
                    'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
                    'params' => array(                           
                            'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = SEFS-INFRA.SYSAPPS.UNLV.EDU)(PORT = 1521))) 
                                                        (CONNECT_DATA = (SERVICE_NAME = slifeprd.sefsinfra.sysapps.unlv.edu) (SRVR = DEDICATED)))',
                    )
            ),            
        	'orm_housing_development' => array(
        			'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
        			'params' => array(       					
        					'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = SEFS-INFRA.SYSAPPS.UNLV.EDU)(PORT = 1521))) 
        			                                     (CONNECT_DATA = (SERVICE_NAME = slifedev.sefsinfra.sysapps.unlv.edu) (SRVR = DEDICATED)))',
        			)
        	),
        	'orm_stg' => array(
        			'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
        			'params' => array(        					
        					'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = SEFS-INFRA.SYSAPPS.UNLV.EDU)(PORT = 1521))) 
        			                                     (CONNECT_DATA = (SERVICE_NAME = slifedev.sefsinfra.sysapps.unlv.edu) (SRVR = DEDICATED)))',								)
        	),            
            //RAimaging
            'orm_raimaging_development' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02T-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                        (CONNECT_DATA = (SERVICE_NAME = ESS01D.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                        )'
            		)
            ),            
            'orm_raimaging_test' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02T-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                        (CONNECT_DATA = (SERVICE_NAME = ESS01D.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                        )'
            		)
            ),
            // Transcript Request
            'orm_transcript' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02P-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                    (CONNECT_DATA = (SERVICE_NAME = ESS01P.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                    )'
            		)
            ),            
            'orm_transcript_development' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02T-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                    (CONNECT_DATA = (SERVICE_NAME = ESS01D.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                    )'
            		)
            ),            
            'orm_transcript_test' => array(
            		'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
            		'params' => array(            				
            				'connectionstring' => '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = CL02T-SCAN.SEA.OIT.UNLV.EDU)(PORT = 1521)))
                                                    (CONNECT_DATA = (SERVICE_NAME = ESS01T.SEA.OIT.UNLV.EDU) (SRVR = DEDICATED))
                                                    )'
            		)
            ),
    ))
);
?>