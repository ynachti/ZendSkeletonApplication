<?php
namespace Authnet\Form;

use Zend\Form\Annotation;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("DpmForm")
 */
class DpmForm
{

    /**
     * ************************* B I L L I N G **************************
     */
    
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required({"required":"true" })
     * @Annotation\Options({"label":"First Name: "})
     */
    public $x_first_name;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Last Name: "})
     */
    public $x_last_name;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":60}})
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Company: "})
     */
    public $x_company;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Address: "})
     */
    public $x_address;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":5}})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"City:"})
     */
    public $x_city;

    /**
     * @Annotation\Type("Select")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"State",
     *                      "value_options" : {
     * "AL" : "Alabama", "AK" : "Alaska", "AZ" : "Arizona", "AR" : "Arkansas", "CA" : "California", "CO" : "Colorado", "CT" : "Connecticut", "DE" : "Delaware",
     * "DC" : "District Of Columbia", "FL" : "Florida", "GA" : "Georgia", "HI" : "Hawaii", "ID" : "Idaho", "IL" : "Illinois", "IN" : "Indiana", "IA" : "Iowa",
     * "KS" : "Kansas", "KY" : "Kentucky", "LA" : "Louisiana", "ME" : "Maine", "MD" : "Maryland", "MA" : "Massachusetts", "MI" : "Michigan", "MN" : "Minnesota",
     * "MS" : "Mississippi", "MO" : "Missouri", "MT" : "Montana", "NE" : "Nebraska", "NV" : "Nevada", "NH" : "New Hampshire", "NJ" : "New Jersey", "NM" : "New Mexico",
     * "NY" : "New York", "NC" : "North Carolina", "ND" : "North Dakota", "OH" : "Ohio", "OK" : "Oklahoma", "OR" : "Oregon", "PA" : "Pennsylvania", "RI" : "Rhode Island",
     * "SC" : "South Carolina", "SD" : "South Dakota", "TN" : "Tennessee", "TX" : "Texas", "UT" : "Utah", "VT" : "Vermont", "VA" : "Virginia", "WA" : "Washington",
     * "WV" : "West Virginia", "WI" : "Wisconsin", "WY" : "Wyoming"
     * }})
     * @Annotation\Validator({"name":"InArray",
     *                        "options":{
     *                          "haystack" : {
     *                              "AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY"},
     *                          "messages":{"notInArray" : "Please Select a State"}
     *                        }
     *                      })
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_state;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Zipcode: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     * @Annotation\Attributes({"style":"width:80px;"})
     */
    public $x_zip;

    /**
     * @Annotation\Type("Select")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({
     *                      "label" : "Country",
     *                      "value_options" : {"USA" : "United States of America", "ABW":"Aruba","AFG":"Afghanistn","AGO":"Angola","AIA":"Anguilla","ALB":"Albania","AND":"Andorra","ANT":"Nth Antill","ARE":"UEA","ARG":"Argentina","ARM":"Armenia","ASM":"Am Samoa","ATA":"Antarctica","ATF":"Fr S Terr","ATG":"Antigua","AUS":"Australia","AUT":"Austria","AZE":"Azerbaijan","AZO":"Azores","BDI":"Burundi","BEL":"Belgium","BEN":"Benin","BFA":"Burkina F","BGD":"Bangladesh","BGR":"Bulgaria","BHR":"Bahrain","BHS":"Bahamas","BIH":"Bosnia Her","BLR":"Belarus","BLZ":"Belize","BMU":"Bermuda","BOL":"Bolivia","BRA":"Brazil","BRB":"Barbados","BRN":"Brunei","BTN":"Bhutan","BVT":"Bouvet Is.","BWA":"Botswana","CAF":"Central Af","CAN":"Canada","CCK":"Cocos Is.","CHE":"Switzerlan","CHL":"Chile","CHN":"China","CIL":"Canary Is","CIV":"Cote D'ivoire","CMR":"Cameroon","COD":"Congo, The","COG":"Congo","COK":"Cook Is.","COL":"Colombia","COM":"Comoros","CPV":"Cape Verde","CRI":"Costa Rica","CUB":"Cuba","CXR":"Christmas","CYM":"Cayman Is.","CYP":"Cyprus","CZE":"Czech Rep","DEU":"Germany","DJI":"Djibouti","DMA":"Dominica","DNK":"Denmark","DOM":"Dominican","DZA":"Algeria","ECU":"Ecuador","EGY":"Egypt","ERI":"Eritrea","ESH":"W Sahara","ESP":"Spain","EST":"Estonia","ETH":"Ethiopia","FIN":"Finland","FJI":"Fiji","FLK":"Falkland I","FRA":"France","FRO":"Faroe Is.","FSM":"Micronesia","GAB":"Gabon","GBR":"UK","GEO":"Georgia","GHA":"Ghana","GIB":"Gibraltar","GIN":"Guinea","GLP":"Guadeloupe","GMB":"Gambia","GNB":"Guinea-Bis","GNQ":"Guinea","GRC":"Greece","GRD":"Grenada","GRL":"Greenland","GTM":"Guatemala","GUF":"Fr Guiana","GUM":"Guam","GUY":"Guyana","GZA":"Gaza","HKG":"Hong Kong","HMD":"Heard Is","HND":"Honduras","HRV":"Croatia","HTI":"Haiti","HUN":"Hungary","IDN":"Indonesia","IND":"India","IOM":"Isle of Ma","IOT":"BritishIOT","IRL":"Ireland","IRN":"Iran","IRQ":"Iraq","ISL":"Iceland","ISR":"Israel","ITA":"Italy","JAM":"Jamaica","JOR":"Jordan","JPN":"Japan","KAZ":"Kazakstan","KEN":"Kenya","KGZ":"Kyrgyzstan","KHM":"Cambodia","KIR":"Kiribati","KNA":"St Kitts","KOR":"Sth Korea","KOS":"Kosovo","KWT":"Kuwait","LAO":"Lao","LBN":"Lebanon","LBR":"Liberia","LBY":"Libyan Ara","LCA":"St Lucia","LIE":"Liechtenst","LKA":"Sri Lanka","LSO":"Lesotho","LTU":"Lithuania","LUX":"Luxembourg","LVA":"Latvia","MAC":"Macao","MAR":"Morocco","MCO":"Monaco","MDA":"Moldova","MDG":"Madagascar","MDI":"Madeira Is","MDV":"Maldives","MEX":"Mexico","MHL":"Marshall I","MKD":"Macedonia","MLI":"Mali","MLT":"Malta","MMR":"Myanmar","MNE":"Montenegro","MNG":"Mongolia","MNP":"N Marina I","MON":"Montenegro","MOZ":"Mozambique","MRT":"Mauritania","MSR":"Montserrat","MTQ":"Martinique","MUS":"Mauritius","MWI":"Malawi","MYS":"Malaysia","MYT":"Mayotte","NAM":"Namibia","NCL":"New Caledo","NER":"Niger","NFK":"Norfolk Is","NGA":"Nigeria","NIC":"Nicaragua","NIU":"Niue","NLD":"Netherland","NOR":"Norway","NPL":"Nepal","NRU":"Nauru","NZL":"NZ","OMN":"Oman","PAK":"Pakistan","PAN":"Panama","PCN":"Pitcairn","PER":"Peru","PHL":"Philippine","PLW":"Palau","PNG":"PNG","POL":"Poland","PRI":"Puerto Rco","PRK":"Nth Korea","PRT":"Portugal","PRY":"Paraguay","PSE":"Palestinia","PYF":"Fr Polynes","QAT":"Qatar","REU":"Reunion","ROU":"Romania","RUS":"Russian Fd","RWA":"Rwanda","SAU":"Saudi Arab","SCG":"Ser \u0026 Mont","SCT":"Scotland","SDN":"Sudan","SEN":"Senegal","SER":"Serbia","SGP":"Singapore","SGS":"S Georgia","SHN":"St Helena","SJM":"Svalbard","SLB":"Solomon Is","SLE":"Sierra Leo","SLV":"ElSalvador","SMR":"San Marino","SOM":"Somalia","SPM":"St Pierre","SRB":"Serbia","STP":"Sao Tome","SUR":"Suriname","SVK":"Slovakia","SVN":"Slovenia","SWE":"Sweden","SWZ":"Swaziland","SYC":"Seychelles","SYR":"Syrian Ara","TAH":"Tahiti","TCA":"Turks Is","TCD":"Chad","TGO":"Togo","THA":"Thailand","TJK":"Tajikistan","TKL":"Tokelau","TKM":"Turkmenstn","TLS":"East Timor","TON":"Tonga","TTO":"Trinidad","TUN":"Tunisia","TUR":"Turkey","TUV":"Tuvalu","TWN":"Taiwan","TZA":"Tanzania","UGA":"Uganda","UKR":"Ukraine","UMI":"US Islands","URY":"Uruguay","UZB":"Uzbekistan","VAT":"Vatican","VCT":"St Vincent","VEN":"Venezuela","VGB":"BrVirginIs","VIR":"VirginIsUS","VNM":"Viet Nam","VUT":"Vanuatu","WAL":"Wales","WBK":"West Bank","WLF":"Wallis and","WSM":"Samoa","YEM":"Yemen","YUG":"Yugoslavia","ZAF":"Sth Africa","ZMB":"Zambia","ZWE":"Zimbabwe"}})
     * @Annotation\validator({"name" : "InArray",
     *                        "options" : {"haystack" : {
     *                                      "ABW", "AFG", "AGO", "AIA", "ALB", "AND", "ANT", "ARE", "ARG", "ARM", "ASM", "ATA", "ATF", "ATG", "AUS", "AUT", "AZE", "AZO", "BDI", "BEL", "BEN", "BFA", "BGD", "BGR", "BHR", "BHS", "BIH", "BLR", "BLZ", "BMU", "BOL", "BRA", "BRB", "BRN", "BTN", "BVT", "BWA", "CAF", "CAN", "CCK", "CHE", "CHL", "CHN", "CIL", "CIV", "CMR", "COD", "COG", "COK", "COL", "COM", "CPV", "CRI", "CUB", "CXR", "CYM", "CYP", "CZE", "DEU", "DJI", "DMA", "DNK", "DOM", "DZA", "ECU", "EGY", "ERI", "ESH", "ESP", "EST", "ETH", "FIN", "FJI", "FLK", "FRA", "FRO", "FSM", "GAB", "GBR", "GEO", "GHA", "GIB", "GIN", "GLP", "GMB", "GNB", "GNQ", "GRC", "GRD", "GRL", "GTM", "GUF", "GUM", "GUY", "GZA", "HKG", "HMD", "HND", "HRV", "HTI", "HUN", "IDN", "IND", "IOM", "IOT", "IRL", "IRN", "IRQ", "ISL", "ISR", "ITA", "JAM", "JOR", "JPN", "KAZ", "KEN", "KGZ", "KHM", "KIR", "KNA", "KOR", "KOS", "KWT", "LAO", "LBN", "LBR", "LBY", "LCA", "LIE", "LKA", "LSO", "LTU", "LUX", "LVA", "MAC", "MAR", "MCO", "MDA", "MDG", "MDI", "MDV", "MEX", "MHL", "MKD", "MLI", "MLT", "MMR", "MNE", "MNG", "MNP", "MON", "MOZ", "MRT", "MSR", "MTQ", "MUS", "MWI", "MYS", "MYT", "NAM", "NCL", "NER", "NFK", "NGA", "NIC", "NIU", "NLD", "NOR", "NPL", "NRU", "NZL", "OMN", "PAK", "PAN", "PCN", "PER", "PHL", "PLW", "PNG", "POL", "PRI", "PRK", "PRT", "PRY", "PSE", "PYF", "QAT", "REU", "ROU", "RUS", "RWA", "SAU", "SCG", "SCT", "SDN", "SEN", "SER", "SGP", "SGS", "SHN", "SJM", "SLB", "SLE", "SLV", "SMR", "SOM", "SPM", "SRB", "STP", "SUR", "SVK", "SVN", "SWE", "SWZ", "SYC", "SYR", "TAH", "TCA", "TCD", "TGO", "THA", "TJK", "TKL", "TKM", "TLS", "TON", "TTO", "TUN", "TUR", "TUV", "TWN", "TZA", "UGA", "UKR", "UMI", "URY", "USA", "UZB", "VAT", "VCT", "VEN", "VGB", "VIR", "VNM", "VUT", "WAL", "WBK", "WLF", "WSM", "YEM", "YUG", "ZAF", "ZMB", "ZWE"},
     *                        "messages" : {"notInArray" : "Please choose a country"}
     *                        }
     *                      })
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_country;

    /**
     * @Annotation\Type("Zend\Form\Element\Email")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Email: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_email;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Telephone: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_phone;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Fax Number: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_fax;

    /**
     * ************************* S H I P P I N G **************************
     */
    
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required({"required":"true" })
     * @Annotation\Options({"label":"First Name: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_first_name;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Last Name: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_last_name;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":60}})
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Company: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_company;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Address: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_address;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":5}})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"City:"})
     */
    public $x_ship_to_city;

    /**
     * @Annotation\Type("Select")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"State",
     *                      "value_options" : {
     * "AL" : "Alabama", "AK" : "Alaska", "AZ" : "Arizona", "AR" : "Arkansas", "CA" : "California", "CO" : "Colorado", "CT" : "Connecticut", "DE" : "Delaware",
     * "DC" : "District Of Columbia", "FL" : "Florida", "GA" : "Georgia", "HI" : "Hawaii", "ID" : "Idaho", "IL" : "Illinois", "IN" : "Indiana", "IA" : "Iowa",
     * "KS" : "Kansas", "KY" : "Kentucky", "LA" : "Louisiana", "ME" : "Maine", "MD" : "Maryland", "MA" : "Massachusetts", "MI" : "Michigan", "MN" : "Minnesota",
     * "MS" : "Mississippi", "MO" : "Missouri", "MT" : "Montana", "NE" : "Nebraska", "NV" : "Nevada", "NH" : "New Hampshire", "NJ" : "New Jersey", "NM" : "New Mexico",
     * "NY" : "New York", "NC" : "North Carolina", "ND" : "North Dakota", "OH" : "Ohio", "OK" : "Oklahoma", "OR" : "Oregon", "PA" : "Pennsylvania", "RI" : "Rhode Island",
     * "SC" : "South Carolina", "SD" : "South Dakota", "TN" : "Tennessee", "TX" : "Texas", "UT" : "Utah", "VT" : "Vermont", "VA" : "Virginia", "WA" : "Washington",
     * "WV" : "West Virginia", "WI" : "Wisconsin", "WY" : "Wyoming"
     * }})
     * @Annotation\Validator({"name":"InArray",
     *                        "options":{
     *                          "haystack" : {
     *                              "AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY"},
     *                          "messages":{"notInArray" : "Please Select a State"}
     *                        }
     *                      })
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_state;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Zipcode: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     * @Annotation\Attributes({"style":"width:80px;"})
     */
    public $x_ship_to_zip;

    /**
     * @Annotation\Type("Select")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Country: "})
     * @Annotation\Options({
     * "label" : "Country",
     * "value_options" : {"USA" : "United States of America", "ABW":"Aruba","AFG":"Afghanistn","AGO":"Angola","AIA":"Anguilla","ALB":"Albania","AND":"Andorra","ANT":"Nth Antill","ARE":"UEA","ARG":"Argentina","ARM":"Armenia","ASM":"Am Samoa","ATA":"Antarctica","ATF":"Fr S Terr","ATG":"Antigua","AUS":"Australia","AUT":"Austria","AZE":"Azerbaijan","AZO":"Azores","BDI":"Burundi","BEL":"Belgium","BEN":"Benin","BFA":"Burkina F","BGD":"Bangladesh","BGR":"Bulgaria","BHR":"Bahrain","BHS":"Bahamas","BIH":"Bosnia Her","BLR":"Belarus","BLZ":"Belize","BMU":"Bermuda","BOL":"Bolivia","BRA":"Brazil","BRB":"Barbados","BRN":"Brunei","BTN":"Bhutan","BVT":"Bouvet Is.","BWA":"Botswana","CAF":"Central Af","CAN":"Canada","CCK":"Cocos Is.","CHE":"Switzerlan","CHL":"Chile","CHN":"China","CIL":"Canary Is","CIV":"Cote D'ivoire","CMR":"Cameroon","COD":"Congo, The","COG":"Congo","COK":"Cook Is.","COL":"Colombia","COM":"Comoros","CPV":"Cape Verde","CRI":"Costa Rica","CUB":"Cuba","CXR":"Christmas","CYM":"Cayman Is.","CYP":"Cyprus","CZE":"Czech Rep","DEU":"Germany","DJI":"Djibouti","DMA":"Dominica","DNK":"Denmark","DOM":"Dominican","DZA":"Algeria","ECU":"Ecuador","EGY":"Egypt","ERI":"Eritrea","ESH":"W Sahara","ESP":"Spain","EST":"Estonia","ETH":"Ethiopia","FIN":"Finland","FJI":"Fiji","FLK":"Falkland I","FRA":"France","FRO":"Faroe Is.","FSM":"Micronesia","GAB":"Gabon","GBR":"UK","GEO":"Georgia","GHA":"Ghana","GIB":"Gibraltar","GIN":"Guinea","GLP":"Guadeloupe","GMB":"Gambia","GNB":"Guinea-Bis","GNQ":"Guinea","GRC":"Greece","GRD":"Grenada","GRL":"Greenland","GTM":"Guatemala","GUF":"Fr Guiana","GUM":"Guam","GUY":"Guyana","GZA":"Gaza","HKG":"Hong Kong","HMD":"Heard Is","HND":"Honduras","HRV":"Croatia","HTI":"Haiti","HUN":"Hungary","IDN":"Indonesia","IND":"India","IOM":"Isle of Ma","IOT":"BritishIOT","IRL":"Ireland","IRN":"Iran","IRQ":"Iraq","ISL":"Iceland","ISR":"Israel","ITA":"Italy","JAM":"Jamaica","JOR":"Jordan","JPN":"Japan","KAZ":"Kazakstan","KEN":"Kenya","KGZ":"Kyrgyzstan","KHM":"Cambodia","KIR":"Kiribati","KNA":"St Kitts","KOR":"Sth Korea","KOS":"Kosovo","KWT":"Kuwait","LAO":"Lao","LBN":"Lebanon","LBR":"Liberia","LBY":"Libyan Ara","LCA":"St Lucia","LIE":"Liechtenst","LKA":"Sri Lanka","LSO":"Lesotho","LTU":"Lithuania","LUX":"Luxembourg","LVA":"Latvia","MAC":"Macao","MAR":"Morocco","MCO":"Monaco","MDA":"Moldova","MDG":"Madagascar","MDI":"Madeira Is","MDV":"Maldives","MEX":"Mexico","MHL":"Marshall I","MKD":"Macedonia","MLI":"Mali","MLT":"Malta","MMR":"Myanmar","MNE":"Montenegro","MNG":"Mongolia","MNP":"N Marina I","MON":"Montenegro","MOZ":"Mozambique","MRT":"Mauritania","MSR":"Montserrat","MTQ":"Martinique","MUS":"Mauritius","MWI":"Malawi","MYS":"Malaysia","MYT":"Mayotte","NAM":"Namibia","NCL":"New Caledo","NER":"Niger","NFK":"Norfolk Is","NGA":"Nigeria","NIC":"Nicaragua","NIU":"Niue","NLD":"Netherland","NOR":"Norway","NPL":"Nepal","NRU":"Nauru","NZL":"NZ","OMN":"Oman","PAK":"Pakistan","PAN":"Panama","PCN":"Pitcairn","PER":"Peru","PHL":"Philippine","PLW":"Palau","PNG":"PNG","POL":"Poland","PRI":"Puerto Rco","PRK":"Nth Korea","PRT":"Portugal","PRY":"Paraguay","PSE":"Palestinia","PYF":"Fr Polynes","QAT":"Qatar","REU":"Reunion","ROU":"Romania","RUS":"Russian Fd","RWA":"Rwanda","SAU":"Saudi Arab","SCG":"Ser \u0026 Mont","SCT":"Scotland","SDN":"Sudan","SEN":"Senegal","SER":"Serbia","SGP":"Singapore","SGS":"S Georgia","SHN":"St Helena","SJM":"Svalbard","SLB":"Solomon Is","SLE":"Sierra Leo","SLV":"ElSalvador","SMR":"San Marino","SOM":"Somalia","SPM":"St Pierre","SRB":"Serbia","STP":"Sao Tome","SUR":"Suriname","SVK":"Slovakia","SVN":"Slovenia","SWE":"Sweden","SWZ":"Swaziland","SYC":"Seychelles","SYR":"Syrian Ara","TAH":"Tahiti","TCA":"Turks Is","TCD":"Chad","TGO":"Togo","THA":"Thailand","TJK":"Tajikistan","TKL":"Tokelau","TKM":"Turkmenstn","TLS":"East Timor","TON":"Tonga","TTO":"Trinidad","TUN":"Tunisia","TUR":"Turkey","TUV":"Tuvalu","TWN":"Taiwan","TZA":"Tanzania","UGA":"Uganda","UKR":"Ukraine","UMI":"US Islands","URY":"Uruguay","UZB":"Uzbekistan","VAT":"Vatican","VCT":"St Vincent","VEN":"Venezuela","VGB":"BrVirginIs","VIR":"VirginIsUS","VNM":"Viet Nam","VUT":"Vanuatu","WAL":"Wales","WBK":"West Bank","WLF":"Wallis and","WSM":"Samoa","YEM":"Yemen","YUG":"Yugoslavia","ZAF":"Sth Africa","ZMB":"Zambia","ZWE":"Zimbabwe"}})
     * @Annotation\validator({"name" : "InArray",
     *                        "options" : {"haystack" : {
     *                                      "ABW", "AFG", "AGO", "AIA", "ALB", "AND", "ANT", "ARE", "ARG", "ARM", "ASM", "ATA", "ATF", "ATG", "AUS", "AUT", "AZE", "AZO", "BDI", "BEL", "BEN", "BFA", "BGD", "BGR", "BHR", "BHS", "BIH", "BLR", "BLZ", "BMU", "BOL", "BRA", "BRB", "BRN", "BTN", "BVT", "BWA", "CAF", "CAN", "CCK", "CHE", "CHL", "CHN", "CIL", "CIV", "CMR", "COD", "COG", "COK", "COL", "COM", "CPV", "CRI", "CUB", "CXR", "CYM", "CYP", "CZE", "DEU", "DJI", "DMA", "DNK", "DOM", "DZA", "ECU", "EGY", "ERI", "ESH", "ESP", "EST", "ETH", "FIN", "FJI", "FLK", "FRA", "FRO", "FSM", "GAB", "GBR", "GEO", "GHA", "GIB", "GIN", "GLP", "GMB", "GNB", "GNQ", "GRC", "GRD", "GRL", "GTM", "GUF", "GUM", "GUY", "GZA", "HKG", "HMD", "HND", "HRV", "HTI", "HUN", "IDN", "IND", "IOM", "IOT", "IRL", "IRN", "IRQ", "ISL", "ISR", "ITA", "JAM", "JOR", "JPN", "KAZ", "KEN", "KGZ", "KHM", "KIR", "KNA", "KOR", "KOS", "KWT", "LAO", "LBN", "LBR", "LBY", "LCA", "LIE", "LKA", "LSO", "LTU", "LUX", "LVA", "MAC", "MAR", "MCO", "MDA", "MDG", "MDI", "MDV", "MEX", "MHL", "MKD", "MLI", "MLT", "MMR", "MNE", "MNG", "MNP", "MON", "MOZ", "MRT", "MSR", "MTQ", "MUS", "MWI", "MYS", "MYT", "NAM", "NCL", "NER", "NFK", "NGA", "NIC", "NIU", "NLD", "NOR", "NPL", "NRU", "NZL", "OMN", "PAK", "PAN", "PCN", "PER", "PHL", "PLW", "PNG", "POL", "PRI", "PRK", "PRT", "PRY", "PSE", "PYF", "QAT", "REU", "ROU", "RUS", "RWA", "SAU", "SCG", "SCT", "SDN", "SEN", "SER", "SGP", "SGS", "SHN", "SJM", "SLB", "SLE", "SLV", "SMR", "SOM", "SPM", "SRB", "STP", "SUR", "SVK", "SVN", "SWE", "SWZ", "SYC", "SYR", "TAH", "TCA", "TCD", "TGO", "THA", "TJK", "TKL", "TKM", "TLS", "TON", "TTO", "TUN", "TUR", "TUV", "TWN", "TZA", "UGA", "UKR", "UMI", "URY", "USA", "UZB", "VAT", "VCT", "VEN", "VGB", "VIR", "VNM", "VUT", "WAL", "WBK", "WLF", "WSM", "YEM", "YUG", "ZAF", "ZMB", "ZWE"},
     *                        "messages" : {"notInArray" : "Please choose a country"}
     *                        }
     *                      })
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_country;

    /**
     * @Annotation\Type("Zend\Form\Element\Email")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Email: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_email;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Telephone: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_phone;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Validator({"name":"StringLength", "options":{"min":8, "max":16}})
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Fax Number: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_ship_to_fax;

    /**
     * ************************* C R E D I T C A R D **************************
     */
    /**
     * \m(?:4[0-9]{12}(?:[0-9]{3})?|5[12345][0-9]{14}|3[47][0-9]{13}|3(?:0[012345]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}|(?:2131|1800|35[0-9]{3})[0-9]{11})\M
     *
     * Visa: ^4[0-9]{6,}$ Visa card numbers start with a 4.
     *
     * MasterCard: ^5[1-5][0-9]{5,}$ MasterCard numbers start with the numbers 51 through 55, but this will only detect MasterCard credit cards; there are other cards issued using the MasterCard system that do not fall into this IIN range.
     *
     * American Express: ^3[47][0-9]{5,}$ American Express card numbers start with 34 or 37.
     *
     * Diners Club: ^3(?:0[0-5]|[68][0-9])[0-9]{4,}$ Diners Club card numbers begin with 300 through 305, 36 or 38. There are Diners Club cards that begin with 5 and have 16 digits. These are a joint venture between Diners Club and MasterCard, and should be processed like a MasterCard.
     *
     * Discover: ^6(?:011|5[0-9]{2})[0-9]{3,}$ Discover card numbers begin with 6011 or 65.
     *
     * *
     */
    
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Credit Card Number"})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     * @Annotation\Attributes({"id":"x_card_num"})
     * @Annotation\Validator({"name" : "InArray",
     *                        "options" : {
     *                          "haystack" : {"4012888818888"},                                      
     *                          "messages" : {"notInArray" : "Invalid Credit Card"}
     *                        }
     *                      })
     */
    public $x_card_num;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Exp Date: "})
     * @Annotation\Attributes({"style":"width:40px;"})
     * @Annotation\Attributes({"id":"x_exp_date"})
     * @Annotation\Attributes({"placeholder":"MM/YY"})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     */
    public $x_exp_date;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":3, "max":3}})
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"CCV: "})
     * @Annotation\Attributes({"labelclass":"controls-row-medium"})
     * @Annotation\Attributes({"id":"x_card_code"})
     * @Annotation\Attributes({"style":"width:40px;"})
     */
    public $x_card_code;

    /**
     * ************************* B A N K A C C O U N T **************************
     */
    
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":3, "max":3}})
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Bank Name: "})
     * @Annotation\Attributes({"labelclass":"controls-row-long"})
     */
    public $x_bank_name;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":3, "max":3}})
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Bank Account Number: "})
     * @Annotation\Attributes({"labelclass":"controls-row-long"})
     */
    public $x_acct_num;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":3, "max":3}})
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"ABA Routing Number: "})
     * @Annotation\Attributes({"labelclass":"controls-row-long"})
     */
    public $x_route_num;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":3, "max":3}})
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Name on Account: "})
     * @Annotation\Attributes({"labelclass":"controls-row-long"})
     */
    public $x_acct_name;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Validator({"name":"StringLength", "options":{"min":3, "max":3}})
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Bank Account Type: "})
     * @Annotation\Attributes({"labelclass":"controls-row-long"})
     */
    public $x_acct_type;
    
    /**
     * @Annotation\Type("Zend\Form\Element\Csrf")     
     */
    public $csrf;
    
}

?>