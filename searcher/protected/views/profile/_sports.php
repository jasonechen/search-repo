<div class="container">
    <div class="span-18 last">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sport-grid',
	'dataProvider'=>$sportProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
		array(
                  'name'=>'Sport',
                  'value'=>'$data->sport->name',
                ),
                array(
                  'name'=>'From',
                  'value'=>'SportProfile::convertYears($data->year_begin)',),
                array(
                  'name'=>'To',
                  'value'=>'SportProfile::convertYears($data->year_end)',),
                array(
                  'name'=>'Level',
                  'value'=>'SportProfile::convertLevel($data->level)',),
                array(
                  'name'=>'Leadership',
                  'value'=>'SportProfile::convertLeader($data->leadership)',),
                array(
                  'name'=>'Individual',
                  'value'=>'SportProfile::convertIndivRank($data->indiv_rank)',),
                array(
                  'name'=>'Team',
                  'value'=>'SportProfile::convertTeamRank($data->team_rank)',),
                array(
                  'name'=>'Other Recognition',
                  'value'=>'SportProfile::convertOtherRecog($data->other_recog)',),
                
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteSport", array("id" => $data->id))',


		),
	),
)); ?>
  <div class="form">  
<?php 
 //       $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-profile-sport-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($sportProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>


	<div class="span-6">
		<?php echo $form->labelEx($sportProfile,'sport_id',array('label'=>'Sport')); ?>
                <?php echo $form->dropDownList($sportProfile,'sport_id', $sportProfile->getSportTypeOptions(),array('prompt'=>'Select Sport')); ?>
		<?php echo $form->error($sportProfile,'sport_id'); ?>
            <br></br>
		<?php echo $form->labelEx($sportProfile,'level',array('label'=>'Level')); ?>
		<?php echo $form->dropdownList($sportProfile,'level',SportProfile::$LevelArray,array('prompt'=>'Enter Level')); ?>
		<?php echo $form->error($sportProfile,'level'); ?>
            <br></br>
		<?php echo $form->labelEx($sportProfile,'year_begin',array('label'=>'From')); ?>
		<?php echo $form->dropdownList($sportProfile,'year_begin',SportProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
		<?php echo $form->error($sportProfile,'year_begin'); ?>
            <br></br>
		<?php echo $form->labelEx($sportProfile,'year_end',array('label'=>'To')); ?>
		<?php echo $form->dropdownList($sportProfile,'year_end',SportProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
		<?php echo $form->error($sportProfile,'year_end'); ?>
            <br></br>
		<?php echo $form->labelEx($sportProfile,'leadership'); ?>
		<?php echo $form->dropdownList($sportProfile,'leadership',SportProfile::$LeadershipArray,array('prompt'=>'Enter Leadership Position')); ?>
		<?php echo $form->error($sportProfile,'leadership'); ?>
            <br></br>
		<?php echo $form->labelEx($sportProfile,'indiv_rank'); ?>
		<?php echo $form->dropdownList($sportProfile,'indiv_rank',SportProfile::$IndivRankArray,array('prompt'=>'Enter Highest Individual Level')); ?>
		<?php echo $form->error($sportProfile,'indiv_rank'); ?>
            <br></br>
		<?php echo $form->labelEx($sportProfile,'team_rank'); ?>
		<?php echo $form->dropdownList($sportProfile,'team_rank',SportProfile::$TeamRankArray,array('prompt'=>'Enter Highest Team Level')); ?>
		<?php echo $form->error($sportProfile,'team_rank'); ?>
            <br></br>
		<?php echo $form->labelEx($sportProfile,'other_recog'); ?>
		<?php echo $form->dropdownList($sportProfile,'other_recog',SportProfile::$OtherRecogArray,array('prompt'=>'Select Other Recognition')); ?>
		<?php echo $form->error($sportProfile,'other_recog'); ?>
            <br></br>
            <div class="wform">
		<?php echo $form->labelEx($sportProfile,'comments',array('label'=>'Notes/Comments')); ?>
		<?php echo $form->textField($sportProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($sportProfile,'comments'); ?>
	</div>   </div>  

        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>

        <?php if(Yii::app()->user->hasFlash('sportSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('sportSuccess'); ?> 
        </div> <?php endif; ?>    
    	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>