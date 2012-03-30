<?php $this->setAdminMenu(); 
        $this->setWizardCSS();
?>
<?php 
	$this->IncludeJsDynamicrows(); 
?>
<div class="sub-head-profile-edit">Test Scores - SAT II</div>
<div class="container">
    <div class="span-16 last">
   
        <div class="sat2profileform">
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sat2-profile-sat2-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>

<table class="templateFrame grid" cellspacing="10">
	
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td><?php echo $form->label($sat2Profile,'sat2_id',array('label'=>'SAT II Subject')); ?></td>			
			<td><?php echo $form->label($sat2Profile,'score',array('label'=>'Score')); ?> </td>
			<!--<td><?php //echo $form->labelEx($sat2Profile,'date_taken',array('label'=>'Date Taken')); ?> </td>		-->	
		
		</tr>
		
	</thead>	
	<!--End Table HEader -->
	
	<!--Start Table Content -->
	
	<tfoot> 				
	<tr>  
	<td  colspan="4"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add SAT II Test');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
		
			<td> 
				<?php echo CHtml::dropDownList('Sat2Profile[{0}][sat2_id]','', $sat2Profile->getTestTypeOptions(),array('class'=>'req','prompt'=>'Select Test')); ?>
				<?php $this->ErrorDiv('Sat2Profile_{0}_sat2_idError','Subject'); ?>
			</td>
			
			<td>
				<?php echo CHtml::dropDownList('Sat2Profile[{0}][score]','',Sat2Profile::$Sat2ScoreArray,  array('prompt'=>'Select Score','class'=>'req')); ?>
				<?php $this->ErrorDiv('Sat2Profile_{0}_scoreError','Score'); ?>
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
	<!--End Table Content -->
	<?php $sat2 = Sat2Profile::getSat2ByUser(); ?>
	<tbody class="templateTarget">
		<?php if(count($sat2)){ ?>
			<?php for($i = 0 ; $i< count($sat2); $i++){ ?>	
			<tr class="templateContent">
				<td>
				 <?php echo CHtml::dropDownList('Sat2Profile[{'.$i.'}][sat2_id]',$sat2[$i]->sat2_id, $sat2Profile->getTestTypeOptions(),array('class'=>'req','prompt'=>'Select Test')); ?>
				 <?php $this->ErrorDiv('Sat2Profile_'.$i.'_sat2_idError','Subject'); ?>
				</td>
				<td> 
					<?php echo CHtml::dropDownList('Sat2Profile[{'.$i.'}][score]',$sat2[$i]->score,Sat2Profile::$Sat2ScoreArray,  array('prompt'=>'Select Score','class'=>'req')); ?>
					<?php $this->ErrorDiv('Sat2Profile_'.$i.'_scoreError','Score'); ?>
				</td>
				
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
			 <?php echo CHtml::dropDownList('Sat2Profile[{0}][sat2_id]','', $sat2Profile->getTestTypeOptions(),array('class'=>'req','prompt'=>'Select Test')); ?>
			 <?php $this->ErrorDiv('Sat2Profile_0_sat2_idError','Subject'); ?>
			</td>
			<td>
				 <?php echo CHtml::dropDownList('Sat2Profile[{0}][score]','',Sat2Profile::$Sat2ScoreArray,  array('prompt'=>'Select Score','class'=>'req')); ?>
				 <?php $this->ErrorDiv('Sat2Profile_0_scoreError','Score'); ?>
			</td>
			
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
	</tr>		
	
	<?php } ?>	
	</tbody>
	
	</table>
            </div>
<br></br>
 
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Update'); ?>
	</div>
</div>


	
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
    <div class="span-14"><br></br></div>
</div>