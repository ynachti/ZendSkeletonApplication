<?php
 
namespace Transcript\Entity;
 
use Doctrine\ORM\Mapping as ORM;

/**
 * Shipping
 *
 * @ORM\Table(name="shipping")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Shipping
{
    /**     
     * @ORM\Id          
     * @ORM\Column(name="shipping_id", type="integer", nullable=false)
     */
    private $shipping_id;
 
    /**
     * @ORM\Column(name="shipping_desc", type="integer", nullable=false)
     */
    private $shipping_desc;
    
    /**
     * @ORM\Column(name="shipping_cost", type="integer",  nullable=true)
     */
    private $shipping_cost; 
    
    /**
     * @ORM\Column(name="display_order", type="integer", length=50)
     */
    private $display_order;
    
    /**
     * @ORM\Column(name="effective_date", type="date", length=50)
     */
    private $effective_date;
    
    /**
     * @ORM\Column(name="effective_status", type="string")
     */
    private $effective_status;
    
    /**
     * @ORM\Column(name="shipping_short", type="string")
     */
    private $shipping_short;
    
    /**
     * @ORM\Column(name="intl_shipping_cost", type="string")
     */
    private $intl_shipping_cost;
        
    
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
    	
    	$this->shipping_id = $data['shipping_id'];
    	$this->shipping_desc = $data['shipping_desc'];
    	$this->shipping_cost = $data['shipping_cost'];
        $this->display_order = $data['display_order'];
        $this->effective_date = $data['effective_date'];
        $this->effective_status = $data['effective_status'];
        $this->shipping_short = $data['shipping_short'];
        $this->intl_shipping_cost = $data['intl_shipping_cost'];
    }
       
}