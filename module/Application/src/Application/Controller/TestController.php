<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * TestController
 *
 * @author
 *
 * @version
 *
 */
class TestController extends AbstractActionController
{
    protected $em;
    
    public function indexAction() {
    	// this is how you get the current route
    	$routeMatch = $this->getEvent ()->getRouteMatch ();
    	// this is how you get the id
    	$id = ( int ) $this->params ()->fromRoute ( "id", null );
    	// this is how you get http request info
    	$uri = ( array ) $this->params ()->fromRoute ();
    	$apps = array(
    				
    			'Application Forms' => array(
    					'label' => 'Application Forms',
    					'icon' => 'fa-file-text-o',
    					'route' => 'applications'
    			),
    			'Services' => array(
    					'label' => 'Services',
    					'icon' => 'fa-wrench',
    					'route' => 'services'
    			),
    			'Scholarships' => array(
    					'label' => 'Scholarships',
    					'icon' => 'fa-money',
    					'route' => 'scholarships'
    			)
    			 
    	);
    
    	// 		try {
    	// 		    $user = new UserRole();
    	// 		    $user->id = '7';
    	// 		    $user->role_id = 'housing-viewer';
    	// 		    $user->is_default = '0';
    	// 		    $user->parent_id = '2';
    	// 		    $this->getEntityManager()->merge($user);
    	// 		    $this->getEntityManager()->flush();
    
    	// 		}catch (Exception $err){
    	// 		    die(var_dump($err));
    	// 		}
    
    	// 		try {
    	// 		    $data = new UserRoleLinker();
    	// 		    $data->user_id = '2000450297';
    	// 		    $data->role_id = '9';
    	// 		    $this->getEntityManager()->merge($data);
    	// 		    $this->getEntityManager()->flush();
    	// 		}catch (Exception $err){
    	// 		    die(var_dump($err)); // your error handling
    	// 		}
    	$obj1 = new ViewModel ( array (
    			'id' => $id,
    			'uri' => $uri,
    			'title' => 'Student Services',
    			'content' => 'Please make your selection of the service you are seeking',
    			'apps' => $apps,
    			//'users' => $this->getRoles(),
    			//'userroles' => $this->getUserRoles()
    			// 'modules' => $this->getLoadedModules('__NAMESPACE__'),
    			// 'route' => $routeMatch->getMatchedRouteName()
    	) );
    	return $obj1;
    }
    
    public function getLoadedModules() {
    	$modules = $this->getEvent ()->getApplication ()->getServiceManager ()->get ( 'modulemanager' )->getLoadedModules ();
    	$moduleNames = array_keys ( $modules );
    
    	return array (
    			'route' => $moduleNames
    	);
    }
    public function getRouteName() {
    	return $this->data ['route'];
    }
    // 	public function setEntityManager( $em) {
    // 		$this->em = $em;
    // 	}
    public function getEntityManager() {
    	if (null === $this->em) {
    		$this->em = $this->getServiceLocator ()->get ( 'doctrine.entitymanager.orm_default' );
    	}
    	return $this->em;
    }
    private function getLocalRepo($dir) {
    	$em = $this->getEntityManager ();
    	$repository = $em->getRepository ( $dir );
    	return $repository;
    }
    public function getRoles() {
    	$roles = $this->getLocalRepo('BjyAuthorize\Entity\UserRole'); // ( 'Application\Entity\User' );
    	//var_dump($roles);
    	$roles_object = $roles->findby(array('id' => 7));
    	//$roles_object = $roles->findAll ();
    
    	return $roles_object;
    }
    public function getUserRoles() {
    	$user = $this->getLocalRepo ( 'Application\Entity\UserRoleLinker' );
    	$role_ids = $user->findby (array("user_id" => 2000450297));
    
    	$roles = $this->getLocalRepo('BjyAuthorize\Entity\UserRole');
    	foreach($role_ids as $id){
    		$ids []= $id;
    	}
    	foreach ($ids as $id){
    
    		$roles_object = $roles->findby(array('id' => $id));
    		$roles []= $roles_object->__get('role_id');
    	}
    
    	return $roles;
    }
    public function geturlvaluesAction() {
    	$id = ( int ) $this->params ()->fromRoute ( "id", null );
    	$title = "values in the url";
    	return new ViewModel ( array (
    			'title' => $title
    	) );
    }
}