<?php
$this->pageTitle=Yii::app()->name . ' - Contributors: Learn More';

?>
<div class="container">
<div class="span-26">
<h2>Learn More: Student Contributors</h2>

</div>
<div class="span-15 last">
    <h3>Submit your application profile details and earn money.</h3>
<hr>
</div>



<div class="span-15 last">
    <h3>1. Sign Up</h3>
    <p>Sign up as a Meceve contributor for free. </p>
    
</div>


<div class="span-15 last">
    <h3>2. Fill out your profile</h3>
    <p>Profiles consist of many of the key details
        contained in your college/graduate school application, such as test scores,
        extracurricular activities (sports, clubs, etc.), and other achievements.   </p>
    
</div>


<div class="span-15">
    <h3>3. Earn Money</h3>
    <p>Once your profile has been submitted and approved, just sit back and wait. 
        College and grad school applicants who are interested in viewing your detailed 
        profile will purchase it, and we pay you 30-50% of the US Dollar price. 
        The more details you provide, the more likely your profile will be purchased.<br>
        <?php echo CHtml::link('Click here for more details of the earnings breakdown.', array('site/page','view'=>'contributor_earnings')) ?> </p>
    
</div>
<div class="span-9 last"> </div>

     <div class="span-15">
<?php 
    $this->widget('ext.pixelmatrix.EUniform'); /*formats the checkbox using Uniform extension*/
    $signup= CHtml::button('Sign Up Now!');
    echo CHtml::link($signup, array('user/createStudent')) ?>
      
     </div> 
             <div class="span-24"> <br>  </div>  <!-- row spacer*/ -->   
</div>

 