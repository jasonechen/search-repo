<?php
$this->pageTitle=Yii::app()->name . ' - Generate';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
 <script language="javascript">
     $(document).ready(function(){
    function redirect() {
          $(window.location).attr('href', 'http://localhost/testit/index.php?r=user/fillInMapInfo');

    }
    function redirectUni() {
          $(window.location).attr('href', 'http://localhost/testit/index.php?r=user/readUniversity');

    }
    function redirectHS() {
          $(window.location).attr('href', 'http://localhost/testit/index.php?r=user/readHS');

    }
    function fillTotal() {
          $(window.location).attr('href', 'http://localhost/testit/index.php?r=user/fillTotal');

    }
    
    function deleteRandom() {
          $(window.location).attr('href', 'http://localhost/testit/index.php?r=user/deleteRandom');

    }
    function generateRandom() {
          $(window.location).attr('href', 'http://localhost/testit/index.php?r=user/generateRandom');

    }
//
    $('#tempFillButton').click(redirect);
    $('#readUniButton').click(redirectUni);
    $('#readHSButton').click(redirectHS);
        $('#fillTotalButton').click(fillTotal);
        $('#deleteRandomButton').click(deleteRandom);
        $('#generateRandomButton').click(generateRandom);
////    $('#PersonalProfile_alumni_connections_1').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_2').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_3').click(checkCorrect);
////    $('#PersonalProfile_alumni_connections_4').click(checkCorrect);
     });
</script> 



<h1>Fill in extra user info</h1>
	<?php echo CHtml::button("Fill in",array('id'=>'tempFillButton')); ?>

<br></br>
<br></br>

<h1>Read universities into db</h1>
	<?php echo CHtml::button("Read",array('id'=>'readUniButton')); ?>

<br></br>
<br></br>

<h1>Read high schools into db</h1>
	<?php echo CHtml::button("Read",array('id'=>'readHSButton')); ?>

<br></br>
<br></br>

<h1>Fill totals</h1>
	<?php echo CHtml::button("Fill",array('id'=>'fillTotalButton')); ?>

<br></br>
<br></br>

<h1>Generate 10 random profiles</h1>
	<?php echo CHtml::button("Generate 10 random profiles",array('id'=>'generateRandomButton')); ?>

<br></br>
<br></br>

<h1>Delete random profiles</h1>
	<?php echo CHtml::button("Delete all random profiles",array('id'=>'deleteRandomButton')); ?>

<br></br>
<br></br>

        <?php if(Yii::app()->user->hasFlash('generateSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('generateSuccess'); ?> 
        </div> <?php endif; ?>   

</div><!-- form -->
