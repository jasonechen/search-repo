<div class="container">
<div class="form">
    <div class="span-12 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'otherschool-grid',
	'dataProvider'=>$otherschooladmitProfile->allByUser(),
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
		array(
                  'name'=>'Other Schools Admitted To',
                  'value'=>'$data->otherschoolids->name',
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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteOtherSchoolAdmit", array("id" => $data->id))',


		),
	),
)); ?>
    </div>
              <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->  
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'otherschool-profile-otherschool-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="span-6">
        <?php echo $form->hiddenField($otherschooladmitProfile,'otherschool_id'); ?>
	<?php echo $form->errorSummary($otherschooladmitProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>



		
		<?php echo $form->labelEx($otherschooladmitProfile,'otherschool_id',array('label'=>'Other Schools Admitted To')); ?>
		<?php
                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'=>$otherschooladmitProfile,
                        'attribute'=>'other_university_name',
//                        'id'=>'first_university_id',
                        'name'=>'otherschool_id',
                        'source'=>$this->createURL('profile/suggestUniversity'),
                         // additional javascript options for the autocomplete plugin
                        'options'=>array(
                            'minLength'=>'2',
                            'select'=>"js:function(event, ui) {
                                    $('#OtherSchoolAdmitProfile_otherschool_id').val(ui.item['id']);
                                }"
                            ),
                        'htmlOptions'=>array(
                            'style'=>'height:18px;width:220px'
                            ),
                )); ?>
		<?php echo $form->error($otherschooladmitProfile,'otherschool_id'); ?>
	</div>
	    
    
        <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->
       

        <div class="span-5 last">
	
		<?php echo CHtml::submitButton('Add and Save'); ?>
	

        <?php if(Yii::app()->user->hasFlash('otherschoolSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('otherschoolSuccess'); ?> 
        </div> <?php endif; ?>    
    
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>