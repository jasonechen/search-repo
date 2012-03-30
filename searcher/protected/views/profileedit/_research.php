

<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
        $this->IncludeJsDynamicrows(); 
?>
<div class="sub-head-profile-edit">Extracurriculars - Research </div>
<div class="container">
    <div class="span-18 last">
<div class="form">
    
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'extraCurricular-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationEC(this);')
)); ?>	
    
    
	<table class="templateFrame grid" cellspacing="0">
	
	<tfoot> 				
	<tr >  
	<td  colspan="3"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Research');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">   	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($researchProfile,'subject',array('label'=>'Research Subject')); ?></td>
						<td><?php echo $form->label($researchProfile,'field',array('label'=>'Research Field')); ?></td>
						<td><?php echo $form->label($researchProfile,'year_begin',array('label'=>'From')); ?></td>
                        <td><?php echo $form->label($researchProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->label($researchProfile,'hours',array('label'=>'Hours/Week')); ?></td>						
					</thead>					
					<tr> 
						<td><?php echo  CHtml::textField('ResearchProfile[{0}][subject]',''); ?></td>
						<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][field]','', $researchProfile->getMajorOptions(),array('prompt'=>'Select Research Field')); ?></td>
						<td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_begin]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('ResearchProfile_{0}_year_beginError','From'); ?>
						</td>
                                                <td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_end]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
						<?php $this->ErrorDiv('ResearchProfile_{0}_year_endError','To'); ?>
					</td>
					<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][hours]','', ResearchProfile::$HoursArray,array('prompt'=>'Enter Hours')); ?></td>
					</tr>
					

					<thead>
						<td><?php echo $form->label($researchProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td colspan="3"><?php echo  CHtml::textField('ResearchProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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
	<?php $research = ResearchProfile::getResearchByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($research)){ ?>
		<?php for($i = 0 ; $i< count($research); $i++){ ?>
				
				<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($researchProfile,'subject',array('label'=>'Research Subject')); ?></td>
						<td><?php echo $form->label($researchProfile,'field',array('label'=>'Research Field')); ?></td>
						<td><?php echo $form->label($researchProfile,'year_begin',array('label'=>'From')); ?></td>
                        <td><?php echo $form->label($researchProfile,'year_end',array('label'=>'To')); ?></td>
						<td> <?php echo $form->label($researchProfile,'hours',array('label'=>'Hours/Week')); ?></td>						
					</thead>					
					<tr> 
						<td><?php echo  CHtml::textField('ResearchProfile[{'.$i.'}][subject]',$research[$i]->subject); ?></td>
						<td><?php echo  CHtml::dropDownList('ResearchProfile[{'.$i.'}][field]',$research[$i]->field, $researchProfile->getMajorOptions(),array('prompt'=>'Select Research Field')); ?></td>
						<td><?php echo  CHtml::dropdownList('ResearchProfile[{'.$i.'}][year_begin]',$research[$i]->year_begin,ResearchProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('ResearchProfile_'.$i.'_year_beginError','From'); ?>
						</td>
                                                <td><?php echo  CHtml::dropdownList('ResearchProfile[{'.$i.'}][year_end]',$research[$i]->year_end,ResearchProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
						<?php $this->ErrorDiv('ResearchProfile_'.$i.'_year_endError','To'); ?>
					</td>
					<td><?php echo  CHtml::dropDownList('ResearchProfile[{'.$i.'}][hours]',$research[$i]->hours, ResearchProfile::$HoursArray,array('prompt'=>'Enter Hours')); ?></td>
					</tr>
					
					<thead>
						<td><?php echo $form->label($researchProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td colspan="3"><?php echo  CHtml::textField('ResearchProfile[{'.$i.'}][comments]',$research[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>
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
						<td><?php echo $form->label($researchProfile,'subject',array('label'=>'Research Subject')); ?></td>
						<td><?php echo $form->label($researchProfile,'field',array('label'=>'Research Field')); ?></td>
						<td><?php echo $form->label($researchProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($researchProfile,'year_end',array('label'=>'To')); ?></td>
						<td><?php echo $form->label($researchProfile,'hours',array('label'=>'Hours/Week')); ?></td>						                                                
					</thead>					
					<tr> 
						<td><?php echo  CHtml::textField('ResearchProfile[{0}][subject]',''); ?></td>
						<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][field]','', $researchProfile->getMajorOptions(),array('prompt'=>'Select Research Field')); ?></td>
						<td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_begin]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'Begin Year','class'=>'req from')); ?>
								<?php $this->ErrorDiv('ResearchProfile_0_year_beginError','From'); ?>
						</td>
                                                					<td><?php echo  CHtml::dropdownList('ResearchProfile[{0}][year_end]','',ResearchProfile::$YearParticipateArray,array('prompt'=>'End Year','class'=>'req to')); ?>
						<?php $this->ErrorDiv('ResearchProfile_0_year_endError','To'); ?>
					</td>
					<td><?php echo  CHtml::dropDownList('ResearchProfile[{0}][hours]','', ResearchProfile::$HoursArray,array('prompt'=>'Enter Hours')); ?></td>
					</tr>
					


					<thead>
						<td><?php echo $form->label($researchProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
						<td colspan="3"><?php echo  CHtml::textField('ResearchProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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

</div><!-- form --> 
<div class="span-15 last"></div>
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Update'); ?>
	</div>
        </div>
</div>

<?php $this->endWidget(); ?>
<div class="span-14"><br></br><br></br></div>
</div>