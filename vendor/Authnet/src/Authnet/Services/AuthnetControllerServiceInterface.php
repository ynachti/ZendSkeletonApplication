<?php

namespace Authnet\Services;

use Zend\Mvc\MvcEvent;
//use Authnet\Services\AuthnetControllerService;

interface AuthnetControllerServiceInterface
{
    /**
     * @return the $moduleName
     */
    public function getModuleName();

    public function setModuleName(MvcEvent $e);
    
//     public function getModuleOptions();
    
//     public function setModuleOptions();
    
//     public function getCustomerId();
}