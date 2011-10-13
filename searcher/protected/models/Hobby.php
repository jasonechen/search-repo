<?php

/**
 * This is the model class for table "tbl_hobby".
 *
 * The followings are the available columns in table 'tbl_hobby':
 * @property string $id
 * @property string $user_id
 * @property string $hobby_id
 *
 * The followings are the available model relations:
 * @property Profile $user
 * @property HobbyType $hobby
 */
class Hobby extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hobby the static model class
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
		return 'tbl_hobby';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, hobby_id', 'required'),
			array('user_id', 'length', 'max'=>10),
			array('hobby_id', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, hobby_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Profile', 'user_id'),
			'hobby' => array(self::BELONGS_TO, 'HobbyType', 'hobby_id'),
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
			'hobby_id' => 'Hobby',
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
		$criteria->compare('hobby_id',$this->hobby_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}