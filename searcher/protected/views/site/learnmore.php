<?php
$this->pageTitle=Yii::app()->name . ' - Learn More';
/*$this->breadcrumbs=array(
	'Learn More',/
);*/

  $this->widget('ext.pixelmatrix.EUniform'); 
?>
<div class="container"">
<div class="span-24">
<h2>Learn More</h2>



     
     



    
    </div>
               <div class="span-24"> <br> <br> </div>  <!-- row spacer*/ -->    
     
               <div class="span-15">
                   
      <center><?php $signup= CHtml::button('Sign Up Now!');
              echo CHtml::link($signup, array('user/create')) ?> </center>
          </div>  
                 <div class="span-24"> <br> <br> </div>  <!-- row spacer*/ -->    
</div>