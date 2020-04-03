<?php

  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? $_GET['edit'] : 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }

      $catasort         = str_replace(".", "", $catasort);
      $showhi           = isset($_POST['showhi']) ? 1 : 0;
 
    }
  if(!empty($_POST))
    {
      $data                   = array();
      $data['tenbaiviet_vi']  = @$tenbaiviet_vi;
      $data['tenbaiviet_en']  = @$tenbaiviet_en;
      $data['noidung_vi']     = @$noidung_vi;
      $data['noidung_en']     = @$noidung_en;
     
      $data['catasort']       = @$catasort;
      $data['showhi']         = @$showhi;
      $data['duongdantin']    = @$duongdantin; 
      
      $hinhanh              = UPLOAD_image("icon", "../".$duongdantin."/", time());
      if($hinhanh) {
          $data['icon']   = $hinhanh;
          TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 100, 100); 
          if($id > 0){
            //xoa anh
            $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
            @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
            @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/thumb_".mysql_result($sql_thongtin, 0, "icon"));
            //end
          }
        }

      if($id == 0){
        $id = ACTION_db($data, $table , 'add', NULL,NULL);
        $_SESSION['show_message_on'] =  "Thêm phương thức thanh toán thành công!";
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
        $_SESSION['show_message_on'] =  "Cập nhật phương thức thanh toán thành công!";
      }
      LOCATION_js($url_page."&edit=".$id);
      exit();
    }

  if($id > 0) {
      $sql_se           = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se           = mysql_fetch_array($sql_se);

      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }

      $catasort         = number_format($catasort,0,',','.');
      if($icon != '') 
        $icon   = "<img src='../$duongdantin/$icon' width='255' height='auto' style='display:block'>";
    }
  else 
    {
      $catasort   = layCatasort($table);
      $catasort   = number_format(SHOW_text($catasort),0,',','.');
    }
?>
 
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a style="cursor: pointer;" onclick="AUTO_dich(this)">[NGÔN NGỮ]</a> <a class="js_okkk" style="cursor: pointer;" onclick="OKKK_by_lh()">[UPDATE]</a> <?php } ?>Danh sách phương thức thanh toán</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Phương thức thanh toán</li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> phương thức thanh toán
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <?php include _source."lang.php" ?>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label>Tiêu đề</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
                </div>
                <div class="form-group">
                  <label>Nội dung</label> 
                  <textarea id="noidung_vi" name="noidung_vi" class="form-control paEditor" ><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
                </div>
              </div>
              <?php if($lang_nb2){ ?>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tiêu đề (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
                </div>
                <div class="form-group">
                  <label>Nội dung (<?=_lang_nb2_key ?>)</label>
                  <textarea id="noidung_en" name="noidung_en" class="form-control paEditor"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <section class="col-lg-12">
        <div class="box p10">
          <div class="form-group">
            <label for="exampleInputFile">Hình ảnh (<?=$loaibanner['rong'].'x'.$loaibanner['cao'].'px' ?>)</label>
            <?=!empty($icon) ? $icon : '' ?>
            <input name="icon" type="file" class="form-control" id="exampleInputFile">
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
      alert("Hãy nhập tên phương thức thanh toán!");
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>