<div class="span-12">
<div class="form">

<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
    	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
         'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,)
)); ?>
    
        <?php echo $form->hiddenField($model,'transType',array('value'=>'B')); ?> 
	<?php echo $form->errorSummary($model); ?>
<div class="registerform">
    <table width="600" height="320" >
      <col width="200px" />
      <col width="200px" />    
      <col width="200px" />
    <tbody style="font-size:12px">

        <tr><td>     
		<?php echo $form->label($model,'FirstName',array('label'=>'First Name')); ?> 
            </td>
            <td>
		<?php echo $form->textField($model,'FirstName',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
            </td>
        </tr>
      <tr><td>     
		<?php echo $form->label($model,'LastName',array('label'=>'Last Name')); ?>
            </td>
            <td>
	<?php echo $form->textField($model,'LastName',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LastName'); ?>
            </td>
        </tr>   
       <tr><td>     
		<?php echo $form->label($model,'email'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'email',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
            </td>
        </tr> 
 
          <tr><td>     
		<?php echo $form->label($model,'username'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'username',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'username'); ?>
            </td>
            <td style="font-style: italic">Choose username</td>
        </tr>  
            <tr><td>     
		<?php echo $form->label($model,'password_unhash',array('label'=>'Choose Password')); ?>
            </td>
            <td>
		<?php echo $form->passwordField($model,'password_unhash',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password_unhash'); ?>
            </td>
                        <td style="font-style: italic">Password must be 8 letters or more and include a capital letter and number</td>
        </tr>   
        
                  <tr><td>     
                <?php echo $form->label($model,'password_unhash_repeat',array('label'=>'Repeat Password')); ?>
            </td>
            <td>
		<?php echo $form->passwordField($model,'password_unhash_repeat',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password_unhash_repeat'); ?>
            </td>
        </tr>  
    
                   <tr><td>     
      <?php echo $form->label($model,'schoolType',array('label'=>'Applying to:')); ?>
            </td>
            <td>
             <?php echo $form->dropDownList($model,'schoolType',array('C'=>'College',
                                                                         'L'=>'Law School',
                                                                         'B'=>'Business School',
                                                                         'M'=>'Medical School')); ?>
            </td>
        </tr> 
        <?php if(CCaptcha::checkRequirements()): ?>
                       <tr><td valign="bottom">     
        
                               <?php echo $form->labelEx($model,'verifyCode'); ?>
            </td>
            <td>
         		<?php $this->widget('CCaptcha'); ?>
                <br>
		<?php /* $model->verifyCode= "Enter Verification Code";*/ echo $form->textField($model,'verifyCode'); ?>
                <?php echo $form->error($model,'verifyCode'); ?>	
                <?php endif; ?>
        </tr> 
        </tbody>
    
    </table>
       
       <?php echo $form->checkBox($model,'termagree'); ?>
         
            <p> I agree to CrowdPrep's   <?php echo CHtml::link("Terms and Conditions",array('site/page', 'view'=>'terms_conditions'),array('target'=>'_blank'));
        ?>
                            </p>

	<?php echo $form->error($model,'termagree'); ?>
                
         
        
        </div>
            
        
        
        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Sign Up!' : 'Save'); ?>
            <br></br><br></br><br></br>
        </div>
     

<?php $this->endWidget(); ?>

</div><!-- form -->
        
        </div>

