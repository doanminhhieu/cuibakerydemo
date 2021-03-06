<?php

  $kietxuat_name = DB_fet_rd("*", "#_danhmuc", "`step` = '".$slug_step."' AND `id` = '".$arr_running['id_parent']."'", "`id` DESC", 1, "id");

  if(empty($kietxuat_name)) 
    $kietxuat_name = $thongtin_step['tenbaiviet_'.$lang];
  else
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_'.$lang];

  $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);

  $wh           = "";// "  AND `id_parent` in (".$lay_all_kx.") AND `id` <>  '".$arr_running['id']."'";
  $numview      = 7;
  // $nd_kietxuat  = DB_fet(" * "," `#_baiviet` "," `showhi` =  1 AND `step` IN (".$slug_step.") $wh "," `catasort` DESC "," $numview","arr");
  $nd_kietxuat  = DB_fet_rd(" * "," `#_baiviet` ","  `step` IN (".$slug_step.") $wh "," `catasort` DESC, `id` DESC ", $numview);
  if(!count($nd_kietxuat)) {
    $nd_kietxuat  = DB_fet_rd(" * "," `#_baiviet` ","  `step` IN (".$slug_step.")"," RAND() ", $numview);
  }


  // $nd_total = DB_que("SELECT `id` FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh");
  // $nd_total = mysql_num_rows($nd_total);

  $list_hinhcon = LAY_hinhanhcon($arr_running['id'], 50);
  $list_model = LAY_baiviet_chitiet($arr_running['id'], 50);

  // $tinhnang_arr = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 AND `step` = '".$slug_step."' ","`catasort` ASC, `id` DESC","","arr", 1);
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

  <div class="container ">
        <div class="info_product_detail">
            <div class="box_product_detail">
                <div class="left_info">
                    <div class="box_info_left">
                      <?php if(count($list_model) > 0){ ?>
                        <div class="box_slider_for">
                            <div class="slider-for">

                                <?php
                                 foreach ($list_model as $rows) {
                                ?>
                                 <div class="zoom_img">
                                   <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], "") ?>" alt="">
                                </div>

                                  <?php } ?>

                            </div>
                        </div>
                        <div class="box_slider_nav">
                            <div class="slider-nav slick_slider ">

                              <?php
                                 foreach ($list_model as $rows) {
                                ?>
                                 <div data-idModel = "<?=$rows["id"]?>" data-Model = "<?=$rows["seo_name"]?>">
                                   <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], "thumbnew_") ?>" alt="">
                                </div>

                                  <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>

                            <a href='<?=checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>' class='cloud-zoom' id='zoom1' rel="position: 'inside' , showTitle: false, adjustX:0, adjustY:0"><img src="<?=checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>"></a> 

                    <?php } ?>
                    </div>
                </div>


                <div class="right_info">
                    <div class="box_info_right">
                        <h1 class="title_detail"><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h1>
                        <form action="<?=$full_url."/gio-hang/" ?>" method="post">
                        <div class="intro_detail_product">
                           

                              <ul class="desc no_style">
                                
                                <div class="dv-mota-sp"><?=SHOW_text($arr_running['mota_'.$lang]) ?><div class="clr"></div></div>
                                
                              </ul>

                               <?php
                                $gia = GET_gia($arr_running['giatien'], $arr_running['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
                              ?>
                              <div class="price_box"> 
                               
                                <span class="price_detail"> <?=$gia['text_gia']?> </span>
                                <span><?=$gia['text_km'] ?></span>
                              </div>
                        </div>
                        <?php if(count($list_model)>0) { ?>

                          <div class="chon_model">
                              <h3>Chọn Mẫu <span class="click_text">(click vô hình để chọn mẫu)</span></h3>
                              <div class="no_style">
                                  <label class="active">
                                    <input class="model"  checked="" type="hidden" name="model" value="<?=$list_model[0]["seo_name"]?>" >
                                    <input class="id_model"  checked="" type="hidden" name="id_model" value="<?=$list_model[0]["id"]?>" >
                                    <span class="text_model"><?=$list_model[0]["seo_name"]?></span>
                                  </label>
                              </div>
                          </div>
                        <?php } ?>
                        <?php if ($gia['gia'] != 0) { ?>
                         <?php 
                              for ($k=1; $k <= 3 ; $k++) {  
                              if($arr_running['thuoc_tinh_'.$k.'_vi'] != "" && $arr_running['gia_tri_'.$k.'_vi'] != ''){ 
                            ?>
                            <div class="chon_size">
                              <h3><?=$arr_running['thuoc_tinh_'.$k.'_'.$lang] ?></h3>
                              <ul class="no_style">
                                <?php 
                                  ${'gia_tri_'.$k.'_vi'} = explode(",", $arr_running['gia_tri_'.$k.'_vi']);
                                  $val          = explode(",", $arr_running['gia_tri_'.$k.'_'.$lang]);
                                  for ($i=0; $i < count(${'gia_tri_'.$k.'_vi'}); $i++) {  
                                ?>
                                <li class="<?=$i==0?"active":""?>">
                                  <input class="js_tinhnang_getval" <?=$i==0?"checked":""?> type="radio" name="tinhnang_<?=$k ?>" value="<?=${'gia_tri_'.$k.'_vi'}[$i] ?>" id="id_tn_<?=$k ?>_<?=$val[$i] ?>">
                                  <label for="id_tn_<?=$k ?>_<?=$val[$i] ?>"><?=$val[$i] ?></label>
                                </li>
                                <?php } ?>
                                
                              </ul>
                            </div>
                            <?php }} ?>

                            <div class="number_buy">
                                <h3>Số Lượng: </h3>
                                <input type="number" name="qty_cart" id="qty_cart" max="50" min="1" value="1">
                            </div>

                            <input type="hidden" name="id" class="js_idbv" value="<?=$arr_running['id'] ?>">
                             <ul class="list_btn_contact_buy no_style">
                                <li class="btn_buy_now">
                                  <button type="submit" class="btn_contact_buy" name="mua_ngay"><?=$glo_lang['mua_ngay'] ?></button>
                                </li>
                                <li class="btn_buy_more">
                                  <a href="" class="btn_contact_buy " data-fancybox="" data-src="#quick_advisory">Cần tư vấn thêm</a>
                                </li>
                                <li class="btn_buy_call">
                                  <a href="tel:0918.036.835" class="btn_contact_buy ">Gọi ngay</a>
                                </li>
                            </ul>
                          <?php } ?>
          
                            </form>
                        <?php  if ($gia['gia'] == 0) { ?>

                                  <div class="box_buy_online box_ft_online contact_detail ">
                                    <p class="noti_sent_phone"> Gửi SĐT chúng tôi sẽ gọi lại cho bạn ngay !</p>
                                      <form action="" class="formBox no_box" method="post" accept-charset="UTF-8" name="formnamecontact3" id="formnamecontact3">
                                      <input type="hidden" name="send_lienhe">
                                      <input type="hidden" class="lang_ok" value="<?=$glo_lang['yeu_cau_cua_ban_da_duoc_gui'] ?>">
                                     

                                        <div class="phone">
                                          <input type="hidden" name="s_dienthoai_s" value="<?=base64_encode($glo_lang['so_dien_thoai']) ?>">
                                          <input class="cls_data_check_form_3" data-rong="1"  name="s_dienthoai" id="s_dienthoai" type="text" placeholder="<?=$glo_lang['so_dien_thoai'] ?> (*)" value="<?=!empty($_POST['s_dienthoai']) ? $_POST['s_dienthoai'] : @$sodienthoai ?>" onFocus="if (this.value == '<?=$glo_lang['so_dien_thoai'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['so_dien_thoai'] ?> (*)';}" data-name="<?=$glo_lang['so_dien_thoai'] ?> (*)" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>" data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>"/>
                                        </div>

                                       
                                           <div class="code">
                                            <span><img src="<?=$full_url."/load-capcha/" ?>" alt="CAPTCHA code" onclick="$(this).attr('src','<?=$full_url."/load-capcha/" ?>')" class="img_contact_cap"><i class="fa fa-refresh"  onclick="$('#formnamecontact3 .img_contact_cap').attr('src','<?=$full_url."/load-capcha/" ?>')"></i></span>
                                            <input class="cls_data_check_form_3" data-rong="1" name="mabaove" class="mabaove" type="text" placeholder="<?=$glo_lang['ma_bao_ve'] ?> (*)" value="" onFocus="if (this.value == '<?=$glo_lang['ma_bao_ve'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['ma_bao_ve'] ?> (*)';}" data-msso="<?=$glo_lang['vui_long_nhap_ma_bao_ve'] ?>"/>
                                          </div>
                                        
                                       
                                        <a onclick="return CHECK_send_lienhe('<?=$full_url ?>/','#formnamecontact3', '.cls_data_check_form_3')" style="cursor:pointer" class="button"><?=$glo_lang['gui']  ?> <img src="images/loading2.gif" class="ajax_img_loading"></a>   
                                    </form>
                                  </div>

                           <?php } ?>

                        <div id="sharelink">
                          <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                        </div>
                  </div> 
                </div>

            </div>
        </div>
  </div>

  <div class="box_quick_view" id="quick_advisory" style="width: 1000px;position: relative;overflow: hidden;display: none;">
    <?php 
    $bk_register = LAY_banner_new("id = 8");
?>
    <div class="section_buy_online" 
style="background: url(<?=$fullpath."/".$bk_register[0]['duongdantin']."/".$bk_register[0]['icon'] ?>) no-repeat;" >
    <div class="container">
        <div class="box_buy_online">
            <div class="header_buy_online">
                <h3> Liên hệ để được tư vấn ngay </h3>
                <h2> <?=$glo_lang['contact_now'] ?></h2>
            </div>
            <div>
                <?php include _source."book_now.php" ?>
            </div>
        </div>
    </div>
</div>

     <?php //include _source . "book_now.php"; ?>
  </div>



  <div class="box_link_scroll">
      <div class="container">
          <ul class="no_style list_link_scroll">
              <li><a href="#section_1" class="scroll" >Thông tin sản phẩm</a></li>
              <li><a  href="#section_2" class="scroll">Đánh giá</a></li>
          </ul>
      </div>
  </div>


  <div class="container">
          <div id="section_1" class="group background_white">
              <div>
                 <?=isset($arr_running['noidung_'.$lang])?$arr_running['noidung_'.$lang]:""?>
              </div>
              <div>
                <?=isset($thongtin['sign_pro'])?$thongtin['sign_pro']:""?>
              </div>
            

          </div>
          <div id="section_2" class="group background_white">
              <?php include _source."fb_coment.php"; ?>
          
          </div>
  </div>



    <?php //print_r($arr_running) ?>


<div class="product_related">
   <div class="container">
      <h2 class="title_main"><?=$glo_lang['san_pham_goi_y'] ?></h2>

      <ul class="list_service slider_service cl no_style slider">
          <?php 
                 foreach ($nd_kietxuat as $rows) {
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
</div>


</section>

 





