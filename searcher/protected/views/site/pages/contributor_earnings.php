<?php
$this->pageTitle=Yii::app()->name . ' - Pricing';
/*$this->breadcrumbs=array(
	'About',
);*/
?>
<h2>Contributor Earnings</h2><hr>
<div class="container">
    <div class="span-17">
     <h4>
        After submitting your profile, you can begin earning money each time a customer purchases a "view" of your profile.
        You will be paid a fixed % based on the type of profile purchased as well as your Contributor Status. <br>
    </h4>
    </div>
    
<?php echo CHtml::image(Yii::app()->request->baseURL. '/images/contributor_payout_chart.gif') ?>
</div>
 <div class="span-24"> <br><br>  </div>  <!-- row spacer*/ -->  
<div class="span-16">
    <p> <ftnt>
    (1) Customer Prices may not reflect actual prices paid due to price changes or volume discounts.<br>
    (2) Exclusive Status assumes agreement with Meceve's <?php echo CHtml::link("Exclusivity Agreement",array('site/page', 'view'=>'exclusivity_agreement'))?><br>
    (3) Referrals % payout assumes maximum qualified referrals of 20 (+0.5% payout per referral).<br>

    </ftnt>
</p>
</div>

<div class="span-24"> <br> </div>  <!-- row spacer*/ -->  
<div class="span-16">
 <?php 
    $this->widget('ext.pixelmatrix.EUniform'); /*formats the checkbox using Uniform extension*/
    $signup= CHtml::button('Sign Up Now!');
    echo CHtml::link($signup, array('user/create')) ?>
</div>

 <div class="span-24"> <br><br>  </div>  <!-- row spacer*/ -->  
