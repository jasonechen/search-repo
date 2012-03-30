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
        $site = new SiteBlock();
        $chk= $site->checkAllowedIP();
        if($chk)
        {
            // throw new CHttpException(400,'Invalid IPrequest. Please do not repeat this request again.');
            $this->defaultAction='Blockedip';
        }
        $this->filterModel = new FilterForm();
        $this->searchConsistency();

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
        if(!isset($_GET['FilterForm']['avg_profile_ratingMin']) && !isset($_GET['FilterForm']['avg_profile_ratingMax']))
        {
            $this->filterModel->avg_profile_ratingMin = 0;
            $this->filterModel->avg_profile_ratingMax = 5;
        }
    }

   /**
    * Here we coordinate left filter bar conditions and main bar conditions
    * We use sessions and $_GET['FilterForm'] variables
    */

    private function searchConsistency()
    {
        if(isset($_GET['FilterForm']))
        {
            $_SESSION['FilterForm'] = $_GET['FilterForm'];
        }

        if(!empty($_SESSION['FilterForm']) && !isset($_GET['FilterForm']))
        {
            $_GET['FilterForm'] = $_SESSION['FilterForm'];
        }
    }

    /**
     * Method for clearing of search persistance
     * Eg., we don't want to show previously typed in value on home page
     * @static
     *
     */

    public static function clearSearchPersistance()
    {
        $_SESSION['search_first_university_name'] = '';
        $_SESSION['search_first_university_id'] = 0;
        $_GET['FilterForm'] = array();
        $_SESSION['FilterForm'] = array();
    }
    
	protected function setAdminMenu()
        {
            $myTransType = Yii::app()->user->getState('TransType');

            if ($myTransType === 'B'){
    
		        	$this->menu=array(
			        	array('label'=>'Account ', 'url'=>'#',
			        		'items'=> array(
			        			array('label'=>'Summary', 'url'=>array('user/BuyerAccountSum')),
			        			array('label'=>'Credit Balance', 'url'=>array('user/Credits')),	
                                                        array('label'=>'Order History', 'url'=>array('user/PurchasedDetails')),                                                    
			        		),
			        		'itemOptions'=> array('class'=>'menu')
			        	),
			        	array('label'=>'Profiles', 'url'=>'#',
			        		'items'=> array(
			        			array('label'=>'Purchased Profiles', 'url'=>array('profile/browseMine')),
			        		),
			        		'itemOptions'=> array('class'=>'menu')
			        	),
			        	array('label'=>'Other', 'url'=>'#',
			        		'items'=> array(
			        			array('label'=>'Preferences', 'url'=>array('user/Settings')),		
                                                        array('label'=>'Help', 'url'=>array('user/Help')),		
			        		),
			        		'itemOptions'=> array('class'=>'menu')
			        	)   
		            );
            }
       	 	else if ($myTransType === 'S'){ 
         		$this->menu=array(
	         		array('label' =>'Account', 'url'=>'#', 
	         			'items'=> array(
	                		array('label'=>'Summary', 'url'=>array('user/indexSeller')),
	                		array('label'=>'Earnings', 'url'=>array('user/Earnings')),
	                		array('label'=>'Referrals', 'url'=>array('refer/index')),	
	                		array('label'=>'Consulting', 'url'=>array('user/Consult')),
	                	),
	                	'itemOptions'=> array('class'=>'menu')
	                ),         
	                array('label'=>'Profile', 'url'=>'#',
	                	'items'=> array(
	                		array('label'=>'Edit My Profile', 'url'=>array('user/Profile')),                
	                		array('label'=>'Profile Verification', 'url'=>array('user/Validate')),		
	                	),
	                	'itemOptions'=> array('class'=>'menu') 
	                ),
	                 array('label'=>'Other', 'url'=>'#',
	                	'items'=> array(                
	                		array('label'=>'Preferences', 'url'=>array('user/Settings')),
                                        array('label'=>'Help', 'url'=>array('user/Help')),		                                    
	                	),
	                	'itemOptions'=> array('class'=>'menu')
	                )
            	);
            }
         	else{
         	}
        }

	protected function setSiteMenu()
        {                
                $this->menu=array(
	                 array('label'=>'Applicants', 'url'=>array('site/page', 'view'=>'learn_more_applicants'),
	                	'items'=> array(                
	                		array('label'=>'Learn More', 'url'=>array('site/page', 'view'=>'learn_more_applicants')),
                                        array('label'=>'How It Works', 'url'=>array('site/page', 'view'=>'howworks_applicants')),
                                        array('label'=>'Vs. Competition', 'url'=>array('site/page', 'view'=>'vs_competition')),                                    
                                        array('label'=>'Sign Up', 'url'=>array('user/create')),                                                                        
                                    ),
                             'itemOptions'=> array('class'=>'menu')
                             ),
	                 array('label'=>'Contributors', 'url'=>array('site/page', 'view'=>'learn_more_contributors'),
	                	'items'=> array(                	                		
                                        array('label'=>'Learn More', 'url'=>array('site/page', 'view'=>'learn_more_contributors')),
                                        array('label'=>'How It Works', 'url'=>array('site/page', 'view'=>'howworks_contributors')),
                                        array('label'=>'Earnings', 'url'=>array('site/page', 'view'=>'contributor_earnings')),
                                        array('label'=>'Sign Up', 'url'=>array('user/createStudent')),                                    
                                    ),
                             'itemOptions'=> array('class'=>'menu')
                             ),                    
                    
                        array('label'=>'About Us', 'url'=>array('site/page', 'view'=>'about'),
                            'itemOptions'=> array('class'=>'menu')
                            ),
                        array('label'=>'FAQ', 'url'=>array('site/page', 'view'=>'FAQ'),
                            'itemOptions'=> array('class'=>'menu')
                            ),
	                 array('label'=>'Legal', 'url'=>'#',
	                	'items'=> array(                
	                		array('label'=>'Privacy Policy', 'url'=>array('site/page', 'view'=>'privacy_policy')),
                                        array('label'=>'Terms & Conditions', 'url'=>array('site/page', 'view'=>'terms_conditions')),
	                	),
	                	'itemOptions'=> array('class'=>'menu')
                                ),
                        array('label'=>'Contact Us', 'url'=>array('site/contact'),
                            'itemOptions'=> array('class'=>'menu')
                            ),                             
                    );
        }        
        
        
        public function actionBlockedip()
        {
            $this->layout='column2';
            $msg = 'This '.$_SERVER['REMOTE_ADDR'].' IP is Now not allow ';
            //If User Login
            $uLogHistry = new UserLogHistory();
            $myID = Yii::app()->user->id;
            if($myID){
            $uLogHistry->afterLogout($myID);
            Yii::app()->user->logout();
            }
            //End Checking
            $this->renderText($msg, false);
        }
}