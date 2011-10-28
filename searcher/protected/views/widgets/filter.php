<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'filter-form',
        'enableAjaxValidation' => false,
        'action' => $this->createUrl('search/index'),
        'method' => 'get'
    ));
    ?>

        <div class="row">

            <?php echo $form->labelEx($model, 'education'); ?>
            <br/>
            
            <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'educationMin',
                'maxAttribute' => 'educationMax',
                'options' => array(
                    'range' => true,
                    'min'=> 0,
                    'max' => 3,
                    'values'=>array(0,3),
                ),
                'htmlOptions' => array(
                    'style' => 'width:150px;'
                ),
            ));
		    ?>

            <?php foreach(Profile::$EducationArray as $education):?>

                <div class="range-div">
                    <?php echo $education; ?>
                </div>

            <?php endforeach; ?>

        </div>
        <div class="clear"></div><br/>

        <div class="row">
            <?php echo $form->labelEx($model, 'race_id'); ?>
            <br/>
            <?php echo $form->checkBoxList($model, 'race_id', RaceType::getTitles()); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'gender'); ?>
            <br/>
            <?php echo $form->radioButtonList($model, 'gender', array(
                                                                     'M' => 'Male',
                                                                     'F' => 'Female',
                                                                ));
            ?>
        </div>

        <div class="row">

            <?php echo $form->labelEx($model, 'age'); ?>
            <br/>

            <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'date_of_birthMin',
                'maxAttribute' => 'date_of_birthMax',
                'options' => array(
                    'range' => true,
                    'min' => 0,
                    'max' => 7,
                ),
            ));
		    ?>
            <div style="margin-left:-5px">
                <div class="range-age-div">
                    < 21
                </div>
                <div class="range-age-div">
                    21-25
                </div>
                <div class="range-age-div">
                    26-30
                </div>
                <div class="range-age-div">
                    31-35
                </div>
                <div class="range-age-div">
                    36-40
                </div>
                <div class="range-age-div">
                    41-50
                </div>
                <div class="range-age-div">
                    51-60
                </div>
                <div class="range-age-div">
                    ++
                </div>
            </div>
        </div>

        <div class="clear"></div><br/>

        <div class="row">
            <?php echo $form->labelEx($model, 'hasPets'); ?>
            <br/>
            <?php echo $form->checkBox($model, 'hasPets'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'hasChildren'); ?>
            <br/>
            <?php echo $form->checkBox($model, 'hasChildren'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'city'); ?>
            <br/>
            <?php echo $form->dropDownList($model, 'city', Profile::returnCities(), array('prompt' => 'Choose city')); ?>
        </div>

        <div class="row">
            <?php echo CHtml::submitButton('Search');?>
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