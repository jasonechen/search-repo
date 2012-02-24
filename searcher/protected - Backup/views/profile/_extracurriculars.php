<div class="form">

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
                'years_of_participation:number:Years of Participation',
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteExtracurricular", array("id" => $data->id))',


		),
	),
)); ?>
    
<?php 
        $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-profile-activity-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($activityProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>


        
	<div class="span-5">
		<?php echo $form->labelEx($activityProfile,'name',array('label'=>'Name')); ?>
		<?php echo $form->textField($activityProfile,'name'); ?>
		<?php echo $form->error($activityProfile,'name'); ?>
	</div>

	<div class="span-6 last">
		<?php echo $form->labelEx($activityProfile,'activity_type_id',array('label'=>'Activity Type')); ?>
                <?php echo $form->dropDownList($activityProfile,'activity_type_id', $activityProfile->getActivityTypeOptions()); ?>
		<?php echo $form->error($activityProfile,'activity_type_id'); ?>
	</div>
    
        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->            
    
	<div class="span-5">
		<?php echo $form->labelEx($activityProfile,'leadership',array('label'=>'Leadership')); ?>
                <?php echo $form->dropDownList($activityProfile,'leadership', ActivityProfile::$LeadershipArray); ?>
		<?php echo $form->error($activityProfile,'leadership'); ?>
	</div>

	<div class="span-5">
		<?php echo $form->labelEx($activityProfile,'hours_per_week',array('label'=>'Hours/Week')); ?>
                <?php echo $form->dropDownList($activityProfile,'hours_per_week', ActivityProfile::$HoursArray); ?>
	</div>

	<div class="span-6 last">
		<?php echo $form->labelEx($activityProfile,'years_of_participation',array('label'=>'Years of Participation')); ?>
		<?php echo $form->textField($activityProfile,'years_of_participation'); ?>
		<?php echo $form->error($activityProfile,'years_of_participation'); ?>
	</div>

        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->    
	<div class="span-5">
		<?php /*echo $form->labelEx($activityProfile,'comments',array('label'=>'Notes/Comments')); ?>
		<?php echo $form->textField($activityProfile,'comments'); ?>
		<?php echo $form->error($activityProfile,'comments'); */?>
	</div>
        
        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->    
        
	<div class="span-24">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	</div>
        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->    
        <div class="span-24">
        <?php if(Yii::app()->user->hasFlash('activitySuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('activitySuccess'); ?> 
        </div> <?php endif; ?>    
        </div>
        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->     
<?php $this->endWidget(); ?>

</div><!-- form -->