<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h3>View User</h3>

<table class="table">
    <tr>
        <td>Username</td>
        <td>
            <?php 

            $this->widget('ext.editable.EditableField', array(
                'type'      => 'text',
                'model'     => $model,
                'attribute' => 'username',
                'url'       => $this->createUrl('user/editable'),  //url for submit data
                'placement'  => 'right'
            ));

            ?>
        </td>
    </tr>
    <tr>
        <td>First Name</td>
        <td>
            <?php 

            $this->widget('ext.editable.EditableField', array(
                'type'      => 'text',
                'model'     => $model,
                'attribute' => 'name',
                'url'       => $this->createUrl('user/editable'),  //url for submit data
            ));

            ?>
        </td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td>
            <?php 

            $this->widget('ext.editable.EditableField', array(
                'type'      => 'text',
                'model'     => $model,
                'attribute' => 'last_name',
                'url'       => $this->createUrl('user/editable'),  //url for submit data
            ));

            ?>
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
            <?php 

            $this->widget('ext.editable.EditableField', array(
                'type'      => 'text',
                'model'     => $model,
                'attribute' => 'email',
                'url'       => $this->createUrl('user/editable'),  //url for submit data
            ));

            ?>
        </td>
    </tr>
    <tr>
        <td>Role</td>
        <td>
            <?php 

            $this->widget('ext.editable.EditableField', array(
                'type'      => 'select',
                'model'     => $model,
                'attribute' => 'role_id',
                'url'       => $this->createUrl('user/editable'),  //url for submit data
                'source' => CHtml::listData(Role::model()->findAll(), 'id', 'name'),
                'placement' =>  'right'
            ));

            ?>
        </td>
    </tr>
</table>

<h3>About Yourself</h3>
<table>
    <tr>
        <td>Password</td>
        <td>
            <?php 

                $this->widget('ext.editable.EditableField', array(
                    'type'      => 'text',
                    'model'     => $model,
                    'attribute' => 'password',
                    'url'       => $this->createUrl('user/editable'),  //url for submit data
                    'placement'  => 'right'
                ));

            ?> 
            If you would like to change the password type a new one. Otherwise leave this blank.
        </td>
    </tr>
</table>