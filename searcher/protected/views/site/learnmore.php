<?php
$this->pageTitle=Yii::app()->name . ' - Learn More';
/*$this->breadcrumbs=array(
	'Learn More',/
);*/

 // $this->widget('ext.pixelmatrix.EUniform'); 
?>
<div class="container"">
<div class="span-24">
<h2>Learn More</h2>


</div>
     
     


     
     <div class="span-16 colborder">
         
        
         <p> <b> Why CrowdPrep? </b> <br>




    <?php echo CHtml::image(Yii::app()->request->baseURL. '/images/meceve_vs_competition.gif') ?> <br>
    </div>
     
        <div class="span-7 last">
            <h8> Current College or Grad Student? </h8><br></br>
     <p>   Fill out your profile in less than 15 minutes and start earning money!  Learn how it works or sign up now.
     </p>
     <center>
      <?php $signup= CHtml::button('Learn More');
              echo CHtml::link($signup, array('site/page','view'=>'learn_more_contributors'))?>
      </div> </center>
    
    </div>
               <div class="span-24"> <br> <br> </div>  <!-- row spacer*/ -->    
     
               <div class="span-15">
                   
      <center><?php $signup= CHtml::button('Sign Up Now!');
              echo CHtml::link($signup, array('user/create')) ?> </center>
          </div>  
                 <div class="span-24"> <br> <br> </div>  <!-- row spacer*/ -->    
</div>