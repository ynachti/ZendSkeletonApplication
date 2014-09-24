<?php

namespace Application\Fieldset;

use Zend\Form\Annotation;

/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Type("fieldset")
 * @Annotation\Attributes({"class" : "form-vertical"})
 * 
 */
class ForeignAddress {

    /**
     * @Annotation\Attributes({"type":"text", "id" : "institution", "label-class" : "control-label", "size" : "70" })
     * @Annotation\Options({"label":"Name of Institution Or Individual"})
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
     * @Annotation\Attributes({"type":"text", "id" : "line3", "label-class" : "control-label", "size" : "100" })
     * @Annotation\Options({"label":"Line 3"})
     */
    public $line3;

    /**
     * @Annotation\Attributes({"type":"text", "id" : "line4", "label-class" : "control-label", "size" : "100" })
     * @Annotation\Options({"label":"Line 4"})
     */
    public $line4;

    /**
     * @Annotation\Attributes({"type":"text", "id" : "city", "label-class" : "control-label", "size" : "20" })
     * @Annotation\Options({"label":"City/ Province"})
     * @Annotation\Required({"required"})
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
     * @Annotation\Attributes({"type":"text", "id" : "zip", "size" : "10" })
     * @Annotation\Options({"label":"Post Code/Zip"})
     * @Annotation\Validator({"name" : "StringLength", "options" : {"min": 9, "max": 13}})
     */
    public $postcode;
    
    /**
     * @Annotation\Type("select")
     * @Annotation\Attributes({"type":"select", "id" : "country", "label-class" : "control-label", "style" : "width: auto" })
     * @Annotation\Options({
     *                      "label" : "Country",
     *                      "value_options" : {"USA" : "United States of America", "ABW":"Aruba","AFG":"Afghanistn","AGO":"Angola","AIA":"Anguilla","ALB":"Albania","AND":"Andorra","ANT":"Nth Antill","ARE":"UEA","ARG":"Argentina","ARM":"Armenia","ASM":"Am Samoa","ATA":"Antarctica","ATF":"Fr S Terr","ATG":"Antigua","AUS":"Australia","AUT":"Austria","AZE":"Azerbaijan","AZO":"Azores","BDI":"Burundi","BEL":"Belgium","BEN":"Benin","BFA":"Burkina F","BGD":"Bangladesh","BGR":"Bulgaria","BHR":"Bahrain","BHS":"Bahamas","BIH":"Bosnia Her","BLR":"Belarus","BLZ":"Belize","BMU":"Bermuda","BOL":"Bolivia","BRA":"Brazil","BRB":"Barbados","BRN":"Brunei","BTN":"Bhutan","BVT":"Bouvet Is.","BWA":"Botswana","CAF":"Central Af","CAN":"Canada","CCK":"Cocos Is.","CHE":"Switzerlan","CHL":"Chile","CHN":"China","CIL":"Canary Is","CIV":"Cote D'ivoire","CMR":"Cameroon","COD":"Congo, The","COG":"Congo","COK":"Cook Is.","COL":"Colombia","COM":"Comoros","CPV":"Cape Verde","CRI":"Costa Rica","CUB":"Cuba","CXR":"Christmas","CYM":"Cayman Is.","CYP":"Cyprus","CZE":"Czech Rep","DEU":"Germany","DJI":"Djibouti","DMA":"Dominica","DNK":"Denmark","DOM":"Dominican","DZA":"Algeria","ECU":"Ecuador","EGY":"Egypt","ERI":"Eritrea","ESH":"W Sahara","ESP":"Spain","EST":"Estonia","ETH":"Ethiopia","FIN":"Finland","FJI":"Fiji","FLK":"Falkland I","FRA":"France","FRO":"Faroe Is.","FSM":"Micronesia","GAB":"Gabon","GBR":"UK","GEO":"Georgia","GHA":"Ghana","GIB":"Gibraltar","GIN":"Guinea","GLP":"Guadeloupe","GMB":"Gambia","GNB":"Guinea-Bis","GNQ":"Guinea","GRC":"Greece","GRD":"Grenada","GRL":"Greenland","GTM":"Guatemala","GUF":"Fr Guiana","GUM":"Guam","GUY":"Guyana","GZA":"Gaza","HKG":"Hong Kong","HMD":"Heard Is","HND":"Honduras","HRV":"Croatia","HTI":"Haiti","HUN":"Hungary","IDN":"Indonesia","IND":"India","IOM":"Isle of Ma","IOT":"BritishIOT","IRL":"Ireland","IRN":"Iran","IRQ":"Iraq","ISL":"Iceland","ISR":"Israel","ITA":"Italy","JAM":"Jamaica","JOR":"Jordan","JPN":"Japan","KAZ":"Kazakstan","KEN":"Kenya","KGZ":"Kyrgyzstan","KHM":"Cambodia","KIR":"Kiribati","KNA":"St Kitts","KOR":"Sth Korea","KOS":"Kosovo","KWT":"Kuwait","LAO":"Lao","LBN":"Lebanon","LBR":"Liberia","LBY":"Libyan Ara","LCA":"St Lucia","LIE":"Liechtenst","LKA":"Sri Lanka","LSO":"Lesotho","LTU":"Lithuania","LUX":"Luxembourg","LVA":"Latvia","MAC":"Macao","MAR":"Morocco","MCO":"Monaco","MDA":"Moldova","MDG":"Madagascar","MDI":"Madeira Is","MDV":"Maldives","MEX":"Mexico","MHL":"Marshall I","MKD":"Macedonia","MLI":"Mali","MLT":"Malta","MMR":"Myanmar","MNE":"Montenegro","MNG":"Mongolia","MNP":"N Marina I","MON":"Montenegro","MOZ":"Mozambique","MRT":"Mauritania","MSR":"Montserrat","MTQ":"Martinique","MUS":"Mauritius","MWI":"Malawi","MYS":"Malaysia","MYT":"Mayotte","NAM":"Namibia","NCL":"New Caledo","NER":"Niger","NFK":"Norfolk Is","NGA":"Nigeria","NIC":"Nicaragua","NIU":"Niue","NLD":"Netherland","NOR":"Norway","NPL":"Nepal","NRU":"Nauru","NZL":"NZ","OMN":"Oman","PAK":"Pakistan","PAN":"Panama","PCN":"Pitcairn","PER":"Peru","PHL":"Philippine","PLW":"Palau","PNG":"PNG","POL":"Poland","PRI":"Puerto Rco","PRK":"Nth Korea","PRT":"Portugal","PRY":"Paraguay","PSE":"Palestinia","PYF":"Fr Polynes","QAT":"Qatar","REU":"Reunion","ROU":"Romania","RUS":"Russian Fd","RWA":"Rwanda","SAU":"Saudi Arab","SCG":"Ser \u0026 Mont","SCT":"Scotland","SDN":"Sudan","SEN":"Senegal","SER":"Serbia","SGP":"Singapore","SGS":"S Georgia","SHN":"St Helena","SJM":"Svalbard","SLB":"Solomon Is","SLE":"Sierra Leo","SLV":"ElSalvador","SMR":"San Marino","SOM":"Somalia","SPM":"St Pierre","SRB":"Serbia","STP":"Sao Tome","SUR":"Suriname","SVK":"Slovakia","SVN":"Slovenia","SWE":"Sweden","SWZ":"Swaziland","SYC":"Seychelles","SYR":"Syrian Ara","TAH":"Tahiti","TCA":"Turks Is","TCD":"Chad","TGO":"Togo","THA":"Thailand","TJK":"Tajikistan","TKL":"Tokelau","TKM":"Turkmenstn","TLS":"East Timor","TON":"Tonga","TTO":"Trinidad","TUN":"Tunisia","TUR":"Turkey","TUV":"Tuvalu","TWN":"Taiwan","TZA":"Tanzania","UGA":"Uganda","UKR":"Ukraine","UMI":"US Islands","URY":"Uruguay","UZB":"Uzbekistan","VAT":"Vatican","VCT":"St Vincent","VEN":"Venezuela","VGB":"BrVirginIs","VIR":"VirginIsUS","VNM":"Viet Nam","VUT":"Vanuatu","WAL":"Wales","WBK":"West Bank","WLF":"Wallis and","WSM":"Samoa","YEM":"Yemen","YUG":"Yugoslavia","ZAF":"Sth Africa","ZMB":"Zambia","ZWE":"Zimbabwe"}})
    * @Annotation\validator({
     *                          "name" : "InArray",
     *                          "options" : {
     *                                  "haystack" : {
     * "ABW", "AFG", "AGO", "AIA", "ALB", "AND", "ANT", "ARE", "ARG", "ARM", "ASM", "ATA", "ATF", "ATG", "AUS", "AUT", "AZE", "AZO", "BDI", "BEL", "BEN", "BFA", "BGD", "BGR", "BHR", "BHS", "BIH", "BLR", "BLZ", "BMU", "BOL", "BRA", "BRB", "BRN", "BTN", "BVT", "BWA", "CAF", "CAN", "CCK", "CHE", "CHL", "CHN", "CIL", "CIV", "CMR", "COD", "COG", "COK", "COL", "COM", "CPV", "CRI", "CUB", "CXR", "CYM", "CYP", "CZE", "DEU", "DJI", "DMA", "DNK", "DOM", "DZA", "ECU", "EGY", "ERI", "ESH", "ESP", "EST", "ETH", "FIN", "FJI", "FLK", "FRA", "FRO", "FSM", "GAB", "GBR", "GEO", "GHA", "GIB", "GIN", "GLP", "GMB", "GNB", "GNQ", "GRC", "GRD", "GRL", "GTM", "GUF", "GUM", "GUY", "GZA", "HKG", "HMD", "HND", "HRV", "HTI", "HUN", "IDN", "IND", "IOM", "IOT", "IRL", "IRN", "IRQ", "ISL", "ISR", "ITA", "JAM", "JOR", "JPN", "KAZ", "KEN", "KGZ", "KHM", "KIR", "KNA", "KOR", "KOS", "KWT", "LAO", "LBN", "LBR", "LBY", "LCA", "LIE", "LKA", "LSO", "LTU", "LUX", "LVA", "MAC", "MAR", "MCO", "MDA", "MDG", "MDI", "MDV", "MEX", "MHL", "MKD", "MLI", "MLT", "MMR", "MNE", "MNG", "MNP", "MON", "MOZ", "MRT", "MSR", "MTQ", "MUS", "MWI", "MYS", "MYT", "NAM", "NCL", "NER", "NFK", "NGA", "NIC", "NIU", "NLD", "NOR", "NPL", "NRU", "NZL", "OMN", "PAK", "PAN", "PCN", "PER", "PHL", "PLW", "PNG", "POL", "PRI", "PRK", "PRT", "PRY", "PSE", "PYF", "QAT", "REU", "ROU", "RUS", "RWA", "SAU", "SCG", "SCT", "SDN", "SEN", "SER", "SGP", "SGS", "SHN", "SJM", "SLB", "SLE", "SLV", "SMR", "SOM", "SPM", "SRB", "STP", "SUR", "SVK", "SVN", "SWE", "SWZ", "SYC", "SYR", "TAH", "TCA", "TCD", "TGO", "THA", "TJK", "TKL", "TKM", "TLS", "TON", "TTO", "TUN", "TUR", "TUV", "TWN", "TZA", "UGA", "UKR", "UMI", "URY", "USA", "UZB", "VAT", "VCT", "VEN", "VGB", "VIR", "VNM", "VUT", "WAL", "WBK", "WLF", "WSM", "YEM", "YUG", "ZAF", "ZMB", "ZWE"
     *                                  },
     *                                  "messages" : {
     * "notInArray" : "Please choose a country"
     *                                  }
     *                          }
     *                      })
     */
    public $country;
}