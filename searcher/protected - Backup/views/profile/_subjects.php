<div class="container">
<div class="form">
    <div class="span-12 last">
<?php 

 //   $this->widget('ext.pixelmatrix.EUniform'); 
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subject-grid',
	'dataProvider'=>$subjectProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                array(
                  'name'=>'Subject',
                  'value'=>'$data->subject->name',
                    ),
                array(
                  'name'=>'Year Taken',
                  'value'=>'SubjectProfile::convertYear($data->year_taken)',
                ),
                array(
                  'name'=>'Honors or AP',
                  'value'=>'SubjectProfile::convertHonors($data->honors_or_AP)',
                ),
                array(
                  'name'=>'Number of months',
                  'value'=>'($data->num_months !== 0) ? $data->num_months : "" ',
                ),
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteSubject", array("id" => $data->id))',


		),
	),
)); ?>
    </div>
    
                <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->  
        
        
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subject-profile-subject-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="span-6 last">
	<?php echo $form->errorSummary($subjectProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>
    

        <?php echo $form->labelEx($subjectProfile,'subject_id'); ?>
        <?php echo $form->dropDownList($subjectProfile,'subject_id', $subjectProfile->getSubject(),array('prompt'=>'Select Subject')); ?>
        <?php echo $form->error($subjectProfile,'subject_id'); ?>
        </div>
        <div class="span-26"> <br>  </div>
	<div class="span-6 last">
		<?php echo $form->labelEx($subjectProfile,'year_taken',array('label'=>'Year taken')); ?>
		<?php echo $form->dropDownList($subjectProfile,'year_taken',array(0=>'Freshman',
                                                                        1=>'Sophomore',
                                                                         2=>'Junior',
                                                                         3=>'Senior',
                                                                         4=>'After 4th year',
                    )); ?>
	</div>
        <div class="span-26"> <br>  </div>
	<div class="span-6 last">
		<?php echo $form->labelEx($subjectProfile,'honors_or_AP',array('label'=>'Honors/AP')); ?>
                <?php echo $form->dropDownList($subjectProfile,'honors_or_AP',  array(0=>'',
                                                                        1=>'Honors',
                                                                         2=>'AP')); ?>
	</div>
        <div class="span-26"> <br>  </div>
	<div class="span-6 last">
		<?php echo $form->labelEx($subjectProfile,'num_months',array('label'=>'Number of months')); ?>
                <?php echo $form->dropDownList($subjectProfile,'num_months',  array(0=>'',
                                                                        1=>'1',
                                                                        2=>'2',
                                                                        3=>'3',
                                                                        4=>'4',
                                                                        5=>'5',
                                                                        6=>'6',
                                                                        7=>'7',
                                                                        8=>'8',
                                                                        9=>'9',
                                                                        10=>'10',
                                                                        11=>'11',
                                                                        12=>'12',
                    
                    )); ?>
	</div>    
           <div class="span-26"> <br>  </div> 

	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('subjectSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('subjectSuccess'); ?> 
        </div> <?php endif; ?>    
 </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>