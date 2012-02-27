<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Buyer Admin',
);

$this->setAdminMenu();

?>

<h3>Credit Balance</h3>
<div class="portlet-title">
<?php   echo $msg; ?></div>
<div class="form" id="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'credits-form',
	'enableAjaxValidation'=>false,
)); ?>


    <div class="row">
          <?php echo "You have " ?> <b> <?php echo $creditModel->buy_credits ?> </b> <?php echo " credits available."; ?>
    </div>    
    <br></br>
   
<h3>Purchase More Credits</h3>    

<table style="border: 1px grey dotted; cellpadding:10px; " width="550" height="350" cellspacing="20" >

    <thead style="background-color: #f5f3e5;font-size: 18px; font-weight:bold; color: black">
    <td colspan="3"  style="text-align:center">Credit Purchase Packs</td></thead>
    <tbody style="font-size:12px">
     <tr>
    <?php 
    
    // out put Cloumn
    $i=0;
    foreach ($dataProvider as $key => $value) {    ?>
         
        <td style="border: 1px grey dotted;text-align:center"> 
            <tcredit><?php echo $value->pack_value; ?></tcredit> <br>
            <tcredit1>Credits</tcredit1> <br>
            <tcredit2><?php echo  $value->pricetype.$value->pack_price; ?></tcredit2><br> 
            <tcredit3>  (<?php echo $value->pricetype.(round(($value->pack_price/$value->pack_value),2)) ?>/Credit)</tcredit3><br> 
            <div class="buttons">  
                <?php  echo CHtml::button('Buy Now', array('submit' => array('/creditspurchase/index/id/'.$value->id)));
                    ?>
            </div>
        </td>
       <?php
       $i++;
       if($i%3==0)
       {
           $i=0;
           ?>
         </tr>
         <tr>
             <?php 
             
             }
     } ?>
    </tr>
    </tbody>

</table>
<?php $this->endWidget(); ?>
</div>    

<!--Next Line will be removed after paypal functionality complete -->
<?php echo $this->renderPartial('_buyerCredits', array('model'=>$model,
                                                       'bcModel'=>$bcModel,
                                                       'creditModel'=>$creditModel)); ?>

<br></br><br></br>