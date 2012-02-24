<?php $this->pageTitle=Yii::app()->name . ' - Resend Registration Link'; ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resend-registrationlink-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                 'validateOnChange'=>false,
	
	),
)); ?>
    <br>
    
<h3>Resend Registration Link</h3>
<h4>Enter your email below to have your registration link resent. </h4>
		
		<?php if(Yii::app()->user->hasFlash('registrationlinkError')):?> 
        <div class="errorMessage"> 
        <?php echo Yii::app()->user->getFlash('registrationlinkError'); ?> 
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
<br></br>