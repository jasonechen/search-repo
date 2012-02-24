<?php $this->pageTitle=Yii::app()->name; ?>

<div class="container">
    <div class="span-26" >

    </div> </div> 
  <div class="container">
                   <br> 
  	<div class="span-16 colborder">
            
            
  	<?php 
        
    $this->widget('application.extensions.nivoslider.ENivoSlider', array(
        'htmlOptions'=>array('style'=>'width: 570px; height: 385px;'),
            'images'=>array( //@array images with images arrays.
       
    //    array('src'=>'path/to/image'), //only display image.
//        array('src'=>'path/to/image', 'caption'=>''), //display image and nivo slider caption.
   //     array('src'=>'path/to/image', 'url'=>array('')), //display image with link.
        array('src'=>Yii::app()->request->baseUrl.'/images/body.gif', 'url'=> array('site/learnmore')),
        array('src'=>Yii::app()->request->baseUrl.'/images/body2.gif', 'url'=> array('site/learnmore')),
        array('src'=>Yii::app()->request->baseUrl.'/images/body3.gif', 'url'=> array('site/learnmore')),
        array('src'=>Yii::app()->request->baseUrl.'/images/body4.gif', 'url'=> array('site/learnmore')),
       array('src'=>Yii::app()->request->baseUrl.'/images/body5.gif', 'url'=> array('site/learnmore')),
 //       array('src'=>'path/to/image', 'url'=>array(''), 'caption'=>''), //display image with nivo slider caption and link reference.
        ),
    )
);     
    //    $image= CHtml::image(Yii::app()->request->baseURL. '/images/body2.gif'); 
   //     echo Chtml::link($image, array('site/learnmore')) ?>
            
            <br>
         
         <h3 class="caps">
              Application Profiles For Sale By Real Students
          </h3>
          <p>
              Meceve is the largest repository of college and graduate school application profiles.  Search our database to find the profiles that best match your own, or simply browse by school to see how you compare against previously admitted students.
          </p>
          
          <center>
              
      <?php $signup= CHtml::button('Sign Up Now!');
              echo CHtml::link($signup, array('user/create')) ?></center>
      </div> 
  	
  	<div class="span-9 last"> <br> <br>            


<?php 
        $this->widget('ext.pixelmatrix.EUniform'); 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	

	<div class="span-6 last">
            <b>	Username</b>
		<?php echo $form->textField($model1,'username'); ?>
            <err>   <?php echo $form->error($model1,'username'); ?></err>
	</div>
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    
	<div class="span-6 last">
	<b>	Password</b>
		<?php echo $form->passwordField($model1,'password'); ?>
        <err>	<?php echo $form->error($model1,'password'); ?></err>
	</div>

	<div class="span-6 last">
		<?php echo $form->checkBox($model1,'rememberMe'); ?>
		<?php echo $form->label($model1,'rememberMe'); ?>
		<?php echo $form->error($model1,'rememberMe'); ?>
	</div>
        <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->    
	<div class="span-5 last">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
          <div class="span-26"> <br>  </div>  <!-- row spacer*/ -->         
    <h7> <div class="span-5 last">
                <?php echo CHtml::link("Forgot your password?",array('site/page','view'=>'underConstruction')); ?>
	</div>
        
        <div class="span-5 last">
                <?php echo CHtml::link("New? Create an Account!",array('user/create')); ?><br></br>
	</div> </h7>

    <?php $this->endWidget(); ?>
    
   
    <div class="span-8">
         <hr/>
      <h8> Current College or Grad Student? </h8>
     <p>   Earn $$$ by contributing your application profile!  Fill out your profile in less than 15 minutes and start earning money!  Learn how it works or sign up now.
     </p>
     <center>
      <?php $signup= CHtml::button('Learn More');
              echo CHtml::link($signup, array('site/page','view'=>'learn_more_contributors'))?>
      </div> </center>
    </div>
    
  </div>
      
      

          
      <div class="span-8 last">
      
      
      </div>
                  <div class="span-26"> <br> <br> </div>  <!-- row spacer*/ -->


	