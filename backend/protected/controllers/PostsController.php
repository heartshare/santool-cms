<?php

class PostsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'delete', 'all', 'editable', 'categories', 'addcat', 'viewcat', 'updatecat'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
        public function actions()
        {
            return array(
                'fileUploaderConnector' => "ext.ezzeelfinder.ElFinderConnectorAction",
            );
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                //$this->redirect('http://dishub.ptdpa.com/post/id/'.$id);
                
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
                
	}
        
	public function actionViewcat($id)
	{
                //$this->redirect('http://dishub.ptdpa.com/post/id/'.$id);
                
		$this->render('view',array(
			'model'=>$this->loadCategories($id),
		));
                
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PostsMain;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PostsMain']))
		{
			$model->attributes=$_POST['PostsMain'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
                            $this->redirect(array('all'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddcat()
	{
		$model=new Terms;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Terms']))
		{
			$model->attributes=$_POST['Terms'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
                            $this->redirect(array('posts/categories'));
		}

		$this->render('addcat',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PostsMain']))
		{
			$model->attributes=$_POST['PostsMain'];
			if($model->save())
				$this->redirect(array('all'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        
	public function actionUpdatecat($id)
	{
		$model=$this->loadCategories($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Terms']))
		{
			$model->attributes=$_POST['Terms'];
			if($model->save())
				$this->redirect(array('categories'));
		}

		$this->render('updatecat',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
        
        public function actionEditable()
        {
            Yii::import('ext.editable.EditableSaver'); //or you can add import 'ext.editable.*' to config
            $es = new EditableSaver('PostsMain');  // 'User' is classname of model to be updated
            $es->onBeforeUpdate = function($event) {
                $event->sender->setAttribute('date_modified', date('Y-m-d'));
            };
            $es->update();
        }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PostsMain');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        public function actionCategories(){
		$model=new Terms('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Terms']))
			$model->attributes=$_GET['Terms'];

		$this->render('categories',array(
			'model'=>$model,
		));
        }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PostsMain('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PostsMain']))
			$model->attributes=$_GET['PostsMain'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionAll(){
            
		$model=new PostsMain('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PostsMain']))
			$model->attributes=$_GET['PostsMain'];

		$this->render('all',array(
			'model'=>$model,
		));
            
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PostsMain::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
	public function loadCategories($id)
	{
		$model=Terms::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='posts-main-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
