<div class="view">
    
    
    <div id='credits'>
         <div id="row">
           <p> <h3>Coupons </h3>
               <hr style="height:4px;"/>
           </p>
         </div>   
        <div id="row">
              <?php echo $form->labelEx($model,'promo_code'); ?>
              <?php echo $form->textField($model,'promo_code',array('size'=>30,'maxlength'=>50)); ?>
                 <?php echo CHtml::button ("Get Code",array('size'=>30,
                    'ajax'=>array(
                    'type'=>'GET',//?r=admin/coupons/create
                    'url'=>'?r=admin/coupons/UpdateAjax',
                    'success'=>'function(msg){
                     document.getElementById("CouponsModel_promo_code").value = msg; 
                    
                    }'
                    ),
                  )); ?>
			
              <?php echo $form->error($model,'promo_code'); ?>
        </div>
        <div id="row">
              <?php echo $form->labelEx($model,'discount_value'); ?>
              <?php echo $form->textField($model,'discount_value',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'discount_value'); ?>
        </div>
          <div id="row">
              <?php echo $form->labelEx($model,'act_fromdate'); ?>
              <?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'act_fromdate',
                    'value'=>$model->act_fromdate,
                    'options'=>array('dateFormat'=>'yy-mm-dd',
                                    'defaultDate'=>$model->act_fromdate,
                                    'yearRange'=>'1900',
                                    ),
                    'language'=>'en-AU',
                    ));
                ?>
              <?php //echo $form->textField($model,'act_fromdate',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'act_fromdate'); ?>
        </div>
        <div id="row">
              <?php echo $form->labelEx($model,'act_todate'); ?>
                 <?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'act_todate',
                    'value'=>$model->act_todate,
                    'options'=>array('dateFormat'=>'yy-mm-dd',
                                    'defaultDate'=>$model->act_todate,
                                    'yearRange'=>'1900',
                                    ),
                    'language'=>'en-AU',
                    ));
                ?>
              <?php //echo $form->textField($model,'act_todate',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'act_todate'); ?>
        </div>
       
       
    </div> 
    
    
    <div id="row">
        <?php 
        echo CHtml::submitButton('Submit');
        ////echo CHtml::button('Submit Order', array('submit' => array('/creditspurchase/index/id/'.$value->id))); ?>
    </div>
</div>