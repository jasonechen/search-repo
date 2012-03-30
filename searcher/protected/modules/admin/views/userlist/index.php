<?php
$this->pageTitle=Yii::app()->name . ' - User List';
?>



<div class="form">
    
    
<?php 
  
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Users List',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
                'validateOnChange'=>false,
	),
)); ?> 
    
    <?php 
    $utype='All';
    if(@$type)
    switch (@$type)
    {
        case 'B':
            $utype='Buyer';
            break;
        case 'S':
            $utype='Seller';
            break;
                
    }
    else
        $type='all';
    ?>
     <h3>User list <?php echo 'by '.$utype; ?></h3>
     <h4><b>
    <a href='?r=admin/userlist&type=all'>All</a> | 
    <a href='?r=admin/userlist&type=B'>Buyer</a> |
    <a href='?r=admin/userlist&type=S'>Seller</a> 
    </b></h4>   
     
      <div class="active">
        
        <?php 
        $noOfweek = Yii::app()->params['referral_exp_weeks'];
        echo CHtml::link('Delete '.$noOfweek.' weeks before Inactive Referral', '?r=admin/userlist/Deleteinactivefriends');?>
        </div>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=> $dataProvider->model,
    'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
		array('name'=>'id','header'=>'Id','filter'=>'id','htmlOptions'=>array('style'=>'text-align: center')), 
        array('name'=>'username','header'=>'User Name','filter'=>'username'), 
        array('name'=>'email','header'=>'Mail Id'),    
		array('name'=>'FirstName','header'=>'First Name'),
        array('name'=>'LastName','header'=>'Last Name'),
        array('name'=>'create_time','header'=>'Created Date'),
        array('name'=>'transType','header'=>'Trans Type' ),
            
        array( 'type'=>'raw', 'value'=>'CHtml::link(CommonMethods::getCount($data->id,0,true),
            array("referrals/view", "id"=>$data->id))', 'header'=>'Referral Count',
           'htmlOptions'=>array('style'=>'text-align: center'),),
           
        array('name'=>'active', 'value'=>'CommonMethods::getUserStatus($data->active)','header'=>'Status'),       
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Change Status',
                        'template'=>'{active}{inactive}',
                        'buttons' => array(
                                'active' => array(
                                        'imageUrl'=>Yii::app()->request->baseUrl."/images/forms/active.png",
                                        'options'=>array('title'=>"Actived"),
                                        'label'=>'Active',
                                        'url'=>'Yii::app()->createUrl("admin/userlist/approve", array("id"=>$data->id,"status"=>1,"type"=>\''.$type.'\'))',
										'visible'=> '($data->active<=0) ? true : false'
                                        ),
                                'inactive' => array(
                                        'imageUrl'=>Yii::app()->request->baseUrl."/images/forms/inactive.png",
                                        'options'=>array('title'=>"Inactived"),
                                        'label'=>'Inactive',
                                        'url'=>'Yii::app()->createUrl("admin/userlist/approve", array("id"=>$data->id,"status"=>0,"type"=>\''.$type.'\'))',
                                        'visible'=> '($data->active>0) ? true : false'
 
                                        ),       
                        ),
                  ),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Action',
                        'template'=>'{update}{delete}',
                      ),
	),
   
            
));

$this->widget('zii.widgets.jui.CJuiButton', array(
'buttonType'=>'link',
'name'=>'btnGoExportar',
'caption'=>'Export '.$utype,
'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
'url'=>array('exportusers','type'=>$type),
));

?>

<?php $this->endWidget(); ?>
</div>