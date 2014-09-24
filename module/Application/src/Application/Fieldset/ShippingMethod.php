<?php

/**
 * @Desc Shipping Method  *
 * @author ynachti
 */

namespace Application\Fieldset;

use Zend\Form\Annotation;

/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("mail")
 * @Annotation\Type("form")
 * @Annotation\Attributes({"style" : "margin-left: 100px", "class" : "form_horizontal", "label-class" : "control-label"})
 * @Annotation\Options({"label" : "Mail delivery"})
 */

class ShippingMethod {
    
    /**
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Name("shipping_method")
     * @Annotation\Attributes({"id" : "shipping_method", "options" : {"0" : "Choose a method", "1" : "USPS 1st Class", "2" : "USPS Priority 2-3 days", "3" : "USPS Express 1-2 days"}})
     * @Annotation\Options({"label" : "Shipping Method"})
     */
    public $shipping_method;
    
}

?>