
<p>   
    
</p>
    

<table border="1" width="350" height="140" cellspacing="10">
      <col width="55px" />
      <col width="75px" />
      <col width="120px" /> 
      <col width="100px" /> 
    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black">
        <tr>
            <td>Level</td>
            <td>                
            </td>
            <td>Cost</td>
            <td></td></tr></thead>
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
            <td><div class="buttons"><?php 
                echo CHtml::Button("Buy!", array(
                    'onclick'=>'$("#loginbox").dialog("open"); return false;',)); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Basic</td>
             <td>
            <?php $question=CHtml::image(Yii::app()->request->baseURL. '/images/question_blue.ico'); 
                    echo CHtml::link($question, '#', array('onclick'=>'$("#help").dialog("open"); return false;',)); ?>
             </td>
            <td> <?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l2Status,2);?></td>
            <td><div class="buttons"><?php 
                echo CHtml::Button("Buy!",array(
                    'onclick'=>'$("#loginbox").dialog("open"); return false;',)); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Full</td>
             <td>
            <?php $question=CHtml::image(Yii::app()->request->baseURL. '/images/question_blue.ico'); 
                    echo CHtml::link($question, '#', array('onclick'=>'$("#help").dialog("open"); return false;',)); ?>
             </td>
            <td><?php echo "".$buyProfileForm->getStatusText($buyProfileForm->l3Status,3);?> </td>
            <td><div class="buttons">                   
                    <?php   echo CHtml::Button("Buy!",array(
                            'onclick'=>'$("#loginbox").dialog("open"); return false;',)); ?>			       
            </td>
        </tr>
    </tbody>
</table>
<br></br>




     <div class="span-9 last">
    <div class="view2">
    <h5>How to buy this profile </h5> <p>You need to have credits, CrowdPrep's site currency. 
        Credits are sold in bundle packs.  Purchase as many credits as you need.  <?php echo CHtml::link("Learn more", array('profile/learnmorecredits')) ?>
</p>    
</div>
</div>
     

