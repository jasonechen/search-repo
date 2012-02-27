<div class="form">

<p>
    
    
</p>
    


<br>
<h3>Username/Password</h3>
<table width="300" height="50" >
      <col width="75px" />
      <col width="175px" />          
      <col width="50px" />          
    <tbody style="font-size:12px">
            <tr>
                <td>     
                    Username:
                </td>
                <td>
                    <?php echo $model->username; ?>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Password: 
                </td>
                <td>
                    <?php echo CHtml::link('Click to Reset Password', array('Forgotpassword/UserReset')) ?>
                </td>
            </tr>
            <tr>   </tr>
        </tbody>
    </table>

<br>

<h3>Ratings</h3>
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

<h3>Exclusivity</h3>

<p><i> Check box to agree to be exclusive to CrowdPrep and earn a higher payout %! </i><br>

<?php echo CHtml::link('Exclusivity Terms and Conditions', '#',array('
                                    onclick'=>'$("#exclusiveterms").dialog("open"); return false;',
                                    
                        )); 
				   ?> </p>
	   <?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'exclusiveterms',
			// additional javascript options for the dialog plugin
			'options'=>array(
				'title'=>'Exclusivity Terms and Conditions',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>'550px',
				'height'=>'600',
                                'resizable'=>false,
				
			),
		));
	?>
    
       <?php $this->renderPartial('exclusiveterms') ?>
    
      <?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
    





 <?php 	
	
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
?>
	
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exclusivity-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationFinish(this);')
)); ?>	


		
		
	<div class="row">
		<?php echo $form->checkBox($exclusive,'exclusiveValue',array('onclick'=>'setValue(this);')); ?>
		<?php echo $form->labelEx($exclusive,'exclusiveValue'); ?>
		<?php echo $form->error($exclusive,'exclusiveValue'); ?>
	</div>
	


	

<script type="text/javascript">
function setValue(exclusive){
	if(exclusive.checked == true) exclusive.value = 1;
	else exclusive.value = 0;
}
</script>

	
<br>
        <div class="span-3 last">
            <div class="buttons">


		<?php echo CHtml::submitButton('Update'); ?>
	</div>
        </div>

<?php $this->endWidget(); ?>


<br></br><br></br>
<p></p>
<?php 
      //  $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sellerAdmin-form',
	'enableAjaxValidation'=>false,
)); ?>
<h3>Settings</h3>
<div class="span-24">  </div>
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
<br><br/>


<br></br><br></br><br></br>