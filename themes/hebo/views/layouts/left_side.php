<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Berita terakhir
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
        <ul class="">
            <?php $latestNews = Berita::model()->getLatestNews(); ?>
            <?php foreach($latestNews as $data){ ?>
            <li>
                <?php $link = str_replace(' ', '-', $data['label']); ?>
                <?php $link = str_replace(',', '', $link); ?>
                <?php echo CHtml::link($data['label'],array('post/'.$data['id'].'/'.$link)); ?>
                <?php //Yii::app()->createUrl(array('post', 'id'=>$data['id'])); ?>
            </li>
            <?php } ?>
        </ul>    
    </div>
</div>

<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Link Website
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
        <ul class="nav" style="text-decoration: none; list-style: none;">
            <li class="" style="padding-bottom: 10px;">               
                <a href="http://www.reform.depkeu.go.id/" class="">
                  <img src="http://www.depkeu.go.id/Ind/images/BIROKRASI.jpg" alt="">
                </a>
            </li>
            <li class="" style="padding-bottom: 10px;">
                <a href="http://www.lpse.depkeu.go.id/" class="">
                  <img src="http://www.depkeu.go.id/Ind/images/lelang.jpg" alt="">
                </a>
            </li>
            <li class="" style="padding-bottom: 10px;">
                <a href="http://www.sjdih.depkeu.go.id/" class="">
                  <img src="http://www.depkeu.go.id/Ind/images/INFORMASIHUKUM.jpg" alt="">
                </a>
            </li>
            <li class="" style="padding-bottom: 10px;">
                <a href="http://www.perpustakaan.depkeu.go.id/" class="">
                  <img src="http://www.depkeu.go.id/Ind/others/PERPUSTAKAAN%20copy.jpg" alt="">
                </a>
            </li>
        </ul>    
    </div>
</div>