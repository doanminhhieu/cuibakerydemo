<?php
  $table = '#_ship_vanchuyen_khac';
  if(!empty($_POST)){
    $id_kv             = $_REQUEST['id_kv'];
    $check             = DB_que("SELECT * FROM `$table` WHERE `id_kv` = '$id_kv' LIMIT 1");
    if(mysql_num_rows($check)){
      $_SESSION['show_message_off'] =  "Khu vực không hợp lệ hoặc đã tồn tại!";
    }else{
      $data                     = array();
      $data['id_kv']            = $id_kv;
      $data['tenbaiviet_vi']    = "Giao hàng tận nơi";
      $data['tenbaiviet_en']    = "Giao hàng tận nơi";
      $data['toi_thieu']        = 0;
      $data['toi_da']           = 0;
      $data['loai']             = 0;
      $data['phi_van_chuyen']   = 40000;
      ACTION_db($data, $table , 'add', NULL,NULL);
      $_SESSION['show_message_on'] =  "Thêm khu vực vận chuyển thành công!";
      LOCATION_js($url_page);
    }
    
  }

?>

<section class="content-header">
    <h1>Phương thức vận chuyển</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Phương thức vận chuyển</li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post">
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
                <h2 class="h2_title">
                    <i class="fa fa-pencil-square-o"></i> Thêm khu vực vận chuyển
                </h2>
                <h3 class="box-title box-title-td pull-right">
                  <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                  <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                </h3>
            </div>
            <div class="box p10">
              <div class="form-group">
                <label>Nhập khu vực vận chuyển</label>
                <select name="id_kv" id="id_kv" class="form-control">
                  <option value="0">Chọn khu vực vận chuyển</option>
                  <?php 
                    $khuvuc = LAY_khuvuc();
                    foreach ($khuvuc as $val) {
                      if($val['id_parent'] != 0) continue;
                  ?>
                  <option value="<?=$val['id'] ?>"><?=$val['tenbaiviet_vi'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
        <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
        <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>