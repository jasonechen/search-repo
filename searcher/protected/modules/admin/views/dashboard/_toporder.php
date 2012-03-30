<table>
    <tr>
    <th>Order Id</th>
    <th>First Name</th>
    <th>Address</th>
    <th>City</th>
	<th>Package Name</th>
	<th>Package Value</th>
</tr>
<?php

foreach ($data as $key => $value) {
   ?>
<tr>
    <td><?php echo $value->order_id;?></td>
    <td><?php echo $value->bill_fname;?></td>
    <td><?php echo $value->bill_address1;?></td>
    <td><?php echo $value->bill_city;?></td>
	<td><?php echo $value->credits->pack_name;?></td>
	<td><?php echo $value->credits->pack_value;?></td>
</tr>
<?php
    
}
?>
</table>