<?php 	$this->progressbar(); ?>
<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Writing Samples',
);

//$this->setEditProfileMenu();

?>

<div class="sub-head-profile">Submit writing samples</div>

<?php echo $this->renderPartial('_essays', array('essayProfile'=>$essayProfile)); ?>