<?php
$this->breadcrumbs=array(
	'Posts Mains'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PostsMain','url'=>array('index')),
	array('label'=>'Manage PostsMain','url'=>array('admin')),
);
?>

<h1>Create PostsMain</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>