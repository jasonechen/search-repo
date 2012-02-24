<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form-reduced',
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
        
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_unhash',array('label'=>'Password')); ?>
		<?php echo $form->passwordField($model,'password_unhash',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password_unhash'); ?>
	</div>

        <div class="row">
<!--              Note that we don't use the extended label, labelEx, but rather just plain label-->
                <?php echo $form->label($model,'password_unhash_repeat',array('label'=>'Repeat password')); ?>
		<?php echo $form->passwordField($model,'password_unhash_repeat',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password_unhash_repeat'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'transType',array('label'=>'I would like to:')); ?>
                <?php echo $form->dropDownList($model,'transType',array('B'=>'Buy Profiles','S'=>'Sell my Profile')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolType',array('label'=>'for:')); ?>
                <?php echo $form->dropDownList($model,'schoolType',array('C'=>'College',
                                                                         'L'=>'Law School',
                                                                         'B'=>'Business School',
                                                                         'M'=>'Medical School')); ?>
	</div>        
                
        
	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

        <?php if(Yii::app()->user->hasFlash('userAdminSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('userAdminSuccess'); ?> 
        </div> <?php endif; ?>   
        
     

<?php $this->endWidget(); ?>

</div><!-- form -->