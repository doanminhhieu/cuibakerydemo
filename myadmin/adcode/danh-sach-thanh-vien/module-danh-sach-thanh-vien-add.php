<?php
  $table = "#_members";
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;


  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    foreach ($_POST as $key => $value) {
      ${$key} = $value;
    }

    $showhi         = isset($_POST['showhi']) ? 1 : 0;
    $phanquyen      = 0;
    $keypass        = RANDOM_chuoi(5);
    $matkhau        = create_pass($auto_key_pass.md5($auto_key_pass.$_POST['matkhau']),$keypass);



  }

  if(!empty($_POST))
  {
    $wh = '';
    if($id != 0) $wh = " AND `id` <> '".$id."'";
    $check_user = DB_que("SELECT * FROm $table WHERE `email` = '$email' $wh LIMIT 1");

    if(mysql_num_rows($check_user) != 0)
      {
        $_SESSION['show_message_off'] =  "Email đã tồn tại trong hệ thống!";
      }
    else
      {
        $hinhanh              = UPLOAD_image("icon", "../datafiles/member/", time());
        $data                 = array();

        $data['tentruycap']   = md5($email.time());
        $data['hoten']        = $hoten;
        $data['email']        = $email;
        $data['diachi']       = $diachi;
        $data['sodienthoai']  = $sodienthoai;         
        // $data['gioitinh']     = is_numeric($gioi_tinh) ? $gioi_tinh : 1;
        $data['showhi']       = $showhi;
        $data['phanquyen']    = $phanquyen;
        // $data['ngaysinh']     = @$nam_sinh;
        // $data['cmnd']         = $cmnd;
        if($hinhanh != false) {
          $data['icon']     = $hinhanh;
          if($id > 0){
            //xoa anh
              $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
              @unlink("../datafiles/member/".mysql_result($sql_thongtin, 0, "icon"));
            //end
          }
        }

        if(trim($_POST['matkhau']) != '') 
        {
          $data['keypass']  = $keypass;
          $data['matkhau']  = $matkhau;
        }

        if($id == 0){
          $id  = ACTION_db($data, $table , 'add', NULL ,NULL);
          if($id != 0) {
            $_SESSION['show_message_on'] =  "Thêm thành viên thành công!";
            LOCATION_js($url_page."&edit=".$id);
            exit();
          }else{
            $_SESSION['show_message_off'] =  "Tên truy cập đã tồn tại!";

          }
        }else{
          ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'"); 
          $_SESSION['show_message_on'] =  "Cập nhật thành viên thành công!";
        }
      }
  }


  if($id > 0)
  {
    $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['edit']."' LIMIT 1");
    $sql_se     = mysql_fetch_array($sql_se);

    foreach ($sql_se as $key => $value) {
      ${$key}        = SHOW_text($value);
    }

    if($icon != '') 
        $full_icon   = "../datafiles/member/$icon";
  }    

?>

<section class="content-header">
    <h1>Danh sách thành viên đăng ký</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách thành viên đăng ký</li>
    </ol>
</section>

<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> thành viên đăng ký
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button onclick="return RETURN_checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
              </h3>
          </div>
          <div class="box p10">
            <div class="form-group">
              <label for="exampleInputFile2">Ảnh thành viên</label>
              <div class="dv-anh-chitiet-img-cont">
                <div class="dv-anh-chitiet-img">
                  <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
                  <input type="file" name="icon" id="input_icon" class="cls_hinhanh" accept="image/*" onchange="pa_previewImg(event, '#img_icon','input_icon');">
                  <img src="<?=@$full_icon  ?>" alt="" class="img_chile_dangtin" style="<?php if(!empty($full_icon) && $full_icon != "") echo "display: block"; else echo "display: none" ?>" id="img_icon">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Email (*)</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=!empty($email) ? $email : ''?>">
            </div>

            <div class="form-group">
              <label>Mật khẩu <?=$id == 0 ? '(*)' : '' ?></label>
              <input type="password" class="form-control" id="matkhau" name="matkhau" value="">
            </div>

            <div class="form-group">
              <label>Nhập lại mật khẩu <?=$id == 0 ? '(*)' : '' ?></label>
              <input type="password" class="form-control" id="matkhau_cf" value="">
            </div>
 
            <!-- <div class="form-group">
              <label>Nhóm thành viên</label>
              <select name="cong_ty" id="cong_ty" class="form-control">
                <option value="0">Chọn nhóm</option>
                <?php
                  $khuvuc = DB_que("SELECT * FROM `#_members_nhom` WHERE `showhi` = 1 ORDER BY `catasort` ASC");
                  while ($rows = mysql_fetch_assoc($khuvuc)) { 
                ?>
                  <option value="<?=$rows['id'] ?>" <?=$rows['id']== @$cong_ty ? 'selected' : "" ?>><?=$rows['tenbaiviet_vi'] ?></option>
                <?php } ?>
              </select>
            </div> -->

            <div class="form-group">
              <label>Họ tên</label>
              <input type="text" class="form-control" id="hoten" name="hoten" value="<?=!empty($hoten) ? $hoten : ''?>">
            </div>

            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" value="<?=!empty($sodienthoai) ? $sodienthoai : ''?>">
            </div>

            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" name="diachi" value="<?=!empty($diachi) ? $diachi : ''?>">
            </div>
 
            <!-- <div class="form-group">
              <label>Giới tính</label>
              <select name="gioi_tinh" class="SlectBox form-control  " >
                <option value="">Chọn giới tính</option>
                <option value="1" <?=LAY_selected(1, @$gioitinh) ?>>Nam</option>
                <option value="2" <?=LAY_selected(2, @$gioitinh) ?>>Nữ</option>
              </select>
            </div>
            <div class="form-group">
              <label>Số CMND</label>
              <input type="text" class="form-control" id="cmnd" name="cmnd" value="<?=!empty($cmnd) ? $cmnd : ''?>">
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
    if($("#email").val() == '')
    {
      alert("Nhập email!");
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
    
    <?php if($id > 0){ ?>
      if($("#matkhau").val() != $("#matkhau_cf").val())
      {
        alert("Mật khẩu nhập lại chưa đúng!");
        $("#matkhau_cf").focus();
        return false;
      }
    <?php }else{ ?>
      if($("#matkhau").val() == '')
      {
        alert("Nhập mật khẩu!");
        $("#matkhau").focus();
        return false;
      }
      if($("#matkhau").val().length < 6) 
      {
        alert("Mật khẩu phải ít nhất 6 ký tự!");
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
 
    return true;
  }
</script>