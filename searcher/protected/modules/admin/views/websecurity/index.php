<?php
$this->pageTitle=Yii::app()->name . ' - Website Security';
?>
<div class="form">


<?php 

  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Blocked-List',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?> 
    
    
     <h3>Blocked Email list </h3>
<br/><br/><br/><br/>        
<?php 
$data = array('form'=>$form,'model'=>$model);

echo $this->renderPartial('/websecurity/_view_mail', $data);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
        array('name'=>'id','header'=>'Id'), 
        array('name'=>'svalues','header'=>'Email Id'),    
	array('name'=>'created_date','header'=>'Created Date'),
        
	 array(
			'class'=>'CButtonColumn',
                        'header'=>'Actions',
                        'template'=>'{update}{delete}',
                        'buttons' => array(
                                'update' => array(
                                       'url'=>'Yii::app()->createUrl("admin/websecurity/index", array("id"=>$data->id))',
                                       ),
                            ),
                        
                  ),
                 
	),
   
            
));


?>

<?php $this->endWidget(); ?>
</div>