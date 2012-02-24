
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js');

$this->setEditProfileMenu();
?>

<h3> Test Scores </h3>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'SAT I / PSAT'=>$this->renderPartial('_scores_sat1', array('academicProfile'=>$academicProfile,'scoreProfile'=>$scoreProfile), true),
        'ACT'=>$this->renderPartial('_scores_act', array('academicProfile'=>$academicProfile,'scoreProfile'=>$scoreProfile), true),
        'SAT II'=>$this->renderPartial('_sat2', array('sat2Profile'=>$sat2Profile),true),
        'AP Test'=>$this->renderPartial('_ap', array('apProfile'=>$apProfile),true),
        
    ),
    'options'=>array(
        'collapsible'=>false,
        'selected'=>"js: $.cookie('mcv_scoretc') || 0 ",
        'select'=>"js:function(event, ui) {
        $.cookie('mcv_scoretc', ui.index); 
        }",
    ),
    'htmlOptions'=>array(
        'style'=>'width:762px;'
    ),
));

?>