<?php
$this->pageTitle=Yii::app()->name . ' - Credits';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>

<h1>Credits Form</h1>

<div class="form">
<?php 
  
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?>

	
<?php 
$data = array('form'=>$form,'model'=>$model);

echo $this->renderPartial('/credits/_create', $data); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
