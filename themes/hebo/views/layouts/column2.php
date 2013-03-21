<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
  <div class="container">
  <div class="row-fluid">
	
    <div class="span8">

		<?php if(isset($this->breadcrumbs)):?>

                <?php 
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                        'homeLink'=>CHtml::link('Dashboard'),
                        'htmlOptions'=>array('class'=>'breadcrumb')
                    ));
                /*
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>CHtml::link('Dishub'),
                    'htmlOptions'=>array('class'=>'breadcrumb')
                ));
                 * 
                 */ 

                ?><!-- breadcrumbs -->
                <?php endif?>
        
        <!-- Include content pages -->
        <?php echo $content; ?>

	</div><!--/span-->
    
    <div class="span2">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
		<?php //include_once('tpl_sidebar.php');?>
		
    </div><!--/span-->
  </div><!--/row-->
</div>
</section>


<?php $this->endContent(); ?>