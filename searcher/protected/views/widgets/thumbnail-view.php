<div class="view" style="float:left;width:150px;height:150px;">
	<?php
    echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/profile/photo' . $data->photo_id . '.jpg'),
                     array(
                          'profile/view',
                          'id' => $data->id
                     ));
    ?>
</div>