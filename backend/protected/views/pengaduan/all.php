<?php
$this->breadcrumbs=array(
	'Pengaduan'=>array('all'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List PostsMain', 'url'=>array('index')),
	//array('label'=>'Re', 'url'=>array('create')),
);
?>

<h1>Semua Pengaduan</h1>

<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered',
		'dataProvider'=>$gridDataProvider,
		//'template'=>"{items}",
		'columns'=>$gridColumns,
	));
?>