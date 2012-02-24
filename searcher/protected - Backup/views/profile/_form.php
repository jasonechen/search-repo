<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'race_id'); ?>
		<?php echo $form->textField($model,'race_id',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'race_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'religion_id'); ?>
		<?php echo $form->textField($model,'religion_id',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'religion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hasPets'); ?>
		<?php echo $form->textField($model,'hasPets',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'hasPets'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hasChildren'); ?>
		<?php echo $form->textField($model,'hasChildren',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'hasChildren'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'education'); ?>
		<?php echo $form->textField($model,'education'); ?>
		<?php echo $form->error($model,'education'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'income_bracket'); ?>
		<?php echo $form->textField($model,'income_bracket'); ?>
		<?php echo $form->error($model,'income_bracket'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_id'); ?>
		<?php echo $form->textField($model,'photo_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'photo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->