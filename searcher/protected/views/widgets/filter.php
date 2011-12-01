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
                <?php echo $form->labelEx($model, 'gender'); ?>
                <br/>
                <?php echo $form->checkBoxList($model, 'gender', array(
                                                                         'M' => 'Male',
                                                                         'F' => 'Female',
                                                                    ));
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'state'); ?>
                <br/>
                <?php echo $form->dropDownList($model, 'state', States::getAllStates(), array('prompt' => 'Choose state...'));
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'profile_type'); ?>
                <br/>
                <?php echo $form->dropDownList($model, 'profile_type', BasicProfile::$ProfileTypeArray, array('prompt' => 'Choose profile type...'));
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'race_id', array('label' => 'Ethnicity')); ?>
                <br/>
                <?php echo $form->dropDownList($model, 'race_id', RaceType::getTypes(), array('prompt' => 'Choose Race...'));
                ?>
            </div>

            <div class="row">

                <?php echo $form->labelEx($model, 'SAT', array('label' => 'SAT I score range')); ?>
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
                    10
                </div>
                <div class="range-div" style="width:41px;">
                    20
                </div>
                <div class="range-div" style="width:41px;">
                    30
                </div>
                <div class="range-div" style="width:41px;">
                    40
                </div>
                <div class="range-div">
                    50
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="row">
                <?php echo $form->checkBoxList($model, 'num_essays', array('1' => 'Essays available'));?>
            </div>

            <div class="row">
                <?php echo $form->checkBoxList($model, 'verified', array('1' => 'Verified'));?>
            </div>

            <div class="row">

                <?php echo $form->labelEx($model, 'averageRating', array('label' => 'User Rating')); ?>
                <br/>

                <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'model' => $model,
                    'attribute' => 'averageRatingMin',
                    'maxAttribute' => 'averageRatingMax',
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
        </div>

        <div class="row">
            <?php echo CHtml::submitButton('Search', array('name' => 'submit-button'));?>
            <?php echo CHtml::submitButton('Clear', array('name' => 'clear-button'));?>
        </div>

    <?php $this->endWidget(); ?>


</div>
