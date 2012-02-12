<?php
    /**
     * @var BasicProfile $data
     */
?>

<div class="view<?php if($data->isPurchased()) echo ' purchased'; ?> search-thumbnail-box"
     onclick="location.href = '<?php echo (($data->isPurchased())
        ? $this->createUrl('/profile/ViewAll',
                    array('profileID' => $data->user_id
                    )
                )
        : $this->createUrl('/profile/viewProfile',
            array('profileID' => $data->user_id
            )
        )
    ); ?>';">
	<?php
        // in case we have image for concrete profile
//        if(file_exists(Yii::getPathOfAlias('webroot') . '/images/avatar/' . $data->profile_type . '.gif'))
//        {
//            echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/avatar/' . $data->profile_type . '.gif'),
//                             array(
//                                  'profile/viewProfile',
//                                  'profileID' => $data->user_id
//                             )
//            );
//        }
    ?>
    <div style="font-size: 11px"><strong>
	    <?php echo CHtml::encode($data->getFirstUniversityName()); ?></strong>
        <br><br>
        <strong><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</strong>
	    <?php echo CHtml::encode($data->nickname); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</strong>
	    <?php echo CHtml::encode($data->gender == "M" ? "Male" : "Female"); ?>
	    <br />

            
        <strong><?php echo CHtml::encode($data->getAttributeLabel('profile_type')); ?>:</strong>
	    <?php echo CHtml::encode(BasicProfile::getProfileTypeName($data->profile_type)); ?>
	    <br />
      
        <strong>Home State:</strong>
        <?php echo BasicProfile::getStateName($data);?>
	    <br /><br />
        <?php
            $this->widget('application.components.widgets.StarRatingWidget',
                          array(
                              'user_id' => $data->user_id,
                              'enableComments' => false,
                              'isDisabled' => true,
                              'smallStars' => true,
                             'enableCListViewReactivation' => true,
                          )
            );
        ?>
</div>
    </div>
