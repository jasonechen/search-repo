<?php
$model=CreditsPackage::model()->findAll();
$count= OrderPayment::model()->count();
?>
<table>
    <tr>
        <td><b>Total Sale :</td><td><?php echo $count;?></b></td>
     </tr>   
     <tr>
         <td colspan="2"><hr/></td>
     </tr> 
     
        <?php
        foreach ($model as $key => $data) {
        ?>
        <tr>
        <td><?php echo $data->pack_name;?></td>
        <td><?php
        $cnt= OrderPayment::model()->count('credits_id = '.$data->id);
        echo $cnt;
        ?></td>
         </tr>
        <?php
    
}
        ?>
    </tr>
</table>    