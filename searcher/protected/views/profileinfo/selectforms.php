
<div class="container">
    <div class="form">
    
<?php     
   $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ap-profile-ap-form',
	'enableAjaxValidation'=>false,
)); ?>


	
	<div class="row buttons">
		<?php echo CHtml::htmlButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/sat2"')); ?>
		<?php echo CHtml::submitButton('Next'); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->
</div>