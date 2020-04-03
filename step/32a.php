<?php 
  if($motty   == "404"){
    $nd_404      = DB_fet_rd("*","`#_seo_name` "," `id` = 1 ","",1);
    $arr_running = reset($nd_404);
    $bre         = SHOW_text($arr_running['tenbaiviet_'.$_SESSION['lang']]);
  }

?>

<?php 

    $danhmuc = LAY_danhmuc($slug_step, 4, "`id_parent` = 0",1);
    $bk_breadcrumb = LAY_banner_new("id = 23");

?>

<section class="images_id_page" style="background: url(<?=$fullpath."/".$bk_breadcrumb[0]['duongdantin']."/".$bk_breadcrumb[0]['icon'] ?>) no-repeat center; background-size:cover" >
    <div class="container">
      <h1 class="title_h1"><?=$danhmuc[0]['tenbaiviet_'.$lang] ?></h1>

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
         <div class="description_about">
          <?php //print_r($danhmuc)?>
           <?=isset($danhmuc[0]["mota_".$lang])?$danhmuc[0]["mota_".$lang]:""?>
           <?=isset($danhmuc[0]["noidung_".$lang])?$danhmuc[0]["noidung_".$lang]:""?>
         </div>
      </div>

      <div class="content_right">
        <?php include _source . "sidebar_right.php"; ?>
      </div>

    </div>
  </div>
</section>

