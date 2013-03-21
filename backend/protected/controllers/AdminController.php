<?php

class AdminController extends Controller
{
    
    public function actions()
    {
        return array(
            'fileUploaderConnector' => "ext.ezzeelfinder.ElFinderConnectorAction",
        );
    }

	public function actionIndex()
	{
		$this->render('index', array('model'=>Posts::model()->findByPk(22032009)));
	}
    
    public function actionFileupload()
    {
        $this->render('fileupload');
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}