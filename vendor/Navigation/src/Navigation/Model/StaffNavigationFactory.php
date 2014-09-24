<?php
namespace Navigation\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Navigation\Model\StaffNavigation;

class StaffNavigationFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = new StaffNavigation();
        return $navigation->createService($serviceLocator);
    }

}