

<div class="form">
<?php 
  //$this->widget('ext.pixelmatrix.EUniform'); 
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'action'=>'index.php?r=site/login',
	'enableClientValidation'=>true,
	 'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?>

     <div class="loginform">	

<table width="350" height="150" >

    <tbody style="font-size:12px">

        <tr><td>     
		<?php echo $form->label($model,'username'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'username'); ?>
                <?php echo $form->error($model,'username'); ?>
		
            </td>
        </tr>
      <tr><td>     
          
		<?php echo $form->label($model,'password'); ?>
            </td>
            <td>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
            </td>
        </tr> 
    <tr><td colspan="2"> 
        		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
    </td>
    </tr>
    </tbody>
</table>
        
	<div class="row buttons">
            
                <input class="btn" type="submit" value="Login" />
               <!--  echo CHtml::htmlButton('Cancel',
                 array('onclick'=>'$("#loginbox").dialog("close");')); ?>    -->     
	</div>
        <br></br><br>
        <div class="row">
                <?php echo CHtml::link("Trouble logging in?",array('forgotpassword/index'),array('style'=>'color: #659E45;
    text-decoration: none;font-size:12px;')); ?>
	</div>
        
        <div class="row" style="border-top: solid 1px gray">
            <br>
                <span style="font-size:16px;">Don't have an account? </span><?php echo CHtml::link("Sign up!",array('user/create'),array('style'=>'color: #659E45;
    text-decoration: none;font-size:16px;')); ?></p>
	</div>

<?php $this->endWidget(); ?>
</div>
</div>

