<?php
$this->breadcrumbs=array(
	'Posts Mains',
);

$this->menu=array(
	array('label'=>'Create PostsMain','url'=>array('create')),
	array('label'=>'Manage PostsMain','url'=>array('admin')),
);
?>

<h1>Posts Mains</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
