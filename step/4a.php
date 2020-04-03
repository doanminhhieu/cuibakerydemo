<?php
  $kietxuat_name = DB_fet_rd("*", "#_danhmuc", "`step` = '".$slug_step."' AND `id` = '".$arr_running['id_parent']."'", "`id` DESC", 1, "id");
  if(empty($kietxuat_name)) {
    $kietxuat_name = $thongtin_step['tenbaiviet_'.$lang];
  }
  else {
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_'.$lang];
  }

  $lay_all_kx   = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);

  $wh           = "  AND `id_parent` in (".$lay_all_kx.") AND `id` <>  '".$arr_running['id']."'";
  $numview      = 6;

  $nd_kietxuat  = DB_fet_rd(" * "," `#_baiviet` "," `step` IN (".$slug_step.") $wh "," `catasort` DESC ", $numview);
  // $nd_total = DB_que("SELECT `id` FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh");
  // $nd_total = mysql_num_rows($nd_total);
  // $retuen_arr = array();
  // while ($r   = mysql_fetch_assoc($nd_kietxuat)) {
  //   $retuen_arr[] = $r; 
  // }
  // $anhcon   = LAY_anhstep($thongtin_step['id'], 1);
  // $img_bg = checkImage($fullpath, $thongtin_step['icon'], $thongtin_step['duongdantin']);
 
  // if($arr_running['icon_hover'] != "") {
  //   $img_bg = checkImage($fullpath, $arr_running['icon_hover'], $arr_running['duongdantin']);
  // }
  // full_src($thongtin_step, '')

?>
<!-- <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li> -->
<div class="link_title" style="background-image:url(<?=full_src($thongtin_step, '') ?>);">
  <div class="pagewrap">
    <h3><?=$kietxuat_name ?></h3>
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/') ?></li>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<div class="pagewrap page_conten_page">
  <div class="title_news">
    <h2><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h2>
    <li><?=CONVER_thu(date("l", $arr_running['ngaydang']), $glo_lang) ?>, <?=date("H:i", $arr_running['ngaydang']) ?> <?=$glo_lang['date'] ?> <?=date("d/m/Y", $arr_running['ngaydang']) ?></li>
  </div>
  <div class="showText">
    <?=SHOW_text($arr_running['noidung_'.$lang]); ?><div class="clr"></div>
  </div>
  <div id="sharelink">
    <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
  </div>
  <div class="dv-fb_coment">
    <?php include _source."fb_coment.php"; ?>
  </div>
</div>
