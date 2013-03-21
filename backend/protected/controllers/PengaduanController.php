<?php

class PengaduanController extends Controller
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
                        /*
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
                         * 
                         */
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin', 'index', 'view', 'create','update', 'editable', 'delete', 'all', 'pending', 'approved', 'reply'),
				'users'=>array('@'),
			),
                        /*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
                         * 
                         */
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$comment=new CArrayDataProvider(PostsMain::model()->getComment($id));
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'comment'=>$comment
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
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}
        
		/**
		 * Reply a new model.
		 * If creation is successful, the browser will be redirected to the 'view' page.
		 */
		public function actionReply($id)
		{
			$model=new PostsMain;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['PostsMain']))
			{
				$model->attributes=$_POST['PostsMain'];
				if($model->save())
					$this->redirect(array('pengaduan/view/','id'=>$id));
			}

			$this->render('reply',array(
				'model'=>$model,
				'id'=>$id
			));
		}
		
		
        public function actionAll(){
            
			$gridDataProvider = new CArrayDataProvider(PostsMain::model()->getAllPengaduan());
			$gridColumns = array(
				array('name'=>'label', 'header'=>'Title'),
				array('name'=>'content', 'header'=>'Content'),
				
				array(
					'htmlOptions' => array('nowrap'=>'nowrap'),
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template' => '{view}{delete}',
					'viewButtonUrl'=>'Yii::app()->createUrl("/pengaduan/view/", array("id"=>$data["id"]))',
					'updateButtonUrl'=>'Yii::app()->createUrl("/pengaduan/view/", array("id"=>$data["id"]))',
					'deleteButtonUrl'=>'Yii::app()->createUrl("/pengaduan/delete/", array("id"=>$data["id"]))',
				)
			);

			$this->render('all',array(
				'gridDataProvider'=>$gridDataProvider, 'gridColumns'=>$gridColumns
			));
            
        }
        
        public function actionPending(){
			$gridDataProvider = new CArrayDataProvider(PostsMain::model()->getPendingPengaduan());
			$gridColumns = array(
				array('name'=>'label', 'header'=>'Title'),
				array('name'=>'content', 'header'=>'Content'),
				
				array(
					'htmlOptions' => array('nowrap'=>'nowrap'),
					'template' => '{view}{delete}',
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'viewButtonUrl'=>'Yii::app()->createUrl("/pengaduan/view/", array("id"=>$data["id"]))',
					'updateButtonUrl'=>'Yii::app()->createUrl("/pengaduan/view/", array("id"=>$data["id"]))',
					'deleteButtonUrl'=>'Yii::app()->createUrl("/pengaduan/delete/", array("id"=>$data["id"]))',
				)
			);

			$this->render('pending',array(
				'gridDataProvider'=>$gridDataProvider, 'gridColumns'=>$gridColumns
			));
        }
        
        public function actionApproved(){
			$gridDataProvider = new CArrayDataProvider(PostsMain::model()->getApprovedPengaduan());
			$gridColumns = array(
				array('name'=>'label', 'header'=>'Title'),
				array('name'=>'content', 'header'=>'Content'),
				
				array(
					'htmlOptions' => array('nowrap'=>'nowrap'),
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template' => '{view}{delete}',
					'viewButtonUrl'=>'Yii::app()->createUrl("/pengaduan/view/", array("id"=>$data["id"]))',
					'updateButtonUrl'=>'Yii::app()->createUrl("/pengaduan/update/", array("id"=>$data["id"]))',
					'deleteButtonUrl'=>'Yii::app()->createUrl("/pengaduan/delete/", array("id"=>$data["id"]))',
				)
			);

			$this->render('approved',array(
				'gridDataProvider'=>$gridDataProvider, 'gridColumns'=>$gridColumns
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
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
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
        
        public function actionEditable()
        {
            Yii::import('ext.editable.EditableSaver'); //or you can add import 'ext.editable.*' to config
            $es = new EditableSaver('PostsMain');  // 'User' is classname of model to be updated
            $es->update();
        }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                /*
                $model = PostsMain::model()->findBySql("select * from posts where type='3'");
                $this->render('admin', array('model'=>$model));
                */
            
		$model =  PostsMain::model()->findBySql("select * from posts where type='3'");
		//$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PostsMain']))
			$model->attributes=$_GET['PostsMain'];

		$this->render('admin',array(
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
