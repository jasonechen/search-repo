<?php 
        $this->setWizardCSS();
	  $this->IncludeJsDynamicrows(); 
          $this->setAdminMenu(); 
?>

<script type="text/javascript">
<!--
function confirmRemoveEssay(el, targetHref) {
	$("#baseDialog").dialog("option", {
		modal: true,
		resizable: false,
		position: 'center',
		title: "Remove Essays",
		buttons: {
			"Yes": function() {
				window.location = targetHref ; 
				$(this).dialog("close");
			},
			"No": function() {
				$(this).dialog("close");
			}
		}
	});				 
	
	$("#baseDialog").dialog("open");
}
//-->
</script>

<div class="sub-head-profile-edit">Essays - Upload Files</div>
<div class="container">
    <div class="span-14">
        
		<div class="span-13 last">
			<div class="formbox">
				<h4>Submitted Essays</h4>
				
				<?php $essay = EssayProfile::getEssayByUser(); 	?>		
				<ul>
				<?php foreach($essay as $e){  ?>
					<?php if(!empty($e->mime)){ ?>
					<li>
						<table width="100%" border="0" cellspacing="0" cellpadding="8">
						  <tr>
							<td width="70%"><?php  echo "Essay Name: ".CHtml::Link($e->name,Yii::app()->baseUrl.'/'.Yii::app()->params['uploadDirEssay'].Yii::app()->user->id.'/'.$e->mime,array('target'=>'_blank')); ?></td>
							<td width="25%" align="left"><?php 
								echo CHtml::Link('Remove','#',array(
									'title'=>'Remove',
									'style'=>'color:grey;cursor:pointer;text-decoration:underline;font-size:12px;',
									'onclick'=> 'confirmRemoveEssay(this, "'. $this->createUrl('profileedit/deleteessay',array('id'=>$e->id)) .'"); return false;'
								)); 
							?></td>
						  </tr>
						</table>
					 </li>
					<?php } ?>
				<?php } ?>
				</ul>
				
				<?php 
				$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
					'id'=>'baseDialog',
					'options'=> array(
						'autoOpen'=> false
					)
				));
					echo '<br/><p>Delete essay?</p>';
				$this->endWidget();
				?>
			</div>	
		</div>  
     
		<div class="span-24"><br></br>        </div>
        
<div class="form">

<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modEssay-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationmodEssay(this);','enctype'=>'multipart/form-data')
)); ?>

<h4>Upload additional essays: </h4>
<table width="660" cellspacing="0" class="templateFrame grid" >
	<tr id="errorUniqueEssayName"  class="errorMessage"style="display:none;">
		<td colspan="3">Essay name must be unique.</td>
	</tr>
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td width="185"><?php echo $form->labelEx($essayProfile,'name',array('label'=>'Essay Name')); ?></td>			
			<td width="350"><?php echo $form->labelEx($essayProfile,'data',array('label'=>'Story Content')); ?> </td>
                        <td width="270"><?php echo $form->labelEx($essayProfile,'topic',array('label'=>'Common App Topic')); 
                        echo "&nbsp;&nbsp;";          
                        $question=CHtml::image(Yii::app()->request->baseURL. '/images/question_blue.png'); 
                    echo CHtml::link($question, '#', array('onclick'=>'$("#topic").dialog("open"); return false;',)); 
                          $this->renderPartial('application.views.profileinfo.topicpopup');  
                            ?>
                         </td>
		</tr>		
	</thead>		
	<!--End Table HEader -->
	<!--Start Table Content -->
	<tfoot> 
	
	<tr >  
	<td  colspan="4"> 
	<div class="addRow add"><img alt="plus" src="images/plus.png" style="padding-left:10px;padding-right:0;"><?php echo Yii::t('ui','Add Another Essay');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">			
		<tr class="templateContent">  
		
			<td><?php echo CHtml::textField('EssayProfile[{0}][name]','',array('class'=>'req')); ?>
				<?php $this->ErrorDiv('EssayProfile_{0}_nameError','Name'); ?>
			</td>		
			<td><?php echo CHtml::FileField('EssayProfile[{0}][mime]', '',array('class'=>'req file')); ?>
				<?php $this->ErrorDiv('EssayProfile_{0}_mimeError','MIME'); ?>
			</td>
			<td><?php echo CHtml::dropdownList('EssayProfile[{0}][topic]','',EssayProfile::$TopicsArray,array('prompt'=>'Essay Topic','class'=>'req')); ?>
				<?php $this->ErrorDiv('EssayProfile_{0}_topicError','Topic'); ?>
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
	
	
	<tbody class="templateTarget">
	<?php for($i=0;$i<2;$i++){ ?>
					
			<tr class="templateContent">  
			
			<td><?php echo CHtml::textField('EssayProfile['.$i.'][name]','',array('class'=>'req')); ?>
				<?php $this->ErrorDiv('EssayProfile_'.$i.'_nameError','Name'); ?>
			</td>		
			<td><?php echo CHtml::FileField('EssayProfile['.$i.'][mime]', '',array('class'=>'req file')); ?>
				<?php $this->ErrorDiv('EssayProfile_'.$i.'_mimeError','MIME'); ?>
			</td>
			<td><?php echo CHtml::dropdownList('EssayProfile['.$i.'][topic]', '',EssayProfile::$TopicsArray,array('prompt'=>'Essay Topic','class'=>'req')); ?>
				<?php $this->ErrorDiv('EssayProfile_'.$i.'_topicError','Topic'); ?>
			</td>                                                
			<td>
			<input type="hidden" class="rowIndex" value="{<?php print $i; ?>}" />
			<div class="remove"><?php echo Yii::t('ui','Remove');?></div>
			</td> 
			</tr> 
	<?php } ?>
	</tbody>
  </table>
 
</br>  
<div class="row buttons">
  <?php echo  CHtml::SubmitButton('Update'); ?>
 </div> 
<br> </br>	




<?php $this->endWidget(); ?>

	

</div><!-- form -->
</div>
    </div>
<br></br><br></br>