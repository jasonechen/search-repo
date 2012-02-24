<?php 
	  $university = OtherSchoolAdmitProfile::getAdmitByUser(); 
	  $univModel = new UniversityName;
?>
<?php $count = 0 ; if(!empty($university))  $count = count($university) - 1; 	?>

<table width="200" border="1">
<tr><td><?php echo $form->labelEx($otherschooladmitProfile,'otherschool_id',array('label'=>'Other Schools Admitted To')); ?></td></tr>
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
						'style'=>'height:18px;width:220px',
						'value'=>$value,
						'class'=>'req'
						
						),
			)); ?>
	
	<!--Error DIV-->		
	<?php $this->ErrorDiv('otherschool_id'.$i.'Error','School'); ?>
	</td>
	<td>
		<input type="hidden" class="rowIndex" value="<?php print $i; ?>" />
	<div id="row<?php print $i; ?>" class="removeRow"><?php echo Yii::t('ui','Remove');?></div></td>
  </tr> 	
	
<?php } ?>
<tr><td><div class="addRow"><?php echo Yii::t('ui','New');?></div></td></tr>
</table>

        <div class="row buttons">
		<?php echo CHtml::htmlButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/university"')); ?>
		<?php echo CHtml::submitButton('Next'); ?>
		</div>	
    