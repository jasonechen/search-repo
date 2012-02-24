<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'My Profiles',
);
$this->setAdminMenu();
//$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
//	array('label'=>'Create User', 'url'=>array('create')),
//);

?>

<h2><?php echo $msg; ?></h2>

<div class="row">
<div class="portlet-title">
  You have purchased  <?php echo $qty; ?> X <?php echo $credits; ?> Credits<br/>
</div>  
  Please <?php echo CHtml::link("Click here",array('/user/PurchasedDetails')); ?> to see  your transactions details.
		

</div>

<br></br><br></br>