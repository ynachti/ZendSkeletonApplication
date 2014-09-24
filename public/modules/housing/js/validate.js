


function validate(formid)
{        
	
	
	valid=true;
    //alert(formid);
	switch(formid)
	{
	case 1:		
	 form1();		 
	 
	  break;
	case 2:		
	  //form2();	  
	  break;
	case 3:		
	  //form3();		  	 
	  break;
	case 4:		
	  //form4();		  	 
      break;

	 case 5:		
	  //form5();		  	 
     break;

	 case 6:		
	  //form6();		  	 
	 break;

	 case 7:		
	   //form7();		  	 
	 break;

	 case 8:		
	   //form8();		  	 
     break;

	default:
	  
	}
	
	return valid;
			
}



function form1()
{		
	if($("#termid").val() == ''){ showError("Please Select a Term"); $("#termid").focus(); valid=false; }	   
	if($("#termid").val() == '2'){
		if(!$("input[type=checkbox]").is(':checked')){			
			showError("Please Select a Summer Term"); valid=false; 
		}
	}
	
	return valid;
}

function form2()
{	
	
	if($("input[name=internationalstudent]").val() =='Yes'){
	    if($("#contactcountry").val()=='0') { showError("Country is Required"); $("input[name=contactcountry]").focus(); window.scrollTo(0,0); valid=false; }	
	}				 
	if($("input[name=emergencycontactfirst]").val() ==''){ showError("Please Provide a First Name for an Emergency Contact"); $("input[name=emergencycontactfirst]").focus(); window.scrollTo(0,0); valid=false; }	   
	else if($("input[name=emergencycontactlast]").val() ==''){ showError("Please Provide a Last Name for an Emergency Contact"); $("input[name=emergencycontactlast]").focus(); window.scrollTo(0,0); valid=false; }
	else if($("input[name=emergencycontacttelephone]").val() ==''){ showError("Please Provide a Telephone Number for an Emergency Contact"); $("input[name=emergencycontacttelephone]").focus(); window.scrollTo(0,0); valid=false; }	
	
    return valid;
}

function form3()
{	
	if($("input[name=rmlast]").val() ==''){ showError("Please Provide a Last Name"); $("input[name=rmlast]").focus(); valid=false; }   
	else if($("input[name=rmfirst]").val() ==''){ showError("Please Provide a First Name"); $("input[name=rmfirst]").focus(); valid=false; }
	else if($("input[name=rmsid]").val() ==''){ showError("Please Provide a Student ID"); $("input[name=rmsid]").focus(); valid=false; }	
    return valid;
}


function form4()
{	
	if($("#gradmonth").val() == '0'){ showError("Please Select a Month"); $("#gradmonth").focus(); valid=false; }	   
	else if($("#gradyear").val() =='0'){ showError("Please Select a Year"); $("#gradyear").focus(); valid=false; }	
    return valid;
}




function form5()
{	
	
	if (!$("input[name='question_1']:checked").val()) {	
	    { showError("Please Answer all of the Questions on this Form"); $("input[name=question_1]").focus(); valid=false; }	
	}	
	else if (!$("input[name='question_5']:checked").val()) {
	    { showError("Please Answer all of the Questions on this Form"); $("input[name=question_5]").focus(); valid=false; }	
	}	
	else if (!$("input[name='question_6']:checked").val()) {
	    { showError("Please Answer all of the Questions on this Form"); $("input[name=question_6]").focus(); valid=false; }	
	}	
	
	else if (!$("input[name='question_8']:checked").val()) {
	    { showError("Please Answer all of the Questions on this Form"); $("input[name=question_8]").focus(); valid=false; }	
	}	

	else if (!$("input[name='question_9']:checked").val()) {
	    { showError("Please Answer all of the Questions on this Form"); $("input[name=question_9]").focus(); valid=false; }	
	}	

	
    return valid;
}


function form6()
{		
	if ($("#mealplan").val()=='') {	
	    showError("Please Select a Meal Plan"); window.scrollTo(0,0); valid=false;
	}	
    return valid;
}

function form7()
{		
	if (locationcount==1) {	
	    showError("Please Select a Building or a Specialty Floor"); window.scrollTo(0,0); valid=false;	
	}	
    return valid;
}

function form8()
{
	if ($('input:radio[name=agreeToTerms]:checked').val()!='yes') {	
	    showError("Please Agree to the Terms Before Submition"); window.scrollTo(0,0); $("#agreeToTerms").focus(); valid=false;	
	}
	else if (!$("input:radio[name='stayedLastSemester']:checked").val()) {	
	    showError("Please Choose Yes or No for on-campus housing"); window.scrollTo(0,0); $("#stayedLastSemester").focus(); valid=false;	
	}	
    return valid;
}


function showError(msg)
{
  $('#errormsg').html('<center><h3>'+msg+'<h3></center>');
  $('#errormsg').slideDown(300).delay(2000);		  
  $('#errormsg').fadeOut('slow').delay(2000).hide(0);
}