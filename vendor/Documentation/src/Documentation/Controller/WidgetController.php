<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Documentation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Authnet\lib\AuthorizeNetSIM;
use Application\Model\StSessionStorage;

class WidgetController extends AbstractActionController
{
    protected $module = 'documentation';

    public function indexAction()
    {
        $obj = new ViewModel(array(
            'title' => 'Widgets',
            'description' => 'These widgets are for internal use only',
            'apps' => array(
                'Payment Gateway' => 'payment',
                'Login' => 'login',
                        )            
        ));
        return $obj;
    }
    
    public function loginAction(){
        $title = 'Login Widget Documentation';
        $description = 'This is a description of how to use the login widget to require authentication of users';
        $view = new ViewModel(
            	array(
        	       'title' => $title,
            	   'description' => $description
                )
        );
        $view->setTemplate('documentation/index/plain');
            return $view;
    }
    
    public function receptionAction(){
    	$request = $this->getRequest();
    	$flashMessenger = new FlashMessenger();
    	$module = strtolower($this->module);
    	$modopt = $this->getServiceLocator()->get('authnet_module_options')[$module];
    	$enviro = ($modopt instanceof \Authnet\Options\ModuleOptions) ? $modopt->getEnvironment() : $modopt['environment'];
    	$params = array();
    	$params ['api_id']= $modopt['api_login_id'][$enviro];
    	$params['transaction_key'] = $modopt['transaction_key'][$enviro];
    	$params['md5_settings'] = $modopt['md5_setting'][$enviro];
    	$params['post_url'] = $modopt['post_url'][$enviro];
    
//     	$response = new AuthorizeNetSIM($params ['api_id'], $params['md5_settings']);
//     	$session = new StSessionStorage();
    	
//     //check if the response is coming from Authnet & if the jsession in the response matches the user's
//     	if ($response->isAuthorizeNet() && ($response->jsession == $session->getSessionId())) {
//     		if ($response->approved) {
//     			// Receipt Page
//     			$redirect_url = '/receipt?transaction_id=' . $response->transaction_id;
//     			$flashMessenger->addMessage($redirect_url);
//     		} else {
//     			// Redirect to error page.
//     			$redirect_url = '/error&response_code='.$response->response_code . '&response_reason_text=' . $response->response_message;
//     			$flashMessenger->addMessage($redirect_url);
//     		}
//     		// Send the Javascript back to AuthorizeNet, which will redirect user back to your site.
//     		//echo AuthorizeNetDPM::getRelayResponseSnippet($redirect_url);
//      		//$this->redirect()->toRoute('documentation');
//     	} else {
//     		$flashMessenger->addMessage( "Error -- not AuthorizeNet. Check your MD5 Setting.");    		
//     	} 
    	
    	
    	//$this->redirect()->toRoute('documentation');
    	if($flashMessenger->hasMessages()):
    	   $messages = $flashMessenger->getMessages();
    	endif;
    	
    	$vm = new ViewModel(array(
    	    'messages' => isset($messages) ? $messages : null,
    	    'redirect' => isset($redirect_url) ? $redirect_url : null
    	));
    	return $vm;
    
//     	if($request->isGet()):
//     	$url_vars = $request->getQuery();
//     	var_dump($request->getQuery());
//     	$hash_code = $url_vars->x_md5_hash;
//     	endif;
    
    }
    
    public function paymentAction(){
    	//$sessionStorage = new \Application\Model\StSessionStorage;
    	$flashMessenger = new FlashMessenger();
    
    	$app = array (
    			'name' => 'documentation',
    	        'title' => ' Authorize Net Widget Example'
    	);
    
    	$cart = array (
    			'item' => 'Application Fee',
    			'quantity' => '1',
    			'total' => '125',
    			'description' => 'Demonstration for developers',
    	        'invoice' => 'Y3A9SS4I1N4$E'
    			 
    	);
    	$vm = new ViewModel();
    	$vm->app = $app;
    	$vm->cart = $cart;
    	$vm->messages = ($flashMessenger->hasMessages()) ? $flashMessenger->getMessages() : NULL;
    	return $vm;
    }
        
    public function jarvisformAction()
    {
        $sessionStorage = new \Application\Model\StSessionStorage;
        $flashMessenger = new FlashMessenger();
        if($flashMessenger->hasMessages()):
         $messages = $flashMessenger->getMessages();
        endif;
		$app = array (
				'name' => 'documentation', 
		);
		
		$cart = array (
				'item' => 'Application Fee',
				'quantity' => '1',
				'total' => '125.00',
		        'description' => 'Demonstration for developers',
				 
		);
		
		$view = new ViewModel ( array (
				'title' => 'General Payment Gateway',
				'description' => 'To get this payment form from any module use the statement below:</br><pre>echo $this->AuthnetDpmWidget($app["name"], $cart["total"]);</pre>
									<p>This should be included in the view page e.g page.phtml</p>
									<ul><li>Parameter 1 is the name of your module</li><li>Parameter 2 is the calculated total from the shopping cart</li></ul>
									<p>These two parameters are coming from your Controller class e.g IndexController where you will have two arrays and a ViewModel returned with an attached template
									as shown below:</p>
									<pre>
public function payAction() { 
	$app = array (
		\'name\' => \'Housing\',
	);
	$cart = array (
		\'item\' => \'Application Fee\',
		\'quantity\' => 1,
		\'total\' => 125.00,
		\'mode\' => \'sandbox\' 
	);
	$view = new ViewModel ( array (
		\'title\' => \'General Payment Gateway\',
		\'description\' => \'description\',
		\'app\' => $app,
		\'cart\' => $cart 
	) );
	$view->setTemplate(\'application/payment/index\');
	return $view;
}</pre><p>Your view page should look something like this:</p>
<pre><xmp>
<div class="features">
	<h2 class="fa">
		<span><?php echo sprintf($this->translate($this->title)) ?></span>
	</h2>
	<?php  if($this->description): ?><p><?php echo sprintf($this->translate($this->description)) ?></p><?php  endif; ?>
</div>

<div class="row">
	<div class="span1"><?= $cart[\'quantity\']; ?></div>
	<div class="span3"><?= $cart[\'item\']; ?></div>
	<div class="span1"><?= $cart[\'total\']; ?></div>
</div>
<div>
<? echo $this->AuthnetDpmWidget($app[\'name\'], $cart[\'total\']); ?>               
</div>
</xmp></pre>',
				'app' => $app,
				'cart' => $cart,
		        'messages' => isset($messages) ? $messages: NULL, 
		) );
        return $view;
    }
    
}