<?php
$this->pageTitle=Yii::app()->name . ' - Referrals-List';
?>



<div class="form">
    
    
<?php 
  $this->widget('ext.pixelmatrix.EUniform'); 
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Referrals-List',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?> 
    
    
     <h3>User list </h3>
        
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
        array('name'=>'user->id','header'=>'User Name','value'=>'$data->user->id'), 
        array('name'=>'user->username','header'=>'User Name','value'=>'$data->user->username'), 
        array('name'=>'email','header'=>'Mail Id','value'=>'$data->user->email'),    
	array('name'=>'FirstName','header'=>'Name','value'=>'$data->user->FirstName'),
        array('name'=>'create_time','header'=>'Created Date','value'=>'$data->user->create_time'),
        array('name'=>'id','header'=>'Active Count','value'=>'CommonMethods::getCount($data->user_id,1)'),//$this->getCount($data->id)
       array('name'=>'id','header'=>'Inactive Count','value'=>'CommonMethods::getCount($data->user_id,0)'),
	 array(
			'class'=>'CButtonColumn',
                        'header'=>'Actions',
                        'template'=>'{view}{delete}',
                        'buttons' => array(
                                'view' => array(
                                    //    'imageUrl'=>Yii::app()->request->baseUrl.'/images/forms/active.png',
                                            //$data->active==1? Yii::app()->request->baseUrl.'/images/forms/active.png':Yii::app()->request->baseUrl.'/images/forms/inactive.png
                                        'options'=>array('title'=>"View All"),
                                        'label'=>'Active',
                                        'url'=>'Yii::app()->createUrl("admin/referrals/view", array("id"=>$data->user->id))',
                                      
                                        ),
                                'delete' => array(
                                        'options'=>array('title'=>"Delete Non-Active Users"),
                                        'label'=>'Inactive',
                                     'url'=>'Yii::app()->createUrl("admin/referrals/delete", array("id"=>$data->user->id))',
                                         ),        
                        ),
                  ),
                 
	),
   
            
));


?>

<?php $this->endWidget(); ?>
</div>