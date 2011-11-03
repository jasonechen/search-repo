<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Writing Samples',
);

$this->setEditProfileMenu();

?>

<h1>Submit writing samples</h1>

<?php echo $this->renderPartial('_essays', array('essayProfile'=>$essayProfile)); ?>