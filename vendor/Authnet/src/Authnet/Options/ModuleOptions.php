<?php

namespace Authnet\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements AuthnetControllerOptionsInterface {
    
    /**
     *
     * @var type string
     * @description API variables for the sandbox environment
     * @sandbox: https://sandbox.authorize.net/
     * @login Username: nachtiy1919 password: Operation88 
     */
    protected $sandboxApiLoginId = '9pT5guGY4e';
    protected $sandboxTransactionKey = '294QFddE8m4n5X66';    
    protected $sandboxApiUrl = 'https://test.authorize.net/gateway/transact.dll';
    protected $sandboxApiMd5 = 'unlv-eas';
        
    /**
     *
     * @var type String
     * @description variables for live environment
     */
    protected $testApiLoginId = '75sqQ96qHEP8';
    protected $testTransactionKey = '7r83Sb4HUd58Tz5p';
    protected $testApiUrl = 'https://test.authorize.net/gateway/transact.dll';
    protected $testApiMd5 = 'unlv-eas';
    
    /**
     *
     * @var type String
     * @description variables for live environment
     */
    protected $liveApiLoginId = '8QkXa4uX7pr';
    protected $liveTransactionKey = '85gx9rPu4H67YaNV';
    protected $liveApiUrl = 'https://secure.authorize.net/gateway/transact.dll';
    protected $liveApiMd5 = 'unlv-eas';
    
    protected $md5Settings = 'md5';
    protected $apiId;
    protected $transactionKey;
    protected $postUrl;
    
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * @var bool
     */
    protected $useRedirectParameterIfPresent = true;

    /**
     * @var string
     */
    protected $loginRedirectRoute = 'authnet';

    /**
     * @var string
     */
    protected $logoutRedirectRoute = 'zfcuser/login';

    /**
     * @var int
     */
    protected $loginFormTimeout = 300;

    /**
     * @var int
     */
    protected $userFormTimeout = 300;


    /**
     * @var array
     */
    protected $formCaptchaOptions = array(
        'class' => 'figlet',
        'options' => array(
            'wordLen' => 5,
            'expiration' => 300,
            'timeout' => 300,
        ),
    );
    
    protected $environment = 3; //production is 1, testing is 2, development is 3
    
    /**
	 * @return the $transactionKey
	 */
	public function getTransactionKey() {
	    switch ($this->getEnvironment()):
	    case(1):
	    	$this->transactionKey = $this->liveTransactionKey;
	    break;
	    case (2):
	    	$this->transactionKey = $this->testTransactionKey;
	    	break;
	    case(3):
	    	$this->transactionKey = $this->sandboxTransactionKey;
	    	break;
	    endswitch;
		
	    return $this->transactionKey;
	}

	/**
	 * @param field_type $transactionKey
	 */
	public function setTransactionKey($transactionKey) {
		$this->transactionKey = $transactionKey;
	}

	/**
	 * @return the $apiId
	 */
	public function getApiId() {
		switch ($this->getEnvironment()):
        case(1):
        	$this->apiId = $this->liveApiLoginId;
        break;
        case (2):
        	$this->apiId = $this->testApiLoginId;
        	break;
        case(3):
        	$this->apiId = $this->sandboxApiLoginId;
        	break;
        	endswitch;
        return $this->apiId;
	}

	/**
	 * @param field_type $apiId
	 */
	public function setApiId($apiId) {
		$this->apiId = $apiId;
	}

	/**
	 * @return the $md5Settings
	 */
	public function getMd5Settings() {	    
	    switch ($this->getEnvironment()):
	    case(1):
	    	$this->md5Settings = $this->liveApiMd5;
	    break;
	    case (2):
	    	$this->md5Settings = $this->testApiMd5;
	    	break;
	    case(3):
	    	$this->md5Settings = $this->sandboxApiMd5;
	    	break;
	    	endswitch;
	    return $this->md5Settings;
	}

	/**
	 * @param string $md5Settings
	 */
	public function setMd5Settings($md5Settings) {
		$this->md5Settings = $md5Settings;
	}

	/**
     * @return the $environment
     */
    public function getEnvironment() {
    	return $this->environment;
    }
    
    /**
     * @param field_type $environment
     */
    protected function setEnvironment($environment) {
    	$this->environment = $environment;
    }    
    
    /**
	 * @return the $postUrl
	 */
	public function getPostUrl() {
	    switch ($this->getEnvironment()):
	    case(1):
	    	$this->postUrl = $this->liveApiUrl;
	    break;
	    case (2):
	    	$this->postUrl = $this->testApiUrl;
	    	break;
	    case(3):
	    	$this->postUrl = $this->sandboxApiUrl;
	    	break;
	    	endswitch;
	    return $this->postUrl;	
	}

	/**
	 * @param string $postUrl
	 */
	public function setPostUrl($postUrl) {
	    $this->postUrl = $postUrl;		
	}

    /**
     * set success redirect route
     *
     * @param string $successRedirectRoute
     * @return ModuleOptions
     */
    public function setSuccessRedirectRoute($successRedirectRoute) {
        $this->successRedirectRoute = $successRedirectRoute;
        return $this;
    }

    /**
     * get success redirect route
     *
     * @return string
     */
    public function getSuccessRedirectRoute() {
        return $this->successRedirectRoute;
    }

    /**
     * set error redirect route
     *
     * @param string $errorRedirectRoute
     * @return ModuleOptions
     */
    public function setErrorRedirectRoute($errorRedirectRoute) {
        $this->errorRedirectRoute = $errorRedirectRoute;
        return $this;
    }

    /**
     * get error redirect route
     *
     * @return string
     */
    public function geterrorRedirectRoute() {
        return $this->errorRedirectRoute;
    }

    /**
     * set use redirect param if present
     *
     * @param bool $useRedirectParameterIfPresent
     * @return ModuleOptions
     */
    public function setUseRedirectParameterIfPresent($useRedirectParameterIfPresent) {
        $this->useRedirectParameterIfPresent = $useRedirectParameterIfPresent;
        return $this;
    }

    /**
     * get use redirect param if present
     *
     * @return bool
     */
    public function getUseRedirectParameterIfPresent() {
        return $this->useRedirectParameterIfPresent;
    }

    /**
     * set the view template for the user login widget
     *
     * @param string $paymentWidgetViewTemplate
     * @return ModuleOptions
     */
    public function setPaymentWidgetViewTemplate($paymentWidgetViewTemplate) {
        $this->paymentWidgetViewTemplate = $paymentWidgetViewTemplate;
        return $this;
    }

    /**
     * get the view template for the authnet login widget
     *
     * @return string
     */
    public function getPaymentWidgetViewTemplate() {
        return $this->PaymentWidgetViewTemplate;
    }


    /**
     * set authnet form timeout in seconds
     *
     * @param int $paymentFormTimeout
     * @return ModuleOptions
     */
    public function setPaymentFormTimeout($paymentFormTimeout) {
        $this->paymentFormTimeout = $paymentFormTimeout;
        return $this;
    }

    /**
     * get authnet form timeout in seconds
     *
     * @return int
     */
    public function getpaymentFormTimeout() {
        return $this->paymentFormTimeout;
    }

    /**
     * set authnet adapters
     *
     * @param array $authAdapters
     * @return ModuleOptions
     */
    public function setAuthAdapters($authAdapters) {
        $this->authAdapters = $authAdapters;
        return $this;
    }

    /**
     * get auth adapters
     *
     * @return array
     */
    public function getAuthAdapters() {
        return $this->authAdapters;
    }

    /**
     * set auth identity fields
     *
     * @param array $authIdentityFields
     * @return ModuleOptions
     */
    public function setAuthIdentityFields($authIdentityFields) {
        $this->authIdentityFields = $authIdentityFields;
        return $this;
    }

    /**
     * get auth identity fields
     *
     * @return array
     */
    public function getAuthIdentityFields() {
        return $this->authIdentityFields;
    }


    /**
     * set use a captcha in registration form
     *
     * @param bool $useRegistrationFormCaptcha
     * @return ModuleOptions
     */
    public function setUseRegistrationFormCaptcha($useRegistrationFormCaptcha) {
        $this->useRegistrationFormCaptcha = $useRegistrationFormCaptcha;
        return $this;
    }

    /**
     * get use a captcha in registration form
     *
     * @return bool
     */
    public function getUseRegistrationFormCaptcha() {
        return $this->useRegistrationFormCaptcha;
    }


    /**
     * set user table name
     * 
     * @param string $tableName
     */
    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }

    /**
     * get user table name
     * 
     * @return string
     */
    public function getTableName() {
        return $this->tableName;
    }

    /**
     * set form CAPTCHA options
     *
     * @param array $formCaptchaOptions
     * @return ModuleOptions
     */
    public function setFormCaptchaOptions($formCaptchaOptions) {
        $this->formCaptchaOptions = $formCaptchaOptions;
        return $this;
    }

    /**
     * get form CAPTCHA options
     *
     * @return array
     */
    public function getFormCaptchaOptions() {
        return $this->formCaptchaOptions;
    }

}
