<?php
  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $slug_step = isset($_GET['st']) ? $_GET['st'] : 0;
  $tinhnang_arr = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 AND `step` = '".$slug_step."' ","`catasort` ASC, `id` DESC","","arr", 1);
  $check_hang = DB_que("SELECT `id_val` FROM `#_baiviet_select_tinhnang` WHERE `id_tinhnang` = 1 AND `id_baiviet` = '".$id."' AND `show` = 1 LIMIT 1");
  $is_check_hang = mysql_result($check_hang, 0, "id_val");
  $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '1' LIMIT 1");
  $thongtin_step = mysql_fetch_assoc($thongtin_step);
?>
<div class="poup_page">
  <div class="title_right_pro_view"><?=$glo_lang['thong_so_ky_thuat'] ?></div>
    <div class="thongso_pro">
      <?php
        $baiviet_select_tinhnang = AOK("*","`#_baiviet_select_tinhnang`","`show` = 1 AND `id_baiviet` = '".$id."'","","","id_tinhnang","1");

        $baiviet_tinhnang = LAY_bv_tinhnang($slug_step, 0, "`khong_xoa` = 0 AND `loai_hienthi` = 0","");
        $i = 0;
        foreach ($baiviet_tinhnang as $rows) {
          $tinhnang_child = LAY_bv_tinhnang($slug_step, 0, "`id_parent` = '".$rows['id']."'","");
          $i++;
      ?>
      <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
      <?php
          if($i == 1){
            if(!empty($tinhnang_arr[@$is_check_hang])){
          ?>
        <ul>
          <p><?=SHOW_text($tinhnang_arr[1]['tenbaiviet_'.$lang]) ?></p>
          <li>
            <a href="<?=$full_url."/".$thongtin_step['seo_name']."/?th=".$is_check_hang ?>"><?=SHOW_text($tinhnang_arr[$is_check_hang]['tenbaiviet_'.$lang]) ?></a>
          </li>
          <div class="clr"></div>
        </ul>
        <?php }} ?>
      <?php foreach ($tinhnang_child as $rows_2) { if(empty($baiviet_select_tinhnang[$rows_2['id']])) continue; ?>
      <ul>
        <p><?=SHOW_text($rows_2['tenbaiviet_'.$lang]) ?></p>
        <li>
          <?=SHOW_text($baiviet_select_tinhnang[$rows_2['id']]['mota_'.$lang]) ?>
        </li>
        <div class="clr"></div>
      </ul>
      <?php }} ?>
    </div>
</div>