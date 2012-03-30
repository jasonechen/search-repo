<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 	
$this->IncludeJsDynamicrows(); 
?>
<div class="sub-head-profile-edit">Extracurriculars - Music </div>
<div class="container">
    <div class="span-14">
	
	<?php if(Yii::app()->user->hasFlash('musicSuccess')):?> 
	<div class="successMessage" id="inputsuccess"> 
	<?php echo Yii::app()->user->getFlash('musicSuccess'); ?> 
	</div> <?php endif; ?>  
	
<div class="form">
    


        <div class="form">
<?php 
  //      $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'music-profile-music-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>


<table class="templateFrame grid" cellspacing="0">
	
	<tfoot> 				
	<tr >  
	<td  colspan="3"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Music Activity   ');?></div>
	<textarea class="template" rows="0"  cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead">
						<td> <?php echo $form->label($musicProfile,'music',array('label'=>'Music Activity')); ?></td>
						<td><?php echo $form->label($musicProfile,'level',array('label'=>'Level')); ?> </td>
						<td><?php echo $form->label($musicProfile,'year_begin',array('label'=>'From')); ?> </td>
						<td><?php echo $form->label($musicProfile,'year_end',array('label'=>'To')); ?> </td>
					</thead>					
					<tr> 
						<td><?php echo CHtml::dropDownList('MusicProfile[{0}][music]','', MusicProfile::$MusicArray,array('prompt'=>'Select Musical Activity','class'=>'req')); ?> 
							<?php $this->ErrorDiv('MusicProfile_{0}_musicError','Music'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][level]','',MusicProfile::$LevelArray,array('prompt'=>'Enter Proficiency','class'=>'req')); ?>
							<?php $this->ErrorDiv('MusicProfile_{0}_levelError','level'); ?>
						 </td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][year_begin]','',MusicProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?> 
							<?php $this->ErrorDiv('MusicProfile_{0}_year_beginError','From'); ?>
						</td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][year_end]','',MusicProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('MusicProfile_{0}_year_endError','To'); ?>
						 </td>						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->label($musicProfile,'school_orchband'); ?></td>
						<td><?php echo $form->label($musicProfile,'school_leader'); ?></td>
						<td><?php echo $form->label($musicProfile,'ext_orchband'); ?></td>
						<td><?php echo $form->label($musicProfile,'ext_leader'); ?></td>
					</thead>						

					<tr >
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][school_orchband]','',MusicProfile::$SchoolMusicArray,array('prompt'=>'Enter School Activity')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][school_leader]','',MusicProfile::$SchoolLevelArray,array('prompt'=>'Enter School Music Position')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][ext_orchband]','',MusicProfile::$ExtMusicArray,array('prompt'=>'Enter External Music Activity')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][ext_leader]','',MusicProfile::$SchoolLevelArray,array('prompt'=>'Select External Position')); ?></td>
					</tr>

					<thead>
						<td><?php echo $form->label($musicProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
					<td colspan="3"><?php echo CHtml::textField('MusicProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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
	<?php $music = MusicProfile::getMusicByUser(); ?>
	<tbody class="templateTarget">
	<?php if(count($music)){ ?>
		<?php for($i = 0 ; $i< count($music); $i++){ ?>
				
					<tr class="templateContent">  	
			<td>			
				<table class="formbox" width="100"  height="100" style="border:#DDDDDD 1px solid; background:#E0F3E0;padding:8px;">
					<thead class="templateHead">
						<td> <?php echo $form->label($musicProfile,'music',array('label'=>'Music Activity')); ?></td>
						<td><?php echo $form->label($musicProfile,'level',array('label'=>'Level')); ?> </td>
						<td><?php echo $form->label($musicProfile,'year_begin',array('label'=>'From')); ?> </td>
						<td><?php echo $form->label($musicProfile,'year_end',array('label'=>'To')); ?> </td>
					</thead>					
					<tr> 
						<td><?php echo CHtml::dropDownList('MusicProfile[{'.$i.'}][music]',$music[$i]->music, MusicProfile::$MusicArray,array('prompt'=>'Select Musical Activity','class'=>'req')); ?> 
							<?php $this->ErrorDiv('MusicProfile_'.$i.'_musicError','Music'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{'.$i.'}][level]',$music[$i]->level,MusicProfile::$LevelArray,array('prompt'=>'Enter Proficiency','class'=>'req')); ?> 
								<?php $this->ErrorDiv('MusicProfile_'.$i.'_levelError','level'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{'.$i.'}][year_begin]',$music[$i]->year_begin,MusicProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?>
							<?php $this->ErrorDiv('MusicProfile_'.$i.'_year_beginError','From'); ?>

						 </td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{'.$i.'}][year_end]',$music[$i]->year_end,MusicProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?> 
							<?php $this->ErrorDiv('MusicProfile_'.$i.'_year_endError','To'); ?>
						</td>						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->label($musicProfile,'school_orchband'); ?></td>
						<td><?php echo $form->label($musicProfile,'school_leader'); ?></td>
						<td><?php echo $form->label($musicProfile,'ext_orchband'); ?></td>
						<td><?php echo $form->label($musicProfile,'ext_leader'); ?></td>
					</thead>						

					<tr >
						<td><?php echo CHtml::dropdownList('MusicProfile[{'.$i.'}][school_orchband]',$music[$i]->school_orchband,MusicProfile::$SchoolMusicArray,array('prompt'=>'Enter School Activity')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{'.$i.'}][school_leader]',$music[$i]->school_leader,MusicProfile::$SchoolLevelArray,array('prompt'=>'Enter School Music Position')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{'.$i.'}][ext_orchband]',$music[$i]->ext_orchband,MusicProfile::$ExtMusicArray,array('prompt'=>'Enter External Music Activity')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{'.$i.'}][ext_leader]',$music[$i]->ext_leader,MusicProfile::$SchoolLevelArray,array('prompt'=>'Select External Position')); ?></td>
					</tr>

					<thead>
						<td><?php echo $form->label($musicProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
					<td colspan="3"><?php echo CHtml::textField('MusicProfile[{'.$i.'}][comments]',$music[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>
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
						<td> <?php echo $form->label($musicProfile,'music',array('label'=>'Music Activity')); ?></td>
						<td><?php echo $form->label($musicProfile,'level',array('label'=>'Level')); ?> </td>
						<td><?php echo $form->label($musicProfile,'year_begin',array('label'=>'From')); ?> </td>
						<td><?php echo $form->label($musicProfile,'year_end',array('label'=>'To')); ?> </td>
					</thead>					
					<tr> 
						<td><?php echo CHtml::dropDownList('MusicProfile[{0}][music]','', MusicProfile::$MusicArray,array('prompt'=>'Select Musical Activity','class'=>'req')); ?>
							<?php $this->ErrorDiv('MusicProfile_0_musicError','Music'); ?>

						 </td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][level]','',MusicProfile::$LevelArray,array('prompt'=>'Enter Proficiency','class'=>'req')); ?>
							<?php $this->ErrorDiv('MusicProfile_0_levelError','level'); ?>

						 </td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][year_begin]','',MusicProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year','class'=>'req from')); ?> 
							<?php $this->ErrorDiv('MusicProfile_0_year_beginError','From'); ?>

						</td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][year_end]','',MusicProfile::$YearParticipateArray,array('prompt'=>'Enter End Year','class'=>'req to')); ?>
							<?php $this->ErrorDiv('MusicProfile_0_year_endError','To'); ?>
						 </td>						
					</tr>
					
					<thead class="templateHead">
						<td><?php echo $form->label($musicProfile,'school_orchband'); ?></td>
						<td><?php echo $form->label($musicProfile,'school_leader'); ?></td>
						<td><?php echo $form->label($musicProfile,'ext_orchband'); ?></td>
						<td><?php echo $form->label($musicProfile,'ext_leader'); ?></td>
					</thead>						

					<tr >
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][school_orchband]','',MusicProfile::$SchoolMusicArray,array('prompt'=>'Enter School Activity')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][school_leader]','',MusicProfile::$SchoolLevelArray,array('prompt'=>'Enter School Music Position')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][ext_orchband]','',MusicProfile::$ExtMusicArray,array('prompt'=>'Enter External Music Activity')); ?></td>
						<td><?php echo CHtml::dropdownList('MusicProfile[{0}][ext_leader]','',MusicProfile::$SchoolLevelArray,array('prompt'=>'Select External Position')); ?></td>
					</tr>

					<thead>
						<td><?php echo $form->label($musicProfile,'comments',array('label'=>'Notes/Comments')); ?></td>
					</thead>
					<tr>
					<td colspan="3"><?php echo CHtml::textField('MusicProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
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
    <div class="span-14"><br></br><br></br></div>
</div>