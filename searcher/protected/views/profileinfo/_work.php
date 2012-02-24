
<div class="sub-head-profile">Extracurriculars - Work </div>
<div class="container">
<div class="form">
    <div class="span-18 last">


	<table class="templateFrame grid" cellspacing="0">
	
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','New');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
			<td>			
				<table width="200"   height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($workProfile,'name',array('label'=>'Job')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'work_type',array('label'=>'Work Type/Area')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'title'); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_nameError','Name'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('WorkProfile[{0}][work_type]','', WorkProfile::$WorkTypeArray,array('prompt'=>'Select Work Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_work_typeError','Type'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][title]','',WorkProfile::$TitleArray,array('prompt'=>'Enter Work Title')); ?></td> 						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($workProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'year_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'hours',array('label'=>'Hours/Week')); ?></td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_begin]','',WorkProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_year_beginError','From'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_end]','',WorkProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_{0}_year_endError','To'); ?>
						</td>
						<td> <?php echo CHtml::dropDownList('WorkProfile[{0}][hours]','', WorkProfile::$HoursArray,array('prompt'=>'Enter Hours Worked per Week','class'=>'req')); ?>
						
							<?php $this->ErrorDiv('WorkProfile_{0}_hoursError','Hours'); ?>
						</td>
					</tr>

					<thead>
						<td><?php echo $form->labelEx($workProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
						
					</thead>
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>				
					</tr>
					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
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
	<?php $work = WorkProfile::getWorkByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($work)){ ?>
		<?php for($i = 0 ; $i< count($work); $i++){ ?>
			
				<tr class="templateContent">  	
			<td>			
				<table width="200"   height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($workProfile,'name',array('label'=>'Job')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'work_type',array('label'=>'Work Type/Area')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'title'); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{'.$i.'}][name]',$work[$i]->name,array('class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_nameError','Name'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('WorkProfile[{'.$i.'}][work_type]',$work[$i]->work_type, WorkProfile::$WorkTypeArray,array('prompt'=>'Select Work Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_work_typeError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{'.$i.'}][title]',$work[$i]->title,WorkProfile::$TitleArray,array('prompt'=>'Enter Work Title')); ?></td> 						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($workProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'year_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'hours',array('label'=>'Hours/Week')); ?></td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('WorkProfile[{'.$i.'}][year_begin]',$work[$i]->year_begin,WorkProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{'.$i.'}][year_end]',$work[$i]->year_end,WorkProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_year_endError','To'); ?>
						</td>
						<td> <?php echo CHtml::dropDownList('WorkProfile[{'.$i.'}][hours]',$work[$i]->hours, WorkProfile::$HoursArray,array('prompt'=>'Enter Hours Worked per Week','class'=>'req')); ?>
						
							<?php $this->ErrorDiv('WorkProfile_'.$i.'_hoursError','Hours'); ?>
						</td>
					</tr>

					<thead>
						<td><?php echo $form->labelEx($workProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
						
					</thead>
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{'.$i.'}][comments]',$work[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>				
					</tr>
					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
			<td> 
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
			

		<?php } ?>
	<?php }else { ?>	
			
					<tr class="templateContent">  	
			<td>			
				<table width="200"   height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($workProfile,'name',array('label'=>'Job')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'work_type',array('label'=>'Work Type/Area')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'title'); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_nameError','Name'); ?>

						</td>
						<td><?php echo CHtml::dropDownList('WorkProfile[{0}][work_type]','', WorkProfile::$WorkTypeArray,array('prompt'=>'Select Work Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_work_typeError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][title]','',WorkProfile::$TitleArray,array('prompt'=>'Enter Work Title')); ?></td> 						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($workProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'year_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($workProfile,'hours',array('label'=>'Hours/Week')); ?></td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_begin]','',WorkProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('WorkProfile[{0}][year_end]','',WorkProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('WorkProfile_0_year_endError','To'); ?>
						</td>
						<td> <?php echo CHtml::dropDownList('WorkProfile[{0}][hours]','', WorkProfile::$HoursArray,array('prompt'=>'Enter Hours Worked per Week','class'=>'req')); ?>
						
							<?php $this->ErrorDiv('WorkProfile_0_hoursError','Hours'); ?>
						</td>
					</tr>

					<thead>
						<td><?php echo $form->labelEx($workProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
						
					</thead>
					<tr>
						<td><?php echo CHtml::textField('WorkProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>				
					</tr>
					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	

							
	<?php } ?>		
	</tbody>
	
	</table>

</div><!-- form -->
</div>
</div>