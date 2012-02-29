<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'help',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Profile Detail Levels',
        'autoOpen'=>false,
        'width'=>'350px',
        'height'=>'450',
        'resizable'=>false,
    ),
));

    
?>

    <h4> Scores</h4> 
    <p>
     Scores profiles will include all test scores and basic demographic information of the student.   
        
    </p>
    
    <br></br>
    <h4> Basic </h4>
    <p>
        Basic Profiles will include all of the information from Scores Profiles plus <br>
        -Extracurricular activities
        
        
    </p>
    
    <br></br>
    <h4> Full </h4> 
    <p>
    Full Profiles will contain all of the information as Scores/Basic views, but will also include any essays.    
        
    </p>


        <?php
$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
