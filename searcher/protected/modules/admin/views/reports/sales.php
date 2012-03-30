<?php
$this->pageTitle=Yii::app()->name . ' - Sales Report';
?>


<div class="form">
    
    
<?php 
  
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Sales Reports',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?> 
    <div style="text-align:center">
       
        </div><br />
        <h3>Sales Report</h3>
   
<?php 
/*
$properties = array(
    'id' => $this->action->id .'-grid',
    'dataProvider' => $dataProvider,
    'columns' => isset($columns) ? $columns : array(),
    'showTableOnEmpty' => false,
    'title' => 'sample',
);
$this->widget('application.widgets.Excel.ExcelSheetView', $properties);
 */
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
        array('name'=>'order_id','header'=>'Order No.','filter'=>'order_id'), 
        array('name'=>'created_date','header'=>'Order Date','value'=>'$data->created_date'),    
	array('name'=>'user_id','header'=>'Name','value'=>'$data->user->username'),
        array('name'=>'user_id','header'=>'Mail Id','value'=>'$data->user->email'),
        array('name'=>'pack_name','header'=>'Package Name','value'=>'$data->credits->pack_name'),
        array('name'=>'pack_price','header'=>'Package Price','value'=>'$data->credits->pack_price'),    
        array('name'=>'totalamount','header'=>'Total Amount','value'=>'$data->totalamount'),    
        array('name'=>'paidamount','header'=>'Paid Amount','value'=>'$data->paidamount'),    
	array('name'=>'paidamount','header'=>'Discount in %','value'=>'$data->discount'), 	
		
	),
));

$this->widget('zii.widgets.jui.CJuiButton', array(
'buttonType'=>'link',
'name'=>'btnGoExportar',
'caption'=>'Export to CSV',
'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
'url'=>array('exportarsalesrpt'),
));


?>

<?php $this->endWidget(); ?>
</div><!-- form -->