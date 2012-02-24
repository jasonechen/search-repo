<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Registration Complete',
        'autoOpen'=>true,
        'width'=>'300px',
        'height'=>'200',
        'resizable'=>false,
    ),
));

    echo 'Thank you for registering.  Click below to login and begin browsing profiles';
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