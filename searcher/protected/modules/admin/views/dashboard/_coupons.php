<table>
    <tr>
    <th>Package Name</th>
    <td>Package Value</th>
    <th>Package Price</th>
    <th>No of times sales</th>
	<th>Total Quantity</th>
	
</tr>
<?php

foreach ($data as $key => $value) {
if($value['cnt'] && $value['coupon_id'] )
{
    $row = CreditsPackage::model()->findByPk($value['coupon_id']);
   ?>
<tr>
    <td><?php echo $row['pack_name'];?></td>
    <td><?php echo $row['pack_value'];?></td>
    <td><?php echo $row['pack_price'];?></td>
    <td><?php echo $value['cnt'];?></td>
	<td><?php echo $value['qty'];?></td>
	
</tr>
<?php
}
}
?>
</table>