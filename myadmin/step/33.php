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
        <label>Địa chỉ</label>
        <input type="text" class="form-control" value="<?=!empty($thuoc_tinh_1_vi) ? SHOW_text($thuoc_tinh_1_vi) : ''?>" name="thuoc_tinh_1_vi">
      </div>
      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả</label>
        <textarea id="mota_vi" name="mota_vi" class="paEditor"><?=!empty($mota_vi) ? SHOW_text($mota_vi) : ''?></textarea>
      </div>
      <?php } ?>
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
      <div class="form-group">
        <label>Địa chỉ <?=_lang_nb2_key ?></label>
        <input type="text" class="form-control" value="<?=!empty($thuoc_tinh_1_en) ? SHOW_text($thuoc_tinh_1_en) : ''?>" name="thuoc_tinh_1_en">
      </div>
      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả (<?=_lang_nb2_key ?>)</label>
        <textarea id="mota_en" name="mota_en" class="paEditor"><?=!empty($mota_en) ? SHOW_text($mota_en) : ''?></textarea>
      </div>
      <?php } ?>
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
      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả (<?=_lang_nb3_key ?>)</label>
        <textarea id="mota_cn" name="mota_cn" class="paEditor"><?=!empty($mota_cn) ? SHOW_text($mota_cn) : ''?></textarea>
      </div>
      <?php } ?>
      <?php if(!in_array($step, $st_bv_noidung)){ ?>
      <div class="form-group">
        <label>Nội dung (<?=_lang_nb3_key ?>)</label>
        <textarea id="noidung_cn" name="noidung_cn" class="paEditor"><?=!empty($noidung_cn) ? SHOW_text($noidung_cn) : ''?></textarea>
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
    <?php if($lang_nb4){ ?>
    <div class="tab-pane" id="tab_4">
      <div class="form-group">
        <label>Tên <?=$thongtin_step['tenbaiviet_vi']?> (<?=_lang_nb4_key ?>)</label>
        <input type="text" class="form-control" value="<?=!empty($tenbaiviet_jp) ? SHOW_text($tenbaiviet_jp) : ''?>" name="tenbaiviet_jp" id="tenbaiviet_jp">
      </div>
      <?php if(!in_array($step, $st_bv_mota)){ ?>
      <div class="form-group">
        <label>Mô tả (<?=_lang_nb4_key ?>)</label>
        <textarea id="mota_jp" name="mota_jp" class="paEditor"><?=!empty($mota_jp) ? SHOW_text($mota_jp) : ''?></textarea>
      </div>
      <?php } ?>
      <?php if(!in_array($step, $st_bv_noidung)){ ?>
      <div class="form-group">
        <label>Nội dung (<?=_lang_nb4_key ?>)</label>
        <textarea id="noidung_jp" name="noidung_jp" class="paEditor"><?=!empty($noidung_jp) ? SHOW_text($noidung_jp) : ''?></textarea>
      </div>
      <?php } ?>

      <div class="form-group">
        <label>Seo Title (<?=_lang_nb4_key ?>)</label>
        <input type="text" class="form-control" name="seo_title_jp" value="<?=!empty($seo_title_jp) ? Show_text($seo_title_jp) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo Description (<?=_lang_nb4_key ?>)</label>
        <input type="text" class="form-control" name="seo_description_jp" value="<?=!empty($seo_description_jp) ? Show_text($seo_description_jp) : "" ?>">
      </div>

      <div class="form-group">
        <label>Seo keywords (<?=_lang_nb4_key ?>)</label>
        <input type="text" class="form-control" name="seo_keywords_jp" value="<?=!empty($seo_keywords_jp) ? Show_text($seo_keywords_jp) : "" ?>">
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<div class="box p10">
  
  <div class="form-group" >
    <label>Số điện thoại </label>
    <input type="text" class="form-control" name="gia_tri_1_vi" value="<?=!empty($gia_tri_1_vi) ? Show_text($gia_tri_1_vi) : "" ?>">
  </div>
  <div class="form-group" >
    <label>Toạ độ Google   <a data-tooltip="Link Tọa độ google lấy từ https://www.google.com/maps/, ví dụ: https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.563789108241!2d108.04175821436091!3d12.676581324714002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31721d8109810281%3A0x772909506302207!2zNTMsIDUgTMOqIER14bqpbiwgVGjDoG5oIHBo4buRIEJ1w7RuIE1hIFRodeG7mXQsIMSQ4bqvayBM4bqvaywgVmlldG5hbQ!5e0!3m2!1sen!2sus!4v1578033688716!5m2!1sen!2sus"> </a></label>
    <input type="text" class="form-control" name="gg_map" value="<?=!empty($gg_map) ? Show_text($gg_map) : "" ?>">
  </div>
  <div class="form-group">
    <label>Seo name <a data-tooltip="Đường dẫn chuẩn bao gồm các ký tự [a-zA-Z0-9-]."> </a></label>
    <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? Show_text($seo_name) : "" ?>">
    <label class="noweight noweight-top checkbox-mini">
      <input class="minimal auto_get_link" type="checkbox" <?=empty($id) || $id == 0 ? 'checked="checked"' : '' ?>> Lấy đường dẫn tự động
    </label>
  </div>
  <?php if(in_array($step, $check_video)){ ?>
  <div class="form-group" >
    <label>Link Video <a data-tooltip="Nhập link của Iframe Video. Ví dụ: https://www.youtube.com/embed/nBADFUDapmk, https://fast.wistia.net/embed/iframe/ahh2wpcw8i"> </a></label>
    <input type="text" class="form-control" name="link_video" value="<?=!empty($link_video) ? Show_text($link_video) : "" ?>">
  </div>
  <?php } ?>
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
    <label class="mr-20 checkbox-mini">
      <input type="checkbox" name="showhi" class="minimal" <?=isset($showhi) && $showhi == 0 ? '' : 'checked="checked"' ?>> Hiển thị
    </label>
  </div>
</div>