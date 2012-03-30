<?php
$this->pageTitle=Yii::app()->name . ' -  Coupons';
/*$this->breadcrumbs=array(
	'Login',
);*/
$this->breadcrumbs=array(
	Yii::t('admin.importcsv', 'Import')." CSV",
);
?>
<?php 
 /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'deals-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
		array('name'=>'promo_code','header'=>'Coupons Code'),
		array('name'=>'discount_value','header'=>'Discount %'),
                array('name'=>'act_fromdate','header'=>'From Date'),
		array('name'=>'act_todate','header'=>'To Date'),
                array('name'=>'createdate','header'=>'Created Date'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Action',
                        'template'=>'{update}{delete}',
		),
	),
)); 

