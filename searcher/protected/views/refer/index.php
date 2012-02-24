<div class="container"> 
	<p><strong>you can add referrals in the future please go to My Account</strong></p>
	<div class="form">	
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'refer-friend-form',
	'enableClientValidation'=>true,		
)); ?>

<?php if(Yii::app()->user->hasFlash('referSuccess')):?> 
	<div class="successMessage"> 
		<?php echo Yii::app()->user->getFlash('referSuccess'); ?> 
	</div> 
		<?php endif; ?> 

<div class="row"><?php echo $form->labelEx($referFriend,'email1'); ?></div>	
<?php for($i = 0 ; $i < 10;$i++){ ?>
<div class="row">
	<?php echo $form->textField($referFriend,'email'.$i); ?>
	<?php echo $form->error($referFriend,'email'.$i); ?>	
</div>	
<?php } ?>	

<div class="row buttons">
	<?php echo CHtml::submitButton('Refer'); ?>
</div>
<?php $this->endWidget(); ?>
	
</div>	
	<a href="index.php?r=profileinfo/exclusive">Skip this step..</a>
</div>	