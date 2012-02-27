<?php

/**
 * This is the model class for table "tbl_music_profile".
 *
 * The followings are the available columns in table 'tbl_music_profile':
 * @property string $id
 * @property string $user_id
 * @property integer $music
 * @property integer $level
 * @property integer $year_begin
 * @property integer $year_end
 * @property integer $school_orchband
 * @property integer $school_leader
 * @property integer $ext_orchband
 * @property integer $ext_leader
 * @property string $comments
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 */
class MusicProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MusicProfile the static model class
	 */

         public static $YearParticipateArray
          = array(
                  1=>'Pre-K',
                    2=>'K',
                    3=>'1st Grade',
                    4=>'2nd Grade',
                    5=>'3rd Grade',
                    6=>'4th Grade',
                    7=>'5th Grade',
                    8=>'6th Grade',
                    9=>'7th Grade',
                    10=>'8th Grade',
                    11=>'9th Grade',
                    12=>'10th Grade',
                    13=>'11th Grade',
                    14=>'12th Grade',

               );
    
         public static $MusicArray
         = array(
             1=>'Bass Clarinet',
            2=>'Bass Drum',
            3=>'Bassoon',
            4=>'Celesta',
            5=>'Cello',
            6=>'Chimes',
            7=>'Clarinet',
            8=>'Contrabassoon',
            9=>'Cornet',
            10=>'Cymbals',
            11=>'Double Bass',
            12=>'English Horn',
            13=>'Flute',
            14=>'French Horn',
            15=>'Glockenspiel',
            16=>'Guitar - Acoustic',
            17=>'Guitar - Electric',
            18=>'Harp',
            19=>'Marimba',
            20=>'Oboe',
            21=>'Piano',
            22=>'Piccolo',
            23=>'Saxophone',
            24=>'Snare Drum',
            25=>'Tambourine',
            26=>'Tam-tam',
            27=>'Tenor drum',
            28=>'Timpani',
            29=>'Triangle',
            30=>'Trombone',
            31=>'Trumpet',
            32=>'Tuba',
            33=>'Vibraphone',
            34=>'Viola',
            35=>'Violin',
            36=>'Violoncello',
            37=>'Voice/Singer',
            38=>'Wood block',
            39=>'Xylophone',
            40=>'Other Wind',
            41=>'Other String',
            42=>'Other Percussion',

         );
   
    public static $LevelArray
          = array(
                  1=>'Novice',
                 2=>'Intermediate',
                 3=>'Advanced',
                4=>'Concert',
              );     

    public static $SchoolMusicArray
          = array(
                  1=>'School Orchestra',
                 2=>'School Band',
                 3=>'Orchestra and Band',
                 4=>'Glee / Chorus',
              
                      );     
    
    public static $SchoolLevelArray
          = array(
                  1=>'Member',
                 2=>'1st Chair',
                 3=>'2nd Chair',
                4=>'Concertmaster',
              5=>'Associate Concertmaster',
              6=>'Assistant Concertmaster',
              7=>'Principal',
              8=>'Lead Singer',
              );     
      public static $ExtMusicArray
          = array(
                  1=>'Regional Orchestra',
                 2=>'Regional Band',
                 3=>'State Orchestra',
                 4=>'State Band',
                 5=>'Singing Group',
                 6=>'Rock Band',
                 7=>'Solo Artist',
                   );       
      
         
    public static function convertMusic($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=42) && ($inCode >0)) {
                $myReturnValue = MusicProfile::$MusicArray[$inCode];
            }
            return $myReturnValue;
        }     
         
    public static function convertYears($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=14) && ($inCode >0)) {
                $myReturnValue = MusicProfile::$YearParticipateArray[$inCode];
            }
            return $myReturnValue;
        }    
 
        public static function convertLevel($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=4) && ($inCode >0)) {
                $myReturnValue = MusicProfile::$LevelArray[$inCode];
            }
            return $myReturnValue;
        }
         public static function convertSchoolMusic($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=4) && ($inCode >0)) {
                $myReturnValue = MusicProfile::$SchoolMusicArray[$inCode];
            }
            return $myReturnValue;
        }
        
        public static function convertSchoolLevel($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=8) && ($inCode >0)) {
                $myReturnValue = MusicProfile::$SchoolLevelArray[$inCode];
            }
            return $myReturnValue;
        }        

         public static function convertExtMusic($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=7) && ($inCode >0)) {
                $myReturnValue = MusicProfile::$ExtMusicArray[$inCode];
            }
            return $myReturnValue;
        }        
        
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_music_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, music, level, year_begin, year_end, create_time, create_user_id, update_time, update_user_id', 'required'),
			array('music, level, year_begin, year_end, school_orchband, school_leader, ext_orchband, ext_leader', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, music, level, year_begin, year_end, school_orchband, school_leader, ext_orchband, ext_leader, comments, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'music' => 'Music',
			'level' => 'Level',
			'year_begin' => 'Year Begin',
			'year_end' => 'Year End',
			'school_orchband' => 'School Participation',
			'school_leader' => 'School Position',
			'ext_orchband' => 'External Participation',
			'ext_leader' => 'External Position',
			'comments' => 'Comments',
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
		$criteria->compare('music',$this->music);
		$criteria->compare('level',$this->level);
		$criteria->compare('year_begin',$this->year_begin);
		$criteria->compare('year_end',$this->year_end);
		$criteria->compare('school_orchband',$this->school_orchband);
		$criteria->compare('school_leader',$this->school_leader);
		$criteria->compare('ext_orchband',$this->ext_orchband);
		$criteria->compare('ext_leader',$this->ext_leader);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	 public static function getMusicByUser() 
        { 
			$myID = Yii::app()->user->id;	
			$testArr = MusicProfile::model()->findAll('user_id =:id', array(':id'=>$myID));
			return $testArr;
        }
        protected function afterSave()
        {

            $this->updateExtracurricularTotals();

            return parent::afterSave();
        //return true;
        }
        
        protected function afterDelete()
        {

            $this->updateExtracurricularTotals();

            return parent::afterDelete();
        //return true;
        }
}