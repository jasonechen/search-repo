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

<h3>Order History</h3>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
        array('name'=>'order_id','header'=>'Order No.','filter'=>'order_id'), 
        array('name'=>'created_date','header'=>'Order Date','value'=>'$data->created_date'),    
	//array('name'=>'user_id','header'=>'Name','value'=>'$data->user->username'),
        //array('name'=>'user_id','header'=>'Mail Id','value'=>'$data->user->email'),
        array('name'=>'pack_name','header'=>'Package Name','value'=>'$data->credits->pack_name'),
        array('name'=>'pack_price','header'=>'Package Price','value'=>'$data->credits->pack_price'), 
        array('name'=>'quantity','header'=>'Quantity','value'=>'$data->qty'),             
        array('name'=>'paidamount','header'=>'Order $ Total','value'=>'$data->paidamount'),    
	array('name'=>'discount','header'=>'Coupon %','value'=>'$data->discount'), 	
	    array(
			'class'=>'CButtonColumn',
                        'header'=>'Invoice',   
                        'template'=>'{invoice}',
                        'buttons'=>array(
                            'invoice'=>array(
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/invoice.ico',
                                'url'=>'Yii::app()->createUrl("user/Viewinvoice", array("id"=>$data->id))',
                                'options'=>array('class'=>'invoice'),
                                'label'=>'View Invoice',
                               
                               
                                )
                            ),
                  ),	
	),
)); ?>
<br></br><br></br>