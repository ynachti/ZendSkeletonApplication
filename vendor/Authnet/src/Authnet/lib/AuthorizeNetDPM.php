<?php

/**
 * @desc Demonstrates the Direct Post Method.
 * @purpose for demonstration purposes not actual production use
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetDPM
 * @tutorial DPM implements 3 steps:
 * * Step 1: Add necessary hidden fields to your checkout form and make your form is set to post to AuthorizeNet.
 * * Step 2: Receive a response from AuthorizeNet, do the business logic, and return
 *         a relay response snippet with a url to redirect the student to.
 * * Step 3: Show a receipt page to student.
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetDPM
 * @author Yassine Nachti <yassine.nachti@unlv.edu>
 */

namespace Authnet\lib;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\Mvc\MvcEvent;
use Application\Model\StSessionStorage;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Math\Rand;
use Zend\Form\Form;

class AuthorizeNetDPM extends AuthorizeNetSIM {

    const RELAY = '/transaction/authnet/receipt';    
    const SUCCESS = "Your payment has been succesfully completed.";
    const ERROR = 'Your transaction came back with errors.';

	public  function directPostDemo($module, $relay_url, $api_login_id, $transaction_key, $amount, $md5_setting= "", $post_url, $cust_id = null, $invoice_num = null, $description = null){
        
        /**
         * @desc Step 1: Show checkout form to student.
         * @return authorize net Form
         * @var fp sequence 
         */

        $relay = (!isset($relay_url)) ? self::RELAY : $relay_url;
        if (count($_POST) == 0 && count($_GET) == 0) {           
            $fp_sequence = Rand::getInteger(0, 1000); // Any sequential number like an invoice number.
            return AuthorizeNetDPM::getCreditCardForm($amount, $fp_sequence, $relay, $api_login_id, $transaction_key, $post_url, $prefill = true, $cust_id, $invoice_num, $description);
        } 
        /**
         * @desc Step 2: Handle AuthorizeNet Transaction Result & return snippet.
         * @return FlashMessenger authnet response
         */
        elseif (count($_POST) || count($_GET)) {            
            $flashMessenger = new FlashMessenger();
            $response = new AuthorizeNetSIM($api_login_id, $md5_setting);
            $session = new StSessionStorage();
            
            //check if the response is coming from Authnet & if the jsession in the response matches the user's
            if ($response->isAuthorizeNet() && ($response->jsession == $session->getSessionId())) {
                    	if ($response->approved) {
                    		// Receipt Page
                    		//$redirect_url = $receipt_url . '/receipt?transaction_id=' . $response->transaction_id;
                    		$response->confirmation = self::APPROVED;
                    		$flashMessenger->addMessage(self::APPROVED);
                    	} else {
                    		// Redirect to error page.
                    		//$redirect_url = '/error&response_code='.(isset($response->response_code))?$response->response_code:null . '&response_reason_text=' . isset($response->response_message)?$response->response_message:null;
                    	    $response->confirmation = self::ERROR . ' - ' . isset($response->response_message)?$response->response_message:null;
                    		$flashMessenger->addMessage(self::ERROR . ' - ' . isset($response->response_message)?$response->response_message:null);
                    	}
            } else {
                $response->confirmation =  "Error -- not AuthorizeNet. Check your MD5 Setting.";
            	$flashMessenger->addMessage($response->confirmation);
            }
        }        
        // Step 3: Show receipt page to student.
        elseif (isset($_GET['transaction_id'])) {
            if ($_GET['response_code'] == 1) {
                echo "Thank you for your purchase! Transaction id: " . htmlentities($_GET['transaction_id']);
            } else {
                echo "Sorry, an error occurred: " . htmlentities($_GET['response_reason_text']);
            }
        }    
    }

    /**
     * Generate a sample form for use in a demo Direct Post implementation.
     *
     * @param string $amount                   Amount of the transaction.
     * @param string $fp_sequence              Sequential number(ie. Invoice #)
     * @param string $relay_response_url       The Relay Response URL
     * @param string $api_login_id             Your API Login ID
     * @param string $transaction_key          Your API Tran Key.
     * @param bool   $test_mode                Use the sandbox?
     * @param bool   $prefill                  Prefill sample values(for test purposes).
     *
     * @return string
     */
    public static function getCreditCardForm($amount, $fp_sequence, $relay_response_url, $api_login_id, $transaction_key, $post_url, $prefill = true, $cust_id =null, $invoice_num = null, $description = null) {
        $time = time();
        $fp = AuthorizeNetSIM_Form::getFingerprint($api_login_id, $transaction_key, $amount, $fp_sequence, $time);
        $sim = new AuthorizeNetSIM_Form(array(
            'x_cust_id' => $cust_id,
            'x_method' => 'cc',
            'x_amount' => $amount,
            'x_fp_sequence' => $fp_sequence,
            'x_fp_hash' => $fp,
            'x_fp_timestamp' => $time,
            'x_relay_response' => "TRUE",
            'x_relay_url' => $relay_response_url,
            'x_login' => $api_login_id,
            'x_invoice_num' => $invoice_num,
            'x_description' => $description
        ));        
        //$post_url = ($environment=='sandbox') ? self::SANDBOX_URL : self::LIVE_URL;
        
        return array('hidden_fields' => $sim, 'post_url' => $post_url); 
    }

}