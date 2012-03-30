<?php $this->setAdminMenu(); ?>
<div class="sub-head-profile-edit">Test Scores - SAT I / PSAT</div>
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
  
    <table width="600" height="400" >
      <col width="250px" />
      <col width="250px" />    
      <col width="150px" />

        <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'SAT_Math',array('label'=>'SAT I Math')); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'SAT_Math',ScoreProfile::$SatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'SAT_Math'); ?>
            </td>
                
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>
      <tr><td>     
                <?php echo $form->labelEx($scoreProfile,'SAT_Critical_Read',array('label'=>'SAT I Critical Reading')); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'SAT_Critical_Read',ScoreProfile::$SatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'SAT_Critical_Read'); ?>
                                                                 
            </td>
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>   
       <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'SAT_Writing',array('label'=>'SAT I Writing')); ?>

            </td>
            <td>
    		<?php echo $form->dropDownList($scoreProfile,'SAT_Writing',ScoreProfile::$SatScoreArray, array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'SAT_Writing'); ?>
            </td>
            <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
 
          <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'SAT_Essay',array('label'=>'SAT I Essay')); ?> 

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'SAT_Essay', array(0=>'0',
                                                                            2=>'2',3=>'3',
                                                                            4=>'4',5=>'5',
                                                                            6=>'6',7=>'7',
                                                                            8=>'8',9=>'9',
                                                                            10=>'10',11=>'11',
                                                                            12=>'12',), array('prompt'=>'Select/Update Score')
                                                                      ); ?>
		<?php echo $form->error($scoreProfile,'SAT_Essay'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>  
            <tr><td>     
        <?php echo $form->labelEx($scoreProfile,'PSAT_Math',array('label'=>'PSAT Math')); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'PSAT_Math',ScoreProfile::$PsatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Math'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>   
        
                  <tr><td>     
		<?php echo $form->labelEx($scoreProfile,'PSAT_Verbal',array('label'=>'PSAT Verbal')); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'PSAT_Verbal',ScoreProfile::$PsatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Verbal'); ?>
            </td>
        </tr>  
    
                   <tr><td>     
 		<?php echo $form->labelEx($scoreProfile,'PSAT_Writing',array('label'=>'PSAT Writing')); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($scoreProfile,'PSAT_Writing',ScoreProfile::$PsatScoreArray,array('prompt'=>'Select/Update Score')); ?>
		<?php echo $form->error($scoreProfile,'PSAT_Writing'); ?>
            </td>
           <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
                           <tr><td>     
		<?php echo $form->labelEx($academicProfile,'national_Merit',array('label'=>'National Merit Scholar')); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($academicProfile,'national_Merit',
                                                                   array(
                                                                       'N'=>'Commended',
                                                                       'S'=>'Outstanding',
                                                                         'M'=>'Semifinalist',
                                                                         'F'=>'Finalist'),
                                                                    array('prompt'=>'Enter Recognition')); ?>
		<?php echo $form->error($academicProfile,'national_Merit'); ?>
            </td>
        </tr>      
    </table>
    
        </div>

    
        
<div class="span-24"> <br>  </div>

        <div class="span-3 last">
            <div class="buttons">
		<?php echo CHtml::submitButton('Update'); ?>
	</div>

   

   </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<br></br>