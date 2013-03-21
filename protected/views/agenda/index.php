<?php
/* @var $this AgendaController */

$this->breadcrumbs=array(
	'Agenda',
);
?>

<h1 class="blog-title">Agenda Direktorat Keuangan Universitas Airlangga</h1>

<?php foreach ($model as $data){?>
            <div class="blog-item-container">
            
            <div class="blog-title">
                <?php $link = str_replace(' ', '-', $data['label']); ?>
                <?php $link = str_replace(',', '', $link); ?>
            <h3><?php echo CHtml::link($data['label'],array('agenda/'.$data['id'].'/'.$link)); ?></h3>
            </div><!-- blog-title -->
            
            <div class="blog-details">
            	<ul>
                  <li><i class="icon-calendar"></i><?php echo $data['date_modified']; ?></li>
                  <li><i class="icon-comment"></i> <?php  ?> replies</li>
                  <li><a href="#"><i class="icon-user"></i> <?php echo $data['author_name']; ?></a></li>
                </ul>
            </div><!-- blog-details -->
            
            <div class="blog-tags">
            <i class="icon-tags"></i> <?php echo $data['tags']; ?>
            </div><!-- blog-tags -->
            
            <div class="blog-text">
            	<p>
                <?php echo $data['resume']; ?>
               </p>
               
            </div><!-- blog-text -->
            
            <div class="blog-read-more">
            	<p>
                <?php $link = str_replace(' ', '-', $data['label']); ?>
                <?php $link = str_replace(',', '', $link); ?>
               		<?php echo CHtml::link('SELENGKAPNYA..',array('agenda/'.$data['id'].'/'.$link)); ?>
               </p>
            </div><!-- blog-read-more -->
            
            </div><!-- blog-item-container -->
<hr />
<?php } ?>