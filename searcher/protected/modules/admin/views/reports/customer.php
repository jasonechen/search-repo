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
        <h3>Customer Report</h3>
    
    
<?php 
//test
 /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	
));*/

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
        array('name'=>'FirstName','header'=>'First Name.','filter'=>'FirstName'), 
        array('name'=>'LastName','header'=>'Last Name','value'=>'$data->LastName'),    
        array('name'=>'create_time','header'=>'Ac Start Date','value'=>'$data->create_time'),    
	
		
	),
));

$this->widget('zii.widgets.jui.CJuiButton', array(
'buttonType'=>'link',
'name'=>'btnGoExportar',
'caption'=>'Export to CSV',
'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
'url'=>array('exportcustomerrpt'),
));
?>

<?php $this->endWidget(); ?>
</div><!-- form -->