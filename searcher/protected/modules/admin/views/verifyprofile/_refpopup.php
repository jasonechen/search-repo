
<div class="demo_box">
    <div class="errorMessage">
        <?php
        if(@$msg)
        {
            switch ($msg)
            {
                case 1:
                     echo 'Your login has expired.  Please log in again.';
                     break;
                 case 2:
                     echo 'You are temporarily blocked from our site ';
            }
           
        }
        
        ?>
    </div>
	<?php
	
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'loginbox',
			// additional javascript options for the dialog plugin
			'options'=>array(
				'title'=>'Login',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>'400px',
                                'closeOnEscape' => true, 
				'height'=>'350',
                                'resizable'=>false,
                               //'dialogclose'=>'function() { location.href = '.Yii::app()->createUrl("site/index").' }',
                             'open'=> 'js:function(event, ui) { $(".ui-dialog-titlebar-close").click(function() 
                                                                { location.href = document.URL; }); }',
       

                            
				
			),
		));
		$model=new LoginForm;
		$this->renderPartial('application.views.site.login',array('model'=>$model));
		$this->endWidget('zii.widgets.jui.CJuiDialog');
	?>
</div>