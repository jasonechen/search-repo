

<h2>Sign Up: Student Contributors </h2>
<h3> <i>Create your account, fill out your profile!/i>
    </br></h3>
<?php if($successRegistration){ ?>
	<style type="text/css">		
	.container {   
		opacity:0.4;
		filter:alpha(opacity=40); 
	}
	</style>		
	<?php echo $this->renderPartial('_studentreg_popup'); ?> 
	
<?php } ?>

<?php echo $this->renderPartial('_formStudent', array('model'=>$model)); ?>