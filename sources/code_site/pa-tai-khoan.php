<?php
    if(!isset($_SESSION['id'])) {
        LOCATION_js($fullpath);
        exit();
    }
    else
    {
        $table = "#_members";
        $sql = DB_que("SELECT * FROM $table WHERE `showhi` = 1 AND `id` = '".$_SESSION['id']."' AND `phanquyen` = 0 LIMIT 1");
        $row            = mysql_fetch_array($sql);
        foreach ($row as $key => $value) {
          ${$key}        = $value;
        }

?>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<form action="" method="post" name="dangkythanhvien" id="dangkythanhvien" enctype="multipart/form-data">
<div class="ungtuyen_popup">

  <div class="titBox left">
    <h3 class="tit_2"><?=$glo_lang['thong_tin_ca_nhan'] ?></h3>
  </div>
  <div class="row-frm">
    <p><?=$glo_lang['email'] ?> (*)</p>
    <input type="text" value="<?=$email ?>"   class="form-control" readonly="readonly">
  </div>
  <div class="clr"></div>
  <div class="row-frm">
    <p><?=$glo_lang['ho_va_ten'] ?> (*)</p>
    <input type="text" name="fullname_dk" class="form-control cls_data_check_form_check_dangky"  data-rong="1" data-msso="<?=$glo_lang['nhap_ho_ten'] ?>" value="<?=$hoten ?>">
  </div>
  <div class="row-frm">
    <p><?=$glo_lang['so_dien_thoai'] ?> (*)</p>
    <input type="text" id="phone_dk" class="form-control cls_data_check_form_check_dangky" name="phone_dk"  data-rong="1" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>" value="<?=$sodienthoai ?>">
  </div>
  <div class="row-frm">
    <p><?=$glo_lang['dia_chi'] ?></p>
    <input type="text" name="diachi" class="form-control " value="<?=$diachi ?>">
  </div>
  <div class="row-frm row-frm-thongtin div-quenmatkhau">
    <a onclick="LOAD_popup_new('<?=$full_url."/pa-size-child/doi-mat-khau/" ?>', '400px')"  class=" dk_dangnhap_1 quenmatkhau cur"><?=$glo_lang['thay_doi_mat_khau'] ?></a>
    <a href="<?=$full_url."/lich-su-mua-hang/" ?>"  class=" dk_dangnhap_1 quenmatkhau cur"><?=$glo_lang['lich_su_mua_hang'] ?></a>
    <a href="<?=$full_url."/thoat/" ?>"  class=" dk_dangnhap_1 quenmatkhau cur"><?=$glo_lang['thoat'] ?></a>
    <div class="clr"></div>
  </div>
  <div class="box_dangnhap_popup">
    <h2>
    <a class="cur" onClick="check_capnhat()"><?=$glo_lang['cap_nhat'] ?> <img class="img_load_from_dktv" src="images/loading2.gif"></a>
    </h2>
  </div>
  <div class="clr"></div>
</div>
</form>
<script>
    var send_d = 0;
    function check_capnhat() {
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
                url: "<?=$full_url."/check-doi-thong-tin/" ?>",
                data: dataString,
                success: function(response)
                {
                  console.log(response)
                  alert("<?=$glo_lang['cap_nhat_tai_khoan_thanh_cong']  ?>");
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
<?php } ?>