<?php 
$this->pageTitle = 'Selamat Datang - Direktorat Keuangan Universitas Airlangga';
$this->pageDesc = 'Selamat datang di portal web direktorat keuangan - Universitas Airlangga Surabaya
Saran & Kritik: disini
Kampus C: Mulyorejo, Surabaya 60115, Jawa Timur - I N D O N E S I A
TLP. (031) 5023151, 5031983, FAX. 5032557';

?>
<?php foreach ($model as $data){?>
            <div class="blog-item-container">
            
            <div class="blog-title">
                <?php $link = str_replace(' ', '-', $data['label']); ?>
                <?php $link = str_replace(',', '', $link); ?>
            <h3><?php echo CHtml::link($data['label'],array('post/'.$data['id'].'/'.$link)); ?></h3>
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
               		<?php echo CHtml::link('SELENGKAPNYA..',array('post/'.$data['id'].'/'.$link)); ?>
               </p>
            </div><!-- blog-read-more -->
            
            </div><!-- blog-item-container -->
<hr />
<?php } ?>