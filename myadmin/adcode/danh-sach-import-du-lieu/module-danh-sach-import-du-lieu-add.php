<?php
  $table = '#_file_import_data';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;

  // $members_khuvuc = DB_fet("*", "`#_members_khuvuc`","`showhi` = 1","`id` ASC","","arr");

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }
      // $gia_list = array();
      // foreach ($members_khuvuc as $key => $value) {
      //   if(isset($_POST['gia_list_'.$key]) && $_POST['gia_list_'.$key] != '') {
      //     $gia_list[$key] = array('id' => $value['id'], 'val' => strtoupper($_POST['gia_list_'.$key]));
      //   }
      // }
      // $gia_list = serialize($gia_list);
    }
  if(!empty($_POST))  {
      $data                   = array();
      $data['ten_vi']         = $ten_vi;
      $data['noidung_vi']     = $noidung_vi;
      $data['ten_sp']         = strtoupper($ten_sp);
      $data['ma_sp']          = strtoupper($ma_sp);
      $data['gia_md']         = strtoupper($gia_md);
 
      $data['gia_km']         = strtoupper($gia_km);
      $data['bat_gia_km']     = strtoupper($bat_gia_km);
 

      $data['duongdantin']    = "datafiles/files";
      $data['ngay_dang']      = time(); 

      $file_excel                = UPLOAD_file("file", "../datafiles/files/", time());
      if($file_excel != false)
        {
          $data['file_excel']   = $file_excel;
          if($id > 0){
            $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
            @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "file_excel"));
          }
        }
      if($id == 0){
        $id = ACTION_db($data, $table , 'add', NULL,NULL);
        $_SESSION['show_message_on'] =  "Thêm file thành công!";
        LOCATION_js($url_page."&edit=".$id);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
        $_SESSION['show_message_on'] =  "Cập nhật file thành công!";
      }
    }

  if($id > 0)
    {
      $sql_se           = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se           = mysql_fetch_array($sql_se);

      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }

      if($file_excel != '') 
      {
        $file_excel_url   = $fullpath."/".$duongdantin."/".$file_excel; 
      }
    }
?>
 
<section class="content-header">
    <h1>Danh sách file import dữ liệu</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách file import dữ liệu</li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> file
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label for="exampleInputFile">File <span style="font-weight: 500; color: #ec2626;">(Chỉ hỗ trợ import dữ liệu file dạng *.xlsx)</span></label>
                  <input name="file" type="file" class="form-control" id="exampleInputFile">
                  <?=!empty($file_excel) ? "<p style='font-size: 12px; margin-top: 5px;'>$file_excel ".(!is_file("../".$duongdantin."/".$file_excel) ? "<span style='font-weight: 500; color: #ec2626;'>(File không tồn tại)</span>" : "<a href='".$file_excel_url."' download>[Tải về]</a>")."</p>" : '' ?>
                </div>

                <div class="form-group">
                  <label>Tên file</label>
                  <input type="text" class="form-control" value="<?=!empty($ten_vi) ? SHOW_text($ten_vi) : ''?>" name="ten_vi" id="ten_vi">
                </div>
                <div class="form-group">
                  <label>Cột Mã SP <a data-tooltip="Quan trọng! Mã sản phẩm được so sánh từ CSDL và file excel để cập nhật giá"> </a></label>
                  <input type="text" class="form-control" value="<?=!empty($ma_sp) ? SHOW_text($ma_sp) : ''?>" name="ma_sp" id="ma_sp">
                </div>
                <div class="form-group">
                  <label>Cột Tên sản phẩm <a data-tooltip="Giới hạn 50 cột trong excel, tính đến cột AX"> </a></label>
                  <input type="text" class="form-control" value="<?=!empty($ten_sp) ? SHOW_text($ten_sp) : ''?>" name="ten_sp" id="ten_sp">
                </div>
                <div class="form-group">
                  <label>Cột Giá mặc định</label>
                  <input type="text" class="form-control" value="<?=!empty($gia_md) ? SHOW_text($gia_md) : ''?>" name="gia_md" id="gia_md">
                </div>
 
                <div class="form-group">
                  <label>Cột Giá KM</label>
                  <input type="text" class="form-control" value="<?=!empty($gia_km) ? SHOW_text($gia_km) : ''?>" name="gia_km" id="gia_km">
                </div>
                <div class="form-group">
                  <label>Cột Bật Giá KM <a data-tooltip="Trạng thái trên file excel là Y (có) N (không)"> </a></label>
                  <input type="text" class="form-control" value="<?=!empty($bat_gia_km) ? SHOW_text($bat_gia_km) : ''?>" name="bat_gia_km" id="bat_gia_km">
                </div>

                <div class="form-group">
                  <label>Ghi chú</label>
                  <textarea id="noidung_vi" name="noidung_vi" class="form-control" rows="10" cols="80"><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
      <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
      <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>