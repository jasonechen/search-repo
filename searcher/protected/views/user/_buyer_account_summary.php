<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Buyer Admin',
);

$this->setAdminMenu();

?>

<h3>Account Summary</h3>
<div class="form" id="form">

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

    
    
    
    
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'credits-form',
	'enableAjaxValidation'=>false,
)); ?>


 <div class="registerform">
    <table width="400" height="100" >
      <col width="150px" />
      <col width="150px" />          
      <col width="150px" />          
    <tbody style="font-size:12px">
            <tr>
                <td>     
                    <?php echo $form->label($model,'schoolType',array('label'=>'Applying to:')); ?>
                </td>
                <td>
                    <?php echo $form->dropDownList($model,'schoolType',array('C'=>'College',
                                                                         'L'=>'Law School',
                                                                         'B'=>'Business School',
                                                                         'M'=>'Medical School')); ?>
                </td>
                <td>
                    <div class="row buttons">
                    <?php echo CHtml::submitButton('Update'); ?>           
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div>
        
<?php $this->endWidget() ?>

<br></br><br></br>
</div>