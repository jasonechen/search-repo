<?php

/**
 * This is the model class for table "tbl_verify_profile".
 *
 * The followings are the available columns in table 'tbl_verify_profile':
 * @property string $id
 * @property string $user_id
 * @property string $ref1_name
 * @property string $ref1_contact
 * @property string $ref1_desc
 * @property string $ref2_name
 * @property string $ref2_contact
 * @property string $ref2_desc
 * @property string $ref3_name
 * @property string $ref3_contact
 * @property string $ref3_desc
 * @property string $status
 * @property string $name
 * @property string $mime
 * @property string $size
 * @property string $data
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 */
class VerifyProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VerifyProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        
        public static $StatusArray
          = array(
                 0=>'Not Verified',
                 1=>'Verified',

        );
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_verify_profile';
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
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('ref1_name, ref2_name, ref3_name', 'length', 'max'=>40),
			array('ref1_contact, ref2_contact, ref3_contact, mime', 'length', 'max'=>50),
			array('ref1_desc, ref2_desc, ref3_desc', 'length', 'max'=>60),
			array('name, size', 'length', 'max'=>20),
			array('data, status, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, ref1_name, ref1_contact, ref1_desc, ref2_name, ref2_contact, ref2_desc, ref3_name, ref3_contact, ref3_desc, name, mime, size, data, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'ref1_name' => 'Ref1 Name',
			'ref1_contact' => 'Ref1 Contact',
			'ref1_desc' => 'Ref1 Desc',
			'ref2_name' => 'Ref2 Name',
			'ref2_contact' => 'Ref2 Contact',
			'ref2_desc' => 'Ref2 Desc',
			'ref3_name' => 'Ref3 Name',
			'ref3_contact' => 'Ref3 Contact',
			'ref3_desc' => 'Ref3 Desc',
			'name' => 'Name',
			'mime' => 'Mime',
			'size' => 'Size',
			'data' => 'Data',
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
		$criteria->compare('ref1_name',$this->ref1_name,true);
		$criteria->compare('ref1_contact',$this->ref1_contact,true);
		$criteria->compare('ref1_desc',$this->ref1_desc,true);
		$criteria->compare('ref2_name',$this->ref2_name,true);
		$criteria->compare('ref2_contact',$this->ref2_contact,true);
		$criteria->compare('ref2_desc',$this->ref2_desc,true);
		$criteria->compare('ref3_name',$this->ref3_name,true);
		$criteria->compare('ref3_contact',$this->ref3_contact,true);
		$criteria->compare('ref3_desc',$this->ref3_desc,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mime',$this->mime,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('data',$this->data,true);
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
	    parent::afterSave();
	    User::updateRoyalty($this->user_id);
	}
        
                
        public static function getStatus($indexVal)
	{
            
            if(isset(VerifyProfile::$StatusArray[$indexVal]))
            {
                return VerifyProfile::$StatusArray[$indexVal];
            }
            return 'Not Verified';
            
	}
        
}