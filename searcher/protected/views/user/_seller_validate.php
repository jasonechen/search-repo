<?php


$this->setAdminMenu();

?>

<h2>Profile Verification</h2><br>
<p> Current status: <b><?php echo VerifyProfile::getStatus($verifyProfile->status) ?></b>                
</p>
<br>

<p>Submit up to 3 references and/or upload your application in order to receive "Verified" status. </p>

<div class="container">

    
<div class="form">
<?php 

    //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'verify-form',
	'enableAjaxValidation'=>false,
)); ?>

<table width=600px" height="130px" >
    <col width="100px" />
    <col width="150px" />
    <col width="150px" />
    <col width="150px" />
    <tr>
          <td></td>
          <td style="font-weight: bold">Name</td>
          <td style="font-weight: bold">Contact Info</td>
          <td style="font-weight: bold">Description</td>
      </tr>
      <tr>
          <td>Reference 1</td>
          <td>        
        <?php echo $form->textField($verifyProfile,'ref1_name'); ?>
        <?php echo $form->error($verifyProfile,'ref1_name'); ?>
          </td>
          <td>
        <?php echo $form->textField($verifyProfile,'ref1_contact'); ?>
        <?php echo $form->error($verifyProfile,'ref1_contact'); ?>
          </td>
          <td>
        <?php echo $form->textField($verifyProfile,'ref1_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref1_desc'); ?>
          </td>              
      </tr>
        <tr>
          <td>Reference 2</td>
          <td>        
        <?php echo $form->textField($verifyProfile,'ref2_name'); ?>
        <?php echo $form->error($verifyProfile,'ref2_name'); ?>
          </td>
          <td>
        <?php echo $form->textField($verifyProfile,'ref2_contact'); ?>
        <?php echo $form->error($verifyProfile,'ref2_contact'); ?>
          </td>
          <td>
        <?php echo $form->textField($verifyProfile,'ref2_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref2_desc'); ?>
          </td>              
      </tr>         
      <tr>
          <td> Reference 3</td>
          <td>        
        <?php echo $form->textField($verifyProfile,'ref3_name'); ?>
        <?php echo $form->error($verifyProfile,'ref3_name'); ?>
          </td>
          <td>
        <?php echo $form->textField($verifyProfile,'ref3_contact'); ?>
        <?php echo $form->error($verifyProfile,'ref3_contact'); ?>
          </td>
          <td>
        <?php echo $form->textField($verifyProfile,'ref3_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref3_desc'); ?>
          </td>              
      </tr>
</table>
 


 

        <div class="span-26"> <br>  </div>

	<br></br>
  
        <div class="span-3 last">
            <div class="buttons">


		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

</div>
<?php $this->endWidget(); ?>


<br></br><br></br><br></br><br></br>
</div>
</div>
  
    
    
    



