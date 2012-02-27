<?php
$this->setAdminMenu();
?>

<h2> Referrals </h2>

<div class="container"> 
	<p><strong>If you would like to refer other students, please enter their email address below:</strong></p>
	<div class="form">	
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'refer-friend-form',
	'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnChange'=>false)
        
)); ?>

<?php if(Yii::app()->user->hasFlash('referSuccess')):?> 
	<style type="text/css">		
	.container {   
		opacity:0.4;
		filter:alpha(opacity=40); 
	}
	</style>	
	<div class="successMessage"> 
		<?php	
			$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
				'id'=>'mydialog',
				// additional javascript options for the dialog plugin
				'options'=>array(
					'title'=>'Refer Friends',
					'autoOpen'=>true,
				),
			));				
		?>		
		<?php 
				echo Yii::app()->user->getFlash('referSuccess'); 
				echo '<br/>';
				echo CHtml::htmlButton('Ok',array('onclick'=>'window.location="index.php?r=profileinfo/congratulation"')); 
				$this->endWidget('zii.widgets.jui.CJuiDialog');
		?>
	</div> 
		<?php endif; ?>

	
<?php for($i = 0 ; $i < (10 - $count);$i++){ ?>
<div class="row">
	<span><?php print ($i+1); ?><span>. </span><?php echo $form->textField($referFriend,'email'.$i,array('style'=>'width:170px;')); ?>
	<?php echo $form->error($referFriend,'email'.$i); ?>	
</div>	
<?php } ?>	
        <p></p>
<div class="row">
     <div class="bggbuttons">
	<?php echo CHtml::submitButton('Send Referral Email'); ?>
            <br></br><br></br>
<?php $this->endWidget(); ?>
        </div>
</div>
</div>	     
        
</div>	
<br></br><br></br>