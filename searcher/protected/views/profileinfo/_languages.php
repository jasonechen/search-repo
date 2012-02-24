<?php 
$this->progressbar(); 
$this->IncludeJsDynamicrows(); ?>
<div class="sub-head-profile">Personal Info - Languages</div>
<?php
	$langId = LanguageProfile::getLangIdById();	
//	print $langId[0]->language_id;exit;
?>

<?php 
// Demo objects
$model=new LanguageProfile;
$persons=array();
?>

<div class="form" style="width: 720px">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'design-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>

	

	<div class="complex"> 
		
<table class="templateFrame grid" cellspacing="0">
	<thead class="templateHead">
		<tr >
			<td>
			<?php echo $form->labelEx(LanguageProfile::model(),'Language ');?>
			</td>
			<td>
			<?php echo $form->labelEx(LanguageProfile::model(),'Fluency');?>
			</td>
		
		</tr>
	</thead>
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','New');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">
	
		
		<tr class="templateContent">  	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{0}][language_id]','', $languageProfile->getLangTypeOptions()
			,array('class'=>'req')
			); ?>
			<?php $this->ErrorDiv('LanguageProfile_{0}_language_idError','Language'); ?>
			</td>	
											
			<td><?php echo CHtml::dropDownList('LanguageProfile[{0}][fluency]','',array(''=>'',
			'1'=>'Full Fluency',
			'2'=>'Moderate Speaking and Reading Fluency',
			'3'=>'Speaking Only Fluency',
			'4'=>'Elementary Fluency',
			'5'=>'Reading Fluency Only'
			),array('class'=>'req')); ?> 
			
			<?php $this->ErrorDiv('LanguageProfile_{0}_fluencyError','Fluency'); ?>
			</td>
			
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
		
	
	
	</textarea>
	
		
		
	
	
	</td > 
	</tr > 
	</tfoot>
	<tbody class="templateTarget">
	<?php if(count($langId)){ ?>
	
	<?php  for($i = 0 ; $i<count($langId); $i++){ ?>	
		<tr class="templateContent"> 	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{'.$i.'}][language_id]',$langId[$i]->language_id, $languageProfile->getLangTypeOptions()
				,array('class'=>'req')
			); ?>			
			<?php $this->ErrorDiv('LanguageProfile_'.$i.'_language_idError','Language'); ?>
			</td>	
											
			<td><?php echo CHtml::dropDownList('LanguageProfile[{'.$i.'}][fluency]',$model->fluencylevelById($langId[$i]->id),array(''=>'',
			'1'=>'Full Fluency',
			'2'=>'Moderate Speaking and Reading Fluency',
			'3'=>'Speaking Only Fluency',
			'4'=>'Elementary Fluency',
			'5'=>'Reading Fluency Only'
			),array('class'=>'req')); ?> 
			<?php $this->ErrorDiv('LanguageProfile_'.$i.'_fluencyError','Fluency'); ?>
			</td>
			
			<td> 
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	
	<?php   } ?>
<?php   }else { ?>	
		<tr class="templateContent">  	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{0}][language_id]','', $languageProfile->getLangTypeOptions(),array('class'=>'req')); ?>
			<?php $this->ErrorDiv('LanguageProfile_0_language_idError','Language'); ?>
			</td>	
											
			<td><?php echo CHtml::dropDownList('LanguageProfile[{0}][fluency]','',array(''=>'',
			'1'=>'Full Fluency',
			'2'=>'Moderate Speaking and Reading Fluency',
			'3'=>'Speaking Only Fluency',
			'4'=>'Elementary Fluency',
			'5'=>'Reading Fluency Only'
			),array('class'=>'req')); ?> 
			<?php $this->ErrorDiv('LanguageProfile_0_fluencyError','Fluency'); ?>
			</td>
			
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
<?php   } ?>
	</tbody>
</table>

	
	<div class="action">
	<?php echo CHtml::htmlButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/admittance"')); ?>
		<?php echo CHtml::submitButton(Yii::t('ui','Next')); ?>
	</div>
<?php $this->endWidget(); ?>
<pre><?php if(isset($_POST) && $_POST!==array()) print_r($_POST);?></pre>

</div><!-- form -->

</div>

