<?php
  if((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
      $numview          = 12;
  else $numview         = $thongtin_step['num_view'];

  $key       = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
  $is_search = isset($_GET['key']) ? true : false;

  $lay_all_kx = "";
  $name_titile      = !empty($arr_running['tenbaiviet_'.$lang]) ? SHOW_text($arr_running['tenbaiviet_'.$lang]) : "";
  if($is_search){
    $slug_step      = "1,3,4";
    $name_titile    = $glo_lang['tim_kiem']; 
    // $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '6' LIMIT 1");
    // $thongtin_step = mysql_fetch_assoc($thongtin_step);
  }
  else if($slug_table != 'step'){
      $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id'], $slug_step);
  }
  $wh = "";
  if($lay_all_kx != "") {
    $wh = "  AND `id_parent` in (".$lay_all_kx.") ";
  }
  
  if($is_search) {
    $wh .= " AND (`tenbaiviet_vi` LIKE '%".$key."%' OR `tenbaiviet_en` LIKE '%".$key."%')";
  }

  // //check tieu thuyet
  if($slug_step == 1) {
    $wh .= " AND `id_baiviet` = 0";
  }
  //
  if($slug_table == "step") {
    $id_dmtop    = LAY_danhmuc($slug_step, 1);
    $arr_running = reset($id_dmtop);
    $lay_all_kx  = LAYDANHSACH_idkietxuat($arr_running['id'], $slug_step);
    $wh         .= "  AND `id_parent` in (".$lay_all_kx.") ";
  }
  //

  include _source."phantrang_kietxuat.php";
  // include _source."phantrang_danhmuc.php";

  // $anhcon   = LAY_anhstep($thongtin_step['id'], 1);

  if($is_search != "") {
    $link_p = '<span>/</span><a>'.$glo_lang['tim_kiem']."</a>";
    $thongtin_step   = LAY_anhstep_now(3);
  }
 
  else {
    $link_p =  GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/');
  }

  // full_src($thongtin_step, '')
 
?>
<div class="link_title" style="background-image:url(<?=full_src($thongtin_step, '') ?>);">
  <div class="pagewrap">
    <h3><?=$name_titile ?></h3>
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/') ?></li>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<?php
  if(!empty($slug_step)){
  $danhmuc = LAY_danhmuc($slug_step);
  if(count($danhmuc) > 1) {
?>
<div id="pro_tabs">
  <div class="box_tab">
    <ul class="listtabs">
      <?php foreach ($danhmuc as $rows) { ?>
      <li><a <?=full_href($rows) ?> class="<?=$rows['id'] == $arr_running['id'] ? "selected" : "" ?>"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></li>
      <?php } ?>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<?php }} ?>
<div class="pagewrap page_conten_page">
  <div class="cohoi_cv flex no_box">
    <?php 
      if($nd_total == 0){
        echo "<div class='dv-notfull'>".$glo_lang['khong_tim_thay_du_lieu_nao']."</div>";
      }
      else{
        $i = 0;
        foreach ($nd_kietxuat as $rows) {
          $i++;
          if($i == 6) $i = 1;
    ?>
    <ul class="color_<?=$i ?>">
      <li>
        <?php if($rows['noidung_'.$lang] != ""){ ?><a <?=full_href($rows) ?>><?php } ?>
          <?=full_img($rows, '') ?>
        <?php if($rows['noidung_'.$lang] != ""){ ?></a><?php } ?>
      </li>
      <h3>
        <?php if($rows['noidung_'.$lang] != ""){ ?><a <?=full_href($rows) ?>><?php } ?>
          <?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>
        <?php if($rows['noidung_'.$lang] != ""){ ?></a><?php } ?>
      </h3>
    </ul>
    <?php }} ?>
  <div class="clr"></div>
  </div>
  <div class="nums no_box">
    <?=PHANTRANG($pzer, $sotrang, $full_url."/".$motty, $_SERVER['QUERY_STRING']) ?>
    <div class="clr"></div>
  </div>
</div>