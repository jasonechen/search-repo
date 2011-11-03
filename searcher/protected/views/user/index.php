<?php $this->pageTitle=Yii::app()->name; ?>



<?php
    if (Yii::app()->User->GetState('FirstName')!==NULL){
           echo "<h1>Welcome to <i>";
           echo CHtml::encode(Yii::app()->name);
           echo "</i>";
           echo ", ";
           echo CHtml::encode(Yii::app()->User->GetState('FirstName'));   
           echo "!</h1>";
    }
    else
    {
           echo "<h1>Welcome to <i>";
           echo CHtml::encode(Yii::app()->name);
           echo "!</i></h1>"; 
    }
?>