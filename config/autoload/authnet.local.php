<?php

/**
 * @module Authnet
 * @description auto load configuration for authnet
 * @package Autoload/authnet.global.php
 * @author Yassine Nachti <yassine.nachti@unlv.edu>
 */

/**
 * @var settings Global settings on autoload
 */

/*
 * AuthorizeNet settings
 * array key 1 is production
 * array key 2 is test
 * array key 3 is development
 */

$settings = array(
    
    'post_url' => array(
    		1 => 'https://secure.authorize.net/gateway/transact.dll',
    		2 => 'https://test.authorize.net/gateway/transact.dll',
    		3 => 'https://test.authorize.net/gateway/transact.dll'
    ),
    
    'sdk' => getcwd(). '/vendor/Authnet/config/AuthorizeNet.php',
    
    /**
     * fall back relay url
     */
    'default_relay' => 'https://apps.ess.unlv.edu/global/authorizenet/paymentgateway.cfm',
    
    'disclaimer' => 'Your are seeing this form because your request requires a payment',
    
    /**
     * Form Captcha Options
     *
     * Use this to configure which Zend\Captcha adapter to use, and the options to
     * pass to it. The default uses the Figlet captcha.
     */
    'form_captcha_options' => array(
        'class' => 'recaptcha',
        'options' => array(
            'wordLen' => 5,
            'expiration' => 300,
            'timeout' => 300,
        ),
    ),
    
    /**
     * default annotation form
     */
    'authnet_annotated_form' => 'Authnet\Form\DpmForm',
    /**
     * Sets the view template for the user login widget
     * Default value: 'authnet/authnet/request.phtml'
     * Accepted values: string path to a view script
     */
    'authnet_widget_view_template' => 'authnet/authnet/smart-authnet',

    /**
     * error Redirect Route
     *
     * Upon failed Transaction the user will be redirected to the entered route
     * Default value: 'transaction'
     * Accepted values: A valid route name within your application
     *
     */    
    'authnet_widget_error_template' => 'authnet/authnet/error',
    
    /**
     * Success Redirect Route
     *
     * Upon successful transaction the user will be redirected to the enterd route
     *
     * Default value: 'transaction/authnet/request'
     * Accepted values: A valid route name within your application
     */
    'authnet_widget_success_template' => 'authnet/authnet/receipt',

        /*
         * End of Authnet configuration
         */
);

return array(
    'authnet' => $settings
);
?>