



<p>   
    
</p>
    
<?php 
     //   $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'viewProfile',
	'enableAjaxValidation'=>false,
)); ?>




<table border="1" width="575" height="140" cellspacing="10">

    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black">
        <tr>
            <td>Level</td>  
            <td>Personal</td>  
            <td>Scores</td> 
            <td>Extracurriculars</td>
            <td> Essays</td> 
            <td>Cost</td>
            <td></td></tr></thead>
    <tbody style="font-size:12px">
        <tr>
            <td>Scores </td>
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td>  
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td>  
            <td></td>
            <td></td>
            <td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l1Status,1);?></td>
            <td><div class="buttons"><?php 
                echo CHtml::Button("Buy!",array(
                    'onclick'=>'$("#loginpop").dialog("open"); return false;',)); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Basic</td>  
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td>  
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td> 
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td>
            <td></td>
            <td> <?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l2Status,2);?></td>
            <td><div class="buttons"><?php 
                echo CHtml::Button("Buy!",array(
                    'onclick'=>'$("#loginpop").dialog("open"); return false;',)); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Full</td>  
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td>  
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td> 
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td>
            <td style="text-align:center"><?php echo CHtml::image(Yii::app()->request->baseURL. '/images/black_check.png') ?></td>
            <td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l3Status,3);?> </td>
            <td><div class="buttons"><?php            
                echo CHtml::Button("Buy!",array(
                    'onclick'=>'$("#loginpop").dialog("open"); return false;',));
                $this->renderPartial('application.views.site.loginpopup2'); ?>  </div>
            </td>
        </tr>
    </tbody>
</table>
<br></br>

<?php $this->endWidget(); ?>
