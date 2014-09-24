<?php
 
namespace Transcript\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * States
 *
 * @ORM\Table(name="states")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class States
{
    /**               
     * @ORM\Column(name="country", type="string", nullable=false)
     */
    private $country;
 
    /**
     * @ORM\Column(name="state", type="string", nullable=false)
     */
    private $state;
    
    /**
     * @ORM\Column(name="descr", type="string", length=2, nullable=true)
     */
    private $descr;

    
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
    	$this->country = $data['country'];
    	$this->state = $data['state'];
    	$this->descr = $data['descr'];
    }
       
}