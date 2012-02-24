<?php 	
	$this->progressbar('EC','clubs'); 
	$this->IncludeJsDynamicrows(); 
?>
<div class="sub-head-profile">Extracurriculars - Clubs </div>

<div>
	 <?php if(Yii::app()->user->hasFlash('activitySuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('activitySuccess'); ?> 
        </div> <?php endif; ?> 
    <div class="form">
    
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-profile-activity-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>

<table class="templateFrame grid" width="100%" cellspacing="0" cellspacing="0">
	
	<tfoot> 				
	<tr>  
	<td colspan="3"> 
	<div class="add" style="margin:5px 0;"><?php echo Yii::t('ui','New');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;"> 	
		
		<tr class="templateContent">   	
			<td>			
				<table width="100%" height="100" style="border:#459E00 1px solid; background:#D2F4D3;padding:10px;">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($activityProfile,'name',array('label'=>'Name')); ?> </td>
						<td><?php echo $form->labelEx($activityProfile,'activity_type_id',array('label'=>'Club Type')); ?></td>						
						<td><?php echo $form->labelEx($activityProfile,'leadership',array('label'=>'Leadership')); ?></td>
						<td></td>					
					</thead>
					
					<tr>
						<td>
							<?php echo CHtml::textField('ActivityProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('ActivityProfile_{0}_nameError','Name'); ?>
						</td>
						<td>
						 <?php echo CHtml::dropDownList('ActivityProfile[{0}][activity_type_id]','', $activityProfile->getActivityTypeOptions(),array('prompt'=>'Club Type','class'=>'req')); ?>
						 <?php $this->ErrorDiv('ActivityProfile_{0}_activity_type_idError','Type'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('ActivityProfile[{0}][leadership]','', ActivityProfile::$LeadershipArray,array('prompt'=>'Leadership Position')); ?></td>
						<td></td>
					</tr>
					<thead class="templateHead">
						<td><?php echo $form->labelEx($activityProfile,'year_participate_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($activityProfile,'year_participate_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($activityProfile,'hours_per_week',array('label'=>'Hours/Week')); ?></td>					
						<td></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::dropdownList('ActivityProfile[{0}][year_participate_begin]','',ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
							 <?php $this->ErrorDiv('ActivityProfile_{0}_year_participate_beginError','From'); ?>
						</td>						
						<td><?php echo CHtml::dropdownList('ActivityProfile[{0}][year_participate_end]','',ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							 <?php $this->ErrorDiv('ActivityProfile_{0}_year_participate_endError','To'); ?>
						</td>
						<td> <?php echo CHtml::dropDownList('ActivityProfile[{0}][hours_per_week]','', ActivityProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?></td>
						<td></td>
						
					</tr>
					<thead>
							<td colspan="4"><?php echo $form->labelEx($activityProfile,'comments',array('label'=>'Notes')); ?></td>
					</thead>
					<tr>
							<td colspan="4"><?php echo CHtml::textField('ActivityProfile[{0}][comments]','',array('size'=>150,'maxlength'=>100)); ?></td>
					</tr>
					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
			<td>&nbsp;</td>							
			<td class="remove"> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	
	</textarea>
	
	
	</td > 
	</tr> 
	</tfoot>
	<!--End Table Content -->
	<?php $activity = ActivityProfile::getActivityByUser(); ?>
	<tbody class="templateTarget">
		<?php if(count($activity)){ ?>
			<?php for($i = 0 ; $i< count($activity); $i++){ ?>
				
					<tr class="templateContent">  	
			<td>			
				<table width="100%" height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead">
						<td><?php echo $form->labelEx($activityProfile,'name',array('label'=>'Name')); ?> </td>
						<td><?php echo $form->labelEx($activityProfile,'activity_type_id',array('label'=>'Club Type')); ?></td>						
						<td><?php echo $form->labelEx($activityProfile,'leadership',array('label'=>'Leadership')); ?></td>
						<td></td>					
					</thead>
					
					<tr>
						<td>
						<?php echo CHtml::textField('ActivityProfile[{'.$i.'}][name]',$activity[$i]->name,array('class'=>'req')); ?>
						<?php $this->ErrorDiv('ActivityProfile_'.$i.'_nameError','Name'); ?>
						</td>
						<td> <?php echo CHtml::dropDownList('ActivityProfile[{'.$i.'}][activity_type_id]',$activity[$i]->activity_type_id, $activityProfile->getActivityTypeOptions(),array('prompt'=>'Club Type','class'=>'req')); ?>
						 <?php $this->ErrorDiv('ActivityProfile_'.$i.'_activity_type_idError','Type'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('ActivityProfile[{'.$i.'}][leadership]',$activity[$i]->leadership, ActivityProfile::$LeadershipArray,array('prompt'=>'Leadership Position')); ?></td>
						<td></td>
					</tr>
					<thead class="templateHead">
						<td><?php echo $form->labelEx($activityProfile,'year_participate_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($activityProfile,'year_participate_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($activityProfile,'hours_per_week',array('label'=>'Hours/Week')); ?></td>
						<td></td>						
					</thead>					
					<tr>
						<td><?php echo CHtml::dropdownList('ActivityProfile[{'.$i.'}][year_participate_begin]',$activity[$i]->year_participate_begin,ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req  from')); ?>
							<?php $this->ErrorDiv('ActivityProfile_'.$i.'_year_participate_beginError','From'); ?>
						</td>						
						<td><?php echo CHtml::dropdownList('ActivityProfile[{'.$i.'}][year_participate_end]',$activity[$i]->year_participate_end,ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							 <?php $this->ErrorDiv('ActivityProfile_'.$i.'_year_participate_endError','To'); ?>
						</td>
						<td> <?php echo CHtml::dropDownList('ActivityProfile[{'.$i.'}][hours_per_week]',$activity[$i]->hours_per_week, ActivityProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?></td>
						<td></td>
						
					</tr>
					<thead>
							<td colspan="4"><?php echo $form->labelEx($activityProfile,'comments',array('label'=>'Notes')); ?></td>
					</thead>
					<tr>
							<td colspan="4"><?php echo CHtml::textField('ActivityProfile[{'.$i.'}][comments]',$activity[$i]->comments,array('size'=>150,'maxlength'=>100)); ?></td>
					</tr>
					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
			<td>&nbsp;</td>							
			<td class="remove"> 
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
				
			<?php } ?>
		<?php }else { ?>
		
			<tr class="templateContent">  	
			<td>			
				<table width="100%" height="100" style="border:#459E00 1px solid; background:#D2F4D3;padding:10px;">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($activityProfile,'name',array('label'=>'Name')); ?> </td>
						<td><?php echo $form->labelEx($activityProfile,'activity_type_id',array('label'=>'Club Type')); ?></td>						
						<td><?php echo $form->labelEx($activityProfile,'leadership',array('label'=>'Leadership')); ?></td>
						<td></td>					
					</thead>
					
					<tr>
						<td>
							<?php echo CHtml::textField('ActivityProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('ActivityProfile_0_nameError','Name'); ?>
						</td>
						<td>
						 <?php echo CHtml::dropDownList('ActivityProfile[{0}][activity_type_id]','', $activityProfile->getActivityTypeOptions(),array('prompt'=>'Club Type','class'=>'req')); ?>
						  <?php $this->ErrorDiv('ActivityProfile_0_activity_type_idError','Type'); ?>
						</td>
						<td><?php echo CHtml::dropDownList('ActivityProfile[{0}][leadership]','', ActivityProfile::$LeadershipArray,array('prompt'=>'Leadership Position')); ?></td>
						<td></td>
					</tr>
					<thead class="templateHead">
						<td><?php echo $form->labelEx($activityProfile,'year_participate_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->labelEx($activityProfile,'year_participate_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($activityProfile,'hours_per_week',array('label'=>'Hours/Week')); ?></td>					
						<td></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::dropdownList('ActivityProfile[{0}][year_participate_begin]','',ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
							 <?php $this->ErrorDiv('ActivityProfile_{0}_year_participate_beginError','From'); ?>
						</td>						
						<td><?php echo CHtml::dropdownList('ActivityProfile[{0}][year_participate_end]','',ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							 <?php $this->ErrorDiv('ActivityProfile_{0}_year_participate_endError','To'); ?>
						</td>
						<td> <?php echo CHtml::dropDownList('ActivityProfile[{0}][hours_per_week]','', ActivityProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?></td>
						<td></td>
						
					</tr>
					<thead>
							<td colspan="4"><?php echo $form->labelEx($activityProfile,'comments',array('label'=>'Notes')); ?></td>
					</thead>
					<tr>
							<td colspan="4"><?php echo CHtml::textField('ActivityProfile[{0}][comments]','',array('size'=>150,'maxlength'=>100)); ?></td>
					</tr>
					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
			<td>&nbsp;</td>								
			<td class="remove"> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
		
		<?php } ?>	
	</tbody>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/ap"')); ?>
		<?php echo CHtml::submitButton('Next'); ?>
	</div>


  
<?php $this->endWidget(); ?>
        </div>
</div>