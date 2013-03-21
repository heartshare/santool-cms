<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <div class="container">
        <div class="row-fluid">
           <div class="span3">
                <!-- Require the left side content -->
                <?php require_once('left_side.php'); ?>
           </div>

           <div id="content" class="span6">
                <?php echo $content; ?>
           </div>

          <!-- Right Content -->
           <div class="span3">
                <!-- Require the right side content -->
                <?php require_once('right_side.php'); ?>
           </div>
          <!-- End Right Content -->

        </div><!--/row-fluid-->
    </div>
</section>
<?php $this->endContent(); ?>