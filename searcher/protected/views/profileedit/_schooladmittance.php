
<div class="uprofileform">
<?php 
	  $university = OtherSchoolAdmitProfile::getAdmitByUser(); 
	  $univModel = new UniversityName;
          
        $this->setWizardCSS();

?>
<?php $count = 0 ; if(!empty($university))  $count = count($university) - 1; 	?>

<table width="70%" border="1">
<tr><td><?php echo $form->label($otherschooladmitProfile,'otherschool_id',array('label'=>'Other Schools Admitted To')); ?></td></tr>
<?php for($i=0;$i<=9;$i++){ ?>
 	<?php	@$value = $univModel->getNamebyId($university[$i]['otherschool_id']);  ?>
  <tr id="row<?php echo $i; ?>univ" <?php if($i > $count){ $class=''; ?> style="display:none;" <?php } ?> >
	<td height="31">
		<?php
					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'model'=>$otherschooladmitProfile,
					'attribute'=>'['.$i.']otherschool_id',
//                        'id'=>'first_university_id',
					'name'=>'otherschool_id'.$i,
					'source'=>$this->createURL('profile/suggestUniversity'),
					 // additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'2',
						'select'=>"js:function(event, ui) {
								$('#OtherSchoolAdmitProfile_otherschool_id').val(ui.item['id']);
							}"
						),
					'htmlOptions'=>array(
						'style'=>'height:18px;width:450px',
						'value'=>$value,
						'class'=>'req'
						
						),
			)); ?>
	
	<!--Error DIV-->		
	<?php $this->ErrorDiv('otherschool_id'.$i.'Error','School'); ?>
	</td>
	<td>&nbsp;</td>							
	<td class="rm">
		<input type="hidden" class="rowIndex" value="<?php print $i; ?>" />
	<div id="row<?php print $i; ?>" class="removeRow"><?php echo Yii::t('ui','Remove');?></div></td>
  </tr> 	
	
<?php } ?>

<tr><td><div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Another School');?></div></td></tr>
</table>
<br></br>
</div>
        <div class="span-3 last">
            <div class="buttons">
		<?php echo CHtml::submitButton('Update'); ?>
		</div>	
            </div>
    <br></br><br></br>
