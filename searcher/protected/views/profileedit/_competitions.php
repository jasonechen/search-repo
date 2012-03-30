<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 	
$this->IncludeJsDynamicrows(); ?>
<div class="sub-head-profile-edit">Academics - Competitions</div>
<div class="container">
<div class="span-18 last">
<div class="form">
    
                   
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competition-profile-competition-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>



	<table class="templateFrame grid" cellspacing="0">
	
	<tfoot> 				
	<tr>  
	<td  colspan="3"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Competition');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;"> 	
		
		<tr class="templateContent">    	
			<td> 	 		
				<table class="formbox" width="100"  height="100%" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($competitionProfile,'name_of_competition',array('label'=>'Name')); ?></td>
						<td><?php echo $form->label($competitionProfile,'region'); ?></td>
						<td><?php echo $form->label($competitionProfile,'year',array('label'=>'Year')); ?> </td>
						<td><?php echo $form->label($competitionProfile,'rank_or_score'); ?> </td>
                                            <td><?php echo $form->label($competitionProfile,'num_competitors'); ?> </td>				
					</thead>
					
					<tr>
			<td>
			<?php //echo $form->labelEx($competitionProfile,'name_of_competition',array('label'=>'Name')); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][name_of_competition]','',array('class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_name_of_competitionError','Name'); ?>
			</td>
			<td>
			<?php //echo $form->labelEx($competitionProfile,'region'); ?>
		<?php echo CHtml::dropdownList('CompetitionProfile[{0}][region]','',AwardProfile::$RegionArray,array('prompt'=>'Enter Level','class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_regionError','Region'); ?>
			</td>
			<td>
				<?php //echo $form->labelEx($competitionProfile,'year',array('label'=>'Year')); ?>
		<?php echo CHtml::dropdownList('CompetitionProfile[{0}][year]','',AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year','class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_yearError','Year'); ?>
			</td>
			<td>
			<?php //echo $form->labelEx($competitionProfile,'rank_or_score'); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][rank_or_score]','',array('class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_rank_or_scoreError','Rank or Score'); ?>
			</td>
			<td>
			<?php // echo $form->labelEx($competitionProfile,'num_competitors'); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][num_competitors]',''); ?>
		<?php //echo $form->error($competitionProfile,'num_competitors'); ?>
			</td>
					</tr>
					<thead class="templateHead">						
		
						<td><?php echo $form->label($competitionProfile,'comments',array('label'=>'Description')); ?></td>
                                        </thead>					
					<tr>
					

			<td colspan="3">
		<?php //echo $form->labelEx($competitionProfile,'comments',array('label'=>'Description')); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][comments]','',array('size'=>50,'maxlength'=>100)); ?>
		<?php // echo $form->error($competitionProfile,'comments'); ?>
			</td>
					
						
					</tr>

					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
		
			<td align="left" class="rm" > 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	
	</textarea>
	
	
	</td > 
	</tr > 
	</tfoot>
	<!--End Table Content -->
	
	<tbody class="templateTarget">
		<?php
	
		$compt = CompetitionProfile::getCompetitionById();	
		if(count($compt)){
	?>
		<?php for($i = 0 ; $i< count($compt);$i++){ ?>
				
					<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead">
						<td><?php echo $form->label($competitionProfile,'name_of_competition',array('label'=>'Name')); ?></td>
						<td><?php echo $form->label($competitionProfile,'region'); ?></td>
						<td><?php echo $form->label($competitionProfile,'year',array('label'=>'Year')); ?> </td>
						<td><?php echo $form->label($competitionProfile,'rank_or_score'); ?> </td>
						<td><?php echo $form->label($competitionProfile,'num_competitors'); ?> </td>					
					</thead>
					
					<tr>
						<td>
			<?php //echo $form->labelEx($competitionProfile,'name_of_competition',array('label'=>'Name')); ?>
		<?php echo CHtml::textField('CompetitionProfile[{'.$i.'}][name_of_competition]',$compt[$i]->name_of_competition,array('class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_'.$i.'_name_of_competitionError','Name'); ?>
			</td>
			<td>
			<?php //echo $form->labelEx($competitionProfile,'region'); ?>
		<?php  echo CHtml::dropdownList('CompetitionProfile[{'.$i.'}][region]',$compt[$i]->region,AwardProfile::$RegionArray,array('prompt'=>'Enter Level','class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_'.$i.'_regionError','Region'); ?>
			</td>
			<td>
				<?php //echo $form->labelEx($competitionProfile,'year',array('label'=>'Year')); ?>
		<?php echo CHtml::dropdownList('CompetitionProfile[{'.$i.'}][year]',$compt[$i]->year,AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year','class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_'.$i.'_yearError','Year'); ?>
			</td>
			<td>
			<?php //echo $form->labelEx($competitionProfile,'rank_or_score'); ?>
		<?php echo CHtml::textField('CompetitionProfile[{'.$i.'}][rank_or_score]',$compt[$i]->rank_or_score,array('class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_'.$i.'_rank_or_scoreError','Rank or Score'); ?>
			</td>
                        <td>
			<?php // echo $form->labelEx($competitionProfile,'num_competitors'); ?>
		<?php echo CHtml::textField('CompetitionProfile[{'.$i.'}][num_competitors]',$compt[$i]->num_competitors); ?>
		<?php //echo $form->error($competitionProfile,'num_competitors'); ?>
			</td>
					</tr>
					<thead class="templateHead">
						
						<td><?php echo $form->label($competitionProfile,'comments',array('label'=>'Description')); ?></td>
                                        </thead>					
					<tr>

			<td colspan="3">
		<?php //echo $form->labelEx($competitionProfile,'comments',array('label'=>'Description')); ?>
		<?php echo CHtml::textField('CompetitionProfile[{'.$i.'}][comments]',$compt[$i]->comments,array('size'=>50,'maxlength'=>100)); ?>
		<?php //echo $form->error($competitionProfile,'comments'); ?>
			</td>
						
					</tr>

					<!--GIve the Break to for Space between each table-->
					</br>
				</table>
										
			
			<td align="left" class="rm"> 
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
						<td><?php echo $form->label($competitionProfile,'name_of_competition',array('label'=>'Name')); ?></td>
						<td><?php echo $form->label($competitionProfile,'region'); ?></td>
						<td><?php echo $form->label($competitionProfile,'year',array('label'=>'Year')); ?> </td>
						<td><?php echo $form->label($competitionProfile,'rank_or_score'); ?> </td>
						<td><?php echo $form->label($competitionProfile,'num_competitors'); ?> </td>				
					</thead>
					
					<tr>
						<td>
			<?php //echo $form->labelEx($competitionProfile,'name_of_competition',array('label'=>'Name')); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][name_of_competition]','',array('class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_name_of_competitionError','Name'); ?>
			</td>
			<td>
			<?php //echo $form->labelEx($competitionProfile,'region'); ?>
		<?php echo CHtml::dropdownList('CompetitionProfile[{0}][region]','',AwardProfile::$RegionArray,array('prompt'=>'Enter Level','class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_regionError','Region'); ?>
			</td>
			<td>
				<?php //echo $form->labelEx($competitionProfile,'year',array('label'=>'Year')); ?>
		<?php echo CHtml::dropdownList('CompetitionProfile[{0}][year]','',AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year','class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_yearError','Year'); ?>
			</td>
			<td>
			<?php //echo $form->labelEx($competitionProfile,'rank_or_score'); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][rank_or_score]','',array('class'=>'req')); ?>
		<?php $this->ErrorDiv('CompetitionProfile_{0}_rank_or_scoreError','Rank or Score'); ?>
			</td>
			<td>
			<?php // echo $form->labelEx($competitionProfile,'num_competitors'); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][num_competitors]',''); ?>
		<?php //echo $form->error($competitionProfile,'num_competitors'); ?>
			</td>
					</tr>
					<thead class="templateHead">						
						
						<td><?php echo $form->label($competitionProfile,'comments',array('label'=>'Description')); ?></td>
                                        </thead>					
					<tr>
					
	
			<td colspan="3">
		<?php //echo $form->labelEx($competitionProfile,'comments',array('label'=>'Description')); ?>
		<?php echo CHtml::textField('CompetitionProfile[{0}][comments]','',array('size'=>50,'maxlength'=>100)); ?>
		<?php // echo $form->error($competitionProfile,'comments'); ?>
			</td>
					
						
					</tr>

					<!--GIve the Break to for Space between each table-->
					<br/>
				</table>
										
								
			<td align="left" class="rm"> 
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
<br></br><br></br>