<?php
$this->breadcrumbs=array(
	'Pengaduan'=>array('all'),
	'Reply',
);

$this->menu=array(
	//array('label'=>'List PostsMain','url'=>array('index')),
	//array('label'=>'Manage PostsMain','url'=>array('admin')),
);
?>

<h1>Reply Pegaduan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'id'=>$id)); ?>