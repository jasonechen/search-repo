<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js');


$this->setEditProfileMenu();

?>

<h3>Extracurricular Activities</h3>


<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Clubs'=>$this->renderPartial('_clubs', array('activityProfile'=>$activityProfile), true),
        'Sports'=>$this->renderPartial('_sports', array('sportProfile'=>$sportProfile), true),
        'Music'=>$this->renderPartial('_music', array('activityProfile'=>$activityProfile,'musicProfile'=>$musicProfile),true),
        'Volunteer'=>$this->renderPartial('_volunteer', array('volunteerProfile'=>$volunteerProfile), true),        
        'Work/Jobs'=>$this->renderPartial('_work', array('workProfile'=>$workProfile),true),
        'Research'=>$this->renderPartial('_research', array('researchProfile'=>$researchProfile),true),
        'Summer'=>$this->renderPartial('_summer', array('summerProfile'=>$summerProfile),true),
        'Other'=>$this->renderPartial('_extracurr_other', array('otherProfile'=>$otherProfile),true),
     ),
        
    'options'=>array(
        'collapsible'=>false,
        'selected'=>"js: $.cookie('mcv_extratc') || 0 ",
        'select'=>"js:function(event, ui) {
        $.cookie('mcv_extratc', ui.index); 
        }",
    ),
    'htmlOptions'=>array(
        'style'=>'width:762px;'
    ),
));

?>