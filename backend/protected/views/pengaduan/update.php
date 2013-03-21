<?php
$this->breadcrumbs=array(
	'Posts Mains'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PostsMain','url'=>array('index')),
	array('label'=>'Create PostsMain','url'=>array('create')),
	array('label'=>'View PostsMain','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PostsMain','url'=>array('admin')),
);
?>

<h1>Update PostsMain <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>