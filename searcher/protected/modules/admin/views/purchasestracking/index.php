<?php
$this->pageTitle=Yii::app()->name . ' - Order Details';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
<div class="view">
<?php 
 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order tracking',
        //'filter'=>$model,
	'dataProvider'=>$model->search(),
  //  'summaryCssClass'=>'full_h1 boxRounded',
    'cssFile' => '/css/gridview/styles.css',
 //   'summaryText'=>'Manage Locations <span class="floatR">{count} Locations | <a href="/locations/create/'.$model->restaurant_id.'">+ Add Location</a></span>',
	'columns'=>array(
		//'id',
		//'restaurant_id',
                'bill_fname',
                'bill_lname',
                'bill_address1',
		'bill_city',
		'bill_state',
                'bill_postal_code',
                
                array('name'=>'totalamount','header'=>'Total Amount'),
            array('name'=>'paidamount','header'=>'Paid Amount'),
            array('name'=>'discount','header'=>'Discount %'),
             array('name'=>'payment_type','value'=>'CommonMethods::getPaymentType($data->payment_type)' ),
             array('name'=>'created_date','header'=>'Order Date'),
            
		
	),
));

?>
</div>



