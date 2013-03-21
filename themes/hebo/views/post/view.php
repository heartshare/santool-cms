<?php
$this->pageTitle=Yii::app()->name . ' - Post';
$this->breadcrumbs=array(
	'Post',
);
?>
<div class="page-header">
    <h3><?php echo $model->label; ?> <small></small></h3>
</div>

<?php
     $this->pageTitle = 'Ditkeu UA - ' . $model->label;
     $this->pageDesc = $model->resume;
     echo $model->content;
?>