<div class="view" style="float:left;width:150px;height:190px;cursor:pointer;" onclick="location.href 
                                = '<?php echo $this->createUrl('/profile/viewProfile', 
                                      array('profileID' => $data->user_id
                              )); ?>';">
	<?php
        // in case we have image for concrete profile
    if(file_exists(Yii::getPathOfAlias('webroot') . '/images/avatar/' . $data->profile_type . '.gif'))
    {
        ?>
    
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/avatar/' . $data->profile_type . '.gif'),
                         array(
                              'profile/viewProfile',
                              'profileID' => $data->user_id
                         ));
        ?>
    	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</strong>
	    <?php echo CHtml::encode($data->nickname); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</strong>
	    <?php echo CHtml::encode($data->gender == "M" ? "Male" : "Female"); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('profile_type')); ?>:</strong>
	    <?php echo CHtml::encode(BasicProfile::getProfileTypeName($data->profile_type)); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('first_university_id')); ?>:</strong>
	    <?php echo CHtml::encode($data->firstUniversity->name); ?>
	    <br />
            

                <?php
    }
    else{
        // in case we don't have image for concrete profile
    ?>
        <strong><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</strong>
	    <?php echo CHtml::encode($data->nickname); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</strong>
	    <?php echo CHtml::encode($data->gender == "M" ? "Male" : "Female"); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('profile_type')); ?>:</strong>
	    <?php echo CHtml::encode(BasicProfile::getProfileTypeName($data->profile_type)); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('first_university_id')); ?>:</strong>
	    <?php echo CHtml::encode($data->firstUniversity->name); ?>
	    <br />

    <?php
    }
    ?>
</div>