<?php
$this->breadcrumbs=array(
	'Posts'=>array('all'),
	'Add New',
);

$this->menu=array(
	array('label'=>'List PostsMain','url'=>array('index')),
	array('label'=>'Manage PostsMain','url'=>array('admin')),
);
?>

<h1>Add New Posts</h1>

<?php echo $this->renderPartial('_add', array('model'=>$model)); ?>