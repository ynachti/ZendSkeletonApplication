<?php

namespace Authnet\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Authnet\Form\Billing as TransactionForm;
use Zend\Authentication\AuthenticationService;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;
use Authnet\lib\AuthorizeNetDPM ;
use Zend\Http\Client;
use Zend\Http\Headers;
//use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\View\Helper\FlashMessenger;
use Zend\Mvc\MvcEvent;
use Authnet\Services\AuthnetControllerServiceInterface;
use Zend\I18n\Validator\Float;
use Zend\I18n\Filter\NumberFormat;
use Zend\Debug\Debug;
use Zend\Filter\StringToLower;
use Zend\View\Helper\Service\FlashMessengerFactory;
use Zend\Di\ServiceLocator;
use Zend\Stdlib\ArrayObject;

class AuthnetDpmFormHelper extends AbstractHelper implements ServiceLocatorAwareInterface , AuthnetControllerServiceInterface {
	
	/**
	 * Transaction Form
	 * 
	 * @var TransactionForm
	 */
	protected $transactionForm;
	
	/**
	 * $var string templates used for view
	 */
	protected $formTemplate = 'authnet/authnet/index';
	
	protected $errorTemplate = 'authnet/authnet/error';
	
	protected $receiptTemplate = 'authnet/authnet/receipt';
	
	/**
	 * 
	 * @var sm
	 * @return ServiceLocator
	 */
	protected $sm;
	
	protected $appProcessor;
	
	protected $relay_url = 'https://apps.ess.unlv.edu/global/authorizenet/paymentgateway.cfm';
	
	protected $moduleOptions;
	
	/**
	 * __invoke
	 *
	 * @access public
	 * @param array $options
	 *        	array of options
	 * @return string
	 */

	public function __invoke($module, $amount, $description, $invoice_num = null,  $cust_id = null){
	    //lowercase the module name
	    $strtolower = new StringToLower();
	    $module = $strtolower->filter($module);
	    //make the amount to authnet standards of 2 decimal places
	    $amount = number_format($amount, 2, '.', '');
	    //retrieve the session ID to compare append it to the relay. This will be checked against 
	    //session id value after getting the authnet response
	    $sessionStorage = new \Application\Model\StSessionStorage;
	    $sessionId = $sessionStorage->getSessionId();
	    //get the options - this retrieves the authnet setting for the specific module comes from the module.php viewhelper closure
	    $modopt = $this->moduleOptions;
	    $enviro = ($modopt instanceof \Authnet\Options\ModuleOptions) ? $modopt->getEnvironment() : $modopt[$module]['environment'];
        $receipt = (!empty($modopt[$module]['receipt'][$enviro])) ? $modopt[$module]['receipt'][$enviro] : $this->receiptTemplate;
        $session_container_name =  (!empty($modopt[$module]['session_container'][$enviro])) ? $modopt[$module]['session_container'][$enviro] : null;
        //load the packaged authnet sdk provided by authorize.net
	    require_once $modopt['sdk'];
	    
	    $relay_url = (isset($modopt[$module]['relay_url'][$enviro])) ? $modopt[$module]['relay_url'][$enviro] : $this->relay_url;
	    $relay_url .= '?AppProcessor='.base64_encode($this->getAppProcessor()).'&jsessionid='.$sessionId;
	    $params = array();
	    
	    if($modopt instanceof \Authnet\Options\ModuleOptions):
	       $params ['api_id']= $modopt->getApiId();
	       $params['transaction_key'] = $modopt->getTransactionKey();
	       $params['md5_settings'] = $modopt->getMd5Settings();
	       $params['post_url'] = $modopt->getPostUrl();
	    else:
	       $params ['api_id']= $modopt[$module]['api_login_id'][$enviro];
	       $params['transaction_key'] = $modopt[$module]['transaction_key'][$enviro];
	       $params['md5_settings'] = $modopt[$module]['md5_setting'][$enviro];
	       $params['post_url'] = $modopt['post_url'][$enviro];
	    endif;
        
	    if($this->sm->getServiceLocator()->get('zfcuser_auth_service')->hasIdentity()):
	       $currentUser = ($cust_id ==null) ? $this->sm->getServiceLocator()->get('zfcuser_auth_service')->getIdentity()->getNsheId() : $cust_id;
	    endif;
	    
	    $dpm = new AuthorizeNetDPM();
	    $session = new Container($session_container_name);
	    $result = new ArrayObject();
	    $result->message = (isset($dpm->response_message)) ? $dpm->response_message : null;
	    $result->module_invoice = (isset($dpm->invoice_num)) ? $dpm->invoice_num : null;
	    $result->student_id = $dpm->customer_id;
	    $result->approved = $dpm->approved;
	    $result->declined = $dpm->declined;
	    $result->error = $dpm->error;
	    $result->held = $dpm->held;
	    $result->authorization_code = $dpm->authorization_code;
	    $result->avs_response = $dpm->avs_response;
	    $result->card_code_response = $dpm->card_code_response;
	    $result->cavv_response  = $dpm->cavv_response;
	    $result->authnet_transaction_id = $dpm->transaction_id;
	    $result->transaction_type = $dpm->transaction_type;
	    $result->amount = $dpm->amount;
	    $result->method = $dpm->method;
	    $result->first_name = $dpm->first_name;
	    $result->last_name = $dpm->last_name;
	    $result->company = $dpm->company;
	    $result->address = $dpm->address;
	    $result->city = $dpm->city;
	    $result->state = $dpm->state;
	    $result->zip_code = $dpm->zip_code;
	    $result->country = $dpm->country;
	    $result->phone = $dpm->phone;
	    $result->fax = $dpm->fax;
	    $result->email = $dpm->email_address;
	    $result->ship_first_name = $dpm->ship_to_first_name;
	    $result->ship_last_name = $dpm->ship_to_last_name;
	    $result->ship_company = $dpm->ship_to_company;
	    $result->ship_address = $dpm->ship_to_address;
	    $result->ship_city = $dpm->ship_to_city;
	    $result->ship_state = $dpm->ship_to_state;
	    $result->ship_zip_code = $dpm->ship_to_zip_code;
	    $result->ship_country = $dpm->ship_to_country;
	            
	    $vm = new ViewModel();	            
	    if(!is_null($dpm->response)):	        
	        if($dpm->response_code == 1) {
	            $vm->dpm = $result;
	            $vm->session = (!empty($session)) ? $session : null;
	            $template = $receipt;
	        }else{
	            $vm->dpm = $result;
	            $vm->session = (!empty($session)) ? $session : null;
	            $template = $this->errorTemplate;
	        }        
	    else:
    	    $vm->form = $this->transactionForm;        	          	    
    	    $vm->form_settings = $dpm->directPostDemo(
    	    		$module,
    	    		$relay_url,
    	    		$params ['api_id'],
    	    		$params['transaction_key'],
    	    		$amount, $params['md5_settings'],
    	    		$params['post_url'],
    	    		(isset($currentUser)) ? $currentUser : null,
    	    		(isset($invoice_num)) ? $invoice_num : null,
    	    		$description
    	    );
    	    $template = $this->formTemplate;
	    endif;
	    $vm->setTemplate ( $template );
        return $this->getView ()->render ( $vm );
	}
	
	/**
	 * @return the $url
	 */
	public function getAppProcessor() {
		if(null === $this->appProcessor):
		$this->appProcessor = $this->setAppProcessor();
		endif;
		return $this->appProcessor;
	}
	
	/**
	 * @param field_type $appProcessor
	 */
	public function setAppProcessor() {
		$uri = $this->sm->getServiceLocator()->get('Request')->getUri();
		$url = null;
		$url .= $uri->getScheme() . '://';
		$url .= $uri->getHost();
		$url .= (null !==$uri->getPort()) ? ':' : null;
		$url .= $uri->getPort();
		$url .= $uri->getPath();
	
		$this->appProcessor = $url;
		return $this->appProcessor;
	}
	
	/**
	 * Set service locator
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 */
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
		$this->sm = $serviceLocator;
		return $this;
	}
	
	/**
	 * Get service locator
	 *
	 * @return ServiceLocatorInterface
	 */
	public function getServiceLocator() {
		return $this->sm;
	}
	
	/**
	 * @return the $moduleName
	 */
	public function getModuleName() {
		if(null === $this->moduleName){
			$this->setModuleName(new MvcEvent);
		}
		return $this->moduleName;
	}
	
	/**
	 * @param field_type $moduleName
	 */
	public function setModuleName(MvcEvent $e) {
		$controller = $e->getTarget();
		 
		$controllerClass = get_class($controller);
		$moduleName = substr($controllerClass, 0, strpos($controllerClass, '\\'));
		 
		 
		$this->moduleName = $moduleName;
	}
	public function setModuleOptions($options) {
		$this->moduleOptions = $options;
		return $this;
	}
	
	public function getModuleOptions() {
		return $this->moduleOptions;
	
	}
	
	/**
	 * Retrieve Transaction Form Object
	 *
	 * @return transactionForm
	 */
	public function getTransactionForm() {
		return $this->transactionForm;
	}
	
	/**
	 * Inject Transaction Object
	 *
	 * @param TransactionForm $transactionForm
	 * @return AuthnetDpmForm
	 */
	public function setTransactionForm() {
		$builder = new AnnotationBuilder();
		$this->transactionForm = $builder->createForm ( 'Authnet\Form\DpmForm' );
		return $this;
	}
	
	/**
	 *
	 * @param string $viewTemplate
	 * @return AuthnetDpmForm
	 */
	public function setViewTemplate($viewTemplate) {
		$this->viewTemplate = $viewTemplate;
		return $this;
	}
	


}
