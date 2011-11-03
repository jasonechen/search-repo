<div class="container">
<div class="form">
    <div class="span-18 last">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'music-grid',
	'dataProvider'=>$musicProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
		array(
                  'name'=>'Music Activity',
                  'value'=>'MusicProfile::convertMusic($data->music)',),
                
                array(
                  'name'=>'From',
                  'value'=>'MusicProfile::convertYears($data->year_begin)',),
                array(
                  'name'=>'To',
                  'value'=>'MusicProfile::convertYears($data->year_end)',),
                array(
                  'name'=>'Proficiency',
                  'value'=>'MusicProfile::convertLevel($data->level)',),
                array(
                  'name'=>'School Orchestra/Band',
                  'value'=>'MusicProfile::convertSchoolMusic($data->school_orchband)',),
                array(
                  'name'=>'School Position',
                  'value'=>'MusicProfile::convertSchoolLevel($data->school_leader)',),
                array(
                  'name'=>'External Participation',
                  'value'=>'MusicProfile::convertExtMusic($data->ext_orchband)',),
                array(
                  'name'=>'External Position',
                  'value'=>'MusicProfile::convertSchoolLevel($data->ext_leader)',),
                
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteMusic", array("id" => $data->id))',


		),
	),
)); ?>
        <div class="form">
<?php 
  //      $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'music-profile-music-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($musicProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>


	<div class="span-6">
		<?php echo $form->labelEx($musicProfile,'music',array('label'=>'Music Activity')); ?>
                <?php echo $form->dropDownList($musicProfile,'music', MusicProfile::$MusicArray,array('prompt'=>'Select Musical Activity')); ?>
		<?php echo $form->error($musicProfile,'music'); ?>
            <br></br>
		<?php echo $form->labelEx($musicProfile,'level',array('label'=>'Level')); ?>
		<?php echo $form->dropdownList($musicProfile,'level',MusicProfile::$LevelArray,array('prompt'=>'Enter Proficiency')); ?>
		<?php echo $form->error($musicProfile,'level'); ?>
            <br></br>
		<?php echo $form->labelEx($musicProfile,'year_begin',array('label'=>'From')); ?>
		<?php echo $form->dropdownList($musicProfile,'year_begin',MusicProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
		<?php echo $form->error($musicProfile,'year_begin'); ?>
            <br></br>
		<?php echo $form->labelEx($musicProfile,'year_end',array('label'=>'To')); ?>
		<?php echo $form->dropdownList($musicProfile,'year_end',MusicProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
		<?php echo $form->error($musicProfile,'year_end'); ?>
            <br></br>
		<?php echo $form->labelEx($musicProfile,'school_orchband'); ?>
		<?php echo $form->dropdownList($musicProfile,'school_orchband',MusicProfile::$SchoolMusicArray,array('prompt'=>'Enter School Activity')); ?>
		<?php echo $form->error($musicProfile,'school_orchband'); ?>
            <br></br>
		<?php echo $form->labelEx($musicProfile,'school_leader'); ?>
		<?php echo $form->dropdownList($musicProfile,'school_leader',MusicProfile::$SchoolLevelArray,array('prompt'=>'Enter School Music Position')); ?>
		<?php echo $form->error($musicProfile,'school_leader'); ?>
            <br></br>
		<?php echo $form->labelEx($musicProfile,'ext_orchband'); ?>
		<?php echo $form->dropdownList($musicProfile,'ext_orchband',MusicProfile::$ExtMusicArray,array('prompt'=>'Enter External Music Activity')); ?>
		<?php echo $form->error($musicProfile,'ext_orchband'); ?>
            <br></br>
		<?php echo $form->labelEx($musicProfile,'ext_leader'); ?>
		<?php echo $form->dropdownList($musicProfile,'ext_leader',MusicProfile::$SchoolLevelArray,array('prompt'=>'Select External Position')); ?>
		<?php echo $form->error($musicProfile,'ext_leader'); ?>
            <br></br>
            <div class="wform">
		<?php echo $form->labelEx($musicProfile,'comments',array('label'=>'Notes/Comments')); ?>
		<?php echo $form->textField($musicProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($musicProfile,'comments'); ?>
	</div>     </div>

        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>

        <?php if(Yii::app()->user->hasFlash('musicSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('musicSuccess'); ?> 
        </div> <?php endif; ?>    
    	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
    </div>
</div>