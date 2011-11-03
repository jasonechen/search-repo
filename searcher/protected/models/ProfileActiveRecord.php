<?php
abstract class ProfileActiveRecord extends MCVActiveRecord
{
     /**
     * Prepares create_time, create_user_id, update_time and update_user_id attributes before performing validation.
     */
    protected function beforeValidate()
    {
        //parent::beforeValidate();

        if($this->isNewRecord)
        {

           $this->user_id=Yii::app()->user->id;
        }
        else
        {
        //not a new record, so just set the last updated time and last updated user id     
    //       Yii::log("Called beforeValidate", CLogger::LEVEL_WARNING, 'edtest');
          $this->update_user_id=Yii::app()->user->id;
        }

        return parent::beforeValidate();
    //return true;
    }
    
    public function allByUser()
    {
            // Warning: Please modify the following code to remove attributes that
            // should not be searched.

            $criteria=new CDbCriteria;

            $criteria->compare('user_id',Yii::app()->user->id,true);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }	
}
