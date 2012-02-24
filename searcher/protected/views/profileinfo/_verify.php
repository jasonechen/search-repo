<?php 	$this->progressbar('Finish','verify'); ?>
<div class="sub-head-profile">Finish - Verification </div>
<p>TEXT MESSAGE</p>
<div class="container">
<div class="form">
<?php 

    //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'verify-form',
	'enableAjaxValidation'=>false,
)); ?>

    
       
<div class="column">
        <?php echo $form->labelEx($verifyProfile,'ref1_name',array('label'=>'Reference 1 Name')); ?>
        <?php echo $form->textField($verifyProfile,'ref1_name'); ?>
        <?php echo $form->error($verifyProfile,'ref1_name'); ?>
  </div>            
   <div class="column">     
        <?php echo $form->labelEx($verifyProfile,'ref1_contact',array('label'=>'Reference 1 Contact')); ?>
        <?php echo $form->textField($verifyProfile,'ref1_contact'); ?>
        <?php echo $form->error($verifyProfile,'ref1_contact'); ?>
  </div>            
   <div class="row">           
        
        <?php echo $form->labelEx($verifyProfile,'ref1_desc',array('label'=>'Reference 1 Description')); ?>
        <?php echo $form->textField($verifyProfile,'ref1_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref1_desc'); ?>
                    
</div>        
    <br>

<div class="column">
        <?php echo $form->labelEx($verifyProfile,'ref2_name',array('label'=>'Reference 2 Name')); ?>
        <?php echo $form->textField($verifyProfile,'ref2_name'); ?>
        <?php echo $form->error($verifyProfile,'ref2_name'); ?>
 </div>            
   <div class="column">               
        
        <?php echo $form->labelEx($verifyProfile,'ref2_contact',array('label'=>'Reference 2 Contact')); ?>
        <?php echo $form->textField($verifyProfile,'ref2_contact'); ?>
        <?php echo $form->error($verifyProfile,'ref2_contact'); ?>
   </div>            
   <div class="row">           
              
        
        <?php echo $form->labelEx($verifyProfile,'ref2_desc',array('label'=>'Reference 2 Description')); ?>
        <?php echo $form->textField($verifyProfile,'ref2_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref2_desc'); ?>
                    
</div>
     <br>
  <div class="column">
        <?php echo $form->labelEx($verifyProfile,'ref3_name',array('label'=>'Reference 3 Name')); ?>
        <?php echo $form->textField($verifyProfile,'ref3_name'); ?>
        <?php echo $form->error($verifyProfile,'ref3_name'); ?>
 </div>            
   <div class="column">              
        
        <?php echo $form->labelEx($verifyProfile,'ref3_contact',array('label'=>'Reference 3 Contact')); ?>
        <?php echo $form->textField($verifyProfile,'ref3_contact'); ?>
        <?php echo $form->error($verifyProfile,'ref3_contact'); ?>
       </div>            
   <div class="row">           
                  
        
        <?php echo $form->labelEx($verifyProfile,'ref3_desc',array('label'=>'Reference 3 Description')); ?>
        <?php echo $form->textField($verifyProfile,'ref3_desc'); ?>
        <?php echo $form->error($verifyProfile,'ref3_desc'); ?>
                    
</div>  
    
    
    
    
    
 

        <div class="span-26"> <br>  </div>

	<br></br>
        <div class="span-3">
	
            <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/consult"')); ?>
		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">


		<?php echo CHtml::submitButton('Next'); ?>
	</div>

</div>
<?php $this->endWidget(); ?>


<br></br><br></br>
</div>
</div>