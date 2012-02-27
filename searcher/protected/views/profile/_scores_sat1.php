<div class="container">
<div class="form">
<?php   // $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($scoreProfile); ?>
	<?php echo $form->errorSummary($academicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

    <div class="span-24"> <br>  </div>
    
	<div class="span-26">
		<?php echo $form->labelEx($scoreProfile,'SAT_Math',array('label'=>'SAT I Math')); ?>
		<?php echo $form->dropDownList($scoreProfile,'SAT_Math',ScoreProfile::$SatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'SAT_Math'); ?>
                <br></br>
        
	
                <?php echo $form->labelEx($scoreProfile,'SAT_Critical_Read',array('label'=>'SAT I Critical Reading')); ?>
		<?php echo $form->dropDownList($scoreProfile,'SAT_Critical_Read',ScoreProfile::$SatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'SAT_Critical_Read'); ?>
 	<br></br>
	
		<?php echo $form->labelEx($scoreProfile,'SAT_Writing',array('label'=>'SAT I Writing')); ?>
		<?php echo $form->dropDownList($scoreProfile,'SAT_Writing',ScoreProfile::$SatScoreArray, array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'SAT_Writing'); ?>
 	         <br></br>
    
	
		<?php echo $form->labelEx($scoreProfile,'SAT_Essay',array('label'=>'SAT I Essay')); ?> 
		<?php echo $form->dropDownList($scoreProfile,'SAT_Essay', array(      
                                                                            12=>'12',
                                                                            11=>'11',
                                                                            10=>'10',
                                                                            9=>'9',
                                                                            8=>'8',
                                                                            7=>'7',
                                                                            6=>'6',
                                                                            5=>'5',
                                                                            4=>'4',
                                                                            3=>'3',
                                                                            2=>'2',
                                                                             1=>'1',
                                                                    ), array('prompt'=>'Select/Update Score')
                                                                      ); ?>
		<?php echo $form->error($scoreProfile,'SAT_Essay'); ?>
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