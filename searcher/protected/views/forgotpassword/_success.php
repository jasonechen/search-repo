<?php $this->pageTitle=Yii::app()->name . ' - Forgot Password'; ?>
<div class="container">
	<h1>Forgot password</h1>
	<?php if(Yii::app()->user->hasFlash('passworlinksent')):?> 
	<div class="successMessage"> 
	<?php echo Yii::app()->user->getFlash('passworlinksent'); ?> 
	</div> <?php endif; ?> 
	<br/><br/>
</div>