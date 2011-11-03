<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Browse',
);

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

<h1>Browse Profiles</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profile-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'user_id',
		array(
                  'name'=>'firstUniversity',
                  'value'=>'$data->firstUniversity->name',
                  'header'=>'College'
                ),
                'gender',
		array(
                  'name'=>'race',
                  'value'=>'($data->race !== NULL)? $data->race->name : NA', //Need to deal with nulls here
                ),
		array(
                  'name'=>'sat_I_score_range',
                  'value'=>'BasicProfile::getSATRange($data->sat_I_score_range)', //Need to deal with nulls here
                ), 
		'num_scores:number:# Scores',
            	'num_academics:number:# Academics',
		'num_extracurriculars:number:# Extracurriculars',
                array(
                  'name'=>'profile_type',
                  'value'=>'BasicProfile::getProfileTypeName($data->profile_type)', //Need to deal with nulls here
                ), 
		array(
			'class'=>'CButtonColumn',
                        'template' => '{view}',
                        'viewButtonUrl'=>'Yii::app()->createUrl("/profile/viewProfile", array("profileID" => $data->user_id))',
		),
	),
)); ?>
