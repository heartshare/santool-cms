<?php
/* @var $this AdminController */
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
$this->breadcrumbs=array(
	'Admin',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
$this->widget('ext.ckeditor.CKEditorWidget', array(
    'model' => PostsMain::model()->findAllByPk(22032009),
    'attribute' => "content",
    'defaultValue' => PostsMain::model()->find(22032009)->content,
    'config' => array(
        'height' => "400px",
        'width' => "100%",
        'language' => "ru",
        'filebrowserBrowseUrl' => $this->createUrl("admin/fileupload")
    )
));
?>