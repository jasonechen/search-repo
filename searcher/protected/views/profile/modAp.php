<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'AP Scores',
);


$this->setEditProfileMenu();

?>

<h1>Modify your AP scores</h1>

<?php echo $this->renderPartial('_ap', array('apProfile'=>$apProfile)); ?>