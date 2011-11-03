<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Competitions',
);

$this->setEditProfileMenu();

?>

<h1>Modify your competition results</h1>

<?php echo $this->renderPartial('_competitions', array('competitionProfile'=>$competitionProfile)); ?>