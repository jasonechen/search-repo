<?php

/**
 * This is the model class for table "tbl_seller_hist_payment".
 *
 * The followings are the available columns in table 'tbl_seller_hist_payment':
 * @property string $id
 * @property string $user_id
 * @property double $payment
 * @property string $payment_date
 * @property string $archive_date
 */
class SellerHistPayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SellerHistPayment the static model class
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
		return 'tbl_seller_hist_payment';
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
			array('payment_date, archive_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, payment, payment_date, archive_date', 'safe', 'on'=>'search'),
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
			'payment_date' => 'Payment Date',
			'archive_date' => 'Archive Date',
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
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('archive_date',$this->archive_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}