<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Essays',
);

$this->setEditProfileMenu();

?>

<h1>Modify your essays</h1>

<?php echo $this->renderPartial('_essays', array('essayProfile'=>$essayProfile)); ?>