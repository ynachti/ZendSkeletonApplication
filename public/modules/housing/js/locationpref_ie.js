

var locationcount=1;
var prefs=new Array();

var buildingsdictionary = new Object();
buildingsdictionary['16']= 'Dayton Double';	    	
buildingsdictionary['17']= 'Dayton Triple';	    	
buildingsdictionary['21']= 'South Single';	    	
buildingsdictionary['22']= 'South Double';	    	
buildingsdictionary['18']= 'Dayton Double';	    	
buildingsdictionary['19']= 'Tonopah Double';	    	
buildingsdictionary['20']= 'Tonopah Triple';	    	
buildingsdictionary['23']= 'Hughes Delux Single';	       	
buildingsdictionary['24']= 'B Hall Delux Single';	        
buildingsdictionary['25']= 'C Hall Single';	    	
buildingsdictionary['26']= 'C Hall Double';	    	
buildingsdictionary['27']= 'Faiman Single';	    	
buildingsdictionary['28']= 'Faiman Double';	    	

var floorsdictionary = new Object(); 
floorsdictionary['0']= 'No Special Interest';
floorsdictionary['2']= 'All Women Floor';
floorsdictionary['4']= 'Study Intensive Floor';
floorsdictionary['14']= 'Honors House';
floorsdictionary['17']= 'Hotel House';
floorsdictionary['20']= 'Global House';
floorsdictionary['23']= 'Graduate & 23+';
floorsdictionary['24']= 'Major Exploration';
floorsdictionary['25']= 'Business House';

function showmsg(msg)
{
    $('#errormsg').html('<b>'+msg+'<b>');
    $('#errormsg').delay(2000).show();		  
    $('#errormsg').fadeOut('slow').delay(2000).hide(0);
}

function togglestyle(el){
    if(el.className == "on") {
    	el.className="off";
    } else {
    	el.className="on";
    }
}


function addspecfloor(id, label)
{
	if(locationcount>3) alert('You Have Select 3 Choices')
	else {
		//$('#specialtyfloorsections').css("margin-top","8px");
		$('#btnspecflooryes'+id).removeClass('btn-default');
		$('#btnspecflooryes'+id).addClass('btn-success');
		
			divtxt = "<div id=\"divlocationselection" + id + "\" style=\"height:25px;\"> </div>";
		
		$('#specialtyfloorsections').append(divtxt);
		
		//inputhtml = "<input type=\"hidden\" name=\"location_" + id + "\" value=\"" + id + "\"> ";
		inputhtml = "<input type=\"hidden\"  id=\"location_" + id + "\" name=\"location_" + id + "\" value=\"" + id + "\">" + floorsdictionary[id] +  "&nbsp;&nbsp; <span class=\"badge \"><a href=\"#\" onclick=\"removespecfloor(" + id + ");\"><i class=\"icon icon-trash \"></i></a> </span></h6>";
		$('#locationpreference_'+locationcount).append(divtxt);
		
		$('#divlocationselection'+id).html(inputhtml);                          
		//$('#divspecialtyterm_'+id).show();
		
		prefs.push(floorsdictionary[id]);		
	//	var reviewlocationtext = '<div id=\"review_location_' + id + '\">' + 'Preference ' + locationcount + '<br>Specialty Floor: ' + label + '</div><br><br>';
		//$("#review_location_preference").append(reviewlocationtext);
		updateReviewPage();
	    locationcount++;
	}
}    


function addlocroom(id)
{
	if(locationcount>3) alert('You Have Select 3 Choices')
	else {
		//$('#specialtyfloorsections').css("margin-top","-1px");
		divtxt = "<div class=\"\" id=\"divlocationselection" + id + "\" align=\"left\" style=\"height:25px;\"><\div>";		
	    $('#specialtyfloorsections').append(divtxt);																													                           
		inputhtml = "<input type=\"hidden\" name=\"location_" + id + "\" id=\"location_" + id + "\" value=\"" + id + "\"> <h6>" + buildingsdictionary[id] +  "&nbsp;&nbsp; <span class=\"badge badge-danger\"><a href=\"#\" onclick=\"removebuilding(" + id + ");\"><i class=\"icon icon-trash icon-white\"></i></a> </span></h6>";
		$('#divlocationselection'+id).html(inputhtml);
		prefs.push(buildingsdictionary[id]);	
		$("#floorplan_img_"+id).removeClass( "img-unselected");
		$("#floorplan_img_"+id).addClass( "img-selected");
		$("#floorplan_flag_"+id).show();
    	$('#building_title_'+id).removeClass('muted');
    	$('#building_price_'+id).removeClass('muted');
    	$('#floorplan_status_'+id).show();
    	$('#btnfloorplan_'+id).removeClass('btn-default');
    	$('#btnfloorplan_'+id).addClass('btn-success');    	  
    	$('#btnfloorplan_'+id).text('Selected');
    	$('#btnfloorplan_'+id).addClass('active');    	
    	updateReviewPage();	
	    locationcount++;
	}
}

function updateReviewPage()
{	
	$('#review_location_preference').html('');	
	
	for(i=0;i<3;i++){
		$('#location_preference_' + i).val('');
	}
	
	$.each(prefs, function(key, value) { 
		$('#review_location_preference').append(key+1 + ') ' + value + '<br>');
		$('#location_preference_' + key).val(value);		
	});		
	
}

function deletelistitem(value)
{
	var index = 1;
	var i = $.inArray(value,prefs)	
	if (i >= 0){
		prefs.splice(i, 1);
	}
	updateReviewPage();
}

function addtoprefs(divtextstart, divtextend, inputhtml, id)
{	
    prefs.push(divtxtstart + inputhtml + divtxtend);			
	$.each(prefs, function(key, value) { 
		$('#specialtyfloorsections').append(key + ') ' + value);
	});		
}

function rebuildtoprefs()
{
	var i = remove.length;
	while (i--) {
	    if (remove[i] != undefined)
	        options.series[0].data.splice(remove[i],1);
	}   
	
}

function rebuildtoprefsold()
{
	$.each(prefs, function(key, value) {
		prefs.pop();
	});
	    			
	$.each(prefs, function(key, value) { 
		$('#specialtyfloorsections').append(divtxtstart + inputhtml + divtxtend);
		$('#specialtyfloorsections').append(divtxt);
		$('#specialtyfloorsections').append(key + value);
	});		
}



function removebuilding(id)
{
	locationcount--;
    $("#divlocationselection"+id).remove();
	$("#floorplan_img_"+id).removeClass( "img-selected");
	$("#floorplan_img_"+id).addClass( "img-unselected");
	$("#review_location_"+id).remove();
	$("#building_thumbnail_"+id).css('border-color', 'lightgray');
	$("#building_thumbnail_"+id).css('border-width', 'thin');
	$('#building_title_'+id).addClass('muted');
	$('#building_price_'+id).addClass('muted');
	$('#floorplan_status_'+id).hide();
	$('#btnfloorplan_'+id).removeClass('btn-success');
	$('#btnfloorplan_'+id).addClass('btn-default');
	$('#btnfloorplan_'+id).removeClass('active');
	$('#btnfloorplan_'+id).text('Select');

	deletelistitem(buildingsdictionary[id]);
	//$('#specialtyfloorlist').html('<span>' + prefs + '</span>');

}


function removespecfloor(id)
{
	locationcount--;
    
	$('#btnspecflooryes'+id).removeClass('btn-success');
	$('#btnspecflooryes'+id).addClass('btn-default');    
    $('#divlocationselection'+id).remove();
    $('#divspecialtyterm_'+id).hide();
    $('#review_location_'+id).remove();

   	$('#title_'+id).addClass('muted');
	$('#desc_short_'+id).addClass('muted');
	$('#desc_long_'+id).addClass('muted');
	$('#floor_loc_badge_'+id).removeClass('badge-info');
	$('#floor_loc_badge_'+id).addClass('badge-default');

	$('#building_title_'+id).addClass('muted');
	$('#building_price_'+id).addClass('muted');

	$('#btnspecfloorselect_'+id).removeClass('btn-success');
	$('#btnspecfloorselect_'+id).addClass('btn-default');
	$('#btnspecfloorselect_'+id).removeClass('active');
	$('#btnspecfloorselect_'+id).text('Select');

	deletelistitem(floorsdictionary[id]);
    
}

function dspfloorgrp(id)
{	
	$('#floor_group_1').hide();
	$('#list_item_1').removeClass('active');
	$('#floor_group_2').hide();
	$('#list_item_2').removeClass('active');
	$('#floor_group_3').hide();
	$('#list_item_3').removeClass('active');	
	$('#list_item_'+id).addClass('active');
	
	$('#floor_group_'+id).show(250);
	deselectfloortile(id);
}

function dspUCCgrp(id)
{	
	$('#ucc_group_1').slideUp(250);
	$('#ucc_list_item_1').removeClass('active');
	$('#ucc_group_2').slideUp(250);
	$('#ucc_list_item_2').removeClass('active');
	$('#ucc_list_item_'+id).addClass('active');
	$('#ucc_group_'+id).slideDown(250);	
}



function clearLocationGroups()
{	
  	$("#daytonfloorplans").hide();
	$("#tonopahfloorplans").hide();
	$("#southfloorplans").hide();
	$("#uccfloorplans_group_1").hide();
	$("#uccfloorplans_group_2").hide();
	
	$('#daytonimagedisplay').hide();
	$('#southimagedisplay').hide();
	$('#tonopahimagedisplay').hide();
	$('#uccimagedisplay').hide();
	
	$('location_set_1').removeClass('active');
	$('location_set_2').removeClass('active');
	$('location_set_3').removeClass('active');
	$('location_set_4').removeClass('active');
	$('location_set_5').removeClass('active');
}

function dspLocationGroup(id)
{
	clearLocationGroups();
	//$('location_set_'+id).addClass('active');
	$('#location_set_1').removeClass('active');
	$('#location_set_2').removeClass('active');
	$('#location_set_3').removeClass('active');
	$('#location_set_4').removeClass('active');
	$('#location_set_5').removeClass('active');
	if(id=='1') {
		//$('#daytonimagedisplay').show();		
		$('#location_set_1').addClass('active');
		$('#daytonfloorplans').fadeIn(250);
	}
	else if(id=='2'){
		//$('#southimagedisplay').show();
		$('#location_set_2').addClass('active');
		$('#southfloorplans').fadeIn(250);		
	}
	else if(id=='3'){
		//$('#tonopahimagedisplay').show();
		$('#location_set_3').addClass('active');
		$('#tonopahfloorplans').fadeIn(250);
	}
	else if(id=='4'){
		//$('#uccimagedisplay').show();
		$('#location_set_4').addClass('active');
		$('#uccfloorplans_group_1').fadeIn(250);		  	 
	}
	else if(id=='5'){		
		//$('#uccimagedisplay').show();
		$('#location_set_5').addClass('active');
		$('#uccfloorplans_group_2').fadeIn(250);		  	 
	}

}



$(document).ready(function(){
  
    var buildingprefs="";
    var index=0;
    
    $("a[href='#']").click(function(e) {
        e.preventDefault();
    });
    
    
    $('.carousel').carousel({
        interval: false
    }) 
    
    $(function() {
    	$( "#sortable" ).sortable();
    	$( "#sortable" ).disableSelection();
    });

    function initimages()
    {
    	$( "#daytonfloorplans" ).hide();
    	$( "#tonopahfloorplans" ).hide();
    	$( "#southfloorplans" ).hide();
    	$( "#uccfloorplans" ).hide();
    	
    	$( "#dayton_thumbnail").css('border-color', 'lightgray');    
    	$( "#tonopah_thumbnail").css('border-color', 'lightgray');    
    	$( "#south_thumbnail").css('border-color', 'lightgray');    
    	$( "#ucc_thumbnail").css('border-color', 'lightgray');    

    	$( "#daytonimage" ).removeClass( "img-selected");
    	$( "#daytonimage" ).addClass( "img-unselected");

    	$( "#tonopahimage" ).removeClass( "img-selected");
    	$( "#tonopahimage" ).addClass( "img-unselected");

    	$( "#southimage" ).removeClass( "img-selected");
    	$( "#southimage" ).addClass( "img-unselected");

    	$( "#uccimage" ).removeClass( "img-selected");
    	$( "#uccimage" ).addClass( "img-unselected");
    	
    	$( "#ucc_title" ).removeClass('bldginfoselect');
    	$( "#ucc_title" ).addClass('bldginfonoselect');
    	$( "#ucc_badge1" ).removeClass('badge-info');
    	$( "#ucc_badge1" ).addClass('badge-default');
    	$( "#ucc_badge2" ).removeClass('badge-info');
    	$( "#ucc_badge2" ).addClass('badge-default');
    	$( "#ucc_badge3" ).removeClass('badge-info');
    	$( "#ucc_badge3" ).addClass('badge-default');
    	$( "#ucc_badge4" ).removeClass('badge-info');
    	$( "#ucc_badge4" ).addClass('badge-default');


    	$('#daytonimagebutton').removeClass('active');
    	$('#tonopahimagebutton').removeClass('active');
    	$('#southimagebutton').removeClass('active');
    	$('#uccimagebutton').removeClass('active');
    	
    	//$( "#daytonimage" ).fadeTo( "fast" , 0.3, function() { });
    	//$( "#tonopahimage" ).fadeTo( "fast" , 0.3, function() { });
    	//$( "#southimage" ).fadeTo( "fast" , 0.3, function() { });
    //	$( "#uccimage" ).fadeTo( "fast" , 0.3, function() { });
    }

    $(function () {
        $('.btn-radio').click(function(e) {
            $('.btn-radio').not(this).removeClass('active')
        		.siblings('input').prop('checked',false)
                .siblings('.img-radio').css('opacity','0.5');
        	$(this).addClass('active')
                .siblings('input').prop('checked',true)
        		.siblings('.img-radio').css('opacity','1');
        });        
    });
    
 
	function resetbuildingbuttons()
	{
    	$('#location_set_1').removeClass('btn-info');
    	$('#location_set_1').addClass('btn-default');		
    	$('#location_set_2').removeClass('btn-info');
    	$('#location_set_2').addClass('btn-default');		
    	$('#location_set_3').removeClass('btn-info');
    	$('#location_set_3').addClass('btn-default');		
    	$('#location_set_4').removeClass('btn-info');
    	$('#location_set_4').addClass('btn-default');		
    	$('#location_set_5').removeClass('btn-info');
    	$('#location_set_5').addClass('btn-default');
    	$('#location_set_1').removeClass('active');
    	$('#location_set_2').removeClass('active');
    	$('#location_set_3').removeClass('active');
    	$('#location_set_4').removeClass('active');
    	$('#location_set_5').removeClass('active');

    	$('#daytonfloorplans').hide();    
    	$('#southfloorplans').hide();    
    	$('#tonopahfloorplans').hide();    
		$('#uccfloorplans_group_1').hide();    
		$('#uccfloorplans_group_2').hide();    
	}

    $('#location_set_1').click(function(){
    	
    	resetbuildingbuttons();
    	$('#location_set_1').removeClass('btn-default');
    	$('#location_set_1').addClass('btn-info');		
    	$('#location_set_1').addClass('active');
		$('#daytonfloorplans').fadeIn(250);    		
    });

    $('#location_set_2').click(function(){
    	resetbuildingbuttons();
    	$('#location_set_2').removeClass('btn-default');
    	$('#location_set_2').addClass('btn-info');		
    	$('#location_set_2').addClass('active');		
		$('#southfloorplans').fadeIn(250);		
    });

    $('#location_set_3').click(function(){
    	resetbuildingbuttons();
    	$('#location_set_3').removeClass('btn-default');
    	$('#location_set_3').addClass('btn-info');
    	$('#location_set_3').addClass('active');
		$('#tonopahfloorplans').fadeIn(250);
    });

    $('#location_set_4').click(function(){
    	resetbuildingbuttons();
    	$('#location_set_4').removeClass('btn-default');
    	$('#location_set_4').addClass('btn-info');
    	$('#location_set_4').addClass('active');
		$('#uccfloorplans_group_1').fadeIn(250);		  	 
    });
    
    $('#location_set_5').click(function(){
    	resetbuildingbuttons();
    	$('#location_set_5').removeClass('btn-default');
    	$('#location_set_5').addClass('btn-info');
    	$('#location_set_5').addClass('active');
		$('#uccfloorplans_group_2').fadeIn(250);		  	 
    });
    
    
    
    function buildingfloortile(id)
    {
    	if($('#location_'+id).length) {    		
    		removebuilding(id);    		
    	}
    	else{     	
    		addlocroom(id);
    	}
    }
    
    $('#pill_1').click(function(){    	
    	$('#pill_1').addClass();
    });
    
    $('#btnfloorplan_16').click(function(){    	
       	buildingfloortile(16);
    });
    

    $('#btnfloorplan_17').click(function(){    	
   		buildingfloortile(17);
    });

    $('#btnfloorplan_18').click(function(){    	
   		buildingfloortile(18);
    });

    $('#btnfloorplan_19').click(function(){    	
   		buildingfloortile(19);
    });

    $('#btnfloorplan_20').click(function(){    	
   		buildingfloortile(20);
    });

    $('#btnfloorplan_21').click(function(){    	
   		buildingfloortile(21);
    });

    $('#btnfloorplan_22').click(function(){    	
   		buildingfloortile(22);
    });

    $('#btnfloorplan_23').click(function(){    	
   		buildingfloortile(23);
    });

    $('#btnfloorplan_24').click(function(){    	
   		buildingfloortile(24);
    });

    $('#btnfloorplan_25').click(function(){    	
   		buildingfloortile(25);
    });

    $('#btnfloorplan_26').click(function(){    	
   		buildingfloortile(26);
    });

    $('#btnfloorplan_27').click(function(){    	
   		buildingfloortile(27);
    });

    $('#btnfloorplan_28').click(function(){    	
   		buildingfloortile(28);
    });
    
    
    //Specialty Floors
    
 
    function selectfloortile(id)
    {
    	if(locationcount>3) {
    	    window.scrollTo(0,0);	
    		showmsg('You have already chosen 3 options.  Please click on the selected button to remove a selection.');
    	}
    	else{
	    	$('#title_'+id).removeClass('muted');
	    	$('#desc_short_'+id).removeClass('muted');
	    	$('#desc_long_'+id).removeClass('muted');
	    	$('#floor_loc_badge_'+id).removeClass('badge-default');
	    	$('#floor_loc_badge_'+id).addClass('badge-info');
	    	$('#btnspecfloorselect_'+id).removeClass('btn-default');
	    	$('#btnspecfloorselect_'+id).addClass('btn-success');    	  
	    	$('#btnspecfloorselect_'+id).text('Selected');
	    	$('#btnspecfloorselect_'+id).addClass('active');
    	}
    }

    function deselectfloortile(id)
    {
    	$('#title_'+id).addClass('muted');
    	$('#desc_short_'+id).addClass('muted');
    	$('#desc_long_'+id).addClass('muted');
    	$('#floor_loc_badge_'+id).removeClass('badge-info');
    	$('#floor_loc_badge_'+id).addClass('badge-default');

    	$('#building_title_'+id).addClass('muted');
    	$('#building_price_'+id).addClass('muted');

    	$('#btnspecfloorselect_'+id).removeClass('btn-success');
    	$('#btnspecfloorselect_'+id).addClass('btn-default');
    	$('#btnspecfloorselect_'+id).removeClass('active');
    	$('#btnspecfloorselect_'+id).text('Select');
    }
    
    
    $('#btnspecfloorselect_0').click(function(){    	    	
       if($('#btnspecfloorselect_0').text()=='Select') {
    	   selectfloortile(0);
    	   addspecfloor(0, 'No Special Interest');
       }
       else {
    	   deselectfloortile(0);
    	   removespecfloor(0);
       }
    });

    
    $('#btnspecfloorselect_2').click(function(){    	    	
        if($('#btnspecfloorselect_2').text()=='Select'){
     	   selectfloortile(2);
     	   addspecfloor(2, 'All Women Floor');
        }
        else {
     	   deselectfloortile(2);
     	   removespecfloor(2);
        }
     });

    
    $('#btnspecfloorselect_4').click(function(){    	    	
        if($('#btnspecfloorselect_4').text()=='Select'){
     	   selectfloortile(4);
     	   addspecfloor(4, 'Study Intensive Floor');
        }
        else {
     	   deselectfloortile(4);
     	   removespecfloor(4);
        }
     });

    
    $('#btnspecfloorselect_14').click(function(){    	    	
        if($('#btnspecfloorselect_14').text()=='Select'){
     	   selectfloortile(14);
     	   addspecfloor(14, 'Honors House');
        }
        else {
     	   deselectfloortile(14);
     	   removespecfloor(14);
        }
     });

    
    $('#btnspecfloorselect_17').click(function(){    	    	
        if($('#btnspecfloorselect_17').text()=='Select'){
     	   selectfloortile(17);
     	   addspecfloor(17, 'Hotel House');
        }
        else {
     	   deselectfloortile(17);
     	   removespecfloor(17);
        }
     });

    
    $('#btnspecfloorselect_20').click(function(){    	    	
        if($('#btnspecfloorselect_20').text()=='Select'){
     	   selectfloortile(20);
     	   addspecfloor(20, 'Global House');
        }
        else {
     	   deselectfloortile(20);
     	   removespecfloor(20);
        }
     });

    
    $('#btnspecfloorselect_23').click(function(){    	    	
        if($('#btnspecfloorselect_23').text()=='Select'){
     	   selectfloortile(23);
     	   addspecfloor(23, 'Graduate & Older');
        }
        else {
     	   deselectfloortile(23);
     	   removespecfloor(23);
        }
     });

    $('#btnspecfloorselect_24').click(function(){    	    	
        if($('#btnspecfloorselect_24').text()=='Select'){
     	   selectfloortile(24);
     	   addspecfloor(24, 'Major Exploration');
        }
        else {
     	   deselectfloortile(24);
     	   removespecfloor(24);
        }
     });

    
    
    $('#btnspecfloorselect_25').click(function(){    	    	
        if($('#btnspecfloorselect_25').text()=='Select'){
     	   selectfloortile(25);
     	   addspecfloor(25, 'Business House');
        }
        else {
     	   deselectfloortile(25);
     	   removespecfloor(25);
        }
     });
    
    
    $('#floor_desc_more_text_0').click(function(){    	    	
    	$('#desc_top_short_0').hide();
    	$('#desc_top_long_0').show();
    })

    $('#floor_desc_less_text_0').click(function(){    	    	
    	$('#desc_top_long_0').hide();
    	$('#desc_top_short_0').show();
    })

    $('#floor_desc_more_text_2').click(function(){    	    	
    	$('#desc_top_short_2').hide();
    	$('#desc_top_long_2').show();
    })

    $('#floor_desc_less_text_2').click(function(){    	    	
    	$('#desc_top_long_2').hide();
    	$('#desc_top_short_2').show();
    })

    $('#floor_desc_more_text_4').click(function(){    	    	
    	$('#desc_top_short_4').hide();
    	$('#desc_top_long_4').show();
    })

    $('#floor_desc_less_text_4').click(function(){    	    	
    	$('#desc_top_long_4').hide();
    	$('#desc_top_short_4').show();
    })

    $('#floor_desc_more_text_14').click(function(){    	    	
    	$('#desc_top_short_14').hide();
    	$('#desc_top_long_14').show();
    })

    $('#floor_desc_less_text_14').click(function(){    	    	
    	$('#desc_top_long_14').hide();
    	$('#desc_top_short_14').show();
    })

    $('#floor_desc_more_text_17').click(function(){    	    	
    	$('#desc_top_short_17').hide();
    	$('#desc_top_long_17').show();
    })

    $('#floor_desc_less_text_17').click(function(){    	    	
    	$('#desc_top_long_17').hide();
    	$('#desc_top_short_17').show();
    })

    $('#floor_desc_more_text_20').click(function(){    	    	
    	$('#desc_top_short_20').hide();
    	$('#desc_top_long_20').show();
    })

    $('#floor_desc_less_text_20').click(function(){    	    	
    	$('#desc_top_long_20').hide();
    	$('#desc_top_short_20').show();
    })
    
    $('#floor_desc_more_text_23').click(function(){    	    	
    	$('#desc_top_short_23').hide();
    	$('#desc_top_long_23').show();
    })

    $('#floor_desc_less_text_23').click(function(){    	    	
    	$('#desc_top_long_23').hide();
    	$('#desc_top_short_23').show();
    })
    
    $('#floor_desc_more_text_24').click(function(){    	    	
    	$('#desc_top_short_24').hide();
    	$('#desc_top_long_24').show();
    })

    $('#floor_desc_less_text_24').click(function(){    	    	
    	$('#desc_top_long_24').hide();
    	$('#desc_top_short_24').show();
    })
    
    $('#floor_desc_more_text_25').click(function(){    	    	
    	$('#desc_top_short_25').hide();
    	$('#desc_top_long_25').show();
    })

    $('#floor_desc_less_text_25').click(function(){    	    	
    	$('#desc_top_long_25').hide();
    	$('#desc_top_short_25').show();
    })
    
	$("#byfloors").click(function(e){
		clearallbuildings()
		$("#building").hide();
		$("#floor").show();	
		$("#byfloorsicon").addClass( "icon-check" );
		$("#bybuildingsicon").removeClass( "icon-check" );
		$("#byfloors").removeClass('btn-default');
		$("#byfloors").addClass('btn-info active');
		$("#bybuildings").removeClass('btn-info active');
		$("#bybuildings").addClass('btn-default');
		$("#byfloor").prop("checked", true);		
		$("#bybuildingtilesicon").removeClass( "icon-check" );
		$("#bybuildingtiles").removeClass('btn-info active');
		$("#bybuildingtiles").addClass('btn-default');
		$('#specialtyfloorsections').html('');
		locationcount=1;
		$.each(prefs, function(key, value) {
			prefs.pop();
		});
	});
	
	$("#bybuildings").click(function(e){		
		clearallfloors();
		$("#building").show();
		$("#floor").hide();
		$("#bybuildingsicon").addClass( "icon-check" );
		$("#byfloorsicon").removeClass( "icon-check" );
		$("#bybuildings").removeClass('btn-default');
		$("#bybuildings").addClass('btn-info active');
		$("#byfloors").removeClass('btn-info active');
		$("#byfloors").addClass('btn-default');
		$("#bybuildings").prop("checked", true);
		$('#specialtyfloorsections').html('');
		locationcount=1;
		$.each(prefs, function(key, value) {			
			prefs.pop();
		});
		
	});

	
	function clearallbuildings()
	{
		for(id=16;id<=28;id++)
		{
		    $("#divlocationselection"+id).remove();
			$("#floorplan_img_"+id).removeClass( "img-selected");
			$("#floorplan_img_"+id).addClass( "img-unselected");
			$("#review_location_"+id).remove();
			$("#building_thumbnail_"+id).css('border-color', 'lightgray');
			$("#building_thumbnail_"+id).css('border-width', 'thin');
			$('#building_title_'+id).addClass('muted');
			$('#building_price_'+id).addClass('muted');
			$('#floorplan_status_'+id).hide();
			$('#btnfloorplan_'+id).removeClass('btn-success');
			$('#btnfloorplan_'+id).addClass('btn-default');
			$('#btnfloorplan_'+id).removeClass('active');
			$('#btnfloorplan_'+id).text('Select');
		}
	}

	function clearallfloors()
	{
		for(id=0;id<=25;id++)
		{
			$('#btnspecflooryes'+id).removeClass('btn-success');
			$('#btnspecflooryes'+id).addClass('btn-default');    
		    $('#divlocationselection'+id).remove();
		    $('#divspecialtyterm_'+id).hide();
		    $('#review_location_'+id).remove();

		   	$('#title_'+id).addClass('muted');
			$('#desc_short_'+id).addClass('muted');
			$('#desc_long_'+id).addClass('muted');
			$('#floor_loc_badge_'+id).removeClass('badge-info');
			$('#floor_loc_badge_'+id).addClass('badge-default');

			$('#building_title_'+id).addClass('muted');
			$('#building_price_'+id).addClass('muted');

			$('#btnspecfloorselect_'+id).removeClass('btn-success');
			$('#btnspecfloorselect_'+id).addClass('btn-default');
			$('#btnspecfloorselect_'+id).removeClass('active');
			$('#btnspecfloorselect_'+id).text('Select');
		}
	}

    
})(jQuery);

