<?php $this->setAdminMenu(); ?>
<div class="sub-head-profile-edit">Academics - Grades</div>
<div class="container">
<div class="span-26 last">

    
<?php    //$this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-profile-score-form',
	'enableAjaxValidation'=>false,
            'enableClientValidation'=>true,
)); ?>

	
	<?php echo $form->errorSummary($academicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

       <div class="gradesprofileform">
  
    <table width="600" height="300" >
      <col width="200px" />
      <col width="250px" />    
      <col width="150px" />

        <tr><td>     
		<?php echo $form->labelEx($academicProfile,'GPA_unweight'); ?>

            </td>
            <td>
		<?php echo $form->textField($academicProfile,'GPA_unweight'); ?>
		<?php echo $form->error($academicProfile,'GPA_unweight'); ?>
            </td>
                
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>
      <tr><td>     
                <?php echo $form->labelEx($academicProfile,'GPA_weight'); ?>

            </td>
            <td>
		<?php echo $form->textField($academicProfile,'GPA_weight'); ?>
		<?php echo $form->error($academicProfile,'GPA_weight'); ?>
                                                                 
            </td>
             <td style="font-style: italic; font-size: 12px"></td>
        </tr>   
       <tr><td>     
		<?php echo $form->labelEx($academicProfile,'class_rank_num'); ?>

            </td>
            <td>
		<?php echo $form->textField($academicProfile,'class_rank_num'); ?>
		<?php echo $form->error($academicProfile,'class_rank_num'); ?>
            </td>
            <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
 
          <tr><td>     
                <?php echo $form->labelEx($academicProfile,'class_rank_percent'); ?>

            </td>
            <td>
		<?php echo $form->dropDownList($academicProfile,'class_rank_percent',   array('1'=>'Top 1%',
                                                                 '2'=>'Top 5%',
                                                                 '3'=>'Top 10%',
                                                               '4'=>'Top 20%',
                                                               '5'=>'Top 25%',
                                                               '6'=>'Top 50%', '7'=>'50%-75%','8'=>'Bottom 25%'),array('prompt'=>'Class Rank Percentile')); ?>
		<?php echo $form->error($academicProfile,'class_rank_percent'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>  
            <tr><td>     
		<?php echo $form->labelEx($academicProfile,'class_size'); ?>

            </td>
            <td>
		<?php echo $form->textField($academicProfile,'class_size'); ?>
		<?php echo $form->error($academicProfile,'class_size'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>   
        
    </table>
       </div>
	
    
        

  
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Update'); ?>
	</div>

   </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<br></br><br></br>