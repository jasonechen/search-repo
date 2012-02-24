<br></br>

<h3> Congratulations, you have activated your account!</h3>
<p>Please click below to begin filling out your profile:</p>



<div class="mform">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'autologin','action'=>'index.php?r=site/continue'
	
	));
 ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Begin Profile Wizard'); ?>
	</div>
<?php echo $form->hiddenField($model,'id',array('value'=>$id)); ?>	
<?php $this->endWidget(); ?>	
</div>
<br></br></br></br></br>