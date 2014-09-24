<?php
/**
 * @module Application
 * @desc  session storage to keep the zfcuser session and time it out somewhere
 * @package Application/src/Application/Model/StSessionStorage.php
 * @author Yassine Nachti <yassine.nachti@unlv.edu>
 */

namespace Application\Model;

use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\ServiceManager\ServiceLocatorInterface;


class StSessionStorage extends SessionStorage 
{

	/**
	 * Return session manager for customization
	 */
	public function getSessionManager() {		
		return $this->session->getManager();
	}
	public function getSessionId() {
		return $this->getSessionManager()->getId();
	}

	
}