<?php
$this->pageTitle=Yii::app()->name . ' -  Refund';

?>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'deals-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
            array('name'=>'bill_fname','header'=>'First Name'),
            array('name'=>'bill_lname','header'=>'Last Name'),
            array('name'=>'bill_address1','header'=>'Address'),
            array('name'=>'bill_city','header'=>'City'),
            array('name'=>'bill_state','header'=>'State'),
            array('name'=>'bill_postal_code','header'=>'Postal Code'),
            array('name'=>'country','header'=>'Country'),
            array('name'=>'totalamount','header'=>'Bill Amount'),
            array('name'=>'paidamount','header'=>'Paid Amount'),
            array('value'=>'$data->refund_amount>0?"Refunded":" - "','header'=>'Status'),
            array(
			'class'=>'CButtonColumn',
                        'header'=>'Refund',
                        'template'=>'{update}{delete}',
                        'buttons'=>array(
                            'update'=>array(
                                'label'=>'Refund',
                                'visible'=>'($data->allow_refund_amount>0)',
                               
                                )
                            ),
                  ),
            ),
    )); 

