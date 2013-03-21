<?php
$this->breadcrumbs=array(
	'Posts'=>array('all'),
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
        'type'=>'striped',
	'id'=>'posts-main-grid',
	'dataProvider'=>new CActiveDataProvider('PostsMain',array(
	'criteria'=>array('condition'=>'type=1 or type=2 or type=4'))),
	'filter'=>$model,
	'columns'=>array(		
                array(
                        'htmlOptions' => array('nowrap'=>'nowrap'),
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        'header'=>'Action',
                        'template' => '{update}{delete}',
                        'viewButtonUrl'=>'Yii::app()->createUrl("/posts/view/", array("id"=>$data["id"]))',
                        'updateButtonUrl'=>'Yii::app()->createUrl("/posts/update/", array("id"=>$data["id"]))',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("/posts/delete/", array("id"=>$data["id"]))',
                ),
		//'id',
		//'parent_id',
                array(
                   'name'=>'No',
                   'type'=>'raw',
                   'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',//this for the auto page number of cgridview
                   'filter'=>''//without filtering 
                ),
            
		array(
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'name' => 'label',
			'sortable'=>false,
			'editable' => array(
                                'type'  => 'text',
				'url' => $this->createUrl('posts/editable'),
				'placement' => 'left',
                'options' => array(
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->getRequest()->getCsrfToken()),
                ),
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
                'options' => array(
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->getRequest()->getCsrfToken()),
                ),
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
                                'source' => array(1 => 'Posts', 2 => 'Links', 4 => 'Pages'),
				'placement' => 'left',
                'options' => array(
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->getRequest()->getCsrfToken()),
                ),
			)
		),
                'date_modified'
	),
)); ?>