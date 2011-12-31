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
           
    protected function updateAcademicTotals()
    {
            $profileID = Yii::app()->user->id;
            $basicProfile=BasicProfile::model()->findByPk($profileID);

            if($basicProfile===null)
            {                
                $basicProfile=new BasicProfile;
                $basicProfile->initialize($profileID);
            }

            $subjectProfileArray=SubjectProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_subjects = count($subjectProfileArray);

            $competitionProfileArray=CompetitionProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_competitions = count($competitionProfileArray);

            $awardProfileArray=AwardProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_awards = count($awardProfileArray);

            $num_academics = $num_subjects + $num_competitions + $num_awards;

            $basicProfile->num_subjects = $num_subjects;
            $basicProfile->num_competitions = $num_competitions;
            $basicProfile->num_awards = $num_awards;
            $basicProfile->num_academics = $num_academics;
            $basicProfile->save(false);    
            return true;
    }
    
    protected function updateExtracurricularTotals()
    {
            $profileID = Yii::app()->user->id;
            $basicProfile=BasicProfile::model()->findByPk($profileID);

            if($basicProfile===null)
            {                
                $basicProfile=new BasicProfile;
                $basicProfile->initialize();
            }

            $activityProfileArray=ActivityProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_activities = count($activityProfileArray);

            $sportProfileArray=SportProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_sports = count($sportProfileArray);

            $musicProfileArray=MusicProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_music = count($musicProfileArray);

            $volunteerProfileArray=VolunteerProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_volunteer = count($volunteerProfileArray);

            $workProfileArray=WorkProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_work = count($workProfileArray);

            $researchProfileArray=ResearchProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_research = count($researchProfileArray);

            $summerProfileArray=SummerProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_summer = count($summerProfileArray);

            $otherProfileArray=OtherProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
            $num_other = count($otherProfileArray);

            $num_extracurriculars = $num_activities + $num_sports + $num_music + $num_volunteer
                + $num_work + $num_research + $num_summer + $num_other;

            $basicProfile->num_activities = $num_activities;
            $basicProfile->num_sports = $num_sports;
            $basicProfile->num_music = $num_music;
            $basicProfile->num_volunteer = $num_volunteer;
            $basicProfile->num_work = $num_work;
            $basicProfile->num_research = $num_research;
            $basicProfile->num_summer = $num_summer;
            $basicProfile->num_other = $num_other;
            $basicProfile->num_extracurriculars = $num_extracurriculars;
            $basicProfile->save(false);    
            return true;
    }
}
