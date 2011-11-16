<?php
/**
 * Class for displaying star rating widget for user's profiles
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

Yii::import('application.components.widgets.StarRatingClass');

class StarRatingWidget extends CWidget
{
    /**
     * @var int $user_id - id of user that we use to build widget for
     * @var boolean $enableComments - either to enable commenting for instance of widget or not
     * @var string $enableCommentsId - if comments enabled use this as comment input field
     * @var boolean $isDisabled - either instance if widget is disabled or not
     * @var string $enableCommentsSubmitId - if comments enabled use this as comment submit button
     * @var string $phpPath - path to php script for commenting (usually controller)
     * @var int $forUser - user id for what commenting is done
     * @var int $byUser - user id by what commenting is done
     * @var boolean $smallStars - whether we are using small stars for widget or not
     * @var string $cssClassName - class name for widget, needed in some cases
     *
     */

    public $user_id;
    public $enableComments = true;
    public $enableCommentsId = '#rating-comment';
    public $isDisabled;
    public $enableCommentsSubmitId = '#rating-submit';
    public $phpPath;
    public $forUser;
    public $byUser;
    public $smallStars = false;
    public $cssClassName = 'jRating';
    protected $_starRatingObject;
    protected $_data;

    /**
     * Initialization of widget for star rating of profile
     * @return void
     */

    public function init()
    {
        $this->_starRatingObject = new StarRatingClass($this->user_id);
        $this->_data = array();
        $this->_data['averageRating'] = round($this->_starRatingObject->getAverageRating(), 2);
        $this->_data['ratingObject'] = $this->_starRatingObject->getRatingObject();
        if(!isset($this->isDisabled))
        {
            //$this->isDisabled = $this->_starRatingObject->doesCookieExist();
            $this->isDisabled = $this->_starRatingObject->doesDatabaseRecordExists();
        }
        if(empty($this->phpPath))
        {
            $this->phpPath = Yii::app()->controller->createUrl('rating/index');
        }
        $this->byUser = Yii::app()->user->id;
        $this->forUser = $this->user_id;

        parent::init();
    }

    /**
	 * Renders the view
	 * This is the main entry of the whole view rendering
	 */

    public function run()
    {
        $this->registerClientScript();

        $this->render('star-rating/widget',
                      array(
                          'user_id' => $this->user_id,
                          'data' => $this->_data,
                          'enableComments' => $this->enableComments,
                          'enableCommentsId' => $this->enableCommentsId,
                          'enableCommentsSubmitId' => $this->enableCommentsSubmitId,
                          'isDisabled' => $this->isDisabled,
                          'phpPath' => $this->phpPath,
                          'forUser' => $this->forUser,
                          'byUser' => $this->byUser,
                          'smallStars' => $this->smallStars,
                          'cssClassName' => $this->cssClassName,
                      )
        );
    }

    /**
	 * Registers necessary client scripts
	 * This method is invoked by {@link run}
	 * Child classes may override this method to register customized client scripts
	 */
    
	public function registerClientScript()
	{
        $assets = dirname(__FILE__) . '/views/star-rating/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
        if(is_dir($assets))
        {
			Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerCssFile($baseUrl . '/jquery/jRating.jquery.css');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery/jRating.jquery.js', CClientScript::POS_HEAD);
            $this->_data['bigStarsPath'] = $baseUrl . '/jquery/icons/stars.png';
            $this->_data['smallStarsPath'] = $baseUrl . '/jquery/icons/small.png';
		}
        else if(!is_dir($assets))
        {
			throw new Exception('Star Rating Widget - Error: Couldn\'t find assets to publish.');
		}
	}
}