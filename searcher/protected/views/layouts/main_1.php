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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" />	
	
	<script type="text/javascript" src="js/main.js"></script>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>       
    <body>	

<div class="container">
	<div id="header" class="span-26">
		<div class="nav-bar span-26">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/logout" class="btn-login">Logout</a>
                    <div class="top-nav">
                            
                             <?php 
                 $this->widget('ext.emenu.Emenu',array(
                     	'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/indexFinder'),'visible'=>Yii::app()->user->isGuest), 
                                /*    'items'=>array(
                                        array('label'=>'Learn More', 'url'=>array('/site/learnmore')),
                                        array('label'=>'FAQ', 'url'=>array('site/page', 'view'=>'FAQ')),
                                        array('label'=>'Press/Media', 'url'=>array('site/page', 'view'=>'press_media')),
                                        array('label'=>'About Us', 'url'=>array('/site/page', 'view'=>'about')),
                                        array('label'=>'Jobs', 'url'=>array('site/page', 'view'=>'jobs')),
                                        ),
                                    ),*/
                            	array('label'=>'Sign Up', 'url'=>array('/user/create'),'visible'=>Yii::app()->user->isGuest),
 //                             array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'My Account', 'url'=>array('/user/account'), 'visible'=>!Yii::app()->user->isGuest,
                                    'items'=>array(
                                    array('label'=>'My Profile', 'url'=>array('/profile/modBasic')),
                                    array('label'=>'Settings', 'url'=>array('/profile/modBasic')),
                                        ),
                                        ),
                                
                                array('label'=>'Purchased Profiles', 'url'=>array('/profile/browseMine'), 'visible'=>!Yii::app()->user->isGuest),

			),
		)); ?> 
			</div>
		</div>
		<div class="span-26">
			<div class="span-7">
				<h1 class="logo"><?php echo CHtml::link("Home",array('site/indexFinder')); ?></h1>
			</div>
			<div class="span-19 last">
				
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
						
					
			</div>
		</div>
	</div>


    
    <div class="span-26">        
          
<?php echo $content; ?>
    
    </div>
</div>         
        


    
<div id="footer">
	<div class="container">
		<div class="info-box">
			<h4>HAVE A QUESTION? <br /><span>CONTACT US</span></h4>
			<span class="phone">+12 3456 789</span>
			<span class="email"><a href="mailto:&#105;&#110;&#102;&#111;&#064;&#099;&#114;&#111;&#119;&#100;&#112;&#114;&#101;&#112;&#046;&#099;&#111;&#109;">&#105;&#110;&#102;&#111;&#064;&#099;&#114;&#111;&#119;&#100;&#112;&#114;&#101;&#112;&#046;&#099;&#111;&#109;</a></span>
		</div>
		<div class="nav-col">
			<ul class="nav">
				<li><?php echo CHtml::link("Home",array('site/indexFinder')); ?></li>
				<li><?php echo CHtml::link("Learn More",array('site/learnmore')); ?></li>
				<li><?php echo CHtml::link("About Us",array('site/page', 'view'=>'about')); ?></li>
				<li><?php echo CHtml::link("FAQ", array('site/page', 'view'=>'FAQ')); ?></li>
			</ul>
		</div>
		<div class="nav-col">
			<ul class="nav">
				<li><?php echo CHtml::link("Login",array('site/login')); ?></li>
				<li><?php echo CHtml::link("Privacy Policy",array('site/page', 'view'=>'privacy_policy')); ?></li>
				<li><?php echo CHtml::link("Terms and Conditions",array('site/page', 'view'=>'terms_conditions')); ?></li>
                                <li><?php echo CHtml::link("Contact",array('site/contact')); ?></li>
			</ul>
		</div>
		<div class="social-col">
			<ul class="social-networks">
				<li>
					<a href="#">
						<img src="images/ico-facebook.png" alt="image description" />
						<span>Facebook</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="images/ico-twitter.png" alt="image description" />
						<span>Twitter</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="images/ico-google.png" alt="image description" />
						<span>Google +</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="text-box">
			<strong class="logo"><a href="#">CrowdPrep</a></strong>
			<p>Copyright &copy; 2011, Crowdprep.All Rights Reserved.</p>
		</div>
	</div>
</div>
</body>
</html>

