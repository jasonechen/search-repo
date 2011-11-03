<div class="container">
<div class="form">
    <div class="span-18 last">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'volunteer-grid',
	'dataProvider'=>$volunteerProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'name:text:Org Name',
		array(
                  'name'=>'Service Type',
                  'value'=>'VolunteerProfile::convertVolunteer($data->volunteertype_id)',),        
                array(
                  'name'=>'From',
                  'value'=>'VolunteerProfile::convertYears($data->year_begin)',),
                array(
                  'name'=>'To',
                  'value'=>'VolunteerProfile::convertYears($data->year_end)',),
                array(
                  'name'=>'Leadership',
                  'value'=>'VolunteerProfile::convertLeader($data->leadership)',),
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteVolunteer", array("id" => $data->id))',


		),
	),
)); ?>
    
<?php 
 //       $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'volunteer-profile-volunteer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($volunteerProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

	<div class="span-6">
		<?php echo $form->labelEx($volunteerProfile,'name',array('label'=>'Organization Name')); ?>
		<?php echo $form->textField($volunteerProfile,'name'); ?>
		<?php echo $form->error($volunteerProfile,'name'); ?>
            <br></br>
		<?php echo $form->labelEx($volunteerProfile,'volunteertype_id',array('label'=>'Service Type')); ?>
                <?php echo $form->dropDownList($volunteerProfile,'volunteertype_id', VolunteerProfile::$VolunteerTypeArray,array('prompt'=>'Select Service Type')); ?>
		<?php echo $form->error($volunteerProfile,'volunteertype_id'); ?>
            <br></br>
		<?php echo $form->labelEx($volunteerProfile,'leadership'); ?>
		<?php echo $form->dropdownList($volunteerProfile,'leadership',VolunteerProfile::$LeadershipArray,array('prompt'=>'Enter Leadership/Participation')); ?>
		<?php echo $form->error($volunteerProfile,'leadership'); ?>
            <br></br>
		<?php echo $form->labelEx($volunteerProfile,'year_begin',array('label'=>'From')); ?>
		<?php echo $form->dropdownList($volunteerProfile,'year_begin',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
		<?php echo $form->error($volunteerProfile,'year_begin'); ?>
            <br></br>
		<?php echo $form->labelEx($volunteerProfile,'year_end',array('label'=>'To')); ?>
		<?php echo $form->dropdownList($volunteerProfile,'year_end',VolunteerProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
		<?php echo $form->error($volunteerProfile,'year_end'); ?>
            <br></br>
                <?php echo $form->labelEx($volunteerProfile,'hours',array('label'=>'Hours/Week')); ?>
                <?php echo $form->dropDownList($volunteerProfile,'hours', VolunteerProfile::$HoursArray,array('prompt'=>'Enter Hours Spent per Week')); ?>
		<?php echo $form->error($volunteerProfile,'hours'); ?>
            <br></br>
            <div class="wform">
		<?php echo $form->labelEx($volunteerProfile,'comments',array('label'=>'Notes/Comments')); ?>
		<?php echo $form->textField($volunteerProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($volunteerProfile,'comments'); ?>
	</div>    
        </div> 

        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>

        <?php if(Yii::app()->user->hasFlash('volunteerSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('volunteerSuccess'); ?> 
        </div> <?php endif; ?>    
    	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>