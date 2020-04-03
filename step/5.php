<?php 
  if(isset($_SESSION['id'])) {
    $info_acc     = DB_fet("*", "#_members", "`id` = '".$_SESSION['id']."' AND `phanquyen` = 0", "`id` DESC", 1);
    if(mysql_num_rows($info_acc)) {
      $info_acc     = mysql_fetch_assoc($info_acc);
      foreach ($info_acc as $key => $value) {
        ${$key} = $value;
      }
    }
  }
  // full_src($thongtin_step, '')
?>


<?php 
    $bk_breadcrumb = LAY_banner_new("id = 23");
?>

<section class="images_id_page" style="background: url(<?=$fullpath."/".$bk_breadcrumb[0]['duongdantin']."/".$bk_breadcrumb[0]['icon'] ?>) no-repeat center; background-size:cover" >
    <div class="container">
      <h1 class="title_h1"><?= SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h1>

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
      <div class="left_contact">
        <ul class="list_contact no_style">
          <?php 
            $baiviet = LAY_baiviet($thongtin_step['id'], 3);
            foreach ($baiviet as $rows) {
             
          ?>
            <li>
              
              <div class="showText_lienhe">
                <h3 class="title_contact"><?=$rows['tenbaiviet_'.$lang] ?></h3>
                <?=$rows['noidung_'.$lang] ?>
                  
                </div>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="right_contact">
        <div class="box_buy_online showText_lienhe">
          <h2 class="title_sidebar white">Liên hệ</h2>
         <?php include _source . "book_now.php"; ?>
        </div>
      </div>
    </div>

    <div class="map_contact">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.3549787981183!2d108.47078561526968!3d11.949906639702773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317112ff0f349da1%3A0x48883cf1721fd9a!2zNzggSMO5bmcgVsawxqFuZywgUGjGsOG7nW5nIDksIFRow6BuaCBwaOG7kSDEkMOgIEzhuqF0LCBMw6JtIMSQ4buTbmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1585818001909!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

  </div>
</section>



