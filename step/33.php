<?php
  if((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
      $numview          = 12;
  else $numview         = $thongtin_step['num_view'];

  $key       = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
  $kv        = isset($_GET['kv']) ? $_GET['kv'] : 0;
  $is_search = isset($_GET['key']) ? true : false;

  $lay_all_kx = "";
  $name_titile      = !empty($arr_running['tenbaiviet_'.$lang]) ? SHOW_text($arr_running['tenbaiviet_'.$lang]) : "";
  if($is_search){
    $slug_step      = "2,3,4,5,6,7,8";
    $name_titile    = $glo_lang['tim_kiem']; 
    // $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '6' LIMIT 1");
    // $thongtin_step = mysql_fetch_assoc($thongtin_step);
  }
  else if($slug_table != 'step'){
      $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id'], $slug_step);
  }
  $wh = "";
  if($lay_all_kx != "")
    $wh = "  AND `id_parent` in (".$lay_all_kx.") ";
  
  if($is_search)
    $wh .= " AND (`tenbaiviet_vi` LIKE '%".$key."%' OR `tenbaiviet_en` LIKE '%".$key."%')";

  if($kv != 0) {
    $lay_all_kx = LAYDANHSACH_idkietxuat($kv, $slug_step);
    $wh .= " AND `id_parent` IN (".$lay_all_kx.")";
  }


  include _source."phantrang_kietxuat.php";
  // include _source."phantrang_danhmuc.php";

  // $anhcon   = LAY_anhstep($thongtin_step['id'], 1);
  // $retuen_arr = array();
  // while ($r   = mysql_fetch_assoc($nd_kietxuat)) {
  //   $retuen_arr[] = $r; 
  // }
  if($is_search != "") {
    $link_p = '<span>/</span>'.$glo_lang['tim_kiem']."</a>";
    $thongtin_step   = LAY_anhstep_now(3);
  }
 
  else {
    $link_p =  GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table);
  }

  // full_src($thongtin_step, '')

?>
<!-- <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li> -->
<div class="link_page">
  <ul>
    <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/') ?></li>
    <div class="clr"></div>
  </ul>
</div>
<div class="titile_page">
  <ul>
    <h3><?=$name_titile ?></h3>
    <li>
      <div class="col-md row-frm">
        <select name="city" id="city" class="form-control" onchange="window.location.href = '<?=$full_url."/".$motty."/?kv=" ?>'+$(this).val()">
          <option value="0"><?=$glo_lang['lua_chon_tinh_thanh'] ?></option>
          <?php 
            $danhmuc = LAY_danhmuc($slug_step, 0);
            foreach ($danhmuc as $rows_1) {
              if($rows_1['id_parent'] != 0) continue;
              foreach ($danhmuc as $rows) {
                if($rows['id_parent'] != $rows_1['id']) continue;
          ?>
          <option value="<?=$rows['id'] ?>" <?=isset($_GET['kv']) && $_GET['kv'] == $rows['id'] ? "selected='selected'" : "" ?>><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></option>
          <?php }} ?>
        </select>
      </div>
    </li>
    <div class="clr"></div>
  </ul>
</div>
<div class="tintuc_home_id flex">
  <?php 
    if($nd_total == 0){
        echo "<div class='dv-notfull'>".$glo_lang['khong_tim_thay_du_lieu_nao']."</div>";
    }
    else{
      while ($rows = mysql_fetch_assoc($nd_kietxuat)) { 
    ?>
    <ul>
      <li><a <?=full_href($rows) ?>><?=full_img($rows) ?></a></li>
      <h4><i class="fa fa-calendar"></i><?=CONVER_thu(date("l", $rows['ngaydang']), $glo_lang) ?>, <?=date("H:i", $rows['ngaydang']) ?> <?=$glo_lang['date'] ?> <?=date("d/m/Y", $rows['ngaydang']) ?></h4>
      <h3><a <?=full_href($rows) ?>><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></h3>
      <p><span class="lm_4"><?=SHOW_text(strip_tags($rows['mota_'.$lang])) ?></span></p>
    </ul>
  <?php }} ?>
  
  <div class="clr"></div>
</div>
<div class="nums no_box">
          <ul>
            <?=PHANTRANG($pzer, $sotrang, $full_url."/".$motty, $_SERVER['QUERY_STRING']) ?>
          </ul>
          <div class="clr"></div>
        </div>