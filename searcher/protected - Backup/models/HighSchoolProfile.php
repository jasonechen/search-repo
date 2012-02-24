<?php

/**
 * This is the model class for table "tbl_highschool_profile".
 *
 * The followings are the available columns in table 'tbl_highschool_profile':
 * @property string $id
 * @property string $user_id
 * @property integer $highSchool_id
 * @property string $start_date
 * @property string $last_date
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property HighschoolName $highSchool
 * @property User $user
 */
class HighSchoolProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return HighSchoolProfile the static model class
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
		return 'tbl_highschool_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('state', 'length', 'max'=>2),
                        array('type', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, state, type', 'safe', 'on'=>'search'),
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
			'basicProfiles' => array(self::HAS_MANY, 'BasicProfile', 'highschool_id'),
			//'basicProfiles1' => array(self::HAS_MANY, 'BasicProfile', 'curr_university_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('ui', 'ID'),
			'name' => Yii::t('ui', 'Name'),
			'state' => Yii::t('ui', 'State'),
			'type' => Yii::t('ui', 'Type'),                    
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('state',$this->state,true);
                $criteria->compare('type',$this->type,true);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
       public function suggest($keyword,$limit=20)
            {
                $models=$this->findAll(array(
                    'condition'=>'name LIKE :keyword',
                    'order'=>'name',
                    'limit'=>$limit,
                    'params'=>array(':keyword'=>"%$keyword%")
                ));
                $suggest=array();
                foreach($models as $model) {
                    $suggest[] = array(
                    'label'=>$model->name, // label for dropdown list
                    'value'=>$model->name, // value for input field
                    'id'=>$model->id, // return values from autocomplete
                    'type'=>$model->type, // return values from autocomplete

                );
                }
            return $suggest;
    }

    /**
* @return array for dropdown (attr1 => attr2)
*/
public function getOptions()
{
return CHtml::listData($this->findAll(),'id','name','type');
}
    
}