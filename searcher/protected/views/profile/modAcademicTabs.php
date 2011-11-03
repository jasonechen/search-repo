
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js');

$this->setEditProfileMenu();
?>

<h3> Academics </h3>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Grades'=>$this->renderPartial('_grades', array('academicProfile'=>$academicProfile), true),
        'Subjects Studied'=>$this->renderPartial('_subjects', array('subjectProfile'=>$subjectProfile), true),
        'Competitions'=>$this->renderPartial('_competitions', array('competitionProfile'=>$competitionProfile), true),
        'Awards/Honors'=>$this->renderPartial('_awardshonors', array('awardProfile'=>$awardProfile), true),

        
    ),
    'options'=>array(
        'collapsible'=>false,
        'selected'=>"js: $.cookie('mcv_acadtc') || 0 ",
        'select'=>"js:function(event, ui) {
        $.cookie('mcv_acadtc', ui.index); 
        }",
    ),
    'htmlOptions'=>array(
        'style'=>'width:762px;'
    ),
));

?>