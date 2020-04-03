
<?php 
    $banner_top = LAY_banner_new("`id_parent` = 16");
  ?>
  <?php
    if(isset($banner_top)) {
   ?>
    <div class="main_slider">

      <?php  foreach ($banner_top as $r) {
        $oclick = "";
        if($r['seo_name'] != "") {
          $oclick = " onclick='window.location.href=\".".GET_link($full_url, $r['seo_name']).".\"'";
        }
      ?>
        <div class="item_slider">
            <a href="index4227.html?page=product" title="<?=SHOW_text($r['tenbaiviet_'.$lang]) ?>">
                <img src="<?=$fullpath."/".$r['duongdantin']."/".$r['icon'] ?>" alt="<?=SHOW_text($r['tenbaiviet_'.$lang]) ?>">
            </a>
            
        </div>

        <?php } ?>
       
    </div>

  <?php } ?>

<!--   <div class="container relative">
      <div class="box_caption">
          <div class="text_caption relative">
              <h3 class="title_caption"><?//=SHOW_text($r['tenbaiviet_'.$lang]) ?> </h3>
              <p class="short_caption"><?//=SHOW_text($r['tenbaiviet_'.$lang]) ?></p>
          </div>
      </div>
  </div> -->