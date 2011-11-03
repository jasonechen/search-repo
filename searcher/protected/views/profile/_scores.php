<div class="form">

<?php    $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($scoreProfile); ?>
	<?php echo $form->errorSummary($academicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

    
	<div class="span-6">
		<?php echo $form->labelEx($academicProfile,'GPA'); ?>
		<?php echo $form->textField($academicProfile,'GPA'); ?>
		<?php echo $form->error($academicProfile,'GPA'); ?>
	</div>

	

	<div class="span-6">
		<?php echo $form->labelEx($academicProfile,'class_rank'); ?>
		<?php echo $form->textField($academicProfile,'class_rank'); ?>
		<?php echo $form->error($academicProfile,'class_rank'); ?>
	</div>

	<div class="span-5 last">
		<?php echo $form->labelEx($academicProfile,'class_size'); ?>
		<?php echo $form->textField($academicProfile,'class_size'); ?>
		<?php echo $form->error($academicProfile,'class_size'); ?>
	</div>
    <div class="span-24"> <br>  </div>
	<div class="span-4">
		<?php echo $form->labelEx($scoreProfile,'SAT_Math',array('label'=>'SAT I Math')); ?>
		<?php echo $form->textField($scoreProfile,'SAT_Math'); ?>
		<?php echo $form->error($scoreProfile,'SAT_Math'); ?>
  	</div>   
        
	<div class="span-4">		
                <?php echo $form->labelEx($scoreProfile,'SAT_Critical_Read',array('label'=>'SAT I Critical Reading')); ?>
		<?php echo $form->textField($scoreProfile,'SAT_Critical_Read'); ?>
		<?php echo $form->error($scoreProfile,'SAT_Critical_Read'); ?>
 	</div>   
	<div class="span-4">
		<?php echo $form->labelEx($scoreProfile,'SAT_Writing',array('label'=>'SAT I Writing')); ?>
		<?php echo $form->textField($scoreProfile,'SAT_Writing'); ?>
		<?php echo $form->error($scoreProfile,'SAT_Writing'); ?>
 	</div>       
	<div class="span-4 last">
		<?php echo $form->labelEx($scoreProfile,'SAT_Essay',array('label'=>'SAT I Essay')); ?>
		<?php echo $form->textField($scoreProfile,'SAT_Essay'); ?>
		<?php echo $form->error($scoreProfile,'SAT_Essay'); ?>
	</div>
    <div class="span-24"> <br>  </div>
	<div class="span-4">
		<?php echo $form->labelEx($scoreProfile,'PSAT_Math',array('label'=>'PSAT Math')); ?>
		<?php echo $form->textField($scoreProfile,'PSAT_Math'); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Math'); ?>
	</div>

	<div class="span-4">
		<?php echo $form->labelEx($scoreProfile,'PSAT_Verbal',array('label'=>'PSAT Verbal')); ?>
		<?php echo $form->textField($scoreProfile,'PSAT_Verbal'); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Verbal'); ?>
	</div>

	<div class="span-4">
		<?php echo $form->labelEx($scoreProfile,'PSAT_Writing',array('label'=>'PSAT Writing')); ?>
		<?php echo $form->textField($scoreProfile,'PSAT_Writing'); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Writing'); ?>
	</div>

    <div class="span-5 last">
		<?php echo $form->labelEx($academicProfile,'national_Merit',array('label'=>'National merit ranking')); ?>
		<?php echo $form->dropDownList($academicProfile,'national_Merit',
                                                                   array(''=>'',
                                                                       'N'=>'None',
                                                                       'S'=>'Merit',
                                                                         'M'=>'Semifinalist',
                                                                         'F'=>'Finalist')); ?>
		<?php echo $form->error($academicProfile,'national_Merit'); ?>
	</div>
    
        
<div class="span-24"> <br>  </div>

	<div class="span-6 row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('scoreSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('scoreSuccess'); ?> 
        </div> <?php endif; ?>

   
<?php $this->endWidget(); ?>

</div><!-- form -->