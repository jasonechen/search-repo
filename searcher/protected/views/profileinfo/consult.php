<?php 	$this->progressbar('Finish','consult'); ?>
<div class="sub-head-profile">Admissions Consulting </div>

    
                <?php echo CHtml::link('Learn More', '#',array('
                                    onclick'=>'$("#learnconsult").dialog("open"); return false;',
                                    
                        )); 
				   ?> </h4>
	   <?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'learnconsult',
			// additional javascript options for the dialog plugin
			'options'=>array(
				'title'=>'Consulting: Learn More',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>'375px',
				'height'=>'500',
                                'resizable'=>false,
				
			),
		));
	?>
    
       <p> LEARN MORE TEST TEXT </p>
    
      <?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
    
    
    
    
    
</h4>
 <p>If you would like to be available for telephone consultations, please check the box below.</p>

<div class="container">

<?php 	
	
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
?>
	
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'consult-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationFinish(this);')
)); ?>	


		
		
	<div class="row">
		<?php echo $form->checkBox($consult,'consultValue',array('onclick'=>'setValue(this);')); ?>
		<?php echo $form->labelEx($consult,'consultValue', array('label'=>'Yes, I would like to offer consulting services')); ?>
		<?php echo $form->error($consult,'consultValue'); ?>
	</div>
	


	

<script type="text/javascript">
function 
setValue(consult){
	if(consult.checked == true) consult.value = 1;
	else consult.value = 0;
}
</script>

	<br></br>
        <div class="span-3">
	
            <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/summary"')); ?>
		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Next'); ?>
	</div>

        </div>
<?php $this->endWidget(); ?>


<br></br><br></br>
</div>
