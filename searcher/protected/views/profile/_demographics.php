<div class="container">
<div class="form">

<?php 

    //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'demo-profile-demo-form',
	'enableAjaxValidation'=>true,
)); ?>

       <?php echo $form->hiddenField($basicProfile,'highschool_id'); ?>
       
<div class="span-6">

        <?php echo $form->labelEx($basicProfile,'gender',array('label'=>'Gender')); ?>
        <?php echo $form->dropDownList($basicProfile,'gender',
                                                           array('M'=>'Male',
                                                                 'F'=>'Female'),array('prompt'=>'Select Sex')); ?>
        <?php echo $form->error($basicProfile,'gender'); ?>
    
<br></br>
        <?php echo $form->labelEx($basicProfile,'race_id',array('label'=>'Race',)); ?>
        <?php echo $form->dropDownList($basicProfile,'race_id', $basicProfile->getRaceOptions(),array('prompt'=>'Select Race')); ?>
        <?php echo $form->error($basicProfile,'race_id'); ?>
<br>
        <?php echo $form->labelEx($personalProfile,'ethnic_origin',array('label'=>'Ethnicity',)); ?>
        <?php echo $form->dropDownList($personalProfile,'ethnic_origin',$personalProfile->getEthnicOptions(),array('prompt'=>'Select Ethnicity')); ?>
        <?php echo $form->error($personalProfile,'ethnic_origin'); ?>
<br></br>


        <?php echo $form->labelEx($personalProfile,'citizenship'); ?>
        <?php echo $form->dropDownList($personalProfile,'citizenship',$personalProfile->getCitizenshipOptions(),array('prompt'=>'Select Citizenship')); ?>
        <?php echo $form->error($personalProfile,'citizenship'); ?>
<br></br>

		<?php echo $form->labelEx($personalProfile,'religion_id'); ?>
		<?php echo $form->dropDownList($personalProfile,'religion_id',$personalProfile->getReligionOptions(),array('prompt'=>'Select Religion')); ?>
		<?php echo $form->error($personalProfile,'religion_id'); ?>
<br></br>
        <?php echo $form->labelEx($personalProfile,'parental_status',array('label'=>'Parental Status')); ?>
        <?php echo $form->dropDownList($personalProfile,'parental_status',
                                                           PersonalProfile::$ParentalStatusArray,array('prompt'=>'Select Parental Status')); ?>
<br></br>

        <?php echo $form->labelEx($personalProfile,'income_bracket',array('label'=>'Family Annual Income')); ?>
        <?php echo $form->dropDownList($personalProfile,'income_bracket',
                                        PersonalProfile::$IncomeBracketArray,array('prompt'=>'Select Income Bracket')); ?>
<br></br>

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