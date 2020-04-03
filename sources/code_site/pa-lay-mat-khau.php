<?php
    $email  = isset($_GET['email']) ? htmlentities($_GET['email']): '';
    $key    = isset($_GET['key']) ? htmlentities($_GET['key']): '';

    if(isset($_SESSION['id'])) LOCATION_js($full_url);

    $sql = DB_que("SELECT * FROM `#_members` WHERE `showhi` = 1 AND `email` = '".$email."' AND `active` = '".$key."' AND `phanquyen` = 0 LIMIT 1");
    if(!mysql_num_rows($sql)){
        ALERT_js($glo_lang['lien_ket_khong_hop_le_hoac_da_su_dung']);
        LOCATION_js($full_url);
        exit();
    }
?>
<form action="" method="post" name="dangnhap" id="dangnhap">
  <input type="hidden" name="email" value="<?=$email ?>">
  <input type="hidden" name="key" value="<?=$key ?>">
<div class="ungtuyen_popup">
  <div class="titBox left">
    <h3 class="tit_2"><?=$glo_lang['thay_doi_mat_khau'] ?></h3>
  </div>
  <div class="col-md-4 row-frm">
      <p><?=$glo_lang['email']?></p>
      <input type="text" name="email_dk" id="email_dk" class="form-control" value="<?=$email ?>" readonly='readonly'>
  </div>
  <div class="col-md-4 row-frm">
      <p><?=$glo_lang['login_pass']?> (*)</p>
      <input type="password" name="pass_dk" id="pass_dk" class="form-control" data-rong="1" data-msso="<?=$glo_lang['login_nhap_mat_khau'] ?>">
  </div>
  <div class="col-md-4 row-frm">
      <p><?=$glo_lang['register_repass']?> (*)</p>
      <input type="password" name="repass_dk" id="repass_dk" class="form-control repass" id-khac="#pass_dk" data-rong="1" data-khac="1" data-msso="<?=$glo_lang['vui_long_nhap_lai_mat_khau'] ?>" data-msso1="<?=$glo_lang['nhap_lai_mat_khau_khong_chinh_xac'] ?>">
  </div>
  <div class="clr"></div>
  <div class="box_dangnhap_popup">
    <h2><a class="cur" id="dangnhap" onClick="laymat_khau()"><?=$glo_lang['luu_thay_doi'] ?> <img class="img_load_from_dktv" src="images/loading2.gif"></a></h2>
  </div>
  
  <div class="clr"></div>
</div>
 
<script type="text/javascript">
  var send_d = 0;
  function laymat_khau() {
    var check = 0;
    $(".cls_data_check_form_check_dangky").each(function(){
        var val     = $(this).val().trim();
        var id      = $(this).attr('id');
        var rong    = $(this).attr('data-rong');
        var email   = $(this).attr('data-email');
        var place   = $(this).attr('placeholder');

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
    });
    if($("#pass_dk").val() == "") {
      $("#pass_dk").focus();
      alert("<?=$glo_lang['vui_long_nhap_lai_mat_khau'] ?>");
      return false;
    }
    else if($("#pass_dk").val() != $("#repass_dk").val()) {
      $("#repass_dk").focus();
      alert("<?=$glo_lang['nhap_lai_mat_khau_khong_chinh_xac'] ?>");
      return false;
    }
    else if(check == 0){
      if(send_d == 0){
        send_d = 1;
        $(".img_load_from_dktv").show();
        var dataString = $('#dangnhap').serializeArray();
        $.ajax({
            type: "POST",
            url: "<?=$full_url."/lay-mat-khau/" ?>",
            data: dataString,
            success: function(response)
            {
              console.log(response)
              var obj = jQuery.parseJSON(response);
              if(obj.error > 0){
                  alert("<?=$glo_lang['lien_ket_khong_hop_le_hoac_da_su_dung']  ?>");
              }
              else{
                alert("<?=$glo_lang['doi_mat_khau_thanh_cong']  ?>");
                LOAD_popup_new('<?=$full_url ?>/pa-size-child/dang-nhap/', "400px");
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
          check_dangnhap();
        }
    });
</script> 