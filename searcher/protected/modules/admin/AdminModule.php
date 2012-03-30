<?php
/**
 * Yii-admin module
 * 
 * @author Mikhail Mangushev <mishamx@gmail.com> 
 * @link http://yii-admin.googlecode.com/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @version $Id: adminModule.php 105 2011-02-16 13:05:56Z mishamx $
 */

class AdminModule extends CWebModule
{
        /**
         * @var int
         * @desc items on page
         */
        public $admin_page_size = 10;
        
        /**
         * @var int
         * @desc items on page
         */
        public $fields_page_size = 10;
        
        /**
         * @var string
         * @desc hash method (md5,sha1 or algo hash function http://www.php.net/manual/en/function.hash.php)
         */
        public $hash='md5';
        
        /**
         * @var boolean
         * @desc use email for activation admin account
         */
        public $sendActivationMail=true;
        
        /**
         * @var boolean
         * @desc allow auth for is not active admin
         */
        public $loginNotActiv=false;
        
        /**
         * @var boolean
         * @desc activate admin on registration (only $sendActivationMail = false)
         */
        public $activeAfterRegister=false;
        
        /**
         * @var boolean
         * @desc login after registration (need loginNotActiv or activeAfterRegister = true)
         */
        public $autoLogin=true;
        
        public $registrationUrl = array("/admin/registration");
        public $recoveryUrl = array("/admin/recovery/recovery");
        public $loginUrl = array("/admin/login");
        public $logoutUrl = array("/admin/logout");
        public $profileUrl = array("/manageThinDish");
        public $adminProfileUrl = array("/restaurant");
        public $returnUrl = array("/site/index");
        public $returnLogoutUrl = array("/admin/login");
        
        public $fieldsMessage = '';
        
        /**
         * @var array
         * @desc admin model relation from other models
         * @see http://www.yiiframework.com/doc/guide/database.arr
         */
        public $relations = array();
        
        /**
         * @var array
         * @desc Profile model relation from other models
         */
        public $profileRelations = array();
        
        /**
         * @var boolean
         */
        public $captcha = array('registration'=>true);
        
        /**
         * @var boolean
         */
        //public $cacheEnable = false;
        
        public $tableAdmins = '{{admin}}';
        public $tableProfiles = '{{profile}}';
        public $tableProfileFields = '{{profile_field}}';
        
        static private $_admin;
        //static private $_admin;
        static private $_admins;
        
        /**
         * @var array
         * @desc Behaviors for models
         */
        public $componentBehaviors=array();
        
        public function init()
        {
                // this method is called when the module is being created
                // you may place code here to customize the module or the application

                // import the module-level models and components
                $this->setImport(array(
                        'admin.models.*',
                        'admin.components.*',
                ));

                // re-use application layouts
                $this->setLayoutPath(Yii::app()->getLayoutPath());
        }
        
        public function getBehaviorsFor($componentName){
        if (isset($this->componentBehaviors[$componentName])) {
            return $this->componentBehaviors[$componentName];
        } else {
            return array();
        }
        }

        public function beforeControllerAction($controller, $action)
        {
                if(parent::beforeControllerAction($controller, $action))
                {
                        // this method is called before any module controller action is performed
                        // you may place customized code here
                        return true;
                }
                else
                        return false;
        }
        
        /**
         * @param $str
         * @param $params
         * @param $dic
         * @return string
         */
        public static function t($str='',$params=array(),$dic='admin') {
                return Yii::t("AdminModule.".$dic, $str, $params);
        }
        
        /**
         * @return hash string.
         */
        public static function encrypting($string="") {
                $hash = Yii::app()->getModule('admin')->hash;
                if ($hash=="md5")
                        return md5($string);
                if ($hash=="sha1")
                        return sha1($string);
                else
                        return hash($hash,$string);
        }
        
        /**
         * @param $place
         * @return boolean 
         */
        public static function doCaptcha($place = '') {
                if(!extension_loaded('gd'))
                        return false;
                if (in_array($place, Yii::app()->getModule('admin')->captcha))
                        return Yii::app()->getModule('admin')->captcha[$place];
                return false;
        }
        
        /**
         * Return admin status.
         * @return boolean
         */
        public static function isAdmin() {
                return(Yii::app()->admin->checkAccess('admin'));
        }

        /**
         * Return admins.
         * @return array syperadmins names
         */     
        public static function getAdmins() {
                if (!self::$_admins) {
                        $admins = Admin::model()->active()->admin()->findAll();
                        $return_name = array();
                        foreach ($admins as $admin)
                                array_push($return_name,$admin->adminname);
                        self::$_admins = $return_name;
                }
                return self::$_admins;
        }
        
        /**
         * Send mail method
         */
        public static function sendMail($email,$subject,$message) {
            $adminEmail = Yii::app()->params['kPartnersEmail'];
            $headers = "MIME-Version: 1.0" . PHP_EOL . 
             "From: $adminEmail" . PHP_EOL . 
             "Reply-To: $adminEmail" . PHP_EOL . 
             "Content-Type: text/plain; charset=utf-8";
            $message = wordwrap($message, 70, PHP_EOL);
            $message = str_replace(PHP_EOL.".", PHP_EOL."..", $message);
            return mail($email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
        }
        
        /**
         * Return safe admin data.
         * @param admin id not required
         * @return admin object or false
         */
        public static function admin($id=0) {
                if ($id) 
                {
                   return Admin::model()->active()->findbyPk($id);
                }
                else
                {
                        if(Yii::app()->admin->isGuest)
                        {
                           return false;
                        }
                        else
                        {
                           if (!self::$_admin)
                           {
                              // don't filter by active, since changing adminname deactivates current admin
                              self::$_admin = Admin::model()->findbyPk(Yii::app()->admin->id);
                              //self::$_admin = Admin::model()->active()->findbyPk(Yii::app()->Admin->id);
                           }
                           if (!self::$_admin) // if we still can't get a Admin model, bail
                           {
                              throw new Exception("Failed to access singleton Admin model");
                           }
                           return self::$_admin;
                        }
                }
        }
        
        /**
         * Return safe admin data.
         * @param admin id not required
         * @return admin object or false
         */
        public function admins() {
                return Admin;
        }
}

