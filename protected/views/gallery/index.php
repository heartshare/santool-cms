<?php
/* @var $this GalleryController */

$this->breadcrumbs=array(
	'Gallery',
);
?>
<h1>Galeri Ditkeu Universitas Airlangga</h1>


<ul class="thumbnails">
  <?php foreach($model as $data){ ?>
  <li class="span3">
    <div class="thumbnail">
      <h3><?php echo $data['label']; ?></h3>
      <?php echo $data['content']; ?>
      <p><?php echo $data['resume']; ?></p>
      
    </div>
  </li>
  <?php } ?>
</ul>
