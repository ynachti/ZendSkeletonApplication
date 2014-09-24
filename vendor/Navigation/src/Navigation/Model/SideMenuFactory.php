<?php
namespace Navigation\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Navigation\Model\SideMenu;

class SideMenuFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = new SideMenu();
        return $navigation->createService($serviceLocator);
    }

}