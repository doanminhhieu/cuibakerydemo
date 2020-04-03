<?php
  if((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
      $numview          = 12;
  else $numview         = $thongtin_step['num_view'];

  $key       = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
  $is_search = isset($_GET['key']) ? true : false;

  $lay_all_kx = "";
  if($is_search){
    $lay_all_kx     = LAYDANHSACH_idkietxuat(0, $slug_step);
    $slug_step      = 4;

    $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '$slug_step' LIMIT 1");
    $thongtin_step = mysql_fetch_assoc($thongtin_step);
  }
  else if($slug_table != 'step'){
      $lay_all_kx  = LAYDANHSACH_idkietxuat($arr_running['id'], $slug_step);
  }
  $wh = "";
  if($lay_all_kx != ""){
    $wh = "  AND `id_parent` in (".$lay_all_kx.") ";
  }
  
  if($is_search){
    $wh .= " AND (`tenbaiviet_vi` LIKE '%".$key."%' OR `tenbaiviet_en` LIKE '%".$key."%')";
  }


  include _source."phantrang_kietxuat.php";
?>
<?php include _source."left_menu.php";?>
<div class="right_home">
  <div class="conten_page">
    
    <div class="titile_page"><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></div>
    <div class="pro_id pro_id_load_js_video dv-danhsachpto flex">
      <?php 
        if($nd_total == 0){
          echo "<div class='dv-notfull'>".$glo_lang['khong_tim_thay_du_lieu_nao']."</div>";
        }
        else{
          while ($rows = mysql_fetch_array($nd_kietxuat)) 
            { 
      ?>
      <ul>
        <a <?=full_href($rows) ?>>
        <li><?=full_img($rows) ?></li>
        <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
        </a>
      </ul>
      <?php }} ?>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="dv-img-load-js ajax_img_loading button_readmore" style="text-align: center; display: none">
      <img src="images/loader.gif" alt="" style=" height: 50px;">
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $(window).scroll(function(){
      var cthem = 1;
      if($(document).width() < 991) cthem = 100;
        if($(window).scrollTop() + cthem >= $(document).height()-$(window).height()){
          LOAD_ajax_product('<?=$full_url."/load-products-ajax/hinh-anh/" ?>', '<?=$slug_step ?>', '<?=$nd_total ?>', '<?=$numview ?>', '' )
        }
    });
  });
</script>
