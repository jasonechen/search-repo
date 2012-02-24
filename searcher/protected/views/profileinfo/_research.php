
<div class="sub-head-profile">Extracurriculars - Research </div>
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
						<td><?php echo $form->labelEx($researchProfile,'subject',array('label'=>'Research Subject')); ?></td>
						<td><?php echo $form->labelEx($researchProfile,'field',array('label'=>'Research Field')); ?></td>
						<td><?php echo $form->labelEx($researchProfile,'year_begin',array('label'=>'From')); ?></td>
					</thead>					
					<tr> 
						<td><?php echo  CHtml::textField('ResearchProfile[{0}][subject]',''); ?></td>
						<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][field]','', $researchProfile->getMajorOptions(),array('prompt'=>'Select Research Field')); ?></td>
						<td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_begin]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?></td>
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($researchProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->labelEx($researchProfile,'hours',array('label'=>'Hours/Week')); ?></td>						
					</thead>					

					<tr >
					<td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_end]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?></td>
					<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][hours]','', ResearchProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?></td>
					</tr>

					<thead>
						<td><?php echo $form->labelEx($researchProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td><?php echo  CHtml::textField('ResearchProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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
	<?php $research = ResearchProfile::getResearchByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($research)){ ?>
		<?php for($i = 0 ; $i< count($research); $i++){ ?>
				
				<tr class="templateContent">  	
			<td>			
				<table width="200"   height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead"> 
						<td><?php echo $form->labelEx($researchProfile,'subject',array('label'=>'Research Subject')); ?></td>
						<td><?php echo $form->labelEx($researchProfile,'field',array('label'=>'Research Field')); ?></td>
						<td><?php echo $form->labelEx($researchProfile,'year_begin',array('label'=>'From')); ?></td>
					</thead>					
					<tr> 
						<td><?php echo  CHtml::textField('ResearchProfile[{'.$i.'}][subject]',$research[$i]->subject); ?></td>
						<td><?php echo  CHtml::dropDownList('ResearchProfile[{'.$i.'}][field]',$research[$i]->field, $researchProfile->getMajorOptions(),array('prompt'=>'Select Research Field')); ?></td>
						<td><?php echo  CHtml::dropdownList('ResearchProfile[{'.$i.'}][year_begin]',$research[$i]->year_begin,ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?></td>
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($researchProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->labelEx($researchProfile,'hours',array('label'=>'Hours/Week')); ?></td>						
					</thead>					

					<tr >
					<td><?php echo  CHtml::dropdownList('ResearchProfile[{'.$i.'}][year_end]',$research[$i]->year_end,ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?></td>
					<td><?php echo  CHtml::dropDownList('ResearchProfile[{'.$i.'}][hours]',$research[$i]->hours, ResearchProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?></td>
					</tr>

					<thead>
						<td><?php echo $form->labelEx($researchProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td><?php echo  CHtml::textField('ResearchProfile[{'.$i.'}][comments]',$research[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>
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
						<td><?php echo $form->labelEx($researchProfile,'subject',array('label'=>'Research Subject')); ?></td>
						<td><?php echo $form->labelEx($researchProfile,'field',array('label'=>'Research Field')); ?></td>
						<td><?php echo $form->labelEx($researchProfile,'year_begin',array('label'=>'From')); ?></td>
					</thead>					
					<tr> 
						<td><?php echo  CHtml::textField('ResearchProfile[{0}][subject]',''); ?></td>
						<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][field]','', $researchProfile->getMajorOptions(),array('prompt'=>'Select Research Field')); ?></td>
						<td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_begin]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?></td>
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($researchProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->labelEx($researchProfile,'hours',array('label'=>'Hours/Week')); ?></td>						
					</thead>					

					<tr >
					<td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_end]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?></td>
					<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][hours]','', ResearchProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?></td>
					</tr>

					<thead>
						<td><?php echo $form->labelEx($researchProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td><?php echo  CHtml::textField('ResearchProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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