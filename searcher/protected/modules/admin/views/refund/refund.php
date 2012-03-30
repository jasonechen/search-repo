<?php
$this->pageTitle=Yii::app()->name . ' - Refund';
/*$this->breadcrumbs=array(
	'Login',
);*/

?>



<div class="form">
<?php 
  
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coupons-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?>


<?php 

$data = array('form'=>$form,'model'=>$model,'refundmodel'=>$refundmodel,'msg'=>$msg);

echo $this->renderPartial('/refund/_refund', $data); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
