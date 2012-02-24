<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_university_id'); ?>
		<?php echo $form->textField($model,'first_university_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_scores'); ?>
		<?php echo $form->textField($model,'num_scores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_aps'); ?>
		<?php echo $form->textField($model,'num_aps'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_sat2s'); ?>
		<?php echo $form->textField($model,'num_sat2s'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_competitions'); ?>
		<?php echo $form->textField($model,'num_competitions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_sports'); ?>
		<?php echo $form->textField($model,'num_sports'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_academics'); ?>
		<?php echo $form->textField($model,'num_academics'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_extracurriculars'); ?>
		<?php echo $form->textField($model,'num_extracurriculars'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_essays'); ?>
		<?php echo $form->textField($model,'num_essays'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_type'); ?>
		<?php echo $form->textField($model,'profile_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sat_I_score_range'); ?>
		<?php echo $form->textField($model,'sat_I_score_range'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->