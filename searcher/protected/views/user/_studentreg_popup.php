<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Registration',
        'autoOpen'=>true,
        'width'=>'300px',
        'height'=>'200',
        'resizable'=>false,
    ),
));

    echo 'A message has been sent to your email address.  Please click on the link provided in the email to activate your account.';
	echo '<br><br/>'; ?>

<center> <div class="buttons">
        <?php
	echo CHtml::submitButton('Ok',array('onclick'=>'window.location="index.php"')); 
?> 
</div>
</center> 
        <?php
$this->endWidget('zii.widgets.jui.CJuiDialog');

/*// the link that may open the dialog
echo CHtml::link('open dialog', '#', array(
   'onclick'=>'$("#mydialog").dialog("open"); return false;',
));*/

?>