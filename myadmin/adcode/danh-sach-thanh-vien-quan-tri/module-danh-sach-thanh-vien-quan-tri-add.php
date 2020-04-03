<?php
  $table = "#_members";
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $phanquyen      = $_REQUEST['phanquyen'];
    $tentruycap     = $_REQUEST['tentruycap'];
    $hoten          = $_REQUEST['hoten'];
    $sodienthoai    = $_REQUEST['sodienthoai'];
    $email          = $_REQUEST['email'];
    $diachi         = $_REQUEST['diachi'];
    $showhi         = isset($_POST['showhi']) ? 1 : 0;
    $keypass        = RANDOM_chuoi(5);
    $matkhau        = create_pass($auto_key_pass.md5($auto_key_pass.$_POST['matkhau']),$keypass);
  }

  if(!empty($_POST)) {
    $wh = '';
    if($id != 0) $wh = " AND `id` <> '".$id."'";
  
    $check_user = DB_que("SELECT * FROm $table WHERE `tentruycap` = '$tentruycap' $wh LIMIT 1");
    $check_email = DB_que("SELECT * FROm $table WHERE `email` = '$email' $wh LIMIT 1");
    
    if(mysql_num_rows($check_user) != 0)
      {
        $_SESSION['show_message_off'] =  "Tên tài khoản đã tồn tại trong hệ thống!";
        if($id != 0)
          LOCATION_js($url_page."&edit=".$id);
        else
          LOCATION_js($url_page."&them-moi=true");
        exit();
      }
    else if(mysql_num_rows($check_email) != 0)
      {
        $_SESSION['show_message_off'] =  "Email đã tồn tại trong hệ thống!";
        if($id != 0)
          LOCATION_js($url_page."&edit=".$id);
        else
          LOCATION_js($url_page."&them-moi=true");
        exit();
      }
    else
      {
        $data                 = array();

        $data['hoten']        = $hoten;
        $data['email']        = $email;
        $data['tentruycap']   = $tentruycap;
        $data['diachi']       = $diachi;
        $data['sodienthoai']  = $sodienthoai; 

        if($id != $_SESSION['luluwebproadmin']){        
          $data['showhi']       = $showhi;
        }
 
        if($id == 1) {
          $data['phanquyen']  = 1;
        } 
        else { 
          $data['phanquyen']  = $phanquyen;
        }


        if(trim($_POST['matkhau']) != '') 
        {
          $data['keypass']  = $keypass;
          $data['matkhau']  = $matkhau;
        }


        if($id == 0){
          $id  = ACTION_db($data, $table , 'add', NULL ,NULL);
          if($id != 0) {
            $_SESSION['show_message_on'] =  "Thêm tài khoản thành công!";
            LOCATION_js($url_page."&edit=".$id);
            exit();
          }else{
            $_SESSION['show_message_off'] =  "Tên tài khoản đã tồn tại!";
          }
        }else{

          ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'"); 
          $_SESSION['show_message_on'] =  "Cập nhật tài khoản thành công!";
        }
      }
  }


  if($id> 0)
  {
    $sql_se       = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
    $sql_se       = mysql_fetch_assoc($sql_se);

    $phanquyen    = SHOW_text($sql_se['phanquyen']);
    $tentruycap   = SHOW_text($sql_se['tentruycap']);
    $hoten        = SHOW_text($sql_se['hoten']);
    $sodienthoai  = SHOW_text($sql_se['sodienthoai']);
    $email        = SHOW_text($sql_se['email']);
    $diachi       = SHOW_text($sql_se['diachi']);
    $showhi       = SHOW_text($sql_se['showhi']);
  }

?>

<section class="content-header">
  <h1>Danh sách thành viên quản trị</h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Danh sách thành viên quản trị</li>
  </ol>
</section>

<form id="form_submit" name="form_submit" action="" method="post">
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
                <h2 class="h2_title">
                    <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> thành viên quản trị
                </h2>
                <h3 class="box-title box-title-td pull-right">
                  <button onclick="return RETURN_checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                  <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                  <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                </h3>
          </div>
          <div class="box p10">
            
            <div class="form-group">
              <label>Nhóm tài khoản</label>
                <select name="phanquyen" class="form-control">
                  <?php 
                    foreach (GET_danhsachquyen() as $val) { 
                  ?>
                  <option <?=(isset($phanquyen)) ? LAY_selected($phanquyen, $val['id']) : '' ?> value="<?=$val['id'] ?>"><?=$val['ten_vi'] ?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="form-group">
              <label>Tên tài khoản (*)</label>
              <input type="text" class="form-control" id="tentruycap" name="tentruycap" value="<?=!empty($tentruycap) ? $tentruycap : ''?>">
            </div>

            <div class="form-group">
              <label>Mật khẩu <?=$id == 0 ? '(*)' : '' ?></label>
              <input type="password" class="form-control" id="matkhau" name="matkhau" value="">
            </div>

            <div class="form-group">
              <label>Nhập lại mật khẩu <?=$id == 0 ? '(*)' : '' ?></label>
              <input type="password" class="form-control" id="matkhau_cf" value="">
            </div>

            <div class="form-group">
              <label>Họ tên</label>
              <input type="text" class="form-control" id="hoten" name="hoten" value="<?=!empty($hoten) ? $hoten : ''?>">
            </div>

            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" value="<?=!empty($sodienthoai) ? $sodienthoai : ''?>">
            </div>

            <div class="form-group">
              <label>Email (*)</label>
              <input type="text" class="form-control" id="email_ad" name="email" value="<?=!empty($email) ? $email : ''?>">
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" name="diachi" value="<?=!empty($diachi) ? $diachi : ''?>">
            </div>
            <?php if($id != $_SESSION['luluwebproadmin']){ ?>
            <div class="form-group">
              <label class="mr-20 checkbox-mini">
                <input type="checkbox" name="showhi" class="minimal" <?=isset($showhi) && $showhi == 0 ? '' : 'checked="checked"' ?>> Hiển thị
              </label>
            </div>
            <?php } ?>

          </div>
        </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
  <h3 class="box-title box-title-td pull-right">
    <button onclick="return RETURN_checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
    <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
    <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
  </h3>
</div>
</form>

<script>
  function RETURN_checkSubmit(){
    if($("#tentruycap").val().trim() == '')
      {
        alert("Nhập tên tài khoản!");
        $("#tentruycap").focus();
        return false;
      }

      for (var i=0; i < $("#tentruycap").val().toString().length; i++)
      {
        if ($("#tentruycap").val().toString().charAt(i) == ' ')
        {
          alert("Tên tài khoản không hợp lệ!");
          $("#tentruycap").focus();
          return false;
        }
      }
      
      <?php if($id > 0){ ?>
        if($("#matkhau").val() != $("#matkhau_cf").val())
        {
          alert("Mật khẩu nhập lại chưa đúng!");
          $("#matkhau_cf").focus();
          return false;
        }
      <?php }else{ ?>
        if($("#matkhau").val().trim() == '')
        {
          alert("Nhập mật khẩu!");
          $("#matkhau").focus();
          return false;
        }
        else if($("#matkhau").val() != $("#matkhau_cf").val())
        {
          alert("Mật khẩu nhập lại chưa đúng!");
          $("#matkhau_cf").focus();
          return false;
        }
      <?php } ?>
      if($("#email_ad").val().trim() == ''){
          alert("Nhập địa chỉ email!");
          $("#email_ad").focus();
          return false;
      }

      if($("#email_ad").val() != ''){
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test($("#email_ad").val())){
          alert("Địa chỉ email không hợp lệ. Vui lòng kiểm tra lại!");
          $("#email_ad").focus();
          return false;
        }
      }
      if($('#sodienthoai').val() != '' && !CHECK_phone("#sodienthoai")){
        alert("Số điện thoại không hợp lệ!");
        $("#sodienthoai").focus();
        return false;
      }

    return true;
  }
</script>