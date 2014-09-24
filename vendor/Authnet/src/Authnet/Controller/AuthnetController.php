<?php

/**
 * Description of AuthnetController
 *
 * @author yn
 * @role controller to return the transaction form
 * @var type string
 * @description API variables for the sandbox environment
 * @sandbox: https://sandbox.authorize.net/
 * @login Username: nachtiy1919 password: P@ssw1rd
 * @info For your reference, you can use the following test credit card numbers when testing your connection. The expiration date must be set to the present date or later:
 * American Express Test Card: 370000000000002
 * Discover Test Card: 6011000000000012		 
 * Visa Test Card: 4007000000027		 
 * Second Visa Test Card: 4012888818888		 
 * JCB: 3088000000000017		 
 * Diners Club/ Carte Blanche: 38000000000006
 */

namespace Authnet\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use \Authnet\lib\AuthorizeNetDPM as AuthDpm;
use \Authnet\Options\ModuleOptions as ModOpt;
use Authnet\lib\AuthorizeNetSIM;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class AuthnetController extends AbstractActionController {

    
    protected $amount = '5.00';                                            

    public function indexAction($setAmount = NULL, $relay_url = NULL) {
        $sessionStorage = new \Application\Model\StSessionStorage;
        $builder = new AnnotationBuilder();
        $app_processor = base64_encode('https://eas-t.ess.unlv.edu/student');
		$form = $builder->createForm('Authnet\Form\DpmForm');
        $modopt = $this->getServiceLocator()->get('authnet_module_options');
        require_once $modopt['sdk'];
        $default_relay = $modopt['default_relay'];
        $enviro = ($modopt instanceof \Authnet\Options\ModuleOptions) ? $modopt->getEnvironment() : $modopt['environment'];
        $relay_url = (!isset($relay_url)) ? $default_relay.'?AppProcessor='.$app_processor.'&jsessionid='.$sessionStorage->getSessionId() : $relay_url;
        $params = array();
        if($modopt instanceof \Authnet\Options\ModuleOptions):
            $params ['api_id']= $modopt->getApiId();  
            $params['transaction_key'] = $modopt->getTransactionKey();
            $params['md5_settings'] = $modopt->getMd5Settings();
            $params['post_url'] = $modopt->getPostUrl();
        else:
            $params ['api_id']= $modopt['api_login_id'][$enviro];
            $params['transaction_key'] = $modopt['transaction_key'][$enviro];
            $params['md5_settings'] = $modopt['md5_setting'][$enviro];
            $params['post_url'] = $modopt['post_url'][$enviro];
        endif;
               
        $dpm = new AuthDpm;
        $view = new ViewModel( array(
            'form' => $form,
            'form_settings' => $dpm->directPostDemo($relay_url, $params ['api_id'], $params['transaction_key'], (isset($setAmount)? $setAmount:$this->amount), $params['md5_settings'], $params['post_url'])
        ));
        $view->setTemplate('authnet/authnet/index');
        return $view;
    }
    
    public function receiptAction() {
        $mod = ucfirst($this->getEvent()->getRouteMatch()->getParam('module'));
        $flashMessenger = $this->flashMessenger();
        if($flashMessenger->hasMessages()):
            $messages = $flashMessenger->getMessages();
        endif;
        $session = new Container($mod);
        //put your logic here
        #$this->savedata();
        //if data is saved forward to payment complete
        $view =  $this->forward()->dispatch($mod . '\Controller\Index', [
        		'action'     => 'paymentcomplete',
        		'messages' => $messages,
        		'session'   => $session,
        		]);
        return $view;
    }
    
    private function savedata(){
    	//save the data set the logic here
    	$session = new Container();
    }
    
    public function relayAction() {
    	$mod = $this->getEvent()->getRouteMatch()->getParam('module');
    	$vm = new ViewModel(array(
    			'module' => $this->getEvent()->getRouteMatch()->getParam('module'),
    			'response' => $this->getEvent()->getRouteMatch()->getParam('response')   
    	));
    	$vm->setTemplate($mod.'/index/paymentcomplete');
    
    	return $vm;
    }
}
?>