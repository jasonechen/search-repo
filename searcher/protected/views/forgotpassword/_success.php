<?php $this->pageTitle=Yii::app()->name . ' - Forgot Password'; ?>
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
	
	 if(Yii::app()->user->hasFlash('passworlinksent')):
		 echo Yii::app()->user->getFlash('passworlinksent'); 
	endif; 
	echo '<br><br/>'; ?>
        <div class="buttons">
	<?php echo CHtml::Button('Ok',array('onclick'=>'window.location="index.php"')); ?>
        </div>
        <?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
