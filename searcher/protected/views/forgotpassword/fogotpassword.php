<?php $this->pageTitle=Yii::app()->name . ' - Forgot Password'; ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgotpassword-form','action'=>'index.php?r=forgotpassword/Sendmaillink',	
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	
	),
)); ?>

<h1>Forgot password</h1>
	
		<?php if(Yii::app()->user->hasFlash('passworlinksenterror')):?> 
        <div class="errorMessage"> 
        <?php echo Yii::app()->user->getFlash('passworlinksenterror'); ?> 
        </div> <?php endif; ?> 		

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

	
<?php $this->endWidget(); ?>	
</div>
