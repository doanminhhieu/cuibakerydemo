<?php
  // Update Luot view
  // DB_que("UPDATE `#_baiviet` SET `soluotxem` = `soluotxem` + 1 WHERE `id` = '".$arr_running['id']."' LIMIT 1");
  // Update Luot view
  $kietxuat_name = DB_fet("*", "#_danhmuc", "`showhi` = 1 AND `step` = '".$slug_step."' AND `id` = '".$arr_running['id_parent']."'", "`id` DESC", 1, "arr", 1);
  if(empty($kietxuat_name)) 
    $kietxuat_name = $thongtin_step['tenbaiviet_'.$lang];
  else
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_'.$lang];

  $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);

  $wh           = "  AND `id_parent` in (".$lay_all_kx.") AND `id` <>  '".$arr_running['id']."'";
  $numview      = 12;
  $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh ORDER BY `catasort` DESC LIMIT 0,$numview");
  // $nd_kietxuat_2  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") AND `id` <>  '".$arr_running['id']."' ORDER BY RAND() LIMIT 0,$numview");
  // $nd_total = DB_que("SELECT `id` FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh");
  // $nd_total = mysql_num_rows($nd_total);
  $list_hinhcon = LAY_hinhanhcon($arr_running['id'], 50);
  $tinhnang_arr = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 AND `step` = '".$slug_step."' ","`catasort` ASC, `id` DESC","","arr", 1);

?>
<div class="link_pageload">
  <div class="pagewrap">
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<div class="pagewrap page_conten_page">
  <div class="title_page_id"><?=$kietxuat_name ?></div>
  <div class="padding_pagewrap <?=$arr_running['link_video'] == "" ? "full_pro_img_main" : "" ?>">
    <div id="pro_img_main" >
      <div id="bridal_images"> 
        <a href='<?=checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>' class='cloud-zoom ' id='zoom1' rel="position: 'inside' , showTitle: false, adjustX:0, adjustY:0"><img src="<?=checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>"></a> 
      </div>
      <div class="dv-slider-nang no_box">
          <?php $data = array("2","3","3","3","4","4") ?>
          <div class="owl-auto owl-carousel owl-theme flex" data0="<?=$data[0] ?>" data1="<?=$data[1] ?>" data2="<?=$data[2] ?>" data3="<?=$data[3] ?>" data4="<?=$data[4] ?>" data5="<?=$data[5] ?>" is_slidespeed="1000" is_navigation="1" is_dots="1" is_autoplay="1">
              <?php 
                $list_hinhcon = LAY_hinhanhcon($arr_running['id'], 50);
                $i = 0;
                foreach ($list_hinhcon as $rows) {  
                  $i++;
              ?>
              <div class="item">
              <li><a href='<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>'"><?=full_img($rows) ?></a></li>
              </div>
              <?php } ?>
          </div>
          <script type="text/javascript" src="js/cloud-zoom.1.0.2.min.js"></script> 
          <div class="clr"></div>
      </div> 
    </div>
    <?php 
      if($arr_running['link_video'] != "") {
     ?>
    <div class="product-video">
      <iframe src="<?=$arr_running['link_video'] ?>" title="Camilla" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="384" height="600" style="width: 384px; height: 576px;"></iframe>
    </div>
    <?php } ?>
    <div class="chitiet_sp">
      <div class="titile_pro_view">
        <form action="<?=$full_url."/gio-hang/" ?>" method="post">
        <ul>
          <h3><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h3>
          <h4 class="h5_giact_sp"><?php 
              $gia = GET_gia($arr_running['giatien'], $arr_running['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
                echo $gia['text_gia'].$gia['text_km'];
              ?></h4>

          <!--  -->
          <?php 
            for ($k=1; $k <= 3 ; $k++) {  
            if($arr_running['thuoc_tinh_'.$k.'_vi'] != "" && $arr_running['gia_tri_'.$k.'_vi'] != ''){ 
          ?>
          <div class="chon_size">
            
            <ul>
              <?php 
                ${'gia_tri_'.$k.'_vi'} = explode(",", $arr_running['gia_tri_'.$k.'_vi']);
                $val          = explode(",", $arr_running['gia_tri_'.$k.'_'.$lang]);
                for ($i=0; $i < count(${'gia_tri_'.$k.'_vi'}); $i++) {  
              ?>
              <li>
                <input class="js_tinhnang_getval" type="radio" name="tinhnang_<?=$k ?>" value="<?=${'gia_tri_'.$k.'_vi'}[$i] ?>" id="id_tn_<?=$k ?>_<?=$val[$i] ?>">
                <label for="id_tn_<?=$k ?>_<?=$val[$i] ?>"><?=$val[$i] ?></label>
              </li>
              <?php } ?>
              
            </ul>
            <h3><?=$arr_running['thuoc_tinh_'.$k.'_'.$lang] ?></h3>
            <div class="clr"></div>
          </div>
          <?php }} ?>
          <!--  -->
          <div class="clr"></div>
          
          <h2>
            <input type="hidden" name="qty_cart" id="qty_cart" max="50" min="1">
            <input type="hidden" name="id" class="js_idbv" value="<?=$arr_running['id'] ?>">
            <button type="submit" name="mua_ngay"><?=$glo_lang['mua_ngay'] ?></button>
            <span class="p_yeuthich"><a class="cur check_click_<?=$arr_running['id'] ?>" onclick="yeu_thich(<?=$arr_running['id'] ?>, this)"><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
            <div class="clr"></div>
          </h2>
        </ul>
        </form>
      </div>
      <ul class="accordion" id="accordion-1">
        <?php if($arr_running['mota_'.$lang] != ""){ ?>
        <li><a class="menu_parent" href="#"><?=$glo_lang['noi_dung'] ?></a>
          <ul>
            <?=SHOW_text($arr_running['mota_'.$lang]) ?><div class="clr"></div>
          </ul>
        </li>
        <?php } if($arr_running['noidung_'.$lang] != ""){ ?>
        <li><a class="menu_parent" href="#"><?=$glo_lang['chi_tiet_san_pham'] ?></a>
          <ul>
            <div>
              <?=SHOW_text($arr_running['noidung_'.$lang]) ?><div class="clr"></div>
            </div>
          </ul>
        </li>
        <?php } ?>
        <?php 
          $_baiviet_ct = DB_fet("*","`#_baiviet_chitiet`","`showhi` = 1 AND `id_parent` = '".$arr_running['id']."'","`catasort` DESC","","arr");
          foreach ($_baiviet_ct as $rows) {
        ?>
        <li><a class="menu_parent" href="#"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
          <ul>
            <?=SHOW_text($rows['noidung_'.$lang]) ?><div class="clr"></div>
          </ul>
        </li>
        <?php } ?>
      </ul>
      <div id="sharelink">
        <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
      </div>
      <!-- <div class="dv-fb_coment">
        <?php include _source."fb_coment.php"; ?>
      </div> -->
    </div>
    <div class="clr"></div>
  </div>
</div>
<div class="box_home_2">
  <div class="pagewrap">
    <div class="title_page_2"><?=$glo_lang['san_pham_lien_quan'] ?></div>
    <div class="pro_home_id pro_home_id_slider tintuc_home_id_slider no_box">
      <!--  -->
      <?php $data = array("2","2","2","3","4","4") ?>
        <div class="owl-auto owl-carousel owl-theme flex" data0="<?=$data[0] ?>" data1="<?=$data[1] ?>" data2="<?=$data[2] ?>" data3="<?=$data[3] ?>" data4="<?=$data[4] ?>" data5="<?=$data[5] ?>" is_slidespeed="1000" is_navigation="1" is_dots="1" is_autoplay="0">
      <?php 
        while ($rows = mysql_fetch_assoc($nd_kietxuat)) {
          $gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
      ?>
        <div class="item">
          <ul>
            <a <?=full_href($rows) ?>>
              <?=$gia['pt'] != 0 ? '<div class="discount-tag">-'.$gia['pt']."%</div>" : "" ?>
              <li><?=full_img($rows) ?></li>
              <li class="pro_1_b"><?=full_img_hover($rows) ?></li>
              <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
              <h4><?=$gia['text_gia'].$gia['text_km'] ?></h4>
            </a>
            <p class="p_sao"><?= GET_sao_sp($rows['num_1'], $rows['num_2'], $rows['id']) ?></p>
            <div class="view_more_pro">
              <div class="clolum_id p_yeuthich"><a class="cur check_click_<?=$rows['id'] ?>" onclick="yeu_thich(<?=$rows['id'] ?>, this)"><i class="fa fa-heart-o" aria-hidden="true"></i></a></div>
              <div class="clolum_id"><a <?=full_href($rows) ?>><i class="fa fa-eye" aria-hidden="true"></i></a></div>
              <div class="clolum_id"><a href="<?=$full_url."/gio-hang/?id=".$rows['id'] ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i></a></div>
              <div class="clr"></div>
            </div>
          </ul>
        </div>
       <?php } ?>
      </div>
      <div class="clr"></div>
      <!--  -->
    </div>
  </div>
</div>
