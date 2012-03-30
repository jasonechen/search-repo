<?php

class IndexController extends UIDashboardController
{
   //$this->layout = 'column2';
   public $layout='//layouts/admin_column2';

   /**
    * Displays a particular model.
    */
	
    public function init()
    {
        parent::init();
        $Criteria = new CDbCriteria();
        $Criteria->limit=10;
        //$Criteria->select= "COUNT(t.coupon_id) as cnt";
        $Criteria->group='coupon_id';
        $Criteria->order='id desc';
        $model = new ReportsModel();
        
         //Get Last 10 Transations   
         $Lastorder = OrderPayment::model()->findAll($Criteria); 
         //Get Top Sale Coupons
         $Couponorder= $model->getTopSaleCoupons();
         
       
        $this->setTableParams('tbl_user', 'id', 'email');
	
        // set array of portlets
        $this->setPortlets(
                    array(
					
                    array('id' => 1, 'title' => 'Latest Orders', 'renderPage'=>true,'content' => '/dashboard/_toporder',
                    'data'=>array('data'=>$Lastorder)),
                    array('id' => 2, 'title' => 'Sales Summary', 'renderPage'=>true,'content' => '/dashboard/_sales_summary',
                    'data'=>array('data'=>$Lastorder)),
                  
                    array('id' => 3, 'title' => 'Top sale Coupons', 'renderPage'=>true,'content' => '/dashboard/_coupons',
                        'data'=>array('data'=>$Couponorder)),
                         array('id' => 4, 'title' => 'User Summary ', 'renderPage'=>true,'content' => '/dashboard/_user_summary',
                    'data'=>array('data'=>$Lastorder)),
                   
                    //array('id' => 6, 'title' => 'Reference', 'content' => $this->renderPartial('viewName', null, true)),
                )
        );

        //set content BEFORE dashboard
        $this->setContentBefore(
                //Pay attension: ExtController looking view in current dir!!!
                //$this->renderPartial('/../views/dash/before', null, true)
                );

        //set content AFTER dashboard
       

        // uncomment the following to apply jQuery UI theme
        // from protected/components/assets/themes folder
        $this->applyTheme('le-frog');

        // uncomment the following to change columns count
        //$this->setColumns(4);

        // uncomment the following to enable autosave
        $this->setAutosave(true);

        // uncomment the following to disable dashboard header
        //$this->setShowHeaders(false);

        // uncomment the following to enable context menu and add needed items
        /*
        $this->menu = array(
            array('label' => 'Index', 'url' => array('index')),
        );
        */
    }
        
        /**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
            //echo "test";exit();  
                Yii::app()->user->setState('TransType',0);
		Yii::app()->user->logout();
                Yii::app()->user->setState('TransType',0);
		$this->redirect('?r=administrator/');
	}
	
	
	
        
       
      
   
}
