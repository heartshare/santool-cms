<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php
        //Yii::app()->clientScript->registerCoreScript('jquery');
        //Yii::app()->clientScript->registerCoreScript('jquery.ui');
		// Suppress Yii's autoload of JQuery
		// We're loading it at bottom of page (best practice)
		// from Google's CDN with fallback to local version 
		//Yii::app()->clientScript->scriptMap=array(
		//	'jquery.js'=>false,
		//);
		
		// Load Yii's generated javascript at bottom of page
		// instead of the 'head', ensuring it loads after JQuery
		//Yii::app()->getClientScript()->coreScriptPosition = CClientScript::POS_END;
	?>
	<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-and-responsive.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
        
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
</head>
<body>

<div class="container">
        
	<div class="row">
		<header class="span12">
                        
         <?php if(isset(Yii::app()->user->get()->id)){ ?>               
						<?php 
                                $this->widget(
                                    'bootstrap.widgets.TbNavbar', array(
                                                  'type'=>'inverse', // null or 'inverse'
                                                  //'brand'=> true,
                                                  'brandUrl'=>'',
                                                  //'brandOptions' => array('style'=>'margin:auto; margin-left: 10px;'),
                                                  //'fixed' => 'top',
                                                  //'htmlOptions' => array('style' => 'position:absolute', 'class'=>'nav'),
                                                  'collapse'=>true, // requires bootstrap-responsive.css                          
                                                  'items'=>array(
                                                                  array('class'=>'bootstrap.widgets.TbMenu',
                                                                          'items'=>Menu::model()->getMenuItems(22031989, false),                                                                                                  
                                                                  ),  
                                                                    array('class'=>'bootstrap.widgets.TbMenu',
                                                                          'items'=>array(array('label'=>'Logout', 'url'=>array('/site/logout/', 'token'=>Yii::app()->getRequest()->getCsrfToken())),),                                                                                                  
                                                                  ),   
                                                   )
                                  ));
                         ?>
			
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
					'htmlOptions'=>array('class'=>'breadcrumbs breadcrumb'),
				)); ?><!-- breadcrumbs -->
			<?php endif?>
		</header>
	</div>
	<?php } ?>
    
	<div class="row">
                <?php if(isset(Yii::app()->user->get()->id)){?>
            <div class="span2">
                <?php require_once 'left_menu.php'; ?>
            </div>
                <?php } ?>
		<div class="span10">
			<?php echo $content; ?>
		</div>
	</div>
        
	<div class="row">
		<footer class="span12">
			<div class="row">
				<div class="span8">
					<p>Copyright &copy; <?php echo date('Y'); ?> by Ditkeu Universitas Airlangga - All Rights Reserved.</p>
				</div>
				<div class="span4">
					<p style="text-align:right;">Web Design by <a href="http://sani-iman-pribadi.blogspot.com" target="_blank">SunSun</a></p>
				</div>
			</div>
		</footer>
	</div><!-- footer -->

</div><!-- container -->
<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
-->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>