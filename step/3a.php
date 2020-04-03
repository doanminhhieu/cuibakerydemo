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


<?php 
    $bk_breadcrumb = LAY_banner_new("id = 23");
?>

<section class="images_id_page" style="background: url(<?=$fullpath."/".$bk_breadcrumb[0]['duongdantin']."/".$bk_breadcrumb[0]['icon'] ?>) no-repeat center; background-size:cover" >
    <div class="container">
      <h2 class="title_h1"><?=$kietxuat_name ?></h2>

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

        <div class="pagewrap page_conten_page">
            <div class="title_news">
              <h1 class="title_detail"><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h1>
            </div>
            <div class="date_time">
                <span class="name_"> <i class="fa fa-calendar" aria-hidden="true"></i> <?=CONVER_thu(date("l", $arr_running['ngaydang']), $glo_lang) ?>, <?=date("H:i", $arr_running['ngaydang']) ?> <?=$glo_lang['date'] ?> <?=date("d/m/Y", $arr_running['ngaydang']) ?></span> 
            </div>

            <div class="showText cl">
              <?=SHOW_text($arr_running['noidung_'.$lang]); ?>
            </div>

            <div id="sharelink">
              <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
            </div>

            <div class="dv-fb_coment">
              <?php include _source."fb_coment.php"; ?>
            </div>
          </div>


          <?php if(count($nd_kietxuat)){ ?>
              <div class="tintuc_home_box">
                <div class="pagewrap">
                  <h2 class="title_main"><?=$glo_lang['bai_viet_lien_quan'] ?></h2>

                  <ul class="list_article_page  no_style ">
                        <?php foreach ($nd_kietxuat as $rows) { ?>
                        
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
                </div>
              </div>
              <?php } ?>

      </div>
       <div class="content_right">
        <?php include _source . "sidebar_right.php"; ?>
      </div>
    </div>
  </div>
</section>



