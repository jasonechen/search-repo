<?php 
        $this->setWizardCSS();
?>

<?php 	$this->progressbar('EC','extracurricular'); ?>
<div class="sub-head-profile-edit">Other Extracurricular Activities </div>
<p><i> Check box to add </i></p>
<?php 	
	$this->IncludeJsDynamicrows(); 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
?>
	
<?php 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'extraCurricular-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationEC(this);')
)); ?>	
	
		
	
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
		<?php echo CHtml::label(Yii::t('ui','Other Activities'),'group2'); ?>
		<div class="cpanelContent">
			<?php $this->renderPartial('_extracurr_other',array('otherProfile'=>$otherProfile,'form'=>$form)); ?>		
		</div><!-- cpanelContent -->
	</div><!-- cpanel -->
	<!--End other-->
	
	<br></br>
    
        <div class="span-3 last">
            <div class="buttons">

		<?php echo CHtml::submitButton('Update'); ?>
	</div>
        </div>

<?php $this->endWidget(); ?>


<br></br><br></br>