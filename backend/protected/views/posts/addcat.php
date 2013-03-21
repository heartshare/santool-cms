<?php
/* @var $this CategoriesController */
/* @var $model Terms */

$this->breadcrumbs=array(
	'Posts Categories'=>array('index'),
	'Create',
);

?>

<h1>Add New Categories</h1>

<?php echo $this->renderPartial('_formcat', array('model'=>$model)); ?>