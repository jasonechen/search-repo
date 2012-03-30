<?php $this->setAdminMenu(); ?>
<div class="sub-head-profile-edit">Test Scores - ACT</div>
<div class="container">
<div class="span-26 last">
<?php 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($scoreProfile); ?>
	<?php echo $form->errorSummary($academicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

    <div class="scoreprofileform">
  
    <table width="600" height="300" >
      <col width="200px" />
      <col width="250px" />    
      <col width="150px" />

        <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'ACT_English',array('label'=>'ACT English')); ?>
            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'ACT_English',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_English'); ?>
            </td>
                
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>
      <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'ACT_Math',array('label'=>'ACT Math')); ?>
            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Math',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Math'); ?>
                                                                 
            </td>
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>   
       <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'ACT_Reading',array('label'=>'ACT Reading')); ?>
            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Reading',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Reading'); ?>
            </td>
            <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
 
          <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'ACT_Science',array('label'=>'ACT Science')); ?>
            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Science',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Science'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>  
            <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'ACT_Writing',array('label'=>'ACT Writing')); ?>
            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Writing', array(
                                                                            2=>'2',3=>'3',
                                                                            4=>'4',5=>'5',
                                                                            6=>'6',7=>'7',
                                                                            8=>'8',9=>'9',
                                                                            10=>'10',11=>'11',
                                                                            12=>'12',),array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Writing'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>   
        
                  <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'ACT_Composite',array('label'=>'ACT Composite')); ?>
            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'ACT_Composite',ScoreProfile::$ActScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'ACT_Composite'); ?>
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
   
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<br></br>