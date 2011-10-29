<div class="view" style="float:left;width:150px;height:150px;">
	<?php
    if(file_exists(Yii::getPathOfAlias('webroot') . '/images/profile/photo' . $data->photo_id . '.jpg'))
    {
        echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/profile/photo' . $data->photo_id . '.jpg'),
                         array(
                              'profile/view',
                              'id' => $data->id
                         ));
    }
    else
    {
    ?>
        <strong><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</strong>
	    <?php echo CHtml::encode($data->id); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</strong>
	    <?php echo CHtml::encode($data->gender == "M" ? "Male" : "Female"); ?>
	    <br />
        <strong><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</strong>
	    <?php echo CHtml::encode($data->city); ?>
	    <br />
        <strong>Age:</strong>
	    <?php echo CHtml::encode(Profile::returnAge($data->date_of_birth)); ?>
	    <br />
    <?php
    }
    ?>
</div>