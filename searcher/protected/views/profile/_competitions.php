<div class="container">
<div class="form">
    <div class="span-16 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competition-grid',
	'dataProvider'=>$competitionProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'name_of_competition:text:Name',
               array(
                  'name'=>'Year',
                  'value'=>'AwardProfile::convertDate($data->year)',),        
                array(
                  'name'=>'Level',
                  'value'=>'AwardProfile::convertRegion($data->region)',),  
                'rank_or_score:text:Rank/Score',
                'num_competitors::# of Competitors',
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteCompetition", array("id" => $data->id))',


		),
	),
)); ?>
    </div>
                   <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->  
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competition-profile-competition-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="span-5">

	<?php echo $form->errorSummary($competitionProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>
            
		<?php echo $form->labelEx($competitionProfile,'name_of_competition',array('label'=>'Name')); ?>
		<?php echo $form->textField($competitionProfile,'name_of_competition'); ?>
		<?php echo $form->error($competitionProfile,'name_of_competition'); ?>
	
                <br></br>
    
 	
		<?php echo $form->labelEx($competitionProfile,'region'); ?>
		<?php echo $form->dropdownList($competitionProfile,'region',AwardProfile::$RegionArray,array('prompt'=>'Enter Level')); ?>
		<?php echo $form->error($competitionProfile,'region'); ?>
<br></br>
		<?php echo $form->labelEx($competitionProfile,'year',array('label'=>'Year')); ?>
		<?php echo $form->dropdownList($competitionProfile,'year',AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year')); ?>
		<?php echo $form->error($competitionProfile,'year'); ?>
	<br></br>
		<?php echo $form->labelEx($competitionProfile,'rank_or_score'); ?>
		<?php echo $form->textField($competitionProfile,'rank_or_score'); ?>
		<?php echo $form->error($competitionProfile,'rank_or_score'); ?>
	<br></br>
		<?php echo $form->labelEx($competitionProfile,'num_competitors'); ?>
		<?php echo $form->textField($competitionProfile,'num_competitors'); ?>
		<?php echo $form->error($competitionProfile,'num_competitors'); ?>
        <br></br>
                <?php echo $form->labelEx($competitionProfile,'comments',array('label'=>'Description')); ?>
		<?php echo $form->textField($competitionProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($competitionProfile,'comments'); ?>
	</div>     
        
        
    
       
    

        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    
        <!--took out numb of competitors code-->
        
        

	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('competitionSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('competitionSuccess'); ?> 
        </div> <?php endif; ?>    
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>