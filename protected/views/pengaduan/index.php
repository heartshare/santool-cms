<?php
$this->breadcrumbs=array(
	'Pengaduans',
);

$this->menu=array(
	array('label'=>'Create Pengaduan', 'url'=>array('create')),
	array('label'=>'Manage Pengaduan', 'url'=>array('admin')),
);
?>

<h1>Pengaduans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
