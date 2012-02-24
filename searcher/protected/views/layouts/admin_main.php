<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fancy-type/screen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wizard.css" />	
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <table width="1300" height="50" cellspacing="10" >   <tr><td width="10"></td><td width="165" valign="top" align="center">
   <?php  $image= CHtml::image(Yii::app()->request->baseURL. '/images/logo_big.gif'); 
        echo Chtml::link($image, array('/site/index')) ?>
         </td><td width="475" valign="bottom">
           
        
         </td><td width="700" valign="center">
        
        
                <div style="float:right">
            
		<?php 
                 $this->widget('ext.emenu.Emenu',array(
                     	'items'=>array(
                                        array('label'=>'Home', 'url'=>array('/admin/index')),    
						array('label'=>'Credits', 'url'=>array('/admin/credits'), 
                                    'items'=>array(
                                        array('label'=>'View Credits', 'url'=>array('/admin/credits/')),
                                        array('label'=>'Create Credits', 'url'=>array('/admin/credits/create/')),
                                        
                                        ),
                                    ),
				array('label'=>'Coupons', 'url'=>array('/admin/coupons'), 
                                    'items'=>array(
                                        array('label'=>'View Promo Code', 'url'=>array('/admin/coupons/')),
                                        array('label'=>'Create Coupons', 'url'=>array('/admin/coupons/create/')),
                                        
                                        ),
                                    ),
                                array('label'=>'Purchases Tracking', 'url'=>array('/admin/purchasestracking/')),    
				array('label'=>'Refund', 'url'=>array('/admin/refund/')), 
				array('label'=>'Reports', 'url'=>array('/admin/reports/'), 
                                    'items'=>array(
                                        array('label'=>'Sales Report', 'url'=>array('/admin/reports/')),
                                        array('label'=>'Refund Report', 'url'=>array('/admin/reports/refund/')),
					array('label'=>'Customer Report', 'url'=>array('/admin/reports/customer/')),
                                        
                                        ),
                                    ),	
				array('label'=>'Logout ('.Yii::app()->user->getState('FirstName').')', 'url'=>array('/admin/index/logout/'))
			),
		)); ?> 
	
            </div>
         </td></tr></table>


</head>

<body>

     <div class="container">       
       <?php echo $content; ?>
    </div>      
         
        

</body>

</html>
