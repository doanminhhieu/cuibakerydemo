<?php
  if((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
      $numview          = 12;
  else $numview         = $thongtin_step['num_view'];

  $key       = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
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


<div class="breadcrumb-agile" style="background: url(<?=full_src($thongtin_step, '') ?>) no-repeat top center fixed;background-size: cover;">
    <div class="container">
         <h1 class="title_h1"><?=$name_titile ?></h1>
     </div>
</div>
<div class="box_breadcrumb_agile">
    <div class="container">
        <ul class="bread_link no_style" style="margin-left: 0;">
            <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/') ?></li>
        </ul>
    </div>
</div>

<div class="content_page_child"> 
    <div class="container">

            <ul class="list_Coach no_style">
              <?php 
                if($nd_total == 0){
                    echo "<div class='dv-notfull'>".$glo_lang['khong_tim_thay_du_lieu_nao']."</div>";
                }
                else{
                  while ($rows = mysql_fetch_assoc($nd_kietxuat)) { 
                    
                ?>
              <li>
                  <div class="info_coach">

                      <div class="box_introtion flex_wap">
                          <div class="img_coach_golf">
                            <a <?=full_href($rows) ?>>
                              <?=full_img($rows) ?>
                            </a>
                          </div>
                          <div class="introduction">
                              <a <?=full_href($rows) ?>><h3 class="name_golf_Coach">
                                <?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>
                              </h3></a>
                              <div class="dv-mota-cos">
                                <?=SHOW_text($rows['mota_'.$lang]) ?>
                              </div>                
                          </div>
                      </div>

                      <div class="des_coach">
                        <?=SHOW_text($rows['noidung_'.$lang]) ?>

                      </div>  
                  </div>
              </li>
              <?php }} ?>
              
            </ul>

            <div class="nums no_box">
              <ul>
                <?=PHANTRANG($pzer, $sotrang, $full_url."/".$motty, $_SERVER['QUERY_STRING']) ?>
              </ul>
              <div class="clr"></div>
            </div>
    </div>
</div>
