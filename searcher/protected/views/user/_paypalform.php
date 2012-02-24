<?php 	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
?>

<div class="form">


    
<?php 
      //  $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paypal-change',
	'action'=>array ('user/PaypalChange'),
	'enableClientValidation'=>true,
	 'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
            ),
)); ?>


<p> Enter PayPal Account email address below.  If you do not have a PayPal account <a href="http://www.paypal.com" target="_BLANK"> click here to set one up. </a></p>
<p> If you wish to receive your payment via check, check the option below. </p>
 <div class="registerform">
    <table width=350" height="50" >
      <col width="200px" />
      <col width="200px" />    
       
    <tbody style="font-size:12px">
    <td>
       <?php echo $form->label($model,'email_paypal',array('label'=>'Paypal Email')); ?> 
    </td>
            <td>
		
                <?php echo $form->textField($model,'email_paypal',array('size'=>50,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email_paypal'); ?>
            </td>
          </tr> 
    </tbody>
    </table> 
         <?php $this->endWidget(); ?>

	
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-pay',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationFinish(this);')
)); ?>	


		
		
	<div class="row">
		<?php echo $form->checkBox($model,'checkpay',array('onclick'=>'setValue(this);')); ?>
		<?php echo $form->labelEx($model,'checkpay', array('label'=>'I would like to receive my earnings via check')); ?>
		<?php echo $form->error($model,'checkpay'); ?>
	</div>
	


	

<script type="text/javascript">
function 
setValue(checkpay){
	if(checkpay.checked == true) checkpay.value = 1;
	else checkpay.value = 0;
}
</script>     
     
    <?php $this->endWidget(); ?>

               	<div class="row buttons">
		<?php echo CHtml::submitButton('Update'); ?>
        	</div>


        
<br>  
    



 </div>
</div>