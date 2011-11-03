<div class="form">

<p>
    
    
</p>
    
<?php 
        $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sellerAdmin-form',
	'enableAjaxValidation'=>false,
)); ?>

   
        <div class="row">
  
		<?php 
                    if ($basicProfile->avg_profile_rating===null){
                        echo "You have no ratings for your profile.";
                    }
                    else{
                        echo "You have an average profile rating of ".$basicProfile->avg_profile_rating."."; 
                    }
                ?>

        </div>

<br></br>
        <div class="row">
  
		<?php echo "You have earned ".$creditModel->sell_credits." credits total."; ?>

        </div>


<div class="span-24"> <br>  </div>
	<div class="span-24">
		<?php echo $form->labelEx($basicProfile,'l1ForSale',array('label'=>'Publish Level 1 Profile')); ?>
		<?php echo $form->dropDownList($basicProfile,'l1ForSale',
                                                                   array(0=>'No',
                                                                         1=>'Yes')); ?>
        </div>
	<div class="span-24">
		<?php echo $form->labelEx($basicProfile,'l2ForSale',array('label'=>'Publish Level 2 Profile')); ?>
		<?php echo $form->dropDownList($basicProfile,'l2ForSale',
                                                                   array(0=>'No',
                                                                         1=>'Yes')); ?>
        </div>
	<div class="span-24">
		<?php echo $form->labelEx($basicProfile,'l3ForSale',array('label'=>'Publish Level 3 Profile')); ?>
		<?php echo $form->dropDownList($basicProfile,'l3ForSale',
                                                                   array(0=>'No',
                                                                         1=>'Yes')); ?>
        </div>
<div class="span-24"> <br>  </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Update'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('sellSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('sellSuccess'); ?> 
        </div> <?php endif; ?>    
    
<?php $this->endWidget(); ?>

</div><!-- form -->