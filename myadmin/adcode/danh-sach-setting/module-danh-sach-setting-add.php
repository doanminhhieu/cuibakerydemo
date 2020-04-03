<?php
  $table = '#_module_setting';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $ten_vi             = @$_REQUEST['ten_vi'];
      $ten_key            = @$_REQUEST['ten_key'];
      $sort               = @$_REQUEST['sort'];
      $is_check           = isset($_POST['is_check']) ? 1 : 0;

    }

  if(!empty($_POST))
    {
      $data               = array();
      $data['ten_vi']     = $ten_vi;
      $data['ten_key']    = $ten_key;
      $data['sort']       = $sort;
      $data['is_check']   = $is_check;

      if($id == 0){
        $id                           = ACTION_db($data, $table , 'add',NULL,NULL);
        
        $_SESSION['show_message_on'] =  "Thêm Setting thành công!";
        LOCATION_js($url_page);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = ".$id);
        $_SESSION['show_message_on'] =  "Cập nhật Setting thành công!";
      }
    }
 
    
  if($id > 0)
    {
      $sql_se             = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se             = mysql_fetch_array($sql_se);
      $ten_vi             = SHOW_text($sql_se['ten_vi']);
      $ten_key            = SHOW_text($sql_se['ten_key']);
      $sort               = number_format(SHOW_text($sql_se['sort']),0,',','.');
      $is_check           = SHOW_text($sql_se['is_check']);
    }
    else 
    {
      $sort   = DB_que("SELECT * FROM `$table`");
      $sort   = number_format((mysql_num_rows($sort) + 1),0,',','.');
    }
?>

<section class="content-header">
  <h1>Danh sách Setting</h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Danh sách Setting</li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i><?=$id > 0 ? 'Sửa' : 'Thêm' ?> Setting
            </h2>
            <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
            </h3>
          </div>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group">
                  <label>Tên Setting</label>
                  <input type="text" class="form-control" value="<?=!empty($ten_vi) ? SHOW_text($ten_vi) : ''?>" name="ten_vi">
                </div>

                <div class="form-group">
                  <label>Key</label>
                  <input type="text" class="form-control" name="ten_key" value="<?=!empty($ten_key) ? Show_text($ten_key) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Số thứ tự</label>
                  <input type="text" class="form-control" name="sort" value="<?=!empty($sort) ? $sort : 1 ?>">
                </div>
                <div class="form-group">
                  <label>
                    <input name='is_check' type='checkbox' class='minimal' <?=(!empty($is_check) && $is_check) == 1 || empty($is_check) ? "checked='checked'" : "" ?>> Check
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
    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
    <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
    <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
  </h3>
</div>
</form>