<?php
$this->pageTitle=Yii::app()->name . ' - Credits Package';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
<?php 
 /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
		array('name'=>'pack_name','header'=>'Package Name'),
		array('name'=>'pack_value','header'=>'Package Value'),
                array('name'=>'pack_price','header'=>'Package Name'),
		array('name'=>'pricetype','header'=>'Price Type'),
            array('name'=>'pricecode','header'=>'Price Code'),
                array('name'=>'noofdaysactive','header'=>'No. Of Days Active'),
		array('name'=>'createdate','header'=>'Created Date'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Action',
                        'template'=>'{update}{delete}',
		),
	),
)); 

