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
        if(!isset($_GET['FilterForm']['educationMin']) && !isset($_GET['FilterForm']['educationMax']))
        {
            $this->filterModel->educationMin = 0;
            $this->filterModel->educationMax = 3;
        }
        if(!isset($_GET['FilterForm']['date_of_birthMin']) && !isset($_GET['FilterForm']['date_of_birthMax']))
        {
            $this->filterModel->date_of_birthMin = 0;
            $this->filterModel->date_of_birthMax = 7;
        }
    }
}