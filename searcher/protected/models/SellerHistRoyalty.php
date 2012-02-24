<?php

/**
 * This is the model class for table "tbl_seller_hist_royalty".
 *
 * The followings are the available columns in table 'tbl_seller_hist_royalty':
 * @property string $id
 * @property string $user_id
 * @property double $L1_royalty
 * @property double $L2_inc_royalty
 * @property double $L3_inc_royalty
 * @property string $date_modified
 * @property string $date_archived
 */
class SellerHistRoyalty extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SellerHistRoyalty the static model class
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
		return 'tbl_seller_hist_royalty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, L1_royalty, L2_inc_royalty, L3_inc_royalty', 'required'),
			array('L1_royalty, L2_inc_royalty, L3_inc_royalty', 'numerical'),
			array('user_id', 'length', 'max'=>10),
			array('date_modified, date_archived', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, L1_royalty, L2_inc_royalty, L3_inc_royalty, date_modified, date_archived', 'safe', 'on'=>'search'),
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
			'L1_royalty' => 'L1 Royalty',
			'L2_inc_royalty' => 'L2 Inc Royalty',
			'L3_inc_royalty' => 'L3 Inc Royalty',
			'date_modified' => 'Date Modified',
			'date_archived' => 'Date Archived',
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
		$criteria->compare('L1_royalty',$this->L1_royalty);
		$criteria->compare('L2_inc_royalty',$this->L2_inc_royalty);
		$criteria->compare('L3_inc_royalty',$this->L3_inc_royalty);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('date_archived',$this->date_archived,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}