<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii118/framework/yii.php';
$config=dirname(__FILE__).'/../searcher/protected/config/main.php';

function fb($what){
  echo Yii::trace(CVarDumper::dumpAsString($what),'vardump');
}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

echo 'test';
require_once($yii);
Yii::createWebApplication($config)->run();
