<?php $this->setAdminMenu(); ?>
<div class="sub-head-profile-edit">Personal Info - Basic </div>
<div class="container">
<div class="span-26 last">
<?php 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-profile-basic-form',
	'enableAjaxValidation'=>true,
)); ?>
    <div class="profileform">
  
    <table width="650" height="400" >
      <col width="250px" />
      <col width="250px" />    
      <col width="200px" />
    <tbody style="font-size:12px">

        <tr><td>     
		<?php echo $form->labelEx($basicProfile,'nickname',array('label'=>'Nickname')); ?>
            </td>
            <td>
        <?php echo $form->textField($basicProfile,'nickname'); ?>
        <?php echo $form->error($basicProfile,'nickname'); ?>
            </td>
                
             <td style="font-style: italic; font-size: 12px">Will be displayed</td>
        </tr>
      <tr><td>     
        <?php echo $form->labelEx($basicProfile,'profile_type',array('label'=>'Primary Focus Areas')); ?>
            </td>
            <td>
            <?php
                $profiletypes = BasicProfile::$ProfileTypeArray;                                 
                $this->widget('ext.widgets.EchMultiselect', array(
                'model'=>$basicProfile,
                'dropDownAttribute'=>'type',    
                'data'=>$profiletypes, 
                'options'=> array(  
                      	'click'=>'js:function(event, ui){
		       	 if( $(this).multiselect("widget").find("input:checked").length > 3 ){		                                         
		              return false;
		                    }
		             }',   
                        'header'=> false,
                        'noneSelectedText'=>'-- ' . Yii::t('application','Select up to 3') . ' --',
                 )                    
                
                )); ?>
                  <?php echo $form->error($basicProfile,'profile_type'); ?> 
            </td>
             <td style="font-style: italic; font-size: 12px"> Choose up to 3. This will be used to help narrow searches.</td>
        </tr>   
       <tr><td>     
	<?php echo $form->labelEx($personalProfile,'hs_grad_year',array('label'=>'High School Graduation Year')); ?>
            </td>
            <td>
        <?php echo $form->dropDownList($personalProfile,'hs_grad_year', array(2011=>'2011',
                                                                                2010=>'2010',
                                                                              2009=>'2009',
                                                                              2008=>'2008',
                                                                              2007=>'2007',
                                                                              2006=>'2006',
                                                                              2005=>'2005',
                                                                              2004=>'2004',
                                                                              2003=>'2003',
                                                                              2002=>'2002',
                                                                              2001=>'2001',
                                                                              2000=>'2000',
                                                           ), array('prompt'=>'Select Graduation Year')); ?>
            </td>
            <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
 
          <tr><td>     
        <?php echo $form->labelEx($basicProfile,'highSchoolType',array('label'=>'High School Type')); ?>
            </td>
            <td>
       <?php echo $form->dropDownList($basicProfile,'highSchoolType',
                                                           array('PUB'=>'Public',
                                                                 'PRN'=>'Private Non-Religious',
                                                                 'PRR'=>'Private Religious',
                                                               'HOM'=>'Home-schooled',
                                                               'CHR'=>'Charter',
                                                               'OTH'=>'Other'),array('prompt'=>'Select School Type')); ?>           
              <?php echo $form->error($basicProfile,'highSchoolType'); ?> 
            </td>
            <td style="font-style: italic"></td>
        </tr> 
            <tr>
                <td>     
         <?php echo $form->labelEx($personalProfile,'state', array('label'=>'Home State')); ?>
            </td>
            <td>

        <?php echo $form->dropDownList($personalProfile,'state', $personalProfile->getState(),array('prompt'=>'Select State')); ?>
        <?php echo $form->error($personalProfile,'state'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>   
        
                  <tr><td>     
            <?php echo $form->labelEx($personalProfile,'city', array('label'=>'Home Town/City')); ?>
            </td>
            <td>
        <?php echo $form->textField($personalProfile,'city'); ?>
        <?php echo $form->error($personalProfile,'city'); ?> 
            </td>
        </tr>  
    
                   <tr><td>     
        <?php echo $form->labelEx($personalProfile,'country_reside', array('label'=>'Home Country ')); ?>
            </td>
            <td>

        <?php echo $form->dropDownList($personalProfile,'country_reside',$personalProfile->getCitizenshipOptions(),array('prompt'=>'Select Home Country')); ?>
        <?php echo $form->error($personalProfile,'country_reside'); ?> 
            </td>
                       
           <td style="font-style: italic; font-size: 12px">If applicable</td>
        </tr> 
                           <tr><td>     
        <?php echo $form->labelEx($personalProfile,'hometown_zipcode'); ?>
            </td>
            <td>
      <?php echo $form->textField($personalProfile,'hometown_zipcode'); ?>
        <?php echo $form->error($personalProfile,'hometown_zipcode'); ?>
            </td>
        </tr> 
                           <tr><td>     
		<?php echo $form->labelEx($personalProfile,'date_of_birth',array('label'=>'Date of Birth')); ?>
            </td>
            <td>
		<?php echo $form->textField($personalProfile,'date_of_birth'); ?>
		<?php echo $form->error($personalProfile,'date_of_birth'); ?>
            </td>
            <td style="font-style: italic">(mm/dd/yyyy)</td>
        </tr> 
 
     
    </table>
       
  </div>
       <div class="span-26"> <br>  </div>

        <div class="span-26"> <br>  </div>

        <div class="span-3 last">
	<div class="row buttons">
		<?php echo CHtml::submitButton('Update'); ?>
	</div>
        </div>
<?php $this->endWidget(); ?>

        		
</div><!-- form -->
</div>
<br></br><br></br>