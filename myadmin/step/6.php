<input type="hidden" name="anh_sp" value="<?=!empty($thongtin_step['size_img']) && $thongtin_step['size_img'] != '' ? $thongtin_step['size_img'] : '' ?>">
<div class="nav-tabs-custom">
  <?php include _source."lang.php" ?>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
      <div class="form-group">
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?></label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
      </div>
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
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?> (<?=_lang_nb2_key ?>)</label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
      </div>
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
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?> (<?=_lang_nb3_key ?>)</label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_cn) ? SHOW_text($tenbaiviet_cn) : ''?>" name="tenbaiviet_cn" id="tenbaiviet_cn">
      </div>
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
      <input name="ngaydang" type="text" class="form-control pull-right datepicker" id="datepicker" value='<?=$ngaydang?>'>
    </div>
  </div>

  <div class="form-group">
    <label>Số thứ tự</label>
    <input type="text" class="form-control" name="catasort" id="catasort" value="<?=SHOW_text($catasort)?>" onkeyup="SetCurrency(this)">
  </div>
  <div class="form-group">
    <label class="mr-20">
      <input type="radio" name="showhi" class="minimal" value="1" <?=$id > 0 ? LAY_checked($showhi, 1) : 'checked' ?>> Hiện thị
    </label>
    <label>
      <input type="radio" name="showhi" class="minimal" value="2" <?=$id > 0 ? LAY_checked($showhi, 2) : '' ?>> Ẩn
    </label>
  </div>
</div>
