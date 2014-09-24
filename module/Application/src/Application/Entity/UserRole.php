<?php
 
namespace Application\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation; 

/**
 * user_role
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */

class UserRole
{
    /**     
     * @ORM\Id          
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;
 
    /**
     * @ORM\Column(name="role_id", type="string", nullable=false)
     */
    private $role_id;
    
    /**
     * @ORM\Column(name="is_default", type="integer", length=1, nullable=true)
     */
    private $is_default;
 
    /**
     * @ORM\Column(name="parent_id", type="integer", length=11, nullable=true)
     */
    private $parent_id;
    
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
    	$this->is_default = $data['is_default'];
    	$this->parent_id = $data['parent_id'];
    }
       
}