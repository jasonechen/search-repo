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
    public $avg_profile_rating;
    public $avg_profile_ratingMin;
    public $avg_profile_ratingMax;

	public function rules()
	{
		return array(
            array('first_university_name, gender, SATMax, SATMin, SAT, first_university_id, race_id, state
                profile_type, num_scores, num_scoresMin, num_scoresMax, num_extracurriculars,
                num_extracurricularsMin, num_extracurricularsMax, num_essays, verified,
                avg_profile_rating, avg_profile_ratingMin, avg_profile_ratingMax', 'safe'),
		);
	}
}
