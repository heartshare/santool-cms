<?php
$this->breadcrumbs=array(
	'Posts Mains'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PostsMain','url'=>array('index')),
	array('label'=>'Create PostsMain','url'=>array('create')),
	array('label'=>'Update PostsMain','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PostsMain','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PostsMain','url'=>array('admin')),
);
?>

<h1>View PostsMain #<?php echo $model->id; ?></h1>

<?php 
    
    $this->widget('bootstrap.widgets.TbEditableDetailView',array(
            'data'=>$model,
            'url' => $this->createUrl('posts/editable'),  //common submit url for all editables
            'attributes'=>array(
                    //'id',
                    //'parent_id',
                    'label',
                    //'resume',
                    'content',
                    'type',
                    //'position',
                    //'permalink',
                    //'author_id',
                    //'author_name',
                    //'author_email',
                    array(  //select loaded from database
                        'name' => 'status',
                        'editable' => array(
                            'type' => 'select',
                            'source' => CHtml::listData(Status::model()->findAll(), 'id', 'label')
                         )
                    ),
            ),
    )); 
    
    /*
    $this->widget('bootstrap.widgets.TbEditableDetailView', array(
        'id' => 'region-details',
        'data' => PostsMain::model()->findByPk(23),
        'url' => $this->createUrl('site/editable'),  //common submit url for all editables
        'attributes'=>array(
                'label',
                'content',
        )
    ));
     * 
     */
?>
