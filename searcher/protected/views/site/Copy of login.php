<?php
$this->pageTitle=Yii::app()->name . ' - Login';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
<div class="span-10"> 
<fieldset>
<h2>Login</h2>


<div class="form">
<?php 
  //$this->widget('ext.pixelmatrix.EUniform'); 
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?>

	

	<div class="row">
            <div class="loginform">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>   
	</div>

	<div class="row">
                <div class="loginform">
		<?php echo $form->label($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
                
	</div>

	<div class="row">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
        <br>
	<div class="row buttons">
            
                <input class="btn" type="submit" value="Login" />
		
                 
	</div>
        <br>
        <div class="row">
                <?php echo CHtml::link("Forgot your password?",array('forgotpassword/index')); ?>
	</div>
        
        <div class="row">
                Don't have an account? <?php echo CHtml::link("Sign up!",array('user/create')); ?></p>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
</fieldset>

<br></br><br></br>