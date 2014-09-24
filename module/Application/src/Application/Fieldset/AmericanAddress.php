<?php

namespace Application\Fieldset;

use Zend\Form\Annotation;

/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Type("form")
 */
class AmericanAddress {
    
    /**
     * @Annotation\Attributes({"type":"text", "id" : "institution", "label-class" : "control-label", "size" : "70" })
     * @Annotation\Options({"label":"Institution"})
     * @Annotation\Required({"required"})
     */
    public $institution;

    /**
     * @Annotation\Attributes({"type":"text", "id" : "line1", "label-class" : "control-label", "size" : "100" })
     * @Annotation\Options({"label":"Address"})
     * @Annotation\Required({"required"})
     */
    public $line1;

    /**
     * @Annotation\Attributes({"type":"text", "id" : "line2", "label-class" : "control-label", "size" : "100" })
     * @Annotation\Options({"label":"Line 2"})
     */
    public $line2;

    /**
     * @Annotation\Attributes({"type":"text", "id" : "city", "label-class" : "control-label", "size" : "20" })
     * @Annotation\Options({"label":"City"})
     */
    public $city;

    /**
     * @Annotation\Type("select")
     * @Annotation\Name("state")
     * @Annotation\Attributes({"type":"select", "id" : "state", "label-class" : "control-label"})
     * @Annotation\Options({
     *                      "label":"State",
     *                      "value_options" : {
     *                          "AL" : "Alabama", "AK" : "Alaska", "AZ" : "Arizona", "AR" : "Arkansas", "CA" : "California", "CO" : "Colorado", "CT" : "Connecticut", "DE" : "Delaware", 
     *                          "DC" : "District Of Columbia", "FL" : "Florida", "GA" : "Georgia", "HI" : "Hawaii", "ID" : "Idaho", "IL" : "Illinois", "IN" : "Indiana", "IA" : "Iowa", 
     *                          "KS" : "Kansas", "KY" : "Kentucky", "LA" : "Louisiana", "ME" : "Maine", "MD" : "Maryland", "MA" : "Massachusetts", "MI" : "Michigan", "MN" : "Minnesota", 
     *                          "MS" : "Mississippi", "MO" : "Missouri", "MT" : "Montana", "NE" : "Nebraska", "NV" : "Nevada", "NH" : "New Hampshire", "NJ" : "New Jersey", "NM" : "New Mexico", 
     *                          "NY" : "New York", "NC" : "North Carolina", "ND" : "North Dakota", "OH" : "Ohio", "OK" : "Oklahoma", "OR" : "Oregon", "PA" : "Pennsylvania", "RI" : "Rhode Island", 
     *                          "SC" : "South Carolina", "SD" : "South Dakota", "TN" : "Tennessee", "TX" : "Texas", "UT" : "Utah", "VT" : "Vermont", "VA" : "Virginia", "WA" : "Washington", 
     *                          "WV" : "West Virginia", "WI" : "Wisconsin", "WY" : "Wyoming" 
     *                      }})
     * @Annotation\Validator({"name":"InArray",
     *                        "options":{
     *                          "haystack" : {
     *                              "AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY"},
     *                                   "messages":{"notInArray" : "Please Select a State"}}
     *                      })
     */
    public $state;    
    
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"id" : "zip", "size" : "10", "maxlength" : "5" })
     * @Annotation\Options({"label":"Post Code/Zip"})
     * @Annotation\Required({"required"})
     * @Annotation\Validator({"name" : "StringLength", "options" : {"min": 5}})
     */
    public $postcode;

}