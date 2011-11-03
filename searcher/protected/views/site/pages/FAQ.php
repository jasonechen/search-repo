<?php
$this->pageTitle=Yii::app()->name . ' - FAQ';
/*$this->breadcrumbs=array(
	'FAQ',
);*/
?>
<h2>Frequently Asked Questions (FAQ)</h2>

<div class="span-16 last">

    <?php
$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        'FAQ1'=>$this->renderPartial('pages/_faq1',null,true),
        'FAQ2'=>$this->renderPartial('pages/_faq2',null,true),
        'FAQ3'=>$this->renderPartial('pages/_faq3',null,true),
        'FAQ4'=>$this->renderPartial('pages/_faq4',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide', 
        'collapsible'=>true,
        'active'=>false,

    ),
));      
    ?>
</div>

<div class="span-26"><br></br><br></br><br></br><br></br><br></br><br></br></div>