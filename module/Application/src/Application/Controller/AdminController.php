<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * AdminController
 *
 * @author
 *
 * @version
 *
 */
class AdminController extends AbstractActionController
{

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $sessionStorage = new \Application\Model\StSessionStorage;
        
        $url_encoded = base64_encode('http://sltdev.studentlife.unlv.edu/yassine/');
        $url_decoded = base64_decode($url_encoded);
        $sessId = $sessionStorage->getSessionId();
        
        // this is code that will be used in the authnet module
        
        // TODO Auto-generated AdminController::indexAction() default action
        return new ViewModel(array(
            'sessionid' => 'Session Id: <b>'. $sessId . '</b>',
            'encoded_url' => $url_encoded,
            'decoded_url' => $url_decoded
        ));
    }

}