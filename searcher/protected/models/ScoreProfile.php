<?php

/**
 * This is the model class for table "tbl_score_profile".
 *
 * The followings are the available columns in table 'tbl_score_profile':
 * @property string $user_id
 * @property integer $SAT_Math
 * @property integer $SAT_Critical_Read
 * @property integer $SAT_Writing
 * @property integer $SAT_Essay
 * @property integer $PSAT_Math
 * @property integer $PSAT_Verbal
 * @property integer $PSAT_Writing
 * @property integer $ACT_English
 * @property integer $ACT_Math
 * @property integer $ACT_Reading
 * @property integer $ACT_Science
 * @property integer $ACT_Writing
 * @property integer $ACT_Composite
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class ScoreProfile extends ProfileActiveRecord
{
    
    public $totalSAT;
	/**
	 * Returns the static model of the specified AR class.
	 * @return ScoreProfile the static model class
	 */
   public static $SatScoreArray
          = array(
            800=>'800',
            790=>'790',
            780=>'780',
            770=>'770',
            760=>'760',
            750=>'750',
            740=>'740',
            730=>'730',
            720=>'720',
            710=>'710',
            700=>'700',
            690=>'690',
            680=>'680',
            670=>'670',
            660=>'660',
            650=>'650',
            640=>'640',
            630=>'630',
            620=>'620',
            610=>'610',
            600=>'600',
            590=>'590',
            580=>'580',
            570=>'570',
            560=>'560',
            550=>'550',
            540=>'540',
            530=>'530',
            520=>'520',
            510=>'510',
            500=>'500',
            490=>'490',
            480=>'480',
            470=>'470',
            460=>'460',
            450=>'450',
            440=>'440',
            430=>'430',
            420=>'420',
            410=>'410',
            400=>'400',
            390=>'390',
            380=>'380',
            370=>'370',
            360=>'360',
            350=>'350',
            340=>'340',
            330=>'330',
            320=>'320',
            310=>'310',
            300=>'300',
            290=>'290',
            280=>'280',
            270=>'270',
            260=>'260',
            250=>'250',
            240=>'240',
            230=>'230',
            220=>'220',
            210=>'210',
            200=>'200',
               );    
    
    
     public static $PsatScoreArray
          = array(
            80=>'80',
            79=>'79',
            78=>'78',
            77=>'77',
            76=>'76',
            75=>'75',
            74=>'74',
            73=>'73',
            72=>'72',
            71=>'71',
            70=>'70',
            69=>'69',
            68=>'68',
            67=>'67',
            66=>'66',
            65=>'65',
            64=>'64',
            63=>'63',
            62=>'62',
            61=>'61',
            60=>'60',
            59=>'59',
            58=>'58',
            57=>'57',
            56=>'56',
            55=>'55',
            54=>'54',
            53=>'53',
            52=>'52',
            51=>'51',
            50=>'50',
            49=>'49',
            48=>'48',
            47=>'47',
            46=>'46',
            45=>'45',
            44=>'44',
            43=>'43',
            42=>'42',
            41=>'41',
            40=>'40',
            39=>'39',
            38=>'38',
            37=>'37',
            36=>'36',
            35=>'35',
            34=>'34',
            33=>'33',
            32=>'32',
            31=>'31',
            30=>'30',
            29=>'29',
            28=>'28',
            27=>'27',
            26=>'26',
            25=>'25',
            24=>'24',
            23=>'23',
            22=>'22',
            21=>'21',
            20=>'20',                
              );
         
        public static $ActScoreArray
          = array( 
            36=>'36',
            35=>'35',
            34=>'34',
            33=>'33',
            32=>'32',
            31=>'31',
            30=>'30',
            29=>'29',
            28=>'28',
            27=>'27',
            26=>'26',
            25=>'25',
            24=>'24',
            23=>'23',
            22=>'22',
            21=>'21',
            20=>'20',
            19=>'19',
            18=>'18',
            17=>'17',
            16=>'16',
            15=>'15',
            14=>'14',
            13=>'13',
            12=>'12',
            11=>'11',
            10=>'10',
            9=>'9',
            8=>'8',
            7=>'7',
            6=>'6',
            5=>'5',
            4=>'4',
            3=>'3',
            2=>'2',
            1=>'1'
     );


         public static $ToeflScoreArray
          = array(
              
                120=>'120',
                119=>'119',
                118=>'118',
                117=>'117',
                116=>'116',
                115=>'115',
                114=>'114',
                113=>'113',
                112=>'112',
                111=>'111',
                110=>'110',
                109=>'109',
                108=>'108',
                107=>'107',
                106=>'106',
                105=>'105',
                104=>'104',
                103=>'103',
                102=>'102',
                101=>'101',
                100=>'100',
                99=>'99',
                98=>'98',
                97=>'97',
                96=>'96',
                95=>'95',
                94=>'94',
                93=>'93',
                92=>'92',
                91=>'91',
                90=>'90',
                89=>'89',
                88=>'88',
                87=>'87',
                86=>'86',
                85=>'85',
                84=>'84',
                83=>'83',
                82=>'82',
                81=>'81',
                80=>'80',
                79=>'79',
                78=>'78',
                77=>'77',
                76=>'76',
                75=>'75',
                74=>'74',
                73=>'73',
                72=>'72',
                71=>'71',
                70=>'70',
                69=>'69',
                68=>'68',
                67=>'67',
                66=>'66',
                65=>'65',
                64=>'64',
                63=>'63',
                62=>'62',
                61=>'61',
                60=>'60',
                59=>'59',
                58=>'58',
                57=>'57',
                56=>'56',
                55=>'55',
                54=>'54',
                53=>'53',
                52=>'52',
                51=>'51',
                50=>'50',
                49=>'49',
                48=>'48',
                47=>'47',
                46=>'46',
                45=>'45',
                44=>'44',
                43=>'43',
                42=>'42',
                41=>'41',
                40=>'40',
                39=>'39',
                38=>'38',
                37=>'37',
                36=>'36',
                35=>'35',
                34=>'34',
                33=>'33',
                32=>'32',
                31=>'31',
                30=>'30',
                29=>'29',
                28=>'28',
                27=>'27',
                26=>'26',
                25=>'25',
                24=>'24',
                23=>'23',
                22=>'22',
                21=>'21',
                20=>'20',
                19=>'19',
                18=>'18',
                17=>'17',
                16=>'16',
                15=>'15',
                14=>'14',
                13=>'13',
                12=>'12',
                11=>'11',
                10=>'10',
                9=>'9',
                8=>'8',
                7=>'7',
                6=>'6',
                5=>'5',
                4=>'4',
                3=>'3',
                2=>'2',
                1=>'1',
                0=>'0',
                );
        
        
        
 public static $IeltsScoreArray
          = array(
            
            18=>'9.0',
            17=>'8.5',
            16=>'8.0',
            15=>'7.5',
            14=>'7.0',
            13=>'6.5',
            12=>'6.0',
            11=>'5.5',
            10=>'5.0',
            9=>'4.5',
            8=>'4.0',
            7=>'3.5',
            6=>'3.0',
            5=>'2.5',
            4=>'2.0',
            3=>'1.5',
            2=>'1.0',
            1=>'0.5',
            0=>'0'
              );
        
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_score_profile';
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
			array('SAT_Math, SAT_Critical_Read, SAT_Writing, SAT_Essay, PSAT_Math, PSAT_Verbal, PSAT_Writing, ACT_English, ACT_Math, ACT_Reading, ACT_Science, ACT_Writing, ACT_Composite', 'numerical', 'integerOnly'=>true),
                    	array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('toefl, ielts, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, toefl, ielts, SAT_Math, SAT_Critical_Read, SAT_Writing, SAT_Essay, PSAT_Math, PSAT_Verbal, PSAT_Writing, ACT_English, ACT_Math, ACT_Reading, ACT_Science, ACT_Writing, ACT_Composite, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'SAT_Math' => 'SAT Math Score',
			'SAT_Critical_Read' => 'SAT Critical Reading Score',
			'SAT_Writing' => 'SAT Writing Score',
			'SAT_Essay' => 'SAT Essay',
			'PSAT_Math' => 'PSAT Math Score',
			'PSAT_Verbal' => 'PSAT Verbal Score',
			'PSAT_Writing' => 'PSAT Writing Score',
			'ACT_English' => 'ACT English Score',
			'ACT_Math' => 'ACT Math Score',
			'ACT_Reading' => 'ACT Reading Score',
			'ACT_Science' => 'ACT Science Score',
			'ACT_Writing' => 'ACT Writing Score',
			'ACT_Composite' => 'ACT Composite',
                        'toefl' => 'TOEFL',
                        'ielts' => 'IELTS',                    
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('SAT_Math',$this->SAT_Math);
		$criteria->compare('SAT_Critical_Read',$this->SAT_Critical_Read);
		$criteria->compare('SAT_Writing',$this->SAT_Writing);
		$criteria->compare('SAT_Essay',$this->SAT_Essay);
		$criteria->compare('PSAT_Math',$this->PSAT_Math);
		$criteria->compare('PSAT_Verbal',$this->PSAT_Verbal);
		$criteria->compare('PSAT_Writing',$this->PSAT_Writing);
		$criteria->compare('ACT_English',$this->ACT_English);
		$criteria->compare('ACT_Math',$this->ACT_Math);
		$criteria->compare('ACT_Reading',$this->ACT_Reading);
		$criteria->compare('ACT_Science',$this->ACT_Science);
		$criteria->compare('ACT_Writing',$this->ACT_Writing);
		$criteria->compare('ACT_Composite',$this->ACT_Composite);
		$criteria->compare('toefl',$this->toefl);                
		$criteria->compare('ielts',$this->ielts);                
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        protected function updateScoreTotals()

        {

                $myID = $this->user_id;
                $basicProfile=BasicProfile::model()->findByPk($myID);
                $numScores = 0;
                if (($this->SAT_Math!==NULL) && ($this->SAT_Math!=="")) ++$numScores;
                if (($this->SAT_Critical_Read!==NULL) && ($this->SAT_Critical_Read!=="")) ++$numScores;
                if (($this->SAT_Writing!==NULL) && ($this->SAT_Writing!=="")) ++$numScores;
                if (($this->SAT_Essay!==NULL) && ($this->SAT_Essay!=="")) ++$numScores;
                if (($this->PSAT_Math!==NULL) && ($this->PSAT_Math!=="")) ++$numScores;
                if (($this->PSAT_Verbal!==NULL) && ($this->PSAT_Verbal!=="")) ++$numScores;
                if (($this->PSAT_Writing!==NULL) && ($this->PSAT_Writing!=="")) ++$numScores;
                if (($this->ACT_English!==NULL) && ($this->ACT_English!=="")) ++$numScores;
                if (($this->ACT_Math!==NULL) && ($this->ACT_Math!=="")) ++$numScores;
                if (($this->ACT_Reading!==NULL) && ($this->ACT_Reading!=="")) ++$numScores;
                if (($this->ACT_Science!==NULL) && ($this->ACT_Science!=="")) ++$numScores;
                if (($this->ACT_Writing!==NULL) && ($this->ACT_Writing!=="")) ++$numScores;
                if (($this->ACT_Composite!==NULL) && ($this->ACT_Composite!=="")) ++$numScores;
                if (($this->toefl!==NULL) && ($this->toefl!=="")) ++$numScores;
                if (($this->ielts!==NULL) && ($this->ielts!=="")) ++$numScores;
                
                if($basicProfile===null)
                {                
                        $basicProfile=new BasicProfile;
                        $basicProfile->initialize($myID);

                }
                
                $numAps = ApProfile::model()->countByAttributes(array('user_id'=>$myID));
                $numSat2s = Sat2Profile::model()->countByAttributes(array('user_id'=>$myID));
                $basicProfile->num_sat2s = $numSat2s;
                $basicProfile->num_aps = $numAps;
                $basicProfile->num_scores = $numScores + $numAps + $numSat2s;
                if (($this->SAT_Math!=="") && ($this->SAT_Critical_Read!=="")
                        && ($this->SAT_Writing!==""))
                {
                  $totalScore= $this->SAT_Math + $this->SAT_Critical_Read + $this->SAT_Writing;
                  $basicProfile->sat_I_score_range 
                          = BasicProfile::getSATIndex($totalScore);    
                }
                else
                {
                  $basicProfile->sat_I_score_range = 0;
                }
                $basicProfile->save(true);

                return true;
        }

        protected function afterSave()
        {

                $this->updateScoreTotals();

                return parent::afterSave();
        //return true;
        }
        
        public function calcTotalSAT()
        {
            $this->totalSAT = "";
            if (($this->SAT_Math)&&
                    ($this->SAT_Critical_Read) &&
                    ($this->SAT_Writing)){
                $this->totalSAT = $this->SAT_Math + $this->SAT_Critical_Read + $this->SAT_Writing;
            }
        }

}