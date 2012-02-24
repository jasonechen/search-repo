
<div class="form">

<?php 

  //      $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-personalinfo-basic-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	
	)
	
)); ?>
            		
    

	<div class="row">
		<?php echo $form->labelEx($basicmodel,'nickname'); ?>
		<?php echo $form->textField($basicmodel,'nickname'); ?>
		<?php echo $form->error($basicmodel,'nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($basicmodel,'profile_type',array('label'=>'Profile Type')); ?>
		<?php echo $form->dropDownList($basicmodel,'profile_type',   BasicPersonalInfo::$ProfileTypeArray ); ?>
		<?php echo $form->error($basicmodel,'profile_type'); ?>
	</div>    
	
	<?php echo $form->labelEx($personalProfile,'hs_grad_year',array('label'=>'High School Graduation Year')); ?>
        <?php echo $form->dropDownList($personalProfile,'hs_grad_year', array(2011=>'2011',
                                                                                2010=>'2010',
                                                                              2009=>'2009',
                                                                              2008=>'2008',
                                                                              2007=>'2007',
                                                                              2006=>'2006',
                                                                              2005=>'2005',
                                                                              2004=>'2004',
                                                                              2003=>'2003',
                                                                              2002=>'2002',
                                                                              2001=>'2001',
                                                                              2000=>'2000',
                                                           ), array('prompt'=>'Select Graduation Year')); ?>
														   
	<?php echo $form->error($personalProfile,'hs_grad_year'); ?>
	
	 <?php echo $form->labelEx($basicmodel,'highSchoolType',array('label'=>'High School Type')); ?>
        <?php echo $form->dropDownList($basicmodel,'highSchoolType',
                                                           array('PUB'=>'Public',
                                                                 'PRN'=>'Private Non-Religious',
                                                                 'PRR'=>'Private Religious',
                                                               'HOM'=>'Home-schooled',
                                                               'CHR'=>'Charter',
                                                               'OTH'=>'Other'),array('prompt'=>'Select School Type')); ?>
															   
	<?php echo $form->error($basicmodel,'highSchoolType'); ?>		
	
	
	  <?php echo $form->labelEx($personalProfile,'state'); ?>
        <?php echo $form->dropDownList($personalProfile,'state', $personalProfile->getState(),array('prompt'=>'Select State')); ?>
        <?php echo $form->error($personalProfile,'state'); ?>
													   
														   
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Next'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('basicSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('basicSuccess'); ?> 
        </div> <?php endif; ?>

<?php $this->endWidget(); ?>

        	
</div><!-- form -->