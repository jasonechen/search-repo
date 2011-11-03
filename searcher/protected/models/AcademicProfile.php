<?php

/**
 * This is the model class for table "tbl_academic_profile".
 *
 * The followings are the available columns in table 'tbl_academic_profile':
 * @property string $user_id
 * @property string $national_Merit
 * @property string $class_rank
 * @property string $class_size
 * @property double $GPA
 *
 * The followings are the available model relations:
 * @property User $user
 */
class AcademicProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AcademicProfile the static model class
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
		return 'tbl_academic_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('GPA_unweight, GPA_weight', 'numerical'),
			array('user_id', 'length', 'max'=>10),
			array('national_Merit, class_rank_num, class_size, GPA_unweight, GPA_weight', 'length', 'max'=>4),
                        array('GPA_unweight,GPA_weight,class_rank_num, class_rank_percent','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, national_Merit, GPA_unweight, GPA_weight, class_rank_num, class_rank_percent, class_size', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'national_Merit' => 'National Merit',
			'class_rank_num' => 'Class Rank',
                        'class_rank_percent' => 'Class Rank Percentile',
			'class_size' => 'Class Size',
			'GPA_unweight' => 'Unweighted GPA',
                        'GPA_weight' => 'Weighted GPA',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('national_Merit',$this->national_Merit,true);
		$criteria->compare('class_rank_percent',$this->class_rank_percent,true);
                $criteria->compare('class_rank_num',$this->class_rank_num,true);
		$criteria->compare('class_size',$this->class_size,true);
		$criteria->compare('GPA_unweight',$this->GPA_unweight,true);
                $criteria->compare('GPA_weight',$this->GPA_weight,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
    protected function beforeValidate()
    {
        //parent::beforeValidate();

        if($this->isNewRecord)
        {

           $this->user_id=Yii::app()->user->id;
        }
//        else
//        {
//        //not a new record, so just set the last updated time and last updated user id     
//    //       Yii::log("Called beforeValidate", CLogger::LEVEL_WARNING, 'edtest');
//          $this->update_user_id=Yii::app()->user->id;
//        }

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