<?php $this->progressbar('Essay','essay'); 
	  $this->IncludeJsDynamicrows(); 
?>

<div class="sub-head-profile">Essays - Upload Files</div>
<div class="container">
    <div class="form">

<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modEssay-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationmodEssay(this);','enctype'=>'multipart/form-data')
)); ?>


<table width="450" cellspacing="0" class="templateFrame grid" >
	<tr id="errorUniqueEssayName"  class="errorMessage"style="display:none;">
		<td colspan="3">Essay name must be unique.</td>
	</tr>
	<!--Start Table HEader -->
	<thead class="templateHead">
		<tr>
			<td width="185"><?php echo $form->labelEx($essayProfile,'name',array('label'=>'Essay Name')); ?></td>			
			<td width="395"><?php echo $form->labelEx($essayProfile,'data',array('label'=>'Story Content')); ?> </td>
		</tr>		
	</thead>		
	<!--End Table HEader -->
	<!--Start Table Content -->
	<tfoot> 
	
	<tr >  
	<td  colspan="4"> 
	<div class="add"><?php echo Yii::t('ui','Add Another Essay');?></div>
	<textarea class="template" rows="0" cols="0" style="display:none;">			
		<tr class="templateContent">  
		
			<td><?php echo CHtml::textField('EssayProfile[{0}][name]','',array('class'=>'req')); ?>
				<?php $this->ErrorDiv('EssayProfile_{0}_nameError','Name'); ?>
			</td>		
			<td><?php echo CHtml::FileField('EssayProfile[{0}][mime]', '',array('class'=>'req file')); ?>
				<?php $this->ErrorDiv('EssayProfile_{0}_mimeError','MIME'); ?>
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
  <?php echo  CHtml::SubmitButton('Upload'); ?>
 </div> 
<br> </br>	

<h3>Uploaded Files</h3>
<?php $essay = EssayProfile::getEssayByUser(); 	?>	
	
	<ul>
		<?php foreach($essay as $e){  ?>
			<?php if(!empty($e->mime)){ ?>
		<li>
			<table width="50%" border="0" cellspacing="0" cellpadding="8">
			  <tr>
				<td width="50%"><?php  echo CHtml::Link($e->name,Yii::app()->baseUrl.'/'.Yii::app()->params['uploadDirEssay'].Yii::app()->user->id.'/'.$e->mime,array('target'=>'_blank')); ?></td>
				<td width="25%" align="left"><?php echo CHtml::Link('Remove',array('profileinfo/deleteessay','id'=>$e->id),array('title'=>'Remove','style'=>'color:grey;cursor:pointer;text-decoration:underline;font-size:12px;')); ?></td>
			  </tr>
			</table>

			 </li>
			<?php } ?>
		<?php } ?>
	</ul>
	
<br/>	
	
	        <div class="span-3">
	
                    <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/extracurricular"')); ?>
		            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::Button('Next',array('onclick'=>'window.location="index.php?r=profileinfo/summary"')); ?>
	</div>
            </div>

<?php $this->endWidget(); ?>

	

</div><!-- form -->
</div>
<br></br><br></br>