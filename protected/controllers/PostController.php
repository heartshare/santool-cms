<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author sani
 */
class PostController extends Controller {
    //put your code here
    /* SEO Vars */

    public $pageTitle = '';
    public $pageDesc = '';
    public $pageRobotsIndex = true;

    public $pageOgTitle = '';
    public $pageOgDesc = '';
    public $pageOgImage = '';

    public $layout='//layouts/column2left';
    
    public function actionIndex($id){
        $model = Posts::model()->findByPk($id);
		
        
        $this->render('view', array('model'=>$model));
    }
    
    public function actionView($id){
        
        $model = $this->loadModel($id);
        $this->render('view', array('model'=>$model));
        
        //$model = Posts::model()->findAll(array('condition'=>"permalink='$id'"));
        //$comment = Pengaduan::model()->getComment($id);
	//$count = Pengaduan::model()->getCommentCount($id);
        //$this->render('view', array('model'=>$model, 'comment'=>$comment, 'count'=>$count));
    }
    
    
    
    public function actionId($id){
        $model = Posts::model()->findByPk($id);
        $comment = Pengaduan::model()->getComment($id);
	$count = Pengaduan::model()->getCommentCount($id);
        $this->render('view', array('model'=>$model, 'comment'=>$comment, 'count'=>$count));
    }
    
    public function loadModel($id)
    {
            $model = Posts::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $model;
    }

    public function loadPosts($id)
    {
            $model = Posts::model()->findAll(array('condition'=>"permalink=$id"));
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $model;
    }
    
}

?>