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


<?php 
    $bk_breadcrumb = LAY_banner_new("id = 23");
?>

<section class="images_id_page" style="background: url(<?=$fullpath."/".$bk_breadcrumb[0]['duongdantin']."/".$bk_breadcrumb[0]['icon'] ?>) no-repeat center; background-size:cover" >
    <div class="container">
      <h1 class="title_h1"><?=$name_titile ?></h1>

    </div>
</section>

<section class="breadcrumb">
  <div class="container">
    <ul class="no_style">
      <li>
        <i class="fa fa-home"></i>
        <a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a>
      </li>
      <li>
        <?=GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/') ?>
      </li>
     
    </ul>
  </div>
</section>


<section class="content_page">
  <div class="container">
    <div class="box_content flex">
      <div class="content_left">

        <ul class="list_article list_article_towline no_style cl ">
                 <?php  foreach ($new_article as $rows) { ?>

                    <li class="item_article">
                        <div class="box_article">
                            <div class="img_article">
                                <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                                    <img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                                </a>
                            </div>
                            <div class="des_article">
                                <div class="date_time">
                                    <span class="name_"> <i class="fa fa-calendar" aria-hidden="true"></i> <?=date("d/m/Y", $rows['ngaydang'])?></span> 
                                </div>
                                <div class="box_title">
                                    <h3 class="title_article">
                                     <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"> 
                                     <?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
              
            </ul>



           
              <div class="tintuc_home_id ">
                <?php 
                  if($nd_total == 0){
                    echo "<div class='dv-notfull'>".$glo_lang['khong_tim_thay_du_lieu_nao']."</div>";
                  }
                  else{ ?>

                    <ul class="list_article_page  no_style ">
                        <?php    foreach ($nd_kietxuat as $rows) {  ?>
                        
                            <li class="item_article">
                                <div class="box_article">

                                   <div class="img_article">
                                        <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                                            <img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                                        </a>
                                  </div>
                                   <div class="des_article">
                                        
                                        <div class="box_title">
                                            <h3 class="title_article">
                                             <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"> 
                                             <?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
                                            </h3>
                                        </div>
                                        <div class="date_time">
                                            <span class="name_"> <i class="fa fa-calendar" aria-hidden="true"></i> <?=date("d/m/Y", $rows['ngaydang'])?></span> 
                                        </div>
                                        <div class="short_article">
                                            <?= isset($rows['mota_'.$lang])?$rows['mota_'.$lang]:'' ?>
                                        </div>
                                        <a class="view_more" <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?> "> Xem thêm </a>

                                    </div>

                                </div>
                            </li>
                        <?php } ?>
                     </ul>

              <?php } ?>
                
              
              </div>
              <div class="nums no_box">
                <?=PHANTRANG($pzer, $sotrang, $full_url."/".$motty, $_SERVER['QUERY_STRING']) ?>
                <div class="clr"></div>
              </div>
           
      </div>
       <div class="content_right">
        <?php include _source . "sidebar_right.php"; ?>
      </div>
    </div>
  </div>
</section>
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

