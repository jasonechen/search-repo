/**
 * jQuery script for adding new content from template field
 *
 * NOTE!
 * This script depends on jquery.format.js
 *
 * IMPORTANT!
 * Do not change anything sexcept specific commands!
 */
jQuery(document).ready(function(){
	hideEmptyHeaders();
	$(".add").click(function(){
		var template = jQuery.format(jQuery.trim($(this).siblings(".template").val()));		
		var place = $(this).parents(".templateFrame:first").children(".templateTarget");		
		var i = place.find(".rowIndex").length>0 ? place.find(".rowIndex").max()+1 : 0;		
		$(template(i)).appendTo(place);
		place.siblings('.templateHead').show()		
		// start specific commands
			
			
		// Only 5 fields are allowed in essay Form	
		 if($('.form').find('form').attr('id') == 'modEssay-form' ){
			if(i >= 4 ){				
				$(".add").css('display','none');	
			}
			 
		 }else{
			if(i >= 9 ){				
				$(".add").css('display','none');	
			}
		 }
		// end specific commands
	});

	$(".remove").live("click", function() {
	// Customized 	
		var template = jQuery.format(jQuery.trim($(this).siblings(".template").val()));
		var place = $(this).parents(".templateFrame:first").children(".templateTarget");
		var i = place.find(".rowIndex").length>0 ? place.find(".rowIndex").max() : 0;		
		$(".add").css('display','block');
	//End Customized	
		$(this).parents(".templateContent:first").remove();
		hideEmptyHeaders();			
	});
	
	
	// removeRow
	$(".removeRow").live("click", function() {		
										   	
	  var rowId = $(this).attr('id')+'univ';
	  var Index;
		$('#'+rowId).css('display','none');
			 // Show the Add New Button 
			 $('.addRow').show();
			 // Reset this value textbox		    		 
				Index = $(this).attr('id').replace("row","");
			   $('#otherschool_id'+Index).val('');
		});
	
	// addRow
	$(".addRow").live("click", function() {			 	
		var NextRow;
		var value;
		var row ;
		$('.rowIndex').each(function(index) {				
			value  = $(this).val();
			row = "#row"+value+"univ";
			if($(row).css('display') != 'none'){
				NextRow = value;
			}
				
		});
		
				
		NextRow = parseInt(NextRow) + 1;		
		// Clear the text box
		$('#otherschool_id'+NextRow).val('');		
		// Hide the New button If max 10 is reached
		if(NextRow >= 10){
			$('.addRow').hide();
		}
		$('#row'+NextRow+'univ').css('display','table-row');
		
    });
	
});

function hideEmptyHeaders(){
	$('.templateTarget').filter(function(){return $.trim($(this).text())===''}).siblings('.templateHead').hide();
}