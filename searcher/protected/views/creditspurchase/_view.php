<script type ="text/javascript">
 function addQty(qty)
{
    if(qty>0)
    {
     var price = document.getElementById('packprice').value;
      var dis = document.getElementById('discountper').value;
     var ordPrice = price * qty;
     var totPrice = ordPrice;
     if(dis>0)
     {
        var dis = ordPrice * (dis/100);
        totPrice = ordPrice-dis;
        document.getElementById('disprice').innerHTML = parseFloat(dis).toFixed(2);
        document.getElementById('totaldiscount').value = dis;
        
     }
  
     //var disAmt = 
     
     
     document.getElementById('ordtotal').innerHTML=parseFloat(ordPrice).toFixed(2);
     document.getElementById('subtotal').innerHTML = parseFloat(ordPrice).toFixed(2);
     document.getElementById('total').innerHTML =parseFloat(ordPrice).toFixed(2);
     document.getElementById('netprice').innerHTML = parseFloat(totPrice).toFixed(2);
     document.getElementById('totprice').innerHTML= parseFloat(totPrice).toFixed(2);
     document.getElementById('totalprice').value=parseFloat(ordPrice).toFixed(2);
    document.getElementById('totalwithdisprice').value=parseFloat(totPrice).toFixed(2);
    }
}


$('#card-form').submit(function() {
  return testCreditCard();
  //return false;
});
    

function testCreditCard () {
   
  myCardNo = document.getElementById('OrderPaymentModel_cardno').value;
  myCardType = document.getElementById('OrderPaymentModel_card_type').value;
  // alert(myCardNo);
  if (checkCreditCard (myCardNo,myCardType)) {
   return true;
  } 
  else {
       alert (ccErrors[ccErrorNo])};
        return false;
}

</script>

<?php
    Yii::app()->clientScript->registerScript('hide',"
         
        function changeAmmount(value,id)
        {
             var packprice = document.getElementById('packprice').value;
             var qty = document.getElementById('OrderPaymentModel_qty').value;
             var price = packprice * qty;
              document.getElementById('totalprice').value = price;
             document.getElementById('promocode').value= '';
            if(value>0)
            {
               
                var dis = price * (value/100);
                var totprice = price-dis; 
                document.getElementById('totalwithdisprice').value= totprice;
                document.getElementById('promocodeid').value= id;
                document.getElementById('totaldiscount').value= dis;
                 document.getElementById('disprice').innerHTML = parseFloat(dis).toFixed(2); 
               
                document.getElementById('discountper').value = value;
                document.getElementById('totprice').innerHTML  = parseFloat(totprice).toFixed(2);
                document.getElementById('netprice').innerHTML= parseFloat(totprice).toFixed(2);
                document.getElementById('errorMessage').innerHTML  = 'Thank you for using the coupon! now you can get '+value+'% offer from your total amount of purchase';
                
            }
            else if(id=='y')
            {
                 document.getElementById('totprice').innerHTML = price;
                document.getElementById('errorMessage').innerHTML  = 'You have already used this coupon <br> Please use another coupon if you have';
            }
            else
            {
               document.getElementById('totprice').innerHTML = price;
               document.getElementById('errorMessage').innerHTML  = 'Please Check Coupon Code or Discount is Not Applicable for <br/> This Coupon ';
            }
            
           
        }
       
    ",CClientScript::POS_READY);
    
 
?>
<div class="span-18">
<div class="cartview">
           <p> <h3>1: Review Cart Contents</h3>
               <hr style="height:4px;"/>
           </p>
    Order Item
    <table  style="width:90%;" class="order-item-tbl"> 
        <tr>
            <th>Items</th>
            <th>Quantity</th>
            <th>Item Price</th>
            <th>Total</th>
        </tr> 
         <tr>
            <td>Bundle Package: <?php echo $credit->pack_value; ?> Credits</td>
            <td> <?php echo $form->textField($paymentdetails,'qty',array('size'=>3,'maxlength'=>2
                ,'onChange' =>'addQty(this.value)' )); ?>
              <?php echo $form->error($paymentdetails,'qty'); ?></td>
            <td><?php echo $credit->pricetype.$credit->pack_price.$credit->pricecode; ?></td>
            <td><?php echo $credit->pricetype."<span id='ordtotal'>".$credit->pack_price."<span>".$credit->pricecode; ?></td>
        </tr>
         <tr>
             <td>Credits Expire : <b><?php echo $credit->noofdaysactive==0 ?  "Nill":""; ?></b> </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td>Order Sub Total</td>
            <td></td>
            <td></td>
            <td><?php echo $credit->pricetype."<span id='subtotal'>".$credit->pack_price."<span>".$credit->pricecode; ?></td>
        </tr>
         <tr>
            <td>Tax</td>
            <td></td>
            <td></td>
            <td>$0.00</td>
        </tr>
         <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td><?php echo $credit->pricetype."<span id='total'>".$credit->pack_price."<span>".$credit->pricecode; ?></td>
        </tr>
        <tr>
            <td><b>Discount</b></td>
            <td></td>
            <td></td>
            <td><?php echo $credit->pricetype."<b><span id='disprice'>0.00</span></b>".$credit->pricecode; ?></td>
        </tr>
        <tr>
            <td><b>Net Total</b></td>
            <td></td>
            <td></td>
            <td><?php echo $credit->pricetype."<b><span id='netprice'>$credit->pack_price.</span></b>".$credit->pricecode; ?></td>
        </tr>
    </table>    
    <div>
        <p class="refund">
            Refund Policy<br/>
                You are entitled to a full refund within 14 days, net of any purchased Profiles Views.
            
        </p>
    </div>
     <div>
             <div id="clsPromoCode">
        <div id='errorMessage' class="errorMessage">
        </div>   
        Enter a Promo Code (Optional) <br/>
        <div id="row">
            If you have Promo code or coupon enter it here
            <?php echo CHtml::hiddenField('promocodevalue',''); ?>
             <?php echo CHtml::textField('promocode',''); ?>
             <?php echo CHtml::button ("Update Code",array('size'=>30,
                    'ajax'=>array(
                    'type'=>'GET',
                    //'url'=>'/creditspurchase/UpdateAjax',
                     'url'=>'?r=creditspurchase/UpdateAjax',
                    'success'=>'function(msg){
                        var value = msg.substr(0,msg.indexOf("_"));
                        var id = msg.substr(msg.indexOf("_")+1,msg.length);
                        changeAmmount(value,id);
                    
                    }'
                    ),
                  )); ?>
         </div>
       </div>
        
    </div>
    <div id='billinfo'>
         <div id="row">
           <p> <h3>2: Billing Info</h3>
               <hr style="height:4px;"/>
           </p>
         </div>   

    <table width="500" height="320" >
      <col width="200px" />
      <col width="200px" />    
      <col width="100px" />
    <tbody style="font-size:12px">

        <tr><td>     
		<?php echo $form->labelEx($paymentdetails,'bill_fname'); ?> 
            </td>
            <td>
              <?php echo $form->textField($paymentdetails,'bill_fname',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($paymentdetails,'bill_fname'); ?>
            </td>
            <td></td>
        </tr>
      <tr><td>     
              <?php echo $form->labelEx($paymentdetails,'bill_lname'); ?>
            </td>
            <td>
              <?php echo $form->textField($paymentdetails,'bill_lname',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($paymentdetails,'bill_lname'); ?>
            </td>
            <td></td>
        </tr>   
       <tr><td>     
              <?php echo $form->labelEx($paymentdetails,'bill_address1'); ?>
            </td>
            <td>
              <?php echo $form->textField($paymentdetails,'bill_address1',array('size'=>30,'maxlength'=>100)); ?>
              <?php echo $form->error($paymentdetails,'bill_address1'); ?>
            </td>
            <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
 
          <tr><td>     
              <?php echo $form->labelEx($paymentdetails,'bill_address2'); ?>
            </td>
            <td>
              <?php echo $form->textField($paymentdetails,'bill_address2',array('size'=>30,'maxlength'=>100)); ?>

            </td>
            <td style="font-style: italic"></td>
        </tr>  
            <tr><td>     
              <?php echo $form->labelEx($paymentdetails,'bill_city'); ?>
            </td>
            <td>
              <?php echo $form->textField($paymentdetails,'bill_city',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($paymentdetails,'bill_city'); ?>
            </td>
            <td style="font-style: italic"></td>
        </tr>   
        
                  <tr><td>     
              <?php echo $form->labelEx($paymentdetails,'bill_state'); ?>
            </td>
            <td>
              <?php echo $form->dropDownList($paymentdetails,'bill_state',$state); ?>              
              <?php echo $form->error($paymentdetails,'bill_state'); ?>
            </td>
        </tr>  
                  <tr><td>     
              <?php echo $form->labelEx($paymentdetails,'bill_postal_code'); ?>
            </td>
            <td>
              <?php echo $form->textField($paymentdetails,'bill_postal_code',array('size'=>30,'maxlength'=>5)); ?>
              <?php echo $form->error($paymentdetails,'bill_postal_code'); ?>
            </td>
        </tr>  
            <tr><td>     
              <?php echo $form->labelEx($paymentdetails,'country'); ?>
            </td>
            <td>
              <?php echo $form->dropDownList($paymentdetails,'country', $country); ?>              
              <?php echo $form->error($paymentdetails,'country'); ?>
            </td>
        </tr> 
    </tbody>
  </table>

    </div>        
    
    <div id="paymethod">
        <div id="row">
            <p><h3>3: Choose Payment Method</h3>
            <hr style="height:4px;"/>
            </p>
        </div>
         <div id='errorMessage' class="errorMessage">
    <?php echo $error; ?>
    </div> 
        <?php echo CHtml::hiddenField('packprice',$credit->pack_price); ?>
        <?php echo CHtml::hiddenField('totalprice',$credit->pack_price); ?>
        <?php echo CHtml::hiddenField('invprice',$credit->pack_price); ?>
        <?php echo CHtml::hiddenField('totalwithdisprice',''); ?>
        <?php echo CHtml::hiddenField('promocodeid',''); ?>
        <?php echo CHtml::hiddenField('discountper',''); ?>
        <?php echo CHtml::hiddenField('totaldiscount',''); ?>
        
        I will pay<span class="dis-payment">  <?php echo $credit->pricetype; ?> <span id="totprice"> <?php echo $credit->pack_price; ?></span> <?php echo $credit->pricecode; ?> </span> from :<br/>
        <div class="row">
             <?php //echo $form->radioButton($paymentdetails,'payment_type',array('value'=>'1')) . 'Credit Card'; ?>
           
        </div>
        <div class="row">
             <?php echo $form->radioButton($paymentdetails,'payment_type',array('value'=>'2','checked'=>'checked')) . 'Paypal'; ?>
        </div>
         <div class="row">
             <?php echo $form->radioButton($paymentdetails,'payment_type',array('value'=>'3')) . 'Google Checkout'; ?>
        </div>
        
        <div class="row">
            <?php echo CHtml::image(Yii::app()->request->baseURL. '/images/forms/cards.jpg');  ?>
        </div>

        
   
            <table width="475" height="200" >
      <col width="200px" />
      <col width="200px" />    
      <col width="50px" />
    <tbody style="font-size:12px">

        <tr><td>     
            <?php echo $form->labelEx($paymentdetails,'card_type'); ?> 
            </td>
            <td>
            <?php echo $form->dropDownList($paymentdetails,'card_type', $cardtype,array('class'=>"cc-ddl-type")); ?>
            <?php echo $form->error($paymentdetails,'card_type'); ?>
            </td>
            <td></td>
        </tr>
      <tr><td>     
                <?php echo $form->labelEx($paymentdetails,'nameoncard'); ?>
            </td>
            <td>
                <?php echo $form->textField($paymentdetails,'nameoncard',array('size'=>30,'maxlength'=>50,)); ?>
              <?php echo $form->error($paymentdetails,'nameoncard'); ?>
            </td>
            <td></td>
        </tr>   
       <tr><td>     
            <?php echo $form->labelEx($paymentdetails,'cardno'); ?>
            </td>
            <td>
             <?php echo $form->textField($paymentdetails,'cardno',array('size'=>30,'maxlength'=>50,'class'=>'large cc-card-number','onChange' =>'testCreditCard(this.value)')); ?>
              <?php echo $form->error($paymentdetails,'cardno'); ?>
            </td>
            <td style="font-style: italic; font-size: 12px"></td>
        </tr> 
 
          <tr><td>     
            <?php echo $form->labelEx($paymentdetails,'securitycode'); ?>
            </td>
            <td>
            <?php echo $form->passwordField($paymentdetails,'securitycode',array('size'=>30,'maxlength'=>4)); ?>
            <?php echo $form->error($paymentdetails,'securitycode'); ?>

            </td>
            <td style="font-style: italic"></td>
        </tr>  

    </tbody>
    
</table>
    
            <table width="420" height="30" >
      <col width="200px" />
      <col width="100px" />    
      <col width="100px" />    
    <tbody style="font-size:12px">
            <tr>
            <td>     
             <?php echo CHTML::label("Expiration Month and Year","Month and year"); ?>   
            </td>
            <td>
           <?php echo $form->dropDownList($paymentdetails,'exp_month', $month); ?>
            </td>
            <td>
           <?php echo $form->dropDownList($paymentdetails,'exp_year', $year); ?>
            </td>
        </tr>   
    </tbody>
</table>
            
            <div id="row">
            <div class="buttons">
            <br/><br/>
            <?php  echo CHtml::submitButton('Submit');  ?>
            <!-- ////echo CHtml::button('Submit Order', array('submit' => array('/creditspurchase/index/id/'.$value->id)));  -->
            </div>
            <br/><br/>
        </div>
            
            
    </div>
</div>
</div>    