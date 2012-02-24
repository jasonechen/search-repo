<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'View an essay',
);

$this->setEditProfileMenu();

?>

<h1>View Essay <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
                'data'
	),
)); ?>
