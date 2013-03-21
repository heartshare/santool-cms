<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'All',
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

<h1>Posts
<?php echo CHtml::link('Add New', array('posts/create/'), array('class'=>'btn btn-primary')); ?>
</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'posts-main-grid',
	'dataProvider'=>new CActiveDataProvider('PostsMain',array(
		'criteria'=>array('condition'=>'type=1'))),
	'filter'=>$model,
	'columns'=>array(		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		//'id',
		//'parent_id',
		array(
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'name' => 'label',
			'sortable'=>false,
			'editable' => array(
                                'type'  => 'text',
				'url' => $this->createUrl('posts/editable'),
				'placement' => 'left',
				//'inputclass' => 'span3'
			)
		),
		//'resume',
		//'content',
		
		/*
		'position',
		'permalink',
		'author_id',
                 * 
                 */
		'author_name',
            
		array(
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'name' => 'terms_id',
			'sortable'=>false,
			'editable' => array(
                                'type'  => 'select',
				'url' => $this->createUrl('posts/editable'),
                                'source' => CHtml::listData(Categories::model()->findAll(), 'id', 'label'),
				'placement' => 'left',
				//'inputclass' => 'span3'
			)
		),
                 
		//'author_email',
		array(
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'name' => 'type',
			'sortable'=>false,
			'editable' => array(
                                'type'  => 'select',
				'url' => $this->createUrl('posts/editable'),
                                'source' => CHtml::listData(PostsType::model()->findAll(), 'id', 'label'),
				'placement' => 'left',
				//'inputclass' => 'span3'
			)
		),
                'date_modified'
	),
)); ?>
