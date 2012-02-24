<div class="container">
<div class="form">
<?php  //  $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($scoreProfile); ?>
	<?php echo $form->errorSummary($academicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

    <div class="span-24"> <br>  </div>
    
	<div class="span-6">
		<?php echo $form->labelEx($scoreProfile,'PSAT_Math',array('label'=>'PSAT Math')); ?>
		<?php echo $form->dropDownList($scoreProfile,'PSAT_Math',ScoreProfile::$PsatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Math'); ?>
	

                <br></br>
		<?php echo $form->labelEx($scoreProfile,'PSAT_Verbal',array('label'=>'PSAT Verbal')); ?>
		<?php echo $form->dropDownList($scoreProfile,'PSAT_Verbal',ScoreProfile::$PsatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Verbal'); ?>
	<br></br>
		<?php echo $form->labelEx($scoreProfile,'PSAT_Writing',array('label'=>'PSAT Writing')); ?>
		<?php echo $form->dropDownList($scoreProfile,'PSAT_Writing',ScoreProfile::$PsatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Writing'); ?>
	<br></br>
		<?php echo $form->labelEx($academicProfile,'national_Merit',array('label'=>'National Merit Scholar')); ?>
		<?php echo $form->dropDownList($academicProfile,'national_Merit',
                                               AcademicProfile::$NationalMeritArray,                                                                   
                                               array('prompt'=>'Enter Recognition')); ?>
		<?php echo $form->error($academicProfile,'national_Merit'); ?>
	</div>
    
        
<div class="span-24"> <br>  </div>

	<div class="span-6 row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('scoreSuccess')):?> 
        <div class="successMessage"> 
         <?php echo 'Info Updated and Saved!' /*Yii::app()->user->getFlash('basicSuccess');*/ ?> 
        </div> <?php endif; ?>

   </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>