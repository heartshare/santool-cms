<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Terms', 'url'=>array('index')),
	array('label'=>'Create Terms', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('terms-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Terms</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'terms-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
                    'name'      =>  'parent_id',
                    'header'    =>  'Parent',
                    'value'=> '$data->terms->label'
                ),
		'label',
		'content',
		'position',
		//'permalink',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
