<div class="container">
    <div class="form">
    <div class="span-12 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sat2-grid',
	'dataProvider'=>$sat2Profile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
		array(
                  'name'=>'Subject',
                  'value'=>'$data->sat2->subject',
                ),
                'score:number:Score',
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteSat2", array("id" => $data->id))',


		),
	),
)); ?>
</div>
    
        
            <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->

<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sat2-profile-sat2-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php //echo $form->errorSummary($sat2Profile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>


	    <div class="span-5">
		<?php echo $form->labelEx($sat2Profile,'sat2_id',array('label'=>'SAT II Subject')); ?>
                <?php echo $form->dropDownList($sat2Profile,'sat2_id', $sat2Profile->getTestTypeOptions()); ?>
		<?php echo $form->error($sat2Profile,'sat2_id'); ?>
	
                </div>
                <div class="span-6 last">

	
		<?php echo $form->labelEx($sat2Profile,'score',array('label'=>'Score')); ?>
		 <?php echo $form->dropDownList($sat2Profile,'score',Sat2Profile::$Sat2ScoreArray,  array('prompt'=>'Select Score')); ?>
		<?php echo $form->error($sat2Profile,'score'); ?>
	</div>
        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->
<!--	<div class="row">
		<?php echo $form->labelEx($sat2Profile,'date_taken',array('label'=>'Date Taken')); ?>
		<?php echo $form->textField($sat2Profile,'date_taken'); ?>
		<?php echo $form->error($sat2Profile,'date_taken'); ?>
	</div>-->
        


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('sat2Success')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('sat2Success'); ?> 
        </div> <?php endif; ?>    
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>