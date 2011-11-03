<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-profile-basic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_university_id'); ?>
		<?php echo $form->textField($model,'first_university_id'); ?>
		<?php echo $form->error($model,'first_university_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'curr_university_id'); ?>
		<?php echo $form->textField($model,'curr_university_id'); ?>
		<?php echo $form->error($model,'curr_university_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_scores'); ?>
		<?php echo $form->textField($model,'num_scores'); ?>
		<?php echo $form->error($model,'num_scores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_academics'); ?>
		<?php echo $form->textField($model,'num_academics'); ?>
		<?php echo $form->error($model,'num_academics'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_extracurriculars'); ?>
		<?php echo $form->textField($model,'num_extracurriculars'); ?>
		<?php echo $form->error($model,'num_extracurriculars'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_essays'); ?>
		<?php echo $form->textField($model,'num_essays'); ?>
		<?php echo $form->error($model,'num_essays'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_type'); ?>
		<?php echo $form->textField($model,'profile_type'); ?>
		<?php echo $form->error($model,'profile_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sat_I_score_range'); ?>
		<?php echo $form->textField($model,'sat_I_score_range'); ?>
		<?php echo $form->error($model,'sat_I_score_range'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_user_id'); ?>
		<?php echo $form->textField($model,'create_user_id'); ?>
		<?php echo $form->error($model,'create_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_user_id'); ?>
		<?php echo $form->textField($model,'update_user_id'); ?>
		<?php echo $form->error($model,'update_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isTransfer'); ?>
		<?php echo $form->textField($model,'isTransfer'); ?>
		<?php echo $form->error($model,'isTransfer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender'); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'highSchoolType'); ?>
		<?php echo $form->textField($model,'highSchoolType'); ?>
		<?php echo $form->error($model,'highSchoolType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'race_id'); ?>
		<?php echo $form->textField($model,'race_id'); ?>
		<?php echo $form->error($model,'race_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'musical_instrument_id'); ?>
		<?php echo $form->textField($model,'musical_instrument_id'); ?>
		<?php echo $form->error($model,'musical_instrument_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->