<?php
$this->pageTitle=Yii::app()->name . ' - Credits';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>

<h1>Credits Limits</h1>

<div class="form">
<?php 
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'CreditsLimits-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?>

<div class="view">
    
    
    <div id='credits'>
         <div id="row">
           <p> <h3>Credits Buy Limits</h3>
               <hr style="height:4px;"/>
           </p>
         </div>   
        <div id="row">
              <?php echo $form->label($model,'User buy Max Amount');// Ex($model,'pack_name'); ?>
              <?php echo $form->textField($model,'sit_values',array('size'=>10,'maxlength'=>5)); ?>
              <?php echo $form->error($model,'sit_values'); ?>
        </div>
        
       
    </div> 
    
    
    <div id="row">
        <?php 
        echo CHtml::submitButton('Submit');
        ////echo CHtml::button('Submit Order', array('submit' => array('/creditspurchase/index/id/'.$value->id))); ?>
    </div>
</div>
    
    <?php $this->endWidget(); ?>
</div><!-- form -->