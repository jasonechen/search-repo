<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Sports',
);


$this->setEditProfileMenu();

?>

<h1>Modify your sports</h1>

<?php echo $this->renderPartial('_sports', array('sportProfile'=>$sportProfile)); ?>