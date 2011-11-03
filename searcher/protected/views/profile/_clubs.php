<div class="container">
    <div class="form">
    <div class="span-18 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'activity-grid',
	'dataProvider'=>$activityProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'name:text:Name',
		array(
                  'name'=>'Activity Type',
                  'value'=>'$data->activityType->name',
                ),
                array(
                  'name'=>'Leadership',
                  'value'=>'ActivityProfile::convertLeadership($data->leadership)',
                ),
                array(
                  'name'=>'Hours/Week',
                  'value'=>'ActivityProfile::convertHours($data->hours_per_week)',
                ),
                array(
                  'name'=>'From',
                  'value'=>'ActivityProfile::convertYears($data->year_participate_begin)',),
                array(
                  'name'=>'To',
                  'value'=>'ActivityProfile::convertYears($data->year_participate_end)',),
                'comments:text:Notes',
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteExtracurricular", array("id" => $data->id))',


		),
	),
)); ?>
    </div>
    <div class="span-26"> <br>  </div>
  
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-profile-activity-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="span-6">  	 
	<?php echo $form->errorSummary($activityProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>
 
		<?php echo $form->labelEx($activityProfile,'name',array('label'=>'Name')); ?>
		<?php echo $form->textField($activityProfile,'name'); ?>
		<?php echo $form->error($activityProfile,'name'); ?>
            <br></br>
		<?php echo $form->labelEx($activityProfile,'activity_type_id',array('label'=>'Club Type')); ?>
                <?php echo $form->dropDownList($activityProfile,'activity_type_id', $activityProfile->getActivityTypeOptions(),array('prompt'=>'Club Type')); ?>
		<?php echo $form->error($activityProfile,'activity_type_id'); ?>
            <br></br>
		<?php echo $form->labelEx($activityProfile,'leadership',array('label'=>'Leadership')); ?>
                <?php echo $form->dropDownList($activityProfile,'leadership', ActivityProfile::$LeadershipArray,array('prompt'=>'Leadership Position')); ?>
		<?php echo $form->error($activityProfile,'leadership'); ?>
            <br></br>
            
     
		<?php echo $form->labelEx($activityProfile,'year_participate_begin',array('label'=>'From')); ?>
		<?php echo $form->dropdownList($activityProfile,'year_participate_begin',ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
		<?php echo $form->error($activityProfile,'year_participate_begin'); ?>
    <br></br>
	<?php echo $form->labelEx($activityProfile,'year_participate_end',array('label'=>'To')); ?>
		<?php echo $form->dropdownList($activityProfile,'year_participate_end',ActivityProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
		<?php echo $form->error($activityProfile,'year_participate_end'); ?>
   
    <br></br>
		<?php echo $form->labelEx($activityProfile,'hours_per_week',array('label'=>'Hours/Week')); ?>
                <?php echo $form->dropDownList($activityProfile,'hours_per_week', ActivityProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?>
		<?php echo $form->error($activityProfile,'hours_per_week'); ?>
            <br></br>
            <div class="wform">
		<?php echo $form->labelEx($activityProfile,'comments',array('label'=>'Notes')); ?>
		<?php echo $form->textField($activityProfile,'comments',array('size'=>150,'maxlength'=>100)); ?>
		<?php echo $form->error($activityProfile,'comments'); ?>
        </div></div>
            
    
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    
        
	<div class="span-26">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	</div>
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    
        <div class="span-26">
        <?php if(Yii::app()->user->hasFlash('activitySuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('activitySuccess'); ?> 
        </div> <?php endif; ?>    
        </div>
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->     
<?php $this->endWidget(); ?>
        </div>
</div>