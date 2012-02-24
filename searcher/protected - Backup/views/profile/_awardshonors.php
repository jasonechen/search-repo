<div class="container">
    <div class="form">
    <div class="span-16 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'award-grid',
	'dataProvider'=>$awardProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'award_name:text:Name',
                array(
                  'name'=>'Year',
                  'value'=>'AwardProfile::convertDate($data->year)',),        
                array(
                  'name'=>'Level',
                  'value'=>'AwardProfile::convertRegion($data->region)',),
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteAward", array("id" => $data->id))',


		),
	),
)); ?>
    </div>
                   <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->  
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'award-profile-award-form',
	'enableAjaxValidation'=>false,
)); ?>



<div class="span-6">
    	<?php echo $form->errorSummary($awardProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>
		<?php echo $form->labelEx($awardProfile,'award_name',array('label'=>'Award/Honor')); ?>
		<?php echo $form->textField($awardProfile,'award_name'); ?>
		<?php echo $form->error($awardProfile,'award_name'); ?>
                <br></br>
                
		<?php echo $form->labelEx($awardProfile,'year',array('label'=>'Year')); ?>
		<?php echo $form->dropdownList($awardProfile,'year',AwardProfile::$AwardDateArray,array('prompt'=>'Enter Year')); ?>
                <br></br>
                
		<?php echo $form->labelEx($awardProfile,'region',array('label'=>'Level')); ?>
		<?php echo $form->dropdownList($awardProfile,'region',AwardProfile::$RegionArray,array('prompt'=>'Enter Level')); ?>
		<?php echo $form->error($awardProfile,'region'); ?>

                <br></br>
		<?php echo $form->labelEx($awardProfile,'comments',array('label'=>'Description')); ?>
		<?php echo $form->textField($awardProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($awardProfile,'comments'); ?>
	</div>     
       
    

        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    
        <!--took out numb of competitors code-->
        
        

	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('awardSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('awardSuccess'); ?> 
        </div> <?php endif; ?>    
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>