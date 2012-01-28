<?php


//$this->setViewProfileMenu($buyProfileForm->profile_id);
?>

    <?php if(!empty($searchUri)): ?>

        <a href="<?php echo $searchUri; ?>">Back to Search Results</a>

    <?php endif; ?>
<div class="span-26"> <br/></div>
    


<div class="span-9"> 


<table style="border: 1px grey solid; cellpadding:10px; " width="360" height="320" cellspacing="20" >

    <thead style="background-color: #327e04;font-size: 18px; font-weight:bold; color: white">
    <td colspan="2"  style="text-align:center">   <?php echo CHtml::image(Yii::app()->request->baseURL. '/images/avatar/nerd.gif') ?>Profile # <?php echo $buyProfileForm->profile_id; ?>: <?php echo $basicProfile->nickname; ?></td></thead>
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
<div class="span-17 last">



 

<p>
    
    
</p>
    
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'viewProfile',
	'enableAjaxValidation'=>false,
)); ?>





<table border="1" width="670" height="140" cellspacing="10">

    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black"><tr><td>Level</td>  <td>Personal</td>  <td>Scores</td> <td>Extracurriculars</td><td> Essays</td> <td>Credits</td><td>BUY</td></tr></thead>
    <tbody style="font-size:12px"><tr><td>Scores </td><td style="text-align:center"> X</td>  <td style="text-align:center">X</td>  <td></td> <td></td><td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l1Status,1);?></td><td><?php echo $form->checkBox($buyProfileForm,'buyL1',array('disabled'=>$buyProfileForm->l1Disabled)); ?></td></tr>
    <tr><td>Basic</td>  <td style="text-align:center">X</td>  <td style="text-align:center">X</td> <td style="text-align:center">X</td><td></td><td> <?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l2Status,2);?></td><td><?php echo $form->checkBox($buyProfileForm,'buyL2',array('disabled'=>$buyProfileForm->l2Disabled)); ?></td></tr>
    <tr><td>Full</td>  <td style="text-align:center">X</td>  <td style="text-align:center">X</td> <td style="text-align:center">X</td><td style="text-align:center">X</td><td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l3Status,3);?> </td><td><?php echo $form->checkBox($buyProfileForm,'buyL3',array('disabled'=>$buyProfileForm->l3Disabled)); ?></td></tr></tbody>

</table>

<hr>
<div class="span-11"><br>   </div>                 
	<div class="span-6 last">
          <div id="viewProfPurchTot">
            <p>  Total: 0 credits.</p>

	</div> 

		<?php echo CHtml::submitButton('Purchase',array('id'=>'viewProfileSubmit')); ?><br></br>

                 <div class="span-8 last">
  
		<?php echo "You have ".$creditModel->buy_credits." credits available."; ?>

                </div>
         <?php
 $baseUrl = Yii::app()->baseUrl;
 echo Yii::log("baseURL: ".CVarDumper::dumpAsString($baseUrl),'error');  
// Yii::app()->clientScript->registerScript('test',"alert('Test');",CClientScript::POS_READY);
 Yii::app()->clientScript->registerScript('myScript',file_get_contents('http://localhost/testit/js/processTotal.js'),CClientScript::POS_READY);
 
// $this->widget('zii.widgets.CListView', array(
//    'dataProvider'=>$dataProvider,
//    'itemView'=>'_post',   // refers to the partial view named '_post'
 ?>
   
                
		<?php echo $form->hiddenField($buyProfileForm,'l1Price'); ?>
		<?php echo $form->hiddenField($buyProfileForm,'l2Price'); ?>
		<?php echo $form->hiddenField($buyProfileForm,'l3Price'); ?>




        <?php if(Yii::app()->user->hasFlash('buyProfileSuccess')):?> 
        <div class="successMessage"> 
        <?php echo Yii::app()->user->getFlash('buyProfileSuccess'); ?> 
        </div> 
        <?php endif; ?>    
 
        <?php if(Yii::app()->user->hasFlash('buyProfileError')):?> 
        <div class="errorMessage"> 
        <?php echo Yii::app()->user->getFlash('buyProfileError'); ?> 
        </div> 
        <?php endif; ?>  
<?php $this->endWidget(); ?>
    <div><br></br></div>
 </div>
</div>
<div class="clearfix"></div>
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