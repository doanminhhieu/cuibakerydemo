<?php
 
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }
      $catasort           = str_replace(".", "", $_REQUEST['catasort']);
      $showhi             = isset($_POST['showhi']) ? 1 : 0; 
 
    }


  if(!empty($_POST))
    {
      $hinhanh                      = UPLOAD_image("icon", "../".$duongdantin."/", time());

      $data                    = array(); 
      $data['tenbaiviet_vi']   = $tenbaiviet_vi;
      $data['tenbaiviet_en']   = $tenbaiviet_en;
      $data['catasort']        = $catasort;
      $data['showhi']          = $showhi;
      $data['id_parent']       = $id_parent;
      $data['seo_name']        = $seo_name;
      $data['blank']           = $blank;
      $data['duongdantin']     = $duongdantin;
      if($hinhanh != false){
        $data['icon']          = $hinhanh;
        TAO_anhthumb("../" . $duongdantin . "/" . $hinhanh, "../" . $duongdantin . "/thumb_" . $hinhanh, 100, 100);
        if($id > 0){
          //xoa anh
          $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
          @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
          @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/thumb_".mysql_result($sql_thongtin, 0, "icon"));
          //end
        }
      }

      if($id == 0){
        $id                           = ACTION_db($data, $table , 'add',NULL,NULL);
        $_SESSION['show_message_on']  =  "Thêm dữ liệu thành công!";
        LOCATION_js($url_page."&edit=".$id);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = ".$id);
        $_SESSION['show_message_on'] =  "Cập nhật dữ liệu thành công!";
      }
    }
 
    
  if($id > 0)
    {
      $sql_se             = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se             = mysql_fetch_array($sql_se);

      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }
      if ($icon != '') {
        $full_icon  = $fullpath."/".$duongdantin."/".$icon;
      }
    }
    else 
    {
      $catasort   = layCatasort($table);
      $catasort   = number_format(SHOW_text($catasort),0,',','.');
    }
?>

<section class="content-header">
  <h1><?php if(isset($_SESSION['admin'])){ ?><a style="cursor: pointer;" onclick="AUTO_dich(this)">[NGÔN NGỮ]</a> <a class="js_okkk" style="cursor: pointer;" onclick="OKKK_by_lh()">[UPDATE] </a> <?php } ?><?=$full_name ?></h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active"><?=$full_name ?></li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i><?=$id > 0 ? 'Sửa' : 'Thêm mới' ?>
            </h2>
            <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
            </h3>
          </div>
        </div>
      </section>
      <section class="col-lg-12">
        <div class="nav-tabs-custom" style="margin-bottom: 0;">
          <?php include _source."lang.php" ?>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
              </div>
            </div>
            <?php if($lang_nb2){ ?>
            <div class="tab-pane" id="tab_2">
              <div class="form-group">
                <label>Tiêu đề (<?=_lang_nb2_key ?>)</label>
                <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="box p10">
          <div class="form-group" style="display: none">
            <label for="exampleInputFile2">Hình ảnh</label>
            <div class="dv-anh-chitiet-img-cont">
              <div class="dv-anh-chitiet-img">
                <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
                <input type="file" name="icon" id="input_icon" class="cls_hinhanh" accept="image/*" onchange="pa_previewImg(event, '#img_icon','input_icon');">
                <img src="<?=@$full_icon  ?>" alt="" class="img_chile_dangtin" style="<?php if(!empty($full_icon) && $full_icon != "") echo "display: block"; else echo "display: none" ?>" id="img_icon">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Seo name <a data-tooltip="Đường dẫn chuẩn bao gồm các ký tự [a-zA-Z0-9-]."> </a></label>
            <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? Show_text($seo_name) : "" ?>">
          </div>
          <div class="form-group">
              <label>Target</label>
              <select name="blank" id="blank" class="form-control">
                  <option value="" <?=LAY_selected(@$blank, "") ?>>Mặc định </option>
                  <option value="_blank" <?=LAY_selected(@$blank, "_blank") ?>>Cửa sổ mới</option>
              </select>
          </div>
          <div class="form-group" style="display: none">
              <label>Option thuộc</label>
              <select name="id_parent" id="id_parent" class="form-control">
                  <?php if ((isset($id_parent) && $id_parent == 0) || isset($_SESSION['admin'])) { ?>
                      <option value="0">Chọn chủ đề con</option>
                  <?php } ?>
                  <?php
                  $list_array = DB_fet("*", "#_thuoctinhchung", "", "`catasort` ASC", "", "arr");
                  foreach ($list_array as $val) {
                      if ($val['id_parent'] != 0) continue;
                      echo '<option value="' . $val['id'] . '" ' . (($id_parent == $val['id']) ? 'selected="selected"' : '') . ' ' . (($id == $val['id']) ? 'disabled="disabled"' : '') . '>' . $val['tenbaiviet_vi'] . '</option>';
                      foreach ($list_array as $val_2) {
                          if ($val_2['id_parent'] != $val['id']) continue;
                          echo '<option disabled="disabled" value="' . $val_2['id'] . '">==> ' . $val_2['tenbaiviet_vi'] . '</option>';
                      }
                  }
                  ?>
              </select>
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
      </section>
    </div>
  </section>

  <div class="box-header mb-60">
  <h3 class="box-title box-title-td pull-right">
    <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
    <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
    <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
  </h3>
</div>
</form>
<script>
  function checkSubmit(){
    if($("#tenbaiviet_vi").val() == '')
    {
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>