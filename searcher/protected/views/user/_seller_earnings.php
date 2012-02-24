<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Seller Admin',
);

$this->setAdminMenu();

?>


<?php echo $this->renderPartial('_earnings', array(        			
                                'creditModel'=>$creditModel,
                                )); ?>