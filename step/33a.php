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

  $wh           = "  AND `id` <>  '".$arr_running['id']."'";
  // $wh           = "  AND `id_parent` in (".$lay_all_kx.") AND `id` <>  '".$arr_running['id']."'";
  $numview      = 12;

  $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh ORDER BY `catasort` DESC LIMIT 0,$numview");
  // $nd_total = DB_que("SELECT `id` FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh");
  // $nd_total = mysql_num_rows($nd_total);
  // $retuen_arr = array();
  // while ($r   = mysql_fetch_assoc($nd_kietxuat)) {
  //   $retuen_arr[] = $r; 
  // }
  // $anhcon   = LAY_anhstep($thongtin_step['id'], 1);
  $img_bg = checkImage($fullpath, $thongtin_step['icon'], $thongtin_step['duongdantin']);
 
  if($arr_running['icon_hover'] != "") {
    $img_bg = checkImage($fullpath, $arr_running['icon_hover'], $arr_running['duongdantin']);
  }
  // full_src($thongtin_step, '')
?>
<!-- <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li> -->
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
  <div class="title_news">
    <h2><?=SHOW_text($arr_running['tenbaiviet_'.$_SESSION['lang']]) ?></h2>
    <li><?=CONVER_thu(date("l", $arr_running['ngaydang']), $glo_lang) ?>, <?=date("H:i", $arr_running['ngaydang']) ?> <?=$glo_lang['date'] ?> <?=date("d/m/Y", $arr_running['ngaydang']) ?></li>
  </div>
  <div class="showText">
    <?=SHOW_text($arr_running['noidung_'.$_SESSION['lang']]) ?><div class="clr"></div>
  </div>
  <div id="sharelink">
      <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
    </div>
    <div class="dv-fb_coment">
      <?php include _source."fb_coment.php"; ?>
    </div>
</div>

<div class="titile_page" style="padding-top:20px;">
  <ul>
    <h3><?=$glo_lang['cac_dai_ly_khac'] ?></h3>
    <div class="clr"></div>
  </ul>
</div>
<div class="tintuc_home_id tintuc_home_id_slider no_box">
  <!--  -->
  <?php $data = array("1","1","2","3","3","3") ?>
    <div class="owl-auto owl-carousel owl-theme flex" data0="<?=$data[0] ?>" data1="<?=$data[1] ?>" data2="<?=$data[2] ?>" data3="<?=$data[3] ?>" data4="<?=$data[4] ?>" data5="<?=$data[5] ?>" is_slidespeed="1000" is_navigation="1" is_dots="1" is_autoplay="1">
  <?php 
    while ($rows   = mysql_fetch_assoc($nd_kietxuat)) {
  ?>
    <div class="item">
      <ul>
        <li><a <?=full_href($rows) ?>><img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"></a></li>
        <h4><i class="fa fa-calendar"></i><?=CONVER_thu(date("l", $rows['ngaydang']), $glo_lang) ?>, <?=date("H:i", $rows['ngaydang']) ?> <?=$glo_lang['date'] ?> <?=date("d/m/Y", $rows['ngaydang']) ?></h4>
        <h3><a <?=full_href($rows) ?>><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></h3>
         <p><span class="lm_4"><?=SHOW_text(strip_tags($rows['mota_'.$lang])) ?></span></p>
      </ul>
    </div>
   <?php } ?>
  </div>
  <div class="clr"></div>
  <!--  --> 
</div>
