<div class="container">
<div class="form">
    <div class="span-18 last">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'work-grid',
	'dataProvider'=>$workProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'name:text:Job Name',
		array(
                  'name'=>'Work Type/Area',
                  'value'=>'WorkProfile::convertWork($data->work_type)',),        
                array(
                  'name'=>'From',
                  'value'=>'WorkProfile::convertYears($data->year_begin)',),
                array(
                  'name'=>'To',
                  'value'=>'WorkProfile::convertYears($data->year_end)',),
                array(
                  'name'=>'Position Title',
                  'value'=>'WorkProfile::convertTitle($data->title)',),
                array(
                  'name'=>'Hours/Week',
                  'value'=>'WorkProfile::convertHours($data->hours)',
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteWork", array("id" => $data->id))',


		),
	),
)); ?>
    
<?php 
      //  $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'volunteer-profile-volunteer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($workProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

	<div class="span-6">
		<?php echo $form->labelEx($workProfile,'name',array('label'=>'Job')); ?>
		<?php echo $form->textField($workProfile,'name'); ?>
		<?php echo $form->error($workProfile,'name'); ?>
            <br></br>
		<?php echo $form->labelEx($workProfile,'work_type',array('label'=>'Work Type/Area')); ?>
                <?php echo $form->dropDownList($workProfile,'work_type', WorkProfile::$WorkTypeArray,array('prompt'=>'Select Work Type')); ?>
		<?php echo $form->error($workProfile,'work_type'); ?>
            <br></br>
		<?php echo $form->labelEx($workProfile,'title'); ?>
		<?php echo $form->dropdownList($workProfile,'title',WorkProfile::$TitleArray,array('prompt'=>'Enter Work Title')); ?>
		<?php echo $form->error($workProfile,'title'); ?>
            <br></br>
		<?php echo $form->labelEx($workProfile,'year_begin',array('label'=>'From')); ?>
		<?php echo $form->dropdownList($workProfile,'year_begin',WorkProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
		<?php echo $form->error($workProfile,'year_begin'); ?>
            <br></br>
		<?php echo $form->labelEx($workProfile,'year_end',array('label'=>'To')); ?>
		<?php echo $form->dropdownList($workProfile,'year_end',WorkProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
		<?php echo $form->error($workProfile,'year_end'); ?>
            <br></br>
                <?php echo $form->labelEx($workProfile,'hours',array('label'=>'Hours/Week')); ?>
                <?php echo $form->dropDownList($workProfile,'hours', WorkProfile::$HoursArray,array('prompt'=>'Enter Hours Worked per Week')); ?>
		<?php echo $form->error($workProfile,'hours'); ?>
            <br></br>
            <div class="wform">
		<?php echo $form->labelEx($workProfile,'comments',array('label'=>'Notes/Comments')); ?>
		<?php echo $form->textField($workProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($workProfile,'comments'); ?>
	</div>     
</div>
        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>

        <?php if(Yii::app()->user->hasFlash('workSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('workSuccess'); ?> 
        </div> <?php endif; ?>    
    	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>