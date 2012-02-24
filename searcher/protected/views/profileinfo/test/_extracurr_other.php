<?php 	$this->IncludeJsDynamicrows(); ?>
<div class="sub-head-profile">Extracurriculars - Other</div>

<div class="form">
		<table class="templateFrame grid" width="100%" cellspacing="0">
	
	<tfoot> 				
	<tr>  
	<td colspan="3"> 
	<div class="add" style="margin:5px 0;"><?php echo Yii::t('ui','New');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
			<td>			
				<table width="100%" height="100" style="border:#459E00 1px solid; background:#D2F4D3;padding:10px;" >
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($otherProfile,'name',array('label'=>'Other Activity')); ?></td>
						<td><?php echo $form->labelEx($otherProfile,'year_begin',array('label'=>'From')); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('OtherProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('OtherProfile_{0}_nameError','Name'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('OtherProfile[{0}][year_begin]','',OtherProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('OtherProfile_0_year_beginError','From'); ?>
						</td> 						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($otherProfile,'year_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($otherProfile,'comments',array('label'=>'Description')); ?></td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('OtherProfile[{0}][year_end]','',OtherProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('OtherProfile_0_year_endError','To'); ?>
						</td>
						<td><?php echo CHtml::textField('OtherProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
					</tr>

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
	</tr > 
	</tfoot>
	<!--End Table Content -->
	<?php $extra = OtherProfile::getOtherByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($extra)){ ?>
		<?php for($i = 0 ; $i< count($extra); $i++){ ?>
			
					<tr class="templateContent">  	
			<td>			
				<table width="100%" height="100" style="border:#459E00 1px solid; background:#D2F4D3;padding:10px;">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($otherProfile,'name',array('label'=>'Other Activity')); ?></td>
						<td><?php echo $form->labelEx($otherProfile,'year_begin',array('label'=>'From')); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('OtherProfile[{'.$i.'}][name]',$extra[$i]->name,array('class'=>'req')); ?>
							<?php $this->ErrorDiv('OtherProfile_'.$i.'_nameError','Name'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('OtherProfile[{'.$i.'}][year_begin]',$extra[$i]->year_begin,OtherProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
								<?php $this->ErrorDiv('OtherProfile_'.$i.'_year_beginError','From'); ?>
						</td> 						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($otherProfile,'year_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($otherProfile,'comments',array('label'=>'Description')); ?></td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('OtherProfile[{'.$i.'}][year_end]',$extra[$i]->year_end,OtherProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('OtherProfile_'.$i.'_year_endError','To'); ?>
						</td>
						<td><?php echo CHtml::textField('OtherProfile[{'.$i.'}][comments]',$extra[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>
					</tr>

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
						<td><?php echo $form->labelEx($otherProfile,'name',array('label'=>'Other Activity')); ?></td>
						<td><?php echo $form->labelEx($otherProfile,'year_begin',array('label'=>'From')); ?></td>
					</thead>					
					<tr>
						<td><?php echo CHtml::textField('OtherProfile[{0}][name]','',array('class'=>'req')); ?>
							<?php $this->ErrorDiv('OtherProfile_0_nameError','Name'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('OtherProfile[{0}][year_begin]','',OtherProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('OtherProfile_0_year_beginError','From'); ?>
						</td> 						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($otherProfile,'year_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->labelEx($otherProfile,'comments',array('label'=>'Description')); ?></td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('OtherProfile[{0}][year_end]','',OtherProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('OtherProfile_0_year_endError','To'); ?>
						</td>
						<td><?php echo CHtml::textField('OtherProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
					</tr>

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

	

</div><!-- form -->
