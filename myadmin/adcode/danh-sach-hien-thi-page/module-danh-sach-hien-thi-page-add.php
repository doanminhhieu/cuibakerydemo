<?php
  $table = '#_module_page';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $ten_vi             = @$_REQUEST['ten_vi'];
      $page               = @$_REQUEST['page'];
      $sort               = @$_REQUEST['sort'];
      $showhi             = isset($_POST['showhi']) ? 1 : 0;

    }

  if(!empty($_POST))
    {
      $data               = array();
      $data['ten_vi']     = $ten_vi;
      $data['page']       = $page;
      $data['sort']       = $sort;
      $data['showhi']     = $showhi;

      if($id == 0){
        $id                           = ACTION_db($data, $table , 'add',NULL,NULL);
        
        $_SESSION['show_message_on'] =  "Thêm chủ đề thành công!";
        LOCATION_js($url_page);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = ".$id);
        $_SESSION['show_message_on'] =  "Cập nhật chủ đề thành công!";
      }
    }
 
    
  if($id > 0)
    {
      $sql_se             = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se             = mysql_fetch_array($sql_se);
      $ten_vi             = SHOW_text($sql_se['ten_vi']);
      $page               = SHOW_text($sql_se['page']);
      $sort               = number_format(SHOW_text($sql_se['sort']),0,',','.');
      $showhi             = SHOW_text($sql_se['showhi']);
    }
    else 
    {
      $sort   = DB_que("SELECT * FROM `$table`");
      $sort   = number_format((mysql_num_rows($sort) + 1),0,',','.');
    }
?>

<section class="content-header">
  <h1>Danh sách Page</h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Danh sách Page</li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i><?=$id > 0 ? 'Sửa' : 'Thêm' ?> Page
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
                  <label>Tên Page</label>
                  <input type="text" class="form-control" value="<?=!empty($ten_vi) ? SHOW_text($ten_vi) : ''?>" name="ten_vi">
                </div>

                <div class="form-group">
                  <label>ID Page</label>
                  <input type="text" class="form-control" name="page" value="<?=!empty($page) ? Show_text($page) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Số thứ tự</label>
                  <input type="text" class="form-control" name="sort" value="<?=!empty($sort) ? $sort : 1 ?>">
                </div>
                <div class="form-group">
                  <label>
                    <input name='showhi' type='checkbox' class='minimal' <?=(!empty($showhi) && $showhi) == 1 || empty($showhi) ? "checked='checked'" : "" ?>> Hiển thị
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