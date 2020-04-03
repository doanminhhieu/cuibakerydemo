<?php
  $kietxuat_name = DB_fet("*", "#_danhmuc", "`showhi` = 1 AND `step` = '".$slug_step."' AND `id` = '".$arr_running['id_parent']."'", "`id` DESC", 1, "arr", 1);
  if(empty($kietxuat_name)) 
    $kietxuat_name = $thongtin_step['tenbaiviet_'.$lang];
  else
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_'.$lang];

  if($slug_table == 'step'){
      $lay_all_kx = LAYDANHSACH_idkietxuat(0, $slug_step);
  }
  else{
      $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);
  }

  $wh = " AND `id` <> '".$arr_running['id']."' ";
  $numview = 6;
  $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh ORDER BY `catasort` DESC LIMIT 0,$numview");

?>
<?php include _source."left_menu.php";?>
<div class="right_home">
  <div class="conten_page">
    <div class="titile_page"><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></div>
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
</div>