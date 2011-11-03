<?php
$this->pageTitle=Yii::app()->name . ' - Generate';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
 <script language="javascript">
     $(document).ready(function(){
    function redirect() {
          $(window.location).attr('href', 'http://localhost/testit/index.php?r=user/fillInMapInfo');

    }
//
    $('#tempFillButton').click(redirect);
////    $('#PersonalProfile_alumni_connections_1').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_2').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_3').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_4').click(checkCorrect);
     });
</script> 



<h1>Fill in extra user info</h1>
	<?php echo CHtml::button("Fill in",array('id'=>'tempFillButton')); ?>

<br></br>
<br></br>
<h1>Generate profiles</h1>

<div class="form">
<?php 
  $this->widget('ext.pixelmatrix.EUniform'); 
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'generate-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'number',array('label'=>'Number of random profiles to generate')); ?>
		<?php echo $form->textField($model,'number'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Generate'); ?>
	</div>
<br></br>
<br></br>

        <?php if(Yii::app()->user->hasFlash('generateSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('generateSuccess'); ?> 
        </div> <?php endif; ?>   
        
<?php $this->endWidget(); ?>
</div><!-- form -->
