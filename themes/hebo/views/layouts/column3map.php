<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <div style="max-width: 1000px;margin: auto; position: relative; background: inherit;">
        <div class="row-fluid">
            <?php
                
                $this->widget('bootstrap.widgets.TbTabs', array(
                        'type' => 'tabs',
                        'tabs' => array(
                                array('id' => 'tab1', 'label' => 'CCTV', 'content' => 'Loding..', 'active' => true),
                                array('id' => 'tab2', 'label' => 'Halte', 'content' => 'Loading..'),
                                array('id' => 'tab3', 'label' => 'Jalur Kereta', 'content' => 'Loading..'),
                                
                                array('id' => 'tab4', 'label' => 'Terminal Bus', 'content' => 'Loading..'),
                                array('id' => 'tab5', 'label' => 'Parkir', 'content' => 'Loading..'),
                                array('id' => 'tab6', 'label' => 'Wilayah Konstruksi', 'content' => 'Loading..'),
                        ),
                        'events'=>array('shown'=>'js:loadContent')
                    )
                );
                 
                 
            ?>
        </div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#tab1").load('/maps/cctv');  
  })
function loadContent(e){

    var tabId = e.target.getAttribute("href");

    var ctUrl = ''; 

    if(tabId == '#tab1') {
        ctUrl = '<?php echo Yii::app()->createUrl("maps/cctv"); ?>';
    } else if(tabId == '#tab2') {
        ctUrl = '<?php echo Yii::app()->createUrl("maps/halte"); ?>';
    } else if(tabId == '#tab3') {
        ctUrl = '<?php echo Yii::app()->createUrl("maps/jalurkereta"); ?>';
    } else if(tabId == '#tab4') {
        ctUrl = '<?php echo Yii::app()->createUrl("maps/stasiunkereta"); ?>';
    } else if(tabId == '#tab5') {
        ctUrl = '<?php echo Yii::app()->createUrl("maps/parkir"); ?>';
    } else if(tabId == '#tab6') {
        ctUrl = '<?php echo Yii::app()->createUrl("maps/konstruksi"); ?>';
    }

    if(ctUrl != '') {
        $.ajax({
            url      : ctUrl,
            type     : 'POST',
            dataType : 'html',
            cache    : false,
            success  : function(html)
            {
                jQuery(tabId).html(html);
            },
            error:function(){
                    alert('Request failed');
            }
        });
    }

    e.preventDefault();
    return false;
    
}

</script>
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