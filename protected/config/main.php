<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Direktorat Keuangan Universitas Airlangga',
    
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

                //'ext.EGMAP.*',
                //'application.extensions.EAjaxUpload.*',
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
			'ipFilters'=>array('127.0.0.1','::1', '192.168.1.104', '192.168.1.100', '192.168.1.103', '210.57.215.198', '139.193.23.181', '210.57.215.206'),
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
            
                // UserCounter
                'counter' => array(
                    'class' => 'UserCounter',
                ),
                      
            
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
                 * */
		
		'urlManager'=>array(
			'urlFormat'=>'path',
		
                        'showScriptName'=>false,
                        
                        'urlSuffix'=>'.html',
                    
			'rules'=>array(
				// removes 'site' & 'index' from urls and add pretty urls to static pages
				//'contact'=>'site/contact',
                                //'agenda'=>'site/agenda',
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
                            
                                //RESTApi
                                'api/<controller:\w+>'=>array('<controller>/restList', 'verb'=>'GET'),
                                'api/<controller:\w+>/<id:\w+>'=>array('<controller>/restView', 'verb'=>'GET'),
                                'api/<controller:\w+>/<id:\w+>/<var:\w+>'=>array('<controller>/restView', 'verb'=>'GET'),
                                array('<controller>/restUpdate', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'PUT'),
                                array('<controller>/restDelete', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'DELETE'),
                                array('<controller>/restCreate', 'pattern'=>'api/<controller:\w+>', 'verb'=>'POST'),
                                array('<controller>/restCreate', 'pattern'=>'api/<controller:\w+>/<id:\w+>', 'verb'=>'POST'),
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
                                'connectionString' => 'mysql:host=localhost;port=3306;dbname=unair_ditkeu',
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