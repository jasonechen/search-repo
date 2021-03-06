<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public $filterModel;
    public $test;

    public function init()
    {
        $this->filterModel = new FilterForm();
        if(isset($_GET['FilterForm']))
        {
            $this->filterModel->setAttributes($_GET['FilterForm']);
        }
        if(!isset($_GET['FilterForm']['SATMin']) && !isset($_GET['FilterForm']['SATMax']))
        {
            $this->filterModel->SATMin = 0;
            $this->filterModel->SATMax = 2400;
        }
        if(!isset($_GET['FilterForm']['num_scoresMin']) && !isset($_GET['FilterForm']['num_scoresMax']))
        {
            $this->filterModel->num_scoresMin = 0;
            $this->filterModel->num_scoresMax = 50;
        }
        if(!isset($_GET['FilterForm']['num_extracurricularsMin']) && !isset($_GET['FilterForm']['num_extracurricularsMax']))
        {
            $this->filterModel->num_extracurricularsMin = 0;
            $this->filterModel->num_extracurricularsMax = 50;
        }
        if(!isset($_GET['FilterForm']['averageRatingMin']) && !isset($_GET['FilterForm']['averageRatingMax']))
        {
            $this->filterModel->averageRatingMin = 1;
            $this->filterModel->averageRatingMax = 5;
        }
    }
}