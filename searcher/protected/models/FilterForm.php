<?php

/**
 * FilterForm class
 */
class FilterForm extends CFormModel
{
    public $first_university_name;
    public $SATMax;
    public $SATMin;
    public $first_university_id;
    public $race_id;
    public $gender;



	public function rules()
	{
		return array(
            array('first_university_name, gender, SATMax, SATMin, first_university_id, race_id', 'safe'),
		);
	}
}
