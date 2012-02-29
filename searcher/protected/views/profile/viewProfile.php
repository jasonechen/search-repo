
<?php


//$this->setViewProfileMenu($buyProfileForm->profile_id);
?>

    <?php if(!empty($searchUri)): ?>

        <a href="<?php echo $searchUri; ?>">Back to Search Results</a>

    <?php endif; ?>
<div class="span-19"> <br/></div>
    


<div class="span-9"> 

    <div class="view">
<table cellpadding:5px;" width="330" height="270" cellspacing="0" >

    <thead style="font-size: 18px; font-weight:bold; color: grey">
    <td colspan="2"  style="text-align:center">  Profile # <?php echo $buyProfileForm->profile_id; ?>: <?php echo $basicProfile->nickname; ?></td></thead>
    <tbody style="font-size:12px">
    <tr><td colspan="2" style="text-align:center; font-weight:bold"><?php echo $basicProfile->currUniversity->name; ?></td> </tr>
    <tr><td colspan="2" style="text-align:center;font-weight:bold"> <?php echo BasicProfile::getProfileTypeName($basicProfile->profile_type); ?></td>  </tr> 
    <tr><td colspan="2" style="text-align:center;font-weight:bold"><?php echo BasicProfile::getGender($basicProfile->gender);?> </tr>
    <tr><td colspan="2" style="text-align:center;font-weight:bold"><?php echo $basicProfile->race->name; ?></td> </tr>
    <tr><td colspan="2" style="text-align:center">SAT I Score: <span style="font-weight:bold"><?php echo BasicProfile::getSATRange($basicProfile->sat_I_score_range); ?> </span>    </td> </tr>
    <tr><td colspan="2" style="text-align:center"># of Test Scores: <span style="font-weight:bold"><?php echo $basicProfile->num_scores; ?></span>     </td>  </tr>
    <tr><td colspan="2" style="text-align:center"># of Academic Fields: <span style="font-weight:bold"><?php echo $basicProfile->num_academics; ?></span>    </td>  </tr>
    <tr><td colspan="2" style="text-align:center"># of Extracurriculars: <span style="font-weight:bold"><?php echo $basicProfile->num_extracurriculars; ?>  </span>   </td>  </tr>
    <tr><td colspan="2" style="text-align:center"># of Essays: <span style="font-weight:bold"><?php echo $basicProfile->num_essays; ?> </span>   </td>  
    </tbody>

</table>
        </div>
 
<div class="clearfix"></div>
<br></br>
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Average Rating')); ?>

    <?php echo($basicProfile->avg_profile_rating); ?>

<?php $this->endWidget(); ?>

<?php
    $this->widget('application.components.widgets.StarRatingWidget',
        array(
             'cssClassName' => 'jRatingForViewedUser',
             'showOnlyComments' => true,
             'user_id' => $buyProfileForm->profile_id,
             'enableComments' => true,
             'isDisabled' => true,
        )
    );
?>



<br></br><br></br>

   
    
    
</div>
<div class="span-9 last">



 

<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'viewProfile',
	'enableAjaxValidation'=>false,
)); ?>




<?php 
       
if(Yii::app()->user->isGuest):
    
    $this->renderPartial('_purchoptions_guest',  array('buyProfileForm'=>$buyProfileForm,
                 'creditModel' => $creditModel,));
    
    else: 
        $this->renderPartial('_purchoptions_user', array('buyProfileForm'=>$buyProfileForm,
                 'creditModel' => $creditModel,)); 
    
    endif;
        
                
                
                ?>

</div> 

 
<?php $this->endWidget(); ?>
    
    
 
