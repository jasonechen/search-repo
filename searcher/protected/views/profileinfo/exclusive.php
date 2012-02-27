<?php 	$this->progressbar('Finish','exclusivity'); ?>
<div class="sub-head-profile">Exclusivity </div>
<p><i> Check box to agree to be exclusive to CrowdPrep and earn a higher payout %! </i></p>
<?php 	
	
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
?>
	
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exclusivity-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationFinish(this);')
)); ?>	


		
		
	<div class="row">
		<?php echo $form->checkBox($exclusive,'exclusiveValue',array('onclick'=>'setValue(this);')); ?>
		<?php echo $form->labelEx($exclusive,'exclusiveValue'); ?>
		<?php echo $form->error($exclusive,'exclusiveValue'); ?>
	</div>
	


	

<script type="text/javascript">
function setValue(exclusive){
	if(exclusive.checked == true) exclusive.value = 1;
	else exclusive.value = 0;
}
</script>

	<br></br>
       <div class="span-3">
	
            <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/verify"')); ?>
		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">


		<?php echo CHtml::submitButton('Next'); ?>
	</div>
        </div>

<?php $this->endWidget(); ?>


<br></br><br></br>