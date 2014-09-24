<?php
 
namespace Application\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation; 

/**
 * user_role_linker
 *
 * @ORM\Table(name="user_role_linker")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */

class UserRoleLinker
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;
    /** 
    * @ORM\Id              
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $user_id;
 
    /**
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     */
    private $role_id;
        
    public function __get($property)
    {
    	return $this->$property;
    }
    
    public function __set($property, $value)
    {
    	$this->$property = $value;
    }
    
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
    
    public function populate($data = array())
    {
    	$this->id = $data['id'];
    	$this->role_id = $data['role_id'];
    }       
}