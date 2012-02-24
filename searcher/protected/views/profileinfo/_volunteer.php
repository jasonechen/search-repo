
<div class="sub-head-profile">Extracurriculars - Volunteer </div>
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
						<td><?php echo $form->labelEx($volunteerProfile,'name',array('label'=>'Organization Name')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'volunteertype_id',array('label'=>'Service Type')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'leadership'); ?></td>	
					</thead>					
					<tr> 
						<td><?php echo CHtml::textField('VolunteerProfile[{0}][name]',''); ?></td>
						<td>  <?php echo CHtml::dropDownList('VolunteerProfile[{0}][volunteertype_id]','', VolunteerProfile::$VolunteerTypeArray,array('prompt'=>'Select Service Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_volunteertype_idError','Type'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][leadership]','',VolunteerProfile::$LeadershipArray,array('prompt'=>'Enter Leadership/Participation','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_leadershipError','Leadership'); ?>
						</td>							
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($volunteerProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->labelEx($volunteerProfile,'hours',array('label'=>'Hours/Week')); ?></td>	
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_begin]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req')); ?>
						<?php $this->ErrorDiv('VolunteerProfile_{0}_year_beginError','From'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_end]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_year_endError','To'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('VolunteerProfile[{0}][hours]','', VolunteerProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_hoursError','Hours/week'); ?>
						</td>	
					</tr>

					<thead>
						<td><?php echo $form->labelEx($volunteerProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td><?php echo CHtml::textField('VolunteerProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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
	<?php $volunteer = VolunteerProfile::getVolunteerByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($volunteer)){ ?>
		<?php for($i = 0 ; $i< count($volunteer); $i++){ ?>
				<tr class="templateContent">  	
			<td>			
				<table width="200"   height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($volunteerProfile,'name',array('label'=>'Organization Name')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'volunteertype_id',array('label'=>'Service Type')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'leadership'); ?></td>	
					</thead>					
					<tr> 
						<td><?php echo CHtml::textField('VolunteerProfile[{'.$i.'}][name]',$volunteer[$i]->name); ?></td>
						<td>  <?php echo CHtml::dropDownList('VolunteerProfile[{'.$i.'}][volunteertype_id]',$volunteer[$i]->volunteertype_id, VolunteerProfile::$VolunteerTypeArray,array('prompt'=>'Select Service Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_volunteertype_idError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{'.$i.'}][leadership]',$volunteer[$i]->leadership,VolunteerProfile::$LeadershipArray,array('prompt'=>'Enter Leadership/Participation','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_leadershipError','Leadership'); ?>
						</td>							
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($volunteerProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->labelEx($volunteerProfile,'hours',array('label'=>'Hours/Week')); ?></td>	
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{'.$i.'}][year_begin]',$volunteer[$i]->year_begin,VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{'.$i.'}][year_end]',$volunteer[$i]->year_end,VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_year_endError','To'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('VolunteerProfile[{'.$i.'}][hours]',$volunteer[$i]->hours, VolunteerProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_hoursError','Hours/week'); ?>
						</td>	
					</tr>

					<thead>
						<td><?php echo $form->labelEx($volunteerProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td><?php echo CHtml::textField('VolunteerProfile[{'.$i.'}][comments]',$volunteer[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>
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
						<td><?php echo $form->labelEx($volunteerProfile,'name',array('label'=>'Organization Name')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'volunteertype_id',array('label'=>'Service Type')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'leadership'); ?></td>	
					</thead>					
					<tr> 
						<td><?php echo CHtml::textField('VolunteerProfile[{0}][name]',''); ?></td>
						<td>  <?php echo CHtml::dropDownList('VolunteerProfile[{0}][volunteertype_id]','', VolunteerProfile::$VolunteerTypeArray,array('prompt'=>'Select Service Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_volunteertype_idError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][leadership]','',VolunteerProfile::$LeadershipArray,array('prompt'=>'Enter Leadership/Participation','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_leadershipError','Leadership'); ?>
						</td>							
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($volunteerProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($volunteerProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->labelEx($volunteerProfile,'hours',array('label'=>'Hours/Week')); ?></td>	
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_begin]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_end]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_year_endError','To'); ?>

						</td>
						<td><?php echo CHtml::dropDownList('VolunteerProfile[{0}][hours]','', VolunteerProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_hoursError','Hours/week'); ?>
						</td>	
					</tr>

					<thead>
						<td><?php echo $form->labelEx($volunteerProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td><?php echo CHtml::textField('VolunteerProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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