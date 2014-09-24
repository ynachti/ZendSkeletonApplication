<?php
 
namespace Application\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation; 
/**
 * Countries
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Countries
{
    /**     
     * @ORM\Id          
     * @ORM\Column(name="country", type="string", nullable=false)
     */
    private $country;
 
    /**
     * @ORM\Column(name="descr", type="string", nullable=false)
     */
    private $descr;
    
    /**
     * @ORM\Column(name="descrshort", type="string", length=2, nullable=true)
     */
    private $descrshort;
 
    /**
     * @ORM\Column(name="domestic_shipping", type="string", length=2, nullable=true)
     */
    private $domestic_shipping;
    
    
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
    	$this->descr = $data['descr'];
    	$this->descrshort = $data['descrshort'];    	
    }
       
}