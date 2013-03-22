<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Santool Content Management System',
	//theme
	'theme'=>'hebo',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.components.database.*',
		'ext.widgets.portlet.XPortlet',
		'ext.helpers.XHtml',
		'ext.modules.help.models.*',
		'ext.modules.lookup.models.*',
		'application.modules.yiiseo.models.*',
	),

	'modules'=>array(
            
		'yiiseo'=>array(
				'class'=>'application.modules.yiiseo.YiiseoModule',
				'password'=>'111', // your default password is 111
			 ),
            
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				'bootstrap.gii'
			),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
            
	   'seo'=>array(
		'class' => 'application.modules.yiiseo.components.SeoExt',
		),
		
		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
			
		),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
		
                        'showScriptName'=>false,
                        
                        'urlSuffix'=>'.html',
                    
			'rules'=>array(
				// removes 'site' & 'index' from urls and add pretty urls to static pages
				//'contact'=>'site/contact',
				//'page/<view:\w+>'=>'site/page',
				'/'=>'site/index',
				'post/<id:\d+>/<title:.*?>'=>'post/view',
                                'post/id/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',

				'pengaduan/<id:\d+>/<title:.*?>'=>'pengaduan/view',
                                'pengaduan/id/<id:\d+>/<title:.*?>'=>'pengaduan/view',

				'agenda/<id:\d+>/<title:.*?>'=>'agenda/view',
                                'agenda/id/<id:\d+>/<title:.*?>'=>'agenda/view',


				
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				
				// add support for modules
				'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                    
			),
		),
		/*
		'db'=>array(
			//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
                        'class'=>'CDbConnection',
                                'connectionString' => 'mysql:host=localhost;port=3306;dbname=santool',
                                'emulatePrepare' => true,
                                'username' => 'root',
                                'password' => '123456',
                                'charset' => 'utf8',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);