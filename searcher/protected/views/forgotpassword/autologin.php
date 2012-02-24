<p> your password has been changed successfully ! </p>
<br/>


<div class="form">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'autologin','action'=>'index.php?r=forgotpassword/login'
	
	));
 ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Click to continue..'); ?>
	</div>
<?php echo $form->hiddenField($model,'id',array('value'=>$id)); ?>	
<?php $this->endWidget(); ?>	
</div>