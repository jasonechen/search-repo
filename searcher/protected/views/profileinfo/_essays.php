<?php 	$this->IncludeJsDynamicrows(); ?>
<div class="container">
	<div class="form">
	<?php echo CHtml::form($this->createUrl('modEssays'),'post',array('enctype'=>'multipart/form-data')); ?>
	<?php $this->widget('CMultiFileUpload',array(
	'name'=>'files',
	'accept'=>'doc|pdf',
	'max'=>5,
	'remove'=>Yii::t('ui','Remove'),
	//'denied'=>'This File Format is not allowed', message that is displayed when a file type is not allowed
	//'duplicate'=>'', message that is displayed when a file appears twice
	'htmlOptions'=>array('size'=>25),
)); ?>


	
	<div class="row buttons">
		<?php echo CHtml::htmlButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/extracurricular"')); ?>
		<?php echo CHtml::submitButton(Yii::t('ui', 'Next')); ?>
	</div>
	
	

<?php echo CHtml::endForm(); ?>
	</div><!-- form -->
	
	<?php $essay = EssayProfile::getEssayByUser(); 	?>	
	
	<ul>
		<?php foreach($essay as $e){  ?>
			<?php if(!empty($e->mime)){ ?>
		<li><?php echo CHtml::Link($e->mime,Yii::app()->baseUrl.'/'.Yii::app()->params['uploadDirEssay'].$e->mime,array('target'=>'_blank')); ?></li>
			<?php } ?>
		<?php } ?>
	</ul>
	
</div>
