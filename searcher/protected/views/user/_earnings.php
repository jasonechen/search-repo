<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Seller Earnings',
        );

$this->setAdminMenu();
?>

<div class="form">
    

<h2>Earnings</h2>
<br>


<h3>Earnings / Payments</h3>
        <div class="row">
  
		<?php echo "You have earned $".$creditModel->sell_credits." to-date."; ?><br></br>
                <?php echo "You have been paid $".$creditModel->sell_credits." to-date."; ?><br></br>
                <?php echo "Your unpaid balance is $".$creditModel->sell_credits." and will be disbursed when your account reaches $50."; ?>
        </div>

<br></br>

<h3>Payment Account Info</h3>

    <?php  if ($model->email_paypal == NULL)
 
                $this->renderPartial('_paypalform', array('creditModel'=>$creditModel,'model'=>$model)) ;
         
            else $this->renderPartial('_paypalform2', array('model'=>$model)) ;
 
    ?>
     



</div><!-- form -->
<br><br/>


<br></br><br></br><br></br>
