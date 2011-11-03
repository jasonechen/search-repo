<?php

/**
 * This is the model class for table "tbl_essay_profile".
 *
 * The followings are the available columns in table 'tbl_essay_profile':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $mime
 * @property string $size
 * @property string $data
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class EssayProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EssayProfile the static model class
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
		return 'tbl_essay_profile';
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
			array('name, size', 'length', 'max'=>20),
			array('mime', 'length', 'max'=>50),
			array('data, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, mime, size, data, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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

    protected function afterSave()
    {

            $myID = Yii::app()->user->id;
            $basicProfile=BasicProfile::model()->findByPk($myID);
            $numEssays = $this->countByAttributes(array('user_id'=>$myID));
  
            if($basicProfile===null)
            {                
                    $basicProfile=new BasicProfile;
                    $basicProfile->user_id = $myID;
                    $basicProfile->first_university_id = 1;
                    $basicProfile->curr_university_id = 1;
                    $basicProfile->num_scores = 0;
                    $basicProfile->num_aps = 0;
                    $basicProfile->num_sat2s = 0;
                    $basicProfile->num_competitions = 0;
                    $basicProfile->num_sports = 0;
                    $basicProfile->num_academics = 0;
                    $basicProfile->num_extracurriculars = 0;
                    $basicProfile->profile_type = 0;
            }

            $basicProfile->num_essays = $numEssays;
            $basicProfile->save(true);

            return parent::afterValidate();
    //return true;
    }
}