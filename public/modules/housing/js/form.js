var stepid=1;
var lastcompleted=1;
//Actions

function findBootstrapEnvironment() {
    var envs = ['phone', 'tablet', 'desktop'];

    $el = $('<div>');
    $el.appendTo($('body'));

    for (var i = envs.length - 1; i >= 0; i--) {
        var env = envs[i];

        $el.addClass('hidden-'+env);
        if ($el.is(':hidden')) {
            $el.remove();
            return env
        }
    };
}

function buildreviewpage()
{
	$('#review_name').text($("input[name='fullname']").val());
	$('#review_gender').text($("#gender").find("option:selected").text());
	$('#review_term').text($("#termid").find("option:selected").text());
	$('#review_birthdate').text($("input[name='birthdate']").val());
	$('#review_email').text($("input[name='personalemail']").val());
	$('#review_lastsemester').text($("input[name='stayedLastSemester']").val());
	$('#review_international_student').text($("input[name='internationalstudent']").val());
	$('#review_gender').text($("input[name='gender']").val());	
	var graduationdate = $("#gradmonth").find("option:selected").text() + " " + $("#gradyear").find("option:selected").text();	
	$('#review_graduationdate').text(graduationdate);
	$('#review_emergency_contact_firstname').text($("input[name='emergencycontactfirst']").val());
	$('#review_emergency_contact_lastname').text($("input[name='emergencycontactlast']").val());
	$('#review_emergency_contact_email').text($("input[name='emergencycontactemail']").val());	
	$('#review_emergency_contact_phone').text($("input[name='emergencycontacttelephone']").val());
	$('#review_international_country').text($("#contactcountry").find("option:selected").text());	
}

function updateDisplay() {
    var isChecked = $checkbox.is(':checked');
    $button.prepend('<i class="icon-chec"></i>');
    
    // Set the button's state
    $button.data('state', (isChecked) ? "on" : "off");

    // Set the button's icon
    $button.find('.state-icon')
        .removeClass()
        .addClass('state-icon ' + settings[$button.data('state')].icon);

    // Update the button's color
    if (isChecked) {
        $button
            .removeClass('btn-default')
            .addClass('btn-' + color + ' active');
    }
    else {
        $button
            .removeClass('btn-' + color + ' active')
            .addClass('btn-default');
    }    
}

function gotoStep(displaystep)
{
	if(lastcompleted >= displaystep)
	{
	    $('#step' + displaystep).show();
	    $('#step' + stepid).hide();
		$('#step' + stepid + 'h').removeClass('active');                                  
	    $('#step' + displaystep + 'h').addClass('active');   
	    stepid=displaystep;
	}
	
	if(displaystep>=5) $("table.tblcontainer").css("width","80%");
    else $("table.tblcontainer").css("width","350px");
	
	if(displaystep==7){		
		$('#locationtab').show();
	}
	else{
		$('#locationtab').hide();
	}

    if(displaystep==9) {    	
        $('#submitform').show();
        $('#forwardbtn').hide();
    }    
    else{
        $('#submitform').hide();
        $('#forwardbtn').show();            	
    }
}

function removeitem(item){	
	$('#'+item).remove();
	$('input[type="hidden"][value="'+item+'"]').remove();
	$('input[type="hidden"][value="'+item+'"]').remove();			   
	totalchoices--;
	$('#locationterm' + totalchoices).empty();
	locationlist.replace(item + ';', '');
}

function toggleselect(btn){
	alert('test');
	btn.removeClass('btn btn-default');
	btn.addClass('btn btn-success');
	
}

function phonemask(f){
	
    tel='(';
    var val =f.value.split('');
    for(var i=0; i<val.length; i++){
    if( val[i]=='(' ){ 
    val[i]=''
    }
    if( val[i]==')' ){ 
    val[i]=''
    }
    if( val[i]=='-' ){ 
    val[i]=''
    }
    if( val[i]=='' ){ 
    val[i]=''
    }
    }
    //
    for(var i=0; i<val.length; i++){
        if(i==3){ val[i]=val[i]+')' }
        if(i==7){ val[i]=val[i]+'-' }
        if(i==12){ val[i]=val[i]+'' }   
        $('phone').keypress(function(event) 
        { 
           alert(event.keyCode); 
        });
    
    if(f.keyCode == 8) alert('backspace trapped');
    
        tel=tel+val[i]
    }
    f.value=tel;
}


function carnextstep() {
	
	$('#step' + stepid).hide();
	$('#step' + stepid + 'h').addClass('disabled');
	
    stepid--;                           
    $('#step' + stepid).show();        
    
    if(stepid==1)
    {
        if($('#termid').val()==2) $('#step1b').show();
        else $('#step1b').hide();          
    }
    else $('#step1b').hide();
    
    if(stepid>=5) $("table.tblcontainer").css("width","80%");
    else $("table.tblcontainer").css("width","350px");
}

function carlaststep() {
	
	$('#step' + stepid).hide();
	//$('#step' + stepid + 'h').removeClass('current');
	$('#step' + stepid + 'hb').removeClass('badge-primary');
	$('#step' + stepid + 'hb').addClass('badge-success');
    stepid++;                  
    $('#step' + stepid).show();
    //$('#step' + stepid + 'h').addClass('current');
    $('#step' + stepid + 'hb').removeClass('badge-primary');
    $('#step' + stepid + 'hb').addClass('badge-primary');
    if(stepid==1)
    {
        if($('#termid').val()==2) $('#step1b').show();
        else $('#step1b').hide();          
    }
    else $('#step1b').hide();
    
    if(stepid>=5) $("table.tblcontainer").css("width","80%");
    else $("table.tblcontainer").css("width","350px");

    if(stepid==10) {
        $('#forwardbtn').attr("disabled", "disabled");
        $('#submitform').show();        
    }    
    else {
        $('#forwardbtn').removeAttr("disabled");
        $('#backbtn').removeAttr("disabled");
    }
	if(stepid==5) $('#additionalquestionsinstructions').slideDown(250);
	if(stepid==7) $('#locationinstructions').slideDown(250);    	
}

(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



$(document).ready(function(){
        
    var element = this;
    
    var buildingprefs="";
	//buildreviewpage();
		
	$('#step2h').bind('click', false);
	$('#step3h').bind('click', false);
	$('#step4h').bind('click', false);
	$('#step5h').bind('click', false);
	$('#step6h').bind('click', false);
	$('#step7h').bind('click', false);
	$('#step8h').bind('click', false);
	$('#step9h').bind('click', false);	
	
    //$('#forwardbtn').attr("disabled", "disabled");
    $('#submitform').hide();
    $('#forwardbtn').show();
   
    $("[rel='tooltip']").tooltip();    
    $("[rel='popover']").popover({
    	placement : 'top', // top, bottom, left or right
    	title : 'This is my Title', 
    	html: 'true', 
    	content : '<div id="popOverBox">Your Text Here</div>'
     });
        
	$("#buildingselector").hide();
	$("#floorselector").hide();	
	$("#choicescontainer").hide();		

	//$('.btn.danger').button('toggle').addClass('fat')
	
	$('#btn16').on("click", function(e) {		
		$('#btn16').removeClass('btn btn-default');
		$('#btn16').addClass('btn btn-success');		
	})

	$("#agreeToTermsYesbtn").on("click", function(e) {		
		$("input:radio[name='agreeToTerms'][value ='yes']").prop('checked', true)			
		$("#agreeToTermsNobtn").removeClass('btn-success');
		$("#agreeToTermsNobtn").addClass('btn-default');
		$("#agreeToTermsYesbtn").removeClass('btn-default');	
		$("#agreeToTermsYesbtn").addClass('btn-success');
		$("#noPaymentSection").hide();
		$("#forwardbtn").show();
		
		
	})

	$("#agreeToTermsNobtn").on("click", function(e) {
		$("input:radio[name='agreeToTerms'][value ='no']").prop('checked', true)			        
		$("#agreeToTermsYesbtn").removeClass('btn-success');
		$("#agreeToTermsYesbtn").addClass('btn-default');
		$("#agreeToTermsNobtn").removeClass('btn-default');	
		$("#agreeToTermsNobtn").addClass('btn-success');
		$("#noPaymentSection").show();
		$("#forwardbtn").hide();				
	})
		
	
	$("#stayedLastSemesterYesbtn").on("click", function(e) {		
		$("input:radio[name='stayedLastSemester'][value ='yes']").prop('checked', true)			
		$("#stayedLastSemesterNobtn").removeClass('btn-success');
		$("#stayedLastSemesterNobtn").addClass('btn-default');
		$("#stayedLastSemesterYesbtn").removeClass('btn-default');	
		$("#stayedLastSemesterYesbtn").addClass('btn-success');
		$("#paymentNeededSection").show();
		$("#noPaymentSection").hide();
		$("#review_lastsemester").text('Yes');
	})

	$("#stayedLastSemesterNobtn").on("click", function(e) {
		$("input:radio[name='stayedLastSemester'][value ='no']").prop('checked', true)			
		$("#stayedLastSemesterYesbtn").removeClass('btn-success');
		$("#stayedLastSemesterYesbtn").addClass('btn-default');
		$("#stayedLastSemesterNobtn").removeClass('btn-default');	
		$("#stayedLastSemesterNobtn").addClass('btn-success');
		$("#paymentNeededSection").hide();		
		$("#noPaymentSection").show();
		$("#review_lastsemester").text('No');
	})
	
	
	 $("#forwardbtn").on("click", function(e) {		
    	if(validate(stepid)) {
        	$('#step' + stepid).hide();
        	$('#step' + stepid + 'h').removeClass('active');        	
            stepid++;                  
            $('#step' + stepid).show();
            $('#step' + stepid + 'h').addClass('active');
            $('#step' + stepid + 'h').removeClass('disabled');
            if(stepid==1)
            {
                if($('#termid').val()==2) $('#step1b').show();
                else $('#step1b').hide();          
            }
            else $('#step1b').hide();

        
            if(stepid==9) {
            	buildreviewpage();
                $('#forwardbtn').attr("disabled", "disabled");
                $('#submitform').show();
                $('#forwardbtn').hide();
                
            }    
            else {
                $('#forwardbtn').removeAttr("disabled");
                $('#backbtn').removeAttr("disabled");
                
            }
            if(stepid > lastcompleted) lastcompleted=stepid;
    	}        
    	if(stepid==5) $('#additionalQuestionsModal').modal('show');
    	if(stepid==7){
    		$('#locationModal').modal('show');
    		//$('#locationinstructions').slideDown(250);
    		$('#locationtab').show(250);
    	}    
    })
    
    $("#nextbtn").on("click", function(e) {		
    	if(validate(stepid)) {
        	$('#step' + stepid).hide();
        	$('#step' + stepid + 'h').removeClass('active');        	
            stepid++;                  
            $('#step' + stepid).show();
            $('#step' + stepid + 'h').addClass('active');
            $('#step' + stepid + 'h').removeClass('disabled');
            if(stepid==1)
            {
                if($('#termid').val()==2) $('#step1b').show();
                else $('#step1b').hide();          
            }
            else $('#step1b').hide();
        
            if(stepid==9) {
            	buildreviewpage();
                $('#forwardbtn').attr("disabled", "disabled");
                $('#submitform').show();
                $('#forwardbtn').hide();
                $('#nextbtn').hide();
                $('#socialmedia').slideDown(500);
            }    
            else {
                $('#forwardbtn').removeAttr("disabled");
                $('#backbtn').removeAttr("disabled");
                $('#socialmedia').hide();
            }
            if(stepid > lastcompleted) lastcompleted=stepid;
    	}        
    	if(stepid==5) $('#additionalquestionsinstructions').slideDown(250);
    	if(stepid==7){
    		$('#locationModal').modal('show')
    		//$('#locationinstructions').slideDown(250);
    		$('#locationtab').show(250);
    	}    
    })
    

    
	 $("#previousbtn").on("click", function(e) {
	
		if(stepid > 1){
	    	$('#step' + stepid).hide();
	    	$('#step' + stepid + 'h').removeClass('active');        	
	        stepid--;                  
	        $('#step' + stepid).show();
	        $('#step' + stepid + 'h').addClass('active');
	        $('#step' + stepid + 'h').removeClass('disabled');
	        if(stepid==1)
	        {
	            if($('#termid').val()==2) $('#step1b').show();
	            else $('#step1b').hide();
	            $('#nextbtn').hide();
	        }
	        else $('#step1b').hide();
	
	    
	        if(stepid==9) {
	        	buildreviewpage();
	            $('#forwardbtn').attr("disabled", "disabled");
	            $('#submitform').show();
	            $('#forwardbtn').hide();
	            $('#socialmedia').slideDown(500);
	        }    
	        else {
	            $('#forwardbtn').removeAttr("disabled");
	            $('#backbtn').removeAttr("disabled");
	            $('#socialmedia').hide();
	        }
	        if(stepid > lastcompleted) lastcompleted=stepid;
	
	        if(stepid==5) $('#additionalquestionsinstructions').slideDown(250);
	    	if(stepid==7){
	    		$('#locationModal').modal('show')
	    		//$('#locationinstructions').slideDown(250);
	    		$('#locationtab').show(250);
	    	}    
		}
    })

	
    
    $('#showlocationinstructions').click(function(){
    	$('#locationinstructions').slideDown(250);
    });
    
    $('#btnhidelocationinstructions').click(function(){
    	$('#locationinstructions').slideUp(250);
    });

    $('#btncloselocationinstructions').click(function(){
    	$('#locationinstructions').slideUp(250);
    });

    
    $('#btnshowpreferenceinstructions').click(function(){    	
    	$('#additionalquestionsinstructions').slideDown(250);
    });
    
    $('#btnhidepreferncesinstructions').click(function(){
    	$('#additionalquestionsinstructions').slideUp(250);
    });

    $('#btnclosepreferncesinstructions').click(function(){
    	$('#additionalquestionsinstructions').slideUp(250);
    });

	
    $("#btn_term_spring").click(function(e){    	
    	$("#btn_term_summer").removeClass('btn-success');    	
    	$("#btn_term_summer").removeClass('active');
    	$("#btn_term_fall").removeClass('btn-success');   
    	$("#btn_term_fall").removeClass('active');
    	$("#btn_term_spring").addClass('btn-success');
		$("#btn_term_spring").addClass('active');
		$('#termid').val($('#spring_term_id').val());
		$('#term_description').val($('#spring_term_description').val());
		$("#btn_summer_term_1").removeClass('btn-success');    		
		$("#btn_summer_term_1").removeClass('active');
		$("#btn_summer_term_2").removeClass('btn-success');    		
		$("#btn_summer_term_2").removeClass('active');		
		$("#btn_summer_term_3").removeClass('btn-success');    		
		$("#btn_summer_term_3").removeClass('active');				
		$('#summerterm1').val('');
		$('#summerterm2').val('');
		$('#summerterm3').val('');
		$('#step1b').hide();		
		
		//Meal Plans
		$('#summer_mealplans').hide();
		$('#springnfall_mealplans').show();
		
		//Location Building/Floorplans
		$('#daytonfloorplans').hide();
		$('#daytonfloorplan_summerinfo_16').hide();
		$('#daytonfloorplan_summerinfo_17').hide();
		$('#daytonfloorplan_springnfallinfo_16').show();
		$('#daytonfloorplan_springnfallinfo_17').show();
		$('#springnfall_location').show();
		$('#summer_location_options_phone').hide();
		$('#summer_location_options_desktop').show();
		
	})

    $("#btn_term_summer").click(function(e){    	
    	$("#btn_term_spring").removeClass('btn-success');    	
    	$("#btn_term_spring").removeClass('active');
    	$("#btn_term_fall").removeClass('btn-success');   
    	$("#btn_term_fall").removeClass('active');
		$("#btn_term_summer").addClass('btn-success');
		$("#btn_term_summer").addClass('active');
		$('#termid').val($('#summer_term_id').val());
		$('#term_description').val($('#summer_term_description').val());
		$('#step1b').show();
		
		//Meal Plans
		$('#summer_mealplans').show();
		$('#springnfall_mealplans').hide();
		
		//Location Building/Floorplans
		$('#daytonfloorplans').show();		
		$('#springnfall_location').hide();
		$('#daytonfloorplan_summerinfo_16').show();
		$('#daytonfloorplan_summerinfo_17').show();
		$('#daytonfloorplan_springnfallinfo_16').hide();
		$('#daytonfloorplan_springnfallinfo_17').hide();
		$('#summer_location_options_phone').show();
		$('#summer_location_options_desktop').hide();
		
	})

    $("#btn_term_fall").click(function(e){    	
    	$("#btn_term_spring").removeClass('btn-success');    	
    	$("#btn_term_spring").removeClass('active');
    	$("#btn_term_summer").removeClass('btn-success');   
    	$("#btn_term_summer").removeClass('active');
    	$("#btn_term_fall").addClass('btn-success');
    	$("#btn_term_fall").addClass('active');
		$('#termid').val($('#fall_term_id').val());
		$('#term_description').val($('#fall_term_description').val());
		$("#btn_summer_term_1").removeClass('btn-success');    		
		$("#btn_summer_term_1").removeClass('active');
		$("#btn_summer_term_2").removeClass('btn-success');    		
		$("#btn_summer_term_2").removeClass('active');		
		$("#btn_summer_term_3").removeClass('btn-success');    		
		$("#btn_summer_term_3").removeClass('active');						
		$('#summerterm1').val('');
		$('#summerterm2').val('');
		$('#summerterm3').val('');
    	$('#step1b').hide();		
    	
		//Meal Plans
		$('#summer_mealplans').hide();
		$('#springnfall_mealplans').show();

		//Location Building/Floorplans    	
    	$('#daytonfloorplans').hide();		
		$('#springnfall_location').show();
		$('#daytonfloorplan_summerinfo_16').hide();
		$('#daytonfloorplan_summerinfo_17').hide();
		$('#daytonfloorplan_springnfallinfo_16').show();
		$('#daytonfloorplan_springnfallinfo_17').show();
		$('#daytonfloorplan_springnfallinfo').show();
		$('#summer_location_options_phone').hide();
		$('#summer_location_options_desktop').show();
	})
	
    $("#btn_summer_term_1").click(function(e){    	        	
    	if($("#btn_summer_term_1").hasClass('btn-success')){
    		$("#btn_summer_term_1").removeClass('btn-success');    		
    		$("#btn_summer_term_1").removeClass('active');
    		$('#summerterm1').val('');
    		$("#summer_session_1_mealplan_1_badge").removeClass("badge-success");
    		$("#summer_session_1_mealplan_1_descr").css("text-decoration", "line-through");
    		$("#summer_session_1_mealplan_1_descr").hide();
    		$("#summer_session_1_mealplan_2_badge").removeClass("badge-success");    		
    		$("#summer_session_1_mealplan_2_descr").css("text-decoration", "line-through");
    		$("#summer_session_1_mealplan_2_descr").hide();    		
    		$("#summer_session_1_mealplan_3_badge").removeClass("badge-success");    		
    		$("#summer_session_1_mealplan_3_descr").css("text-decoration", "line-through");
    		$("#summer_session_1_mealplan_3_descr").hide();
    		$("#plan16_session_1").hide();
    		$("#plan17_session_1").hide();    		
    	}
    	else{
    		$("#btn_summer_term_1").addClass('btn-success');
    		$("#btn_summer_term_1").addClass('active');
    		$('#summerterm1').val('1');
    		$("#summer_session_1_mealplan_1_badge").addClass("badge-success");
    		$("#summer_session_1_mealplan_1_descr").css("text-decoration", "none");
    		$("#summer_session_1_mealplan_1_descr").show();
    		$("#summer_session_1_mealplan_2_badge").addClass("badge-success");
    		$("#summer_session_1_mealplan_2_descr").css("text-decoration", "none");
    		$("#summer_session_1_mealplan_2_descr").show();    		
    		$("#summer_session_1_mealplan_3_badge").addClass("badge-success");
    		$("#summer_session_1_mealplan_3_descr").css("text-decoration", "none");
    		$("#summer_session_1_mealplan_3_descr").show();
    		$("#plan16_session_1").show();
    		$("#plan17_session_1").show();
    	}
	})
    
    $("#btn_summer_term_2").click(function(e){    	        	
    	if($("#btn_summer_term_2").hasClass('btn-success')){
    		$("#btn_summer_term_2").removeClass('btn-success');
    		$("#btn_summer_term_2").removeClass('active');
    		$('#summerterm2').val('');
    		$("#summer_session_2_mealplan_1_badge").removeClass("badge-success");
    		$("#summer_session_2_mealplan_1_descr").css("text-decoration", "line-through");
    		$("#summer_session_2_mealplan_1_descr").hide();
    		$("#summer_session_2_mealplan_2_badge").removeClass("badge-success");    		
    		$("#summer_session_2_mealplan_2_descr").css("text-decoration", "line-through");
    		$("#summer_session_2_mealplan_2_descr").hide();    		
    		$("#summer_session_2_mealplan_3_badge").removeClass("badge-success");    		
    		$("#summer_session_2_mealplan_3_descr").css("text-decoration", "line-through");
    		$("#summer_session_2_mealplan_3_descr").hide();
    		$("#plan16_session_2").hide();
    		$("#plan17_session_2").hide();
    	}
    	else{
    		$("#btn_summer_term_2").addClass('btn-success');
    		$("#btn_summer_term_2").addClass('active');
    		$('#summerterm2').val('2');
    		$("#summer_session_2_mealplan_1_badge").addClass("badge-success");
    		$("#summer_session_2_mealplan_1_descr").css("text-decoration", "none");
    		$("#summer_session_2_mealplan_1_descr").show();
    		$("#summer_session_2_mealplan_2_badge").addClass("badge-success");
    		$("#summer_session_2_mealplan_2_descr").css("text-decoration", "none");
    		$("#summer_session_2_mealplan_2_descr").show();    		
    		$("#summer_session_2_mealplan_3_badge").addClass("badge-success");
    		$("#summer_session_2_mealplan_3_descr").css("text-decoration", "none");
    		$("#summer_session_2_mealplan_3_descr").show();
    		$("#plan16_session_2").show();
    		$("#plan17_session_2").show();
    	}
	})

    $("#btn_summer_term_3").click(function(e){       	
    	if($("#btn_summer_term_3").hasClass('btn-success')){
    		$("#btn_summer_term_3").removeClass('btn-success');
    		$("#btn_summer_term_3").removeClass('active');    		
    		$('#summerterm3').val('');    		
    		$("#summer_session_3_mealplan_1_badge").removeClass("badge-success");
    		$("#summer_session_3_mealplan_1_descr").css("text-decoration", "line-through");
    		$("#summer_session_3_mealplan_1_descr").hide();
    		$("#summer_session_3_mealplan_2_badge").removeClass("badge-success");    		
    		$("#summer_session_3_mealplan_2_descr").css("text-decoration", "line-through");
    		$("#summer_session_3_mealplan_2_descr").hide();    		
    		$("#summer_session_3_mealplan_3_badge").removeClass("badge-success");    		
    		$("#summer_session_3_mealplan_3_descr").css("text-decoration", "line-through");
    		$("#summer_session_3_mealplan_3_descr").hide();
    		$("#plan16_session_3").hide();
    		$("#plan17_session_3").hide();
    	}
    	else{
    		$("#btn_summer_term_3").addClass('btn-success');
    		$("#btn_summer_term_3").addClass('active');
    		$('#summerterm3').val('3');
    		$("#summer_session_3_mealplan_1_badge").addClass("badge-success");
    		$("#summer_session_3_mealplan_1_descr").css("text-decoration", "none");
    		$("#summer_session_3_mealplan_1_descr").show();
    		$("#summer_session_3_mealplan_2_badge").addClass("badge-success");
    		$("#summer_session_3_mealplan_2_descr").css("text-decoration", "none");
    		$("#summer_session_3_mealplan_2_descr").show();    		
    		$("#summer_session_3_mealplan_3_badge").addClass("badge-success");
    		$("#summer_session_3_mealplan_3_descr").css("text-decoration", "none");
    		$("#summer_session_3_mealplan_3_descr").show();    		
    		$("#plan16_session_3").show();
    		$("#plan17_session_3").show();
    	}
	})
	
	$('#termid').change(function() {	
	    $('#mealplan').empty();
	    $('#mealplan').load('/Enrollment/housing/index/mealplan/' + $('#termid').val());	    
	})
		
    $("#mgenderbtn").click(function(e){    	
		$("#mgenderbtn").removeClass('btn-default');
		$("#mgenderbtn").addClass('btn-success');
		$("#fgenderbtn").removeClass('btn-success');
		$("#fgenderbtn").addClass('btn-default');
		$('#review_gender').text('Female');
	})

	$("#fgenderbtn").click(function(e){		
		$("#fgenderbtn").removeClass('btn-default');
		$("#fgenderbtn").addClass('btn-success');
		$("#mgenderbtn").removeClass('btn-success');
		$("#mgenderbtn").addClass('btn-default');
		$('#review_gender').text('Male');
	})

	
	$("#internatbtn").click(function(e){	
		$("#internatbtn").removeClass('btn-default');
		$("#internatbtn").addClass('btn-success');
		$("#noninternatbtn").removeClass('btn-success');
		$("#noninternatbtn").addClass('btn-default');
		$('#international')[0].checked = true;
		$('#step2b').show();
		$('#review_international_student').text('Yes');
		$('#internationalstudent').val('Yes');					
		$('#review_country_section').show();
	})

	$("#noninternatbtn").click(function(e){		
		$("#noninternatbtn").removeClass('btn-default');
		$("#noninternatbtn").addClass('btn-success');
		$("#internatbtn").removeClass('btn-success');
		$("#internatbtn").addClass('btn-default');
		$('#step2b').hide();
		$('#noninternational')[0].checked = true;		
		$('#review_international_student').text('No');
		$('#internationalstudent').val('No');
		$('#review_country_section').hide();
		
	})

	
	$(function() {
	    $('#termid').on('change', function(e) {
	        if($('#termid').val()==2) {
	         	$('#step1b').show();
	        }
	        else {
	        	$('#step1b').hide();
	        }
	    });
	});
	
	
	
	$("#phone").keydown(function(event) {
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
	
	
	$(function () {
		
		if(findBootstrapEnvironment()=="desktop"){
			$("#formlayout").addClass('formbox');	
		}
		else{
			$("#formlayout").removeClass('formbox');
		}
	    $("#noninternatbtn").removeClass('btn-default');
		$("#noninternatbtn").addClass('btn-success');
		$("#noninternatbtn").addClass('active');

		
	    $('.button-checkbox').each(function () {

	        // Settings
	        var $widget = $(this),
	            $button = $widget.find('button'),
	            $checkbox = $widget.find('input:checkbox'),
	            color = $button.data('color'),
	            settings = {
	                on: {
	                    icon: 'icon icon-check'
	                },
	                off: {
	                    icon: ''
	                }
	            };

	        // Event Handlers
	        $button.on('click', function () {
	            $checkbox.prop('checked', !$checkbox.is(':checked'));
	            $checkbox.triggerHandler('change');
	            updateDisplay();
	        });
	        $checkbox.on('change', function () {
	            updateDisplay();
	        });

	        // Actions
	        function updateDisplay() {
	            var isChecked = $checkbox.is(':checked');

	            // Set the button's state
	            $button.data('class', (isChecked) ? "btn-default" : "btn-success");

	            // Set the button's icon
	            $button.find('.status')
	                .removeClass()
	                .addClass('status ' + settings[$button.data('status')].icon);

	            // Update the button's color
	            if (isChecked) {
	                $button
	                    .removeClass('btn-default')
	                    .addClass('btn-' + color + ' active');
	            }
	            else {
	                $button
	                    .removeClass('btn-' + color + ' active')
	                    .addClass('btn-default');
	            }
	        }

	        // Initialization
	        function init() {
	        	
	            updateDisplay();

	        }
	        init();
	    });
	});
	
})(jQuery);

