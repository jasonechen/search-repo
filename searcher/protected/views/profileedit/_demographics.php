<?php $this->setAdminMenu(); ?>
<div class="sub-head-profile-edit">Personal Info - Demographics</div>

<div class="container">
<div class="span-26 last">

<?php 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'demo-profile-demo-form',
	'enableAjaxValidation'=>true,
)); ?>

       <?php echo $form->hiddenField($basicProfile,'highschool_id'); ?>
   <div class="profileform">
  
    <table width="600" height="300" >
      <col width="250px" />
      <col width="250px" />    
      <col width="150px" />
    <tbody style="font-size:12px">

        <tr><td>     
        <?php echo $form->labelEx($basicProfile,'gender',array('label'=>'Gender')); ?>
            </td>
            <td>
        <?php echo $form->dropDownList($basicProfile,'gender',
                                                           array('M'=>'Male',
                                                                 'F'=>'Female'),array('prompt'=>'Select Sex')); ?>
        <?php echo $form->error($basicProfile,'gender'); ?>
            </td>
                
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>
      <tr><td>     
               <?php echo $form->labelEx($basicProfile,'race_id',array('label'=>'Race',)); ?>
      
            </td>
            <td>
        <?php echo $form->dropDownList($basicProfile,'race_id', $basicProfile->getRaceOptions(),array('prompt'=>'Select Race')); ?>
        <?php echo $form->error($basicProfile,'race_id'); ?>                                            
            </td>
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>   
       <tr><td>     
	        <?php echo $form->labelEx($personalProfile,'ethnic_origin',array('label'=>'Ethnicity',)); ?>
    
            </td>
            <td>
           <?php echo $form->dropDownList($personalProfile,'ethnic_origin',$personalProfile->getEthnicOptions(),array('prompt'=>'Select Ethnicity')); ?>
        <?php echo $form->error($personalProfile,'ethnic_origin'); ?>
            </td>
            <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
 
          <tr><td>     
         <?php echo $form->labelEx($personalProfile,'citizenship'); ?>
   
            </td>
            <td>
     <?php echo $form->dropDownList($personalProfile,'citizenship',$personalProfile->getCitizenshipOptions(),array('prompt'=>'Select Citizenship')); ?>
        <?php echo $form->error($personalProfile,'citizenship'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>  
            <tr><td>     
        <?php echo $form->labelEx($personalProfile,'parental_status',array('label'=>'Parents\' Marital Status',)); ?>
            </td>
            <td>
        <?php echo $form->dropDownList($personalProfile,'parental_status',PersonalProfile::$ParentalStatusArray,array('prompt'=>'Parental Status')); ?>
        <?php echo $form->error($personalProfile,'parental_status'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>   
        
                  <tr><td>     
        <?php echo $form->labelEx($personalProfile,'income_bracket',array('label'=>'Household Income',)); ?>
 
            </td>
            <td>
       <?php echo $form->dropDownList($personalProfile,'income_bracket',PersonalProfile::$IncomeBracketArray,array('prompt'=>'Income Bracket')); ?>
        <?php echo $form->error($personalProfile,'income_bracket'); ?>
            </td>
        </tr>                
    </table>
       
</div>

  
<div class="span-26"> <br>  </div>
        <div class="span-3 last">
            <div class="buttons">
        <?php echo CHtml::submitButton('Update'); ?>
	</div>
        </div>

        </div>
<?php $this->endWidget(); ?>

        		
</div><!-- form -->
</div>
<br></br><br></br>