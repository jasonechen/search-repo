<div class="container">
<div class="form">
<?php 

    //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-profile-basic-form',
	'enableAjaxValidation'=>true,
)); ?>

    
       
<div class="span-7 last">
        <?php echo $form->labelEx($basicProfile,'nickname',array('label'=>'Nickname (will be displayed)')); ?>
        <?php echo $form->textField($basicProfile,'nickname'); ?>
        <?php echo $form->error($basicProfile,'nickname'); ?>

    <br></br>

        <?php echo $form->labelEx($basicProfile,'profile_type',array('label'=>'Profile Stereotype (Choose one)')); ?>
        <?php echo $form->dropDownList($basicProfile,'profile_type',   BasicProfile::$ProfileTypeArray
                                                                   ); ?>

        
        <br></br>

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
<br></br>
        <?php echo $form->labelEx($basicProfile,'highSchoolType',array('label'=>'High School Type')); ?>
        <?php echo $form->dropDownList($basicProfile,'highSchoolType',
                                                           array('PUB'=>'Public',
                                                                 'PRN'=>'Private Non-Religious',
                                                                 'PRR'=>'Private Religious',
                                                               'HOM'=>'Home-schooled',
                                                               'CHR'=>'Charter',
                                                               'OTH'=>'Other'),array('prompt'=>'Select School Type')); ?>

        


        <br></br>       
        <?php echo $form->labelEx($personalProfile,'state'); ?>
        <?php echo $form->dropDownList($personalProfile,'state', $personalProfile->getState(),array('prompt'=>'Select State')); ?>
        <?php echo $form->error($personalProfile,'state'); ?>
<br></br>
        <?php echo $form->labelEx($personalProfile,'hometown_zipcode'); ?>
        <?php echo $form->textField($personalProfile,'hometown_zipcode'); ?>
        <?php echo $form->error($personalProfile,'hometown_zipcode'); ?>
</div>
       <div class="span-26"> <br>  </div>

       <div class="span-6 last"> 
		<?php echo $form->labelEx($personalProfile,'date_of_birth'); ?>
		<?php echo $form->textField($personalProfile,'date_of_birth'); ?>
		<?php echo $form->error($personalProfile,'date_of_birth'); ?>
	</div>

        <div class="span-26"> <br>  </div>

        <div class="span-6 last">
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('basicSuccess')):?> 
        <div class="successMessage"> 
        <?php echo 'Info Updated and Saved!' /*Yii::app()->user->getFlash('basicSuccess');*/ ?> 
        </div> <?php endif; ?>
        </div>
<?php $this->endWidget(); ?>

        		<?php echo CHtml::hiddenField('test3'); ?>
</div><!-- form -->
</div>