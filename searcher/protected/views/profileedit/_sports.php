<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 	
$this->IncludeJsDynamicrows(); 
?>
<div class="sub-head-profile-edit">Extracurriculars - Sports </div>
<div class="container">

	<?php if(Yii::app()->user->hasFlash('sportSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('sportSuccess'); ?> 
        </div> <?php endif; ?>  
    
	<div class="span-18 last">
	<div class="form">  
  <?php 
 //       $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-profile-sport-form',	
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>
  
<table class="templateFrame grid" cellspacing="0">
	
	<tfoot> 				
	<tr >  
	<td  colspan="3"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Sport');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($sportProfile,'sport_id',array('label'=>'Sport')); ?> </td>
						<td><?php echo $form->label($sportProfile,'level',array('label'=>'Level')); ?></td>						
						<td><?php echo $form->label($sportProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($sportProfile,'year_end',array('label'=>'To')); ?></td>					
					</thead>
					
					<tr> 
						<td>
						<?php echo CHtml::dropDownList('SportProfile[{0}][sport_id]','',$sportProfile->getSportTypeOptions(),array('prompt'=>'Select Sport','class'=>'req')); ?> 
						<?php $this->ErrorDiv('SportProfile_{0}_sport_idError','Sport'); ?>
						</td>
					
						<td>  <?php echo CHtml::dropdownList('SportProfile[{0}][level]','',SportProfile::$LevelArray,array('prompt'=>'Enter Level')); ?></td>
						<td>
						<?php echo CHtml::dropdownList('SportProfile[{0}][year_begin]','',SportProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
						<?php $this->ErrorDiv('SportProfile_{0}_year_beginError','From'); ?>
						</td>
						<td>
						<?php echo CHtml::dropdownList('SportProfile[{0}][year_end]','',SportProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
						<?php $this->ErrorDiv('SportProfile_{0}_year_endError','To'); ?>
						</td> 
						
					</tr>
					<thead class="templateHead">
						<td ><?php echo $form->label($sportProfile,'leadership'); ?></td>
						<td><?php echo $form->label($sportProfile,'indiv_rank'); ?></td>
						<td><?php echo $form->label($sportProfile,'team_rank'); ?></td>	
						<td><?php echo $form->label($sportProfile,'other_recog'); ?></td>				
					</thead>					
					<tr >
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][leadership]','',SportProfile::$LeadershipArray,array('prompt'=>'Enter Leadership Position ')); ?></td>						
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][indiv_rank]','',SportProfile::$IndivRankArray,array('prompt'=>'Enter Highest Individual Level')); ?></td>
						<td> <?php echo CHtml::dropdownList('SportProfile[{0}][team_rank]','',SportProfile::$TeamRankArray,array('prompt'=>'Enter Highest Team Level')); ?></td>
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][other_recog]','',SportProfile::$OtherRecogArray,array('prompt'=>'Select Other Recognition')); ?></td>			
						
					</tr>
					<thead>
							<td><?php echo $form->label($sportProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
							<td colspan="4"><?php echo CHtml::textField('SportProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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
	<?php $sport = SportProfile::getSportsByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($sport)){ ?>
		<?php for($i = 0 ; $i< count($sport); $i++){ ?>
			
				<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead"> 
						<td><?php echo $form->label($sportProfile,'sport_id',array('label'=>'Sport')); ?> </td>
						<td><?php echo $form->label($sportProfile,'level',array('label'=>'Level')); ?></td>						
						<td><?php echo $form->label($sportProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($sportProfile,'year_end',array('label'=>'To')); ?></td>					
					</thead>
					
					<tr> 
						<td>
						<?php echo CHtml::dropDownList('SportProfile[{'.$i.'}][sport_id]',$sport[$i]->sport_id,$sportProfile->getSportTypeOptions(),array('prompt'=>'Select Sport','class'=>'req')); ?> 
						<?php $this->ErrorDiv('SportProfile_'.$i.'_sport_idError','Sport'); ?>
						</td>
					
						<td>  <?php echo CHtml::dropdownList('SportProfile[{'.$i.'}][level]',$sport[$i]->level,SportProfile::$LevelArray,array('prompt'=>'Enter Level')); ?></td>
						<td><?php echo CHtml::dropdownList('SportProfile[{'.$i.'}][year_begin]',$sport[$i]->year_begin,SportProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
						<?php $this->ErrorDiv('SportProfile_'.$i.'_year_beginError','From'); ?>
						</td>
						<td>
						<?php echo CHtml::dropdownList('SportProfile[{'.$i.'}][year_end]',$sport[$i]->year_end,SportProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
						<?php $this->ErrorDiv('SportProfile_'.$i.'_year_endError','To'); ?>
						</td> 
						
					</tr>
					<thead class="templateHead">
						<td ><?php echo $form->label($sportProfile,'leadership'); ?></td>
						<td><?php echo $form->label($sportProfile,'indiv_rank'); ?></td>
						<td><?php echo $form->label($sportProfile,'team_rank'); ?></td>	
						<td><?php echo $form->label($sportProfile,'other_recog'); ?></td>				
					</thead>					
					<tr >
						<td><?php echo CHtml::dropdownList('SportProfile[{'.$i.'}][leadership]',$sport[$i]->leadership,SportProfile::$LeadershipArray,array('prompt'=>'Enter Leadership Position ')); ?></td>						
						<td><?php echo CHtml::dropdownList('SportProfile[{'.$i.'}][indiv_rank]',$sport[$i]->indiv_rank,SportProfile::$IndivRankArray,array('prompt'=>'Enter Highest Individual Level')); ?></td>
						<td> <?php echo CHtml::dropdownList('SportProfile[{'.$i.'}][team_rank]',$sport[$i]->team_rank,SportProfile::$TeamRankArray,array('prompt'=>'Enter Highest Team Level')); ?></td>
						<td><?php echo CHtml::dropdownList('SportProfile[{'.$i.'}][other_recog]',$sport[$i]->other_recog,SportProfile::$OtherRecogArray,array('prompt'=>'Select Other Recognition')); ?></td>			
						
					</tr>
					<thead>
							<td><?php echo $form->label($sportProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
							<td colspan="4"><?php echo CHtml::textField('SportProfile[{'.$i.'}][comments]',$sport[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>
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
						<td><?php echo $form->label($sportProfile,'sport_id',array('label'=>'Sport')); ?> </td>
						<td><?php echo $form->label($sportProfile,'level',array('label'=>'Level')); ?></td>						
						<td><?php echo $form->label($sportProfile,'year_begin',array('label'=>'From')); ?></td>
						<td><?php echo $form->label($sportProfile,'year_end',array('label'=>'To')); ?></td>					
					</thead>
					
					<tr> 
						<td><?php echo CHtml::dropDownList('SportProfile[{0}][sport_id]','',$sportProfile->getSportTypeOptions(),array('prompt'=>'Select Sport','class'=>'req')); ?> 
						<?php $this->ErrorDiv('SportProfile_0_sport_idError','Sport'); ?>
						</td>
					
						<td>  <?php echo CHtml::dropdownList('SportProfile[{0}][level]','',SportProfile::$LevelArray,array('prompt'=>'Enter Level')); ?></td>
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][year_begin]','',SportProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
						<?php $this->ErrorDiv('SportProfile_0_year_beginError','From'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][year_end]','',SportProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
						<?php $this->ErrorDiv('SportProfile_0_year_endError','To'); ?>
						</td> 
						
					</tr>
					<thead class="templateHead">
						<td><?php echo $form->label($sportProfile,'leadership'); ?></td>
						<td><?php echo $form->label($sportProfile,'indiv_rank'); ?></td>
						<td><?php echo $form->label($sportProfile,'team_rank'); ?></td>	
						<td><?php echo $form->label($sportProfile,'other_recog'); ?></td>				
					</thead>					
					<tr >
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][leadership]','',SportProfile::$LeadershipArray,array('prompt'=>'Enter Leadership Position ')); ?></td>						
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][indiv_rank]','',SportProfile::$IndivRankArray,array('prompt'=>'Enter Highest Individual Level')); ?></td>
						<td> <?php echo CHtml::dropdownList('SportProfile[{0}][team_rank]','',SportProfile::$TeamRankArray,array('prompt'=>'Enter Highest Team Level')); ?></td>
						<td><?php echo CHtml::dropdownList('SportProfile[{0}][other_recog]','',SportProfile::$OtherRecogArray,array('prompt'=>'Select Other Recognition')); ?></td>			
						
					</tr>
					<thead>
							<td><?php echo $form->label($sportProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
							<td colspan="4"><?php echo CHtml::textField('SportProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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
<br></br><br></br>