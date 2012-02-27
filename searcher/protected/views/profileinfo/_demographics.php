<?php 	$this->progressbar('Personalinfo','demographics'); ?>
<div class="sub-head-profile">Personal Info - Demographics</div>

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
<br></br>
        <?php echo $form->labelEx($personalProfile,'ethnic_origin',array('label'=>'Ethnicity',)); ?>
        <?php echo $form->dropDownList($personalProfile,'ethnic_origin',$personalProfile->getEthnicOptions(),array('prompt'=>'Select Ethnicity')); ?>
        <?php echo $form->error($personalProfile,'ethnic_origin'); ?>
<br></br>


        <?php echo $form->labelEx($personalProfile,'citizenship'); ?>
        <?php echo $form->dropDownList($personalProfile,'citizenship',$personalProfile->getCitizenshipOptions(),array('prompt'=>'Select Citizenship')); ?>
        <?php echo $form->error($personalProfile,'citizenship'); ?>
<br></br>

        <?php echo $form->labelEx($personalProfile,'parental_status',array('label'=>'Parents\' Marital Status',)); ?>
        <?php echo $form->dropDownList($personalProfile,'parental_status',PersonalProfile::$ParentalStatusArray,array('prompt'=>'Parental Status')); ?>
        <?php echo $form->error($personalProfile,'parental_status'); ?>
<br></br>

        <?php echo $form->labelEx($personalProfile,'income_bracket',array('label'=>'Household Income',)); ?>
        <?php echo $form->dropDownList($personalProfile,'income_bracket',PersonalProfile::$IncomeBracketArray,array('prompt'=>'Income Bracket')); ?>
        <?php echo $form->error($personalProfile,'income_bracket'); ?>
<br></br>




	</div>

        <div class="span-26"> <br>  </div>

        <div class="span-3">
	
            <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/basic"')); ?>
            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">
        <?php echo CHtml::submitButton('Next'); ?>
	</div>
        </div>
        <?php if(Yii::app()->user->hasFlash('basicSuccess')):?> 
        <div class="successMessage"> 
        <?php // echo 'Info Updated and Saved!' /*Yii::app()->user->getFlash('basicSuccess');*/ ?> 
        </div> <?php endif; ?>
        </div>
<?php $this->endWidget(); ?>

        		<?php echo CHtml::hiddenField('test3'); ?>
</div><!-- form -->
</div>
<br></br><br></br>