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
    <h3 class="tit"><?=$glo_lang['nhap_seri_kich_hoat_thanh_vien'] ?></h3>
  </div>
  <div class="col-md-4 row-frm">
    <input type="text" name="ma_seri" class="form-control cls_data_check_form_check_dangky" data-rong="1" data-msso="<?=$glo_lang['chua_nhap_ma_seri'] ?>"  placeholder="<?=$glo_lang['ma_seri'] ?> (*)">
  </div>
   
  <div class="col-md-4 row-frm row-frm-mbv">
    <span class="span_mbv">
      <img src="<?=$full_url."/load-capcha/" ?>" alt="CAPTCHA code" onclick="$(this).attr('src','<?=$full_url."/load-capcha/" ?>')" id="img_contact_cap"><i class="fa fa-refresh" onclick="$('#img_contact_cap').attr('src','<?=$full_url."/load-capcha/" ?>')"></i>
    </span>
    <input class="form-control cls_data_check_form_check_dangky" data-rong="1" name="mabaove" id="mabaove" type="text" placeholder="<?=$glo_lang['ma_bao_ve'] ?> (*)" value="" data-msso="<?=$glo_lang['vui_long_nhap_ma_bao_ve'] ?>"/>
  </div>
  <div class="box_dangnhap_popup">
    <h2><a class="cur" onClick="check_kich_hoat()"><?=$glo_lang['dang_nhap'] ?> <img class="img_load_from_dktv" src="images/loading2.gif"></a></h2>
  </div>
  <div class="clr"></div>
</div>
</form>

<script type="text/javascript">
  var send_d = 0;
  function check_kich_hoat() {
    var check = 0;
    $(".cls_data_check_form_check_dangky").each(function(){
        var val     = $(this).val().trim();
        var id      = $(this).attr('id');
        var rong    = $(this).attr('data-rong');

        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(rong == 1 && val == ""){
            alert($(this).attr('data-msso'));
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
            url: "<?=$full_url."/check-ma-seri/" ?>",
            data: dataString,
            success: function(response)
            {
              // console.log(response)
              var obj = jQuery.parseJSON(response);
              if(obj.error == 10){
                alert("<?=$glo_lang['nhap_ma_bao_ve_chua_dung'] ?>");
                $("#mabaove").focus();
              }
              else if(obj.error > 0){
                  alert("<?=$glo_lang['ma_seri_khong_ton_tai_hoac_da_duoc_su_dung']  ?>");
              }else{
                alert("<?=$glo_lang['ma_seri_chi_su_dung_dang_nhap_1_lan_vui_long_cap_nhat_thong_tin_de_dang_nhap_lan_sau']  ?>")
                window.location.href="<?=$full_url."/tai-khoan/" ?>";
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
          check_kich_hoat();
        }
    });
</script> 