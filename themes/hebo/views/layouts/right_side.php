<!--
<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Facebook FanPage
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/Pusat-Informasi-Humas-Unair/221189484595432" data-width="230" data-show-faces="true" data-stream="false" data-border-color="white" data-header="true"></div>
    </div>
</div>

-

<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         PIH Twitter
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/Unair_Official" data-widget-id="304676110774435840">Tweet oleh @Unair_Official</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>  
</div>
-->

<div class="blog-item-container">
	
    <div class="blog-title">
     <h3 class="header">
         Surat Pembaca
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
            <?php $latest = Pengaduan::model()->getLatestPengaduan(); ?>
            
            <?php foreach($latest as $data){ ?>
            <li>
                <?php echo CHtml::link($data['label'],array('pengaduan/'.$data['id'])); ?>
            </li>
            <?php } ?>
    </div>
</div>

<!--
<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Info
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
    Maecenas tincidunt lectus at purus adipiscing id dapibus lectus vestibulum. 
    Praesent ac eros vel tellus pulvinar porttitor at non ante.
    </div>
</div>
-->