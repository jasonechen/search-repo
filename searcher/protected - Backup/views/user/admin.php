<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Admin',
);

$this->setAdminMenu();

?>

<h1>Manage Account</h1>

<?php echo $this->renderPartial('_formReduced', array('model'=>$model)); ?>
