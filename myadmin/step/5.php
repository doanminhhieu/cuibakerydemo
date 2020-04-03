<input type="hidden" name="anh_sp" value="<?=!empty($thongtin_step['size_img']) && $thongtin_step['size_img'] != '' ? $thongtin_step['size_img'] : '' ?>">
<div class="nav-tabs-custom">
  <?php include _source."lang.php" ?>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
      <div class="form-group">
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?></label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
      </div>
      <?php if(CHECK_key_setting("mo-ta-gioi-thieu")){ ?>
      <div class="form-group">
        <label>Mô tả</label>
        <textarea id="mota_vi" class="paEditor" name="mota_vi" rows="10" cols="80"><?=!empty($mota_vi) ? SHOW_text($mota_vi) : ''?></textarea>
      </div>
      <?php } ?>

      <div class="form-group">
        <label>Nội dung</label>
        <textarea id="noidung_vi" class="paEditor" name="noidung_vi" rows="10" cols="80"><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
      </div>

      <div class="form-group"  style="display: none">
        <label>Seo Title</label>
        <input type="text" class="form-control" name="seo_title_vi" value="<?=!empty($seo_title_vi) ? Show_text($seo_title_vi) : "" ?>">
      </div>

      <div class="form-group"  style="display: none">
        <label>Seo Description</label>
        <input type="text" class="form-control" name="seo_description_vi" value="<?=!empty($seo_description_vi) ? Show_text($seo_description_vi) : "" ?>">
      </div>

      <div class="form-group"  style="display: none">
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
      <?php if(CHECK_key_setting("mo-ta-gioi-thieu")){ ?>
      <div class="form-group">
        <label>Mô tả (<?=_lang_nb2_key ?>)</label>
        <textarea id="mota_en" class="paEditor" name="mota_en" rows="10" cols="80"><?=!empty($mota_en) ? SHOW_text($mota_en) : ''?></textarea>
      </div>
      <?php } ?>

      <div class="form-group">
        <label>Nội dung (<?=_lang_nb2_key ?>)</label>
        <textarea id="noidung_en" class="paEditor" name="noidung_en" rows="10" cols="80"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
      </div>

      <div class="form-group"  style="display: none">
        <label>Seo Title (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" name="seo_title_en" value="<?=!empty($seo_title_en) ? Show_text($seo_title_en) : "" ?>">
      </div>

      <div class="form-group"  style="display: none">
        <label>Seo Description (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" name="seo_description_en" value="<?=!empty($seo_description_en) ? Show_text($seo_description_en) : "" ?>">
      </div>

      <div class="form-group"  style="display: none">
        <label>Seo keywords (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" name="seo_keywords_en" value="<?=!empty($seo_keywords_en) ? Show_text($seo_keywords_en) : "" ?>">
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<div class="box p10">
  <!-- <div class="form-group">
    <label>Icon</label>
    <input type="text" class="form-control" name="p1" value="<?=!empty($p1) ? Show_text($p1) : "" ?>">
  </div> -->
  <div class="form-group" style="display: none">
    <input type="text" class="form-control" name="seo_name"  value="<?=!empty($seo_name) ? Show_text($seo_name) : md5(time()) ?>">
  </div>

  <?php include "step_hinhanh.php"; ?>

  <div class="form-group"  style="display: none">
    <label>Ngày đăng</label>
    <div class="input-group date">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input name="ngaydang" type="text" class="form-control pull-right datepicker" id="datepicker" value='<?=$ngaydang?>'>
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