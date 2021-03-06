<?php 	
$this->progressbar('Academics','subjects');
$this->IncludeJsDynamicrows();?>
<div class="sub-head-profile">Academics - Honors/Advanced Courses Taken</div>



<div class="container">
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subject-profile-subject-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>
	
	
	<table class="templateFrame grid" cellspacing="10">
	
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td>Subject</td>
			<td>Year Taken<!--<span class="required">*</span>--></td>
			<td>Honors/AP</td>
			
		</tr>
		
	</thead>	
	<!--End Table HEader -->
	
	<!--Start Table Content -->
	
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','Add Subject');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">	
		
		<tr class="templateContent" >  	
		
			<td>
				
				<?php echo  CHtml::dropDownList('SubjectProfile[{0}][subject_id]','', $subjectProfile->getSubject(),array('prompt'=>'Select Subject','class'=>'req')); ?>
				<?php $this->ErrorDiv('SubjectProfile_{0}_subject_idError','Subject'); ?>
			
			</td>												
			<td>
				
		<?php echo CHtml::dropDownList('SubjectProfile[{0}][year_taken]','',array(
                                                                         1=>'Freshmen',
                                                                         2=>'Sophomore',
                                                                         3=>'Junior',
                                                                         4=>'Senior',
                    ),array('prompt'=>'Year Taken','class'=>'req')); ?>
					
		<?php $this->ErrorDiv('SubjectProfile_{0}_year_takenError','Year'); ?>
			
			</td>
			<td>
			
                <?php echo CHtml::dropDownList('SubjectProfile[{0}][honors_or_AP]','',
                                                                        array(
                                                                        1=>'Honors',
                                                                         2=>'AP',
                                                                         3=>'College'),
                        array('prompt'=>'Level','class'=>'req')); ?>
			</td>				
					
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
		
	
	
	</textarea>
	
		
		
	
	
	</td > 
	</tr > 
	</tfoot>
	<!--End Table Content -->
	
	<!--Appended Rows addeded Here -->
	<tbody class="templateTarget">
	
	<?php
		$subj = SubjectProfile::getSubjectById();
		if(count($subj)){
	
	 ?>
	
		<?php for($i = 0 ; $i< count($subj);$i++){ ?>
	
			<tr class="templateContent">  	
		
			<td>
				
				<?php echo  CHtml::dropDownList('SubjectProfile[{'.$i.'}][subject_id]',$subj[$i]->subject_id, $subjectProfile->getSubject(),array('prompt'=>'Select Subject','class'=>'req')); ?>
				<?php $this->ErrorDiv('SubjectProfile_'.$i.'_subject_idError','Subject'); ?>
			
			</td>												
			<td>
				
		<?php echo CHtml::dropDownList('SubjectProfile[{'.$i.'}][year_taken]',$subj[$i]->year_taken,array(
																	   ''=>'Select Year taken',	
																		0=>'Freshman',
                                                                        1=>'Freshmen',
                                                                         2=>'Sophomore',
                                                                         3=>'Junior',
                                                                         4=>'Senior',
                    ),array('prompt'=>'Year Taken','class'=>'req')); ?>
		<?php $this->ErrorDiv('SubjectProfile_'.$i.'_year_takenError','Year'); ?>	
			</td>
			<td>
			
                <?php echo CHtml::dropDownList('SubjectProfile[{'.$i.'}][honors_or_AP]',$subj[$i]->honors_or_AP,  
                                                                        array(
                                                                        1=>'Honors',
                                                                         2=>'AP',
                                                                         3=>'College'),
                        array('prompt'=>'Level','class'=>'req')); ?>
			
			</td>	

					
			<td> 
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	<?php  } ?>
	<?php  }else { ?>
	
			<tr class="templateContent">  	
		
			<td>
				
				<?php echo  CHtml::dropDownList('SubjectProfile[{0}][subject_id]','', $subjectProfile->getSubject(),array('prompt'=>'Select Subject','class'=>'req')); ?>
				<?php $this->ErrorDiv('SubjectProfile_0_subject_idError','Subject'); ?>
			
			</td>												
			<td>
				
		<?php echo CHtml::dropDownList('SubjectProfile[{0}][year_taken]','',array(									
									1=>'Freshman',
                                                                        2=>'Sophomore',
                                                                        3=>'Junior',
                                                                        4=>'Senior',
                                                                        
                    ),array('prompt'=>'Year Taken','class'=>'req')); ?>
			<?php $this->ErrorDiv('SubjectProfile_0_year_takenError','Year'); ?>
			</td>
			<td>
			
                <?php echo CHtml::dropDownList('SubjectProfile[{0}][honors_or_AP]','',  array(
                                                                        1=>'Honors',
                                                                         2=>'AP',
                                                                         3=>'College'),
                        array('prompt'=>'Level','class'=>'req')); ?>
			
			</td>	

					
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
		
	
	<?php  } ?>
	</tbody>
	
	</table>
<br></br>
        <div class="span-3">
	
            <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/grades"')); ?>
	    </div>
        </div>
        <div class="span-3 last">
      <div class="buttons">
		<?php echo CHtml::submitButton('Next'); ?>
	</div>
</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<br></br>