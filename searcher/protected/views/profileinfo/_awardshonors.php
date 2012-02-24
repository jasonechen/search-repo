<?php 	
$this->progressbar(); 
$this->IncludeJsDynamicrows(); ?>
<div class="sub-head-profile">Academics - Awards/Honors</div>
<div class="container">
    <div class="form">
    
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'award-profile-award-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>




	<table class="templateFrame grid" cellspacing="0">
	
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td><?php echo $form->labelEx($awardProfile,'award_name',array('label'=>'Award/Honor')); ?></td>			
			<td><?php echo $form->labelEx($awardProfile,'year',array('label'=>'Year')); ?> </td>
			<td><?php echo $form->labelEx($awardProfile,'region',array('label'=>'Level')); ?> </td>			
			<td><?php echo $form->labelEx($awardProfile,'comments',array('label'=>'Description')); ?></td>
		</tr>
		
	</thead>	
	<!--End Table HEader -->
	
	<!--Start Table Content -->
	
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','New');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">	
		
		<tr class="templateContent">  				
			<!--FORM CONTENT -->	
			<td>
		
		<?php echo  CHtml::textField('AwardProfile[{0}][award_name]','',array('class'=>'req')); ?>
		<?php $this->ErrorDiv('AwardProfile_{0}_award_nameError','Award/Honour'); ?>
			
			</td>
			<td>
		
		<?php echo  CHtml::dropdownList('AwardProfile[{0}][year]','',AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year','class'=>'req')); ?>	
			<?php $this->ErrorDiv('AwardProfile_{0}_yearError','Year'); ?>
			
			</td>
			<td>
		
		<?php echo  CHtml::dropdownList('AwardProfile[{0}][region]','',AwardProfile::$RegionArray,array('prompt'=>'Enter Level','class'=>'req')); ?>
		<?php $this->ErrorDiv('AwardProfile_{0}_regionError','Level'); ?>
			
			</td>
			<td>
		
		<?php echo  CHtml::textField('AwardProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?>
		<?php //echo  CHtml::error($awardProfile,'comments'); ?>	
			
			</td>				
			<!--END FORM CONTENT -->							
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
	<?php	$award = AwardProfile::getAwardByUser();	?>
		
	<tbody class="templateTarget">
	<!--CHeck if Not empty -->	
	<?php if(count($award)){ ?>
		<?php for($i = 0 ; $i< count($award); $i++){ ?>	
			<tr class="templateContent">
				<td>
					<?php echo  CHtml::textField('AwardProfile[{'.$i.'}][award_name]',$award[$i]->award_name,array('class'=>'req')); ?>
					<?php $this->ErrorDiv('AwardProfile_'.$i.'_award_nameError','Award/Honour'); ?>
				</td>
				<td>
					<?php echo  CHtml::dropdownList('AwardProfile[{'.$i.'}][year]',$award[$i]->year,AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year','class'=>'req')); ?>
					<?php $this->ErrorDiv('AwardProfile_'.$i.'_yearError','Award/Honour'); ?>
				</td>
				<td>
					<?php echo  CHtml::dropdownList('AwardProfile[{'.$i.'}][region]',$award[$i]->region,AwardProfile::$RegionArray,array('prompt'=>'Enter Level','class'=>'req')); ?>
					<?php $this->ErrorDiv('AwardProfile_'.$i.'_regionError','Level'); ?>
				</td>
				<td><?php echo  CHtml::textField('AwardProfile[{'.$i.'}][comments]',$award[$i]->comments,array('size'=>80,'maxlength'=>100)); ?></td>
				<td> 
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 					
			</tr>	
		<?php } ?>	
	<!--If the DB record is empty then , display one field by Default-->	
	<?php }else{ ?>	
			<tr class="templateContent">
				<td>
				<?php echo  CHtml::textField('AwardProfile[{0}][award_name]','',array('class'=>'req')); ?>
				<?php $this->ErrorDiv('AwardProfile_0_award_nameError','Award/Honour'); ?>
				</td>
				<td>
				<?php echo  CHtml::dropdownList('AwardProfile[{0}][year]','',AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year','class'=>'req')); ?>
				<?php $this->ErrorDiv('AwardProfile_0_yearError','year'); ?>
				</td>
				<td>
				<?php echo  CHtml::dropdownList('AwardProfile[{0}][region]','',AwardProfile::$RegionArray,array('prompt'=>'Enter Level','class'=>'req')); ?>
				<?php $this->ErrorDiv('AwardProfile_0_regionError','Level'); ?>
				</td>
				<td><?php echo  CHtml::textField('AwardProfile[{0}][comments]','',array('size'=>80,'maxlength'=>100)); ?></td>
				<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
				
				 			
			</tr>	
	<?php } ?>			
	</tbody>
	
	</table>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/competitions"')); ?>
		<?php echo CHtml::submitButton('Next'); ?>
	</div>

   
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>