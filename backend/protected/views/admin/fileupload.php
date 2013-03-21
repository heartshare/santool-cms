<div id="file-uploader"></div>
 
<?php

//Yii::app()->clientScript->registerCoreScript('jquery');
//Yii::app()->clientScript->registerCoreScript('jquery.ui');
 
$filesPath = realpath(Yii::app()->basePath . "/../upload");
$filesUrl = Yii::app()->baseUrl . "/upload";
 
$this->widget("ext.ezzeelfinder.ElFinderWidget", array(
    'selector' => "div#file-uploader",
    'clientOptions' => array(
        'lang' => "LANG",
        'resizable' => TRUE,
        'wysiwyg' => "ckeditor"
    ),
    'connectorRoute' => "admin/fileUploaderConnector",
    'connectorOptions' => array(
        'roots' => array(
            array(
                'driver'  => "LocalFileSystem",
                'path' => $filesPath,
                'URL' => $filesUrl,
                'tmbPath' => $filesPath . DIRECTORY_SEPARATOR . ".thumbs",
                'mimeDetect' => "internal",
                'accessControl' => "access"
            )
        )
    )
));
 
?>