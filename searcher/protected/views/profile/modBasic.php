<?php

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js');

$this->setEditProfileMenu();

?>



<h3> Personal Information </h3>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Basic'=>$this->renderPartial('_personal', array('basicProfile'=>$basicProfile,'personalProfile'=>$personalProfile),true),
        'Demographics'=>$this->renderPartial('_demographics', array('basicProfile'=>$basicProfile,'personalProfile'=>$personalProfile),true),
        'University'=>$this->renderPartial('_university', array('basicProfile'=>$basicProfile,'personalProfile'=>$personalProfile),true),
        'Other Admittances'=>$this->renderPartial('_schooladmits', array('otherschooladmitProfile'=>$otherschooladmitProfile),true),    
        'Languages'=>$this->renderPartial('_languages', array('languageProfile'=>$languageProfile),true),         
    ),
    'options'=>array(
        'collapsible'=>false,
        'selected'=>"js: $.cookie('mcv_ptc') || 0 ",
        'select'=>"js:function(event, ui) {
        $.cookie('mcv_ptc', ui.index); 
        }",
    ),
    'htmlOptions'=>array(
        'style'=>'width:762px;'
    ),
));

?>
