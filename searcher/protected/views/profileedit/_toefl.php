<?php $this->setAdminMenu(); ?>
<div class="sub-head-profile-edit">Test Scores - TOEFL / IELTS</div>
<div class="container">
<div class="span-26 last">
<?php  
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($scoreProfile); ?>
	
        <?php //echo $form->errorSummary($personalProfile); ?>

   <div class="scoreprofileform">
  
    <table width="400" height="100" >
      <col width="150px" />
      <col width="150px" />    
      <col width="100px" />

        <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'toefl'); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'toefl',ScoreProfile::$ToeflScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'toefl'); ?>
            </td>
                
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>
      <tr><td>     
                <?php echo $form->labelEx($scoreProfile,'ielts'); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'ielts',ScoreProfile::$IeltsScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ielts'); ?>                                                             
            </td>
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>  
    </table>
	      
        
        
        </div>

    
        
<div class="span-24"> <br>  </div>
 
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Update'); ?>
            </div>
        </div>
 <div class="span-10 last"><br></br><br></br><br></br><br></br><br></br><br></br></div>   
   </div>
<?php $this->endWidget(); ?>

</div><!-- form -->


	
