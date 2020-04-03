<?php
  $table = "#_sponline";
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
      ${$key}           = $value;
    }
    $catasort           = str_replace(".", "", $_REQUEST['catasort']);
    $showhi             = isset($_POST['showhi']) ? 1 : 0;
    $ngaydang           = time();
  }

  if(!empty($_POST))
  {
      $data                     = array();
  
      $data['tenbaiviet_vi']  = @$tenbaiviet_vi;
      $data['tenbaiviet_en']  = @$tenbaiviet_en;
 
      $data['mota_vi']  = @$mota_vi;
      $data['mota_en']  = @$mota_en;
      $data['email']            = @$email;
      $data['note']             = @$note;
      $data['phone']            = @$phone;
      $data['catasort']         = @$catasort;
      $data['ngaydang']         = @$ngaydang;
      $data['showhi']           = @$showhi;
      $data['duongdantin']    = @$duongdantin; 
      $data['id_user']          = @$id_user;
      $hinhanh              = UPLOAD_image("icon", "../".$duongdantin."/", time());
      if($hinhanh)
        {
          $data['icon']   = $hinhanh;
          if($id > 0){
            //xoa anh
            $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
            @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
            //end
          }
        }

      if($id  == 0){
        $id = ACTION_db($data, $table, 'add',NULL,NULL);
        $_SESSION['show_message_on'] =  "Thêm hỗ trợ thành công!";
      }else{
        ACTION_db($data, $table,'update',NULL,"`id` = ".$id);
        $_SESSION['show_message_on'] =  "Cập nhật hỗ trợ thành công!";
      }
      LOCATION_js($url_page."&edit=".$id);
      exit();
      
      
  }

  if($id > 0){
    $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
    $sql_se     = mysql_fetch_assoc($sql_se);

    foreach ($sql_se as $key => $value) {
      ${$key} = $value;
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
    <h1>Danh sách hỗ trợ</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách hỗ trợ</li>
    </ol>
</section>
<style>
.cls_email, .cls_sky, .cls_chucvu {display: none}
</style>
<form id="form_submit" name="form_submit" action="" method="post" enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> hỗ trợ
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
                  <label>Tên hỗ trợ</label>
                  <input type="text" class="form-control" name="tenbaiviet_vi" id="tenbaiviet_vi" value="<?=(isset($tenbaiviet_vi)) ? $tenbaiviet_vi : '' ?>">
                </div>
                <div class="form-group cls_chucvu">
                  <label>Chức vụ</label>
                  <input type="text" class="form-control" name="mota_vi" id="mota_vi" value="<?=(isset($mota_vi)) ? $mota_vi : '' ?>">
                </div>
              </div>
              
              <?php if($lang_nb2){ ?>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên hỗ trợ (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
                </div>
                <div class="form-group cls_chucvu">
                  <label>Chức vụ (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" name="mota_en" id="mota_en" value="<?=(isset($mota_en)) ? $mota_en : '' ?>">
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <section class="col-lg-12">
        <div class="box p10">
          <div class="form-group cls_email">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="<?=(isset($email)) ? $email : ''?>">
          </div>
          <div class="form-group cls_phone">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="<?=(isset($phone)) ? $phone : ''?>">
          </div>
          <div class="form-group cls_sky">
            <label>Skype</label>
            <input type="text" class="form-control" name="note" value="<?=(isset($note)) ? $note : ''?>">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Hình ảnh</label>
            <?=!empty($icon) ? $icon : '' ?>
            <input name="icon" type="file" class="form-control" id="exampleInputFile">
          </div>
          <div class="form-group" style="display: none">
            <label>Nằm trong</label>
            <select name="id_user" id="id_user" class="form-control SlectBox">
              <option value="0">Chọn chủ đề con</option>
              <?php 
                $sql        = DB_que("SELECT * FROM `$table` ORDER BY `catasort` ASC");
                $sql_array  = array();
                while ($r   = mysql_fetch_assoc($sql)) {
                  $sql_array[] = $r;
                }
                foreach ($sql_array as $row) {
                  if($row['id_user'] != 0) continue;
                  $disabled = $row['id'] == @$id ? 'disabled="disabled"' : '';
              ?>
              <option value="<?=$row['id'] ?>" <?=LAY_selected($row['id'], @$id_user) ?> <?=$disabled ?>><?=$row['tenbaiviet_vi'] ?></option> 
              <?php 
               foreach ($sql_array as $row_2) {
                  if($row_2['id_user'] != $row['id']) continue;
              ?>
              <option value="<?=$row_2['id'] ?>" <?=LAY_selected($row_2['id'], @$id_user) ?> <?=$row_2['id'] == @$id ? 'disabled="disabled"' : '' ?> <?=$disabled ?>>╚═► <?=$row_2['tenbaiviet_vi'] ?></option> 
              <?php }} ?>
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
  <div class="box-header mb-40" style="margin-bottom: 60px;">
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
      alert("Hãy nhập Tài khoản hỗ trợ!");
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>