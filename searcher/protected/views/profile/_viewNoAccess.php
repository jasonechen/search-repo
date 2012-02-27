<h2> You have not purchased access to this! </h2>

<?php $this->widget('zii.widgets.jui.CJuiButton',
    array(
    'name'=>'button',
        'caption'=>'Buy',
    'onclick'=>"js:function(){ $(window.location).attr(\"href\", \"http://localhost/testit/index.php?r=profile/viewProfile&profileID=$profileID\");}",
    )
); ?>