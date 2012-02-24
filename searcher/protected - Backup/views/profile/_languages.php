<div class="container">
<div class="form">
    <div class="span-12 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lang-grid',
	'dataProvider'=>$languageProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
		array(
                  'name'=>'Languages',
                  'value'=>'$data->lang->name',
                ),
                  array(
                  'name'=>'Fluency',
                  'value'=>'LanguageProfile::convertFluency($data->fluency)',
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteLang", array("id" => $data->id))',


		),
	),
)); ?>
        </div>
            <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->
 
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lang-profile-lang-form',
	'enableAjaxValidation'=>false,
)); ?>
        <div class="span-5">   
	<?php echo $form->errorSummary($languageProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>


	
		<?php echo $form->labelEx($languageProfile,'language_id',array('label'=>'Language')); ?>
                <?php echo $form->dropDownList($languageProfile,'language_id', $languageProfile->getLangTypeOptions()); ?>
		<?php echo $form->error($languageProfile,'language_id'); ?>
	</div>

	<div class="span-6 last">
		<?php echo $form->labelEx($languageProfile,'fluency',array('label'=>'Fluency Level')); ?>
		<?php echo $form->dropDownList($languageProfile,'fluency', array(''=>'',
                                                                        '1'=>'Full Fluency',
                                                                         '2'=>'Moderate Speaking and Reading Fluency',
                                                                         '3'=>'Speaking Only Fluency',
                                                                         '4'=>'Elementary Fluency',
                                                                         '5'=>'Reading Fluency Only')
                                                                            ); ?>
		<?php echo $form->error($languageProfile,'fluency'); ?>
	</div>

    
    
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->
       


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('langSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('langSuccess'); ?> 
        </div> <?php endif; ?>    
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>