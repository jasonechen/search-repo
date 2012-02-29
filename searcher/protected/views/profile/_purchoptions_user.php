

    
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'viewProfile',
	'enableAjaxValidation'=>false,
)); ?>


		<?php echo $form->hiddenField($buyProfileForm,'l1PackagePrice'); ?>
		<?php echo $form->hiddenField($buyProfileForm,'l2PackagePrice'); ?>
		<?php echo $form->hiddenField($buyProfileForm,'l3PackagePrice'); ?>

<br>
<table border="1" width="350" height="140" cellspacing="10">
      <col width="55px" />
      <col width="75px" />
      <col width="120px" /> 
      <col width="100px" />  
    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black">
        <tr>
            <td>Level</td>
            <td></td>
            <td>Cost</td>
            <td>BUY</td>
        </tr></thead>
    <tbody style="font-size:12px">
        <tr>
            <td>Scores </td>
        <td>
                <?php $question=CHtml::image(Yii::app()->request->baseURL. '/images/question_blue.ico'); 
        echo CHtml::link($question, '#', array('onclick'=>'$("#help").dialog("open"); return false;',)); 
              $this->renderPartial('application.views.profile.helppopup');  
                ?>
            </td> 
            <td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l1Status,1);?></td>
            <td><?php echo $form->checkBox($buyProfileForm,'buyL1',array('disabled'=>$buyProfileForm->l1Disabled)); ?></td>
        </tr>
        <tr>
            <td>Basic</td>  
            <td>
                    <?php $question=CHtml::image(Yii::app()->request->baseURL. '/images/question_blue.ico'); 
                    echo CHtml::link($question, '#', array('onclick'=>'$("#help").dialog("open"); return false;',)) ?>                
            </td>
            <td> <?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l2Status,2);?></td>
            <td><?php echo $form->checkBox($buyProfileForm,'buyL2',array('disabled'=>$buyProfileForm->l2Disabled)); ?></td>
        </tr>
        <tr>
            <td>Full</td>  
            <td>
                    <?php $question=CHtml::image(Yii::app()->request->baseURL. '/images/question_blue.ico'); 
                    echo CHtml::link($question, '#', array('onclick'=>'$("#help").dialog("open"); return false;',)) ?>                
            </td>
            <td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l3Status,3);?> </td>
            <td><?php echo $form->checkBox($buyProfileForm,'buyL3',array('disabled'=>$buyProfileForm->l3Disabled)); ?></td>
        </tr>
    </tbody>
</table>
<div class="span-7 push-5 last">
    
            <div class="buttons">
                
		<?php
                if ($creditModel->buy_credits != 0) 
                echo CHtml::submitButton('Purchase',array('id'=>'viewProfileSubmit')); ?><br>
            </div>
    </div>
            
    <div class="span-9 last">
        <div class="view2">
        <h4>
            <?php echo "You have " ?> <b><?php echo $creditModel->buy_credits." credits " ?> </b> <?php echo "available for purchasing profile views.";  ?>
        </h4>
        <p>
            <?php
                if ($creditModel->buy_credits == 0)        
                     echo "Please ".CHtml::link("click here", array('user/Credits'))." to purchase more credits."
            ?>
        </p>
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

</div>
     <div class="span-9 last">
    <div class="view2">
    <h5>How to buy this profile </h5> <p>You need to have credits, CrowdPrep's site currency. 
        Credits are sold in bundle packs.  Purchase as many credits as you need.  <?php echo CHtml::link("Learn more", array('profile/learnmorecredits')) ?>
</p>    
</div>
</div>
     
