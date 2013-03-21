<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <div style="max-width: 1000px;margin: auto; position: relative; background: inherit;">
        <div class="row-fluid">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#cctv" data-toggle="tab">CCTV</a></li>
          <li><a href="#halte" data-toggle="tab">Halte</a></li>
          <li><a href="#stasiunkereta" data-toggle="tab">Stasiun Kereta</a></li>
          <li><a href="#parkir" data-toggle="tab">Parkir</a></li>
          <li><a href="#jalurkereta" data-toggle="tab">Jalur Kereta</a></li>
          <li><a href="#konstruksi" data-toggle="tab">Wilayah Konstruksi</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="cctv">
              <div class="span3">
                    Kemacetan
                    Menampilkan kemacetan di ruas - ruas jalan Koridor 4, 5 dan 6
              </div>
              <div class="span9">
                  <?php require_once ('maps/cctv.php'); ?>
              </div>
          </div>
          <div class="tab-pane active" id="halte">
              <div class="span3">
                    Kemacetan
                    Menampilkan kemacetan di ruas - ruas jalan Koridor 4, 5 dan 6
              </div>
              <div class="span9">
                  <?php include ('maps/halte.php'); ?>
              </div>
          </div>
          <div class="tab-pane active" id="stasiunkereta">
              <div class="span3">
                    Kemacetan
                    Menampilkan kemacetan di ruas - ruas jalan Koridor 4, 5 dan 6
              </div>
              <div class="span9">
                  <?php include ('maps/stasiunkereta.php'); ?>
              </div>
          </div>
          <div class="tab-pane active" id="parkir">
              <div class="span3">
                    Kemacetan
                    Menampilkan kemacetan di ruas - ruas jalan Koridor 4, 5 dan 6
              </div>
              <div class="span9">
                  <?php include ('maps/parkir.php'); ?>
              </div>
          </div>
          <div class="tab-pane active" id="jalurkereta">
              <div class="span3">
                    Kemacetan
                    Menampilkan kemacetan di ruas - ruas jalan Koridor 4, 5 dan 6
              </div>
              <div class="span9">
                  <?php include ('maps/jalurkereta.php'); ?>
              </div>
          </div>
          <div class="tab-pane active" id="konstruksi">
              <div class="span3">
                    Kemacetan
                    Menampilkan kemacetan di ruas - ruas jalan Koridor 4, 5 dan 6
              </div>
              <div class="span9">
                  <?php include ('maps/konstruksi.php'); ?>
              </div>
          </div>
        </div>
        </div>
    </div>
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