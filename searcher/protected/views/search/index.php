<?php
    /**
     * @var boolean $valid
     * @var CActiveDataProvider $dataProvider
     * @var BasicProfile $model
     */
?>

<div>
    Items per page:
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=12">12</a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=24">24</a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=36">36</a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']); ?>&pageSize=48">48</a>
</div>
<div>
    Choose View Style:

    <?php
        $viewStyle = 'thumbnail';
        if(isset($_SESSION['viewStyle']))
        {
            $viewStyle = $_SESSION['viewStyle'];
        }
    ?>

    <?php if($viewStyle == 'thumbnail'): ?>

        Thumbnail
        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&viewStyle=\d/', '', $_SERVER['REQUEST_URI']); ?>&viewStyle=1">Grid</a>

    <?php endif; ?>

    <?php if($viewStyle == 'grid'): ?>

        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/&viewStyle=\d/', '', $_SERVER['REQUEST_URI']); ?>&viewStyle=0">Thumbnail</a>
        Grid

    <?php endif; ?>
</div>
<?php
if($valid)
{
    if($viewStyle == 'grid')
    {
  
     $this->widget('zii.widgets.grid.CGridView',
         array(
            'id'=>'profile-grid',
            'dataProvider'=>$dataProvider,
            'filter'=>$model,
            'columns'=>array(
                'user_id',
                'nickname',
                array(
                    'name'=>'firstUniversity',
                    'value'=>'$data->firstUniversity->name',
                    'header'=>'College',
                ),
                array(
                    'name' => 'gender',
                    'filter' => array('M' => 'Male', 'F' => 'Female'),
                    'value' => '$data->gender',
                ),
                array(
                    'name'=>'race',
                    'filter' => $model->getNameRaceOptions(),
                    'value'=>'($data->race !== NULL)? $data->race->name : "NA"', //Need to deal with nulls here
                ),
                array(
                    'name'=>'sat_I_score_range',
                    'value'=>'BasicProfile::getSATRange($data->sat_I_score_range)', //Need to deal with nulls here
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
else
{
    echo '<br/><br/>You didn\'t enter any search criteria. Please enter some terms or select some criteria.';
}
?>

<style type="text/css">
    .pager {
        clear: both;
    }
</style>