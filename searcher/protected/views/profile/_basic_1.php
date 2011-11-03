<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-profile-basic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($personalProfile); ?>
        <?php echo $form->errorSummary($basicProfile); ?>

	<div class="column">
		<?php echo $form->labelEx($basicProfile,'first_university_id',array('label'=>'First University')); ?>
		<?php echo $form->dropDownList($basicProfile,'first_university_id', $basicProfile->getUniversityOptions()); ?>
		<?php echo $form->error($basicProfile,'first_university_id'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($basicProfile,'curr_university_id',array('label'=>'Current University')); ?>
		<?php echo $form->dropDownList($basicProfile,'curr_university_id', $basicProfile->getUniversityOptions()); ?>
		<?php echo $form->error($basicProfile,'curr_university_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($basicProfile,'isTransfer',array('label'=>'Transfer student?')); ?>
		<?php echo $form->dropDownList($basicProfile,'gender',
                                                                   array(''=>'',
                                                                        'N'=>'No',
                                                                         'Y'=>'Yes')); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($basicProfile,'gender',array('label'=>'Gender')); ?>
		<?php echo $form->dropDownList($basicProfile,'gender',
                                                                   array(''=>'','M'=>'Male',
                                                                         'F'=>'Female')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($personalProfile,'religion_id',array('label'=>'Religion')); ?>
		<?php echo $form->dropDownList($personalProfile,'religion_id', $personalProfile->getReligionOptions()); ?>
		<?php echo $form->error($personalProfile,'religion_id'); ?>
	</div>
 
        <div class="column">
		<?php echo $form->labelEx($basicProfile,'race_id',array('label'=>'Race')); ?>
		<?php echo $form->dropDownList($basicProfile,'race_id', $basicProfile->getRaceOptions()); ?>
		<?php echo $form->error($basicProfile,'race_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($personalProfile,'citizenship'); ?>
		<?php echo $form->dropDownList($personalProfile,'citizenship',
                                                                   array(''=>'','USA'=>'United States',
                                                                         'PRC'=>'China',
                                                                         'MEX'=>'Mexico')); ?>
	</div>

        
	<div class="column">
		<?php echo $form->labelEx($basicProfile,'highSchoolType',array('label'=>'High School Type')); ?>
		<?php echo $form->dropDownList($basicProfile,'highSchoolType',
                                                                   array(''=>'','PUB'=>'Public',
                                                                         'PRN'=>'Private Non-religious',
                                                                         'PRR'=>'Private Religious',
                                                                       'HOM'=>'Home-schooled',
                                                                       'CHR'=>'Charter',
                                                                       'OTH'=>'Other')); ?>
	</div>
  
 


        
	<div class="column">
		<?php echo $form->labelEx($personalProfile,'legacy_direct',array('label'=>"Parents' legacy status")); ?>
		<?php echo $form->dropDownList($personalProfile,'legacy_direct',array(''=>'','N'=>'Not alumni',
                                                                         'M'=>'Mother','F'=>'Father','B'=>'Both',)); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($personalProfile,'legacy_indirect',array('label'=>"Other alumni relatives")); ?>
		<?php echo $form->dropDownList($personalProfile,'legacy_indirect',array(''=>'','N'=>'No',
                                                                         'Y'=>'Yes',)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($personalProfile,'is_sibling_attending',array('label'=>'Siblings attending/alumni')); ?>
		<?php echo $form->dropDownList($personalProfile,'is_sibling_attending',array(''=>'','Y'=>'Yes',
                                                                         'N'=>'No',)); ?>

	</div>        
        
	<div class="row">
		<?php echo $form->labelEx($personalProfile,'income_bracket',array('label'=>'Parental income bracket')); ?>
		<?php echo $form->dropDownList($personalProfile,'income_bracket',array(''=>'','A'=>'$0 to $1 million',
                                                                         'B'=>'$1million to $1billion',
                                                                         'C'=>'>$1 billion')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($personalProfile,'parental_status',array('label'=>'Parental Marriage Status')); ?>
		<?php echo $form->dropDownList($personalProfile,'parental_status',
                                                                   array(''=>'','M'=>'Married',
                                                                         'D'=>'Divorced',
                                                                         'N'=>'Not married')); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($personalProfile,'hometown_zipcode'); ?>
		<?php echo $form->textField($personalProfile,'hometown_zipcode'); ?>
		<?php echo $form->error($personalProfile,'hometown_zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($personalProfile,'other_schools_admitted'); ?>
		<?php echo $form->textField($personalProfile,'other_schools_admitted'); ?>
		<?php echo $form->error($personalProfile,'other_schools_admitted'); ?>
	</div>

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

</div><!-- form -->