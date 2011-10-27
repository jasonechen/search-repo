<?php
session_start();
class SearchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2-search';

	public function actionIndex()
	{
        if(isset($_GET['search_q']))
        {
            $_SESSION['search_q'] = $_GET['search_q'];
        }
        if(isset($_POST['search_q']))
        {
            $_SESSION['search_q'] = $_POST['search_q'];
        }

        if(isset($_GET['pageSize']))
        {
            $_SESSION['pageSize'] = intval($_GET['pageSize']);
        }

        if(isset($_GET['viewStyle']) && $_GET['viewStyle'] == 0)
        {
            $_SESSION['viewStyle'] = 'thumbnail';
        }
        if(isset($_GET['viewStyle']) && $_GET['viewStyle'] == 1)
        {
            $_SESSION['viewStyle'] = 'grid';
        }
        
        $viewStyle = 'thumbnail';
        if(isset($_SESSION['viewStyle']))
        {
            $viewStyle = $_SESSION['viewStyle'];
        }

        if(isset($_SESSION['search_q']))
        {
            $profiles = ProfileSearch::factory($_SESSION['search_q']);
        }
        else
        {
            $profiles = ProfileSearch::factory('');
        }

        $dataProvider = $profiles->getDataProvider();
        $model = $profiles->getModel();
        $valid = false;

        if($profiles->isSearchQueryValid())
        {
            $valid = true;
        }

		$this->render('index', array(
                                 'viewStyle' => $viewStyle,
                                 'valid' => $valid,
                                 'dataProvider' => $dataProvider,
                                 'model' => $model,
                               ));
	}
}
