<?php
$this->pageTitle=Yii::app()->name . ' - Credits';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>

<h1>Credits Form</h1>

<div class="form">
<?php 
  $this->widget('ext.pixelmatrix.EUniform'); 
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

echo $this->renderPartial('/index/_create', $data); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
