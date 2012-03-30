<?php
$this->pageTitle=Yii::app()->name . ' - Refund Report';
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
        <h3>Refund Report</h3>
    <!--
     From Date :
<?php 
   /*                 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'act_fromdate',
                    'value'=>$model->act_fromdate,
                    'options'=>array('dateFormat'=>'yy-mm-dd',
                                    //'defaultDate'=>$model->act_fromdate,
                                    'yearRange'=>'1900',
                                    ),
                    'language'=>'en-AU',
                    ));
      */          ?>
 To Date:
 <?php 
              /*      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'act_todate',
                    'value'=>$model->act_fromdate,
                    'options'=>array('dateFormat'=>'yy-mm-dd',
                                    //'defaultDate'=>$model->act_fromdate,
                                    'yearRange'=>'1900',
                                    ),
                    'language'=>'en-AU',
                    ));
               */ ?>

        <input type="submit" class="make_filter" name="filterBtn" value="filter" />
    -->
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
        array('name'=>'order_id','header'=>'Order No.','value'=>'$data->order_id'), 
        array('name'=>'user_id','header'=>'User name.','value'=>'$data->user->username'),
        array('name'=>'order_id','header'=>'Order Date','value'=>'$data->created_date'),    
        //array('name'=>'refund_date','header'=>'Refund Date'),    
        array('name'=>'user_id','header'=>'Net Amount.','value'=>'$data->totalamount'),
        array('name'=>'user_id','header'=>'Paid Amount','value'=>'$data->paidamount'), 	
        array('name'=>'refund_amt','header'=>'Refund Amount.','value'=>'$data->refund_amount'), 	
	array('class'=>'CButtonColumn',
              'header'=>'Refund Details',
              'template'=>'{update}',
              'buttons'=>array(
                  'update'=>array(
                      'label'=>'Refund / Transations',
                       )), ),	
	),
));

$this->widget('zii.widgets.jui.CJuiButton', array(
'buttonType'=>'link',
'name'=>'btnGoExportar',
'caption'=>'Export to CSV',
'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
'url'=>array('ExportarRefundRpt'),
));
?>

<?php $this->endWidget(); ?>
</div><!-- form -->