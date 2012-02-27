
<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Writing Samples',
);

//$this->setEditProfileMenu();

?>


<?php echo $this->renderPartial('_essays', array('essayProfile'=>$essayProfile)); ?>