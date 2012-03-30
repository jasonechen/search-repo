<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 	
$this->IncludeJsDynamicrows(); ?>
<div class="sub-head-profile-edit">Academics - Awards/Honors</div>
<div class="container">
    <div class="span-14">
    <div class="form">
    
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'award-profile-award-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>




	<table class="templateFrame grid" cellspacing="10">
	
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td><?php echo $form->label($awardProfile,'award_name',array('label'=>'Award/Honor')); ?></td>			
			<td><?php echo $form->label($awardProfile,'year',array('label'=>'Year')); ?> </td>
			<td><?php echo $form->label($awardProfile,'region',array('label'=>'Level')); ?> </td>			
			<td><?php echo $form->label($awardProfile,'comments',array('label'=>'Description')); ?></td>
		</tr>
		
	</thead>	
	<!--End Table HEader -->
	
	<!--Start Table Content -->
	
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Awards');?></div>
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
		
		<?php echo  CHtml::textField('AwardProfile[{0}][comments]','',array('size'=>50,'maxlength'=>100)); ?>
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
				<td><?php echo  CHtml::textField('AwardProfile[{'.$i.'}][comments]',$award[$i]->comments,array('size'=>50,'maxlength'=>100)); ?></td>
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
				<td><?php echo  CHtml::textField('AwardProfile[{0}][comments]','',array('size'=>50,'maxlength'=>100)); ?></td>
				<td> 
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
    <div class="span-14"><br></br><br></br><br></br><br></br></div>
</div>