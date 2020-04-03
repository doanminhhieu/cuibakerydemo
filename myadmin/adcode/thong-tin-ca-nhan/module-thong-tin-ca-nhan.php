<?php
  $table = "#_members";
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $hoten          = $_REQUEST['hoten'];
    $sodienthoai    = $_REQUEST['sodienthoai'];
    $email          = $_REQUEST['email'];
    $diachi         = $_REQUEST['diachi'];
    $gioitinh       = $_REQUEST['gioitinh'];
    $matkhaucu      = $_REQUEST['matkhaucu'];
    $keypass        = RANDOM_chuoi(5);
    $matkhau        = create_pass($auto_key_pass.md5($auto_key_pass.$_POST['matkhau']),$keypass);
  }
  
  if(!empty($_POST))
  {
    $data                 = array();
    $data['hoten']        = $hoten;
    $data['sodienthoai']  = $sodienthoai;
    $data['email']        = $email;
    $data['diachi']       = $diachi;
    $data['gioitinh']     = $gioitinh;

    if(trim($_POST['matkhau']) != '') 
    {
      $check_user = DB_que("SELECT * FROM $table WHERE `id` = '".$_SESSION['luluwebproadmin']."' LIMIT 1");
      $info       = mysql_fetch_assoc($check_user);
      $kpass      = $info['keypass'];
      $pass_old   = create_pass($auto_key_pass.md5($auto_key_pass.$matkhaucu),$kpass);
      if($info['matkhau'] == $pass_old)
      {
        $data['keypass']  = $keypass;
        $data['matkhau']  = $matkhau;

        ACTION_db($data, $table, 'update', array("capnhat"), "`id` = '".$_SESSION['luluwebproadmin']."'");
        $_SESSION['show_message_on'] =  "Cập nhật thông tin thành công!";
      }
      else 
      {
        $_SESSION['show_message_off'] =  "Mật khẩu cũ không đúng!";
      }  
    }
    else
    {
      ACTION_db($data, $table, 'update', array("capnhat"), "`id` = '".$_SESSION['luluwebproadmin']."'");
      $_SESSION['show_message_on'] =  "Cập nhật thông tin thành công!";
    }

  }

  $sql_se       = DB_que("SELECT * FROM `$table` WHERE `id`='".$_SESSION['luluwebproadmin']."' LIMIT 1");
  $sql_se       = mysql_fetch_assoc($sql_se);

  $phanquyen    = SHOW_text($sql_se['phanquyen']);
  $tentruycap   = SHOW_text($sql_se['tentruycap']);
  $hoten        = SHOW_text($sql_se['hoten']);
  $sodienthoai  = SHOW_text($sql_se['sodienthoai']);
  $email        = SHOW_text($sql_se['email']);
  $diachi       = SHOW_text($sql_se['diachi']);
  $gioitinh     = SHOW_text($sql_se['gioitinh']);
 
?>
<section class="content-header">
  <h1> Thông tin cá nhân</h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active"> Thông tin cá nhân</li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post">
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i> Sửa thông tin cá nhân
            </h2>
            <h3 class="box-title box-title-td pull-right">
              <button onclick="return checkSubmit()" type="submit" name="capnhat" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
            </h3>
          </div>
          <div class="box p10">
            
            <div class="form-group">
              <label>Nhóm tài khoản</label>
                <select name="phanquyen" class="form-control" disabled>
                  <?php 
                    foreach (GET_danhsachquyen() as $val) { 
                  ?>
                  <option <?=(isset($phanquyen)) ? LAY_selected($phanquyen, $val['id']) : '' ?> value="<?=$val['id'] ?>"><?=$val['ten_vi'] ?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="form-group">
              <label>Tên tài khoản</label>
              <input readonly type="text" class="form-control" id="tentruycap" name="tentruycap" value="<?=(isset($tentruycap)) ? $tentruycap : ''?>">
            </div>

            <div class="form-group">
              <label>Mật khẩu cũ</label>
              <input type="password" class="form-control" id="matkhaucu" name="matkhaucu" value="">
            </div>

            <div class="form-group">
              <label>Mật khẩu mới</label>
              <input type="password" class="form-control" id="matkhau" name="matkhau" value="">
            </div>

            <div class="form-group">
              <label>Nhập lại mật khẩu mới</label>
              <input type="password" class="form-control" id="matkhau_cf" value="">
            </div>

            <div class="form-group">
              <label>Họ tên</label>
              <input type="text" class="form-control" id="hoten" name="hoten" value="<?=(isset($hoten)) ? $hoten : ''?>">
            </div>

            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" value="<?=(isset($sodienthoai)) ? $sodienthoai : ''?>">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=(isset($email)) ? $email : ''?>">
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" name="diachi" value="<?=(isset($diachi)) ? $diachi : ''?>">
            </div>
            <div class="form-group">
              <label>Giới tính: </label>
              <label class="mr-20">
                <input type="radio" name="gioitinh" class="minimal" value="0" <?=(isset($_GET['edit'])) ? LAY_checked($gioitinh, 0) : 'checked' ?>> Nam
              </label>
              <label>
                <input type="radio" name="gioitinh" class="minimal" value="1" <?=(isset($_GET['edit'])) ? LAY_checked($gioitinh, 1) : '' ?>> Nữ
              </label>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
      <button onclick="return checkSubmit()" type="submit" name="capnhat" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
    </h3>
  </div>
</form>

<script src="plugins/iCheck/icheck.min.js"></script>

<script>
  function checkSubmit(){
    if($("#matkhau").val() != '')
    {
      if($("#matkhaucu").val() == '')
      {
        alert("Nhập mật khẩu cũ!");
        $("#matkhaucu").focus();
        return false;
      }
      else
      {
        if($("#matkhau").val() != $("#matkhau_cf").val())
        {
          alert("Mật khẩu nhập lại chưa đúng!");
          $("#matkhau_cf").focus();
          return false;
        }
      }
    }

    return true;
  }
</script>