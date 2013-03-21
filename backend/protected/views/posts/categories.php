<?php
/* @var $this CategoriesController */
/* @var $model Terms */

$this->breadcrumbs=array(
	'Categories'=>array('posts/categories'),
	'List',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#terms-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Category List
<?php echo CHtml::link('Add New', array('posts/addcat/'), array('class'=>'btn btn-primary')); ?>
</h1>



<?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped',
	'id'=>'terms-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}',
                        'header'=>'Action',
                        //'viewButtonUrl'=>'Yii::app()->createUrl("/posts/viewcat/", array("id"=>$data["id"]))',
                        //'updateButtonUrl'=>'Yii::app()->createUrl("/posts/updatecat/", array("id"=>$data["id"]))',
                        //'deleteButtonUrl'=>'Yii::app()->createUrl("/categories/delete/", array("id"=>$data["id"]))',
                        
                        'buttons'=>array
                        (
                            'update' => array
                            (
                                //'label'=>'[-]',
                                'url'=>'Yii::app()->createUrl("posts/updatecat/", array("id"=>$data->id))',
                                //'visible'=>'$data->score > 0',
                                //'click'=>'function(){alert("Going down!");}',
                            ),
                            'delete' => array
                            (
                                //'label'=>'Delete',
                                'url'=>'Yii::app()->createUrl("categories", array("id"=>$data->id))',
                                //'visible'=>'$data->score > 0',
                                //'click'=>'function(){alert("Going down!");}',
                            ),
                        ),
		),            
                array(
                   'name'=>'No',
                   'type'=>'raw',
                   'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',//this for the auto page number of cgridview
                   'filter'=>''//without filtering 
                ),
                /*
		array(
                  'header'=>'Parent',
                  'name'=>'parent_id',
                  'type'=>'raw',
                  'value'=>'Chtml::link(Chtml::encode(Terms::model()->findByPk($data->id)->label),array("viewcat","id"=>$data["id"]))',
                  'filter'=> CHtml::listData(Terms::model()->findAll(), 'id', 'label'),
                ),
                */
		'label',

	),
)); ?>