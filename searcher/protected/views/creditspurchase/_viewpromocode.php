    <div id="clsPromoCode">
        <div class="errorMessage">
             <?php echo $promodata['status']; ?>
         </div>   
        <p class="refund">
            Enter a Promo Code (Optional) <br/>
        <div id="row">
            If you have Promo code or coupon enter it here
            <?php echo CHtml::hiddenField('promocodevalue',$promodata['disvalue']); ?>
             <?php echo CHtml::textField('promocode',$promodata['code']); ?>
           
            
            <?php echo CHtml::ajaxButton ("Update Code",
                              CController::createUrl('creditspurchase/UpdateAjax'), 
                              array('update' => '#clsPromoCode')); ?>
            
        </div>
            
        </p>
    </div>
    