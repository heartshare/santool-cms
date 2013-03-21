<?php

class MapsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionCctv(){
            $this->renderPartial('cctv');
        }
        
        public function actionHalte(){
            $this->renderPartial('halte');
        }
        
        public function actionJalurkereta(){
            $this->renderPartial('jalurkereta');
        }
        
        public function actionStasiunkereta(){
            $this->renderPartial('stasiunkereta');
        }
        
        public function actionParkir(){
            $this->renderPartial('parkir');
        }
        
        public function actionKonstruksi(){
            $this->renderPartial('konstruksi');
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