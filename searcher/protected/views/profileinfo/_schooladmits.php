<?php 	
$this->progressbar();
$this->IncludeJsDynamicrows(); 
?>
<div class="container">
<div class="sub-head-profile">Personal Info - Other Admittances</div>
<div class="form">
   
 
<?php 
    //    $this->widget('ext.pixelmatrix.EUniform'); //formatting widget for drop down box
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'otherschool-profile-otherschool-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return validationSA(this);')
)); ?>

<?php  $this->renderPartial('_shooladmittance',array('otherschooladmitProfile'=>$otherschooladmitProfile,'form'=>$form));  ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>