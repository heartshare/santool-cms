<div class="page-header">
    <h2>Pengaduan <small> sebagai salah satu layanan kami</small></h2>
</div>
<div class="row-fluid">
    <div class="span12">
    <div class="blog-item-container">

    <div class="blog-title">
    <h3><?php echo $model->label; ?></h3>
    </div><!-- blog-title -->

    <div class="blog-details">
        <ul>
          <li><i class="icon-calendar"></i> <?php echo $model->date_create; ?></li>
          <li><i class="icon-comment"></i> <a href="#comments" title="Comments"><?php echo $count; ?> replies</a></li>
          <li><a href="#"><i class="icon-user"></i> <?php echo $model->author_name; ?></a></li>
        </ul>
    </div><!-- blog-details -->

    <div class="blog-text">
        <?php echo $model->content; ?>

    </div><!-- blog-text -->

    <hr />

    </div><!-- blog-item-container -->
        
      <div class="blog-comments-container">
        <h3>Comments ( <?php echo $count; ?> )</h3>
        <?php foreach ($comment as $data){ ?>
        <div class="row-fluid comment">
            <div class="span12 ">
              <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64">
              </a>

                <strong class="media-heading"><?php echo $data['author_name']; ?></strong>
                <br />
                <?php echo $data['content']; ?>
              </div><!-- span12 -->
        </div><!-- row-fluid -->
        <?php  } ?>

        </div><!-- blog-comments-container-->
    </div><!-- span9 -->
</div><!-- /row-fluid -->
