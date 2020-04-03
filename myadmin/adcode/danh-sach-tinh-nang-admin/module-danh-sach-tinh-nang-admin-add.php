<?php
  $table = '#_module_tinhnang';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;

  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $ten_vi             = @$_REQUEST['ten_vi'];
      $m_action           = @$_REQUEST['m_action'];
      $id_parent          = @$_REQUEST['id_parent'];
      $sort               = @$_REQUEST['sort'];
      $icon               = @$_REQUEST['icon'];
      $lien_ket           = @$_REQUEST['lien_ket'];
      $m_xem              = isset($_POST['m_xem']) ? 1 : 0;
      $m_them             = isset($_POST['m_them']) ? 1 : 0;
      $m_sua              = isset($_POST['m_sua']) ? 1 : 0;
      $m_xoa              = isset($_POST['m_xoa']) ? 1 : 0;
      $showhi             = isset($_POST['showhi']) ? 1 : 0;
      $m_other            = isset($_POST['m_other']) ? 1 : 0;
      $m_dev              = isset($_POST['m_dev']) ? 1 : 0;

    }

  if(!empty($_POST))
    {
      $data               = array();
      $data['ten_vi']     = $ten_vi;
      $data['m_action']   = $m_action;
      $data['id_parent']  = $id_parent;
      $data['m_xem']      = $m_xem;
      $data['m_them']     = $m_them;
      $data['m_sua']      = $m_sua;
      $data['m_xoa']      = $m_xoa;
      $data['m_other']    = $m_other;
      $data['m_dev']      = $m_dev;

      $data['sort']       = $sort;
      $data['showhi']     = $showhi;
      $data['icon']       = $icon;
      $data['lien_ket']   = $lien_ket;

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
      foreach ($sql_se as $key => $value) {
        ${$key}           = SHOW_text($value);
      }

      $sort               = number_format($sort,0,',','.');
    }
    else 
    {
      $sort   = DB_que("SELECT * FROM `$table`");
      $sort   = number_format((mysql_num_rows($sort) + 1),0,',','.');
    }

?>

<section class="content-header">
  <h1>Tính năng hệ thống</h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Tính năng hệ thống</li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i><?=$id > 0 ? 'Sửa' : 'Thêm' ?> tính năng hệ thống
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
                  <label>Tên tính năng</label>
                  <input type="text" class="form-control" value="<?=!empty($ten_vi) ? SHOW_text($ten_vi) : ''?>" name="ten_vi">
                </div>

                <div class="form-group">
                  <label>Action</label>
                  <input type="text" class="form-control" name="m_action" value="<?=!empty($m_action) ? Show_text($m_action) : "" ?>">
                </div>
                <div class="form-group">
                  <label>Icon</label>
                  <input type="text" class="form-control" name="icon" value="<?=!empty($icon) ? Show_text($icon) : "" ?>">
                </div>
                <div class="form-group">
                  <label>Liên kết</label>
                  <input type="text" class="form-control" name="lien_ket" value="<?=!empty($lien_ket) ? Show_text($lien_ket) : "" ?>">
                </div>

                <div class="form-group">
                  <label style="margin-right: 10px">
                    <input name='m_xem' type='checkbox' class='minimal'   <?=!empty($m_xem) && $m_xem == 1 ? 'checked="checked"' : '' ?> > Xem
                  </label>
                  <label style="margin-right: 10px">
                    <input name='m_them' type='checkbox' class='minimal'  <?=!empty($m_them) && $m_them == 1 ? 'checked="checked"' : '' ?> > Thêm
                  </label>
                  <label style="margin-right: 10px">
                    <input name='m_sua' type='checkbox' class='minimal' <?=!empty($m_sua) && $m_sua == 1 ? 'checked="checked"' : '' ?> > Sửa
                  </label>
                  <label>
                    <input name='m_xoa' type='checkbox' class='minimal' <?=!empty($m_xoa) && $m_xoa == 1 ? 'checked="checked"' : '' ?> > Xóa
                  </label>
                  <label>
                    <input name='m_other' type='checkbox' class='minimal' <?=!empty($m_other) && $m_other == 1 ? 'checked="checked"' : '' ?> > Link Ẩn
                  </label>
                  <label>
                    <input name='m_dev' type='checkbox' class='minimal' <?=!empty($m_dev) && $m_dev == 1 ? 'checked="checked"' : '' ?> > Dev
                  </label>
                </div>
                <div class="form-group">
                  <label>Nằm trong</label>
                    <select name="id_parent" id="id_parent" class="form-control">
                    <option value="0">Chọn chủ đề con</option>
                    <?php 
                      $sql_se = DB_fet("*","`$table`","`showhi` = 1","`sort` ASC","","arr",1);
                      foreach ($sql_se as $value) { 
                        if($value['id_parent'] != 0) continue;
                    ?>
                    <option value="<?=$value['id'] ?>" <?=LAY_selected(@$id_parent, $value['id']) ?>><?=$value['ten_vi'] ?></option>
                    <?php 
                      foreach ($sql_se as $value_2) { 
                        if($value_2['id_parent'] != $value['id']) continue;
                    ?>
                    <option value="<?=$value_2['id'] ?>" <?=LAY_selected(@$id_parent, $value_2['id']) ?>>╙─► <?=$value_2['ten_vi'] ?></option>
                    <?php 
                      foreach ($sql_se as $value_3) { 
                        if($value_3['id_parent'] != $value_2['id']) continue;
                    ?>
                    <option value="<?=$value_3['id'] ?>" <?=LAY_selected(@$id_parent, $value_3['id']) ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─► <?=$value_3['ten_vi'] ?></option>
                    <?php }}} ?>
                  </select>
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