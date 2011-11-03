<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Buyer Admin',
);

$this->setAdminMenu();

?>

<h3>Purchase More Credits</h3>

<table style="border: 1px grey dotted; cellpadding:10px; " width="550" height="300" cellspacing="20" >

    <thead style="background-color: #f5f3e5;font-size: 18px; font-weight:bold; color: black">
    <td colspan="3"  style="text-align:center">Credit Purchase Packs</td></thead>
    <tbody style="font-size:12px">
    <tr><td style="border: 1px grey dotted;text-align:center">
            <tcredit>10</tcredit> <br>
            <tcredit1>Credits</tcredit1> <br>
            <tcredit2>$19.50</tcredit2><br> 
            <tcredit3>  ($1.95/Credit)</tcredit3><br> 
          <?php $this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'Buy Now',
		'value'=>'10',
		'onclick'=>'js:function(){alert("CHECKOUT"); this.blur(); return false;}',
		)
        ); ?>
</td>
        <td style="border: 1px grey dotted;text-align:center">
        <tcredit>20</tcredit><br>
        <tcredit1>Credits</tcredit1><br>
        <tcredit2>$38.50</tcredit2><br> 
        <tcredit3>  ($1.92/Credit)</tcredit3><br> 
                  <?php $this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'Buy Now',
		'value'=>'20',
		'onclick'=>'js:function(){alert("CHECKOUT"); this.blur(); return false;}',
		)
        ); ?>
  </td>
        <td style="border: 1px grey dotted;text-align:center"><tcredit>40</tcredit><br>
        <tcredit1>Credits</tcredit1><br>
        <tcredit2>$75.00</tcredit2><br> 
        <tcredit3>  ($1.88/Credit)</tcredit3><br>
                  <?php $this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'Buy Now',
		'value'=>'40',
		'onclick'=>'js:function(){alert("CHECKOUT"); this.blur(); return false;}',
		)
        ); ?></td>
    </tr>
    
    
    
    
    <tr><td style="border: 1px grey dotted;text-align:center"><tcredit>60</tcredit><br>
    <tcredit1>Credits</tcredit1><br>
    <tcredit2>$110.00</tcredit2><br> 
    <tcredit3>  ($1.84/Credit)</tcredit3><br> 
              <?php $this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'Buy Now',
		'value'=>'60',
		'onclick'=>'js:function(){alert("CHECKOUT"); this.blur(); return false;}',
		)
        ); ?></td>
        <td style="border: 1px grey dotted;text-align:center"><tcredit>120</tcredit><br>
        <tcredit1>Credits</tcredit1><br>
        <tcredit2>$216.00</tcredit2><br> 
        <tcredit3>  ($1.80/Credit)</tcredit3><br> 
                  <?php $this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'Buy Now',
		'value'=>'120',
		'onclick'=>'js:function(){alert("CHECKOUT"); this.blur(); return false;}',
		)
        ); ?></td>
            <td style="border: 1px grey dotted;text-align:center"><tcredit>160</tcredit><br>
            <tcredit1>Credits</tcredit1><br>
            <tcredit2>$280.00</tcredit2><br>
            <tcredit3>   ($1.76/Credit)</tcredit3><br>
                      <?php $this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'Buy Now',
		'value'=>'10',
		'onclick'=>'js:function(){alert("CHECKOUT"); this.blur(); return false;}',
		)
        ); ?></td>
    </tr>
    </tbody>

</table>

<?php echo $this->renderPartial('_buyerCredits', array('model'=>$model,
                                                       'bcModel'=>$bcModel,
                                                       'creditModel'=>$creditModel)); ?>