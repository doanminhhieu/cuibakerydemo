<?php 
   $bre = $glo_lang['dang_ky'];

?>

<div class="page_conten_page">
  <div class="link_page">
    <div class="pagewrap">
      <ul>
        <li><a href="<?=$full_url ?>"><i class="fa fa-home"></i><?=$glo_lang['trang_chu'] ?></a> | <?=$bre ?></li>
        <div class="clr"></div>
      </ul>
    </div>
  </div>
  <div class="pagewrap">
    <div class="dv-dangky-tv no_box flex">
      <div class="dv-left">
        <div class="dv-dangnhap">
          <?php
              if(isset($_SESSION['id'])) {
                LOCATION_js($full_url);
                exit();
              }
          ?>
          <script src="js/jquery-ui.js"></script>
          <link rel="stylesheet" href="css/jquery-ui.css">
          <form action="" method="post" name="dangkythanhvien" id="dangkythanhvien">
          <div class="dangnhap_popup no_box">
            <div class="titBox left">
              <h3 class="tit"><?=$glo_lang['title_dang_ky'] ?></h3>
            </div>
            <div class="row-frm">
              <p><?=$glo_lang['email'] ?> (*)</p>
              <input type="text" name="email_dk" class="form-control cls_data_check_form_check_dangky" data-rong="1" data-email="1" data-msso="<?=$glo_lang['chua_nhap_dia_chi_email'] ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>">
            </div>
            <div class="row-frm">
              <p><?=$glo_lang['login_pass'] ?> (*)</p>
              <input type="password" name="pass_dk" class="form-control cls_data_check_form_check_dangky" id="pass_dk"  data-rong="1" data-msso="<?=$glo_lang['login_nhap_mat_khau'] ?>">
            </div>
            <div class="row-frm">
              <p><?=$glo_lang['register_repass'] ?> (*)</p>
              <input type="password" name="repass_dk" class="form-control cls_data_check_form_check_dangky" id="repass_dk" id-khac="#pass_dk" data-rong="1" data-khac="1" data-msso="<?=$glo_lang['vui_long_nhap_lai_mat_khau'] ?>" data-msso1="<?=$glo_lang['nhap_lai_mat_khau_khong_chinh_xac'] ?>">
            </div>
            <div class="titBox titBox2">
              <h3 class="tit"><?=$glo_lang['thong_tin_ca_nhan'] ?></h3>
            </div>
            <div class="clr"></div>
            <div class="row-frm">
              <p><?=$glo_lang['ho_va_ten'] ?> (*)</p>
              <input type="text" name="fullname_dk" class="form-control cls_data_check_form_check_dangky"  data-rong="1" data-msso="<?=$glo_lang['nhap_ho_ten'] ?>">
            </div>
            <div class="row-frm">
              <p><?=$glo_lang['so_dien_thoai'] ?> (*)</p>
              <input type="text" id="phone_dk" class="form-control cls_data_check_form_check_dangky" name="phone_dk"  data-rong="1" data-phone="1" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>"  data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>">
            </div>
            <div class="row-frm">
              <p><?=$glo_lang['dia_chi'] ?></p>
              <input type="text" name="diachi" class="form-control test" placeholder="">
            </div>
            <div class="row-frm">
              <p><?=$glo_lang['ma_bao_ve'] ?> (*)</p>
              <span class="span_mbv">
                <img src="<?=$full_url."/load-capcha/" ?>" alt="CAPTCHA code" onclick="$(this).attr('src','<?=$full_url."/load-capcha/" ?>')" id="img_contact_cap"><i class="fa fa-refresh" onclick="$('#img_contact_cap').attr('src','<?=$full_url."/load-capcha/" ?>')"></i>
              </span>
              <input class="form-control cls_data_check_form_check_dangky" data-rong="1" name="mabaove" id="mabaove" type="text" placeholder="" value="" data-msso="<?=$glo_lang['vui_long_nhap_ma_bao_ve'] ?>"/>
            </div>
            <div class="box_dangnhap_popup">
              <a class="cur" onClick="check_dangky()"><?=$glo_lang['dang_ky'] ?> <img class="img_load_from_dktv" src="images/loading2.gif"></a>
            </div>
            <div class="clr"></div>
          </div>
          </form>
          <script>
              var send_d = 0;
              function check_dangky() {
                var check = 0;
                $(".cls_data_check_form_check_dangky").each(function(){
                    var val     = $(this).val().trim();
                    var id      = $(this).attr('id');
                    var rong    = $(this).attr('data-rong');
                    var phone   = $(this).attr('data-phone');
                    var email   = $(this).attr('data-email');
                    var d_check = $(this).attr('data-check');
                    var place   = $(this).attr('placeholder');
                    var khac    = $(this).attr('data-khac');

                    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(rong == 1 && (val == "" || val == place)){
                        alert($(this).attr('data-msso'));
                        $(this).focus();
                        $(".ajax_img_loading").hide();
                        check = 1;
                        send_d = 0;
                        return false;
                    } 
                    else if(email == 1 && !regex.test(val) && val != ""){
                        alert($(this).attr('data-msso1'));
                        $(this).focus();
                        $(".ajax_img_loading").hide();
                        check = 1;
                        send_d = 0; 
                        return false;
                    }
                    else if(phone == 1 && !CHECK_phone(this) && val != ""){
                        alert($(this).attr('data-msso1'));
                        $(this).focus();
                        $(".ajax_img_loading").hide();
                        check = 1;
                        send_d = 0; 
                        return false;
                    }
                    else if(d_check == 1 && !$(this).is(":checked")){
                        alert($(this).attr('data-msso'));
                        $(this).focus();
                        $(".ajax_img_loading").hide();
                        check = 1;
                        send_d = 0; 
                        return false;
                    }
                    else if(khac == 1 && val != $($(this).attr('id-khac')).val()){
                        alert($(this).attr('data-msso1'));
                        $(this).focus();
                        $(".ajax_img_loading").hide();
                        check = 1;
                        send_d = 0; 
                        return false;
                    }
                });

                if(check == 0){
                  if(send_d == 0){
                      send_d = 1;
                      $(".img_load_from_dktv").show();
                      var dataString = $('#dangkythanhvien').serializeArray();
                      $.ajax({
                          type: "POST",
                          url: "<?=$full_url."/check-dang-ky/" ?>",
                          data: dataString,
                          success: function(response)
                          {
                            console.log(response);
                            var obj = jQuery.parseJSON(response);
                            if(obj.error == 10){
                              alert("<?=$glo_lang['nhap_ma_bao_ve_chua_dung'] ?>");
                              $("#mabaove").focus();
                            }
                            else if(obj.error > 0){
                              alert("<?=$glo_lang['email_da_duoc_dang_ky']  ?>");
                              $("#email_dk").focus();
                            }else{
                              alert("<?=$glo_lang['dang_ky_tai_khoan_thanh_cong']  ?>");
                              window.location.href = "<?=$full_url."/signin/" ?>";
                              // window.location.reload();
                            }
                            $(".img_load_from_dktv").hide();
                            send_d = 0;
                          }
                      });
                    }
                }
              }

              $('.form-control').keypress(function(event){
                  var keycode = (event.keyCode ? event.keyCode : event.which);
                  if (keycode == '13') {
                    check_dangky();
                  }
              });
              $( function() {
                $( "#datepicker" ).datepicker({
                    autoclose: true,
                    format: 'dd/mm/yyyy'
                });
              });
          </script>
        </div>
      </div>
      <div class="dv-right">
        <div class="dv-nddk">
          <?php 
            $noidung      = LAYTEXT_rieng(24);
          ?>
          <h3><?=SHOW_text($noidung['tenbaiviet_'.$lang]) ?></h3>
          <div class="nd-ms"><?=SHOW_text($noidung['noidung_'.$lang]) ?>  </div>
          <div class="dv-nutdk">
            <p><?=$glo_lang['ban_da_co_tai_khoan'] ?></p>
            <a href="<?=$full_url ?>/signin/" class="nut-dk"><?=$glo_lang['dang_nhap'] ?></a>
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </div>
    
    <div class="clr"></div>
  </div>
</div>