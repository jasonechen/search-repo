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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css" />

	
	
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>       
    <body>	

<div class="container">
	<div id="header" class="span-26">
		<div class="nav-bar span-26">       
                   <?php echo CHtml::link('Login', '#',array('
                                    onclick'=>'$("#loginbox").dialog("open"); return false;',
                                    'class'=>'btn-login',
                        )); 
				   ?>
				   <?php $this->renderPartial('application.views.site.loginpopup'); ?>              
                    
                    <div class="top-nav">
<ul class='dd_menu'>
<li><?php echo CHtml::link("Home",array('site/indexFinder')); ?>

</li>
<li><?php echo CHtml::link("Sign Up",array('/site/signup')); ?>
	
	
</li>
</ul>
                        
                            
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
                        $search_q = CommonMethods::weakFiltering($_SESSION['search_q']);
                    }

                    $this->renderPartial('//widgets/search-form',
                        array(
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
			<span class="email"><a href="mailto:&#105;&#110;&#102;&#111;&#064;&#099;&#114;&#111;&#119;&#100;&#112;&#114;&#101;&#112;&#046;&#099;&#111;&#109;">&#105;&#110;&#102;&#111;&#064;&#099;&#114;&#111;&#119;&#100;&#112;&#114;&#101;&#112;&#046;&#099;&#111;&#109;</a></span>
			<span class="phone">650.307.5587</span>                        
		</div>
		<div class="nav-col">
			<ul class="nav">
				<li><?php echo CHtml::link("Home",array('site/indexFinder')); ?></li>
				<li><?php echo CHtml::link("Learn More",array('site/page', 'view'=>'learn_more_applicants')); ?></li>
				<li><?php echo CHtml::link("About Us",array('site/page', 'view'=>'about')); ?></li>
				<li><?php echo CHtml::link("FAQ", array('site/page', 'view'=>'FAQ')); ?></li>
			</ul>
		</div>
		<div class="nav-col">
			<ul class="nav">
				<li><?php echo CHtml::link("Blog",'http://blog.crowdprep.com'); ?></li>
				<li><?php echo CHtml::link("Privacy Policy",array('site/page', 'view'=>'privacy_policy')); ?></li>
				<li><?php echo CHtml::link("Terms of Service",array('site/page', 'view'=>'terms_conditions')); ?></li>
                                <li><?php echo CHtml::link("Contact",array('site/contact')); ?></li>
			</ul>
		</div>
		<div class="social-col">
			<ul class="social-networks">
				<li>
					<a href="http://www.facebook.com/crowdprep">
						<img src="<?php echo bu('/images/ico-facebook.png') ?>" alt="image description" />
						<span>Facebook</span>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/#!/CrowdPrep">
						<img src="<?php echo bu('/images/ico-twitter.png') ?>" alt="image description" />
						<span>Twitter</span>
					</a>
				</li>
				<li>
					<a href="https://plus.google.com/116598968264679080646">
						<img src="<?php echo bu('/images/ico-google.png') ?>" alt="image description" />
						<span>Google +</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="text-box">
			<strong class="logo"><?php echo CHtml::link("CrowdPrep",array('site/indexFinder')); ?></strong>
			<p>Copyright &copy; 2011, Crowdprep.All Rights Reserved.</p>
		</div>
	</div>
</div>
    <script type="text/javascript">
        jQuery(function() {
           jQuery.support.placeholder = false;
           test = document.createElement('input');
           if('placeholder' in test) jQuery.support.placeholder = true;
        });

        $(function() {
           if(!$.support.placeholder) {
               var $el = $('#search_first_university_name');

               if($el.val() == '')
               {
                   $el.val('Enter University Name');
               }

               $el.focus(function() {
                   if($el.val() == 'Enter University Name')
                   {
                       $el.val('');
                   }
               });

               $el.blur(function() {
                   if($el.val() == '')
                   {
                       $el.val('Enter University Name');
                   }
               });

               $el.parent().parent('form').submit(function() {
                   if($el.val() == 'Enter University Name')
                   {
                       $el.val('');
                   }
               });
           }
        });
    </script>
</body>
</html>

