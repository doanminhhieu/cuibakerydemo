<?php
    $email  = isset($_GET['email']) ? htmlentities($_GET['email']): '';
    $key    = isset($_GET['key']) ? htmlentities($_GET['key']): '';

    $sql = DB_que("SELECT * FROM `#_members` WHERE `showhi` = 1 AND `email` = '".$email."' AND `active` = '".$key."' AND `phanquyen` <> 0 LIMIT 1");
    if(!mysql_num_rows($sql)){
        ALERT_js("Liên kết không hợp lệ hoặc đã được sử dụng!");
        LOCATION_js($fullpath."/myadmin/index.php?module=login");
        exit();
    }
    
    if(!empty($_POST) && trim($_POST['matkhau']) != ''){
        $row            = mysql_fetch_array($sql);
        $sql_keypass    = $row['keypass'];
        $matkhau        = create_pass($auto_key_pass.md5($auto_key_pass.$_POST['matkhau']),$sql_keypass);

        $ex_key         = explode("P_A", $key);
        if(@$ex_key[1]  != md5(GET_ip())){
            ALERT_js("Địa chỉ IP đổi mật khẩu không trùng với IP quên mật khẩu!");
        }else{
            $data               = array();
            $data['matkhau']    = $matkhau;
            $data['active']     = '';
            ACTION_db($data, "#_members", 'update', NULL, "`email` = '".$email."' AND `phanquyen` <> 0 LIMIT 1");
            ALERT_js("Đổi mật khẩu thành công!");
            LOCATION_js($fullpath."/myadmin/index.php?module=login");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đổi mật khẩu mới :: Hệ thống quản trị</title>
    <base href="<?=$fullpath."/myadmin/"  ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/admin.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?=$favico ?>"/>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="js/me.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="position: relative;">
    <div style="position: absolute; top: 55px; left:-234px; width: 239px; height: 125px; background-color: white; border-radius: 5px; padding: 10px; border: 5px solid #ccc; border-right:0">
        <a href="https://web30s.vn" target="_blank"><img src="images/logo_web30s.png" style="margin-top: 10px"></a>
    </div>
    <div class="dv-right-login">
        <p class="tit">Hỗ trợ 24/7: <a href="tel:1900 9477">1900 9477</a></p>
        <p>KD Hồ Chí Minh: <a href="tel:028 6256 3737">028-6256 3737</a></p>
        <p>KD Hà Nội: <a href="tel:024 7307 3737">024-7307 3737</a></p>
        <p>Email: <a href="mailto:web@pavietnam.vn">web@pavietnam.vn</a></p>
    </div>
    <div class="login-box-body" style=" border-radius: 10px; border: 5px solid #ccc">
        <p class="login-box-msg" style="font-size: 14px; font-weight:bold">ĐỔI MẬT KHẨU MỚI</p>
        <form name="TheForm" method="post" action=""  onsubmit="return CheckRegForm();">
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="matkhau" id='chang_matkhau'>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="chang_matkhau_rt" id='chang_matkhau_rt'>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox icheck">
                        <label>
                            <a href="index.php?module=login">Đến trang đăng nhập ?</a>
                        </label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="return RETURN_checkpass()" >ĐỔI MẬT KHẨU <img src="images/loading2.gif" style="height: 14px; display: none" class="img_loadding_ad"></button>
                </div>
            </div>
        </form>
    </div>
    <p style="text-align: center; font-weight: bold; padding-top: 10px; color: #999">Thiết kế và phát triển bởi P.A Việt Nam</p>
</div>
</body>
</html>