<?php
    /**
     * @var CActiveDataProvider $dataProvider
     * @var BasicProfile $model
     */
?>

<?php
if ($model->isPurchased())
	$targetUrl =  Yii::app()->createUrl("/profile/viewAll", array("profileID" => $model->user_id));
else
	$targetUrl = Yii::app()->createUrl("/profile/viewProfile", array("profileID" => $model->user_id));
	
    $this->widget('zii.widgets.grid.CGridView',
        array(
             'id'           => 'profile-grid',
             'dataProvider' => $dataProvider,
             'htmlOptions'=>array('style'=>'cursor: pointer;'),
        	 'selectableRows' => 1,            
             //'filter'       => $model,
             'columns'      => array(
                 //'user_id',
                array(
                	'name'=>'nickname',
                        'htmlOptions' => array('width'=>'40px'),
                ),
                 array(
                     'name'   => 'firstUniversity',
                     'value'  => '$data->getFirstUniversityName()',
                     'header' => 'College',
                     'htmlOptions' => array('width'=>'150px'),
                 ),
                 array(
                     'name'   => 'gender',
                     'filter' => array(
                         'M' => 'Male',
                         'F' => 'Female'
                     ),
                     'value'  => '$data->gender',
                     'htmlOptions' => array('width'=>'30px'),
                 ),
                 array(
                     'name'   => 'race',
                     'filter' => $model->getNameRaceOptions(),
                     'value'  => '($data->race !== NULL)? $data->race->name : "NA"', //Need to deal with nulls here
                     'htmlOptions' => array('width'=>'40px'),
                 ),
                 array(
                     'name'   => 'sat_I_score_range',
                     'value'  => 'BasicProfile::getSATRange($data->sat_I_score_range)', //Need to deal with nulls here
                     'filter' => BasicProfile::$SATRangeArray,
                     'htmlOptions' => array('width'=>'60px'),
                 ),
                 'num_scores:number:# Scores',
                 //'num_academics:number:# Academics',
                 'num_extracurriculars:number:# Extracurr',
                 
         /*        array(
                     'name'   => 'profile_type',
                     'filter' => BasicProfile::$ProfileTypeArray,
                     'value'  => 'BasicProfile::getProfileTypeName($data->profile_type)', //Need to deal with nulls here
                 ),*/
                 array(
                     'header' => 'Home Country',
                     'name'   => 'countryName',
                     'value'  => 'BasicProfile::getCountryName($data)',
                     'filter' => CommonMethods::getAllCountriesList(),
                     'htmlOptions' => array('width'=>'60px'),
                 ),
                 array(
                     'name'   => 'stateName',
                     'value'  => 'BasicProfile::getStateName($data)',
                     'filter' => States::getAllStates(),
                     'htmlOptions' => array('width'=>'60px'),
                 ),
                 array(
                     'name'   => 'avg_profile_rating',
                     'filter' => array(
                         '1' => 1,
                         '2' => 2,
                         '3' => 3,
                         '4' => 4,
                         '5' => 5
                     ),
                     'header' => 'Avg Rating',
                     'value'  => '!empty($data->avg_profile_rating) ? round($data->avg_profile_rating, 2) : "N/A"',
                     'htmlOptions' => array('width'=>'20px'),
                 ),
    /*             array(
                     'class'        => 'CButtonColumn',
                     'template'     => '{view}',
                     'viewButtonUrl'=> '$data->isPurchased() ?  Yii::app()->createUrl("/profile/viewAll", array("profileID" => $data->user_id))
                            : Yii::app()->createUrl("/profile/viewProfile", array("profileID" => $data->user_id))',
                     'htmlOptions' => array('width'=>'10px'),
                 ),*/
             ),
        )
    );
?>

<script type="text/javascript">
$(document).ready(function(){
	$('#profile-grid .items tbody tr').click(function(){
		window.location =  $(this).find('td:last').find('a').attr('href');
		
	});
});
</script>