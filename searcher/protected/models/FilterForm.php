<?php

/**
 * FilterForm class
 */
class FilterForm extends CFormModel
{
	public $educationMax;
    public $educationMin;
    public $race_id;
    public $gender;
    public $date_of_birthMin;
    public $date_of_birthMax;
    public $hasPets;
    public $hasChildren;
    public $city;

	public function rules()
	{
		return array(
            array('educationMin, educationMax, race_id, gender, date_of_birthMin, date_of_birthMax, hasPets, hasChildren, city', 'safe'),
		);
	}
}
