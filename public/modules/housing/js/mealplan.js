var mealplanArr=new Object();
mealplanArr['120']="Unlimited+200";
mealplanArr['121']="Block 240+250";
mealplanArr['122']="Block 210+300";
mealplanArr['123']="Block 180+350";
mealplanArr['124']="Block 150+400";
mealplanArr['125']="Block 120+450";


function resetmealplan()
{
	for(i=1;i<=6;i++)
	{
		$("#mealplanblk" + i + "btn").removeClass('btn-success');
		$("#mealplanblk" + i + "btn").addClass('btn-default');
		$("#mealplanblk" + i + "btn").text('Select');
		$("#mealplanblk" + i + "text").removeClass('infoselect');
		$("#mealplanblk" + i + "text").addClass('infonoselect');
		$("#mealplanblk" + i + "price").removeClass('priceinfoselected');
		$("#mealplanblk" + i + "1price").addClass('priceinfonotselected');
		$("#checkmark" + i).hide();			
	}
}


function resetsummermealplan()
{
	for(i=1;i<=3;i++)
	{
		//	$("#summer_session_1_mealplan_" + i + "_badge").removeClass('badge-success');
		//	$("#summer_session_2_mealplan_" + i + "_badge").removeClass('badge-success');
		//	$("#summer_session_3_mealplan_" + i + "_badge").removeClass('badge-success');

		$("#summer_mealplanblk" + i + "btn").removeClass('btn-success');
		$("#summer_mealplanblk" + i + "btn").addClass('btn-default');
		$("#summer_mealplanblk" + i + "btn").text('Select');
		$("#summer_mealplanblk" + i + "text").removeClass('infoselect');
		$("#summer_mealplanblk" + i + "text").addClass('infonoselect');
		$("#summer_mealplanblk" + i + "price").removeClass('priceinfoselected');
		$("#summer_mealplanblk" + i + "price").addClass('priceinfonotselected');
		$("#summer_checkmark" + i).hide();
		$("#price_building_16_location_1_mealplan_" + i).hide();
		$("#price_building_16_location_2_mealplan_" + i).hide();
		$("#price_building_16_location_3_mealplan_" + i).hide();		
		$("#price_building_17_location_1_mealplan_" + i).hide();
		$("#price_building_17_location_2_mealplan_" + i).hide();
		$("#price_building_17_location_3_mealplan_" + i).hide();		
	}
}

$(document).ready(function(){

function selectplan(index)
{
	resetmealplan();
	$("#mealplanblk" + index + "btn").addClass('btn-success');
	$("#mealplanblk" + index + "text").addClass('infoselect');
	$("#mealplanblk" + index + "price").removeClass('priceinfonotselected');
	$("#mealplanblk" + index + "price").addClass('priceinfoselected');
	$("#checkmark" + index).show();						
}

function selectsummerplan(index)
{
	resetsummermealplan();	
//	$("#summer_session_1_mealplan_" + index + "_badge").addClass('badge-success');	
//	$("#summer_session_2_mealplan_" + index + "_badge").addClass('badge-success');	
//	$("#summer_session_3_mealplan_" + index + "_badge").addClass('badge-success');
	
	$("#summer_mealplanblk" + index + "btn").addClass('btn-success');
	$("#summer_mealplanblk" + index + "price").removeClass('priceinfonotselected');
	$("#summer_mealplanblk" + index + "price").addClass('priceinfoselected');
	$("#summer_checkmark" + index).show();
	$("#price_building_16_location_1_mealplan_" + index).show();
	$("#price_building_16_location_2_mealplan_" + index).show();
	$("#price_building_16_location_3_mealplan_" + index).show();
	$("#price_building_17_location_1_mealplan_" + index).show();
	$("#price_building_17_location_2_mealplan_" + index).show();
	$("#price_building_17_location_3_mealplan_" + index).show();
}


/*
<option value="120">Unlimited+200</option>
<option value="121">Block 240+250</option>
<option value="122">Block 210+300</option>
<option value="123">Block 180+350</option>
<option value="124">Block 150+400</option>
<option value="125">Block 120+450</option>
*/
	

$("#mealplan").change(function () {	
	$("#review_meal_plan").text(mealplanArr[$("#mealplan :selected").val()]);
});


$("#mealplanblk1btn").click(function(e){
	selectplan("1");
	$("input[name=mealplan]").val(mealplanArr['120']);	
	$("#review_meal_plan").text(mealplanArr['120']);
	$("#mealplan").val('120');
})

$("#mealplanblk2btn").click(function(e){
	selectplan("2");
	$("input[name=mealplan]").val(mealplanArr['121']);
	$("#review_meal_plan").text(mealplanArr['121']);
	$("#mealplan").val('121');
})

$("#mealplanblk3btn").click(function(e){
	selectplan("3");
	$("input[name=mealplan]").val(mealplanArr['122']);
	$("#review_meal_plan").text(mealplanArr['122']);
	$("#mealplan").val('122');
})

$("#mealplanblk4btn").click(function(e){
	selectplan("4");
	$("input[name=mealplan]").val(mealplanArr['123']);
	$("#review_meal_plan").text(mealplanArr['123']);
	$("#mealplan").val('123');
})

$("#mealplanblk5btn").click(function(e){
	selectplan("5");
	$("input[name=mealplan]").val(mealplanArr['124']);
	$("#review_meal_plan").text(mealplanArr['124']);
	$("#mealplan").val('124');
})

$("#mealplanblk6btn").click(function(e){
	selectplan("6");
	$("input[name=mealplan]").val(mealplanArr['125']);
	$("#review_meal_plan").text(mealplanArr['125']);
	$("#mealplan").val('125');
})




$("#summer_mealplanblk1btn").click(function(e){
	selectsummerplan("1");
	$("input[name=mealplan]").val(mealplanArr['120']);	
	$("#review_meal_plan").text(mealplanArr['120']);
	$("#mealplan").val('120');		
})

$("#summer_mealplanblk2btn").click(function(e){
	selectsummerplan("2");
	$("input[name=mealplan]").val(mealplanArr['121']);
	$("#review_meal_plan").text(mealplanArr['121']);
	$("#mealplan").val('121');
})

$("#summer_mealplanblk3btn").click(function(e){
	selectsummerplan("3");
	$("input[name=mealplan]").val(mealplanArr['122']);
	$("#review_meal_plan").text(mealplanArr['122']);
	$("#mealplan").val('122');
})


})(jQuery);




