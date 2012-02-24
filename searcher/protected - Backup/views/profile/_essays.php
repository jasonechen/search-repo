<div class="container">
        <div class="span-17 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'essay-grid',
	'dataProvider'=>$essayProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'name:text:Name',
//                'date_taken:date:Date taken',
		/*
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template' => '{view} {delete}',
                        'afterDelete'=>'function(link,success,data){ if(success) alert("Delete completed successfuly"); }',

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteEssay", array("id" => $data->id))',
                        'viewButtonUrl'=>'Yii::app()->createUrl("/profile/viewEssay", array("id" => $data->id))',

		),
	),
)); ?>
        </div>
<?php 
        $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'essay-profile-essay-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($essayProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>


	<div class="span-24">
		<?php echo $form->labelEx($essayProfile,'name',array('label'=>'Story Name')); ?>
		<?php echo $form->textField($essayProfile,'name'); ?>
		<?php echo $form->error($essayProfile,'name'); ?>
	</div>
        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->

	<div class="span-24">
		<?php echo $form->labelEx($essayProfile,'data',array('label'=>'Story Content')); ?>
		<?php echo $form->textArea($essayProfile,'data'); ?>
		<?php echo $form->error($essayProfile,'data'); ?>
	</div>

        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->

	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('essaySuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('essaySuccess'); ?> 
        </div> <?php endif; ?>    
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->