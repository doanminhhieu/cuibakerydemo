<?php 
    $bre = isset($_GET['view']) ? $glo_lang['chi_tiet_don_hang'] :  $glo_lang['dang_tin'];
    if(empty($thongtin_step)){
      $thongtin_step['id'] = 1;
    }
    $thongtin_step   = LAY_anhstep_now($thongtin_step['id']);
    if(empty($_SESSION['id'])) {
      LOCATION_js($full_url);
      exit();
    }
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    if($id > 0) {
      $baiviet = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '$id' AND `id_user` = '".$_SESSION['id']."' LIMIT 1");
      if(mysql_num_rows($baiviet) == 0) {
        LOCATION_js($full_url);
        exit();
      }
      $baiviet = mysql_fetch_assoc($baiviet);
      foreach ($baiviet as $key => $value) {
        ${$key} = SHOW_text($value);
      }
    }
?>
<div class="bg_link_page" style="background-image:url('<?=checkImage($fullpath, $thongtin_step['icon'], $thongtin_step['duongdantin']) ?>');">
  <div class="pagewrap">
    <ul>
      <h3></h3>
    </ul>
  </div>
</div>
<div class="link_page">
  <div class="pagewrap">
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a><?=$bre ?></a></li>
      <div class="clr"></div>
    </ul>
    <div class="clr"></div>
  </div>
</div>
<div class="page_conten_page">
  <div class="pagewrap">
    <div class="padding_pagewrap">
      <!--  -->
      <div class="dv-dangtin-cont no_box">
        
        <div class="dv-dangtin-rught">
          <h3><?=$id > 0 ? $glo_lang['sua_tin'] : $glo_lang['dang_tin'] ?></h3>
          <div class="nd">
            <form action="" method="post" name="check_dangtin" id="check_dangtin">
              <input type="hidden" name="id" class="is_id" value="<?=!empty($id) ? $id : 0 ?>" >
            <div class="dv-r">
              <p><?=$glo_lang['hinh_anh'] ?> (*)</p>
              <input type="file" name="inputfile" id="inputfile" class="cls_hinhanh">
              <?php 
                if(!empty($icon) && $icon != "") {
              ?>
              <img src="./<?=$duongdantin."/".$icon  ?>" alt="" class="img_chile_dangtin">
              <?php } ?>
              <div class="clr"></div>
            </div>
            <div class="dv-r">
              <p><?=$glo_lang['chu_de'] ?></p>
              <select name="id_parent" class="cls_chude">
                <option value=""><?=$glo_lang['chu_de'] ?></option>
                <?php 
                  $sp_danhmuc = LAY_danhmuc(4);
                  foreach ($sp_danhmuc as $rows) { 
                ?>
                <option value="<?=$rows['id'] ?>" <?=LAY_selected(@$id_parent, $rows['id']) ?>><?=$rows['tenbaiviet_'.$lang] ?></option>
                <?php } ?>
              </select>
              <div class="clr"></div>
            </div>
            <div class="dv-r">
              <p><?=$glo_lang['tieu_de'] ?> (*)</p>
              <input type="text" name="tenbaiviet_vi" class="cls_tieude check_err_data" mess="<?=$glo_lang['nhap_tieu_de'] ?>" value="<?=!empty($tenbaiviet_vi) ? $tenbaiviet_vi : "" ?>">
              <div class="clr"></div>
            </div>
            <div class="dv-r">
              <p><?=$glo_lang['noi_dung'] ?> (*)</p>
              <script src="cke_min/ckeditor.js"></script>
              <textarea id="paEditor" class="paEditor" name="noidung_vi"><?= !empty($noidung_vi) ? $noidung_vi : "" ?></textarea>
              <script>
                  $(function(){
                      CKEDITOR.replace('paEditor');
                  })
              </script>
              <div class="clr"></div>
            </div>
            <?php if($id == 0){ ?>
            <div class="dv-r mbv">
              <p><?=$glo_lang['ma_bao_ve'] ?> (*)</p>
              <input type="text" class="cls_mabaove check_err_data" name="ma_bao_ve" mess="<?=$glo_lang['vui_long_nhap_ma_bao_ve'] ?>">
               <span><img src="<?=$full_url."/load-capcha/" ?>" alt="" onclick="$(this).attr('src','<?=$full_url."/load-capcha/" ?>')" id="img_contact_cap"><i class="fa fa-refresh" onclick="$('#img_contact_cap').attr('src','<?=$full_url."/load-capcha/" ?>')"></i></span>
              <div class="clr"></div>
            </div>
            <?php } ?>
            <div class="dv-r">
              <button type="button" onclick="check_isdangtin('<?=$full_url ?>')"><?=$glo_lang['dang_tin'] ?><img src="images/loading2.gif" class="ajax_img_loading"></button>
              <div class="clr"></div>
              <input type="hidden" class="err_empty_nd" value="<?=$glo_lang['ban_chua_nhap_mo_ta'] ?>">
              <input type="hidden" class="err_empty_anh" value="<?=$glo_lang['ban_chua_chon_anh'] ?>">
            </div>
            </form>
          </div>
        </div>
        <div class="dv-dangtin-left">
          <h3><?=$glo_lang['tai_khoan'] ?></h3>
          <ul>
            <li>
              <a href="<?=$full_url."/dang-tin/" ?>"><?=$glo_lang['dang_tin'] ?></a>
              <a href="<?=$full_url."/quan-ly-tin/" ?>"><?=$glo_lang['quan_ly_tin_dang'] ?></a>
              <a class="cur" onclick="LOAD_popup_new('<?=$full_url ?>/pa-size-child/tai-khoan/', '400px')"><?=$glo_lang['thong_tin_tai_khoan'] ?></a>
              <a class="cur" onclick="LOAD_popup_new('<?=$full_url ?>/pa-size-child/doi-mat-khau/', '400px')"><?=$glo_lang['thay_doi_mat_khau'] ?></a>
              <a href="<?=$full_url ?>/kiem-tra-don-hang/?id=<?=$_SESSION['id'] ?>"><?=$glo_lang['lich_su_mua_hang'] ?></a>
            </li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
      <!--  -->
    </div>
  </div>
</div>
<script>
  function check_isdangtin(url){
    var flg = 0;
    if($(".is_id").val() == 0 && $(".cls_hinhanh").val() == 0) {
      alert($(".err_empty_anh").val());
      flg = 1;
      return false;
    }
    $(".check_err_data").each(function () {
        if ($(this).val() == "") {
            alert($(this).attr("mess"));
            $(this).focus();
            flg = 1;
            return false;
        }
    });
    if (flg == 0 && CKEDITOR.instances.paEditor.document.getBody().getChild(0).getText().trim() == '') {
        alert($(".err_empty_nd").val());
        $(".paEditor ").focus();
        flg = 1;
        return false;
    }
    if (flg == 0) {
        for (instance in CKEDITOR.instances) {
          CKEDITOR.instances[instance].updateElement();
        }
        var formData = new FormData($("#check_dangtin")[0]);
        if ($('#inputfile').length > 0) {
            formData.append('inputfile', $('#inputfile')[0].files[0]);
        }
        $(".ajax_img_loading").show();
        $.ajax({
            type: "POST",
            url: url + "/check_isdangtin/",
            data: formData,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $(".ajax_img_loading").hide();
                $("#img_contact_cap").attr("src",url+"/load-capcha/")
                try {
                    var js_de = JSON.parse(response);
                    alert(js_de.ms);
                    if(js_de.err == 0){
                      window.location.href = url +  "/quan-ly-tin/";
                    }
                } catch (e) {
                    console.log(response);
                } 
            }
        });
    }
  }
</script>