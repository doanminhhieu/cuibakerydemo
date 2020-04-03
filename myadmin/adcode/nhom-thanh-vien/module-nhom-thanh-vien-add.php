<?php
  $table = '#_members_nhom';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  $sql        = DB_que("SELECT * FROM `#_module_tinhnang` WHERE `showhi` = 1 AND `m_other` = 0 AND `m_dev` = 0 ORDER BY `sort` ASC ");
  $sql_array  =  array();
  while ($r   = mysql_fetch_assoc($sql)) {
    $sql_array[] = $r;
  }

  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $tenbaiviet_vi          = @$_REQUEST['tenbaiviet_vi'];
      $catasort               = @$_REQUEST['catasort'];
      $phan_tram              = @$_REQUEST['phan_tram'];
      $showhi                 = isset($_POST['showhi']) ? 1 : 0;


    }

  if(!empty($_POST))
    {
      $data                       = array();
      $data['tenbaiviet_vi']      = $tenbaiviet_vi;
      $data['catasort']           = $catasort;
      $data['showhi']             = $showhi;
      $data['phan_tram']          = $phan_tram;

      if($id == 0){
        $id                           = ACTION_db($data, $table , 'add',NULL,NULL);
        
        $_SESSION['show_message_on'] =  "Thêm nhóm thành viên thành công!";
        LOCATION_js($url_page."&edit=".$id);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = ".$id);
        $_SESSION['show_message_on'] =  "Cập nhật nhóm thành viên thành công!";
      }
    }
 
    
  if($id > 0)
    {
      $sql_se             = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se             = mysql_fetch_array($sql_se);
      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }
      $catasort               = number_format($catasort,0,',','.');

    }
    else 
    {
      $catasort   = DB_que("SELECT * FROM `$table`");
      $catasort   = number_format((mysql_num_rows($catasort) + 1),0,',','.');
    }
?>

<section class="content-header">
  <h1>Nhóm thành viên</h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Nhóm thành viên</li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i><?=$id > 0 ? 'Sửa' : 'Thêm' ?> Nhóm thành viên
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
                  <label>Tên nhóm thành viên</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi">
                </div>
                <div class="form-group">
                  <label>Mức chiết khấu (%)</label>
                  <input type="text" class="form-control" name="phan_tram" value="<?=!empty($phan_tram) ? $phan_tram : 0 ?>">
                </div>
                <div class="form-group">
                  <label>Số thứ tự</label>
                  <input type="text" class="form-control" name="catasort" value="<?=!empty($catasort) ? $catasort : 1 ?>">
                </div>
                <div class="form-group">
                  <label class="checkbox-mini">
                    <input name='showhi' type='checkbox' class='minimal' <?=(!empty($showhi) && $showhi) == 1 || !isset($showhi) ? "checked='checked'" : "" ?>> Hiển thị
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- pq -->
 
        <!-- end pq -->
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