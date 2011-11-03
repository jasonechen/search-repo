<div class="container">
    <div class="form">
    <div class="span-18 last">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'summer-grid',
	'dataProvider'=>$summerProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'name:text:Summer Activity Name',
		array(
                  'name'=>'ActivityType',
                  'value'=>'SummerProfile::convertSummer($data->summer_id)',),        
                array(
                  'name'=>'Summer',
                  'value'=>'SummerProfile::convertSummerDate($data->summer_date)',),

                   
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteSummer", array("id" => $data->id))',


		),
	),
)); ?>
    
<?php 
   //     $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'volunteer-profile-volunteer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($summerProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>

	<div class="span-6">
		<?php echo $form->labelEx($summerProfile,'name',array('label'=>'Summer Activity Name')); ?>
		<?php echo $form->textField($summerProfile,'name'); ?>
		<?php echo $form->error($summerProfile,'name'); ?>
            <br></br>
		<?php echo $form->labelEx($summerProfile,'summer_id',array('label'=>'Activity Type')); ?>
                <?php echo $form->dropDownList($summerProfile,'summer_id', SummerProfile::$SummerTypeArray,array('prompt'=>'Select Summer Activity Type')); ?>
		<?php echo $form->error($summerProfile,'summer_id'); ?>
            <br></br>
		<?php echo $form->labelEx($summerProfile,'summer_date',array('label'=>'Summer')); ?>
		<?php echo $form->dropdownList($summerProfile,'summer_date',SummerProfile::$SummerDateArray,array('prompt'=>'Enter Summer Year')); ?>
		<?php echo $form->error($summerProfile,'summer_date'); ?>
            <br></br>
            <div class="wform">
		<?php echo $form->labelEx($summerProfile,'comments',array('label'=>'Notes/Comments')); ?>
		<?php echo $form->textField($summerProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($summerProfile,'comments'); ?>
	</div>     
</div>
        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>

        <?php if(Yii::app()->user->hasFlash('summerSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('summerSuccess'); ?> 
        </div> <?php endif; ?>    
    	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>