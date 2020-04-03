<?php
global $full_url;
  $table = '#_banner';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? $_GET['edit'] : 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }

      $catasort         = str_replace(".", "", $catasort);
      $showhi           = isset($_POST['showhi']) ? 1 : 0;
      $check_video      = isset($_POST['check_video']) ? 1 : 0;
 
    }
  if(!empty($_POST))
    {
      $data                   = array();
      $data['tenbaiviet_vi']  = @$tenbaiviet_vi;
      $data['tenbaiviet_en']  = @$tenbaiviet_en;
      $data['tenbaiviet_cn']  = @$tenbaiviet_cn;
      $data['noidung_vi']     = @$noidung_vi;
      $data['noidung_en']     = @$noidung_en;
      $data['noidung_cn']     = @$noidung_cn;
      $data['mota_vi']        = @$mota_vi;
      $data['mota_en']        = @$mota_en;
      $data['mota_cn']        = @$mota_cn;
      $data['id_parent']      = is_numeric(@$id_parent) ? @$id_parent : 0;
      $data['seo_name']       = @$seo_name;
      $data['catasort']       = is_numeric(@$catasort) ? @$catasort : 0;
      $data['showhi']         = is_numeric(@$showhi) ? @$showhi : 0;
      $data['check_video']    = is_numeric(@$check_video) ? @$check_video : 0;
      $data['duongdantin']    = @$duongdantin;
      $data['blank']          = @$blank;
      $data['id_kietxuat']    = is_numeric(@$id_kietxuat) ? @$id_kietxuat : 0;
      $data['id_danhmuc']     = is_numeric(@$id_danhmuc) ? @$id_danhmuc : 0;

      $data['ngaydang']     = time();
      $data['catasort']     = is_numeric($catasort) ? $catasort : 0;

      $hinhanh              = UPLOAD_image("icon", "../".$duongdantin."/", time());
      $video                = UPLOAD_file("video", "../datafiles/files/", time());

      if($id > 0){
        $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
        $sql_thongtin = mysql_fetch_assoc($sql_thongtin);
      }
      if ($video) {
        $data['video']     = $video;
        if($id > 0 && is_array($sql_thongtin)){
          @unlink("../datafiles/files/".$sql_thongtin["video"]);
        }
      }

      if($hinhanh) {
          $data['icon']   = $hinhanh;
          TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 300, 300); 
          if($id > 0 && is_array($sql_thongtin)){

            @unlink("../".$sql_thongtin["duongdantin"]."/".$sql_thongtin["icon"]);
            @unlink("../".$sql_thongtin["duongdantin"]."/thumb_".$sql_thongtin["icon"]);

          }
        }
      if($id == 0){
        $id = ACTION_db($data, $table , 'add', NULL,NULL);
        $_SESSION['show_message_on'] =  "Thêm hình ảnh thành công!";
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
        $_SESSION['show_message_on'] =  "Cập nhật hình ảnh thành công!";
      }
      LOCATION_js($url_page."&id-parent=".$id_parent."&edit=".$id);
      exit();
    }

  if($id > 0) {
      $sql_se           = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' AND `id_parent` = '$id_parent' LIMIT 1");
      $sql_se           = mysql_fetch_array($sql_se);

      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }

      $catasort         = number_format($catasort,0,',','.');


      if($icon != '') {
        $full_icon   = "../$duongdantin/$icon";        
      }
    }
  else 
    {
      $catasort   = layCatasort($table, " `id_parent` = '$id_parent'");
      $catasort   = number_format(SHOW_text($catasort),0,',','.');
    }
?>
 
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a style="cursor: pointer;" onclick="AUTO_dich(this)">[NGÔN NGỮ]</a> <a class="js_okkk" style="cursor: pointer;" onclick="OKKK_by_lh()">[UPDATE]</a> <?php } ?>Danh sách hình ảnh</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active"><?=$loaibanner['tenbaiviet_vi'] ?></li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> hình ảnh
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&id-parent=<?=$id_parent ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>&id-parent=<?=$id_parent ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <?php include _source."lang.php" ?>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label>Tên banner</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
                </div>

                <?php if($loaibanner['is_mota'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <?php if(!empty($_SESSION['admin'])){ ?>
                  <input type='checkbox' class='minimal minimal_click' colum="is_mota" idcol="<?=$loaibanner['id'] ?>" table="#_banner_danhmuc" value='1' <?=$loaibanner['is_mota'] == 1 ? 'checked="checked"' : "" ?>>
                  <?php } ?>
                  <label>Mô tả</label>
                  <input type="text" class="form-control " name="mota_vi" id="mota_vi" value="<?=!empty($mota_vi) ? SHOW_text($mota_vi) : ''?>">
                </div>
                <?php } ?>
                <?php if($loaibanner['is_noidung'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <?php if(!empty($_SESSION['admin'])){ ?>
                  <input type='checkbox' class='minimal minimal_click' colum="is_noidung" idcol="<?=$loaibanner['id'] ?>" table="#_banner_danhmuc" value='1' <?=$loaibanner['is_noidung'] == 1 ? 'checked="checked"' : "" ?>>
                  <?php } ?>
                  <label>Nội dung</label> 
                  <textarea id="noidung_vi" name="noidung_vi" class="form-control paEditor" ><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
                </div>
                <?php } ?>
              </div>
              <?php if($lang_nb2){ ?>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên banner (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
                </div>
                <?php if($loaibanner['is_mota'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control "  name="mota_en" id="mota_en" value="<?=!empty($mota_en) ? SHOW_text($mota_en) : ''?>">
                </div>
                <?php } ?>
                <?php if($loaibanner['is_noidung'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <label>Nội dung (<?=_lang_nb2_key ?>)</label>
                  <textarea id="noidung_en" name="noidung_en" class="form-control paEditor"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
                </div>
                <?php } ?>
              </div>
              <?php } ?>
              <?php if($lang_nb3){ ?>
              <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  <label>Tên banner (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_cn) ? SHOW_text($tenbaiviet_cn) : ''?>" name="tenbaiviet_cn" id="tenbaiviet_cn">
                </div>
                <?php if($loaibanner['is_mota'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control paEditor" name="mota_cn"  id="mota_cn" value="<?=!empty($mota_cn) ? SHOW_text($mota_cn) : ''?>">
                </div>
                <?php } ?>
                <?php if($loaibanner['is_noidung'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <label>Nội dung (<?=_lang_nb3_key ?>)</label>
                  <textarea id="noidung_cn" name="noidung_cn" class="form-control paEditor"><?=!empty($noidung_cn) ? SHOW_text($noidung_cn) : ''?></textarea>
                </div>
                <?php } ?>
              </div>
              <?php } ?>
              <?php if($lang_nb4){ ?>
              <div class="tab-pane" id="tab_4">
                <div class="form-group">
                  <label>Tên banner (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_jp) ? SHOW_text($tenbaiviet_jp) : ''?>" name="tenbaiviet_jp" id="tenbaiviet_jp">
                </div>
                <?php if($loaibanner['is_mota'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control paEditor" name="mota_jp" id="mota_jp" value="<?=!empty($mota_jp) ? SHOW_text($mota_jp) : ''?>">
                </div>
                <?php } ?>
                <?php if($loaibanner['is_noidung'] == 1 || !empty($_SESSION['admin'])){ ?>
                <div class="form-group">
                  <label>Nội dung (<?=_lang_nb4_key ?>)</label>
                  <textarea id="noidung_jp" name="noidung_jp" class="form-control paEditor"><?=!empty($noidung_jp) ? SHOW_text($noidung_jp) : ''?></textarea>
                </div>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <section class="col-lg-12">
        <div class="box p10"> 
          <div class="form-group">
            <label for="exampleInputFile2">Hình ảnh (<?=$loaibanner['rong'].'x'.$loaibanner['cao'].'px' ?>)</label>
            <div class="dv-anh-chitiet-img-cont">
              <div class="dv-anh-chitiet-img">
                <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
                <input type="file" name="icon" id="input_icon" class="cls_hinhanh" accept="image/*" onchange="pa_previewImg(event, '#img_icon','input_icon');">
                <img src="<?=@$full_icon  ?>" alt="" class="img_chile_dangtin" style="<?php if(!empty($full_icon) && $full_icon != "") echo "display: block"; else echo "display: none" ?>" id="img_icon">
                
              </div>

            </div>
          </div>

          <?php 
            if($id_parent == 34) {
          ?>
          <div class="form-group">
            <label>Nhóm danh mục</label>
            <select name="id_danhmuc" class="form-control">
              <option value="0">Chọn nhóm danh mục</option>
              <?php foreach ($danhmuc_gr as $rows) { ?>
              <option value="<?=$rows['id'] ?>" <?=LAY_selected(@$id_danhmuc, $rows['id']) ?>><?=$rows['tenbaiviet_vi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <?php } ?>
          <?php 
            if($id_parent == 38) {
              $menu_pr = DB_que("SELECT `id` FROM `#_menu` WHERE `id_parent` = 0 ORDER BY `catasort` ASC, `id` ASC LIMIT 1");
              $menu_pr = mysql_result($menu_pr, 0, "id");
              $danhmuc_gr = DB_fet("*", "`#_menu`","`id_parent` = '$menu_pr'","`catasort` ASC, `id` ASC","","arr");
          ?>
          <div class="form-group">
            <label>Nhóm menu</label>
            <select name="id_danhmuc" class="form-control">
              <option value="0">Chọn nhóm danh mục</option>
              <?php foreach ($danhmuc_gr as $rows) { ?>
              <option value="<?=$rows['id'] ?>" <?=LAY_selected(@$id_danhmuc, $rows['id']) ?>><?=$rows['tenbaiviet_vi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <?php } ?>
          <?php
            $danhsach_hinhanh_video = CHECK_key_setting("danh-sach-hinh-anh-video");
            if($danhsach_hinhanh_video){ 
          ?>
          <div class="form-group">
            <label for="exampleInputFile">Video <a data-tooltip="Chỉ upload 1 file [*.mp4] dung lượng file tối đa 10MB. Chỉ áp dụng cho vide banner"> </a></label>
            <?=!empty($video) ? '</br>'.$video : '' ?>
            <input name="video" type="file" class="form-control" id="exampleInputFile">
            <label style=" margin-top: 10px; margin-bottom: 0;"><input type="checkbox" class="minimal" name="check_video" value="1" <?=LAY_checked(@$check_video, 1) ?>> Ưu tiên chạy video</label>
          </div>
          <?php } ?>
          <?php if($loaibanner['is_lienket'] == 1 || !empty($_SESSION['admin'])){ ?>
          <div class="form-group">
          <?php if(!empty($_SESSION['admin'])){ ?>
          <input type='checkbox' class='minimal minimal_click' colum="is_lienket" idcol="<?=$loaibanner['id'] ?>" table="#_banner_danhmuc" value='1' <?=$loaibanner['is_lienket'] == 1 ? 'checked="checked"' : "" ?>>
          <?php } ?>
            <label>Liên kết <a data-tooltip="Nếu Link đến URL của Web khác thì phải có http:// ở đầu."> </a></label>
            <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? SHOW_text($seo_name) : ''?>">
          </div>
          <div class="form-group">
            <label>Hiển thị liên kết</label>
            <select name="blank" class="form-control">
              <option value="" <?=LAY_selected(@$blank, "") ?>>Mặc định</option>
              <option value="_blank" <?=LAY_selected(@$blank, "_blank") ?>>Cửa sổ mới</option>     
            </select>
          </div>
          <?php } ?>
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
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
      <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
      <a href="<?=$url_page ?>&id-parent=<?=$id_parent ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
      <a href="<?=$url_page ?>&id-parent=<?=$id_parent ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>

<script>
  function checkSubmit(){
    if($("#tenbaiviet_vi").val() == '')
    {
      alert("Hãy nhập tên banner!");
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>