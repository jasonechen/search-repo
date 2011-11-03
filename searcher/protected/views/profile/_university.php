<!--THIS IS THE VIEW FILE FOR THE UNIVERSITY TAB IN THE BASIC INFO SECTION-->
<div class="container">
<div class="form">


    
    
<?php 

     // $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-profile-basic-form',
	'enableAjaxValidation'=>true,
)); ?>

        <?php echo $form->hiddenField($basicProfile,'curr_university_id'); ?>
        <?php echo $form->hiddenField($basicProfile,'first_university_id'); ?>
        <?php echo $form->hiddenField($personalProfile,'alumni_connections_flag',array('value'=>'2')); ?> 
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($personalProfile); ?>
        <?php echo $form->errorSummary($basicProfile); ?>



	<div class="row">
		<?php echo $form->labelEx($basicProfile,'curr_university_id',array('label'=>'Current University')); ?>
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
                            'style'=>'height:18px;width:220px'
                            ),
                )); ?>
            
		<?php echo $form->error($basicProfile,'curr_university_id'); ?>
	</div>
      
        <div class="row"> <br>  </div>
	
        <div class="checkboxform row">
		<?php echo $form->labelEx($basicProfile,'isTransfer',array('label'=>'Transfer student?')); ?>
		<?php echo $form->dropDownList($basicProfile,'isTransfer',
                                                                   array(''=>'',
                                                                        'N'=>'No',
                                                                         'Y'=>'Yes')); ?>

		<?php echo $form->labelEx($basicProfile,'first_university_id',array('label'=>'First University')); ?>
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
                            'style'=>'height:18px;width:220px'
                            ),
                )); ?>
                
                
		<?php echo $form->error($basicProfile,'first_university_id'); ?>
	</div>
        
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
</script> 

<div class="span-24"> <br>  </div>
        <div class="row">
		<?php echo $form->labelEx($personalProfile,'alumni_connections',array('label'=>"Alumni Connections")); ?>
		<?php echo $form->checkBoxList($personalProfile,'alumni_connections',
                        array('None'=>'None','Father'=>'Father','Mother'=>'Mother','Sibling'=>'Sibling(s)','Other'=>'Other Relative(s)')); ?>
	</div>

<div class="span-24"> <br>  </div>



	
<div class="span-6 last">
		<?php echo $form->labelEx($personalProfile,'current_major'); ?>
                <?php echo $form->dropDownList($personalProfile,'current_major',$personalProfile->getMajorOptions()); ?>
		<?php echo $form->error($personalProfile,'current_major'); ?>
	</div>
  
        


<div class="span-24"> <br>  </div>
<div class="span-6 last">
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('basicSuccess')):?> 
        <div class="successMessage"> 
        <?php echo 'Info Updated and Saved!' /*Yii::app()->user->getFlash('basicSuccess');*/ ?> 
        </div> <?php endif; ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>