<?php
namespace Navigation\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Navigation\Model\HeaderNavigation;

class HeaderNavigationFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = new HeaderNavigation();
        return $navigation->createService($serviceLocator);
    }

}