<?php

/**
 * This is the model class for table "tbl_map_profile_student".
 *
 * The followings are the available columns in table 'tbl_map_profile_student':
 * @property string $user_id
 * @property string $purchased_profile_id
 * @property integer $l1_purchased
 * @property integer $l2_purchased
 * @property integer $l3_purchased
 * @property integer $isOwner
 * @property string $l1_purchase_time
 * @property string $l2_purchase_time
 * @property string $l3_purchase_time
 *
 * The followings are the available model relations:
 * @property User $purchasedProfile
 * @property User $user
 */
class MapProfileStudent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MapProfileStudent the static model class
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
		return 'tbl_map_profile_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, purchased_profile_id', 'required'),
			array('l1_purchased, l2_purchased, l3_purchased, isOwner', 'numerical', 'integerOnly'=>true),
			array('user_id, purchased_profile_id', 'length', 'max'=>10),
//                    array('l1_purchased, l2_purchased, l3_purchased, user_id, purchased_profile_id', 'safe'),
			array('l1_purchase_time, l2_purchase_time, l3_purchase_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, purchased_profile_id, l1_purchased, l2_purchased, l3_purchased, isOwner, l1_purchase_time, l2_purchase_time, l3_purchase_time', 'safe', 'on'=>'search'),
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
			'purchasedProfile' => array(self::BELONGS_TO, 'User', 'purchased_profile_id'),
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
			'purchased_profile_id' => 'Purchased Profile',
			'l1_purchased' => 'L1 Purchased',
			'l2_purchased' => 'L2 Purchased',
			'l3_purchased' => 'L3 Purchased',
			'isOwner' => 'Is Owner',
			'l1_purchase_time' => 'L1 Purchase Time',
			'l2_purchase_time' => 'L2 Purchase Time',
			'l3_purchase_time' => 'L3 Purchase Time',
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
		$criteria->compare('purchased_profile_id',$this->purchased_profile_id,true);
		$criteria->compare('l1_purchased',$this->l1_purchased);
		$criteria->compare('l2_purchased',$this->l2_purchased);
		$criteria->compare('l3_purchased',$this->l3_purchased);
		$criteria->compare('isOwner',$this->isOwner);
		$criteria->compare('l1_purchase_time',$this->l1_purchase_time,true);
		$criteria->compare('l2_purchase_time',$this->l2_purchase_time,true);
		$criteria->compare('l3_purchase_time',$this->l3_purchase_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}