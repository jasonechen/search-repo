<script language="javascript">
	function submitform() {
				
	
		
		 $('#paypalemail').submit();
	}
</script>

<div class="demo_box">
	<?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'paypalchange',
			// additional javascript options for the dialog plugin
			'options'=>array(
				'title'=>'Change Paypal Email Address',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>'375px',
				'height'=>'200',
                                'resizable'=>false,
				
			),
		));
	?>	

<div class="form">
    
<?php 
      //  $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paypalemail',
	'action'=>'index.php?r=user/PaypalChange',
	'enableClientValidation'=>true,
	//'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
        'validateOnChange'=>false,
            ),
)); ?>



 <div class="registerform">
    <table width=350" height="50" >
      <col width="200px" />
      <col width="200px" />    
       
    <tbody style="font-size:12px">
            
            <td>
		<?php echo $form->textField($model,'email_paypal',array('size'=>70,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email_paypal'); ?>
          
          </tr> 
    </tbody>
    </table>             
               	<div class="row buttons">
                    <?php echo CHtml::submitButton('Update'); ?>
        	</div>

<br>  

 </div>
</div>    

    <?php $this->endWidget();

	$this->endWidget('zii.widgets.jui.CJuiDialog');

        ?>
</div>