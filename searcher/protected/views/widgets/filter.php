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

            <div class="row row-gender clearfix">
                <div style="padding-bottom: 6px">
                    <?php echo $form->labelEx($model, 'gender'); ?>
                </div>
                <?php
					echo $form->checkBoxList($model, 'gender', 
						array(
                             'M' => 'Male',
                             'F' => 'Female',
                        ),
                        array('separator' => '')
					);
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'country', array('label' => 'Home Country')); ?>
                <?php
                    echo CHtml::dropDownList('FilterForm[country.id]',
                        (isset($_GET['FilterForm']['country.id']) ? ($_GET['FilterForm']['country.id']) : '1'),
                        CommonMethods::getAllCountriesList(),
                        array('prompt' => '-All Countries-', 'id' => 'FilterForm_country')
                    );
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'state', array('label' => 'Home State', 'id' => 'home-state-label')); ?>
                <?php
                    echo CHtml::dropDownList('FilterForm[states.id]',
                        (isset($_GET['FilterForm']['states.id']) ? ($_GET['FilterForm']['states.id']) : ''),
                        States::getAllStates(),
                        array('prompt' => '-All States-', 'id' => 'FilterForm_state')
                    );
                ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'profile_type', array('label'=>'Profile Focus Areas')); ?>
                
            <?php
                $profiletypes = BasicProfile::$ProfileTypeArray;                                 
                $this->widget('ext.widgets.EchMultiselect', array(
                'model'=>$model,
                'dropDownAttribute'=>'type',    
                'data'=>$profiletypes, 
                'options'=> array(  
                      	'click'=>'js:function(event, ui){
		       	 if( $(this).multiselect("widget").find("input:checked").length > 3 ){		                                         
		              return false;
		                    }
		             }',   
                        'header'=> false,
                        'minWidth'=>175,
                        'height'=>260,
                        'noneSelectedText'=>'-- ' . Yii::t('application','Select') . ' --',
                 )                    
                
                )); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'race_id', array('label' => 'Race')); ?>
                
                <?php echo $form->dropDownList($model, 'race_id', RaceType::getTypes(), array('prompt' => '-All Races-'));
                ?>
            </div>

            <div class="row">

                <div style="padding-bottom: 7px">      <?php echo $form->labelEx($model, 'SAT', array('label' => 'SAT I Combined Score')); ?></div>
                

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
                        'style' => 'width:225px;'
                    ),
                ));
                ?>

                <div class="range-div" style="width:35px;">
                    600
                </div>
                <div class="range-div" style="width:42px;">
                    1200
                </div>
                <div class="range-div" style="width:42px;">
                    1500
                </div>                
                <div class="range-div" style="width:42px;">
                    1800
                </div>
                <div class="range-div" style="width:42px;">
                    2100
                </div>
                <div class="range-div">
                    2400
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="row">

                <div style="padding-bottom: 7px">              
                  <?php echo $form->labelEx($model, 'num_scores', array('label' => '# of Test Scores')); ?>
                </div>

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
                        'style' => 'width:225px;'
                    ),
                ));
                ?>

                <div class="range-div" style="width:34px;">
                    0
                </div>
                <div class="range-div" style="width:43px;">
                    5
                </div>
                <div class="range-div" style="width:43px;">
                    10
                </div>
                <div class="range-div" style="width:43px;">
                    15
                </div>
                <div class="range-div" style="width:43px;">
                    20
                </div>
                <div class="range-div">
                    25+
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="row">

                <div style="padding-bottom: 7px">
                    <?php echo $form->labelEx($model, 'num_extracurriculars', array('label' => '# of Extracurriculars')); ?>
                </div>

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
                        'style' => 'width:225px;'
                    ),
                ));
                ?>
                <div class="range-div" style="width:34px;">
                    0
                </div>
                <div class="range-div" style="width:43px;">
                    5
                </div>
                <div class="range-div" style="width:43px;">
                    10
                </div>
                <div class="range-div" style="width:43px;">
                    15
                </div>
                <div class="range-div" style="width:43px;">
                    20
                </div>
                <div class="range-div">
                    25+
                </div>
                <div style="clear:both;"></div>
            </div>


            <div class="row">

                <div style="padding-bottom: 7px">
                    <?php echo $form->labelEx($model, 'avg_profile_rating', array('label' => 'Average Rating')); ?>
                </div>

                <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'model' => $model,
                    'attribute' => 'avg_profile_ratingMin',
                    'maxAttribute' => 'avg_profile_ratingMax',
                    'options' => array(
                        'range' => true,
                        'min'=> 0,
                        'max' => 5,
                    ),
                    'htmlOptions' => array(
                        'style' => 'width:225px;'
                    ),
                ));
                ?>

                <div class="range-div" style="width:40px;">
                    None
                </div>
                <div class="range-div" style="width:43px;">
                    1
                </div>
                <div class="range-div" style="width:43px;">
                    2
                </div>
                <div class="range-div" style="width:43px;">
                    3
                </div>
                <div class="range-div" style="width:43px;">
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
                <?php echo $form->checkBoxList($model, 'verified', array('Y' => 'Verified'));?>
            </div>
            
            <div class="row">
                <?php echo $form->checkBoxList($model, 'consultValue', array('1' => 'Phone Consultations'));?>
            </div>
            
        </div>
        <div class="container">
            <div class="span-3">
                <div class="buttons">
                    <?php echo CHtml::submitButton('Search', array('name' => 'submit-button', 'id' => 'filter-bar-submit'));?>
                </div>
            </div>
            <div class="span-2 last">
                <div class="pbuttons">
                    <?php echo CHtml::submitButton('Clear', array('name' => 'clear-button', 'id' => 'filter-bar-clear'));?>
                </div>
            </div>
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

    Yii::app()->clientScript->registerScript(
        'country selector click',
        "var hideOrShowStateSelector = function() {
            var value = $('#FilterForm_country option:selected').val();
            if(value == 1 || value == '')
            {
                $('#home-state-label').parent('div').show(500);
            }
            else
            {
                $('#home-state-label').parent('div').hide(500);
            }
        };
        hideOrShowStateSelector();
        $('#FilterForm_country').change(hideOrShowStateSelector);
        "
    );
?>