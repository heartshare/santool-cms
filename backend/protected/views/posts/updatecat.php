<?php

    $this->breadcrumbs=array(
            'Categories'=>array('index'),
            $model->id=>array('viewcat','id'=>$model->id),
            'Update',
    );

?>

<h1>Update Terms <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_formcat',array('model'=>$model)); ?>
