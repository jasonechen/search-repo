<?php
$this->pageTitle=Yii::app()->name . ' - Checkout';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
<?php  
  $baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  //$cs->registerScriptFile($baseUrl.'/js/jquery-1.js');
  //$cs->registerScriptFile($baseUrl.'/js/ccvalidate.js');
   $cs->registerScriptFile($baseUrl.'/js/creditcard.js');
  
  //$cs->registerCssFile($baseUrl.'/css/yourcss.css');
?>
<h2b>CrowdPrep Store - Checkout and Billing </h2b>
<br></br>

<div class="form">
<?php   
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'card-form',
       	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>true,
                
	),
)); ?>

	
<?php 
$data  = array('form'=>$form, 'credit'=>$credit,'paymentdetails'=>$paymentdetails,
        'cardtype'=>$cardtype,'month'=>$month,'year'=>$year,'error'=>$error,
        'state'=>$state,'country'=>$country,
                 );

echo $this->renderPartial('_view', $data); 

$this->endWidget(); ?>
    
</div><!-- form -->
<div class="span-5 last"><br/><br/></div>

