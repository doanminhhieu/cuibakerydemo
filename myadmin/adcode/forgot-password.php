<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quên mật khẩu :: Hệ thống quản trị</title>
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
        <p class="login-box-msg" style="font-size: 14px; font-weight:bold">QUÊN MẬT KHẨU</p>
        <form name="TheForm" method="post" action="<?=$fullpath_admin ?>?action=login"  onsubmit="return CheckRegForm();">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nhập email" name="email" id='qmk_email'>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Mã bảo vệ" name="qmk_mbv" id='qmk_mabaove'>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span style="position: absolute; letter-spacing: 2px; right: 30px; margin-top: 8px; font-size: 14px; color: #3c8dbc; font-weight: 600; top: 0;"><?=$_SESSION['key_pass'] = RAND(11111,99999) ?></span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox icheck">
                        <label>
                            <a href="index.php?module=login">Đã nhớ mật khẩu ?</a>
                        </label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <button type="button" name="admindangnhap" class="btn btn-primary btn-block btn-flat"  onclick="LAYMK_admin()">LẤY MẬT KHẨU <img src="images/loading2.gif" style="height: 14px; display: none" class="img_loadding_ad"></button>
                </div>
            </div>
        </form>
    </div>
    <p style="text-align: center; font-weight: bold; padding-top: 10px; color: #999">Thiết kế và phát triển bởi P.A Việt Nam</p>
</div>
</body>
</html>