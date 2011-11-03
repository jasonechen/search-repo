<div class="container">
<div class="form">
    <div class="span-18 last">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'research-grid',
	'dataProvider'=>$researchProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'subject:text:Research Subject',
		array(
                  'name'=>'Research Field',
                  'value'=>'ResearchProfile::convertField($data->field)',),        
                array(
                  'name'=>'From',
                  'value'=>'ResearchProfile::convertYears($data->year_begin)',),
                array(
                  'name'=>'To',
                  'value'=>'ResearchProfile::convertYears($data->year_end)',),
                array(
                  'name'=>'Hours/Week',
                  'value'=>'ActivityProfile::convertHours($data->hours)',
                ),
                
                'comments:text:Notes/Comments',
//                'date_taken:date:Date taken',
		/*
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template' => '{delete}',
                        'afterDelete'=>'function(link,success,data){ if(success) alert("Delete completed successfuly"); }',

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteResearch", array("id" => $data->id))',


		),
	),
)); ?>
    
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'research-profile-research-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($researchProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

	<div class="span-6">
		<?php echo $form->labelEx($researchProfile,'subject',array('label'=>'Research Subject')); ?>
		<?php echo $form->textField($researchProfile,'subject'); ?>
		<?php echo $form->error($researchProfile,'subject'); ?>
            <br></br>
		<?php echo $form->labelEx($researchProfile,'field',array('label'=>'Research Field')); ?>
                <?php echo $form->dropDownList($researchProfile,'field', $researchProfile->getMajorOptions(),array('prompt'=>'Select Research Field')); ?>
		<?php echo $form->error($researchProfile,'field'); ?>
            <br></br>
		<?php echo $form->labelEx($researchProfile,'year_begin',array('label'=>'From')); ?>
		<?php echo $form->dropdownList($researchProfile,'year_begin',ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
		<?php echo $form->error($researchProfile,'year_begin'); ?>
            <br></br>
		<?php echo $form->labelEx($researchProfile,'year_end',array('label'=>'To')); ?>
		<?php echo $form->dropdownList($researchProfile,'year_end',ResearchProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
		<?php echo $form->error($researchProfile,'year_end'); ?>
            <br></br>
                <?php echo $form->labelEx($researchProfile,'hours',array('label'=>'Hours/Week')); ?>
                <?php echo $form->dropDownList($researchProfile,'hours', ResearchProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?>
		<?php echo $form->error($researchProfile,'hours'); ?>
            <br></br>
            <div class="wform">
		<?php echo $form->labelEx($researchProfile,'comments',array('label'=>'Notes/Comments')); ?>
		<?php echo $form->textField($researchProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($researchProfile,'comments'); ?>
	</div>     </div>

        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>

        <?php if(Yii::app()->user->hasFlash('researchSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('researchSuccess'); ?> 
        </div> <?php endif; ?>    
    	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>