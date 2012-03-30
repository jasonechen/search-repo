<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 	
$this->IncludeJsDynamicrows(); 
?>
<div class="sub-head-profile-edit">Extracurriculars - Volunteer / Community Service </div>

<div class="container">
	
	<?php if(Yii::app()->user->hasFlash('volunteerSuccess')):?> 
	<div class="successMessage" id="inputsuccess"> 
	<?php echo Yii::app()->user->getFlash('volunteerSuccess'); ?> 
	</div> <?php endif; ?>  
	
<div class="form">
    <div class="span-18 last">


        <div class="form">
<?php 
  //      $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'volunteer-profile-volunteer-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>
            
            
	<table class="templateFrame grid" cellspacing="0">
	
	<tfoot> 				
	<tr >  
	<td  colspan="3"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Volunteer Activity');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
			<td>			
		<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($volunteerProfile,'name',array('label'=>'Organization Name')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'volunteertype_id',array('label'=>'Service Type')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'leadership'); ?></td>	
						<td><?php echo $form->label($volunteerProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'year_end',array('label'=>'To')); ?></td>
                                </thead>					
					<tr> 
						<td><?php echo CHtml::textField('VolunteerProfile[{0}][name]',''); ?></td>
						<td>  <?php echo CHtml::dropDownList('VolunteerProfile[{0}][volunteertype_id]','', VolunteerProfile::$VolunteerTypeArray,array('prompt'=>'Select Service Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_volunteertype_idError','Type'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][leadership]','',VolunteerProfile::$LeadershipArray,array('prompt'=>'Enter Participation Level','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_leadershipError','Leadership'); ?>
						</td>	
                                                						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_begin]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
						<?php $this->ErrorDiv('VolunteerProfile_{0}_year_beginError','From'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_end]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_year_endError','To'); ?>
						</td>
					</tr>
					
					<thead class="templateHead">

                                    <td> <?php echo $form->label($volunteerProfile,'hours',array('label'=>'Hours/Week')); ?></td>	
                                    <td><?php echo $form->label($volunteerProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
                                </thead>					

					<tr >

						<td><?php echo CHtml::dropDownList('VolunteerProfile[{0}][hours]','', VolunteerProfile::$HoursArray,array('prompt'=>'Enter Hours','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_{0}_hoursError','Hours'); ?>
                                                    <td colspan="3"><?php echo CHtml::textField('VolunteerProfile[{0}][comments]','',array('size'=>80,'maxlength'=>80)); ?></td>
						</td>	
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
	<?php $volunteer = VolunteerProfile::getVolunteerByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($volunteer)){ ?>
		<?php for($i = 0 ; $i< count($volunteer); $i++){ ?>
				<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($volunteerProfile,'name',array('label'=>'Organization Name')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'volunteertype_id',array('label'=>'Service Type')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'leadership'); ?></td>	
                        <td><?php echo $form->label($volunteerProfile,'year_begin',array('label'=>'From')); ?></td>
						<td> <?php echo $form->label($volunteerProfile,'year_end',array('label'=>'To')); ?></td>	
					</thead>					
					<tr> 
						<td><?php echo CHtml::textField('VolunteerProfile[{'.$i.'}][name]',$volunteer[$i]->name); ?></td>
						<td>  <?php echo CHtml::dropDownList('VolunteerProfile[{'.$i.'}][volunteertype_id]',$volunteer[$i]->volunteertype_id, VolunteerProfile::$VolunteerTypeArray,array('prompt'=>'Select Service Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_volunteertype_idError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{'.$i.'}][leadership]',$volunteer[$i]->leadership,VolunteerProfile::$LeadershipArray,array('prompt'=>'Enter Participation Level','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_leadershipError','Leadership'); ?>
						</td>	
                                                <td><?php echo CHtml::dropdownList('VolunteerProfile[{'.$i.'}][year_begin]',$volunteer[$i]->year_begin,VolunteerProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{'.$i.'}][year_end]',$volunteer[$i]->year_end,VolunteerProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_year_endError','To'); ?>
						</td>
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->label($volunteerProfile,'year_begin',array('label'=>'Hours/Week')); ?></td>
                        <td><?php echo $form->label($volunteerProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
						
					</thead>					

					<tr >
						
						<td><?php echo CHtml::dropDownList('VolunteerProfile[{'.$i.'}][hours]',$volunteer[$i]->hours, VolunteerProfile::$HoursArray,array('prompt'=>'Enter Hours','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_'.$i.'_hoursError','Hours'); ?>
						</td>	
                                                <td colspan="3"><?php echo CHtml::textField('VolunteerProfile[{'.$i.'}][comments]',$volunteer[$i]->comments,array('size'=>80,'maxlength'=>80)); ?></td>
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
						<td><?php echo $form->label($volunteerProfile,'name',array('label'=>'Organization Name')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'volunteertype_id',array('label'=>'Service Type')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'leadership'); ?></td>	
                        <td><?php echo $form->label($volunteerProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($volunteerProfile,'year_end',array('label'=>'To')); ?></td>
					</thead>					
					<tr> 
						<td><?php echo CHtml::textField('VolunteerProfile[{0}][name]',''); ?></td>
						<td>  <?php echo CHtml::dropDownList('VolunteerProfile[{0}][volunteertype_id]','', VolunteerProfile::$VolunteerTypeArray,array('prompt'=>'Select Service Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_volunteertype_idError','Type'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][leadership]','',VolunteerProfile::$LeadershipArray,array('prompt'=>'Enter Participation Level','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_leadershipError','Leadership'); ?>
						</td>
                                                <td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_begin]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('VolunteerProfile[{0}][year_end]','',VolunteerProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_year_endError','To'); ?>

						</td>
					</tr>
					
					<thead class="templateHead">
						
						<td> <?php echo $form->label($volunteerProfile,'hours',array('label'=>'Hours/week')); ?></td>
                                                 <td><?php echo $form->label($volunteerProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>					

					<tr >

						<td><?php echo CHtml::dropDownList('VolunteerProfile[{0}][hours]','', VolunteerProfile::$HoursArray,array('prompt'=>'Enter Hours','class'=>'req')); ?>
							<?php $this->ErrorDiv('VolunteerProfile_0_hoursError','Hours'); ?>
						</td>	
                                                <td colspan="3"><?php echo CHtml::textField('VolunteerProfile[{0}][comments]','',array('size'=>80,'maxlength'=>80)); ?></td>
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