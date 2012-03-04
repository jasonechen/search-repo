<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'View',
);

$this->setViewProfileMenu($buyProfileForm->profile_id);

?>

<h3>Profile # <?php echo $buyProfileForm->profile_id; ?></h3>
Overall Rating: <br/><br/>
<?php
    $this->widget('application.components.widgets.StarRatingWidget',
        array(
             'cssClassName' => 'jRatingForViewedUser',
             'user_id' => $buyProfileForm->profile_id,
             'enableComments' => false,
             'isDisabled' => true,
        )
    );
?>

<br/>

<?php if(!$disableRating): ?>

    <?php
        echo CHtml::link('Rate this profile', '#', array('onclick' => '$("#rate-user-dialog").dialog("open"); return false;'));
    ?>

    <?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog',
            array(
                 'id' => 'rate-user-dialog',
                 'options' => array(
                     'title' => 'Rate this User',
                     'autoOpen' => false,
                     'modal' => true,
                     'width' => 550,
                     'height' => 470,
                 ),
            )
        );
    ?>
    <br/>
    <?php
        $this->widget('application.components.widgets.StarRatingWidget',
            array(
                 'user_id' => $buyProfileForm->profile_id,
                 'enableComments' => true,
                 'enableCommentsId' => '#rating-comment',
                 'enableCommentsSubmitId' => '#rating-submit',
                 'noStartingRate' => true,
                 'alwaysShowRateWidget' => true,
            )
        );
    ?>

    <?php $this->endWidget();?>

<?php endif; ?>


