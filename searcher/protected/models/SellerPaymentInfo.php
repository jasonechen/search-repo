<?php

/**
 * This is the model class for table "tbl_seller_payment_info".
 *
 * The followings are the available columns in table 'tbl_seller_payment_info':
 * @property string $id
 * @property string $user_id
 * @property string $is_preferred
 * @property integer $payment_type
 */
class SellerPaymentInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SellerPaymentInfo the static model class
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
		return 'tbl_seller_payment_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, payment_type', 'required'),
			array('payment_type', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('is_preferred', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, is_preferred, payment_type', 'safe', 'on'=>'search'),
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
			'is_preferred' => 'Is Preferred',
			'payment_type' => 'Payment Type',
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
		$criteria->compare('is_preferred',$this->is_preferred,true);
		$criteria->compare('payment_type',$this->payment_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}