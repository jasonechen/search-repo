<?php 
$this->progressbar('Personalinfo','languages');
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
	'htmlOptions'=>array('onsubmit'=>'return validationLanguage(this);')
)); ?>

	

	<div class="complex"> 
		
<table class="templateFrame grid" cellspacing="5" >
	<thead class="templateHead">
		<tr >
			<td>
			<?php echo $form->labelEx(LanguageProfile::model(),'Language ');?>
			</td>
			<td>&nbsp;</td>		
			<td>
			<?php echo $form->labelEx(LanguageProfile::model(),'Fluency');?>
			</td>
		
		</tr>
	</thead>
	<tfoot> 				
	<tr >  
	<td  colspan="3"> 
	<div class="add" style="margin:5px 0;"><?php echo Yii::t('ui','Add Another Language');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">
	
		
		<tr class="templateContent">  	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{0}][language_id]','', $languageProfile->getLangTypeOptions()
			,array('class'=>'req','prompt'=>'Select Language')
			); ?>
			<?php $this->ErrorDiv('LanguageProfile_{0}_language_idError','Language'); ?>
			</td>	
			<td >&nbsp;</td>										
			<td  class="rdtd{0}"><?php echo CHtml::radioButtonList('LanguageProfile[{0}][fluency]','',array(
			'1'=>'Speak',
			'2'=>'Read',
			'3'=>'Write',
			'4'=>'First Language',
			'5'=>'Spoken at Home'
			),array('class'=>'rd','prompt'=>'Select Fluency')); ?> 
			
			<?php $this->ErrorDiv('LanguageProfile_{0}_fluencyError','Fluency'); ?>
			</td>
			
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
	<tbody class="templateTarget">
	<?php if(count($langId)){ ?>
	
	<?php  for($i = 0 ; $i<count($langId); $i++){ ?>	
		<tr class="templateContent"> 	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{'.$i.'}][language_id]',$langId[$i]->language_id, $languageProfile->getLangTypeOptions()
				,array('class'=>'req','prompt'=>'Select Language')
			); ?>			
			<?php $this->ErrorDiv('LanguageProfile_'.$i.'_language_idError','Language'); ?>
			</td>	
			<td>&nbsp;</td>										
			<td class="rdtd<?php print $i; ?>"><?php echo CHtml::radioButtonList('LanguageProfile[{'.$i.'}][fluency]',$model->fluencylevelById($langId[$i]->id),array(
			'1'=>'Speak',
			'2'=>'Read',
			'3'=>'Write',
			'4'=>'First Language',
			'5'=>'Spoken at Home'
			),array('class'=>'rd','prompt'=>'Select Fluency')); ?> 
			<?php $this->ErrorDiv('LanguageProfile_'.$i.'_fluencyError','Fluency'); ?>
			</td>
			
			<td>&nbsp;</td>							
			<td class="remove">
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
	
	<?php   } ?>
<?php   }else { ?>	
		<tr class="templateContent">  	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{0}][language_id]','', $languageProfile->getLangTypeOptions(),array('class'=>'req','prompt'=>'Select Language')); ?>
			<?php $this->ErrorDiv('LanguageProfile_0_language_idError','Language'); ?>
			</td>	
			<td>&nbsp;</td>										
			<td class="rdtd0" ><?php echo CHtml::radioButtonList('LanguageProfile[{0}][fluency]','',array(
			'1'=>'Speak',
			'2'=>'Read',
			'3'=>'Write',
			'4'=>'First Language',
			'5'=>'Spoken at Home'
			),array('class'=>'rd','prompt'=>'Select Fluency')); ?> 
			<?php $this->ErrorDiv('LanguageProfile_0_fluencyError','Fluency'); ?>
			</td>
			
			<td>&nbsp;</td>							
			<td class="remove">
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
<?php   } ?>
	</tbody>
</table>

	<br></br>
        <div class="span-3">
	
            <div class="pbuttons">
	<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/admittance"')); ?>
		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">
		<?php echo CHtml::submitButton('Next'); ?>
	</div>
            </div>
<?php $this->endWidget(); ?>
<pre><?php if(isset($_POST) && $_POST!==array()) print_r($_POST);?></pre>

</div><!-- form -->

</div>

<br></br>