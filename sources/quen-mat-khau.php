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
          <!--  -->
          <?php
              if(isset($_SESSION['id'])) {
                LOCATION_js($full_url);
                exit();
              }
          ?>

          <div class="dangnhap_popup no_box">
            <div class="titBox left">
              <h3 class="tit_2"><?=$glo_lang['quen_mat_khau'] ?></h3>
            </div>
            <p class="text_quen_mat_kahu"><?=$glo_lang['text_quen_pass'] ?></p>
            <div class="col-md-3 row-frm">
              <p><?=$glo_lang['email'] ?> (*)</p>
              <input type="text"  id="forget_pass" name="forget_pass" class="form-control cls_data_check_form_check_dangky" data-rong="1" data-email="1" data-msso="<?=$glo_lang['chua_nhap_dia_chi_email'] ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>">
            </div>
            <div class="box_dangnhap_popup">
              <a class="cur" class="btn_send_qmk" onclick="check_email('<?=$full_url ?>')"><?=$glo_lang['gui'] ?> <img class="img_load_from_dktv" src="images/loading2.gif"></a>
            </div>
            <input type="hidden" class="email_khong_hop_le" value="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>">
            <input type="hidden" class="alert_forget_pass_error" value="<?=$glo_lang['alert_forget_pass_error'] ?>">
            <input type="hidden" class="alert_forget_pass2" value="<?=$glo_lang['alert_forget_pass2'] ?>">
            <input type="hidden" class="alert_forget_pass" value="<?=$glo_lang['alert_forget_pass'] ?>">
            <div class="clr"></div>
          </div>
          <script type="text/javascript">
            var send_d = 0;
            function check_email(url) {
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

              if(check == 0){
                if(send_d == 0){
                  send_d = 1;
                  $(".img_load_from_dktv").show();
                  $.ajax({
                      type: "POST",
                      url: url+"/check-email",
                      data: {"email": $('#forget_pass').val()},
                      success: function(response)
                      {
                        var obj = jQuery.parseJSON(response);
                        if(obj.error > 0){
                            var er = $(".alert_forget_pass_error").val();
                            alert(er);
                        }else{
                            alert($(".alert_forget_pass").val()+" " + obj.ms+'\n'+ $(".alert_forget_pass2").val());
                            //bat login
                            // LOAD_popup_new('<?=$full_url ?>/pa-size-child/dang-nhap/');
                            window.location.href = "<?=$full_url."/signin/" ?>";
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
          <!--  -->
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