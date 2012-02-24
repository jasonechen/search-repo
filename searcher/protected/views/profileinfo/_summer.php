
<div class="sub-head-profile">Extracurriculars - Summer</div>
<div class="container summer">
    <div class="form">
    <div class="span-18 last">	<table class="templateFrame grid " cellspacing="0" >
	
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','New');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">   	
			<td>			
				<table width="200"   height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead">
						<td><?php echo $form->labelEx($summerProfile,'name',array('label'=>'Summer Activity Name')); ?> </td>
						<td><?php echo $form->labelEx($summerProfile,'summer_id',array('label'=>'Activity Type')); ?> </td>
						
					</thead>					
					<tr> 	
						<td><?php echo CHtml::textField('SummerProfile[{0}][name]',''); ?> </td>
						<td><?php echo CHtml::dropDownList('SummerProfile[{0}][summer_id]','', SummerProfile::$SummerTypeArray,array('prompt'=>'Select Summer Activity Type','class'=>'req')); ?> 
						<?php $this->ErrorDiv('SummerProfile_{0}_summer_idError','Type'); ?>

						</td>					
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($summerProfile,'summer_date',array('label'=>'Summer')); ?> </td>
						<td><?php echo $form->labelEx($summerProfile,'comments',array('label'=>'Notes/Comments')); ?> </td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('SummerProfile[{0}][summer_date]','',SummerProfile::$SummerDateArray,array('prompt'=>'Enter Summer Year','class'=>'req')); ?>
						<?php $this->ErrorDiv('SummerProfile_{0}_summer_dateError','Summer'); ?>
						 </td>
						<td><?php echo CHtml::textField('SummerProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?> </td>
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
	<?php $summer = SummerProfile::getSummerByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($summer)){ ?>
		<?php for($i = 0 ; $i< count($summer); $i++){ ?>
			
				<tr class="templateContent">  	
			<td>			
				<table width="200"   height="100" style="border:#459E00 1px solid; background:#D2F4D3">
					<thead class="templateHead">
						<td><?php echo $form->labelEx($summerProfile,'name',array('label'=>'Summer Activity Name')); ?> </td>
						<td><?php echo $form->labelEx($summerProfile,'summer_id',array('label'=>'Activity Type')); ?> </td>
						
					</thead>					
					<tr> 	
						<td><?php echo CHtml::textField('SummerProfile[{'.$i.'}][name]',$summer[$i]->name); ?> </td>
						<td><?php echo CHtml::dropDownList('SummerProfile[{'.$i.'}][summer_id]',$summer[$i]->summer_id, SummerProfile::$SummerTypeArray,array('prompt'=>'Select Summer Activity Type','class'=>'req')); ?>
							<?php $this->ErrorDiv('SummerProfile_'.$i.'_summer_idError','Type'); ?>
						 </td>					
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($summerProfile,'summer_date',array('label'=>'Summer')); ?> </td>
						<td><?php echo $form->labelEx($summerProfile,'comments',array('label'=>'Notes/Comments')); ?> </td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('SummerProfile[{'.$i.'}][summer_date]',$summer[$i]->summer_date,SummerProfile::$SummerDateArray,array('prompt'=>'Enter Summer Year','class'=>'req')); ?> 
						<?php $this->ErrorDiv('SummerProfile_'.$i.'_summer_dateError','Summer'); ?>
						</td>
						<td><?php echo CHtml::textField('SummerProfile[{'.$i.'}][comments]',$summer[$i]->comments,array('size'=>80,'maxlength'=>100)); ?> </td>
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
						<td><?php echo $form->labelEx($summerProfile,'name',array('label'=>'Summer Activity Name')); ?> </td>
						<td><?php echo $form->labelEx($summerProfile,'summer_id',array('label'=>'Activity Type')); ?> </td>
						
					</thead>					
					<tr> 	
						<td><?php echo CHtml::textField('SummerProfile[{0}][name]',''); ?> </td>
						<td><?php echo CHtml::dropDownList('SummerProfile[{0}][summer_id]','', SummerProfile::$SummerTypeArray,array('prompt'=>'Select Summer Activity Type','class'=>'req')); ?> 
							<?php $this->ErrorDiv('SummerProfile_0_summer_idError','Type'); ?>

						</td>					
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->labelEx($summerProfile,'summer_date',array('label'=>'Summer')); ?> </td>
						<td><?php echo $form->labelEx($summerProfile,'comments',array('label'=>'Notes/Comments')); ?> </td>
					</thead>					

					<tr >
						<td><?php echo CHtml::dropdownList('SummerProfile[{0}][summer_date]','',SummerProfile::$SummerDateArray,array('prompt'=>'Enter Summer Year','class'=>'req')); ?> 
							<?php $this->ErrorDiv('SummerProfile_0_summer_dateError','Summer'); ?>
						</td>
						<td><?php echo CHtml::textField('SummerProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?> </td>
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