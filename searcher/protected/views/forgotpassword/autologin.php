
<style type="text/css">		
	.container {   
		opacity:0.4;
		filter:alpha(opacity=40); 
	}
</style>
<?php 

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Password Reset',
        'autoOpen'=>true,
        'resizable'=>false,
        'width'=>'300px',
        'height'=>'200',
    ),
));
?>	

<p> Your password has been changed successfully! </p>
<br/>
<div class="form">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'autologin','action'=>'index.php?r=forgotpassword/login'
	
	));
 ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Continue',array('class'=>'button')); ?>
	</div>
<?php echo $form->hiddenField($model,'id',array('value'=>$id)); ?>	
<?php $this->endWidget(); ?>	
</div>



<?php 
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>