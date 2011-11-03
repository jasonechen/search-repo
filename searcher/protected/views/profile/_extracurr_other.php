<div class="container">
<div class="form">
    <div class="span-18 last">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'other-grid',
	'dataProvider'=>$otherProfile->allByUser(),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridView/styles.css',    
	'enablePagination'=>false,
	'summaryText'=>"",
	'columns'=>array(
                'name:text:Activity Name',
                
	        array(
                  'name'=>'From',
                  'value'=>'OtherProfile::convertYears($data->year_begin)',),
                array(
                  'name'=>'To',
                  'value'=>'OtherProfile::convertYears($data->year_end)',),
         'comments:text:Description',

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

                        'deleteButtonUrl'=>'Yii::app()->createUrl("/profile/deleteOther", array("id" => $data->id))',


		),
	),
)); ?>
    
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'other-profile-other-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="span-6">
	<?php echo $form->errorSummary($otherProfile); ?>
        <?php //echo $form->errorSummary($personalProfile); ?>


		<?php echo $form->labelEx($otherProfile,'name',array('label'=>'Other Activity')); ?>
		<?php echo $form->textField($otherProfile,'name'); ?>
		<?php echo $form->error($otherProfile,'name'); ?>
   
            <br></br>
		<?php echo $form->labelEx($otherProfile,'year_begin',array('label'=>'From')); ?>
		<?php echo $form->dropdownList($otherProfile,'year_begin',OtherProfile::$YearParticipateArray,array('prompt'=>'Enter Begin Year')); ?>
		<?php echo $form->error($otherProfile,'year_begin'); ?>
            <br></br>

		<?php echo $form->labelEx($otherProfile,'year_end',array('label'=>'To')); ?>
		<?php echo $form->dropdownList($otherProfile,'year_end',OtherProfile::$YearParticipateArray,array('prompt'=>'Enter End Year')); ?>
		<?php echo $form->error($otherProfile,'year_end'); ?>
	         <br></br>
                        <div class="wform">
		<?php echo $form->labelEx($otherProfile,'comments',array('label'=>'Description')); ?>
		<?php echo $form->textField($otherProfile,'comments',array('size'=>80,'maxlength'=>100)); ?>
		<?php echo $form->error($otherProfile,'comments'); ?>
                            </div>
        
        </div>
        
     <div class="span-26"> <br>  </div>    <!-- row spacer*/ -->          
 
	
   

        
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    


	<div class="span-6 last">
		<?php echo CHtml::submitButton('Add and Save'); ?>

        <?php if(Yii::app()->user->hasFlash('otherSuccess')):?> 
        <div class="successMessage" id="inputsuccess"> 
        <?php echo Yii::app()->user->getFlash('otherSuccess'); ?> 
        </div> <?php endif; ?>    
    	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>