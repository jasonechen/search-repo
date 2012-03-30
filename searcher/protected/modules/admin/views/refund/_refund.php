<div class="view">
    
    
    <div id='credits'>
         <div id="row">
           <p> <h3>Refund </h3>
               <hr style="height:4px;"/>
           </p>
         </div>   
        <div class="errorMessage">
            <?php echo $msg; ?>
        </div>	
        <div id="row">
              <?php echo $form->labelEx($model,'totalamount'); ?>
              <?php echo $form->textField($model,'totalamount',array('readonly'=>true,'size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'totalamount'); ?>
        </div>
        
        <div id="row">
              <?php echo $form->labelEx($model,'paidamount'); ?>
              <?php echo $form->textField($model,'paidamount',array('readonly'=>true,'size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'paidamount'); ?>
        </div>
        
        <div id="row">
              <?php echo $form->labelEx($model,'allow_refund_amount'); ?>
              <?php echo $form->textField($model,'allow_refund_amount',array('readonly'=>true,'size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'allow_refund_amount'); ?>
        </div>
        <div id="row">
              <?php echo $form->labelEx($refundmodel,'refund_amt'); ?>
              <?php echo $form->textField($refundmodel,'refund_amt',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($refundmodel,'refund_amt'); ?>
        </div>
         
       
       
    </div> 
    
    
    <div id="row">
        <?php 
        echo CHtml::submitButton('Refund');
        ////echo CHtml::button('Submit Order', array('submit' => array('/creditspurchase/index/id/'.$value->id))); ?>
    </div>
</div>