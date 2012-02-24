<?php 	$this->progressbar(); ?>
<div class="sub-head-profile">Extra Curricular </div>
<?php 	
	$this->IncludeJsDynamicrows(); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
?>
	
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'extraCurricular-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationEC(this);')
)); ?>	
	
		
	<!--Volunteer-->
	<div class="cpanel">
		<?php echo CHtml::checkBox('g2', $volunteerCheck, array('id'=>'group4')); ?>
		<?php echo CHtml::label(Yii::t('ui','Volunteer'),'group2'); ?>
		<div class="cpanelContent">
			<?php $this->renderPartial('_volunteer',array('volunteerProfile'=>$volunteerProfile,'form'=>$form)); ?>		
		</div><!-- cpanelContent -->
	</div><!-- cpanel -->
	<!--End Volunteer-->
	
	<!--Work-->
	<div class="cpanel">
		<?php echo CHtml::checkBox('g2', $workCheck, array('id'=>'group5')); ?>
		<?php echo CHtml::label(Yii::t('ui','Work'),'group2'); ?>
		<div class="cpanelContent">
			<?php $this->renderPartial('_work',array('workProfile'=>$workProfile,'form'=>$form)); ?>		
		</div><!-- cpanelContent -->
	</div><!-- cpanel -->
	<!--End work-->
	
	<!--Research-->
	<div class="cpanel">
		<?php echo CHtml::checkBox('g2', $researchCheck, array('id'=>'group6')); ?>
		<?php echo CHtml::label(Yii::t('ui','Research'),'group2'); ?>
		<div class="cpanelContent">
			<?php $this->renderPartial('_research',array('researchProfile'=>$researchProfile,'form'=>$form)); ?>		
		</div><!-- cpanelContent -->
	</div><!-- cpanel -->
	<!--End Research-->
	
	<!--Summer-->
	<div class="cpanel">
		<?php echo CHtml::checkBox('g2', $summerCheck, array('id'=>'group7')); ?>
		<?php echo CHtml::label(Yii::t('ui','Summer'),'group2'); ?>
		<div class="cpanelContent">
			<?php $this->renderPartial('_summer',array('summerProfile'=>$summerProfile,'form'=>$form)); ?>		
		</div><!-- cpanelContent -->
	</div><!-- cpanel -->
	<!--End Summer-->
	
	<!--other-->
	<div class="cpanel">
		<?php echo CHtml::checkBox('g2', $otherCheck, array('id'=>'group8')); ?>
		<?php echo CHtml::label(Yii::t('ui','Extra'),'group2'); ?>
		<div class="cpanelContent">
			<?php $this->renderPartial('_extracurr_other',array('otherProfile'=>$otherProfile,'form'=>$form)); ?>		
		</div><!-- cpanelContent -->
	</div><!-- cpanel -->
	<!--End other-->
	
	
	<div class="row buttons">
		<?php echo CHtml::htmlButton('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/music"')); ?>
		<?php echo CHtml::submitButton('Next'); ?>
	</div>


<?php $this->endWidget(); ?>


