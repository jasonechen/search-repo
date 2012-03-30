<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 	
$this->IncludeJsDynamicrows(); 
?>
<div class="sub-head-profile-edit">Extracurriculars - Work </div>

<div class="container">
	
	<?php if(Yii::app()->user->hasFlash('workSuccess')):?> 
	<div class="successMessage" id="inputsuccess"> 
	<?php echo Yii::app()->user->getFlash('workSuccess'); ?> 
	</div> <?php endif; ?>  
	
<div class="form">
    <div class="span-18 last">


        <div class="form">
<?php 
  //      $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-profile-work-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>

	<table class="templateFrame grid" cellspacing="0">
	
	<tfoot> 				
	<tr >  
	<td  colspan="3"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Job');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($workProfile,'name',array('label'=>'Job')); ?></td>
						<td><?php echo $form->label($workProfile,'work_type',array('label'=>'Work Type/Area')); ?></td>
						<td><?php echo $form->label($workProfile,'title'); ?></td>
                        <td><?php echo $form->label($workProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($workProfile,'year_end',array('label'=>'To')); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_nameError','Name'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('WorkProfile[{0}][work_type]','', WorkProfile::$WorkTypeArray,array('prompt'=>'Select Work Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_work_typeError','Type'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][title]','',WorkProfile::$TitleArray,array('prompt'=>'Enter Work Title')); ?></td> 						
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_begin]','',WorkProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_year_beginError','From'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_end]','',WorkProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_year_endError','To'); ?>
						</td>					
                                        </tr>
					
					<thead class="templateHead">

						<td><?php echo $form->label($workProfile,'hours',array('label'=>'Hours/Week')); ?></td>
                        <td><?php echo $form->label($workProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>					

					<tr >

						<td> <?php echo CHtml::dropDownList('WorkProfile[{0}][hours]','', WorkProfile::$HoursArray,array('prompt'=>'Enter Hours/Week','class'=>'req')); ?>
						
							<?php $this->ErrorDiv('WorkProfile_{0}_hoursError','Hours'); ?>
						</td>
                            <td colspan="3"><?php echo CHtml::textField('WorkProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>				
					</tr>


					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
			<td>&nbsp;</td>							
			<td class="rm"> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	
	</textarea>
	
	
	</td > 
	</tr > 
	</tfoot>
	<!--End Table Content -->
	<?php $work = WorkProfile::getWorkByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($work)){ ?>
		<?php for($i = 0 ; $i< count($work); $i++){ ?>
			
				<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($workProfile,'name',array('label'=>'Job')); ?></td>
						<td><?php echo $form->label($workProfile,'work_type',array('label'=>'Work Type/Area')); ?></td>
						<td><?php echo $form->label($workProfile,'title'); ?></td>
                        <td><?php echo $form->label($workProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($workProfile,'year_end',array('label'=>'To')); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{'.$i.'}][name]',$work[$i]->name,array('class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_nameError','Name'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('WorkProfile[{'.$i.'}][work_type]',$work[$i]->work_type, WorkProfile::$WorkTypeArray,array('prompt'=>'Select Work Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_work_typeError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{'.$i.'}][title]',$work[$i]->title,WorkProfile::$TitleArray,array('prompt'=>'Enter Work Title')); ?></td> 						
						<td><?php echo CHtml::dropdownList('WorkProfile[{'.$i.'}][year_begin]',$work[$i]->year_begin,WorkProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{'.$i.'}][year_end]',$work[$i]->year_end,WorkProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_year_endError','To'); ?>
						</td>
                                        </tr>
					
					<thead class="templateHead">

						<td><?php echo $form->label($workProfile,'hours',array('label'=>'Hours/Week')); ?></td>
                        <td><?php echo $form->label($workProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>					

					<tr >

						<td> <?php echo CHtml::dropDownList('WorkProfile[{'.$i.'}][hours]',$work[$i]->hours, WorkProfile::$HoursArray,array('prompt'=>'Enter Hours/Week','class'=>'req')); ?>
						
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_hoursError','Hours'); ?>
						</td>
                                                <td colspan="3"><?php echo CHtml::textField('WorkProfile[{'.$i.'}][comments]',$work[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>				
					</tr>


					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
			<td>&nbsp;</td>							
			<td class="rm"> 
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
			

		<?php } ?>
	<?php }else { ?>	
			
					<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($workProfile,'name',array('label'=>'Job')); ?></td>
						<td><?php echo $form->label($workProfile,'work_type',array('label'=>'Work Type/Area')); ?></td>
						<td><?php echo $form->label($workProfile,'title'); ?></td>
						<td><?php echo $form->label($workProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($workProfile,'year_end',array('label'=>'To')); ?></td>                                                
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_nameError','Name'); ?>

						</td>
						<td><?php echo CHtml::dropDownList('WorkProfile[{0}][work_type]','', WorkProfile::$WorkTypeArray,array('prompt'=>'Select Work Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_work_typeError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][title]','',WorkProfile::$TitleArray,array('prompt'=>'Enter Work Title')); ?></td> 						
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_begin]','',WorkProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_end]','',WorkProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_year_endError','To'); ?>
						</td>
                                        </tr>
					
					<thead class="templateHead">

						<td><?php echo $form->label($workProfile,'hours',array('label'=>'Hours/Week')); ?></td>
                        <td><?php echo $form->label($workProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>					

					<tr >

						<td> <?php echo CHtml::dropDownList('WorkProfile[{0}][hours]','', WorkProfile::$HoursArray,array('prompt'=>'Enter Hours/Week','class'=>'req')); ?>
						
							<?php $this->ErrorDiv('WorkProfile_0_hoursError','Hours'); ?>
						</td>
                                                <td colspan="3"><?php echo CHtml::textField('WorkProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>				
					</tr>


					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
			<td>&nbsp;</td>							
			<td class="rm"> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	

							
	<?php } ?>		
	</tbody>
	
	</table>
<br></br>
  
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Update'); ?>
	</div>
        
        </div>



<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
</div>
<br></br><br></br>    