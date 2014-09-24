<?
namespace  Authnet\Services;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
class AuthnetControllerService extends AbstractActionController
{
    
    protected $moduleName;
    
    //protected $moduleOptions;
        
    //protected $amount;

	/**
	 * @return the $moduleName
	 */
	public function getModuleName() {
	    if(null === $this->moduleName):
	        $this->setModuleName(new MvcEvent());
	    endif;
		return $this->moduleName;
	}

	/**
	 * @param field_type $moduleName
	 */
	function setModuleName(MvcEvent $e) {
	    $controller = $e->getTarget();
	    
	    $controllerClass = get_class($controller);
	    $moduleName = substr($controllerClass, 0, strpos($controllerClass, '\\'));
	    
	    
		$this->moduleName = $moduleName;
	}
  
    
    
}