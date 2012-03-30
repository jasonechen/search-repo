<?php

/**
 * This is the model class for table "tbl_unit_of_measure".
 *
 * The followings are the available columns in table 'tbl_unit_of_measure':
 * @property integer $id
 * @property string $promo_code
 * @property date $act_fromdate
 * @property date $act_todate
 * @property string $user_id
 * @property integer $delflg
 */

class Promo extends CActiveRecord
{
   /**
	 * Returns the static model of the specified AR class.
	 * @return UnitOfMeasure the static model class
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
		return 'tbl_promo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promo_code,discount_value', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('discount_value,act_fromdate, act_todate, pack_price', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'promo_code' => 'Promo Code',
			'discount_value' => 'Discout in % ',
                        'act_fromdate' => 'Activation From Date',
                        'act_todate' => 'Activation To Date',
                        
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
		$criteria->compare('id',$this->id);
		$criteria->compare('promo_code',$this->promo_code,true);
		$criteria->compare('discount_value',$this->discount_value,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


}