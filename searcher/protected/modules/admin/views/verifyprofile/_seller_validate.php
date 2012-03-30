

<h2>Profile Verification</h2><br>
<br>
<h4>
    <h3><?php echo CHtml::link('Profile Verification', '?r=admin/verifyprofile/');?> / <?php echo $uname; ?></h3>
<br/>
 
<div class="container">

    
<div class="validateform">
<?php 

    //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'verify-form',
	'enableAjaxValidation'=>false,
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <table width=100%" height="130px" >
    
    <tr>
          <td></td>
          <th>Name</th>
          <th>Contact Info</th>
          <th>Description</th>
          <th>Referral Checked</th>
      </tr>
      <tr>
          <td>Reference 1</td>
          <td>
              <?php  echo CHtml::label($verifyProfile->ref1_name,'ref1_name');?>
        
          </td>
          <td>
        <?php  echo CHtml::label($verifyProfile->ref1_contact,'ref1_contact'); ?>
          </td>
          <td>
        
        <?php  echo CHtml::label($verifyProfile->ref1_desc,'ref1_desc'); ?>
          </td> 
	<td>
        <?php echo $form->checkBox($verifyProfile,'ref1_check'); ?>
        </td>		  
      </tr>
        <tr>
          <td>Reference 2</td>
          <td>        
        <?php 
        if($verifyProfile->ref2_name)
                  echo CHtml::label($verifyProfile->ref2_name,'ref2_name');
        else
                  echo $form->textField($verifyProfile,'ref2_name'); ?>
        <?php echo $form->error($verifyProfile,'ref2_name'); ?>
          </td>
          <td>
        <?php if($verifyProfile->ref2_contact)
                  echo CHtml::label($verifyProfile->ref2_contact,'ref1_contact');
            else
                  echo $form->textField($verifyProfile,'ref2_contact'); ?>
        <?php echo $form->error($verifyProfile,'ref2_contact'); ?>
          </td>
          <td>
        <?php
        if($verifyProfile->ref2_desc)
                  echo CHtml::label($verifyProfile->ref1_desc,'ref2_desc');
            else
                  echo $form->textField($verifyProfile,'ref2_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref2_desc'); ?>
          </td> 
		<td>
        <?php echo $form->checkBox($verifyProfile,'ref2_check'); ?>
        </td>		  
      </tr>         
      <tr>
          <td> Reference 3</td>
          <td>        
        <?php  if($verifyProfile->ref2_name)
                  echo CHtml::label($verifyProfile->ref1_name,'ref3_name');
            else
                  echo $form->textField($verifyProfile,'ref3_name'); ?>
        <?php echo $form->error($verifyProfile,'ref3_name'); ?>
          </td>
          <td>
        <?php 
            if($verifyProfile->ref3_contact)
                  echo CHtml::label($verifyProfile->ref3_contact,'ref3_contact');
            else
                  echo $form->textField($verifyProfile,'ref3_contact');
            ?>
        <?php echo $form->error($verifyProfile,'ref3_contact'); ?>
          </td>
          <td>
        <?php if($verifyProfile->ref3_desc)
                  echo CHtml::label($verifyProfile->ref3_desc,'ref3_desc');
            else
                  echo $form->textField($verifyProfile,'ref3_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref3_desc'); ?>
          </td>
<td>
        <?php echo $form->checkBox($verifyProfile,'ref3_check'); ?>
        </td>			  
      </tr>
      <tr>
          <td>Notes</td>
          <td colspan="3"><?php echo $form->textarea($verifyProfile,'data',array('rows'=>"2",'cols'=>"10"),array()); ?></td>
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
  
    
    
    



