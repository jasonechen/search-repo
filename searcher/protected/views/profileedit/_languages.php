<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 

$this->IncludeJsDynamicrows(); ?>
<div class="sub-head-profile-edit">Personal Info - Languages</div>
<?php
	$langId = LanguageProfile::getLangIdById();	
//	print $langId[0]->language_id;exit;
?>


<div class="span-18 last">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'design-form',
	'enableAjaxValidation'=>false,
	//'htmlOptions'=>array('onsubmit'=>'return validationLanguage(this);')
)); ?>

    <div class="uprofileform">

	<div class="complex"> 
		
<table class="templateFrame grid" cellspacing="5"  border="1">
	<thead class="templateHead">
		<tr >
			<td width="25%">
			<?php echo $form->labelEx(LanguageProfile::model(),'Language ');?>
			</td>
			<td>&nbsp;</td>		
			<td width="35%">
			<?php echo $form->labelEx(LanguageProfile::model(),'Fluency (Check all that apply)');?>
			</td>
		
		</tr>
	</thead>
	<tfoot> 				
	<tr >  
	<td  colspan="3"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Another Language');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">
	
		
		<tr class="templateContent">  	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{0}][language_id]','', $languageProfile->getLangTypeOptions()
			,array('class'=>'req','prompt'=>'Select Language')
			); ?>
			<?php $this->ErrorDiv('LanguageProfile_{0}_language_idError','Language'); ?>
			</td>	
			<td >&nbsp;</td>										
			<td  class="rdtd{}">
                        <?php
                        
                        $name='LanguageProfile[{0}][fluency]';
                        $select='';
                        $ldata=array('1'=>'Speak',
			'2'=>'Read',
			'3'=>'Write',
			'4'=>'First Language',
			'5'=>'Spoken at Home');
                        echo CHtml::checkBoxList($name, $select, $ldata,array('class'=>'rd','prompt'=>'Select Fluency')); ?> 
			
			<?php $this->ErrorDiv('LanguageProfile_{0}_fluencyError','Fluency'); ?>
			</td>
			
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
	<tbody class="templateTarget">
	<?php if(count($langId)){ ?>
	
	<?php  for($i = 0 ; $i<count($langId); $i++){ 
            $lngIds= $langId[$i]->language_id;
          //  echo $lngIds;
             $sltId=  LanguageProfile::getFluencyByLang($lngIds);
             $myslt=array();
             foreach ($sltId as $key => $value) {
               //  echo $value->fluency.'<br/>';
                 array_push($myslt, $value->fluency);
                 
             }
            
            ?>	
		<tr class="templateContent"> 	
		
			<td> 	
			<?php echo CHtml::dropDownList('LanguageProfile[{'.$i.'}][language_id]',$langId[$i]->language_id, $languageProfile->getLangTypeOptions()
				,array('class'=>'req','prompt'=>'Select Language')
			); ?>			
			<?php $this->ErrorDiv('LanguageProfile_'.$i.'_language_idError','Language'); ?>
			</td>	
			<td>&nbsp;</td>										
			<td class="rdtd<?php print $i; ?>">
                        <?php 
                         $name='LanguageProfile[{'.$i.'}][fluency]';
                        $select=$myslt;
                        
                        $ldata=array('1'=>'Speak',
			'2'=>'Read',
			'3'=>'Write',
			'4'=>'First Language',
			'5'=>'Spoken at Home');
                        echo CHtml::checkBoxList($name, $select, $ldata,array('class'=>'rd','prompt'=>'Select Fluency')); 
			/*
                        echo CHtml::radioButtonList('LanguageProfile[{'.$i.'}][fluency]',$model->fluencylevelById($langId[$i]->id),array(
			'1'=>'Speak',
			'2'=>'Read',
			'3'=>'Write',
			'4'=>'First Language',
			'5'=>'Spoken at Home'
			),array('class'=>'rd','prompt'=>'Select Fluency'));*/
                        
                        ?> 
			<?php $this->ErrorDiv('LanguageProfile_'.$i.'_fluencyError','Fluency'); ?>
			</td>
			
			<td>&nbsp;</td>							
			<td class="rm">
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
			<td class="rdtd0" ><?php 
                         $name='LanguageProfile[{0}][fluency]';
                        $select='checked';
                        $ldata=LanguageProfile::$FluencyArray;
                        
                        $htmlOptions = array('class'=>'rd','prompt'=>'Select Fluency');
                        echo CHtml::checkBoxList($name, '', $ldata,$htmlOptions); 
			/*
                        echo CHtml::radioButtonList('LanguageProfile[{0}][fluency]','',array(
			'1'=>'Speak',
			'2'=>'Read',
			'3'=>'Write',
			'4'=>'First Language',
			'5'=>'Spoken at Home'
			),array('class'=>'rd','prompt'=>'Select Fluency'));*/
                        ?> 
			<?php $this->ErrorDiv('LanguageProfile_0_fluencyError','Fluency'); 
                        
                        ?>
			</td>
			
			<td>&nbsp;</td>							
			<td class="rm">
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
<?php   } ?>
	</tbody>
</table>
</div>
	<br></br>
</div><!-- form -->  
        <div class="span-3 last">
            <div class="buttons">
		<?php echo CHtml::submitButton('Update') ?>
	</div>
            </div>
<?php $this->endWidget(); ?>



<br></br><br></br>
</div>



