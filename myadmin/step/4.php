<input type="hidden" name="anh_sp" value="<?=!empty($thongtin_step['size_img']) && $thongtin_step['size_img'] != '' ? $thongtin_step['size_img'] : '' ?>">
<div class="nav-tabs-custom">
  <?php include _source."lang.php" ?>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
      <div class="form-group">
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?></label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
      </div>

      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả</label>
        <textarea id="mota_vi" name="mota_vi" rows="10" class="paEditor" cols="80"><?=!empty($mota_vi) ? SHOW_text($mota_vi) : ''?></textarea>
      </div>
      <?php } ?>

      <div class="form-group">
        <label>Nội dung</label>
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
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?> (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
      </div>
 
      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả (<?=_lang_nb2_key ?>)</label>
        <textarea id="mota_en" name="mota_en" rows="10" class="paEditor" cols="80"><?=!empty($mota_en) ? SHOW_text($mota_en) : ''?></textarea>
      </div> 
      <?php } ?>
      
      <div class="form-group">
        <label>Nội dung (<?=_lang_nb2_key ?>)</label>
        <textarea id="noidung_en" name="noidung_en" rows="10" class="paEditor" cols="80"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
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

  </div>
</div>
<div class="box p10">
  <!-- <div class="form-group" >
    <label>Liên kết ngoài</label>
    <input type="text" class="form-control" name="link_video" value="<?=!empty($link_video) ? Show_text($link_video) : "" ?>">
  </div> -->
  <!-- //tinh nang -->
   <?php 
    if($id > 0) {
      $tinhnang_list  = DB_que("SELECT * FROM `#_baiviet_select_tinhnang` WHERE `id_baiviet` = '$id'");
      $list_arr       = array();
      while ($rs      = mysql_fetch_assoc($tinhnang_list)) {
        array_push($list_arr, $rs['id_tinhnang']."_".$rs['id_val']);
      }
    }
    $tinhnang_arr      = LAY_bv_tinhnang($step);
    foreach ($tinhnang_arr as $value) {
      if($value['id_parent'] != 0 ) continue;
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
  <!-- <div class="form-group">
    <label>Quốc gia </label>
    <select name="num_1" class="form-control" onchange="LOAD_tinhthanh(this, '.cls_num_2', 'Tỉnh/thành phố')">
      <option value="0">Quốc gia</option>
      <?php 
        $diadiem = LAY_khuvuc();
        foreach ($diadiem as $rows) {
          if($rows['id_parent'] != 0) continue;
      ?>
      <option value="<?=$rows['id'] ?>" <?=LAY_selected($rows['id'], @$num_1) ?>><?=$rows['tenbaiviet_vi'] ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Tỉnh/thành phố</label>
    <select name="num_2" class="form-control cls_num_2" onchange="LOAD_tinhthanh(this, '.cls_num_3', 'Quận/Huyện')">
      <option value="0">Tỉnh/thành phố</option>
      <?php 
        foreach ($diadiem as $rows) {
          if($rows['id_parent'] != $num_1) continue;
      ?>
      <option value="<?=$rows['id'] ?>" <?=LAY_selected($rows['id'], @$num_2) ?>><?=$rows['tenbaiviet_vi'] ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Quận/Huyện</label>
    <select name="num_3" class="form-control cls_num_3">
      <option value="0">Quận/Huyện</option>
      <?php 
        foreach ($diadiem as $rows) {
          if($rows['id_parent'] != $num_2) continue;
      ?>
      <option value="<?=$rows['id'] ?>" <?=LAY_selected($rows['id'], @$num_3) ?>><?=$rows['tenbaiviet_vi'] ?></option>
      <?php } ?>
    </select>
  </div> -->

  <div class="form-group">
    <label>Seo name <a data-tooltip="Đường dẫn chuẩn bao gồm các ký tự [a-zA-Z0-9-]."> </a></label>
    <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? Show_text($seo_name) : "" ?>">
    <label class="noweight noweight-top checkbox-mini">
      <input class="minimal auto_get_link" type="checkbox" <?=empty($id) || $id == 0 ? 'checked="checked"' : '' ?>> Lấy đường dẫn tự động
    </label>
  </div>

  <?php include "step_hinhanh.php"; ?>
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