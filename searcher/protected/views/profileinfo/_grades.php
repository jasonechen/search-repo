<?php 	$this->progressbar('Academics','grades'); ?>
<div class="sub-head-profile">Academics - Grades</div>
<div class="container">
<div class="form">
<?php echo "" ?>  
    
<?php    //$this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($academicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

    
	<div class="span-6">
		<?php echo $form->labelEx($academicProfile,'GPA_unweight'); ?>
		<?php echo $form->textField($academicProfile,'GPA_unweight'); ?>
		<?php echo $form->error($academicProfile,'GPA_unweight'); ?>
                <br></br>       
                <?php echo $form->labelEx($academicProfile,'GPA_weight'); ?>
		<?php echo $form->textField($academicProfile,'GPA_weight'); ?>
		<?php echo $form->error($academicProfile,'GPA_weight'); ?>
                
                <br></br>
		<?php echo $form->labelEx($academicProfile,'class_rank_num'); ?>
		<?php echo $form->textField($academicProfile,'class_rank_num'); ?>
		<?php echo $form->error($academicProfile,'class_rank_num'); ?>
<br></br>
                <?php echo $form->labelEx($academicProfile,'class_rank_percent'); ?>
		<?php echo $form->dropDownList($academicProfile,'class_rank_percent',   array('1'=>'Top 1%',
                                                                 '2'=>'Top 5%',
                                                                 '3'=>'Top 10%',
                                                               '4'=>'Top 20%',
                                                               '5'=>'Top 25%',
                                                               '6'=>'Top 50%', '7'=>'50%-75%','8'=>'Bottom 25%'),array('prompt'=>'Class Rank Percentile')); ?>
		<?php echo $form->error($academicProfile,'class_rank_percent'); ?>
                
                
                
                <br></br>
		<?php echo $form->labelEx($academicProfile,'class_size'); ?>
		<?php echo $form->textField($academicProfile,'class_size'); ?>
		<?php echo $form->error($academicProfile,'class_size'); ?>
	</div>
    
        
<div class="span-26"> <br></br> </div>
        <div class="span-3">
	
            <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/toefl"')); ?>

		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Next'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('scoreSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('scoreSuccess'); ?> 
        </div> <?php endif; ?>

   </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<br></br><br></br>