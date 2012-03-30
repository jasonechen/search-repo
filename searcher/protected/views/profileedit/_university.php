<?php $this->setAdminMenu(); 
	$this->IncludeJsDynamicrows();
?>

<div class="sub-head-profile-edit">Personal Info - University</div>
<div class="container">
<div class="span-26 last">    



    
    
<?php 

     // $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-profile-basic-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('onsubmit'=>'return validationUniv(this);')
)); ?>

        <?php echo $form->hiddenField($basicProfile,'curr_university_id'); ?>
        <?php echo $form->hiddenField($basicProfile,'first_university_id'); ?>
        <?php echo $form->hiddenField($personalProfile,'alumni_connections_flag',array('value'=>'2')); ?> 
    


        <?php echo $form->errorSummary($personalProfile); ?>
        <?php echo $form->errorSummary($basicProfile); ?>
    <div class="uprofileform">
   <table width="700" height="400" >
      <col width="200px" />
      <col width="400px" />    
      <col width="150px" />
        <tr>
        
            <td>
		<?php echo $form->labelEx($basicProfile,'curr_university_id',array('label'=>'Current University')); ?>
            </td>
        <td>
                <?php
                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'=>$basicProfile,
                        'attribute'=>'curr_university_name',
//                        'id'=>'curr_university_id',
                        'name'=>'curr_university_id',
                        'source'=>$this->createURL('profile/suggestUniversity'),
                         // additional javascript options for the autocomplete plugin
                        'options'=>array(
                            'minLength'=>'2',
                            'select'=>"js:function(event, ui) {
                                    $('#BasicProfile_curr_university_id').val(ui.item['id']);
                                }"
                            ),
                        'htmlOptions'=>array(
                            'style'=>'height:21px;width:400px'
                            ),
                )); ?>
            
		<?php echo $form->error($basicProfile,'curr_university_id'); ?>
	</td>
        <tr>
            <td>
               <?php echo $form->label($basicProfile, 'early_regular', array('label'=>'When Applied')) ?>
            </td>
            <td>
                <?php echo $form->radioButtonList($basicProfile,'early_regular',
                                        array (1=>'Regular Admissions', 0=>'Early Admissions', )); ?>
        </td>
        </tr>
        <tr>
            <td>
		<?php
                $isTransfer=$basicProfile->isTransfer=='Y'?1:0;
                echo $form->labelEx($basicProfile,'isTransfer',array('label'=>'Transfer Student? (Check if Yes)')); ?>            
            </td>
            <td>
    <?php echo $form->checkBox($basicProfile,'isTransfer',array('onclick'=>'isTransferFn(this);','value'=>$isTransfer,'checked'=>$isTransfer)); ?></br>
		<div id="FirstUnivDiv"  style="display:none;">			
			<?php echo $form->labelEx($basicProfile,'first_university_id',array('label'=>'Enter First University Attended')); ?>
			 <?php
							$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
							'model'=>$basicProfile,
							'attribute'=>'first_university_name',
	//                        'id'=>'first_university_id',
							'name'=>'first_university_id',
							'source'=>$this->createURL('profile/suggestUniversity'),
							 // additional javascript options for the autocomplete plugin
							'options'=>array(
								'minLength'=>'2',
								'select'=>"js:function(event, ui) {
										$('#BasicProfile_first_university_id').val(ui.item['id']);
									}"
								),
							'htmlOptions'=>array(
								'style'=>'height:21px;width:400px'								
								),
					)); ?>
					
					
			<?php echo $form->error($basicProfile,'first_university_id'); ?>            
                
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($personalProfile,'alumni_connections',array('label'=>"Alumni Connections (Check all that apply)")); ?>
                
            </td>
            <td>
              <?php echo $form->checkBoxList($personalProfile,'alumni_connections',
                        array('None'=>'None','Father'=>'Father','Mother'=>'Mother','Sibling'=>'Sibling(s)','Other'=>'Other Relative(s)')); ?>
            </td>
        </tr>
        <tr>
            <td>    
             <?php echo $form->labelEx($personalProfile,'current_major'); ?>   
                
            </td>
            <td>
              <?php echo $form->dropDownList($personalProfile,'current_major',$personalProfile->getMajorOptions(),array('prompt'=>'Select Major')); ?>
		<?php echo $form->error($personalProfile,'current_major'); ?>
                </td>
        </tr>
            
            
            
            
   </table>



        
 <script language="javascript">
//     $(document).ready(function(){
    function checkCorrect() {
//                        window.alert($(this).attr('checked'));
            if (($(this).attr('id') == "PersonalProfile_alumni_connections_0")
                && ($(this).prop('checked')==true)){

                window.alert($('#PersonalProfile_alumni_connections_1').attr('checked'));
                                $('#PersonalProfile_alumni_connections_1').prop("checked",false);
                $('#PersonalProfile_alumni_connections_2').prop("checked",false);
                $('#PersonalProfile_alumni_connections_3').prop("checked",false);
                $('#PersonalProfile_alumni_connections_4').prop("checked",false);
                                $('#PersonalProfile_alumni_connections_1').trigger('click');
                $('#PersonalProfile_alumni_connections_2').trigger('click');
                $('#PersonalProfile_alumni_connections_3').trigger('click');
                $('#PersonalProfile_alumni_connections_4').trigger('click');
            }
            else if ($(this).attr('id') == "PersonalProfile_alumni_connections_1"){
                window.alert($('#PersonalProfile_alumni_connections_1').attr('checked'));
//                 $('#PersonalProfile_alumni_connections_2').click();
                 $('#PersonalProfile_alumni_connections_2').prop("checked",true);
                                  $('#PersonalProfile_alumni_connections_2').trigger('click');
                                 window.alert($('#PersonalProfile_alumni_connections_2').prop('checked'));
            }
//            else{
//                $('#PersonalProfile_alumni_connections_0').attr('checked',true);
//            
//            }
    }
//
//    $('#PersonalProfile_alumni_connections_0').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_1').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_2').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_3').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_4').click(checkCorrect);
//     });

function isTransferFn(chkBox){
	
	var IsChecked = chkBox.checked ;
        chkBox.value= IsChecked?1:0;
	var firstUnivId = IsChecked ? 'block' : 'none' ;	
	$('#FirstUnivDiv').css('display',firstUnivId);
}
// isTransferCheckbox is set checked if any previous db value(first univ_id ) , it has
function isTransferCheckbox(IsChecked){
        
        if(IsChecked)
            $('#BasicProfile_isTransfer').attr('checked','checked');
	 
	 FirstUnivshowDiv(IsChecked);
}

function FirstUnivshowDiv(IsChecked){
	var firstUnivId = IsChecked ? 'block' : 'none' ;	
	$('#FirstUnivDiv').css('display',firstUnivId);
}
isTransferCheckbox(<?php print $isTransfer; ?>);
</script> 


 
</div>
        


<div class="span-24"> <br>  </div>

        <div class="span-3 last">
            <div class="buttons">
                <?php echo CHtml::submitButton('Update'); ?>
	</div>
     </div>
   


<?php $this->endWidget(); ?>
<div class="span-24"> <br></br><br></br>  </div>

</div>
</div>
    