<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Seller Admin',
);

$this->setAdminMenu();

?>

<h1>Manage Seller Account</h1>

<?php echo $this->renderPartial('_sellerAdmin', array(
        			'model'=>$model,
                                'creditModel'=>$creditModel,
                                'basicProfile'=>$basicProfile,)); ?>