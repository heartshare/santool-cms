<?php
$this->breadcrumbs=array(
	'Pengaduan'=>array('all'),
	'Manage',
);

?>

<h1>Pengaduan yang disetujui</h1>

<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered',
		'dataProvider'=>$gridDataProvider,
		//'template'=>"{items}",
		'columns'=>$gridColumns,
	));
?>