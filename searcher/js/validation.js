// validation For School Admittance
//function validationSA(){
//	var count = 0 ;
//	var Error = false;		
//	$('.req').each(function(index) {							      		
//		if($('#row'+index+'univ').css('display') != 'none'){			
//		   if($(this).val() == '' ){
//			 $(this).addClass('error'); 
//			 $('#otherschool_id'+index+'Error').css('display','block');
//			 Error = true;   
//			 count++;
//		   }
//		}
//		
//		
//	});
//	
//	if(count == 1){
//	 $('#otherschool_id0').removeClass('error');			 
//	 $('#otherschool_id0Error').css('display','none');	
//		return true;	
//	}
//	
//	
//	
//	if(count == 0){			
//	 $('#row0univ').css('display','table-row');
//	 $('#otherschool_id0').addClass('error');			 
//	 $('#otherschool_id0Error').css('display','block');
//	 return false;
//	}
//	
//// IF Error 
//	if(Error ){
//		return false;	
//	}
//	
//}


// Function to  validate only if the defalult field is removed it  shows error ...
function validationSA(){

	var count = 0 ;
	var Error = false;		
	$('.req').each(function(index) {							      		
		if($('#row'+index+'univ').css('display') != 'none'){
			 count++;
		}
	});

// Get count , if 0 then check that first(default row) is removed , then show error 
	if(count == 0  && $('#row0univ').css('display') == 'none'){			
	 $('#row0univ').css('display','table-row');
	 $('#otherschool_id0').addClass('error');			 
	 $('#otherschool_id0Error').css('display','block');
	 return false;
	}
	
// IF Error 
	if(Error ){
		return false;	
	}
	
}









///New validiton validationt For Languages  
// validation and validationLanguage are same , only differs by conditon AO 

/*function validationLanguage(form){
		var DoValidation;
		var Error = false;
		
	$('.templateContent').each(function(index) {	
		
		DoValidation = false;
		
		$(this).find('.req').each(function(index) {
			if( $(this).val() != 'A0' &&  $(this).val() != ''  ){							
				DoValidation = true;		
			}
			
			// Check the Select box checkded
			
			
		});
		// If validation
		if(DoValidation){
			$(this).find('.req').each(function(index) {
				// DO Validation
				var Id= $(this).attr('id');		
				Id = Id.replace("{","");	
				Id = Id.replace("}","");
				Id = Id + "Error";
				
				//alert($(this).val() + $(this).attr('id'));
				// For Language Form A0 is empty		
				if($(this).val() == 'A0'  || $(this).val() ==''){	
				//alert($(this).val() + $(this).attr('id'));
					$(this).addClass('error');
					$("#"+Id).css('display','block');
					Error = true;
				}else{
					$("#"+Id).css('display','none');
					$(this).removeClass('error');
				}	
				//End Validation			
			});
		}
	});
	
	// IF Error 
	if(Error){
		return false;	
	}
	
	
}*/



function validationLanguage(form){
		var DoValidation;
		var language;
		var Error = false;
		var rdio;
		var Id;
		
		
		error = false;
		
	$('.templateContent').each(function(x) {		
		//alert('main');
		$(this).find('.req').each(function(y) {
										

				language = false;
				rdio         = false;									   
				// check language
				if( $(this).val() != 'A0' &&  $(this).val() != ''  ){							
					language = true;
					// remove the error Class
					$(this).removeClass('error');
					// hide the error in Error div
					$('#LanguageProfile_'+x+'_language_idError').css('display','none');
					
				}			
							
				
				
				//alert('.rdtd'+x);
				$('.rdtd'+x).find(':radio:checked').each(function(z) {					
					rdio = true;					
					$('#LanguageProfile_'+x+'_fluencyError').css('display','none');
					//alert('LanguageProfile_'+x+'_fluencyError');
				});
				
				
				if((language) && (rdio) ){
					DoValidation = false;
				}else if((language == true) || (rdio == true)) {
					DoValidation = true;
				}else if((language == false) && (rdio == false)){
					DoValidation = false;
				}								
			
			
			if(DoValidation){
				
				if(language == false){
					
					Id = $('#'+getErrorId($(this).attr('id')));
					$(this).addClass('error');
					
				}else if(rdio == false){
					
					Id  = $('#'+$('#LanguageProfile_'+x+'_fluencyError').attr('id'));	
					
					
				}
				
				if(language == true){
					$('#'+getErrorId($(this).attr('id'))).css('display','none');
					$('#LanguageProfile_'+x+'_fluency').removeClass('error');
					
				}
				
				if(rdio == true){
						$('#'+$('#LanguageProfile_'+x+'_fluencyError').attr('id')).css('display','none');
						
				}
				
				
				Id.css('display','block');			
				error = true;
			}
				
		});	
		
	});		
	
	if(error){
			return false;
   }
	
}



function getErrorId(Id){

//	var Id= $(this).attr('id');		
	Id = Id.replace("{","");	
	Id = Id.replace("}","");
	Id = Id + "Error";
	return Id;
	
}




// For validation University Form
function validationUniv(form){	
	var Error = false;
// Current University	
	if(  $('#curr_university_id').val() == '' ){
		 $('#curr_university_id').addClass('error');
		 $('#BasicProfile_curr_university_id_em_').html('Current University Cannot be left blank');
		$('#BasicProfile_curr_university_id_em_').css('display','block');
		Error = true;
	}
// 	For first University
	if( $('#BasicProfile_isTransfer').attr('checked') == 'checked' ){
		if($('#first_university_id').val() == '' ){
			 $('#first_university_id').addClass('error');
			  $('#BasicProfile_first_university_id_em_').html('First University Cannot be left blank');	
			   $('#BasicProfile_first_university_id_em_').css('display','block');
				Error = true;
		}		
	}
	if(Error){
		return false;
	}
}



// For other Forms
function validation(form){
	
		var DoValidation;
		var Error = false;
		var Id;
		
	$('.templateContent').each(function(index) {	
		DoValidation = false;
		$(this).find('.req').each(function(index) {								   
			if($(this).val() != ''  ){				
				DoValidation = true;
			}
		});
		
		
		// If validation
		if(DoValidation){			
			$(this).find('.req').each(function(index) {
				// DO Validation
				Id= $(this).attr('id');		
				Id = Id.replace("{","");	
				Id = Id.replace("}","");
				Id = Id + "Error";
				
				
							
				if($(this).val() ==''){					
					$(this).addClass('error');
					$("#"+Id).css('display','block');
					Error = true;
				}else{
					$("#"+Id).css('display','none');
					$(this).removeClass('error');
				}	
				//End Validation			
			});
			
			
		// If any From year  to Year  Fields..Check it , if this Function retrun False . .this is error..
			if(FromToCheck( $(this).find('.from').val(), $(this).find('.to').val() )){					
						
					$(this).addClass('error');
					$("#"+Id).css('display','block');
					$("#"+Id).html('End Year must be equal or later than Begin Year');
					Error = true;
			}
		
		}
	});
	
	
	// IF Error 
	if(Error){
		return false;	
	}	
	
}

// For Extra curricular Form
function validationEC(form){
	
	var DoValidation;
	var Error = false;
	var Id;
	var Id2;
	
	$('.cpanel').find('.cpanelContent').each(function(index) {		
		// IF the Checkbox is Checked then Do the validation
		if( $(this).css('display') == 'block' ) {
				$(this).find('.templateContent').each(function(index) {	
					DoValidation = false;
					$(this).find('.req').each(function(index) {								   						
						if($(this).val() != ''  ){									
							DoValidation = true;
						}
				});
			
				if(DoValidation){			
					$(this).find('.req').each(function(index) {
					// DO Validation
						Id= $(this).attr('id');		
						Id = Id.replace("{","");	
						Id = Id.replace("}","");
						Id = Id + "Error";
						
						
						
						if($(this).val() ==''){					
							$(this).addClass('error');
							$("#"+Id).css('display','block');
							Error = true;
						}else{
							$("#"+Id).css('display','none');
							$(this).removeClass('error');
						}	
					//End Validation			
					});
					
						// If any From year  to Year  Fields..Check it , if this Function retrun False . .this is error..
					if(FromToCheck($(this).find('.from').val(), $(this).find('.to').val() )){					
							
							$(this).find('.to').addClass('error');
							Id2 = $(this).find('.to').attr('id')
							Id2 = Id2.replace("{","");	
							Id2 = Id2.replace("}","");
							Id2 = Id2 + "Error";							
							$("#"+Id2).css('display','block');
							$("#"+Id2).html('End Year must be equal or later than Begin Year');
							Error = true;
					}
							
				}		
					
			}); // End TemplateContetn
		}			 	 
	});
	
	
	// IF Error 
	if(Error){
		return false;	
	}	

}

// validation For ModEssay
function validationmodEssay(form){
	// Check Validation
	
	var FileTypeError;
	$(form).find('.file').each(function(index) {
		FileTypeError = false;
		if($(this).val() != '' ){	
				Id= $(this).attr('id');		
				Id = Id.replace("{","");	
				Id = Id.replace("}","");
				Id = Id + "Error";
				
			if(!Checksubstr($(this).val(),".pdf") &&  !Checksubstr($(this).val(),".doc")){						
				
				$(this).addClass('error');
				$("#"+Id).html('Invalid File');
				$("#"+Id).css('display','block');
				FileTypeError = true;
				
			}else{
				$("#"+Id).css('display','none');
				$(this).removeClass('error');			
			}
		
		}
		
	});
	
	
	// Check unique Essay name
	var vars=new Array();
	
	$(form).find(':text').each(function (index) {
		if($(this).val() != ''){										 
			vars[index] = $(this).val();
		}
	});	
	 
	 if(parseInt(vars.length) >  parseInt($.unique(vars).length) ){
												   
		$('#errorUniqueEssayName').css('display','table-row');	
		FileTypeError = true;
	}else{
			$('#errorUniqueEssayName').css('display','none');												   
	}
	// Get the size of array
	 
//	alert(uniQuearray.length);
	
	/*if(parseInt(uniQuearray.length) < parseInt(vars.length)){
		alert('error');
	}*/
	
	///////////////////////
	

	
	if(!FileTypeError){		
		return validation(form);
	}else{
		return false;
	}
	
	
}
function CheckFile(form){
	
	// Check the FIle is doc or PdF
	
}

function Checksubstr(haystack, needle) {
    return haystack.indexOf(needle) !== -1;
};


function FromToCheck(from,to){	

	if(parseInt(from) > parseInt(to)){
		return true;
	}// return True if error
	else{
	 return false;    // return false if not error
	}
} 
// validation
