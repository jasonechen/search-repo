<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Seller Admin',
);

$this->setAdminMenu();

?>

<h2>My Account</h2>

<?php echo $this->renderPartial('_sellerAdmin', array(
        			'model'=>$model,
                                'creditModel'=>$creditModel,
                                'basicProfile'=>$basicProfile,)); ?>