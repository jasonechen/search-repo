<?php

/**
 * This is the model class for table "tbl_unit_of_measure".
 *
 * The followings are the available columns in table 'tbl_unit_of_measure':
 * @property integer $id
 * @property string $svalues
 * @property string $stype
 * @property string $active
 */

class SiteBlock extends CActiveRecord
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
		return 'tbl_site_block';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('svalues', 'required'),
                        array('svalues', 'unique','on'=>'addmail'),
                    array('svalues','email','on'=>'addmail'),
                     array('svalues', 'checkipaddress','on' => 'addip'),
                    array('svalues', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'svalues'=>'Value'
			
                        
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
		$criteria->compare('svalues',$this->svalues,true);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function checkipaddress($attribute)
        {
            $msg='Bad IP address. Please correct';
            $error = true;
            $input=$this->svalues;
            $ipCheck = '/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';
            $noCheck='/^[0-9]{1,}/';
            if (preg_match( $ipCheck, $input))
            {
                $error=false;
            }
            
             if($error)
                $this->addError($attribute, $msg);

        }
        public function checkAllowedIP()
        {
            $ip = $_SERVER['REMOTE_ADDR'];
            $count = $this->model()->count("svalues = '".$ip."'");
            return $count;
        }
        public  function checkAllowMailId($mailId)
        {
             
            $count = $this->model()->count("svalues = '".$mailId."' and stype = 'email'");
            return $count;
        }
        
}