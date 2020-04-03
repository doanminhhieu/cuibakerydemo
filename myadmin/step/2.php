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
        <?php 
          if($id > 0) {
            $tinhnang_list  = DB_que("SELECT * FROM `#_baiviet_select_tinhnang` WHERE `id_baiviet` = '$id' AND `show` = 1");
            $list_arr       = array();
            $list_arr_nd    = array();
            while ($rs      = mysql_fetch_assoc($tinhnang_list)) {
              array_push($list_arr, $rs['id_tinhnang']."_".$rs['id_val']);
              $list_arr_nd[$rs['id_tinhnang']."_vi"] = $rs['mota_vi'];
              $list_arr_nd[$rs['id_tinhnang']."_en"] = $rs['mota_en'];
            }
          }
        $tinhnang_arr      = LAY_bv_tinhnang($step);
        foreach ($tinhnang_arr as $value) {
          if($value['id_parent']    != 0 ) continue;
          if($value['loai_hienthi'] != 0 ) continue;

        ?>
        <div class="form-group" style="background: #efefef; padding: 10px;">
          <label style="width: 100%; float: left;"><?=$value['tenbaiviet_vi'] ?></label>
          <div class="dv-lbtinhnang flex">
            <?php
              foreach ($tinhnang_arr as $val2) {  
                if($val2['id_parent'] != $value['id']) continue;
            ?>
            <p style="margin: 10px 0 3px; padding: 0; font-size: 12px; font-weight: 600;"><?=$val2['tenbaiviet_vi'] ?></p>
            <input type="text" name="tinhnang_arr_input[]" value="<?=!empty($list_arr_nd[$val2['id'].'_vi']) ? SHOW_text($list_arr_nd[$val2['id'].'_vi']) : "" ?>">
            <input type="hidden" name="tinhnang_key_arr[]" value="<?=$val2['id'] ?>">
            <?php } ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php } ?>

      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả</label>
        <textarea id="mota_vi" name="mota_vi" class="paEditor"><?=!empty($mota_vi) ? SHOW_text($mota_vi) : ''?></textarea>
      </div>
      <?php } ?>
      
     <!--  <div class="form-group">
        <label>Thông số kỹ thuật</label>
        <textarea id="thongso_vi" name="thongso_vi" class="paEditor"><?=!empty($thongso_vi) ? SHOW_text($thongso_vi) : ''?></textarea>
      </div> -->
      <?php if(!in_array($step, $st_bv_noidung)){ ?>
      <div class="form-group">
        <label>Nội dung</label>
        <textarea id="noidung_vi" name="noidung_vi" class="paEditor"><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
      </div>
      <?php } ?>
 
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

      <?php 

        foreach ($tinhnang_arr as $value) {
          if($value['id_parent']    != 0 ) continue;
          if($value['loai_hienthi'] != 0 ) continue;

        ?>
        <div class="form-group" style="background: #efefef; padding: 10px;">
          <label style="width: 100%; float: left;"><?=$value['tenbaiviet_vi'] ?> (<?=_lang_nb2_key ?>)</label>
          <div class="dv-lbtinhnang flex">
            <?php
              foreach ($tinhnang_arr as $val2) {  
                if($val2['id_parent'] != $value['id']) continue;
            ?>
            <p style="margin: 10px 0 3px; padding: 0; font-size: 12px; font-weight: 600;"><?=$val2['tenbaiviet_vi'] ?> (<?=_lang_nb2_key ?>)</p>
            <input type="text" name="tinhnang_arr_input_en[]" value="<?=!empty($list_arr_nd[$val2['id'].'_en']) ? SHOW_text($list_arr_nd[$val2['id'].'_en']) : "" ?>">
            <?php } ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php } ?>

      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả (<?=_lang_nb2_key ?>)</label>
        <textarea id="mota_en" name="mota_en" class="paEditor"><?=!empty($mota_en) ? SHOW_text($mota_en) : ''?></textarea>
      </div>
      <?php } ?>

     <!--  <div class="form-group">
        <label>Thông số kỹ thuật (<?=_lang_nb2_key ?>)</label>
        <textarea id="thongso_en" name="thongso_en" class="paEditor"><?=!empty($thongso_en) ? SHOW_text($thongso_en) : ''?></textarea>
      </div> -->

      
      <?php if(!in_array($step, $st_bv_noidung)){ ?>
      <div class="form-group">
        <label>Nội dung (<?=_lang_nb2_key ?>)</label>
        <textarea id="noidung_en" name="noidung_en" class="paEditor"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
      </div>
      <?php } ?>

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

<div class="box p10">
  <?php if(CHECK_key_setting("ma-san-pham")){ ?>
  <div class="form-group" >
    <label>Mã sản phẩm</label>
    <input type="text" class="form-control" name="p1" value="<?=!empty($p1) ? Show_text($p1) : "" ?>">
  </div>
  <?php } ?>
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
  <!-- //tinh nang -->
   <?php 
    // if($id > 0) {
    //   $tinhnang_list  = DB_que("SELECT * FROM `#_baiviet_select_tinhnang` WHERE `id_baiviet` = '$id' AND `show` = 1");
    //   $list_arr       = array();
    //   $list_arr_nd    = array();
    //   while ($rs      = mysql_fetch_assoc($tinhnang_list)) {
    //     array_push($list_arr, $rs['id_tinhnang']."_".$rs['id_val']);
    //     $list_arr_nd[$rs['id_tinhnang']] = $rs['id_val'];
    //   }
    // }
    //$tinhnang_arr      = LAY_bv_tinhnang($step);
    foreach ($tinhnang_arr as $value) {
      if($value['id_parent']    != 0 ) continue;
      if($value['loai_hienthi'] != 1 ) continue;

  ?>
  <div class="form-group">
    <label><?=$value['tenbaiviet_vi'] ?></label>
    <div class="dv-lbtinhnang flex">
      <select name="tinhnang_arr[]" id="id_parent" class="form-control">
        <option value="">Chọn <?=$value['tenbaiviet_vi'] ?></option>
          <?php
          foreach ($tinhnang_arr as $val2) {  
            if($val2['id_parent'] != $value['id']) continue;
        ?>
        <option value="<?=$value['id'].'_'.$val2['id'] ?>" <?=!empty($list_arr) && in_array($value['id'].'_'.$val2['id'], @$list_arr) ? 'selected="selected"' : "" ?>><?=$val2['tenbaiviet_vi'] ?></option>
        <?php } ?>
      </select>
      <div class="clear"></div>
    </div>
  </div>

  <?php } ?>
</div>

<div class="box p10">
  <!-- <div class="form-group">
    <label>Khuyến mãi kèm theo</label>
    <select name="tinh_nang[]" class="form-control SlectBoxNew" multiple="multiple">
      <?php 
        $tinh_nang = @explode(",", $tinh_nang);
        $danhmuc = LAY_baiviet(14);
        foreach ($danhmuc as $rows) {
      ?>
      <option value="<?=$rows['id'] ?>" <?=in_array($rows['id'], $tinh_nang) ? 'selected="selected"' : "" ?>><?=$rows['tenbaiviet_vi'] ?></option> 
      <?php } ?>
    </select>
  </div> -->

  <!-- end -->
  <?php if(in_array($step, $check_video)){ ?>
  <div class="form-group" >
    <label>Link Video <a data-tooltip="Nhập link Video Youtube. Ví dụ: https://www.youtube.com/watch?v=SQ-KWxC7Eoo&feature=emb_logo"> </a></label>
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
