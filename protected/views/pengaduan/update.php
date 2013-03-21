<?php
$this->breadcrumbs=array(
	'Pengaduans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pengaduan', 'url'=>array('index')),
	array('label'=>'Create Pengaduan', 'url'=>array('create')),
	array('label'=>'View Pengaduan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pengaduan', 'url'=>array('admin')),
);
?>

<h1>Update Pengaduan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>