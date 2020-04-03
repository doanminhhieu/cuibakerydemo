<?php
  $table = "#_email_config";
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $email            = $_REQUEST['email'];
      // $type             = $_REQUEST['type'];
      $showhi           = isset($_POST['showhi']) ? 1 : 0;
    }

  if(!empty($_POST))
    {
      $data             = array();
      $data['email']    = $email;
      // $data['type']     = $type;
      $data['showhi']   = $showhi;
      if($id == 0){
        $id = ACTION_db($data, $table , 'add', NULL,NULL);
        $_SESSION['show_message_on'] =  "Thêm Email thành công!";
        LOCATION_js($url_page."&edit=".$id);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
        $_SESSION['show_message_on'] =  "Cập nhật Email thành công!";
      }
    }

  if($id > 0)
  {
    $sql_se       = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
    $sql_se       = mysql_fetch_assoc($sql_se);

    $email            = $sql_se['email'];
    $type             = $sql_se['type'];  
    $showhi           = $sql_se['showhi'];
  }
?>

<section class="content-header">
  <h1>Danh sách email</h1> 
  <ol class="breadcrumb">
    <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
    <li class="active">Quản lý Email hệ thống</li>
  </ol>
</section>

<form id="form_submit" name="form_submit" action="" method="post">
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> email
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button onclick="return RETURN_checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
              </h3>
          </div>
          <div class="box p10">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=(isset($email)) ? $email : ''?>">
            </div>

            <!-- <div class="form-group">
              <label>Loại Email</label>
                <select name='type' class="form-control">
                    <option value="1" <?=(isset($type)) ? LAY_selected(1, $type) : "" ?>>Email liên hệ</option>
                </select>
            </div> -->
            <div class="form-group">
              <label class="mr-20 checkbox-mini">
                <input type="checkbox" name="showhi" class="minimal" <?=isset($showhi) && $showhi == 0 ? '' : 'checked="checked"' ?>> Hiển thị
              </label>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-40">
    <h3 class="box-title box-title-td pull-right">
      <button onclick="return RETURN_checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
      <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
      <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>
<script>
  function RETURN_checkSubmit(){
    if($("#email").val() == '')
    {
      alert("Hãy nhập Email!");
      $("#email").focus();
      return false;
    }
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test($("#email").val())) 
    {
      alert("Email không hợp lệ!");
      $("#email").focus();
      return false;
    }    
    return true;
  }
</script>