<?php
  if(isset($_SESSION['id'])) {
    LOCATION_js($full_url);
    exit();
  }
?>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<form action="" method="post" name="dangkythanhvien" id="dangkythanhvien">
<div class="ungtuyen_popup">
  <div class="titBox left">
    <h3 class="tit_2"><?=$glo_lang['title_dang_ky'] ?></h3>
  </div>
  <div class="col-md-4 row-frm">
    <input type="text" name="email_dk" class="form-control cls_data_check_form_check_dangky" data-rong="1" data-email="1" data-msso="<?=$glo_lang['chua_nhap_dia_chi_email'] ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>" placeholder="<?=$glo_lang['email'] ?> (*)">
  </div>
  <div class="col-md-4 row-frm">
    <input type="password" name="pass_dk" class="form-control cls_data_check_form_check_dangky" id="pass_dk"  data-rong="1" data-msso="<?=$glo_lang['login_nhap_mat_khau'] ?>" placeholder="<?=$glo_lang['login_pass'] ?> (*)">
  </div><div class="col-md-4 row-frm">
    <input type="password" name="repass_dk" class="form-control cls_data_check_form_check_dangky" id="repass_dk" id-khac="#pass_dk" data-rong="1" data-khac="1" data-msso="<?=$glo_lang['vui_long_nhap_lai_mat_khau'] ?>" data-msso1="<?=$glo_lang['nhap_lai_mat_khau_khong_chinh_xac'] ?>" placeholder="<?=$glo_lang['register_repass'] ?> (*)">
  </div><div class="col-md-4 row-frm">
    <input type="text" name="fullname_dk" class="form-control cls_data_check_form_check_dangky"  data-rong="1" data-msso="<?=$glo_lang['nhap_ho_ten'] ?>" placeholder="<?=$glo_lang['ho_va_ten'] ?> (*)">
  </div><div class="col-md-4 row-frm">
    <input type="text" id="phone_dk" class="form-control cls_data_check_form_check_dangky" name="phone_dk"  data-rong="1" data-phone="1" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>"  data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>" placeholder="<?=$glo_lang['so_dien_thoai'] ?> (*)">
  </div>
  <div class="col-md-4 row-frm">
    <input type="text" name="diachi" class="form-control cls_data_check_form_check_dangky" data-rong="1" data-msso="<?=$glo_lang['nhap_dia_chi'] ?>" placeholder="<?=$glo_lang['dia_chi'] ?> (*)">
  </div>
  <!-- <div class="col-md-4 row-frm">
    <select name="nam_sinh" class="SlectBox form-control cls_data_check_form_check_dangky" data-rong="1" data-msso="<?=$glo_lang['nhap_nam_sinh'] ?>">
      <option value=""><?=$glo_lang['nam_sinh'] ?> *</option>
      <?php 
        $year   = date("Y", time());
        for ($i = $year; $i > $year - 120; $i--) { 
          echo '<option '.LAY_selected(@$nam_sinh , $i).' value="'.$i.'">'.$i.'</option>';
        } 
      ?>
    </select>
  </div> -->
  <!-- <div class="col-md-4 row-frm">
    <select name="gioi_tinh" class="SlectBox form-control cls_data_check_form_check_dangky " data-rong="1" data-msso="<?=$glo_lang['chon_gioi_tinh'] ?>">
      <option value=""><?=$glo_lang['chon_gioi_tinh'] ?> *</option>
      <option value="1" <?=LAY_selected(1, @$gioi_tinh) ?>><?=$glo_lang['nam'] ?></option>
      <option value="2" <?=LAY_selected(2, @$gioi_tinh) ?>><?=$glo_lang['nu'] ?></option>
    </select>
  </div> -->
  <!-- <div class="col-md-4 row-frm">
    <input type="text" name="cmnd" class="form-control cls_data_check_form_check_dangky" data-rong="1" data-msso="<?=$glo_lang['nhap_so_cmnd'] ?>" placeholder="<?=$glo_lang['so_cmnd'] ?> (*)">
  </div> -->
  <div class="col-md-4 row-frm row-frm-mbv">
    <span class="span_mbv">
      <img src="<?=$full_url."/load-capcha/" ?>" alt="CAPTCHA code" onclick="$(this).attr('src','<?=$full_url."/load-capcha/" ?>')" id="img_contact_cap"><i class="fa fa-refresh" onclick="$('#img_contact_cap').attr('src','<?=$full_url."/load-capcha/" ?>')"></i>
    </span>
    <input class="form-control cls_data_check_form_check_dangky" data-rong="1" name="mabaove" id="mabaove" type="text" placeholder="<?=$glo_lang['ma_bao_ve'] ?> (*)" value="" data-msso="<?=$glo_lang['vui_long_nhap_ma_bao_ve'] ?>"/>
  </div>
  <div class="col-md-4 row-frm">
    <label class="checkbox">
      <input type="checkbox" class="cls_data_check_form_check_dangky" data-check="1" data-msso="<?=$glo_lang['ban_chua_dong_y_thoa_thuan'] ?>">
      <?=$glo_lang['dieu_khoan_dk_thanh_vien'] ?></label>
  </div>
  <div class="box_dangnhap_popup">
    <h2><a class="cur" onClick="check_dangky()"><?=$glo_lang['dang_ky'] ?> <img class="img_load_from_dktv" src="images/loading2.gif"></a></h2>
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
          // else if(phone == 1 && !CHECK_phone(this) && val != ""){
          //     alert($(this).attr('data-msso1'));
          //     $(this).focus();
          //     $(".ajax_img_loading").hide();
          //     check = 1;
          //     send_d = 0; 
          //     return false;
          // }
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
                    // window.location.reload();
                    LOAD_popup_new('<?=$full_url."/pa-size-child/dang-nhap/" ?>', '400px');
                  }
                  $("#img_contact_cap").attr("src","<?=$full_url ?>/load-capcha/");
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
    if ($('.SlectBox').length > 0) {
    $('.SlectBox').select2();
  }
</script>