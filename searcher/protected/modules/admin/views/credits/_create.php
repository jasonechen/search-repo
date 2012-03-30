<div class="view">
    
    
    <div id='credits'>
         <div id="row">
           <p> <h3>Credits </h3>
               <hr style="height:4px;"/>
           </p>
         </div>   
        <div id="row">
              <?php echo $form->labelEx($model,'pack_name'); ?>
              <?php echo $form->textField($model,'pack_name',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'pack_name'); ?>
        </div>
        <div id="row">
              <?php echo $form->labelEx($model,'pack_value'); ?>
              <?php echo $form->textField($model,'pack_value',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'pack_value'); ?>
        </div>
        <div id="row">
              <?php echo $form->labelEx($model,'pack_price'); ?>
              <?php echo $form->textField($model,'pack_price',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'pack_price'); ?>
        </div>
        <div id="row">
              <?php echo $form->labelEx($model,'pricetype'); ?>
              <?php echo $form->textField($model,'pricetype',array('size'=>30,'maxlength'=>50)); ?>
            <?php echo $form->textField($model,'pricecode',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'pricetype'); ?>
        </div>
         <div id="row">
              <?php echo $form->labelEx($model,'noofdaysactive'); ?>
              <?php echo $form->textField($model,'noofdaysactive',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'noofdaysactive'); ?>
        </div>
       
    </div> 
    
    
    <div id="row">
        <?php 
        echo CHtml::submitButton('Submit');
        ////echo CHtml::button('Submit Order', array('submit' => array('/creditspurchase/index/id/'.$value->id))); ?>
    </div>
</div>