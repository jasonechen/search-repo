

<?php


$this->setEditProfileMenu();

?>
<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'School Academics tab'=>'Static content',
        'Scores Tab'=>$this->renderPartial('_scores', array('academicProfile'=>$academicProfile,'scoreProfile'=>$scoreProfile), true),
      //  'SAT II Scores'=>$this->renderPartial('_sat2', array('sat2Profile'=>$sat2Profile), true)
        
    ),
    'options'=>array(
        'collapsible'=>true,
        'selected'=>0,
    ),
    'htmlOptions'=>array(
        'style'=>'width:725px;'
    ),
));

?>