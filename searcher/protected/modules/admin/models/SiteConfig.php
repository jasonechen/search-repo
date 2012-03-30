<?php

/**
 * This is the model class for table "tbl_unit_of_measure".
 *
 * The followings are the available columns in table 'tbl_unit_of_measure':
 * @property integer $id
 * @property string $sit_type
 * @property string $sit_keys
 * @property string $sit_values
 * @property date max_credits_allow
 */

class SiteConfig extends CActiveRecord
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
		return 'tbl_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sit_keys', 'required'),
                	array('sit_keys', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sit_keys' => 'Enter the titls',
                        'sit_values' => 'Set the values',
			
                        
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
		$criteria->compare('sit_keys',$this->key,true);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


}