<?php
/* @var $this SettingsController */

/*
$this->breadcrumbs=array(
	'Settings'=>array('/settings'),
	'Gallery',
);
*/
?>

<h2>Product galley</h2>
<?php
if ($model->galleryBehavior->getGallery() === null) {
    echo '<p>Before add photos to product gallery, you need to save product</p>';
} else {
    $this->widget('GalleryManager', array(
        'gallery' => $model->galleryBehavior->getGallery(),
    ));
}
?>


