<?php
abstract class MCVActiveRecord extends CActiveRecord
{
     /**
     * Prepares create_time, create_user_id, update_time and update_user_id attributes before performing validation.
     */
    protected function beforeValidate()
    {
    //parent::beforeValidate();

    if($this->isNewRecord)
    {
        // set the create date, last updated date and the user doing the creating  
       $this->create_time=$this->update_time=new CDbExpression('NOW()');
       $this->create_user_id=$this->update_user_id=Yii::app()->user->id;
    }
    else
    {
    //not a new record, so just set the last updated time and last updated user id     
//       Yii::log("Called beforeValidate", CLogger::LEVEL_WARNING, 'edtest');
       $this->update_time=new CDbExpression('NOW()');
      $this->update_user_id=Yii::app()->user->id;
    }

    return parent::beforeValidate();
    //return true;
    }
	
}
