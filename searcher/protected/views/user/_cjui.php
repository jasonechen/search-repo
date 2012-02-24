<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Registration',
        'autoOpen'=>true,
    ),
));

    echo 'A message has been sent to your email address.  Please click on the link provided to complete your registration';
	echo '<br/>';
	echo CHtml::htmlButton('Ok',array('onclick'=>'window.location="index.php"')); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

/*// the link that may open the dialog
echo CHtml::link('open dialog', '#', array(
   'onclick'=>'$("#mydialog").dialog("open"); return false;',
));*/

?>