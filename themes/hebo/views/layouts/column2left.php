<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <div class="container">
        
        <div class="row-fluid">
            <div class="span12">
                <?php if(isset($this->breadcrumbs)):?>

                <?php 
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                        'homeLink'=>CHtml::link('Dashboard'),
                        'htmlOptions'=>array('class'=>'breadcrumb')
                    ));

                ?><!-- breadcrumbs -->
                <?php endif?>
            </div>       
        </div>
                
        <div class="row-fluid">

           <div class="span3">
                <!-- Require the left side content -->
                <?php require_once('left_side.php'); ?>
           </div>

           <div id="content" class="span9">
                <?php echo $content; ?>
           </div>

        </div><!--/row-fluid-->
    </div>
</section>
<?php $this->endContent(); ?>
