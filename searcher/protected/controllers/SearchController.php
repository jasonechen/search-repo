<?php
session_start();
class SearchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout = '//layouts/column2-search';

    private $viewStyle;
    private $profiles;
    private $dataProvider;
    private $model;
    private $valid = false;

	public function actionIndex()
	{
        $this->setBackUrl();
        $this->filterSearchQuery();

        $this->setPageSize();
        $this->setViewStyle();

        $this->initProfileSearch();

		$this->render('index',
            array(
                 'viewStyle' => $this->viewStyle,
                 'valid' => $this->valid,
                 'dataProvider' => $this->dataProvider,
                 'model' => $this->model,
            )
        );
	}

    /**
     * Method for initialization of variables sent to view
     */

    private function initProfileSearch()
    {
        if(isset($_SESSION['search_q']))
        {
            $this->profiles = ProfileSearch::factory($_SESSION['search_q']);
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
        if(isset($_GET['search_q']))
        {
            $_SESSION['search_q'] = AbstractProfileSearch::filterIncomingSearchQuery($_GET['search_q']);
        }

        if(isset($_POST['search_q']))
        {
            $_SESSION['search_q'] = AbstractProfileSearch::filterIncomingSearchQuery($_POST['search_q']);
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
        if(isset($_GET['pageSize']))
        {
            $_SESSION['pageSize'] = intval($_GET['pageSize']);
        }
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
}
