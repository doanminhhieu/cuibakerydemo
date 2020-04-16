<input type="hidden" name="step" value="<?=$step ?>">
<input type="hidden" name="id_edit" class="id_edit" value="<?= !empty($id) ? $id : 0 ?>">
<input type="hidden" name="anh_sp" value="<?=!empty($thongtin_step['size_img']) && $thongtin_step['size_img'] != '' ? $thongtin_step['size_img'] : '' ?>">
<div class="nav-tabs-custom">
  <?php include _source."lang.php" ?>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
      <div class="form-group">
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?></label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
      </div>
      
      <div class="form-group">
        <label>Mô tả ngắn</label>
        <textarea id="mota_vi" name="mota_vi" class="paEditor" rows="10" cols="50"><?=!empty($mota_vi) ? SHOW_text($mota_vi) : ''?></textarea>
      </div>
 
      <div class="form-group">
        <label>Nội dung </label>
        <textarea id="noidung_vi" name="noidung_vi" class="paEditor" rows="10" cols="80"><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
      </div>
 
      <div class="form-group">
        <label>Seo Title</label>
        <input type="text" class="form-control" name="seo_title_vi" value="<?=!empty($seo_title_vi) ? Show_text($seo_title_vi) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo Description</label>
        <input type="text" class="form-control" name="seo_description_vi" value="<?=!empty($seo_description_vi) ? Show_text($seo_description_vi) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo keywords</label>
        <input type="text" class="form-control" name="seo_keywords_vi" value="<?=!empty($seo_keywords_vi) ? Show_text($seo_keywords_vi) : "" ?>">
      </div>
    </div>
    <?php if($lang_nb2){ ?>
    <div class="tab-pane" id="tab_2">
      <div class="form-group">
        <label>Tên <?=getTypeTitle($_GET['step'])?> (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
      </div>
 
      <div class="form-group">
        <label>Mô tả ngắn (<?=_lang_nb2_key ?>)</label>
        <textarea id="mota_en" name="mota_en" class="paEditor" rows="10" cols="50"><?=!empty($mota_en) ? SHOW_text($mota_en) : ''?></textarea>
      </div>
 
      <div class="form-group">
        <label>Nội dung (<?=_lang_nb2_key ?>)</label>
        <textarea id="noidung_en" name="noidung_en" class="paEditor" rows="10" cols="80"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
      </div>

      <div class="form-group">
        <label>Seo Title (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" name="seo_title_en" value="<?=!empty($seo_title_en) ? Show_text($seo_title_en) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo Description (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" name="seo_description_en" value="<?=!empty($seo_description_en) ? Show_text($seo_description_en) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo keywords (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" name="seo_keywords_en" value="<?=!empty($seo_keywords_en) ? Show_text($seo_keywords_en) : "" ?>">
      </div>
    </div>
    <?php } ?>
    <?php if($lang_nb3){ ?>
    <div class="tab-pane" id="tab_3">
      <div class="form-group">
        <label>Tên <?=getTypeTitle($_GET['step'])?> (<?=_lang_nb3_key ?>)</label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_cn) ? SHOW_text($tenbaiviet_cn) : ''?>" name="tenbaiviet_cn" id="tenbaiviet_cn">
      </div>
 
      <div class="form-group">
        <label>Mô tả (<?=_lang_nb3_key ?>)</label>
        <textarea id="mota_cn" name="mota_cn" rows="10" cols="80"><?=!empty($mota_cn) ? SHOW_text($mota_cn) : ''?></textarea>
      </div>
      
      <?php if(CHECK_key_setting("noi-dung-san-pham")){ ?>
      <div class="form-group">
        <label>Mô tả chi tiết (<?=_lang_nb3_key ?>)</label>
        <textarea id="noidung_cn" name="noidung_cn" rows="10" cols="80"><?=!empty($noidung_cn) ? SHOW_text($noidung_cn) : ''?></textarea>
      </div>
      <?php } ?>

      <div class="form-group">
        <label>Seo Title (<?=_lang_nb3_key ?>)</label>
        <input type="text" class="form-control" name="seo_title_cn" value="<?=!empty($seo_title_cn) ? Show_text($seo_title_cn) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo Description (<?=_lang_nb3_key ?>)</label>
        <input type="text" class="form-control" name="seo_description_cn" value="<?=!empty($seo_description_cn) ? Show_text($seo_description_cn) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo keywords (<?=_lang_nb3_key ?>)</label>
        <input type="text" class="form-control" name="seo_keywords_cn" value="<?=!empty($seo_keywords_cn) ? Show_text($seo_keywords_cn) : "" ?>">
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<!-- //tinh nang -->
<link rel="stylesheet" href="dist/bootstrap-tagsinput.css">
<script src="dist/bootstrap-tagsinput.min.js"></script>
<style>
  .dv-ground-tinhnang .form-group { width: calc(20% - 10px); float: left; padding: 6px; border: 1px solid #e0e0e09e; margin-right: 10px; line-height: 1; border-radius: 4px; transition: all .5s; margin-bottom: 10px; }
  .dv-ground-tinhnang .form-group p { width: 100%; display: block; float: left; margin: 0px 0 10px 0; font-weight: 500; color: #adadad;}
  .dv-ground-tinhnang .form-group label { float: left; width: 100%; line-height: 20px; margin: 0 0 0px !important; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; font-weight: 500}
  .dv-ground-tinhnang .form-group input[type="text"] { height: 28px; padding: 0 7px; border-radius: 3px; }
  .dv-ground-tinhnang .form-group:hover { border-color: #e0e0e0; border-radius: 7px;  }
  .dv-pro-thuoctinh.form-group .addtt { display: inline-block; padding: 5px 10px; background: #3c8dbc; border-radius: 4px; margin: 7px 0px 0 10px; color: #fff; }
  .dv-pro-thuoctinh .th_1{width: 250px;}
  .bootstrap-tagsinput { width: 100%; padding: 0 6px !important; border-radius: 0 !important; }
  .bootstrap-tagsinput input { display: inline-block !important; height: 30px; }
  .dv-pro-thuoctinh .th_3{width: 50px;}
  .dv-yags-en {margin-top: 5px; display: none}
  .dv-pbh1 { width: 50px; float: left; }
  .dv-pbh2 { width: 250px; float: left; }
  .dv-pbh3 { width: calc(100% - 300px); float: left; }
  .clr {clear: both; height: 0}
  .dv-js-jjthuoctinh .gr { border-top: 1px solid #e8e8e8; padding: 10px 0; }
  .dv-cacphienban > h3 { font-size: 13px; }
  .dv-cont-pb .hd { background: #ecf0f5; padding: 7px 0; font-weight: 600; color: #3c8dbc; }
</style>
<div class="box p10">
  <div class="form-group">
    <label>Thuộc tính </label>
  </div>
  <div class="dv-pro-thuoctinh form-group">
    <table style="width: 100%">
      <tr>
        <th class="th_1">Tên thuộc tính</th>
        <th class="th_2">Giá trị <a data-tooltip="Mỗi giá trị cách nhau bởi dấu ,"> </a></th>
        <th class="th_3"></th>
      </tr>
      <tr class="tr_thuoctinh_1">
        <td>
          <input name="thuoc_tinh_1_vi"  type="text" value="<?=!empty($thuoc_tinh_1_vi) ? $thuoc_tinh_1_vi : "" ?>" class="lang_vii form-control thuoc_tinh_1_vi">
          <input name="thuoc_tinh_1_en"  type="text" value="<?=!empty($thuoc_tinh_1_en) ? $thuoc_tinh_1_en : "" ?>" class="lang_enn form-control thuoc_tinh_1_en" style="display: none">
        </td>
        <td>
          <div class="dv-yags-vi acti">
            <input name="gia_tri_1_vi" type="text" value="<?=!empty($gia_tri_1_vi) ? $gia_tri_1_vi : "" ?>" class="form-control gia_tri_1_vi js_taginput tagsinput_1" data-role="tagsinput" >
          </div>
          <div class="dv-yags-en" >
            <input name="gia_tri_1_en" type="text" value="<?=!empty($gia_tri_1_en) ? $gia_tri_1_en : "" ?>" class="form-control gia_tri_1_en" placeholder="Nhập tiếng anh cho cột giá trị, mỗi giá trị cách nhau bởi dấu , tương đương như Tiếng Việt" >
          </div>
        </td>
        <td></td>
      </tr>
      <tr class="tr_thuoctinh_2 <?=!empty($thuoc_tinh_2_vi) && $thuoc_tinh_2_vi != '' ? "" : "hide" ?> ">
        <td>
          <input name="thuoc_tinh_2_vi" type="text" value="<?=!empty($thuoc_tinh_2_vi) ? $thuoc_tinh_2_vi : "" ?>"  class="lang_vii form-control thuoc_tinh_2_vi">
          <input name="thuoc_tinh_2_en" type="text" value="<?=!empty($thuoc_tinh_2_en) ? $thuoc_tinh_2_en : "" ?>"  class="lang_enn form-control thuoc_tinh_2_en" style="display: none">
        </td>
        <td>
          <div class="dv-yags-vi acti">
            <input name="gia_tri_2_vi"  type="text" value="<?=!empty($gia_tri_2_vi) ? $gia_tri_2_vi : "" ?>" class="form-control gia_tri_2_vi js_taginput tagsinput_2" data-role="tagsinput" >
          </div>
          <div class="dv-yags-en">
            <input name="gia_tri_2_en"  type="text" value="<?=!empty($gia_tri_2_en) ? $gia_tri_2_en : "" ?>" class="form-control gia_tri_2_en" placeholder="Nhập tiếng anh cho cột giá trị, mỗi giá trị cách nhau bởi dấu , tương đương như Tiếng Việt">
          </div>
        </td>
        <td>
          <a class="cur" onclick="hide_thuoc_tinh(2)"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr class="tr_thuoctinh_3 <?=!empty($thuoc_tinh_3_vi) && $thuoc_tinh_3_vi != '' ? "" : "hide" ?>">
        <td>
          <input name="thuoc_tinh_3_vi" type="text" value="<?=!empty($thuoc_tinh_3_vi) ? $thuoc_tinh_3_vi : "" ?>" class="lang_vii form-control thuoc_tinh_3_vi">
          <input name="thuoc_tinh_3_en" type="text" value="<?=!empty($thuoc_tinh_3_en) ? $thuoc_tinh_3_en : "" ?>" class="lang_enn form-control thuoc_tinh_3_en" style="display: none">
        </td>
        <td>
          <div class="dv-yags-vi acti">
            <input name="gia_tri_3_vi" type="text" value="<?=!empty($gia_tri_3_vi) ? $gia_tri_3_vi : "" ?>" class="form-control js_taginput tagsinput_3 gia_tri_3_vi" data-role="tagsinput" >
          </div>
          <div class="dv-yags-en" >
            <input name="gia_tri_3_en" type="text" value="<?=!empty($gia_tri_3_en) ? $gia_tri_3_en : "" ?>" class="form-control gia_tri_3_en" placeholder="Nhập tiếng anh cho cột giá trị, mỗi giá trị cách nhau bởi dấu , tương đương như Tiếng Việt" >
          </div>
        </td>
        <td>
          <a class="cur" onclick="hide_thuoc_tinh(3)"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
      </tr>

    </table>
    <a class="cur addtt" onclick="them_thuoc_tinh()" <?=@$thuoc_tinh_2_vi != "" && $thuoc_tinh_3_vi != "" ? 'style="display: none;"' : '' ?> >Thêm thuộc tính khác</a>
    <div class="dv-cacphienban">
      <h3>Chỉnh sửa các phiên bản dưới đây để tạo:</h3>
      <div class="dv-cont-pb">
        <div class="gr">
          <div class="dv-pbh1 hd">&nbsp;</div>
          <div class="dv-pbh2 hd">Phiên bản</div>
          <div class="dv-pbh3 hd">Giá</div>
          <div class="clr"></div>
        </div>
        <div class="dv-js-jjthuoctinh"></div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="js_vitri" class="js_vitri" value="">
<?php 
  $gia_luu = DB_fet_new("*", "`#_baiviet_thuoctinh`", "`id_sp` = '$id'", "", "", "arr", "catasort");
?>
<script>
  var vitri = 0;
  function LOAD_html_thuoctinh(thuoctinh){
    if(thuoctinh != "") {
      $(".dv-js-jjthuoctinh").append('<div class="gr"><input type="hidden" name="thuoctinh_sort_'+vitri+'" value="'+vitri+'"><input type="hidden" name="thuoctinh_name_'+vitri+'" value="'+thuoctinh+'"><div class="dv-pbh1"><input type="checkbox" name="thuoctinh_showhi_'+vitri+'" class="thuoctinh_showhi_'+vitri+'"  checked="checked"></div><div class="dv-pbh2">'+thuoctinh+'</div><div class="dv-pbh3"><input type="text" class="price_thuoc_tinh_'+vitri+'" name="thuoctinh_pri_'+vitri+'" onkeyup="SetCurrency(this)" value=""></div><div class="clr"></div></div>');
      $(".js_vitri").val(vitri);
      vitri++;
    }
    <?php 
      foreach ($gia_luu as $key => $value) {
        if($value['showhi'] == 0){
    ?>
    $(".thuoctinh_showhi_<?=$key ?>").attr('checked', false);
    <?php } ?>
    $(".price_thuoc_tinh_<?=$key ?>").val("<?=NUMBER_fomat($value['gia']) ?>");
    <?php } ?>
  }
  function LOAD_thuoctinh_pri(){
    vitri = 0;
    $(".js_vitri").val("");
    $(".dv-js-jjthuoctinh").html("");
    var arr_1 = "";
    var arr_2 = "";
    var arr_3 = "";
    $('.js_taginput').each(function(){
      if(arr_1 == "") arr_1 = $(this).val();
      else if(arr_2 == "") arr_2 = $(this).val();
      else if(arr_3 == "") arr_3 = $(this).val();
    });
    arr_1 = arr_1.split(",");
    arr_2 = arr_2.split(",");
    arr_3 = arr_3.split(",");
    if(arr_1 != ""){
      arr_1.forEach(function(a1) {
        var list_key = "";
        if(a1 != "") {
          list_key += a1;
          // a2
          if(arr_2 != ""){
            arr_2.forEach(function(a2) {
              if(a2 != "") {
                // arr_3
                if(arr_3 != ""){
                  arr_3.forEach(function(a3) {
                    if(a3 != "") {
                      LOAD_html_thuoctinh(list_key+","+a2+","+a3);
                    }
                  });
                }
                else {
                  LOAD_html_thuoctinh(list_key+","+a2);
                }
                // 
              }
            });
          }
          else if(arr_3 != ""){
            arr_3.forEach(function(a3) {
              if(a3 != "") {
                LOAD_html_thuoctinh(list_key+","+a3);
              }
            });
          }
          else {
            LOAD_html_thuoctinh(list_key);
          }
          //
        }
      });
    }
  }

  $('.js_taginput').on('change', function(event) {
    LOAD_thuoctinh_pri();
  });
  $(".js_tab_vi").click(function(){
    $(".lang_vii").show();
    $(".lang_enn").hide();
    $(".dv-yags-en").hide();
  });
  $(".js_tab_en").click(function(){
    $(".lang_vii").hide();
    $(".lang_enn").show();
    $(".dv-yags-en").show();
  });
  function hide_thuoc_tinh(id) {
    $(".tr_thuoctinh_"+id).addClass("hide");
    $(".tagsinput_"+id).tagsinput('removeAll');
    $(".thuoc_tinh_"+id+"_vi").val("");
    $(".thuoc_tinh_"+id+"_en").val("");
    $(".gia_tri_"+id+"_vi").val("");
    $(".gia_tri_"+id+"_en").val("");
    $(".addtt").show();

    LOAD_thuoctinh_pri();
  };
  function them_thuoc_tinh(){
    if($(".tr_thuoctinh_2.hide").length > 0) $(".tr_thuoctinh_2").removeClass("hide");
    else if($(".tr_thuoctinh_3.hide").length > 0) $(".tr_thuoctinh_3").removeClass("hide");
    if($(".tr_thuoctinh_2.hide").length == 0 && $(".tr_thuoctinh_3.hide").length == 0) $(".addtt").hide();
  };

</script>
<!-- end -->

<div class="box p10" >
  <div class="form-group">
    <label>Giá bán</label>
    <input type="text" class="form-control cls_giatien_f" name="giatien" value="<?=!empty($giatien) ? $giatien : "0" ?>" onkeyup="SetCurrency(this)">
  </div>
 
  <div class="form-group" >
    <label>Giá so sánh: </label>
    <input type="text" class="form-control cls_giatien_khuyenmai_f" name="giakm" value="<?=!empty($giakm) ? $giakm : "0" ?>" onkeyup="SetCurrency(this)">
  </div> 
</div>

<div class="box p10">
  <?php if(CHECK_key_setting("ma-san-pham")){ ?>
  <div class="form-group" >
    <label>Mã sản phẩm</label>
    <input type="text" class="form-control" name="p1" value="<?=!empty($p1) ? Show_text($p1) : "" ?>">
  </div>
  <?php } ?>

  

  <!-- end -->
  <?php if(in_array($step, $check_video)){ ?>
  <div class="form-group" >
    <label>Link Video <a data-tooltip="Nhập link của Iframe Video. Ví dụ: https://www.youtube.com/embed/nBADFUDapmk, https://fast.wistia.net/embed/iframe/ahh2wpcw8i"> </a></label>
    <input type="text" class="form-control" name="link_video" value="<?=!empty($link_video) ? Show_text($link_video) : "" ?>">
  </div>
  
  <?php } ?>
  <div class="form-group">
    <label>Seo name <a data-tooltip="Đường dẫn chuẩn bao gồm các ký tự [a-zA-Z0-9-]."> </a></label>
    <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? Show_text($seo_name) : "" ?>">
    <label class="noweight noweight-top checkbox-mini">
      <input class="minimal auto_get_link" type="checkbox" <?=empty($id) || $id == 0 ? 'checked="checked"' : '' ?>> Lấy đường dẫn tự động
    </label>
  </div>
  <?php include "step_hinhanh.php"; ?>
  <!-- <div class="form-group">
    <label>Thương hiệu</label>
    <select name="num_3" id="num_3" class="form-control SlectBox">
      <option value="0">Chọn thương hiệu</option>
      <?php 
        $danhmuc = LAY_danhmuc($step,"","`id_parent` = 0");
        foreach ($danhmuc as $rows) {
      ?>
      <option value="<?=$rows['id'] ?>" <?=LAY_selected(@$num_3, $rows['id']) ?>><?=$rows['tenbaiviet_vi'] ?></option> 
      <?php } ?>
    </select>
  </div> -->
  <div class="form-group ">
    <label>Hiển thị</label>
    <?=LAY_chude_muti(@$id_parent_muti, $step , 'id_parent_muti[]', ' form-control SlectBoxNew', 0, 0, 'false', "multiple='multiple'") ?>
  </div>

  <div class="form-group">
    <label>Ngày đăng</label>
    <div class="input-group date">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input name="ngaydang" type="text" class="form-control pull-right" id="datepicker" value='<?=$ngaydang?>'>
    </div>
  </div>
  <div class="form-group">
    <label>Số thứ tự</label>
    <input type="text" class="form-control" name="catasort" id="catasort" value="<?=SHOW_text($catasort)?>" onkeyup="SetCurrency(this)">
  </div>
  <div class="form-group">
    <label class="mr-20 checkbox-mini">
      <input type="checkbox" name="showhi" class="minimal" <?=isset($showhi) && $showhi == 0 ? '' : 'checked="checked"' ?>> Hiển thị
    </label>
  </div>
</div>
