<?php
/**
 * Controller for AJAX profile rating
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */


class RatingController extends Controller
{
    /**
     * @var array for response that we are going to show user
     */

    private $_response = array();
    
	/**
	 * Index action of controller
	 */

	public function actionIndex()
	{
        if(Yii::app()->request->isAjaxRequest)
        {
            if(empty($_POST['forUser']) || empty($_POST['byUser']))
            {
                $this->_endApp('Missing users id', true);
            }
            elseif(empty($_POST['rate']))
            {
                $this->_endApp('No rating provided', true);
            }
            elseif(isset($_POST['action']) && $_POST['action'] == 'rating')
            {
                $this->_insertRating();
                $this->_setCookieAfterVote();
                $this->_endApp('Rating submitted');
            }
        }
	}

    /**
     * Inserts new rating value to database
     * @return void
     */

    private function _insertRating()
    {
        $rating = new Rating();
        $rating->user_id = intval($_POST['forUser']);
        $rating->rating = intval($_POST['rate']);
        $rating->comment = strip_tags($_POST['comment']);
        $rating->create_user_id = strip_tags($_POST['byUser']);
        $rating->create_time = new CDbExpression('NOW()');
        $rating->save(false);
    }

    /**
     * Setting the message and ending application
     * @param string $message - what we are going to encode into json
     * @param boolean $error - whether to show there is error or not
     * @return void
     */

    private function _endApp($message, $error = false)
    {
        if($error)
        {
            $this->_response['error'] = true;
        }
        $this->_response['message'] = $message;
        echo json_encode($this->_response);
        Yii::app()->end();
    }

    /**
     * Here we set cookie indicating that user already voted
     * @return void
     */

    private function _setCookieAfterVote()
    {
        $cookie = new CHttpCookie('already_voted', intval($_POST['forUser']));
        $cookie->expire = time() + 31104000; // year of expiration
        Yii::app()->request->cookies['already_voted'] = $cookie;
    }
}