<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Meceve',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'wizardBehavior',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123459876512345',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		
                    ),
		
            
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                'authManager'=>array( 
                                'class'=>'CDbAuthManager', 
                                'connectionID'=>'db', ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=searcher_test2',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
                'request'=>array(
                                'enableCookieValidation'=>true,
                                'enableCsrfValidation'=>true,
                ),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
//                                    'levels'=>'trace',
					'levels'=>'trace, info, error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
                                        'levels'=>'trace,error,warning',
                                        'categories'=>'vardump',
                                        'showInFireBug'=>true,
                                    
				),
				
			),
		),
            
            
      
             'widgetFactory' => array(
            'widgets' => array(
                'CJuiAutoComplete' => array(
                    'themeUrl' => '/css/jqueryui',
                    'theme' => 'southstreet',
                ),
                'CJuiAccordion' => array(
                    'themeUrl' => '/css/jqueryui',
                    'theme' => 'southstreet',
                ),
                'CJuiTabs' => array(
                    'themeUrl' => '/css/jqueryui',
                    'theme' => 'southstreet',
                ),
                'CJuiSliderInput' => array(
                    'themeUrl' => '/css/jqueryui',
                    'theme' => 'southstreet',
                ),
                'CJuiDialog' => array(
                    'themeUrl' => '/css/jqueryui',
                    'theme' => 'southstreet',
                ),
            ),
        ),     
            
            
            
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'etchen@gmail.com',
	),
);