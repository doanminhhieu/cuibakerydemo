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

  $wh           = "";// "  AND `id_parent` in (".$lay_all_kx.") AND `id` <>  '".$arr_running['id']."'";
  $numview      = 15;
  // $nd_kietxuat  = DB_fet(" * "," `#_baiviet` "," `showhi` =  1 AND `step` IN (".$slug_step.") $wh "," `catasort` DESC "," $numview","arr");
  $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh ORDER BY `catasort` DESC, `id` DESC LIMIT 0,$numview");
  // $nd_total = DB_que("SELECT `id` FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh");
  // $nd_total = mysql_num_rows($nd_total);
  $list_hinhcon = LAY_hinhanhcon($arr_running['id'], 50);
  // $tinhnang_arr = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 AND `step` = '".$slug_step."' ","`catasort` ASC, `id` DESC","","arr", 1);
  // full_src($thongtin_step, '')

?>
<!-- <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li> -->
<div class="page_conten_page">
  <div class="pagewrap">
    <div class="link_page">
      <ul>
        <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/') ?></li>
        <div class="clr"></div>
      </ul>
    </div>
    <div class="titile_page">
      <ul>
        <h3><?=$kietxuat_name ?></h3>
        <div class="clr"></div>
      </ul>
    </div>
    <div class="padding_pagewrap">
      <div class="hinhanh_view">
        <div class="container"> 
          <div class="mySlides"> <img class="animate_img" src="<?=checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>" style="width:100%"> </div>
          <?php
            $list_hinhcon   = LAY_hinhanhcon($arr_running['id'], 50);
            $list_hinhcon_c = count($list_hinhcon);
            $i = 0;
            foreach ($list_hinhcon as $rows) {
              $i++;
          ?>
          <div class="mySlides"> <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>" style="width:100%"> </div>
          <?php } ?>
          <?php if(count($list_hinhcon)){ ?>
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a>
          <?php } ?>
          <div class="caption-container">
            <p id="caption"></p>
          </div>
          <?php if(count($list_hinhcon)){ ?>
          <div class="row">
            <div class="dv-slider-nang no_box">
              <?php $data = array("2","3","3","4","5","5") ?>
              <div class="owl-auto owl-carousel owl-theme flex" data0="<?=$data[0] ?>" data1="<?=$data[1] ?>" data2="<?=$data[2] ?>" data3="<?=$data[3] ?>" data4="<?=$data[4] ?>" data5="<?=$data[5] ?>" is_slidespeed="1000" is_navigation="1" is_dots="1" is_autoplay="1">
                  <div class="item">
                    <div class="column "> <img class="demo cursor dotxx" src="<?=checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>" style="width:100%" onclick="currentSlide(1)"> </div>
                  </div>
                  <?php
                    $i = 1;
                    foreach ($list_hinhcon as $rows) {
                      $i++;
                  ?>
                  <div class="item">
                    <div class="column "> <img class="demo cursor dotxx" src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>" style="width:100%" onclick="currentSlide(<?=$i ?>)"> </div>
                  </div>
                  <?php } ?>
              </div>
              <div class="clr"></div>
            </div>
          </div>
          <?php } ?>
        </div>
        <script>
          var slideIndex = 1;
          showSlides(slideIndex);

          function plusSlides(n) {
            showSlides(slideIndex += n);
          }

          function currentSlide(n) {
            showSlides(slideIndex = n);
          }

          function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dotxx");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
          }
        </script>
      </div>
      <div class="fs-dtinfo">
        <div class="price_pro">
          <ul>
            <h2><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h2>
            <?php
              $gia = GET_gia($arr_running['giatien'], $arr_running['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
            ?>
            <h3><?=$gia['km'] != 0 ? $glo_lang['gia_khuyen_mai'] : $glo_lang['gia_ban'] ?>: <span><?=$gia['text_gia'] ?></h3>
            <?php if($gia['km'] != 0){ ?>
            <p><?=$glo_lang['gia_cu'] ?>: <span><?=$gia['text_km'] ?></span></p>
            <?php } ?>
            <div class="dv-mota-sp"><?=SHOW_text($arr_running['mota_'.$lang]) ?><div class="clr"></div></div>
          </ul>
        </div>
        <?php if($arr_running['khuyenmai_'.$lang] != ""){ ?>
        <div class="motion_proview">
          <ul>
            <h3><i class="fa fa-gift" aria-hidden="true"></i><?=$glo_lang['khuyen_mai'] ?></h3>
            <div class="dv-km">
              <?=SHOW_text($arr_running['khuyenmai_'.$lang]) ?>
            </div>
          </ul>
        </div>
        <?php } ?>
        <div class="add_to_cart">
          <ul>
            <h3><a href="<?=$full_url."/gio-hang/?id=".$arr_running['id'] ?>"><?=$glo_lang['dat_mua_ngay'] ?><span><?=$glo_lang['nhanh_chong_thuan_tien'] ?></span></a></h3>
            <div class="flex">
            <li><a class="cur" onclick="mua_ngay_sp('<?=$arr_running['id'] ?>');"><span class="load_360 span_is_load_cart"><i class="fa fa-spinner "></i></span> <span class="is_car_fis"><i class="fa fa-check"></i></span><?=$glo_lang['cho_vao_gio'] ?><span><?=$glo_lang['mua_tiep_san_pham_khac'] ?></span></a></li>
            <li><a href="<?=$full_url."/lien-he/" ?>"><?=$glo_lang['mua_tra_gop'] ?><span><?=$glo_lang['thu_tuc_don_gian'] ?></span></a></li>
            </div>
            <div class="clr"></div>
            <script>
              function mua_ngay_sp(id) {
                $(".span_is_load_cart").removeClass("acti");
                $(".is_car_fis").removeClass("acti");
                $(".span_is_load_cart").addClass("acti");
                $.ajax({type: "POST",url: full_url +"/mua_ngay_sp/",data: {"id" : id, "sl" : 1},
                  success: function(response){
                    $(".span_is_load_cart").removeClass("acti");
                    $(".is_car_fis").addClass("acti");
                    $(".is_num_cart").html(response);
                  }});
              }
            </script>
          </ul>
        </div>
      </div>
      <div class="fs-dtckr">
        <div class="camket_pro">
          <?php if($arr_running['thongso_'.$lang] != ""){ ?>
          <ul>
            <h3><?=$glo_lang['cau_hinh_may'] ?></h3>
            <?=SHOW_text($arr_running['thongso_'.$lang]) ?>
          </ul>
          <?php } ?>
          <?php
              $noidung    = LAYTEXT_rieng(69);
              if(is_array($noidung)){
          ?>
          <ul>
            <h3><?=SHOW_text($noidung['tenbaiviet_'.$lang]) ?></h3>
            <div class="n-cak">
                <?=SHOW_text($noidung['noidung_'.$lang]) ?>
            </div>
          </ul>
          <?php } ?>
        </div>
      </div>
      <div class="clr"></div>
    </div>
    
    <div class="padding_pagewrap" style="margin-top:30px;">
      <div class="titile_page_id">
        <ul>
          <h3><?=$glo_lang['chi_tiet_san_pham'] ?></h3>
          <div class="clr"></div>
        </ul>
      </div>
      <div class="showText">
       <?=SHOW_text($arr_running['noidung_'.$lang]) ?><div class="clr"></div>
      </div>
      <div id="sharelink">
        <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
      </div>
      <div class="dv-fb_coment">
        <?php include _source."fb_coment.php"; ?>
      </div>
    </div>
    <div class="titile_page" style="margin-top:30px;">
      <ul>
        <h3><?=$glo_lang['san_pham_lien_quan'] ?></h3>
        <div class="clr"></div>
      </ul>
    </div>
    <div class="padding_pagewrap">
      <div class="pro_home_id_2 pro_home_id_2_slider no_box box_padding">
        <!--  -->
        <?php $data = array("2","2","3","4","5","5") ?>
          <div class="owl-auto owl-carousel owl-theme flex" data0="<?=$data[0] ?>" data1="<?=$data[1] ?>" data2="<?=$data[2] ?>" data3="<?=$data[3] ?>" data4="<?=$data[4] ?>" data5="<?=$data[5] ?>" is_slidespeed="1000" is_navigation="1" is_dots="1" is_autoplay="0">
        <?php 
          while ($rows = mysql_fetch_assoc($nd_kietxuat)) {
            $gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
        ?>
          <div class="item">
            <ul>
              <!-- <?=$gia['pt'] != 0 ? '<div class="discount-tag">-'.$gia['pt']."%</div>" : "" ?> -->
              <a <?=full_href($rows) ?>>
                <li><?=full_img($rows) ?></li>
                <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
                <h4><?=$gia['text_gia'].$gia['text_km'] ?></h4>
              </a>
              <div class="view_more_pro">
                <div class="clolum_id"><a class="cur p_yeuthich p_yeuthich_<?=$rows['id'] ?>" onclick="ADD_yeuthich(this, <?=$rows['id'] ?>)" data="0"><i class="fa fa-heart-o" ></i></a></div>
                <div class="clolum_id"><a <?=full_href($rows) ?>><i class="fa fa-eye" ></i></a></div>
                <div class="clolum_id"><a href="<?=$full_url."/gio-hang/?id=".$rows['id'] ?>" ><i class="fa fa-cart-plus" ></i></a></div>
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
</div>
