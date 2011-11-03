<div class="container">
<div class="form">
<?php //  $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($scoreProfile); ?>
	<?php echo $form->errorSummary($academicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

    
   
    <div class="span-26"> <br>  </div>
	<div class="span-6">
		<?php echo $form->labelEx($scoreProfile,'ACT_English',array('label'=>'ACT English')); ?>
		<?php echo $form->dropDownList($scoreProfile,'ACT_English',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_English'); ?>
	<br></br>
		<?php echo $form->labelEx($scoreProfile,'ACT_Math',array('label'=>'ACT Math')); ?>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Math',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Math'); ?>
	
            <br></br>
            
	
		<?php echo $form->labelEx($scoreProfile,'ACT_Reading',array('label'=>'ACT Reading')); ?>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Reading',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Reading'); ?>
	<br></br>

	
		<?php echo $form->labelEx($scoreProfile,'ACT_Science',array('label'=>'ACT Science')); ?>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Science',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Science'); ?>
	<br></br>
		<?php echo $form->labelEx($scoreProfile,'ACT_Writing',array('label'=>'ACT Writing')); ?>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Writing', array(
                                                                            2=>'2',3=>'3',
                                                                            4=>'4',5=>'5',
                                                                            6=>'6',7=>'7',
                                                                            8=>'8',9=>'9',
                                                                            10=>'10',11=>'11',
                                                                            12=>'12',),array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Writing'); ?>
	<br></br>

	
		<?php echo $form->labelEx($scoreProfile,'ACT_Composite',array('label'=>'ACT Composite')); ?>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Composite',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Composite'); ?>
        </div>
        
<div class="span-26"> <br>  </div>

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