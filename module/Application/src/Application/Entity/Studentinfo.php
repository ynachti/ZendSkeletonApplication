<?php
 
namespace Application\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation; 
/**
 * Countries
 *
 * @ORM\Table(name="ps_housing")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Studentinfo
{
    /**     
     * @ORM\Id          
     * @ORM\Column(name="emplid", type="integer", nullable=false)
     */
    private $emplid;
 
    /**
     * @ORM\Column(name="last_name", type="string", nullable=false)
     */
    private $last_name;
    
    /**
     * @ORM\Column(name="first_name", type="string", nullable=false)
     */
    private $first_name;

    /**
     * @ORM\Column(name="middle_name", type="string", nullable=false)
     */
    private $middle_name;
        
    /**
     * @ORM\Column(name="sex", type="string", nullable=false)
     */
    private $sex;

    /**
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;
    
    
    /**
     * @ORM\Column(name="address1", type="string", nullable=false)
     */
    private $address1;
    
    /**
     * @ORM\Column(name="city", type="string", nullable=false)
     */
    private $city;
    
    /**
     * @ORM\Column(name="state", type="string", nullable=false)
     */
    private $state;
    
    /**
     * @ORM\Column(name="postal", type="string", nullable=false)
     */
    private $postal;

    /**
     * @ORM\Column(name="country", type="string")
     */
    private $country;
    
    /**
     * @ORM\Column(name="phone", type="string")
     */
    private $phone;
    
    /**
     * @ORM\Column(name="email", type="string")
     */
    private $email;
    
    /**
     * @ORM\Column(name="acad_career", type="string")
     */
    private $acad_career;
    
    /**
     * @ORM\Column(name="academic_level", type="string")
     */
    private $academic_level;
    
    
    /**
     * @ORM\Column(name="acad_plan", type="string")
     */
    private $acad_plan;
    
    /**
     * @ORM\Column(name="unl_plan_descr", type="string")
     */
    private $unl_plan_descr;
    
    /**
     * @ORM\Column(name="unl_acad_lvl_descr", type="string")
     */
    private $unl_acad_lvl_descr;
    
    
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
    	$this->emplid = $data['emplid'];
    	$this->last_name = $data['last_name'];
    	$this->first_name = $data['first_name'];    	
    	$this->middle_name = $data['middle_name'];    	
    	$this->sex = $data['sex'];    	
    	$this->address1 = $data['address1'];    	
       	$this->city = $data['city'];    	
       	$this->state = $data['state'];    	
       	$this->postal = $data['postal'];    	
       	$this->phone = $data['phone'];    	
       	$this->email = $data['email'];       	       	
       	$this->acad_career = $data['acad_career'];
       	$this->academic_level = $data['academic_level'];
       	$this->acad_plan = $data['acad_plan'];
       	$this->unl_plan_descr = $data['unl_plan_descr'];
       	$this->unl_acad_lvl_descr = $data['unl_acad_lvl_descr'];
    }
       
}