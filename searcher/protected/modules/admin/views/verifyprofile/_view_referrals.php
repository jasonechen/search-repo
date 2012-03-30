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
        
       
       
       
    </div> 
    <div id='edit-user'>
         <div id="row">
           <p> 
           <h3><?php echo CHtml::link('User-List', '?r=admin/userlist/');?> / <?php echo $name; ?>
               <h3>Referral Users </h3>
               <hr style="height:4px;"/>
           </p>
         </div>   
        <div class="active">
        Active User :<?php echo CommonMethods::getCount($uid, 1); ?>  <br/>
        Inactive User :<?php echo CommonMethods::getCount($uid, 0); ?> <br/>
        <?php echo CHtml::link('Delete all my Inactive friends', '?r=admin/referrals/deleteallbyuser&id='.$uid);?>
        </div>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$dataProvider,
        'cssFile' => '/css/gridview/styles.css',
	'columns'=>array(
        array('name'=>'id','header'=>'User Name'), 
        array('name'=>'friend_email','header'=>'Friend Email'), 
        array('name'=>'date_referred','header'=>'Date Referred'), 
        array('value'=>'$data->active?"Actived":" Inactived "','header'=>'Status'),
             array(
			'class'=>'CButtonColumn',
                        'header'=>'Action',
                        'template'=>'{delete}{active}',
                        'buttons'=>array(
                            'delete'=>array(
                                'label'=>'Delete',
                                'visible'=>'(!$data->active)',
                               
                                ),
                            'active' => array(
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/forms/active.png',
                                        'options'=>array('title'=>"Active",'style'=>'cursor:no-drop;'),
                                        'label'=>'Active',
                                        'visible'=>'($data->active)',
                                       ),
                            ),
                      ),
	//array('name'=>'FirstName','header'=>'Name','value'=>'$data->user->FirstName'),
       // array('name'=>'create_time','header'=>'Created Date','value'=>'$data->user->create_time'),
        //array('name'=>'id','header'=>'Active Count','value'=>'CommonMethods::getCount($data->user_id,1)'),//$this->getCount($data->id)
        //array('name'=>'id','header'=>'Non-active Count','value'=>'CommonMethods::getCount($data->user_id,0)'),
	 
                 
	),
   
            
));


?>

<?php $this->endWidget(); ?>
</div>