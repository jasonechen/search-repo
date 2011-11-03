<div class="container">
    <div class="form">
    <div class="span-12 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ap-grid',
	'dataProvider'=>$apProfile->allByUser(),
         'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',
    
	'enablePagination'=>false,
	'summaryText'=>"",
        'columns'=>array(
		array(
                  'name'=>'Subject',
                  'value'=>'$data->ap->name',
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
                        'afterDelete'=>'function(link,success,data){ if(success) alert("Score Deleted!"); }',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteAp", array("id" => $data->id))',
		),
	),
)); ?>
  </div>      
            <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->  
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ap-profile-ap-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="span-6">
	<?php // echo $form->errorSummary($apProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>



		<?php echo $form->labelEx($apProfile,'ap_id',array('label'=>'AP Subject')); ?>
                <?php echo $form->dropDownList($apProfile,'ap_id', $apProfile->getTestTypeOptions()); ?>
		<?php echo $form->error($apProfile,'ap_id'); ?>
	</div>

	<div class="span-5 last">	
		<?php echo $form->labelEx($apProfile,'score',array('label'=>'Score')); ?>
		<?php echo $form->dropDownList($apProfile,'score',  array(1=>'1',
                                                                            2=>'2',3=>'3',
                                                                            4=>'4',5=>'5',
                                                                            ),array('prompt'=>'Enter Score')); ?>
		<?php echo $form->error($apProfile,'score'); ?>
	</div>

            <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->
<!--	<div class="row">
		<?php echo $form->labelEx($apProfile,'date_taken',array('label'=>'Date Taken')); ?>
		<?php echo $form->textField($apProfile,'date_taken'); ?>
		<?php echo $form->error($apProfile,'date_taken'); ?>
	</div>-->
        


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('apSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('apSuccess'); ?> 
        </div> <?php endif; ?>    
    </div>  
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>