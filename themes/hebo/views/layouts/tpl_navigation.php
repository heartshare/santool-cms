<div class="nav">
<div class="navbar">
  <div class="container">
        <?php 

        $this->widget(
        'bootstrap.widgets.TbNavbar', array(
              //'htmlOptions'=>array('class'=>'nav'),
              'type'=>'inverse', // null or 'inverse'
              'brand'=>false,
              'brandUrl'=>'',
              'collapse'=>true, // requires bootstrap-responsive.css                          
              'items'=>array(
                        array(
                            'class'=>'bootstrap.widgets.TbMenu',
                            'items'=>Posts::model()->getMenuItems(22031989, false)
                        ),
                        array(
                            'class'=>'bootstrap.widgets.TbMenu',
                            'htmlOptions'=>array('class'=>'pull-right'),
                            'items'=>array(
                                    array('label'=>isset(Yii::app()->user->id)?'LOGOUT':NULL, 'url'=>array('site/logout')),
                            ),
                        ),
               )
          ));
        ?>
  </div>

</div>
    
</div>

<div  style="position: relative;margin: auto; padding-top: 20px; max-width: 1000px; background: #fff; text-align: center; alignment-adjust: central;">
    <img style="position: relative;margin: auto;" src="<?php echo $baseUrl;?>/img/finance_header.jpg"/>
    
    <div class="carousel-caption">
    <ul id="webticker" class="tickercontainer">
        <?php $latestNews = Berita::model()->getLatestNews(); ?>
        <?php foreach($latestNews as $data){ ?>
        <li style="border-right-color: #7a7a7a; border-right-style: solid; border-right-width: 1px; padding-left: 20px;">
                <?php $link = str_replace(' ', '-', $data['label']); ?>
                <?php $link = str_replace(',', '', $link); ?>
            <?php echo CHtml::link($data['label'],array('post/'.$data['id'].'/'.$link), array('class'=>'tags', 'style'=>'color:#fff;')); ?>
        </li>
        <?php } ?>
    </ul>
    </div>
    
</div>
