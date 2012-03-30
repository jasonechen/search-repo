<?php
$this->pageTitle=Yii::app()->name . ' - Verified Profile';
?>



<div class="form">
    
    
<?php 
  
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Referrals-List',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?> 
    
    
     <h3>Verified Profile </h3>
        
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
        array('header'=>'User Name','value'=>'$data->user->FirstName'), 
        array('header'=>'Mail Id','value'=>'$data->user->email'),    
	array('name'=>'create_time','header'=>'Created Date'),
            array('name'=>'ref1_check','header'=>'Check Referral 1','value'=>'isset($data->ref1_check)&& $data->ref1_check==1 ? "Checked" : "Not Checked"'),
            array('name'=>'ref2_check','header'=>'Check Referral 2','value'=>'isset($data->ref2_check) && $data->ref2_check==1 ? "Checked"  : "Not Checked"'),
            array('name'=>'ref3_check','header'=>'Check Referral 3','value'=>'isset($data->ref3_check)&& $data->ref3_check==1  ? "Checked"  : "Not Checked"'),
        array(
			'class'=>'CButtonColumn',
                        'header'=>'Actions',
                        'template'=>'{view}{active}',
                        'buttons' => array(
                            'active' => array(
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/forms/active.png',
                                        'options'=>array('title'=>"Actived"),
                                        'label'=>'Active',
                                        'url'=>'Yii::app()->createUrl("admin/verifyprofile/active&id=$data->id")',
                                       // 'url'   => Yii::app()->controller->createUrl("approve",array("id"=>$data->id,"status"=>1,"type"=>$type)), 
                                            ),
                             'view' => array(
                                        'label'=>'View Referral',
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/forms/edit.png',
                                        ),
                            
                                        ),
                      ),
                 
	),
   
            
));


?>

<?php $this->endWidget(); ?>
</div>