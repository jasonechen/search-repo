<div class="container">
    <div class="form">
	
		<?php 
			//   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
			$form=$this->beginWidget('CActiveForm', array(
			'id'=>'exclusive-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
			'validateOnSubmit'=>true,
			
			),
			
			)); 
		?>	
		
		
	<div class="row">
		<?php echo $form->checkBox($exclusive,'exclusiveValue',array('onclick'=>'setValue(this);','checked'=>'checked')); ?>
		<?php echo $form->labelEx($exclusive,'exclusiveValue'); ?>
		<?php echo $form->error($exclusive,'exclusiveValue'); ?>
	</div>
	
	<div class="row buttons">		
		<?php echo CHtml::submitButton('Save'); ?>
	</div>
	
	
<?php $this->endWidget(); ?>

	
	</div>
</div>	
<script type="text/javascript">
function setValue(exclusive){
	if(exclusive.checked == true) exclusive.value = 1;
	else exclusive.value = 0;
}
</script>