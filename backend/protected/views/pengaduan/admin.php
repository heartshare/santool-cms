<?php
$this->breadcrumbs=array(
	'Posts Mains'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PostsMain', 'url'=>array('index')),
	array('label'=>'Create PostsMain', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('posts-main-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Posts Main</h1>

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'posts-main-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                'author_id',
		//'id',
		//'parent_id',
		'label',
		//'resume',
		'content',
		//'type',
		/*
		'position',
		'permalink',
		'author_id',
		'author_name',
		'author_email',
                 * 
                 */
                
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 

?>
