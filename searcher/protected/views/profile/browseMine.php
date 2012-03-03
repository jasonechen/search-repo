<?php
    /**
     * @var BasicProfile $model
     */
?>

<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'My Profiles',
);
$this->setAdminMenu();
//$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
//	array('label'=>'Create User', 'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('profile-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>My Purchased Profiles</h3>

<div class="span-20 last">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profile-grid-2',
	'dataProvider'=>$model->searchMine(),
	//'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'user_id',
                    'header'=>'Profile #',
                    'htmlOptions'=>array('width'=>'50')
                        ),
		array(
                  'name'=>'firstUniversity',
                  'value'=>'$data->getFirstUniversityName()',
                  'header'=>'College',
                   'htmlOptions'=>array('width'=>'225')
                ),
                array(
                    'name'=>'gender',
                    'htmlOptions'=>array('width'=>'30')
                    ),
		array(
                    'name'=>'race',
                    'value'=>'($data->race !== NULL)? $data->race->name : NA', //Need to deal with nulls 
                    'htmlOptions'=>array('width'=>'150')  
                ),
		array(
                  'name'=>'sat_I_score_range',
                  'value'=>'BasicProfile::getSATRange($data->sat_I_score_range)', //Need to deal with nulls here
                   'htmlOptions'=>array('width'=>'75') 
                ), 
		array(
                    'name'=>'num_scores',
                    'header'=>'# of Scores',
                    'htmlOptions'=>array('width'=>'60', 'style'=>'text-align: center')
                ),
            	//'num_academics:number:# Academics',
		array(
                    'name'=>'num_extracurriculars',
                    'header'=>'# of Extracurr. ',
                    'htmlOptions'=>array('width'=>'75', 'style'=>'text-align: center')
                    ),
              /*  array(
                  'name'=>'profile_type',
                  'value'=>'BasicProfile::getProfileTypeName($data->profile_type)', //Need to deal with nulls here
                ), */
		array(
			'class'=>'CButtonColumn',
                        'template' => '{view}',
                        'viewButtonUrl'=>'Yii::app()->createUrl("/profile/viewAll", array("profileID" => $data->user_id))',
                        'header'=>'CLICK TO VIEW'
		),
	),
)); ?>
    
<br></br><br></br>
</div>