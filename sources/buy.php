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


?>
<style>
  div#cart_list h2, .thongtindat-hang h2 { text-transform: uppercase; font-weight: 500; font-size: 16px; display: block; color: #193356; margin-bottom: 10px;  }
  .dv-thongtin-nm { margin: 0 10px; }
  .thongtindat-hang .dv-r { width: calc(100% - 335px); border: 1px solid #ddd; float: right; margin-left: 15px; padding: 10px }
  .thongtindat-hang .dv-l { width: 320px; float: left; border: 1px solid #ddd; }
  .thongtindat-hang { padding: 10px; background: #fff; }
  .dv-thongtin-nm input, .dv-thongtin-nm textarea { border: 1px solid #ddd; width: 100%; height: 34px; padding: 0 8px; margin-bottom: 7px; }
  .dv-thongtin-nm textarea { padding: 10px; height: 100px; float: left; }
  .dv-thongtin-nm .code { position: relative; }
  .dv-thongtin-nm .code i { position: absolute; bottom: 9px; right: 2px; font-size: 8px; color: #c5c5c5; }
  .dv-thongtin-nm .code img { position: absolute; top: 1px; right: 1px; height: 30px; }
  .dv-btn-cart a.t { background: none; display: block; position: relative; text-transform: none; text-align: left; padding: 0; font-size: 13px; color: #0075bf; width: 100%;margin: 0;}
  p.require_pc { margin-bottom: 7px; display: block; }
  .dv-btn-cart a.t:hover { color: red; }
  .dv-btn-cart a { width: 100%; text-align: center; margin: 10px 0; cursor: pointer; padding: 8px 0; }
  .dv-thongtin-nm input.is_checkbox { width: 17px; height: 17px; float: left; margin-right: 5px; }
  .dv-thongtin-nm label { margin-top: 8px; display: block; color: #0075bf; line-height: 17px; font-size: 14px; font-weight: 500; }
  .dv-thongtin-nm-2{display: none}
  .dv-table-reposive table {margin-bottom: 15px}
  .dv-table-reposive table, .dv-table-reposive th, .dv-table-reposive td { border: 1px solid #ddd; }
  .thongtindat-hang .dv-nd label { width: 100%; display: block; max-width: 100%; padding: 0; position: relative; margin: 0 0 10px; line-height: 15px; font-size: 13px; float: left; }
  .thongtindat-hang .dv-nd label input[type="text"] {border: 1px solid #ddd; width: 100%; height: 34px; padding: 0 8px; }
  .thongtindat-hang .dv-nd label button { background: #0075bf; border: none; padding: 0 15px; height: 32px; display: block; position: absolute; top: 0px; right: 0px; text-transform: capitalize; color: #fff; cursor: pointer;}
  .thongtindat-hang .dv-nd label button:hover { background: #193356; }
  .dv-buy-thanhtoan input { width: 18px; height: 18px; margin-right: 6px; position: relative; top: 2px }
  .dv-buy-thanhtoan img { height: auto; width: 22px; margin-right: 6px; }
  .dv-buy-thanhtoan { width: 50% !important; float: left; display: inline-block !important; margin-bottom: 3px !important;}
  .dv-buy-ttck { width: 100%; text-align: left; background: #ebecec; padding: 5px 10px; font-size: 13px; display: none}
  .dv-nd-vanchuyen label { display: block; margin: -5px 0 10px; }
  .dv-nd-vanchuyen { margin-bottom: 10px; }
  .dv-nd-vanchuyen label input { width: 18px; height: 18px; margin-right: 6px; position: relative; top: 2px; float: left;}
  .dv-nd-vanchuyen .dv-buy-khuvuc{margin-left: -10px}
  .dv-nd-vanchuyen .dv-buy-khuvuc select { border: 1px solid #ddd; height: 32px; padding: 0 8px; margin-bottom: 2px; width: calc(50% - 10px); float: left; margin-left: 10px; }
  .thongtindat-hang .dv-nd { border-bottom: 1px dashed #ddd; margin-bottom: 15px; width: 100%; float: left; }
  .dv-detail-ship td.ms-name span { display: block; width: 100%; float: left; line-height: 1.5; margin-top: 7px; color: #333; }
  .dv-detail-ship img { display: block; float: left; }
  .dv-detail-ship > img { display: none; height: 11px; width: auto !important; }
  div#cart_list .ms-fee { width: 18%; }
  div#cart_list .ms-time { width: 12%; }
  div#cart_list .ms-total { width: 13%; }
  div#cart_list .ms-cod { width: 14%; }
  .dv-detail-ship { margin: 10px 0 0 10px !important }
  div#cart_list table { border: 1px solid #ddd !important; }
  .dv-buy-gh { border-bottom: 1px dashed #ddd; padding: 0 0 3px; font-size: 14px; color: #4c4c4c; margin-bottom: 2px; }
  .dv-buy-gh:last-child{border: none}
  .dv-buy-gh span.p-tamtinh { width: 200px; display: inline-block; }
  .dv-buy-gh img { height: 15px; position: relative; top: 2px; }
  p.ma_khuyen_mai_mt { font-size: 13px; color: #f91515; font-style: italic; }
  .dv-ndphuongthuc-thanhtoan.no_box.flex { margin: 0; width: 100%; }
  .dv-pttt-child label { display: block; padding: 2px 25px; border: none; outline: none; background: none; height: 100%; }
  .dv-pttt-child input[type="radio"]:checked+label h3 { color: #ff4242; }
  .dv-pttt-child input[type="radio"]:checked+label img { filter: grayscale(0); opacity: 1}
  .dv-ndphuongthuc-thanhtoan .dv-ndpm { display: none; background: rgba(241, 241, 241, 0.14); border: dashed 1px #e1e1e1; outline: solid 1px #fff; padding: 10px 15px; line-height: 25px; width: calc(100% - 0px); font-size: 14px; margin-top: 10px; }
  .dv-ndphuongthuc-thanhtoan .dv-ndpm strong { font-weight: 500; font-size: 16px; color: #000; line-height: 22px; }
  .dv-ndphuongthuc-thanhtoan .dv-ndpm p { margin-bottom: 5px }
  .dv-ndphuongthuc-thanhtoan .dv-ndpm ul li { margin-left: 39px; list-style-type: disc !important; display: list-item !important; margin: 0 0 0 25px; }
  .dv-pttt-child input { width: 17px; height: 17px; float: left; margin-right: 7px}
  .thongtindat-hang .dv-nd label h3 { font-weight: 500; }
  .dv-pttt-child { width: 100%; }
  a.aj-dathang { text-transform: uppercase; font-size: 15px; padding: 0 25px; height: 36px; line-height: 36px; margin-top: 10px; color: #FFF; background: #333; white-space: nowrap; webkit-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -o-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out; display: block; }
  a.aj-dathang:hover { color: #FFF; background: #d0011b; }
</style>
<div class="page_conten_page">
  <div class="pagewrap">
    <div class="link_page">
      <ul>
        <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span>/</i></span><a><?=$glo_lang['dat_hang'] ?></a></li>
        <div class="clr"></div>
      </ul>
    </div>
    <div class="titile_page">
      <ul>
        <h3><?=$glo_lang['dat_hang'] ?></h3>
        <div class="clr"></div>
      </ul>
    </div>
    <form action="" class="formBox" method="post" name="check_buy_new_form" id="check_buy_new_form">
      <input type="hidden" name="gui_donhang" value="1">
      <input type="hidden" class="lang_ok" value="<?=$glo_lang['don_hang_cua_ban_da_duoc_gui'] ?>">
      <input type="hidden" class="lang_false" value="<?=$glo_lang['nhap_ma_bao_ve_chua_dung'] ?>">
      <div class="page_conten_page">
        <div id="cart_list" class="tb_rps">
          <h2><?=$glo_lang['thong_tin_don_hang'] ?></h2>
          <div class="dv-table-reposive">
            <table width="100%" border="0" cellspacing="1" cellpadding="5">
              <tr>
                <th><?=$glo_lang['cart_ten_sp'] ?></th>
                <th width="10%"><?=$glo_lang['cart_qty'] ?></th>
                <th width="13%"><?=$glo_lang['cart_dongia'] ?></th>
                <th width="13%"><?=$glo_lang['cart_thanhtien'] ?></th>
              </tr>
              <?php 
                $tongtien      = 0;
                $stt           = 0;
                foreach ($_SESSION['cart'] as $key => $value)  { 
                  $stt       ++;
                  $id_sp     = explode("_", $key);
                  $id_sp     = $id_sp[0];

                  $sanpham   = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` = 1 AND `id` = '".$key."' LIMIT 1");
                  if(mysql_num_rows($sanpham) > 0){
                    $sanpham    = mysql_fetch_array($sanpham);
                    $dongia     = check_gia_sql($id_sp, @$_SESSION['tinhnang'][$key], $sanpham['giatien']);
                    // $thuoctinh  = thuoctinh_lang($sanpham, $lang);

                    $thanhtien = $dongia * $value;
                    // $dongia     = check_gia_sql($id_sp, @$_SESSION['tinhnang'][$key], $sanpham['giatien']);
                    // $khuyenmai  = MUA_XtangY($key, $value);
                    // $thanhtien  = LOAD_gia_xy($khuyenmai, $dongia, $value);
                    $tongtien  += $thanhtien;
                    
              ?> 
               <tr>
                  <td style="text-align:left" class="dv-anh-cart-sp">
                    <a href="<?=GET_link($full_url, SHOW_text($sanpham['seo_name'])) ?>"><img src="<?=checkImage($fullpath, $sanpham['icon'], $sanpham['duongdantin'], 'thumb_') ?>" alt="<?=SHOW_text($sanpham['tenbaiviet_'.$_SESSION['lang']]) ?>"/></a>
                    <div class="dv-anh">
                      <a href="<?=GET_link($full_url, SHOW_text($sanpham['seo_name'])) ?>"><?=SHOW_text($sanpham['tenbaiviet_'.$_SESSION['lang']]) ?></a>
                      <p><?=SHOW_text($sanpham['p1']) ?></p>
                    </div>
                  </td>
                  <td><?=$value ?></td>
                  <td style="text-align:right"><b><?=($dongia == 0) ? 0 : NUMBER_fomat($dongia)." ".$glo_lang['dvt'] ?></b></td>
                  <td style="text-align:right"><b><span class="td_thanhtien_<?=$key ?>"><?=($thanhtien== 0)  ? 0 : NUMBER_fomat($thanhtien) ?></span> <?=$glo_lang['dvt'] ?></b>
                  </td>
                </tr>
              <?php  } } ?>
            </table>
          </div>
          <div class="clr"></div>
        </div>
        <!--  -->
        <div class="thongtindat-hang no_box">
          <div class="dv-r">
            <div class="clr"></div>
            <div class="ptthanhtoan">
              <h2><?=$glo_lang['phuong_thuc_thanh_toan'] ?></h2>
            </div>
            <div class="dv-nd flex">
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
                    <!-- <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], 'thumb_') ?>" alt=""> -->
                    <h3><?=$rows['tenbaiviet_'.$lang] ?></h3>
                  </label>
                  
                </div>

                <?php } ?>
                <div class="clr"></div>
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
              <div class="clr"></div>
            </div> 
            <div class="clr"></div>
            <div class="ptthanhtoan">
              <h2><?=$glo_lang['ma_khuyen_mai'] ?></h2>
            </div>
            <div class="dv-nd">
              <label>
                <input type="text" name="ma_khuyen_mai" class="ma_khuyen_mai" placeholder="<?=$glo_lang['nhap_ma_khuyen_mai'] ?>">
                <button type="button" onclick="CHECK_buy_new()"><?=$glo_lang['ap_dung'] ?></button><div class="clr"></div>
              </label>
              <p class="ma_khuyen_mai_mt"></p>
            </div> 
            
            <div class="clr"></div>
            <div class="ptthanhtoan">
              <h2><?=$glo_lang['phuong_thuc_van_chuyen'] ?></h2>
            </div>
            <div class="dv-nd-vanchuyen">
              <div class="dv-buy-khuvuc">
                <?php 
                  $khuvuc              = LAY_khuvuc();
                ?>
                <select name="n_tinhthanh" id="n_tinhthanh" onchange="LOAD_tinhthanh(this, '#id_quanhuyen', '<?=$glo_lang['chon_quan_huyen'] ?>'); LOAD_phiship()">
                  <option value="0"><?=$glo_lang['chon_tinh_thanh'] ?></option>
                  <?php foreach ($khuvuc as $kv) { if($kv['id_parent'] != 0) continue; ?>
                  <option value="<?=$kv['id'] ?>"><?=$kv['tenbaiviet_'.$lang] ?></option>
                  <?php } ?>
                </select>
                <select name="n_quanhuyen" id="id_quanhuyen" onchange="LOAD_phiship()">
                  <option value="0"><?=$glo_lang['chon_quan_huyen'] ?></option>
                </select>
                <input type="hidden" name="phiship_client" class="phiship_client" value="0">
                <input type="hidden" name="phiship_id" class="phiship_id" value="">
                <div class="dv-detail-ship" id="cart_list"><img src="images/loading8.gif" alt=""></div>
              </div>
            </div> 
            <div class="ptthanhtoan">
              <h2><?=$glo_lang['thong_tin_thanh_toan'] ?></h2>
            </div>
            <div class="dv-nd">
              <div class="dv-buy-gh">
                <span class="p-tamtinh"><?=$glo_lang['tam_tinh'] ?></span>
                <span class="p-kq">: <b><span class="js_tamtinh_mm"><img src="images/loadernew.gif" alt=""></span></b></span>
              </div>
              <div class="dv-buy-gh">
                <span class="p-tamtinh"><?=$glo_lang['khuyen_mai'] ?></span>
                <span class="p-kq">: <b><span class="js_gia_kmm"><img src="images/loadernew.gif" alt=""></span></b></span>
              </div>
              <div class="dv-buy-gh">
                <span class="p-tamtinh"><?=$glo_lang['phi_van_chuyen_cod'] ?></span>
                <span class="p-kq">: <b><span class="js_phivanchuyen_cod"><img src="images/loadernew.gif" alt=""></span></b></span>
              </div>
              <div class="dv-buy-gh">
                <span class="p-tamtinh"><?=$glo_lang['cart_tong_tien'] ?></span>
                <span class="p-kq">: <b><span class="js_tongiten_mm"><img src="images/loadernew.gif" alt=""></span></b></span>
              </div>
            </div> 
          </div>
          <div class="dv-l">
            <div class="">
              <div class="dv-thongtin-nm">
                <h2><?=$glo_lang['thong_tin_nguoi_mua_hang'] ?></h2>
                <div class="dv-thongtin-nguoimua">
                  <input name="s_fullname" id="s_fullname" class="cls_check_buy" type="text" placeholder="<?=$glo_lang['ho_va_ten'] ?> (*)" value="<?=$hoten ?>" data-rong="1"  data-msso="<?=$glo_lang['nhap_ho_ten'] ?>"/>
                  <input name="s_dienthoai" id="s_dienthoai" class="cls_check_buy" type="text" placeholder="<?=$glo_lang['so_dien_thoai'] ?> (*)" value="<?=$sodienthoai ?>" data-rong="1" data-name="<?=$glo_lang['so_dien_thoai'] ?> (*)" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>"  data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>"/>
                  <input name="s_email" id="s_email"  data-email="1"  class="cls_check_buy" type="text" placeholder="<?=$glo_lang['email'] ?>" value="<?=$email ?>" data-msso="<?=$glo_lang['chua_nhap_dia_chi_email'] ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>"/>
                  <input name="s_address" id="s_address" type="text" placeholder="<?=$glo_lang['dia_chi'] ?>" value="<?=$diachi ?>"/>
                </div>
              </div>
              <div class="dv-thongtin-nm ">
                <div class="dv-thongtin-nm-2">
                  <h2><?=$glo_lang['thong_tin_nguoi_nhan_hang'] ?></h2>
                  <div class="dv-thongtin-nguoimua">
                    <input name="hoten_nhan" id="hoten_nhan" type="text" placeholder="<?=$glo_lang['ho_va_ten'] ?>" value="<?=$hoten ?>" data-rong="1" data-name="<?=$glo_lang['ho_va_ten'] ?>" data-msso="<?=$glo_lang['nhap_ho_ten'] ?>"/>
                    <input name="sodienthoai_nhan" id="sodienthoai_nhan" type="text" placeholder="<?=$glo_lang['so_dien_thoai'] ?>" value="<?=$sodienthoai ?>"  data-rong="1"  data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>"  data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>"/>
                    <input name="email_nhan" id="email_nhan" type="text" placeholder="<?=$glo_lang['email'] ?>" value="<?=$email ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>" data-email="1"/>
                    <input name="diachi_nhan" id="diachi_nhan" type="text" placeholder="<?=$glo_lang['dia_chi'] ?>" value="<?=$diachi ?>"/>
                  </div>
                </div>
                <textarea name="s_message" id="s_message" placeholder="<?=$glo_lang['noi_dung'] ?>" value=""></textarea>
                <div class="clr"></div>
                <label>
                  <input type="checkbox" class="is_checkbox" name="is_checkbox"> <?=$glo_lang['gui_den_nguoi_nhan_khac'] ?>
                </label>
                <div class="clr"></div>
                <p class="require_pc" style="color:red;"><?=$glo_lang['thong_tin_bat_buoc']?></p>
                <div class="dv-btn-cart">
                  <a class="t" href="<?=$link_cart ?>" class="pro_del mar"><i class="fa fa-angle-double-right"></i> <?=$glo_lang['tiep_tuc_mua_hang'] ?></a>
                  <a class="t" href="<?=$full_url?>/gio-hang/" class="pro_del mar"><i class="fa fa-angle-double-right"></i> <?=$glo_lang['chinh_sua_don_hang'] ?></a>
                  <a class="aj-dathang" onclick="return CHECK_gui_donhang()"><?=$glo_lang['gui_don_hang'] ?> <img src="images/loading2.gif" class="ajax_img_loading"></a>
                </div>
              </div>
              
            </div>
          </div>
          
          <div class="clr"></div>
        </div>
        <!--  -->
      </div>
    </form>
    </div>
</div>
<script>
  $(function(){
    CHECK_buy_new(); 
    $(".ma_khuyen_mai_mt").html('');
  });
  var icheck_buy = 0;
  function CHECK_buy_new(){
    if (icheck_buy == 0) {
      icheck_buy = 1;
      $(".ma_khuyen_mai_mt").html('<img src="images/loading8.gif" alt="">');
        $.ajax({
        type: "POST",
        url: full_url+"/check_buy_new_form/",
        data: $("#check_buy_new_form").serialize(),
        success: function (data) {
            icheck_buy = 0;
            try {
                data = JSON.parse(data);
                $(".js_gia_kmm").text(data.gia_km);
                $(".js_tamtinh_mm").text(data.js_tamtinh);
                $(".js_phivanchuyen_cod").text(data.phiship);
                $(".js_tongiten_mm").text(data.tongtien);
                // TIEN_paypal(data.num_tongtien);
                $(".ma_khuyen_mai_mt").html(data.gia_kmtext);
                $(".ma_khuyen_mai_mt").attr("id", "check_magg_id_"+data.gia_km_err);

            } catch (e) {

            }
            console.log(data)
        }
      });
    }
  }
  
  // ma_khuyen_mai_mt
  $(".is_checkbox").click(function(){
    if($(this).is(":checked")) {
      $(".dv-thongtin-nm-2").show();
      $("#m_gruop_1").val("");
      $("#m_gruop_2").val("");
      $("#m_gruop_3").val("");
      $("#m_gruop_4").val("");
    } 
    else{
      $(".dv-thongtin-nm-2").hide();
      $("#m_gruop_1").val($("#n_gruop_1").val());
      $("#m_gruop_2").val($("#n_gruop_2").val());
      $("#m_gruop_3").val($("#n_gruop_3").val());
      $("#m_gruop_4").val($("#n_gruop_4").val());
    }
  });
  var gui_don_hang_js = 0;
  function CHECK_gui_donhang(){
    if(!$(".is_checkbox").is(":checked")) {
      $("#m_gruop_1").val($("#n_gruop_1").val());
      $("#m_gruop_2").val($("#n_gruop_2").val());
      $("#m_gruop_3").val($("#n_gruop_3").val());
      $("#m_gruop_4").val($("#n_gruop_4").val());
    }
    //gui don hang
    var check = 0;
    $('.cls_check_buy').each(function(){
        var val     = $(this).val().trim();
        var id      = $(this).attr('id');
        var rong    = $(this).attr('data-rong');
        var phone   = $(this).attr('data-phone');
        var email   = $(this).attr('data-email');

        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(rong == 1 && val == ''){
            alert($(this).attr('data-msso'));
            $(this).focus();
            $(".ajax_img_loading").hide();
            check = 1;
            icheck_lienhe = 0;
            return false;
        } 
        else if(email == 1 && !regex.test(val) && val != ""){
            alert($(this).attr('data-msso1'));
            $(this).focus();
            $(".ajax_img_loading").hide();
            check = 1;
            icheck_lienhe = 0;
            return false;
        }
    });
    if(check == 0){
      if (gui_don_hang_js == 0) {
        gui_don_hang_js = 1;
        $(".ajax_img_loading").show();
          $.ajax({
          type: "POST",
          url: full_url+"/send_form/",
          data: $("#check_buy_new_form").serialize(),
          success: function (data) {
              gui_don_hang_js = 0;
              $(".ajax_img_loading").hide();
              if(data == 2) {
                alert($(".lang_false").val());
              }
              else {
                $(".ma_donhang_paypal").val(data);
                if($(".js_thanhtoan_name:checked").val() == "4"){
                  $("#paypal_form_new").submit();
                  $(".dv-paypal").show();
                  $(".dv-paypal-cont").show();
                }
                else{
                  alert($(".lang_ok").val());
                  window.location.href = full_url;
                }
              }
              console.log(data);
          }
        });
      }
    }
    
    //
  };
  $(".dv-buy-thanhtoan input").click(function(){
    $(".dv-buy-ttck").hide();
    if($(this).val() == 3) $(".dv-buy-ttck").show(200);
  });
  function LOAD_phiship(){
    $(".phiship_id").val("");
    $(".phiship_client").val(0);
      $.ajax({
      type: "POST",
      url: full_url+"/load_phi_ship/",
      data: {"n_tinhthanh" : $("#n_tinhthanh").val(), "id_quanhuyen" : $("#id_quanhuyen").val()},
      success: function (data) {
        try {
          data = JSON.parse(data);
          $(".phiship_client").val(data.phivc_num);
          CHECK_buy_new();
        } catch (e) {}
        console.log(data)
      }
    });
  };
</script>
<?php //include _source."paypal.php"; ?>