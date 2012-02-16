<!--This PAGE WILL BE REMOVED AFTER PAYPAL FUNCTIONALITY IS FINISHED -->


<div class="form">

<p>
    
    
</p>
    
<?php 
       // $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'buyerAdmin-form',
	'enableAjaxValidation'=>false,
)); ?>


<br></br>
	<div class="row">
  
		<?php echo $form->labelEx($bcModel,'buyAmount',array('label'=>'Number of credits to purchase')); ?>
		<?php echo $form->textField($bcModel,'buyAmount'); ?>

	</div>
        


	<div class="row buttons">
		<?php echo CHtml::submitButton('Purchase'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('buySuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('buySuccess'); ?> 
        </div> <?php endif; ?>    
    
<?php $this->endWidget(); ?>

</div><!-- form -->