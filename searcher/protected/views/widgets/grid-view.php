<?php
    /**
     * @var CActiveDataProvider $dataProvider
     * @var BasicProfile $model
     */
?>

<?php

    $this->widget('zii.widgets.grid.CGridView',
                 array(
                    'id' => 'profile-grid',
                    'dataProvider' => $dataProvider,
                    'filter' => $model,
                    'columns' => array(
                        'user_id',
                        'nickname',
                        array(
                            'name' => 'firstUniversity',
                            'value' => '$data->getFirstUniversityName()',
                            'header' => 'College',
                        ),
                        array(
                            'name' => 'gender',
                            'filter' => array('M' => 'Male', 'F' => 'Female'),
                            'value' => '$data->gender',
                        ),
                        array(
                            'name' => 'race',
                            'filter' => $model->getNameRaceOptions(),
                            'value' => '($data->race !== NULL)? $data->race->name : "NA"', //Need to deal with nulls here
                        ),
                        array(
                            'name' => 'sat_I_score_range',
                            'value' => 'BasicProfile::getSATRange($data->sat_I_score_range)', //Need to deal with nulls here
                            'filter' => BasicProfile::$SATRangeArray,
                        ),
                        'num_scores:number:# Scores',
                        'num_academics:number:# Academics',
                        'num_extracurriculars:number:# Extracurriculars',
                        array(
                            'name'=>'profile_type',
                            'filter' => BasicProfile::$ProfileTypeArray,
                            'value'=>'BasicProfile::getProfileTypeName($data->profile_type)', //Need to deal with nulls here
                        ),
                        array(
                            'name'=>'stateName',
                            'value'=>'BasicProfile::getStateName($data)',
                            'filter' => States::getAllStates(),
                        ),
                        array(
                            'name' => 'avg_profile_rating',
                            'filter' => array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5),
                            'header' => 'User Rating',
                            'value'=>'!empty($data->avg_profile_rating) ? round($data->avg_profile_rating, 2) : "N/A"',
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template' => '{view}',
                            'viewButtonUrl'=>'$data->isPurchased() ?  Yii::app()->createUrl("/profile/viewPurchProfile", array("profileID" => $data->user_id))
                            : Yii::app()->createUrl("/profile/viewProfile", array("profileID" => $data->user_id))',
                        ),
                    ),
                 )
            );

?>