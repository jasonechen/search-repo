<div class="demo_box">
        <div class="errorMessage">
        <?php
        if(@$msg)
        {
            echo 'Your login has expired.  Please log in again.';
        }
        
        ?>
    </div>
	<?php

		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'loginpop',
			// additional javascript options for the dialog plugin
			'options'=>array(
				'title'=>'Login',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>'400px',
				'height'=>'350',
                                'resizable'=>false,
				
			),
		));		
                $model=new LoginForm;
		$this->renderPartial('application.views.site.login',array('model'=>$model));
                $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>
</div>      
       

