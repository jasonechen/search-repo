<?php 	$this->progressbar('TestScore','toefl'); ?>
<div class="sub-head-profile">Test Scores - TOEFL / IELTS</div>
<div class="container">
<div class="form">
<?php   // $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($scoreProfile); ?>
	
        <?php //echo $form->errorSummary($personalProfile); ?>

    <div class="span-24">   </div>
    
	<div class="span-26">
		<?php echo $form->labelEx($scoreProfile,'toefl'); ?>
		<?php echo $form->dropDownList($scoreProfile,'toefl',ScoreProfile::$ToeflScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'toefl'); ?>
                <br></br>
        
	
                <?php echo $form->labelEx($scoreProfile,'ielts'); ?>
		<?php echo $form->dropDownList($scoreProfile,'ielts',ScoreProfile::$IeltsScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ielts'); ?>
 	<br></br>
	      
        
        
        </div>

    
        
<div class="span-24"> <br>  </div>
        <div class="span-3">
	
            <div class="pbuttons">
	<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/ap"')); ?>

		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Next'); ?>
            </div>
        </div>
        <?php if(Yii::app()->user->hasFlash('scoreSuccess')):?> 
        <div class="successMessage"> 
        <?php// echo 'Info Updated and Saved!' /*Yii::app()->user->getFlash('basicSuccess');*/ ?> 
        </div> <?php endif; ?>

   </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<br></br>