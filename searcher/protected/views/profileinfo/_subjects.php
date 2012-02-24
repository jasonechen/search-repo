<?php 	
$this->progressbar();
$this->IncludeJsDynamicrows();?>
<div class="sub-head-profile">Academics - Subjects Studied</div>



<div class="container">
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subject-profile-subject-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>
	
	
	<table class="templateFrame grid" cellspacing="0">
	
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td>Subject</td>
			<td>Year Taken</td>
			<td>Honors/AP</td>
			<td>Number of months</td>
		</tr>
		
	</thead>	
	<!--End Table HEader -->
	
	<!--Start Table Content -->
	
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','New');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
		
			<td>
				
				<?php echo  CHtml::dropDownList('SubjectProfile[{0}][subject_id]','', $subjectProfile->getSubject(),array('prompt'=>'Select Subject','class'=>'req')); ?>
				<?php $this->ErrorDiv('SubjectProfile_{0}_subject_idError','Subject'); ?>
			
			</td>												
			<td>
				
		<?php echo CHtml::dropDownList('SubjectProfile[{0}][year_taken]','',array(0=>'Freshman',
                                                                        1=>'Sophomore',
                                                                         2=>'Junior',
                                                                         3=>'Senior',
                                                                         4=>'After 4th year',
                    )); ?>
			
			
			</td>
			<td>
			
                <?php echo CHtml::dropDownList('SubjectProfile[{0}][honors_or_AP]','',  array(0=>'',
                                                                        1=>'Honors',
                                                                         2=>'AP')); ?>
			
			</td>	
			<td>
			
			
                <?php echo CHtml::dropDownList('SubjectProfile[{0}][num_months]','',  array(0=>'',
                                                                        1=>'1',
                                                                        2=>'2',
                                                                        3=>'3',
                                                                        4=>'4',
                                                                        5=>'5',
                                                                        6=>'6',
                                                                        7=>'7',
                                                                        8=>'8',
                                                                        9=>'9',
                                                                        10=>'10',
                                                                        11=>'11',
                                                                        12=>'12',
                    
                    )); ?>
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
				
		<?php echo CHtml::dropDownList('SubjectProfile[{'.$i.'}][year_taken]',$subj[$i]->year_taken,array(0=>'Freshman',
                                                                        1=>'Sophomore',
                                                                         2=>'Junior',
                                                                         3=>'Senior',
                                                                         4=>'After 4th year',
                    )); ?>
			
			</td>
			<td>
			
                <?php echo CHtml::dropDownList('SubjectProfile[{'.$i.'}][honors_or_AP]',$subj[$i]->honors_or_AP,  array(0=>'',
                                                                        1=>'Honors',
                                                                         2=>'AP')); ?>
			
			</td>	
			<td>
			
			
                <?php echo CHtml::dropDownList('SubjectProfile[{'.$i.'}][num_months]',$subj[$i]->num_months,  array(0=>'',
                                                                        1=>'1',
                                                                        2=>'2',
                                                                        3=>'3',
                                                                        4=>'4',
                                                                        5=>'5',
                                                                        6=>'6',
                                                                        7=>'7',
                                                                        8=>'8',
                                                                        9=>'9',
                                                                        10=>'10',
                                                                        11=>'11',
                                                                        12=>'12',
                    
                    )); ?>
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
				
		<?php echo CHtml::dropDownList('SubjectProfile[{0}][year_taken]','',array(0=>'Freshman',
                                                                        1=>'Sophomore',
                                                                         2=>'Junior',
                                                                         3=>'Senior',
                                                                         4=>'After 4th year',
                    )); ?>
			
			</td>
			<td>
			
                <?php echo CHtml::dropDownList('SubjectProfile[{0}][honors_or_AP]','',  array(0=>'',
                                                                        1=>'Honors',
                                                                         2=>'AP')); ?>
			
			</td>	
			<td>
			
			
                <?php echo CHtml::dropDownList('SubjectProfile[{0}][num_months]','',  array(0=>'',
                                                                        1=>'1',
                                                                        2=>'2',
                                                                        3=>'3',
                                                                        4=>'4',
                                                                        5=>'5',
                                                                        6=>'6',
                                                                        7=>'7',
                                                                        8=>'8',
                                                                        9=>'9',
                                                                        10=>'10',
                                                                        11=>'11',
                                                                        12=>'12',
                    
                    )); ?>
			</td>
					
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
		
	
	<?php  } ?>
	</tbody>
	
	</table>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/grades"')); ?>
		<?php echo CHtml::submitButton('Next'); ?>
	</div>

	
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>