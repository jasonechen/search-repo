<div class="form">

<?php 
        $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
    	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="column">
		<?php echo $form->labelEx($model,'FirstName',array('label'=>'First Name')); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'LastName',array('label'=>'Last Name')); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>
               <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->   
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
       <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->   
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
       <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->   
	<div class="row">
		<?php echo $form->labelEx($model,'password_unhash',array('label'=>'Password')); ?>
		<?php echo $form->passwordField($model,'password_unhash',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password_unhash'); ?>
	</div>
       <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->   
        <div class="row">
<!--              Note that we don't use the extended label, labelEx, but rather just plain label-->
                <?php echo $form->label($model,'password_unhash_repeat',array('label'=>'Repeat password')); ?>
		<?php echo $form->passwordField($model,'password_unhash_repeat',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password_unhash_repeat'); ?>
	</div>
               <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->   
	<div class="span-6">
		<?php echo $form->labelEx($model,'transType',array('label'=>'I would like to:')); ?>
                <?php echo $form->dropDownList($model,'transType',array('B'=>'Buy Profiles','S'=>'Sell my Profile')); ?>
	</div>
       
	<div class="span-18-last">
		<?php echo $form->labelEx($model,'schoolType',array('label'=>'for:')); ?>
                <?php echo $form->dropDownList($model,'schoolType',array('C'=>'College',
                                                                         'L'=>'Law School',
                                                                         'B'=>'Business School',
                                                                         'M'=>'Medical School')); ?>
	</div>        
              <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->  
        
                <?php if(CCaptcha::checkRequirements()): ?>
                <div class="span-8">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div class="span-3 last">
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
                   <div class="span-24"> </div>  <!-- row spacer*/ -->  
	<!--	<div class="span-5 hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>-->
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
        

        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->  	
        
        <div class="span-1">   
        <?php echo $form->checkBox($model,'termagree'); ?></div>
            <div class="span-10"> <p> I agree to Meceve's  
        <?php echo CHtml::link("Terms and Conditions",array('site/page', 'view'=>'terms_conditions'),array('target'=>'_blank'));
        ?>
	<?php echo $form->error($model,'termagree'); ?>
            </p></div>

                <div class="span-24"> <br>  </div>  <!-- row spacer*/ --> 
        
        <div class="span-24">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Sign Up!' : 'Save'); ?>
	
        
     

<?php $this->endWidget(); ?>

</div><!-- form -->
        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->  	
        </div>
