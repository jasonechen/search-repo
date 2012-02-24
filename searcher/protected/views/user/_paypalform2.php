

<table width=350px" height="23px" >
      <col width="300px" />
      <col width="50px" />  
      <tr>
          <td>
        <?php echo "Paypal email address:   " ?> <b><?php echo $model->email_paypal; ?></b>
          </td>
        
          <td>    
            <?php echo CHtml::link('Edit', '#',array('
                                    onclick'=>'$("#paypalchange").dialog("open"); return false;',
                                    
                        )); 
				   ?>
	   <?php $this->renderPartial('application.views.user.paypalpopup', array('model'=>$model)); ?>                              
        </td>
      </tr>
</table>

 
        