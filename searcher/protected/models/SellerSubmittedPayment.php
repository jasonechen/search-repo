<?php

/**
 * This is the model class for table "tbl_seller_submitted_payment".
 *
 * The followings are the available columns in table 'tbl_seller_submitted_payment':
 * @property string $id
 * @property string $user_id
 * @property double $payment
 * @property string $submit_date
 */
class SellerSubmittedPayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SellerSubmittedPayment the static model class
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
		return 'tbl_seller_submitted_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, payment', 'required'),
			array('payment', 'numerical'),
			array('user_id', 'length', 'max'=>10),
			array('submit_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, payment, submit_date', 'safe', 'on'=>'search'),
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
			'payment' => 'Payment',
			'submit_date' => 'Submit Date',
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
		$criteria->compare('payment',$this->payment);
		$criteria->compare('submit_date',$this->submit_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}