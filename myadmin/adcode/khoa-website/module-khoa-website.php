<?php
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $noidung_vi         = $_REQUEST['noidung_vi'];
    $showhi             = $_REQUEST['showhi'];
    
  }

  if(!empty($_POST))
  {
    $data                       = array();
    $data['khoa_website']       = $noidung_vi;
    $data['is_khoasite']        = $showhi;
 
    ACTION_db($data, '#_seo','update',NULL,"`id` = 1");
    $_SESSION['show_message_on'] = "Cập nhật dữ liệu thành công!";
  }

  $sql_se             = DB_que("SELECT * FROM `#_seo` LIMIT 1");
  $sql_se             = mysql_fetch_assoc($sql_se);

  $noidung_vi         = Show_text($sql_se['khoa_website']);
  $showhi             = Show_text($sql_se['is_khoasite']);
?>

<section class="content-header">
    <h1>Khóa website</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Khóa website</li>
    </ol>
</section>

<form id="form_submit" name="form_submit" action="" method="post" enctype='multipart/form-data'>
  <input type="hidden" name="token" value="<?=GET_token() ?>">
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> Cập nhật
              </h2>
              <h3 class="box-title box-title-td pull-right">
                  <button onclick="return checkSubmit()" type="submit" name="capnhat" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group">
                  <label class="mr-20">
                    <input type="radio" name="showhi" class="minimal" value="1" <?=LAY_checked($showhi, 1) ?>>  Khóa
                  </label>
                  <label>
                    <input type="radio" name="showhi" class="minimal" value="0" <?=LAY_checked($showhi, 0) ?>> Mở
                  </label>
                </div>
                <div class="form-group">
                  <label>Nội dung <a data-tooltip="Dù website bị ĐÓNG, nhưng nếu bạn đăng nhập bằng tài khoản admin, bạn vẫn thấy như bình thường."> </a></label>
                  <textarea id="noidung_vi" class="paEditor" name="noidung_vi" rows="10" cols="80"><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
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
        <button type="submit" name="capnhat" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
    </h3>
  </div>
</form>