<?php 
    if(!defined("_source")) exit();

    if($motty == "") {
        include _source."home.php";
    }

    else if($motty == "paypal"){
        include "paypal/index.php";
    }
    else if($motty == "thoat"){
        $_SESSION['id'] = NULL;
        unset($_SESSION['id']);
        LOCATION_js($full_url);
        exit();
    }

    else if($motty == "search"){
        include "step/2.php";    
    }
    // else  if($motty == "dang-tin"){
    //     include _source."dang-tin.php";    
    // }
    // else  if($motty == "quan-ly-tin") {
    //     include _source."quan-ly-tin.php";    
    // }
    // else  if($motty == "tai-khoan") {
    //     include _source."quan-ly-tin.php";    
    // }
    
    // else  if($motty == "dang-nhap"){
    //     include _source."dang-nhap.php";    
    // }
    // else  if($motty == "create-account") {
    //     include _source."dang-ky.php";    
    // }
    // else  if($motty == "forget-password"){
    //     include _source."quen-mat-khau.php";    
    // }
    // else  if($motty == "tai-khoan") {
    //     include _source."tai-khoan.php";    
    // }
    // else  if($motty == "doi-mat-khau"){
    //     include _source."doi-mat-khau.php";    
    // }


    else  if($motty == "paypal-false" || $motty == "paypal-success" || $motty == "thong-tin-lich-kham") {
        
        include _source."paypal_thanh_cong.php";
    }
    else if(isset($slug_step) && $slug_step == "0"){
         include "step/1a.php";
    }
    else if(!empty($arr_running) && !empty($thongtin_step['step']) && $thongtin_step['step'] != ''){

        if($slug_table     == "baiviet"){

            include "step/".$thongtin_step['step']."a.php";
            if(empty($_SESSION['viewbv'][$arr_running['id']])) {
                @DB_que("UPDATE `#_baiviet` SET `soluotxem` = `soluotxem` + 1 WHERE `id` = '".$arr_running['id']."' LIMIT 1");
                $_SESSION['viewbv'][$arr_running['id']] = 1;
            }
            
        }
        else{
            
            include "step/".$thongtin_step['step'].".php";
        }
    }
    else if($motty == "gio-hang")  {
        include _source."cart.php";
    }
    else if($motty == "dat-hang") {
        include _source."buy.php";
    }
    // else if($motty == "kiem-tra-don-hang" || $motty == "lich-su-mua-hang") {
    //     include _source."kiem-tra-don-hang.php";
    // }
    else if($motty == "thong-tin-don-hang") {
        include _source."thong-tin-don-hang.php";
    }

    // else if($motty == "mat-khau-moi"){
    //     include _source."mat-khau-moi.php";
    //     include _source."home.php";
    // }
    else {
        $motty = "404";
        include "step/1a.php";
    }
?>