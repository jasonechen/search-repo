<?php

/**
 * This is the model class for table "tbl_language_type".
 *
 * The followings are the available columns in table 'tbl_language_type':
 * @property string $id
 * @property string $name
 */
class LanguageType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LanguageType the static model class
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
		return 'tbl_language_type';
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
			array('id', 'length', 'max'=>3),
			array('name', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
                  'langProfiles' => array(self::HAS_MANY, 'LanguageProfile', 'language_id'),
                    
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
		$criteria->compare('name',$this->name,true);

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
        
}