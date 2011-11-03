<div>
    Items per page:
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=12">12</a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=24">24</a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=36">36</a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=48">48</a>
</div>
<div>
    Choose View Style: 
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&viewStyle=\d/', '', $_SERVER['REQUEST_URI']); ?>&viewStyle=0">Thumbnail</a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&viewStyle=\d/', '', $_SERVER['REQUEST_URI']); ?>&viewStyle=1">Grid</a>
</div>
<?php
if($valid)
{
    if($viewStyle == 'grid')
    {
  
     $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profile-grid',
	'dataProvider'=>$dataProvider,
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
)); 
    }
    else
    {
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '/widgets/thumbnail-view',
        ));
    }
}
?>
<style type="text/css">
    .pager {
        clear: both;
    }
</style>