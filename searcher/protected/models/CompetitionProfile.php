<?php

/**
 * This is the model class for table "tbl_competition_profile".
 *
 * The followings are the available columns in table 'tbl_competition_profile':
 * @property string $id
 * @property string $user_id
 * @property string $start_date
 * @property string $name_of_competition
 * @property string $rank_or_score
 * @property string $region
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class CompetitionProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CompetitionProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_competition_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, name_of_competition, year, region, rank_or_score', 'required'),
			array('user_id, rank_or_score, num_competitors, create_user_id, update_user_id', 'length', 'max'=>10),
			array('name_of_competition', 'length', 'max'=>20),
			array('region', 'length', 'max'=>1),
                        array('comments', 'length', 'max'=>50),
			array('start_date, create_time, update_time, year, num_competitors', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, start_date, comments, name_of_competition, rank_or_score, num_competitors, region, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'start_date' => 'Start Date',
			'name_of_competition' => 'Name Of Competition',
			'rank_or_score' => 'Rank Or Score',
                        'num_competitors' => 'Number of competitors',
			'region' => 'Region',
                        'comments' => 'Comments',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('name_of_competition',$this->name_of_competition,true);
		$criteria->compare('rank_or_score',$this->rank_or_score,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        protected function afterSave()
        {
            $this->updateAcademicTotals();

            return parent::afterSave();
        //return true;
        }

        
        protected function afterDelete()
        {

            $this->updateAcademicTotals();

            return parent::afterDelete();
        //return true;
        }
        
        public static function getCompetitionById() 
        { 
			$myID = Yii::app()->user->id;	
			$competArr = CompetitionProfile::model()->findAll('user_id =:id', array(':id'=>$myID));
			return $competArr;
        }
}