<?php
 	$this->progressbar('TestScore','ap');
	$this->IncludeJsDynamicrows();
 ?>
<div class="sub-head-profile">Test Scores - AP</div>
<div class="container">
    <div class="form">
    
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ap-profile-ap-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validation(this);')
)); ?>


	<table class="templateFrame grid" cellspacing="10" style='table-layout:fixed'>
	
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td><?php echo $form->label($apProfile,'ap_id',array('label'=>'AP Subject')); ?> </td>			
			<td><?php echo $form->label($apProfile,'score',array('label'=>'Score')); ?> </td>
			<!--<td><?php // echo $form->labelEx($apProfile,'date_taken',array('label'=>'Date Taken')); ?> </td>-->			
			
		</tr>
		
	</thead>	
	<!--End Table HEader -->
	
	<!--Start Table Content -->
	
	<tfoot> 				
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','Add AP Test');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">	
		
		<tr class="templateContent">  	
		
			<td>
			<?php echo CHtml::dropDownList('ApProfile[{0}][ap_id]','', $apProfile->getTestTypeOptions(),array('class'=>'req','prompt'=>'--Select Subject--')); ?>
			<?php $this->ErrorDiv('ApProfile_{0}_ap_idError','Subject'); ?>
			</td>
			<td>
			<?php echo CHtml::dropDownList('ApProfile[{0}][score]','',  array(1=>'1',
                                                                            2=>'2',3=>'3',
                                                                            4=>'4',5=>'5',
                                                                            ),array('prompt'=>'Enter Score','class'=>'req')); ?>
			<?php $this->ErrorDiv('ApProfile_{0}_scoreError','Score'); ?>
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
	<?php $ap = ApProfile::getAPByUser(); ?>
	<tbody class="templateTarget">
		<?php if(count($ap)){ ?>
			<?php for($i = 0 ; $i< count($ap); $i++){ ?>	
				<tr class="templateContent">  	
		
			<td>
				<?php echo CHtml::dropDownList('ApProfile[{'.$i.'}][ap_id]',$ap[$i]->ap_id, $apProfile->getTestTypeOptions(),array('class'=>'req','prompt'=>'--Select Subject--')); ?>
				<?php $this->ErrorDiv('ApProfile_'.$i.'_ap_idError','Subject'); ?>
			</td>
			<td><?php echo CHtml::dropDownList('ApProfile[{'.$i.'}][score]',$ap[$i]->score,  array(1=>'1',
                                                                            2=>'2',3=>'3',
                                                                            4=>'4',5=>'5',
                                                                            ),array('prompt'=>'Enter Score','class'=>'req')); ?>
			<?php $this->ErrorDiv('ApProfile_'.$i.'_scoreError','score'); ?>
			</td>
							
			<td> 
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
			<?php } ?>		
		<?php }else{ ?>	
		
				<tr class="templateContent">  	
		
			<td>
			<?php echo CHtml::dropDownList('ApProfile[{0}][ap_id]','', $apProfile->getTestTypeOptions(),array('class'=>'req','prompt'=>'--Select Subject--')); ?>
			<?php $this->ErrorDiv('ApProfile_0_ap_idError','Subject'); ?>
			</td>
			<td><?php echo CHtml::dropDownList('ApProfile[{0}][score]','',  array(1=>'1',
                                                                            2=>'2',3=>'3',
                                                                            4=>'4',5=>'5',
                                                                            ),array('prompt'=>'Enter Score','class'=>'req')); ?>
		
			<?php $this->ErrorDiv('ApProfile_0_scoreError','Score'); ?>
			</td>				
			<td> 
			<input type="hidden" class="rowIndex" value="{0}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			
		</tr> 
		
	    <?php } ?>		
	</tbody>
	
	</table>
<br></br>
        <div class="span-3">
	
            <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/sat2"')); ?>

		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">


		<?php echo CHtml::submitButton('Next'); ?>
	</div>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<br></br><br></br>