<?php

/**
 * FilterForm class
 */

class FilterForm extends CFormModel
{
    public $first_university_name;
    public $SAT;
    public $SATMax;
    public $SATMin;
    public $first_university_id;
    public $race_id;
    public $gender;
    public $state;
    public $profile_type;
    public $num_scores;
    public $num_scoresMin;
    public $num_scoresMax;
    public $num_extracurriculars;
    public $num_extracurricularsMin;
    public $num_extracurricularsMax;
    public $num_essays;
    public $verified;
    public $consultValue;
    public $avg_profile_rating;
    public $avg_profile_ratingMin;
    public $avg_profile_ratingMax;
    public $focus = array();
    public $focus_1;
    public $focus_2;
    public $focus_3;
    public $focus_4;
    public $focus_5;
    public $focus_6;
    public $focus_7;
    public $focus_8;
    public $focus_9;
    public $focus_10;
    public $focus_11;

	public function rules()
	{
		return array(
            array('first_university_name, gender, SATMax, SATMin, SAT, first_university_id, race_id, state,
                profile_type, num_scores, num_scoresMin, num_scoresMax, num_extracurriculars,
                num_extracurricularsMin, num_extracurricularsMax, num_essays, verified, consultValue,
                avg_profile_rating, avg_profile_ratingMin, avg_profile_ratingMax,
                focus, focus_1, focus_2, focus_3, focus_4, focus_5, focus_6, focus_7, focus_8, focus_9, focus_10,                
                focus_11', 'safe'),
		);
	}
}
