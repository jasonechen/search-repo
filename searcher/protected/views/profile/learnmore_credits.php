<?php
$this->pageTitle=Yii::app()->name . ' - Learn More about Credits'; ?>

<h3>Learn More - Credits</h3>    



<div class="span-15">
<p>
    CrowdPrep uses its own currency - credits.  
    Purchase credits and spend them whenever you view a profile. The credit cost of any profile depends on which detail level you choose to purchase.
</p>
</div>


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
                <?php  echo CHtml::button('Buy Now', array('submit' => array('site/login'),
                     'csrf'=>true));
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

<br></br>
