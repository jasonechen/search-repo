<div class="form">


    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'filter-form',
        'enableAjaxValidation' => false,
        'action' => $this->createUrl('search/index'),
        'method' => 'get', 
    ));
    ?>
        <?php echo $form->hiddenField($model,'first_university_id'); ?>
    
        <div class="clear"></div><br/>
        <div class="filtercheckform">
            <div class="row">

                 <?php echo $form->labelEx($model, 'race_id', array('label'=>'Race')); ?>
                <br/>
                 <?php echo $form->checkBoxList($model, 'race_id', RaceType::getTypes()); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'gender'); ?>
                <br/>
                <?php echo $form->checkBoxList($model, 'gender', array(
                                                                         'M' => 'Male',
                                                                         'F' => 'Female',
                                                                    ));
                ?>
            </div>
            <?php //echo $form->hiddenField($model, 'first_university_id', array('value' => 1)); ?>
        </div>
  
        <div class="row">
		<?php echo $form->labelEx($model,'first_university_id',array('label'=>'First University')); ?>
		 <?php
                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'=>$model,
                        'attribute'=>'first_university_name',
//                        'id'=>'first_university_id',
                        'name'=>'first_university_id',
                        'source'=>$this->createURL('profile/suggestUniversity'),
                         // additional javascript options for the autocomplete plugin
                        'options'=>array(
                            'minLength'=>'2',
                            'select'=>"js:function(event, ui) {
                                    $('#BasicProfile_first_university_id').val(ui.item['id']);
                                }"
                            ),
                        'htmlOptions'=>array(
                            'style'=>'height:18px;width:220px'
                            ),
                )); ?>
                
        </div>

        <div class="row">
            <?php echo CHtml::submitButton('Search', array('name' => 'submit-button'));?>
            <?php echo CHtml::submitButton('Clear', array('name' => 'clear-button'));?>
        </div>

    <?php $this->endWidget(); ?>


</div>

<style type="text/css">
    .range-div {
       float:left;
       width:36px;
       font-size:8px;
       text-align:center;
       border:1px solid #eee;
    }
    .range-age-div {
       float:left;
       padding-right:2px;
       font-size:8px;
       text-align:center;
    }
    div.form input[type=checkbox] {
        float:left;
        margin:-1px 4px 2px 2px;
         
    }
    
    
    div.form input[type=radio] {
        float:left;
        margin:-1px 4px 2px 2px;

    }
    .form .row {
        padding-bottom:15px;
    }
</style>