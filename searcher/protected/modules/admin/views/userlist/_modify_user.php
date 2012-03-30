<div class="view">
    
    
    <div id='edit-user'>
         <div id="row">
           <p> 
           <h3><?php echo CHtml::link('User List', '?r=admin/userlist/');?> / User
               <br/><br/>Update User </h3>
               <hr style="height:4px;"/>
           </p>
         </div>   
       
       
       
    </div> 
    
    
    <div id="row">
	<table width="600" >
      <col width="200px" />
      <col width="200px" />    
      <col width="200px" />
    <tbody >

            <tr><td>     
		<?php echo $form->label($model,'username',array('label'=>'User Name',)); ?> 
            </td>
            <td>
		<?php echo $form->textField($model,'username',array('readonly'=>'true','size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
            </td>
        </tr>
        
        <tr><td>     
		<?php echo $form->label($model,'FirstName',array('label'=>'First Name')); ?> 
            </td>
            <td>
		<?php echo $form->textField($model,'FirstName',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
            </td>
        </tr>
      <tr>
          <td>     
		<?php echo $form->label($model,'LastName',array('label'=>'Last Name')); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'LastName',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LastName'); ?>
            </td>
        </tr>   
       <tr>
           <td>     
		<?php echo $form->label($model,'email'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'email',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
            </td>
        </tr> 
	  
        <tr>
           <td>     
		<?php echo $form->label($model,'email_paypal'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'email_paypal',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email_paypal'); ?>
            </td>
        </tr>
           <tr>
           <td>     
		<?php echo $form->label($model,'mail_street1'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'mail_street1',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'mail_street1'); ?>
            </td>
        </tr>
         <tr>
           <td>     
		<?php echo $form->label($model,'mail_street2'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'mail_street2',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'mail_street2'); ?>
            </td>
        </tr>
        <tr>
           <td>     
		<?php echo $form->label($model,'mail_city'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'mail_city',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'mail_city'); ?>
            </td>
        </tr>
        <tr>
           <td>     
		<?php echo $form->label($model,'mail_state'); ?>
            </td>
            <td>
		 <?php 
                  $state= CommonMethods::getStates(true);
                 echo $form->dropDownList($model,'mail_state',$state); ?>     
		<?php echo $form->error($model,'mail_state'); ?>
            </td>
        </tr>
        <tr>
           <td>     
		<?php echo $form->label($model,'mail_zip'); ?>
            </td>
            <td>
		<?php echo $form->textField($model,'mail_zip',array('size'=>35,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'mail_zip'); ?>
            </td>
        </tr>
        <tr>
           <td>     
		<?php 
               
                echo $form->label($model,'mail_country'); ?>
            </td>
            <td>
		<?php 
                  $country= CommonMethods::getCountry(true);
                 echo $form->dropDownList($model,'mail_country',$country); ?>  
		<?php echo $form->error($model,'mail_country'); ?>
            </td>
        </tr>
        </table>
        <?php 
        echo CHtml::submitButton('Submit');
        ////echo CHtml::button('Submit Order', array('submit' => array('/creditspurchase/index/id/'.$value->id))); ?>
    </div>
</div>