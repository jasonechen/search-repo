<?php $this->pageTitle=Yii::app()->name . ' - Forgot Password'; ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgotpassword-form','action'=>'index.php?r=forgotpassword/Sendmaillink',	
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	
	),
)); ?>

<h3>Can't sign in? Forget your password?</h3>
<h4>
Enter your email address below and we'll send you password reset instructions.</h4>
	
		<?php if(Yii::app()->user->hasFlash('passworlinksenterror')):?> 
        <div class="errorMessage"> 
        <?php echo Yii::app()->user->getFlash('passworlinksenterror'); ?> 
        </div> <?php endif; ?> 		

	<div class="row">
            <div class="passwordform">
		<?php echo $form->label($model,'email', array('label'=>'Enter your email address')); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
            </div>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

	
<?php $this->endWidget(); ?>	
</div>

<br></br><br></br><br></br><br></br><br></br>