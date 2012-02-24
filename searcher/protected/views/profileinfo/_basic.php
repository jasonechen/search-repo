
<!--THIS FILE IS NOT BEING USED AT ALL-->
<div class="form">

<?php 

  //      $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-profile-basic-form',
	'enableAjaxValidation'=>true,
)); ?>
            		<?php echo $form->hiddenField($basicProfile,'curr_university_id'); ?>
        		<?php echo $form->hiddenField($basicProfile,'first_university_id'); ?>
        		<?php echo $form->hiddenField($basicProfile,'alumni_connections_flag'); ?>
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($personalProfile); ?>
        <?php echo $form->errorSummary($basicProfile); ?>

	<div class="span-24">
		<?php echo $form->labelEx($basicProfile,'profile_type',array('label'=>'Profile Type')); ?>
		<?php echo $form->dropDownList($basicProfile,'profile_type',   BasicProfile::$ProfileTypeArray
                                                                   ); ?>
	</div>        
        <div class="span-24"> <br>  </div>
	<div class="span-7">
		<?php echo $form->labelEx($basicProfile,'first_university_id',array('label'=>'First University')); ?>
		 <?php
                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'=>$basicProfile,
                        'attribute'=>'first_university_name',
//                        'id'=>'first_university_id',
                        'name'=>'first_university_name',
                        'source'=>$this->createURL('profile/suggestUniversity'),
                         // additional javascript options for the autocomplete plugin
                        'options'=>array(
                            'minLength'=>'2',
                            'select'=>"js:function(event, ui) {
                                    $('#BasicProfile_first_university_id').val(ui.item.id);
                                }"
                            ),
                        'htmlOptions'=>array(
                            'style'=>'height:18px;width:220px'
                            ),
                )); ?>
                
                
		<?php echo $form->error($basicProfile,'first_university_id'); ?>
	</div>

	<div class="span-7">
		<?php echo $form->labelEx($basicProfile,'curr_university_id',array('label'=>'Current University')); ?>
		<?php
                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'=>$basicProfile,
                        'attribute'=>'curr_university_name',
//                        'id'=>'curr_university_id',
                        'name'=>'curr_university_name',
                        'source'=>$this->createURL('profile/suggestUniversity'),
                         // additional javascript options for the autocomplete plugin
                        'options'=>array(
                            'minLength'=>'2',
                            'select'=>"js:function(event, ui) {
                                    $('#BasicProfile_curr_university_id').val(ui.item.id);
                                }"
                            ),
                        'htmlOptions'=>array(
                            'style'=>'height:18px;width:220px'
                            ),
                )); ?>
            
		<?php echo $form->error($basicProfile,'curr_university_id'); ?>
	</div>

	<div class="span-3 last">
		<?php echo $form->labelEx($basicProfile,'isTransfer',array('label'=>'Transfer student?')); ?>
		<?php echo $form->dropDownList($basicProfile,'isTransfer',
                                                                   array(''=>'',
                                                                        'N'=>'No',
                                                                         'Y'=>'Yes')); ?>
	</div>
<div class="span-24"> <br>  </div>
	<div class="span-6">
		<?php echo $form->labelEx($basicProfile,'gender',array('label'=>'Gender')); ?>
		<?php echo $form->dropDownList($basicProfile,'gender',
                                                                   array(''=>'','M'=>'Male',
                                                                         'F'=>'Female')); ?>
	</div>
  <div class="span-11 last">
		<?php echo $form->labelEx($basicProfile,'race_id',array('label'=>'Race',)); ?>
		<?php echo $form->dropDownList($basicProfile,'race_id', $basicProfile->getRaceOptions()); ?>
		<?php echo $form->error($basicProfile,'race_id'); ?>
	</div>
        
<div class="span-24"> <br>  </div>

	<div class="span-6">
		<?php echo $form->labelEx($personalProfile,'citizenship'); ?>
		<?php echo $form->dropDownList($personalProfile,'citizenship',
                                                                   array(''=>'','USA'=>'United States',
                                                                         'PRC'=>'China',
                                                                         'MEX'=>'Mexico')); ?>
	</div>
        
	<div class="span-11 last">
		<?php echo $form->labelEx($personalProfile,'religion_id',array('label'=>'Religion')); ?>
		<?php echo $form->dropDownList($personalProfile,'religion_id', $personalProfile->getReligionOptions()); ?>
		<?php echo $form->error($personalProfile,'religion_id'); ?>
	</div>
        <div class="span-24"> <br>  </div>
	
    
        <div class="span-6">
		<?php echo $form->labelEx($personalProfile,'parental_status',array('label'=>'Parental Status')); ?>
		<?php echo $form->dropDownList($personalProfile,'parental_status',
                                                                   array(''=>'','M'=>'Married',
                                                                         'D'=>'Divorced',
                                                                         'N'=>'Not married')); ?>
	</div>
        
	
	<div class="span-11 last">
		<?php echo $form->labelEx($personalProfile,'income_bracket',array('label'=>'Family Annual Income')); ?>
		<?php echo $form->dropDownList($personalProfile,'income_bracket',array(''=>'','A'=>'Less than $25,000',
                                                                         'B'=>'About $25,000 to $50,000',
                                                                         'C'=>'About $50,000 to $75,000',
                                                                         'D'=>'About $75,000 to $100,000',
                                                                         'E'=>'About $100,000 to $150,000',
                                                                         'F'=>'About $150,000 to $250,000',
                                                                         'G'=>'About $250,000 to $500,000',
                                                                         'H'=>'More than $500,000')); ?>
	</div>
<div class="span-24"> <br>  </div>
	
<div class="span-6">
		<?php echo $form->labelEx($basicProfile,'highSchoolType',array('label'=>'High School Type')); ?>
		<?php echo $form->dropDownList($basicProfile,'highSchoolType',
                                                                   array(''=>'','PUB'=>'Public',
                                                                         'PRN'=>'Private Non-Religious',
                                                                         'PRR'=>'Private Religious',
                                                                       'HOM'=>'Home-schooled',
                                                                       'CHR'=>'Charter',
                                                                       'OTH'=>'Other')); ?>
	</div>

  

	<div class="span-11 last">
		<?php echo $form->labelEx($personalProfile,'hometown_zipcode'); ?>
		<?php echo $form->textField($personalProfile,'hometown_zipcode'); ?>
		<?php echo $form->error($personalProfile,'hometown_zipcode'); ?>
	</div>
<div class="span-24"> <br>  </div>
        <div class="span-6">
		<?php echo $form->labelEx($personalProfile,'alumni_connections',array('label'=>"Alumni Connections")); ?>
		<?php echo $form->checkBoxList($personalProfile,'alumni_connections',
                        array('None'=>'None','Father'=>'Father','Mother'=>'Mother','Sibling'=>'Sibling(s)','Other'=>'Other Relative(s)')); ?>
	</div>

        
	<div class="span-11 last">
		<?php echo $form->labelEx($personalProfile,'other_schools_admitted'); ?>
		<?php echo $form->textField($personalProfile,'other_schools_admitted'); ?>
		<?php echo $form->error($personalProfile,'other_schools_admitted'); ?>
	</div>
<div class="span-24"> <br>  </div>
	<div class="row">
		<?php echo $form->labelEx($personalProfile,'current_major'); ?>
		<?php echo $form->textField($personalProfile,'current_major'); ?>
		<?php echo $form->error($personalProfile,'current_major'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($personalProfile,'foreign_languages_spoken'); ?>
		<?php echo $form->textField($personalProfile,'foreign_languages_spoken'); ?>
		<?php echo $form->error($personalProfile,'foreign_languages_spoken'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($personalProfile,'date_of_birth'); ?>
		<?php echo $form->textField($personalProfile,'date_of_birth'); ?>
		<?php echo $form->error($personalProfile,'date_of_birth'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('basicSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('basicSuccess'); ?> 
        </div> <?php endif; ?>

<?php $this->endWidget(); ?>

        		<?php echo CHtml::hiddenField('test3'); ?>
</div><!-- form -->