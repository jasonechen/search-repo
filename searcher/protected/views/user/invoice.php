<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'My Profiles',
);
$this->setAdminMenu();
//$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
//	array('label'=>'Create User', 'url'=>array('create')),
//);

?>

<h2>Invoice</h2>

<div class="row">
  
<table width="95%" align="center">
 <tbody><tr>
	<td>
	<h2><?php echo $model->bill_fname; ?></h2>
	<table width="100%" cellspacing="0" cellpadding="1" border="0">
		<tbody><tr>
			<td><font size="2" face="Arial"><b>Order ID: </b> <?php echo $model->order_id; ?></font></td>
			<td align="right"><font size="2" face="Arial"><b></b></font>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr><td colspan="2"><font size="2" face="Arial"><b>Date: </b> <?php echo $model->created_date; ?></font></td></tr>
		<tr><td colspan="2"><font size="2" face="Arial"><b>Payment by: </b><?php 
                $cardtype=PaymentCardTypeModel::model()->find('shortname=:card_type', array(':card_type'=>$model->card_type));
                echo $cardtype->cardname; ?></font></td></tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td width="50%"><font size="2" face="Arial"><b>Invoice to:</b> <?php echo $model->bill_fname; ?></font></td>
			
		</tr>
		<tr><td><font size="2" face="Arial"><?php echo $model->bill_address1; ?></font></td></tr>
		<tr><td><font size="2" face="Arial"><?php echo $model->bill_city; ?></font></td></tr>
		<tr><td><font size="2" face="Arial"><?php echo $model->bill_state; ?> -  <?php echo $model->bill_postal_code; ?></font></td></tr>
		<tr><td><font face="Arial" size=2> <?php echo $model->country; ?></font></td></tr>
		
		<tr><td colspan="2">&nbsp;</td></tr>
	</tbody></table>
	
	</td>
</tr>
 <tr>
	<td>
	
	<table width="100%" cellspacing="0" cellpadding="3" border="0">
		<tbody><tr>
		<td width="12%" align="center" bgcolor="#555555"><font size="2" face="Arial" color="white"><b>Quantity</b></font></td>
		<td width="56%" bgcolor="#555555"><font size="2" face="Arial" color="white"><b>Product</b></font></td>
		<td width="16%" align="right" bgcolor="#555555"><font size="2" face="Arial" color="white"><b>Price</b></font></td>
		<td width="16%" align="right" bgcolor="#555555"><font size="2" face="Arial" color="white"><b>Amount</b></font></td>
		</tr>
		 
		
		<tr><td colspan="4"><hr size="1"></td></tr>
		<tr>
		<td align="center"><font size="2" face="Arial"><b><?php echo $model->qty; ?></b></font></td>
		<td align="left"><font size="2" face="Arial"><b><?php echo $model->credits->pack_name; ?></b></font></td>
		<td align="left"><font size="2" face="Arial"><b>Voucher</b></font></td>
		<td align="right"><font size="2" face="Arial"> <?php echo $model->totalamount; ?></font></td>
		</tr>
		<tr>
		<td colspan="2"></td>
		<td align="left"><font size="2" face="Arial"><b>Discount</b></font></td>
		<td align="right"><font size="2" face="Arial"> <?php echo $model->discount; ?></font></td>
		</tr>				
		
		
		<tr>
		<td colspan="2"></td>
		<td align="left"><font size="2" face="Arial"><b>Tax</b></font></td>
		<td align="right"><font size="2" face="Arial">0.00</font></td>
		</tr>
		
		<tr><td colspan="4"><hr size="1"></td></tr>
		
		<tr>
		<td colspan="2"></td>
		<td align="left"><font size="2" face="Arial"><b>TOTAL</b></font></td>
		<td align="right"><font size="2" face="Arial"><?php echo $model->paidamount; ?></font></td>
		</tr>
	
	</tbody></table>	
	
	
	
	</td>
</tr>
</tbody></table>		

</div>
