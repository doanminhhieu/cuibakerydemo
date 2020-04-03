<?php
  if(!isset($_SESSION['admin'])) LOCATION_js("index.php");
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  $table = '#_banner_danhmuc';
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $tenbaiviet_vi  = $_REQUEST['tenbaiviet_vi'];
    $catasort       = $_REQUEST['catasort'];
    $showhi         = $_REQUEST['showhi'];
    $rong           = $_REQUEST['rong'];
    $cao            = $_REQUEST['cao'];
    $ngaydang       = time();
  }
  if(!empty($_POST))
  {
    $data                     = array();
    $data['tenbaiviet_vi']    = $tenbaiviet_vi;
    $data['catasort']         = $catasort;
    $data['showhi']           = $showhi;
    $data['rong']             = $rong;
    $data['cao']              = $cao;
    $data['ngaydang']         = $ngaydang;

    if($id == 0){
      $id                   = ACTION_db($data, $table , 'add', NULL,NULL);
      $_SESSION['show_message_on'] =  "Thêm loại banner thành công!";
      LOCATION_js($url_page."&edit=".$id);
      exit();
    }else{
      ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
      $_SESSION['show_message_on'] =  "Cập nhật loại banner thành công!";
    }
  }

  if($id > 0)
  {
    $sql_se       = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
    $sql_se       = mysql_fetch_assoc($sql_se);

    $tenbaiviet_vi    = SHOW_text($sql_se['tenbaiviet_vi']);
    $rong             = SHOW_text($sql_se['rong']);
    $cao              = SHOW_text($sql_se['cao']);
    $catasort         = SHOW_text($sql_se['catasort']);
    $showhi           = SHOW_text($sql_se['showhi']);
  }
  else 
  {
    $sql_se          = DB_que("SELECT max(catasort) as sort FROM `$table`");
    $catasort        = mysql_result($sql_se, 0, 'sort') + 1;
  }
?>

<section class="content-header">
    <h1>Danh sách loại hình ảnh</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách loại hình ảnh</li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post">
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
                <h2 class="h2_title">
                    <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> loại hình ảnh
                </h2>
                <h3 class="box-title box-title-td pull-right">
                  <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                  <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                  <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                </h3>
            </div>
            <div class="box p10">
              <div class="form-group">
                <label>Tên loại hình ảnh</label>
                <input type="text" class="form-control" value="<?=($id > 0) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
              </div>

              <div class="form-group">
                <label>Rộng</label>
                <input type="text" class="form-control" name="rong" value="<?=($id > 0) ? SHOW_text($rong) : '' ?>">
              </div>

              <div class="form-group">
                <label>Cao</label>
                <input type="text" class="form-control" name="cao" value="<?=($id > 0) ? SHOW_text($cao) : '' ?>">
              </div>

              <div class="form-group">
                <label>Số thứ tự</label>
                <input type="text" class="form-control" name="catasort" id="catasort" value="<?=SHOW_text($catasort)?>">
              </div>

               <!-- radio -->
              <div class="form-group">
                <label class="mr-20">
                  <input type="radio" name="showhi" class="minimal" value="1" <?=($id > 0) ? LAY_checked($showhi, 1) : 'checked' ?>> Hiện thị
                </label>
                <label>
                  <input type="radio" name="showhi" class="minimal" value="2" <?=($id > 0) ? LAY_checked($showhi, 2) : '' ?>> Ẩn
                </label>
              </div>
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
      alert("Hãy nhập tên loại hình ảnh!");
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>