<?php

class AgendaController extends Controller
{

    public $pageTitle = '';
    public $pageDesc = '';
    public $pageRobotsIndex = true;

    public $pageOgTitle = '';
    public $pageOgDesc = '';
    public $pageOgImage = '';
        public $layout='//layouts/column3';
        
	public function actionIndex()
	{
		$this->render('index', array('model'=>  Posts::model()->findAll(array('condition'=>'terms_id=5'))));
	}
        
        public function actionView($id){
            $this->render('view', array('model'=>$this->loadModel($id)));
        }
        
        public function loadModel($id)
        {
                $model = Posts::model()->findByPk($id);
                if($model===null)
                        throw new CHttpException(404,'The requested page does not exist.');
                return $model;
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