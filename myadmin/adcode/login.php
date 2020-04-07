<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập :: Hệ thống quản trị</title>
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
    <script type="text/javascript" src="js/md5.js"></script>
    <script language="javascript">
        function CheckRegForm()
        {
            with (document.TheForm)
            {
                if (username.value=="")
                {
                    alert("Hãy nhập vào tên đăng nhập của bạn!");
                    username.focus();
                    return false;
                }
                if (passmd5.value=="")
                {
                    alert("Mật khẩu đăng nhập của bạn là gì?");
                    passmd5.focus();
                    return false;
                }
                passmd5.value = MD5('<?=$auto_key_pass?>'+passmd5.value);
            }
            return true;
        }
    </script>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="position: relative;">
   
   
    <div class="login-box-body" style=" border-radius: 10px; border: 5px solid #ccc">
        <p class="login-box-msg" style="font-size: 14px; font-weight:bold">HỆ THỐNG QUẢN TRỊ WEBSITE</p>
        <form name="TheForm" method="post" action="<?=$fullpath_admin ?>index.php?module=login"  onsubmit="return CheckRegForm();">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" id='admintentruycap'>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="passmd5" id='adminmatkhau'>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7">
                    <div class="checkbox icheck">
                        <label>
                            <a href="index.php?module=forgot-password">Quên mật khẩu ?</a>
                        </label>
                    </div>
                </div>
                <div class="col-xs-5">
                    <button type="submit" name="admindangnhap" class="btn btn-primary btn-block btn-flat">ĐĂNG NHẬP</button>
                </div>
            </div>
        </form>
    </div>
   
</div>
</body>
</html>