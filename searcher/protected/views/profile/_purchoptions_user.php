
<p>   
    
</p>
    
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'viewProfile',
	'enableAjaxValidation'=>false,
)); ?>


		<?php echo $form->hiddenField($buyProfileForm,'l1PackagePrice'); ?>
		<?php echo $form->hiddenField($buyProfileForm,'l2PackagePrice'); ?>
		<?php echo $form->hiddenField($buyProfileForm,'l3PackagePrice'); ?>


<table border="1" width="575" height="140" cellspacing="10">

    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black"><tr><td>Level</td>  <td>Personal</td>  <td>Scores</td> <td>Extracurriculars</td><td> Essays</td> <td>Credits</td><td>BUY</td></tr></thead>
    <tbody style="font-size:12px">
        <tr>
            <td>Scores </td>
            <td style="text-align:center"> X</td>
            <td style="text-align:center">X</td>  
            <td></td> <td></td>
            <td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l1Status,1);?></td>
            <td><?php echo $form->checkBox($buyProfileForm,'buyL1',array('disabled'=>$buyProfileForm->l1Disabled)); ?></td>
        </tr>
        <tr>
            <td>Basic</td>  
            <td style="text-align:center">X</td>  
            <td style="text-align:center">X</td> 
            <td style="text-align:center">X</td>
            <td></td>
            <td> <?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l2Status,2);?></td>
            <td><?php echo $form->checkBox($buyProfileForm,'buyL2',array('disabled'=>$buyProfileForm->l2Disabled)); ?></td>
        </tr>
        <tr>
            <td>Full</td>  
            <td style="text-align:center">X</td>  
            <td style="text-align:center">X</td> 
            <td style="text-align:center">X</td>
            <td style="text-align:center">X</td>
            <td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l3Status,3);?> </td>
            <td><?php echo $form->checkBox($buyProfileForm,'buyL3',array('disabled'=>$buyProfileForm->l3Disabled)); ?></td>
        </tr>
    </tbody>
</table>

<div class="span-11"><br>   </div>                 
	<div class="span-6 last">
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
