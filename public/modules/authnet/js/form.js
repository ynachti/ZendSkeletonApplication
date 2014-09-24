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

$(document).ready(function(){
	$('#paytype_cc').on("click", function(e) {
		$('#paytype_bank').removeClass('btn-info');
		$('#paytype_bank').addClass('btn-default');
		$('#paytype_cc').addClass('btn-info');
		$('input[name=ptype][value=cc]').prop("checked", "checked");
		$('#bankpayment').hide(); 
		$('#ccpayment').fadeIn(500);
		window.scrollTo(0, document.body.scrollHeight);
	});	

	$('#paytype_bank').on("click", function(e) {
		$('#paytype_cc').removeClass('btn-info');
		$('#paytype_cc').addClass('btn-default');
		$('#paytype_bank').addClass('btn-info');
		$('input[name=ptype][value=bank]').prop("checked", "checked");
		$('#ccpayment').hide();
		$('#bankpayment').fadeIn(500);
		window.scrollTo(0, document.body.scrollHeight);
	});	
})
(jQuery);