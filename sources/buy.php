<?php
  if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
      // ALERT_js($glo_lang['hien_chua_co_san_pham_nao_trong_gio_hang']);
      LOCATION_js($full_url);
    }
  
  $thongtin_step  = DB_que("SELECT * FROM `#_step` WHERE `showhi` = 1 AND `id` = 3 LIMIT 1");
  $thongtin_step  = mysql_fetch_assoc($thongtin_step);

  $link_cart      = GET_link($full_url, SHOW_text(laySeoName('seo_name', '#_step', '`showhi` = 1 AND `step` = 2')));
  if(isset($_SESSION['email']))
  {
    $info_acc     = DB_fet("*", "#_members", "`email` = '".$_SESSION['email']."' AND `phanquyen` = 0", "`id` DESC");
    $info_acc     = mysql_fetch_assoc($info_acc);
    $hoten        = $info_acc['hoten'];
    $sodienthoai  = $info_acc['sodienthoai'];
    $email        = $info_acc['email'];
    $diachi       = $info_acc['diachi'];
  }
  else
  {
    $hoten        = '';
    $sodienthoai  = '';
    $email        = '';
    $diachi       = '';
  }
  $thongtin_step   = LAY_anhstep_now(LAY_id_step(1));
?>



<?php 
    $bk_breadcrumb = LAY_banner_new("id = 23");
?>

<section class="images_id_page" style="background: url(<?=$fullpath."/".$bk_breadcrumb[0]['duongdantin']."/".$bk_breadcrumb[0]['icon'] ?>) no-repeat center; background-size:cover" >
    <div class="container">
      <h1 class="title_h1"><?=$glo_lang['dat_hang'] ?></h1>
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
        <span>/</span><span><?=$glo_lang['dat_hang'] ?></span>
      </li>
     
    </ul>
  </div>
</section>



<section class="content_page">
   <div class="box_cart">
  <div class="container">
    <div class="pagewrap page_conten_page page_conten_page_dh "  style="padding-top: 0">
        <!--  -->
      
          <form action="" class="formBox" method="post" name="FormNameContact_cart" id="FormNameContact_cart">
          <div id="cart_list" class="buy_cart_list">
            <h2><?=$glo_lang['thong_tin_don_hang'] ?></h2>

                <div class="dv-table-reposive tb_rps">
                  <table width="100%" border="0" cellspacing="1" cellpadding="5">
                    <tr>
                      <th><?=$glo_lang['cart_ten_sp'] ?></th>
                      <th width="10%" class="text-center"><?=$glo_lang['cart_qty'] ?></th>
                      <th width="15%" style="text-align:right"><?=$glo_lang['cart_dongia'] ?></th>
                      <th width="15%" style="text-align:right"><?=$glo_lang['cart_thanhtien'] ?></th>
                    </tr>
                    <?php 
                      $tongtien      = 0;
                      $stt           = 0;
                      $tinhnang_arr  = LAY_bv_tinhnang(LAY_id_step(2));
                      foreach ($_SESSION['cart'] as $key => $value) { 
                          $id_sp     = explode("_", $key);
                          $id_sp     = $id_sp[0];

                          $sanpham   = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` = 1 AND `id` = '".$id_sp."' LIMIT 1");
                          if(mysql_num_rows($sanpham) > 0) {
                            $sanpham    = mysql_fetch_assoc($sanpham);

                            $dongia     = check_gia_sql($id_sp, @$_SESSION['tinhnang'][$key], $sanpham['giatien']);
                            $thuoctinh  = thuoctinh_lang($sanpham, $lang);

                            $thanhtien = $dongia * $value;
                            $tongtien  += $thanhtien;
                            $stt       ++;
                            $tinhnang_arr  = @DB_fet("*","#_baiviet_tinhnang","`id` IN (".@$_SESSION['tinhnang'][$id_sp].")","`catasort` DESC","","arr");
                    ?>
                    <tr>
                        <!-- <td class="cls_cart_mb" title="<?=$glo_lang['cart_hinh'] ?>"><?=$stt ?></td> -->
                        <td style="text-align:left" title="<?=$glo_lang['cart_ten_sp'] ?>" class="dv-anh-cart-sp">
                          <a href="<?=GET_link($full_url, SHOW_text($sanpham['seo_name'])) ?>"><img src="<?=checkImage($fullpath, $sanpham['icon'], $sanpham['duongdantin'], 'thumb_') ?>" alt="<?=SHOW_text($sanpham['tenbaiviet_'.$_SESSION['lang']]) ?>"/></a>
                          <div class="dv-anh">

                              <a href="<?=GET_link($full_url, SHOW_text($sanpham['seo_name'])) ?>"><?=SHOW_text($sanpham['tenbaiviet_'.$_SESSION['lang']]) ?></a>
                              <p><?=SHOW_text($sanpham['p1']) ?></p> 
                              <p class="p_mota_cart">
                                <?php 
                                // foreach ($tinhnang_arr as $tnr) {
                                //    echo '<span>'.$tnr['tenbaiviet_'.$lang].'</span>';
                                // } 
                                ?>
                                <?php 
                                  $isthuoctinh = @explode(",", $_SESSION['tinhnang'][$key]);
                                  if(is_array($isthuoctinh)) {
                                    foreach ($isthuoctinh as $ittinh) { 
                                      if(@$thuoctinh[$ittinh] == "") continue;
                                      echo '<span>'.$thuoctinh[$ittinh].'</span>';
                                    }
                                  }
                                ?>
                              </p>
                            </div>
                          
                        </td>
                        <td  title="<?=$glo_lang['cart_qty'] ?>"><?=$value ?></td>
                        <td style="text-align:right" title="<?=$glo_lang['cart_dongia'] ?>"><b><?=($dongia == 0) ? 0 : NUMBER_fomat($dongia)." ".$glo_lang['dvt'] ?></b></td>
                        <td style="text-align:right" title="<?=$glo_lang['cart_thanhtien'] ?>"><b><span class="td_thanhtien_<?=$key ?>"><?=($thanhtien== 0)  ? 0 : NUMBER_fomat($thanhtien) ?></span> <?=$glo_lang['dvt'] ?></b></td>

                      </tr>
                    <?php  }} ?>
                  </table>
                  </div>
                  <div class="clr"></div>
                  <div class="dv-tongtien no_box">
                    <input type="hidden" class="cls_datafalse" value="<?=$glo_lang['alert_dat_hang'] ?>">
                    <span id="pro_sum"><?=$glo_lang['cart_tong_tien'] ?>:
                    <label class='tb_tongtien'><?=($tongtien == 0) ? "0": NUMBER_fomat($tongtien)." ".$glo_lang['dvt'] ?></label>
                    </span>
                  </div>
                  <div class="clr"></div>
            <div class="clr"></div>
          </div>
          <div class="contact contact_cart contact_sp">
            <h2><?=$glo_lang['thong_tin_nguoi_mua_hang'] ?></h2>
            <div class="contact contact_lh contact_lh_cart no_box" id="contact">
              <input type="hidden" name="gui_donhang">
              <input type="hidden" class="lang_ok" value="<?=$glo_lang['don_hang_cua_ban_da_duoc_gui'] ?>">
              <input type="hidden" class="lang_false" value="<?=$glo_lang['nhap_ma_bao_ve_chua_dung'] ?>">
              <input type="hidden" name="id_token" id="id_token" class="id_token" value="<?=$_SESSION['token'] = md5(RANDOM_chuoi(5)) ?>">
              <div class="box_contact_buy flex">
              <ul class="left no_style">
                <li class="name">
                  <input type="hidden" name="s_fullname_s" value="<?=base64_encode($glo_lang['ho_va_ten']) ?>">
                  <input class="cls_data_check_form" data-rong="1" name="s_fullname" id="s_fullname" type="text" placeholder="<?=$glo_lang['ho_va_ten'] ?> (*)" value="<?=!empty($_POST['s_fullname']) ? $_POST['s_fullname'] : @$hoten ?>" onFocus="if (this.value == '<?=$glo_lang['ho_va_ten'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['ho_va_ten'] ?> (*)';}" data-name="<?=$glo_lang['ho_va_ten'] ?> (*)" data-msso="<?=$glo_lang['nhap_ho_ten'] ?>"/>
                </li>
                <li class="phone">
                  <input type="hidden" name="s_dienthoai_s" value="<?=base64_encode($glo_lang['so_dien_thoai']) ?>">
                  <input class="cls_data_check_form" data-rong="1" data-phone="1" name="s_dienthoai" id="s_dienthoai" type="text" placeholder="<?=$glo_lang['so_dien_thoai'] ?> (*)" value="<?=!empty($_POST['s_dienthoai']) ? $_POST['s_dienthoai'] : @$sodienthoai ?>" onFocus="if (this.value == '<?=$glo_lang['so_dien_thoai'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['so_dien_thoai'] ?> (*)';}" data-name="<?=$glo_lang['so_dien_thoai'] ?> (*)" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>" data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>"/>
                </li>
                <li class="mail">
                  <input type="hidden" name="s_email_s" value="<?=base64_encode($glo_lang['email']) ?>">
                  <input class="cls_data_check_form"  name="s_email" id="s_email" type="text" placeholder="<?=$glo_lang['email'] ?>" value="<?=!empty($_POST['s_email']) ? $_POST['s_email'] : @$email  ?>" onFocus="if (this.value == '<?=$glo_lang['email'] ?>'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['email'] ?>';}" data-msso="<?=$glo_lang['chua_nhap_dia_chi_email'] ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>"/>
                </li>
                <li class="local">
                  <input type="hidden" name="s_address_s" value="<?=base64_encode($glo_lang['dia_chi']) ?>">
                  <input name="s_address" id="s_address" type="text" placeholder="<?=$glo_lang['dia_chi'] ?>" value="<?=!empty($_POST['s_address']) ? $_POST['s_address'] : @$diachi ?>" onFocus="if (this.value == '<?=$glo_lang['dia_chi'] ?>'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['dia_chi'] ?>';}"/>
                </li>

              </ul>
              <ul class="right no_style">
                <li>
                  <input type="hidden" name="s_message_s" value="<?=base64_encode($glo_lang['noi_dung_lien_he']) ?>">
                  <textarea name="s_message" id="s_message" cols="" rows="" placeholder="<?=$glo_lang['noi_dung_lien_he'] ?>"><?=!empty($_POST['s_message']) ? $_POST['s_message'] : '' ?></textarea>
                 </li>
              </ul>
            </div>
              
              <div>
                <div class="text_left">
                  <p class="require_pc" style="color:red;"><?=$glo_lang['thong_tin_bat_buoc']?></p>
                </div>
                
              </div>
            </div>
          </div>
          
          <div id="cart_list" class="buy_cart_list dv-phuongthucthanhtoan"> 
            <h2><?=$glo_lang['phuong_thuc_thanh_toan'] ?></h2>
            <div class="dv-ndphuongthuc-thanhtoan no_box flex">
              <?php 
                $i = 0;
                $pthucthanhtoan = DB_fet("*","#_phuongthucthanhtoan","`showhi` = 1","`catasort` DESC","","arr");
                foreach ($pthucthanhtoan as $rows) {
                  $i++;
              ?>
              <div class="dv-pttt-child">
               
                <label for="type<?=$rows['id'] ?>" onclick="$('.dv-ndpm').hide(); $('.dv-ndpm-<?=$rows['id'] ?>').show()">
                  <input type="radio" value="<?=$rows['id'] ?>" name="type_payment" id="type<?=$rows['id'] ?>" <?=$i == 1 ? "checked='checked'" : "" ?> >
                  <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], 'thumb_') ?>" alt="">
                  <h3><?=$rows['tenbaiviet_'.$lang] ?></h3>
                </label>
                
              </div>

              <?php } ?>
            <?php /* <div class="dv-pttt-child">
                <input type="radio" value="0" name="type_payment" id="type0" <?=!empty($_POST['type_payment']) && $_POST['type_payment'] == 0 ? 'checked="checked"' : '' ?> >
                <label for="type0" onclick="$('.dv-ndpm').hide(); $('.dv-ndpm-0').show()">
                  <h3><?=$glo_lang['thanh_toan_paypal'] ?></h3>
                </label>
              </div>
              <div class="clr"></div> --> <? */?>
              <?php 
                $i = 0;
                foreach ($pthucthanhtoan as $rows) {
                  $i++;
              ?>
              <div class="dv-ndpm dv-ndpm-<?=$rows['id'] ?>" style="<?=$i == 1 ? "display: block" : "" ?>">
                <?=SHOW_text($rows['noidung_'.$lang]) ?>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="clr"></div>
           <div class="dv-btn-cart no_box formBox list_action_cart">
            <a onclick="RefreshFormMailContact(FormNameContact_cart)" style="cursor:pointer" class="button"><?=$glo_lang['lam_lai'] ?></a>
            <a href="<?=$full_url?>/gio-hang/" class="button mar"><?=$glo_lang['chinh_sua_don_hang'] ?></a>
            <a onclick="return CHECK_send_lienhe('<?=$full_url ?>/','#FormNameContact_cart', '.cls_data_check_form')"  style="cursor:pointer" class="button"><?=$glo_lang['gui_don_hang'] ?> <img src="images/loading2.gif" class="ajax_img_loading"></a>   
          </div>
          </form>
        
    </div>
  </div>
</div>
</section>
<?php //include _source."paypal.php"; ?>