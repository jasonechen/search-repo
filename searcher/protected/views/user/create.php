


<h2> Register now and start browsing student profiles!</h2>
<h4><i>Looking to be a student profile contributor? <?php echo CHtml::link('Sign up here', array('user/createStudent')) ?></i></h4>


<?php if($successRegistration){ ?>
	<style type="text/css">		
	.container {   
		opacity:0.4;
		filter:alpha(opacity=40); 
	}
	</style>		
	<?php echo $this->renderPartial('_userreg_popup'); ?> 
	
<?php } ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>