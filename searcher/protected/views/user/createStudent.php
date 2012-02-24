

<h2>Create your student account, fill out your profile!
    </br></h2>
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