<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-profile-personal-form',
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
		<?php echo $form->labelEx($model,'citizenship'); ?>
		<?php echo $form->textField($model,'citizenship'); ?>
		<?php echo $form->error($model,'citizenship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'legacy_direct'); ?>
		<?php echo $form->textField($model,'legacy_direct'); ?>
		<?php echo $form->error($model,'legacy_direct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'legacy_indirect'); ?>
		<?php echo $form->textField($model,'legacy_indirect'); ?>
		<?php echo $form->error($model,'legacy_indirect'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'income_bracket'); ?>
		<?php echo $form->textField($model,'income_bracket'); ?>
		<?php echo $form->error($model,'income_bracket'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parental_status'); ?>
		<?php echo $form->textField($model,'parental_status'); ?>
		<?php echo $form->error($model,'parental_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_sibling_attending'); ?>
		<?php echo $form->textField($model,'is_sibling_attending'); ?>
		<?php echo $form->error($model,'is_sibling_attending'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hometown_zipcode'); ?>
		<?php echo $form->textField($model,'hometown_zipcode'); ?>
		<?php echo $form->error($model,'hometown_zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_schools_admitted'); ?>
		<?php echo $form->textField($model,'other_schools_admitted'); ?>
		<?php echo $form->error($model,'other_schools_admitted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_major'); ?>
		<?php echo $form->textField($model,'current_major'); ?>
		<?php echo $form->error($model,'current_major'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'religion_id'); ?>
		<?php echo $form->textField($model,'religion_id'); ?>
		<?php echo $form->error($model,'religion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foreign_languages_spoken'); ?>
		<?php echo $form->textField($model,'foreign_languages_spoken'); ?>
		<?php echo $form->error($model,'foreign_languages_spoken'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
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