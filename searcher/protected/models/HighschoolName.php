<?php

/**
 * This is the model class for table "tbl_highschool_name".
 *
 * The followings are the available columns in table 'tbl_highschool_name':
 * @property integer $id
 * @property string $name
 * @property string $street
 * @property string $city
 * @property string $state
 * @property integer $zip_code
 * @property integer $phone_num
 * @property integer $locale_code
 * @property string $student_count
 * @property string $teacher_count
 * @property string $stud_teach_ratio
 * @property integer $male_count
 * @property integer $female_count
 * @property integer $nativeam_count
 * @property integer $asian_count
 * @property integer $black_count
 * @property integer $hispanic_count
 * @property integer $white_count
 * @property string $type
 */
class HighschoolName extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return HighschoolName the static model class
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
		return 'tbl_highschool_name';
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
			array('id, zip_code, phone_num, locale_code, male_count, female_count, nativeam_count, asian_count, black_count, hispanic_count, white_count', 'numerical', 'integerOnly'=>true),
			array('name, street', 'length', 'max'=>100),
			array('city', 'length', 'max'=>30),
			array('state, type', 'length', 'max'=>2),
			array('student_count, teacher_count, stud_teach_ratio', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, street, city, state, zip_code, phone_num, locale_code, student_count, teacher_count, stud_teach_ratio, male_count, female_count, nativeam_count, asian_count, black_count, hispanic_count, white_count, type', 'safe', 'on'=>'search'),
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
		$criteria->compare('street',$this->street,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('phone_num',$this->phone_num);
		$criteria->compare('locale_code',$this->locale_code);
		$criteria->compare('student_count',$this->student_count,true);
		$criteria->compare('teacher_count',$this->teacher_count,true);
		$criteria->compare('stud_teach_ratio',$this->stud_teach_ratio,true);
		$criteria->compare('male_count',$this->male_count);
		$criteria->compare('female_count',$this->female_count);
		$criteria->compare('nativeam_count',$this->nativeam_count);
		$criteria->compare('asian_count',$this->asian_count);
		$criteria->compare('black_count',$this->black_count);
		$criteria->compare('hispanic_count',$this->hispanic_count);
		$criteria->compare('white_count',$this->white_count);
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
                 //   'type'=>$model->type, // return values from autocomplete

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