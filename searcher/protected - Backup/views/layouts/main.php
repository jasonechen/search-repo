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
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <table width="1300" height="50" cellspacing="10" >   <tr><td width="10"></td><td width="165" valign="top" align="center">
   <?php  $image= CHtml::image(Yii::app()->request->baseURL. '/images/logo_big.gif'); 
        echo Chtml::link($image, array('/site/index')) ?>
         </td><td width="475" valign="bottom">
             <?php $this->beginWidget('zii.widgets.CPortlet'); ?>
        <?php
            $search_q = '';
            if(isset($_SESSION['search_q']))
            {
                $search_q = strip_tags($_SESSION['search_q']);
            }
            $this->renderPartial('//widgets/search-form', array(
                                                               'search_q' => $search_q
                                                          )
            );
        ?>
    <?php $this->endWidget(); ?>
        
         </td><td width="700" valign="center">
        
        
                <div style="float:right">
            
		<?php 
                 $this->widget('ext.emenu.Emenu',array(
                     	'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/indexFinder'), 
                                    'items'=>array(
                                        array('label'=>'Learn More', 'url'=>array('/site/learnmore')),
                                        array('label'=>'FAQ', 'url'=>array('site/page', 'view'=>'FAQ')),
                                        array('label'=>'Press/Media', 'url'=>array('site/page', 'view'=>'press_media')),
                                        array('label'=>'About Us', 'url'=>array('/site/page', 'view'=>'about')),
                                        array('label'=>'Jobs', 'url'=>array('site/page', 'view'=>'jobs')),
                                        ),
                                    ),
                            	array('label'=>'Sign Up', 'url'=>array('/user/create'),'visible'=>Yii::app()->user->isGuest),
 //                             array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'My Account', 'url'=>array('/user/account'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Manage My Profile', 'url'=>array('/profile/modBasic'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Browse Profiles', 'url'=>array('/search/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'My Profiles', 'url'=>array('/profile/browseMine'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->getState('FirstName').')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?> 
	
            </div>
         </td></tr></table>


</head>

<body>

     <div class="container">       
        
          

	<?php echo $content; ?>
</div>      
         



<div id="footerbody">
    <hr> 
    <div class="container">
                   
                       
            <div class="span-4">
                <fthd> Meceve.com </fthd>  <br>
              <?php echo CHtml::link("Home",array('site/indexFinder')); ?> <br>
             <?php echo CHtml::link("About Us",array('site/page', 'view'=>'about')); ?><br>
             <?php echo CHtml::link("Learn More",array('site/learnmore')); ?><br>
             <?php echo CHtml::link("FAQ",array('site/page', 'view'=>'FAQ')); ?><br>
              <?php echo CHtml::link("Press/Media",array('site/page', 'view'=>'press_media')); ?><br>
              <?php echo CHtml::link("Jobs",array('site/page', 'view'=>'jobs')); ?> <br>
                           
            </div>
          <div class="span-4">
              <fthd>Help/Support </fthd> <br>
              <?php echo CHtml::link("Contact Us",array('site/contact')); ?><br>
              <?php echo CHtml::mailto("support@meceve.com",'support@meceve.com'); ?>
                         
            </div>
            
           <div class="span-4">
              
               <fthd>Legal</fthd>  <br>
              <?php echo CHtml::link("Terms and Conditions",array('site/page', 'view'=>'terms_conditions')); ?><br>
              <?php echo CHtml::link("Privacy Policy",array('site/page', 'view'=>'privacy_policy')); ?><br>
              <?php echo CHtml::link("TrustE Certified",array('site/index')); ?>
              </div>
            
            <div class="span-4 last">
              <fthd> Community  </fthd> <br>  
              <?php echo CHtml::link("Blog",array('site/index')); ?><br>
             <?php echo CHtml::link("Forums",array('site/index')); ?>
        
              
            </div>
            

         <div class="span-26"><br><br/></div>
         
         <div class="span-4"><br><br/></div>
            <div class="span-10 pull-4">
                                 
                <ftnt>     Copyright &copy; <?php echo date('Y'); ?> by Meceve Inc. All Rights Reserved.</ftnt><br/>
		           
            </div>
           
             <div class="span-9 last push-2" style="align:right"> 
                
               <?php $this->widget('application.extensions.social.social', array(
    'style'=>'horizontal', 
        'networks' => array(
        'twitter'=>array(
            'data-via'=>'', //http://twitter.com/#!/YourPageAccount if exists else leave empty
            ), 
        'googleplusone'=>array(
            "size"=>"medium",
            "annotation"=>"bubble",
        ), 
        'facebook'=>array(
            'href'=>'https://www.facebook.com/your_facebook_page',//asociate your page http://www.facebook.com/page 
            'action'=>'recommend',//recommend, like
            'colorscheme'=>'light',
            'width'=>'120px',
            )
        )
));?> 
                </div><!-- page -->
         <div class="span-26"><br><br/></div>
        </div>    
</div>
</body>
</html>
