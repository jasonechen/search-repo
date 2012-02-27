<?php
$this->pageTitle=Yii::app()->name . ' - Reset password';
?>
<div class="form">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'reset-password','action'=>'index.php?r=forgotpassword/savenewpassword',	
		'enableClientValidation'=>true,
		'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>false,    
		),
	));
 ?>
 <h2>Reset Password</h2>
 
	<div class="row">
		<?php echo $form->labelEx($model,'password_unhash'); ?>
		<?php echo $form->passwordField($model,'password_unhash'); ?>
		<?php echo $form->error($model,'password_unhash'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password_unhash_repeat'); ?>
		<?php echo $form->passwordField($model,'password_unhash_repeat'); ?>
		<?php echo $form->error($model,'password_unhash_repeat'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
	
	<?php echo $form->hiddenField($model,'id',array('value'=>$id)); ?>	

 <?php $this->endWidget(); ?>	
</div>
