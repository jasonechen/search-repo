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
            'id' => 'profile-grid',
            'dataProvider' => $dataProvider,
            'filter' => $model,
            'columns'=>array(
                'id',
                'username',
                'FirstName',
                'LastName',
                array(
                    'name' => 'gender',
                    'value' => '$data->gender == "M" ? "Male" : "Female"',
                ),
                'city',
                array(
                    'name' => 'date_of_birth',
                    'header' => 'Age',
                    'value' => 'Profile::returnAge($data->date_of_birth)',
                ),
                array(
			'class'=>'CButtonColumn',
                        'template' => '{view}',
                        'viewButtonUrl'=>'Yii::app()->createUrl("/profile/view", array("id" => $data->id))',
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