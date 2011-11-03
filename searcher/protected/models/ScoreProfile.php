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
	/**
	 * Returns the static model of the specified AR class.
	 * @return ScoreProfile the static model class
	 */
   public static $SatScoreArray
          = array(
200=>'200',
210=>'210',
220=>'220',
230=>'230',
240=>'240',
250=>'250',
260=>'260',
270=>'270',
280=>'280',
290=>'290',
300=>'300',
310=>'310',
320=>'320',
330=>'330',
340=>'340',
350=>'350',
360=>'360',
370=>'370',
380=>'380',
390=>'390',
400=>'400',
410=>'410',
420=>'420',
430=>'430',
440=>'440',
450=>'450',
460=>'460',
470=>'470',
480=>'480',
490=>'490',
500=>'500',
510=>'510',
520=>'520',
530=>'530',
540=>'540',
550=>'550',
560=>'560',
570=>'570',
580=>'580',
590=>'590',
600=>'600',
610=>'610',
620=>'620',
630=>'630',
640=>'640',
650=>'650',
660=>'660',
670=>'670',
680=>'680',
690=>'690',
700=>'700',
710=>'710',
720=>'720',
730=>'730',
740=>'740',
750=>'750',
760=>'760',
770=>'770',
780=>'780',
790=>'790',
800=>'800',


               );    
    
    
     public static $PsatScoreArray
          = array(
              20=>'20',
21=>'21',
22=>'22',
23=>'23',
24=>'24',
25=>'25',
26=>'26',
27=>'27',
28=>'28',
29=>'29',
30=>'30',
31=>'31',
32=>'32',
33=>'33',
34=>'34',
35=>'35',
36=>'36',
37=>'37',
38=>'38',
39=>'39',
40=>'40',
41=>'41',
42=>'42',
43=>'43',
44=>'44',
45=>'45',
46=>'46',
47=>'47',
48=>'48',
49=>'49',
50=>'50',
51=>'51',
52=>'52',
53=>'53',
54=>'54',
55=>'55',
56=>'56',
57=>'57',
58=>'58',
59=>'59',
60=>'60',
61=>'61',
62=>'62',
63=>'63',
64=>'64',
65=>'65',
66=>'66',
67=>'67',
68=>'68',
69=>'69',
70=>'70',
71=>'71',
72=>'72',
73=>'73',
74=>'74',
75=>'75',
76=>'76',
77=>'77',
78=>'78',
79=>'79',
80=>'80',                  
              );
         
        public static $ActScoreArray
          = array( 
     
     1=>'1',
2=>'2',
3=>'3',
4=>'4',
5=>'5',
6=>'6',
7=>'7',
8=>'8',
9=>'9',
10=>'10',
11=>'11',
12=>'12',
13=>'13',
14=>'14',
15=>'15',
16=>'16',
17=>'17',
18=>'18',
19=>'19',
20=>'20',
21=>'21',
22=>'22',
23=>'23',
24=>'24',
25=>'25',
26=>'26',
27=>'27',
28=>'28',
29=>'29',
30=>'30',
31=>'31',
32=>'32',
33=>'33',
34=>'34',
35=>'35',
36=>'36',

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
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, SAT_Math, SAT_Critical_Read, SAT_Writing, SAT_Essay, PSAT_Math, PSAT_Verbal, PSAT_Writing, ACT_English, ACT_Math, ACT_Reading, ACT_Science, ACT_Writing, ACT_Composite, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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

                $myID = Yii::app()->user->id;
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
                
                if($basicProfile===null)
                {                
                        $basicProfile=new BasicProfile;
                        $basicProfile->user_id = $myID;
                        $basicProfile->first_university_id = 1;
                        $basicProfile->curr_university_id = 1;
                        $basicProfile->num_academics = 0;
                        $basicProfile->num_extracurriculars = 0;
                        $basicProfile->num_sports = 0;
                        $basicProfile->num_competitions = 0;
                        $basicProfile->num_essays = 0;
                        $basicProfile->profile_type = 0;
                        $basicProfile->l1ForSale = 0;
                        $basicProfile->l2ForSale = 0;
                        $basicProfile->l3ForSale = 0;
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

}