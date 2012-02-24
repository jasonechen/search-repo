<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'Subjects',
);


$this->setEditProfileMenu();

?>

<h1>Modify your subjects studied</h1>

<?php echo $this->renderPartial('_subjects', array('subjectProfile'=>$subjectProfile)); ?>