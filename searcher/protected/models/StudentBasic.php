<?php

/**
 * This is the model class for table "student_basic".
 *
 * The followings are the available columns in table 'student_basic':
 * @property string $ID
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property integer $college_or_grad
 * @property string $school_name
 * @property string $street_address
 * @property string $apt_po_box
 * @property string $mailing_city
 * @property string $mailing_state
 * @property string $mailing_zipcode
 * @property string $tel_home
 * @property string $school_graduation_year
 * @property string $account_setup_date
 * @property string $account_last_login_date
 */
class StudentBasic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StudentBasic the static model class
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
		return 'student_basic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, first_name, last_name, email_address, college_or_grad, school_name, street_address, apt_po_box, mailing_city, mailing_state, mailing_zipcode, tel_home, school_graduation_year, account_setup_date, account_last_login_date', 'required'),
			array('college_or_grad', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>32),
			array('first_name, last_name', 'length', 'max'=>25),
			array('email_address', 'length', 'max'=>100),
			array('school_name', 'length', 'max'=>200),
			array('street_address', 'length', 'max'=>150),
			array('apt_po_box', 'length', 'max'=>30),
			array('mailing_city', 'length', 'max'=>40),
			array('mailing_state', 'length', 'max'=>20),
			array('mailing_zipcode', 'length', 'max'=>10),
			array('tel_home', 'length', 'max'=>15),
			array('school_graduation_year', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, username, password, first_name, last_name, email_address, college_or_grad, school_name, street_address, apt_po_box, mailing_city, mailing_state, mailing_zipcode, tel_home, school_graduation_year, account_setup_date, account_last_login_date', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email_address' => 'Email Address',
			'college_or_grad' => 'College Or Grad',
			'school_name' => 'School Name',
			'street_address' => 'Street Address',
			'apt_po_box' => 'Apt Po Box',
			'mailing_city' => 'Mailing City',
			'mailing_state' => 'Mailing State',
			'mailing_zipcode' => 'Mailing Zipcode',
			'tel_home' => 'Tel Home',
			'school_graduation_year' => 'School Graduation Year',
			'account_setup_date' => 'Account Setup Date',
			'account_last_login_date' => 'Account Last Login Date',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('college_or_grad',$this->college_or_grad);
		$criteria->compare('school_name',$this->school_name,true);
		$criteria->compare('street_address',$this->street_address,true);
		$criteria->compare('apt_po_box',$this->apt_po_box,true);
		$criteria->compare('mailing_city',$this->mailing_city,true);
		$criteria->compare('mailing_state',$this->mailing_state,true);
		$criteria->compare('mailing_zipcode',$this->mailing_zipcode,true);
		$criteria->compare('tel_home',$this->tel_home,true);
		$criteria->compare('school_graduation_year',$this->school_graduation_year,true);
		$criteria->compare('account_setup_date',$this->account_setup_date,true);
		$criteria->compare('account_last_login_date',$this->account_last_login_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}