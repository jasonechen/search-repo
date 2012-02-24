<?php
$this->pageTitle=Yii::app()->name . ' - Change password';
?>
<div class="form">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'change-password','action'=>'index.php?r=forgotpassword/Usernewpassword',	
		'enableClientValidation'=>true,
		'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,    		
		),
	));
      
        $this->setAdminMenu();
 ?>
 <h2>Change Your Password</h2>
 
<table width="300" height="50" >
      <col width="150px" />
      <col width="175px" />          
      <col width="50px" />          
    <tbody style="font-size:12px">
            <tr>
                <td>     
                   <?php echo $form->label($model,'password_unhash'); ?>
                </td>
                <td>
		<?php echo $form->passwordField($model,'password_unhash'); ?>
		<?php echo $form->error($model,'password_unhash'); ?>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
		<?php echo $form->label($model,'password_unhash_repeat'); ?>: 
                </td>
                <td>
		<?php echo $form->passwordField($model,'password_unhash_repeat'); ?>
		<?php echo $form->error($model,'password_unhash_repeat'); ?>
                </td>
            </tr>
            <tr>   </tr>
        </tbody>
    </table>
 
 

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
	
	<?php echo $form->hiddenField($model,'id',array('value'=>$id)); ?>	

 <?php $this->endWidget(); ?>	
</div>
