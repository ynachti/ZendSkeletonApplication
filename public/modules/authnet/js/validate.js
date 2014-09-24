function scroll_to(div){
   if (div.scrollTop < div.scrollHeight - div.clientHeight)
        div.scrollTop += 10; // move down

}

$(document).ready(function(){
	$("#input[name=x_phone]").keydown(function(event) {
	    // Allow: backspace, delete, tab, escape, enter and .
	    if ( $.inArray(event.keyCode,[46,8,9,27,13,190]) !== -1 ||
	         // Allow: Ctrl+A
	        (event.keyCode == 65 && event.ctrlKey === true) || 
	         // Allow: home, end, left, right
	        (event.keyCode >= 35 && event.keyCode <= 39)) {
	             // let it happen, don't do anything
	             return;
	    }
	    else {
	        // Ensure that it is a number and stop the keypress
	        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
	            event.preventDefault(); 
	        }   
	    }
	});

	$('#paytype_cc').on("click", function(e) {
		$('#paytype_bank').removeClass('btn-info');
		$('#paytype_cc').addClass('btn-info');
		$('input[name=ptype][value=cc]').prop("checked", "checked");
		$('#bankpayment').hide(); 
		$('#ccpayment').fadeIn(500);
		window.scrollTo(0, document.body.scrollHeight);
	})	

	$('#paytype_bank').on("click", function(e) {
		$('#paytype_cc').removeClass('btn-info');
		$('#paytype_bank').addClass('btn-info');
		$('input[name=ptype][value=bank]').prop("checked", "checked");
		$('#ccpayment').hide();
		$('#bankpayment').fadeIn(500);
		window.scrollTo(0, document.body.scrollHeight);
	})	

	
	$('#btnpaymentsubmit').on("click", function(e) {
		//alert($("input[name=x_card_num]").val());
		//alert($("input[name=x_card_num]").val());
		var msg = validateCreditcard_number($("input[name=x_card_num]").val());		
		if(msg=='Valid'){
			alert('Good');				
		}
		else{
			alert('Bad');
		}

		/*
		if($("input[name=x_first_name]").val() ==''){ showError("Please Provide a First Name for Billing Information"); $("input[name=x_first_name]").focus(); window.scrollTo(0,0); valid=false; }   
		else if($("input[name=x_last_name]").val() ==''){ showError("Please Provide a Last Name for Billing Information"); $("input[name=x_last_name]").focus(); window.scrollTo(0,0); valid=false; }
		else if($("input[name=x_address]").val() ==''){ showError("Please Provide a Address for Billing Information"); $("input[name=x_address]").focus(); window.scrollTo(0,0); valid=false; }
		else if($("input[name=x_city]").val() ==''){ showError("Please Provide a City for Billing Information"); $("input[name=x_city]").focus(); window.scrollTo(0,0); valid=false; }
		else if($("input[name=x_state]").val() ==''){ showError("Please Provide a State Name for Billing Information"); $("input[name=x_state]").focus(); window.scrollTo(0,0); valid=false; }
		else if($("input[name=x_zip]").val() ==''){ showError("Please Provide a Zipcode for Billing Information"); $("input[name=x_zip]").focus(); window.scrollTo(0,0); valid=false; }
		else if($("input[name=x_email]").val() ==''){ showError("Please Provide an Email Address for Billing Information"); $("input[name=x_email]").focus(); window.scrollTo(0,0); valid=false; }
		else if($("input[name=x_country]").val() ==''){ showError("Please Provide a Country for Billing Information"); $("input[name=x_country]").focus(); window.scrollTo(0,0); valid=false; }
		else if($("input[name=x_phone]").val() ==''){ showError("Please Provide a Phone Number for Billing Information"); $("input[name=x_phone]").focus(); window.scrollTo(0,0); valid=false; }
		*/		
	})
	
	
	//5424180382555917

/*
 * Try some of these numbers:
4000000000000002
4026000000000002
501800000009
5100000000000008
6011000000000004
 * 
 */
	$('#23423btnsubmitpayment').on("click", function(e) {	    		
		//var msg = validateCreditcard_number($("#x_card_num").val());
		
		if(msg=='Valid'){
				
		}
		else{			
		    $('input[name=x_card_num]').each(function() {
		        this.setCustomValidity(msg);
		    });
		}
	})

	function validateCreditcard_number(card_number)
	{	    
	    var creditCardRegex = '^5[1-5][0-9]{14}$'; 	    	   
        if(!card_number.match(creditCardRegex)) {
        	return 'This is not a card number';
        }
        return 'Valid';
    }

	function validateCreditcard_number_old(card_number)
	{
	    var firstnumber = card_number.substring(0,1);
	    
	    switch (firstnumber)
	    {
	     case '3':
	     	var cardProtocol = "^3[47][0-9]{13}$"; //REGEX ENTRY HERE <------
	         if(!card_number.match(cardProtocol)) {
	         	return 'This is not a valid American Express card number';
	         }
	         break;
	     case '4':
	     	var cardProtocol = "^4[0-9]{12}(?:[0-9]{3})?$" //REGEX ENTRY HERE <------
	         if(!card_number.match(cardProtocol)) {
	           	return 'This is not a valid Visa card number';
	         }
	         break;
	     case '5':        	        	
	     	var cardProtocol = "^5[1-5][0-9]{14}$" //REGEX ENTRY HERE <------
	         if(!card_number.match(cardProtocol)) {
	         	return 'This is not a valid MasterCard card number';
	         }
	         break;
	     case '6':
	     	var cardProtocol = "^6(?:011|5[0-9]{2})[0-9]{12}$" //REGEX ENTRY HERE <------
	             if(!card_number.match(cardProtocol)) {
	             	return 'This is not a valid Discover card number';
	         }
	         break;
	     default:
	    	 alert('default');
	         return 'This is not a valid card number';
	    }
	    return 'Valid';
	}


})(jQuery);



function FillShipping()
{		
    if($("input[name=shippingselect]").is(':checked')){			
		
		$("input[name=x_ship_to_first_name]").val($("input[name=x_first_name]").val());   
		$("input[name=x_ship_to_last_name]").val($("input[name=x_last_name]").val());
		$("input[name=x_ship_to_address]").val($("input[name=x_address]").val());
		$("input[name=x_ship_to_city]").val($("input[name=x_city]").val());
		$("select[name=x_ship_to_state]").val($("select[name=x_state] option:selected").val());						
		$("input[name=x_ship_to_zip]").val($("input[name=x_zip]").val());
		$("input[name=x_ship_to_company]").val($("input[name=x_company]").val());
		$("input[name=x_ship_to_email]").val($("input[name=x_email]").val());
		$("input[name=x_ship_to_country]").val($("input[name=x_country]").val());
		$("select[name=x_ship_to_country]").val($("select[name=x_country] option:selected").val());
		$("input[name=x_ship_to_phone]").val($("input[name=x_phone]").val()); 		
		$("input[name=x_ship_to_fax]").val($("input[name=x_fax]").val());    	
	}
    else{
		$("input[name=x_ship_to_first_name]").val('');   
		$("input[name=x_ship_to_last_name]").val('');
		$("input[name=x_ship_to_address]").val('');
		$("input[name=x_ship_to_city]").val('');
		$("input[name=x_ship_to_state]").val('');
		$("input[name=x_ship_to_zip]").val('');
		$("input[name=x_ship_to_email]").val('');
		$("input[name=x_ship_to_country]").val('');
		$("input[name=x_ship_to_phone]").val(''); 		    	
   	}
}
	



