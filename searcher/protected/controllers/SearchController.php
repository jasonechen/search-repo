<?php
session_start();
class SearchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout = '//layouts/column2-search';

    private $pageSize;
    private $viewStyle;
    private $sortBy;

    /**
     * @var ProfileSearch $profiles
     */

    private $profiles;
    private $dataProvider;
    private $model;
    private $valid = false;

    private $searchCriteriaText = '&nbsp;';

	public function actionIndex()
	{
        $this->setBackUrl();
        $this->filterSearchQuery();

        $this->setPageSize();
        $this->setViewStyle();
        $this->setSortBy();

        $this->initProfileSearch();
        $this->setSearchCriteriaText();

		$this->render('index',
            array(
                 'viewStyle' => $this->viewStyle,
                 'pageSize' => $this->pageSize,
                 'sortBy' => $this->sortBy,
                 'pageSizeUrl' => 'http://' . $_SERVER['HTTP_HOST'] . preg_replace('/&pageSize=\d\d/', '', $_SERVER['REQUEST_URI']) . '&pageSize=',
                 'viewStyleUrl' => 'http://' . $_SERVER['HTTP_HOST'] . preg_replace('/&viewStyle=\d/', '', $_SERVER['REQUEST_URI']). '&viewStyle=',
                 'sortByUrl' => 'http://' . $_SERVER['HTTP_HOST'] . preg_replace('/&sortBy=\d/', '', $_SERVER['REQUEST_URI']). '&sortBy=',
                 'valid' => $this->valid,
                 'dataProvider' => $this->dataProvider,
                 'model' => $this->model,
                 'searchCriteriaText' => $this->searchCriteriaText,
            )
        );
	}

    /**
     * Method for initialization of variables sent to view
     */

    private function initProfileSearch()
    {
        if(isset($_SESSION['search_first_university_id']))
        {
            if($_SESSION['search_first_university_id'] > 0)
            {
                $this->profiles = ProfileSearch::factory($_SESSION['search_first_university_id']);
            }
            elseif(empty($_SESSION['search_first_university_name']))
            {
                $this->profiles = ProfileSearch::factory('all');
            }
            else
            {
                $this->profiles = ProfileSearch::factory('');
            }
        }
        else
        {
            $this->profiles = ProfileSearch::factory('');
        }

        $this->dataProvider = $this->profiles->getDataProvider();
        $this->model = $this->profiles->getModel();

        if($this->profiles->isSearchQueryValid())
        {
            $this->valid = true;
        }
    }

    /**
     * Filters incoming search query
     */

    private function filterSearchQuery()
    {
        if(isset($_GET['search_first_university_id']))
        {
            $_SESSION['search_first_university_id'] = AbstractProfileSearch::filterIncomingSearchQuery($_GET['search_first_university_id']);
        }

        if(isset($_POST['search_first_university_id']))
        {
            $_SESSION['search_first_university_id'] = AbstractProfileSearch::filterIncomingSearchQuery($_POST['search_first_university_id']);
        }

        if(isset($_GET['search_first_university_name']))
        {
            $_SESSION['search_first_university_name'] = AbstractProfileSearch::filterIncomingSearchQuery($_GET['search_first_university_name']);
        }

        if(isset($_POST['search_first_university_name']))
        {
            $_SESSION['search_first_university_name'] = AbstractProfileSearch::filterIncomingSearchQuery($_POST['search_first_university_name']);
        }
    }

    /**
     * Setting of 'Back to search results' URL
     */

    private function setBackUrl()
    {
        $uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $_SESSION['search_uri'] = $uri;
    }

    /**
     * Setting selected items per page
     */

    private function setPageSize()
    {
        $this->pageSize = 12;

        if(isset($_GET['pageSize']))
        {
            $this->pageSize = intval($_GET['pageSize']);
        }
        else
        {
            if(isset($_SESSION['pageSize']))
            {
                $this->pageSize = $_SESSION['pageSize'];
            }
        }

        $_SESSION['pageSize'] = $this->pageSize;
    }

    /**
     * Setting selected sort by option
     */

    private function setSortBy()
    {
        $this->sortBy = 0;

        if(isset($_GET['sortBy']))
        {
            $this->sortBy = intval($_GET['sortBy']);
        }
        else
        {
            if(isset($_SESSION['sortBy']))
            {
                $this->sortBy = $_SESSION['sortBy'];
            }
        }

        $_SESSION['sortBy'] = $this->sortBy;
    }

    /**
     * Setting selected view style of items (grid or thumbnail)
     */

    private function setViewStyle()
    {
        if(isset($_GET['viewStyle']) && $_GET['viewStyle'] == 0)
        {
            $_SESSION['viewStyle'] = 'thumbnail';
        }

        if(isset($_GET['viewStyle']) && $_GET['viewStyle'] == 1)
        {
            $_SESSION['viewStyle'] = 'grid';
        }

        $this->viewStyle = 'thumbnail';

        if(isset($_SESSION['viewStyle']))
        {
            $this->viewStyle = $_SESSION['viewStyle'];
        }
    }

    /**
     * Setting of Search Criteria string
     */

    private function setSearchCriteriaText()
    {
        $criteriaText = '';

        /**
         * Gender filtering if defined
         * We have array from $_SESSION and we un-pack it
         */

        if(!empty($_SESSION['FilterForm']['gender']))
        {
            if(array_search('M', $_SESSION['FilterForm']['gender']) !== FALSE)
            {
                $criteriaText .= ' AND Male ';
            }

            if(array_search('F', $_SESSION['FilterForm']['gender']) !== FALSE)
            {
                $criteriaText .= ' AND Female ';
            }
        }

        /**
         * Filter by state if defined
         */

        if(!empty($_SESSION['FilterForm']['states.id']))
        {
            $criteriaText .= ' AND ' . States::model()->findByPk($_SESSION['FilterForm']['states.id'])->name . ' ';
        }

        /**
         * Filter by Profile Type if defined
         */

        if(!empty($_SESSION['FilterForm']['profile_type']))
        {
            $criteriaText .= ' AND ' . BasicProfile::$ProfileTypeArray[$_SESSION['FilterForm']['profile_type']] . ' ';
        }

        /**
         * Filter by Race if defined
         */

        if(!empty($_SESSION['FilterForm']['race_id']))
        {
            $criteriaText .= ' AND ' . RaceType::model()->findByPk($_SESSION['FilterForm']['race_id'])->name . ' ';
        }

        /**
         * Filter By SAT I Combined Score of defined
         * We filter it if the max Score value is less than 2400 (5 key from array)
         */

        if(!empty($_SESSION['FilterForm']['SATMax']) && $_SESSION['FilterForm']['SATMax'] <= 4)
        {
            $min = BasicProfile::$SATRanges[$_SESSION['FilterForm']['SATMin']];
            $max = BasicProfile::$SATRanges[$_SESSION['FilterForm']['SATMax']];

            $criteriaText .= ' AND ' . $min . '-' . $max . ' SAT I Combined Score ';
        }

        /**
         * If we haven't defined university then cut off extra 'AND' from result string
         */

        if(empty($_SESSION['search_first_university_name']))
        {
            $criteriaText = substr($criteriaText, 4);
        }

        /*
         * If we still have no text then simply define this text as 'None'
         */

        if(empty($criteriaText) && empty($_SESSION['search_first_university_name']))
        {
            $criteriaText = 'None';
        }

        /**
         * Actual criteria text defining
         */

        $this->searchCriteriaText = 'SEARCH CRITERIA: ' . $_SESSION['search_first_university_name'] . $criteriaText;
    }
}
