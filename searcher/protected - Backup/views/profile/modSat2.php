<?php


$this->setEditProfileMenu();

?>



<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Static tab'=>'Static content',
        'Render tab'=>$this->renderPartial('_sat2', array('sat2Profile'=>$sat2Profile),true),
        
    ),
    'options'=>array(
        'collapsible'=>true,
        'selected'=>1,
    ),
    'htmlOptions'=>array(
        'style'=>'width:725px;'
    ),
));

?>