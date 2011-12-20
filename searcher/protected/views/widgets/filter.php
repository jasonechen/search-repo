<?php
    /**
     * @var CActiveForm $form
     * @var BasicProfile $model
     * @var string $initialSearchQuery
     */
?>
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
        <input type="hidden" value="" name="search_q" id="search-q-secondary">
    
        <div class="clear"></div>
        <div class="filtercheckform">
            <div class="row">
                <?php echo $form->labelEx($model, 'gender'); ?>
                <?php
                    echo $form->checkBoxList($model, 'gender',
                        array(
                             'M' => 'Male',
                             'F' => 'Female',
                        )
                    );
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'state'); ?>
                <?php
                    echo CHtml::dropDownList('FilterForm[states.id]',
                        (isset($_GET['FilterForm']['states.id']) ? ($_GET['FilterForm']['states.id']) : ''),
                        States::getAllStates(),
                        array('prompt' => 'Choose state'));
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'profile_type'); ?>
                
                <?php echo $form->dropDownList($model, 'profile_type', BasicProfile::$ProfileTypeArray, array('prompt' => 'Choose Profile Type'));
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'race_id', array('label' => 'Ethnicity')); ?>
                
                <?php echo $form->dropDownList($model, 'race_id', RaceType::getTypes(), array('prompt' => 'Select Race'));
                ?>
            </div>

            <div class="row">

                <?php echo $form->labelEx($model, 'SAT', array('label' => 'SAT I Combined Score')); ?>
                <br/>

                <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'model' => $model,
                    'attribute' => 'SATMin',
                    'maxAttribute' => 'SATMax',
                    'options' => array(
                        'range' => true,
                        'min'=> 0,
                        'max' => 5,
                    ),
                    'htmlOptions' => array(
                        'style' => 'width:210px;'
                    ),
                ));
                ?>
                <div class="range-div" style="width:30px;">
                    600
                </div>
                <div class="range-div" style="width:39px;">
                    1000
                </div>
                <div class="range-div" style="width:39px;">
                    1300
                </div>
                <div class="range-div" style="width:39px;">
                    1800
                </div>
                <div class="range-div" style="width:39px;">
                    2100
                </div>
                <div class="range-div">
                    2400
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="row">

                <?php echo $form->labelEx($model, 'num_scores', array('label' => '# of Test Scores')); ?>
                <br/>

                <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'model' => $model,
                    'attribute' => 'num_scoresMin',
                    'maxAttribute' => 'num_scoresMax',
                    'options' => array(
                        'range' => true,
                        'min'=> 0,
                        'max' => 5,
                    ),
                    'htmlOptions' => array(
                        'style' => 'width:210px;'
                    ),
                ));
                ?>
                <div class="range-div" style="width:34px;">
                    0
                </div>
                <div class="range-div" style="width:41px;">
                    5
                </div>
                <div class="range-div" style="width:41px;">
                    10
                </div>
                <div class="range-div" style="width:41px;">
                    15
                </div>
                <div class="range-div" style="width:41px;">
                    20
                </div>
                <div class="range-div">
                    25+
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="row">

                <?php echo $form->labelEx($model, 'num_extracurriculars', array('label' => '# of Extracurriculars')); ?>
                <br/>

                <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'model' => $model,
                    'attribute' => 'num_extracurricularsMin',
                    'maxAttribute' => 'num_extracurricularsMax',
                    'options' => array(
                        'range' => true,
                        'min'=> 0,
                        'max' => 5,
                    ),
                    'htmlOptions' => array(
                        'style' => 'width:210px;'
                    ),
                ));
                ?>
                <div class="range-div" style="width:34px;">
                    0
                </div>
                <div class="range-div" style="width:41px;">
                    5
                </div>
                <div class="range-div" style="width:41px;">
                    10
                </div>
                <div class="range-div" style="width:41px;">
                    15
                </div>
                <div class="range-div" style="width:41px;">
                    20
                </div>
                <div class="range-div">
                    25+
                </div>
                <div style="clear:both;"></div>
            </div>


            <div class="row">

                <?php echo $form->labelEx($model, 'avg_profile_rating', array('label' => 'Average Rating')); ?>
                <br/>

                <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'model' => $model,
                    'attribute' => 'avg_profile_ratingMin',
                    'maxAttribute' => 'avg_profile_ratingMax',
                    'options' => array(
                        'range' => true,
                        'min'=> 1,
                        'max' => 5,
                    ),
                    'htmlOptions' => array(
                        'style' => 'width:210px;'
                    ),
                ));
                ?>
                <div class="range-div" style="width:48px;">
                    1
                </div>
                <div class="range-div" style="width:50px;">
                    2
                </div>
                <div class="range-div" style="width:50px;">
                    3
                </div>
                <div class="range-div" style="width:50px;">
                    4
                </div>
                <div class="range-div">
                    5
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="row">
                <?php echo $form->checkBoxList($model, 'num_essays', array('1' => 'Essays Available'));?>
            </div>

            <div class="row">
                <?php echo $form->checkBoxList($model, 'verified', array('1' => 'Verified'));?>
            </div>
            
        </div>

        <div class="row">
            <?php echo CHtml::submitButton('Search', array('name' => 'submit-button', 'id' => 'filter-bar-submit'));?>
            <?php echo CHtml::submitButton('Clear', array('name' => 'clear-button', 'id' => 'filter-bar-clear'));?>
        </div>

    <?php $this->endWidget(); ?>


</div>

<?php
    Yii::app()->clientScript->registerScript(
        'click-submit-button',
        '$("#filter-bar-submit").click(function() {
            $("#search-q-secondary").val($("#search_q").val());
        });'
    );
?>