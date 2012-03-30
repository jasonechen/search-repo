<div class="view">
    
    
    <div id='credits'>
          
        <div id="row">
              <?php echo CHtml::label('Email Id', 'svalues'); ?>
              <?php echo $form->textField($model,'svalues',array('size'=>30,'maxlength'=>50)); ?>
              <?php echo $form->error($model,'svalues'); ?>
        </div>
        
       
    </div> 
    
    
    <div id="row">
        <?php 
        echo CHtml::submitButton('Submit');
        ////echo CHtml::button('Submit Order', array('submit' => array('/creditspurchase/index/id/'.$value->id))); ?>
    </div>
</div>