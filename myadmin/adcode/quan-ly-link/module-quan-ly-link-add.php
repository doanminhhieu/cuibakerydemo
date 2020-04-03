<?php
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? $_GET['edit'] : 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }
    }
  if(!empty($_POST))
    {
      $tenbaiviet_vi = mb_strtolower($tenbaiviet_vi);
      $tenbaiviet_vi =str_replace("http://", "", $tenbaiviet_vi);
      $tenbaiviet_vi =str_replace("https://", "", $tenbaiviet_vi);
      $tenbaiviet_vi =str_replace($_SERVER['HTTP_HOST'], "", $tenbaiviet_vi);
    

      $data                   = array();
      $data['tenbaiviet_vi']  = @$tenbaiviet_vi;
      $data['lien_ket']       = @$lien_ket;
      
      $data['showhi']         = isset($_POST['showhi']) ? 1 : 0;
 
      if($id == 0){
        $data['lan_cuoi']     = time();
        $id = ACTION_db($data, $table , 'add', NULL,NULL);
        $_SESSION['show_message_on'] =  "Thêm hình ảnh thành công!";
        LOCATION_js($url_page."&edit=".$id);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
        $_SESSION['show_message_on'] =  "Cập nhật hình ảnh thành công!";
      }
    }

  if($id > 0)
    {
      $sql_se           = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se           = mysql_fetch_array($sql_se);

      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }       
    }
?>
 
<section class="content-header">
    <h1>Quản lý link 301</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý link 301</li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> link
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label>Link nguồn </label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
                </div>
                <div class="form-group">
                  <label>Link đến</label>
                  <input type="text" class="form-control" value="<?=!empty($lien_ket) ? SHOW_text($lien_ket) : ''?>" name="lien_ket" id="lien_ket">
                </div>
                <div class="form-group">
                  <label class="mr-20 checkbox-mini">
                    <input type="checkbox" name="showhi" class="minimal" <?=isset($showhi) && $showhi == 0 ? '' : 'checked="checked"' ?>> Kích hoạt
                  </label>
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
