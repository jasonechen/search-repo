<?php
$this->pageTitle=Yii::app()->name . ' - Modify User';
?>
<div class="form">
<?php 
  
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Sales Reports',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); 
  
$data = array('form'=>$form,'model'=>$model);

echo $this->renderPartial('/userlist/_modify_user', $data); 


$this->endWidget(); ?>
</div>