
<div class="sfooter">
    <div class="container">
        <h1>Củi bakery - Tiệm bánh kem sinh nhật Đà lạt</h1>
        <p>Là tiệm bánh cung cấp các loại bánh kem ngon, uy tín, an toàn, giá cả phải chăng. Với mẫu bánh phonng phú đa dạng cùng với sự phục vụ tận tình Củi bakery luôn mang lại sự hài lòng đến từng khách hàng.  </p>
    </div>
</div>


<?php include _source."banner_top.php"; ?>


<?php 
    $step = 2;
    $limit = 8;
    $where = "";
    $orderby = '';
    $col='';
    $newproduct = LAY_baiviet($step,$limit,$where,$orderby,  $col );

    // echo "<pre>";
    //  print_r($newproduct);
    // echo "</pre>";

    // die;
?>
<?php 
 if(count($newproduct)) {
 
?>
<section class="section_main section_service">
    <div class="container">
        <h2 class="title_main"><?=$glo_lang['newproduct'] ?></h2>
        <ul class="list_service slider_service cl no_style slider">
            <?php 
                  foreach ($newproduct as $rows) { 
            ?>
            <li class="item_service">
                <div class="box_item_service">
                    <div class="img_service">
                        <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                            <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], "") ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                        </a>
                    </div>

                    <div class="box_des_service">
                        <div class="price_product">
                             <?php
                                $gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
                              ?>
                            <span class="price_new"> <?=$gia['text_gia'] ?> </span>
                            <span class="price_old"><?=$gia['text_km'] ?></span>

                        </div>
                        <h3 class="title_service">
                            <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
                        </h3>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>

      
    </div>
</section>


<?php } ?>


<?php 
    $bk_register = LAY_banner_new("id = 8");
?>
<section class="section_buy_online" 
style="background: url(<?=$fullpath."/".$bk_register[0]['duongdantin']."/".$bk_register[0]['icon'] ?>) no-repeat;" >
    <div class="container">
        <div class="box_buy_online">
            <div class="header_buy_online">
                <h3> <?=$glo_lang['book_online_now'] ?></h3>
                <h2> <?=$glo_lang['contact_now'] ?></h2>
            </div>
            <div>
                <?php include "book_now.php" ?>
                
            </div>
        </div>
    </div>
</section>




<section class="section_main section_service">
    <div class="container">
        <h2 class="title_main"><?=$glo_lang['hot_product'] ?></h2>
        <ul class="list_service  cl no_style ">
            <?php 
                  foreach ($newproduct as $rows) { 
            ?>
            <li class="item_service">
                <div class="box_item_service">
                    <div class="img_service">
                        <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                            <img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                        </a>
                    </div>

                    <div class="box_des_service">
                        <div class="price_product">
                             <?php
                                $gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
                              ?>
                            <span class="price_new"> <?=$gia['text_gia'] ?> </span>
                            <span class="price_old"><?=$gia['text_km'] ?></span>
                            
                        </div>
                        <h3 class="title_service">
                            <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
                        </h3>
                       
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>

        <div class="bottom_more text_center">
            <h3><a href="http://localhost/cuicake/mau-banh-kem-da-lat" class="btn_link">xem thêm ›</a></h3>
        </div>
    </div>
</section>

<?php 
    $bk_register = LAY_banner_new("id = 9");

?>
<section class="section_album" 
style="background: url(<?=$fullpath."/".$bk_register[0]['duongdantin']."/".$bk_register[0]['icon'] ?>) no-repeat;" >
    <div class="container">
        <div class="album_main">
            <div class="header_buy_online">
                <h3> <?=$glo_lang['album_main'] ?></h3>
              
            </div>
            <div>
                <?php include "album_main.php" ?>
                
            </div>
        </div>
    </div>
</section>

<section class="section_main section_service">
    <div class="container">
        <h2 class="title_main"><?=$glo_lang['tin_tuc_su_kien'] ?></h2>
        <?php 
                $step = 4;
                $limit = 12;
                $where = "";
                $orderby = '';
                $col='';
                $new_article = LAY_baiviet($step,$limit,$where,$orderby,  $col);

        ?>
        <?php if($new_article) { ?>
            <ul class="list_article list_article_towline no_style cl  blog_slider slider">
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

        <?php  } ?>

    </div>
</section>
