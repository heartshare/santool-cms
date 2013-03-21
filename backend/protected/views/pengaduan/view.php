<?php
$this->breadcrumbs=array(
	'Pengaduan'=>array('all'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List PostsMain','url'=>array('index')),
	array('label'=>'Reply','url'=>array('reply', 'id'=>$model->id)),
	//array('label'=>'Update PostsMain','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage PostsMain','url'=>array('admin')),
);
?>

<h1>View Pengaduan</h1>

<table class="table table-bordered">
    <tr>
        <td>Author</td>
        <td>
            <?php
                echo $model->author->name;
            ?>
        </td>
    </tr>
    <tr>
        <td>Subject</td>
        <td>
            <?php
                echo $model->label;
            ?>
        </td>
    </tr>
    <tr>
        <td>Content</td>
        <td>
            <?php
                echo $model->content;
            ?>
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <?php 

                $this->widget('ext.editable.EditableField', array(
                    'type'      => 'select',
                    'model'     => $model,
                    'attribute' => 'status',
                    'url'       => $this->createUrl('pengaduan/editable'),  //url for submit data
                    'placement' => 'right',
                    'source'    => array(1 => 'Approved', 2 => 'Pending'),
                ));

            ?>
        </td>
    </tr>
</table>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$comment,
	'itemView'=>'_comment',
)); ?>
