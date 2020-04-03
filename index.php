<?php
    include("myadmin/config/sql.php");
    define('MOTTY', TRUE);
    define('_source', "sources/");
    $lang_group = array("en");
    
    $lang       = "vi";
    $full_url   = $fullpath;
    if (in_array($motty, $lang_group)) {
        $lang       = $motty;
        $full_url   = $fullpath . "/".$motty;
        $motty      = @$haity;
        $haity      = @$baty;
        $baty       = @$bonty;
        $bonty      = @$namty;   
    }
    // xu ly truy cap lan dau
    if(empty($_SESSION["lang"]) && $motty == "" && $thongtin['is_tiengviet'] == 0) {
        $_SESSION["lang"] = $lang_group[0];
        LOCATION_js($fullpath . "/".$lang_group[0]);
        exit();
    }
    // redic lang
    if(isset($_SESSION["lang"]) && $_SESSION["lang"] != $lang && !isset($_GET['actilang'])) {
        LOCATION_js(las_url_lang($_SESSION["lang"], $motty, $haity, $baty, $bonty, $namty));
        exit();
    } 
    // 
    $_SESSION["lang"]   = $lang;
    //define
    $danhsach_define = DB_fet_rd("*", "`#_clanguage`");
    $glo_lang        = array();
    foreach ($danhsach_define as $rows) {
        $glo_lang[$rows['code_lang']] = $rows['lang_' . $lang];
    }

    //couter
    if (!isset($_SESSION['ttwebsession'])) {
        $_SESSION['ttwebsession'] = md5(uniqid(rand(), true));
    }

    $baygio     = time();
    $timeroff   = 7884000; // 3 thang
    $online_tv  = ONLINE_user(600, $_SESSION['ttwebsession']);
    $thongke_tv = THONGKE_online();
    // end
    $check_slug = DB_fet_rd("*", "#_slug", "", "", 1, "", "`slug` = '$motty'");

    $slug_step  = "";
    $slug_page  = "";
    $slug_table = "";
    $slug_id    = "";

    if (count($check_slug) > 0) {
        $check_slug  = $check_slug[0];
        $slug_step   = $check_slug['step'];
        $slug_table  = $check_slug['bang'];
        $slug_id     = $check_slug['id_bang'];

        $arr_running = DB_fet_rd("*", "`#_$slug_table`", "`showhi` = 1 AND `seo_name` = '" . $motty . "'", "", 1);
        $arr_running = @$arr_running[0];
    }
    // get page
    if ($slug_step) {
        $thongtin_step = DB_fet_rd("*", "`#_step`", "`id` = '" . $slug_step . "'", "", 1);
        $thongtin_step = $thongtin_step[0];
    }

    //
    $seo_description    = "";
    $seo_keywords       = "";
    $seo_title          = "";

    
    $seo_description    = $thongtin['seo_description_' . $_SESSION["lang"]];
    $seo_keywords       = $thongtin['seo_keywords_' . $_SESSION["lang"]];
    $seo_title          = $thongtin['seo_title_' . $_SESSION["lang"]];
    if ($thongtin['is_khoasite'] == 1 && empty($_SESSION['luluwebproadmin'])) {
        include _source . 'khoa_site.php';
        exit();
    }

    $seo_image          = $fullpath."/".$thongtin["duongdantin"]."/".$thongtin["icon"];
 
    //
    include _source . "post.php";

    
    
    //
    if ($motty == "search") {
        $seo_description = $seo_keywords = $seo_title = $glo_lang['tim_kiem'];
    }

    if (!empty($arr_running)) {
        $seo_description = $arr_running['seo_description_' . $_SESSION["lang"]];
        $seo_keywords    = $arr_running['seo_keywords_' . $_SESSION["lang"]];
        $seo_title       = $arr_running['seo_title_' . $_SESSION["lang"]];

        if ($arr_running['icon'] != '') {
            $seo_image   = $fullpath . "/" . $arr_running['duongdantin'] . "/thumb_" . $arr_running['icon'];
        }
    }
    
    //islogin
    if(isset($_GET['login']) && $_GET['login'] == "fb") {
        include "login/fb.php";
        exit();
    }
    if(isset($_GET['login']) && $_GET['login'] == "google") {
        include "login/google.php";
        exit();
    }
    //end login
    $_SESSION['token'] = md5(RANDOM_chuoi(5));

    // ob_start("sanitize_output");
    include _source . "tren.php";
    include _source . "router.php";
    include _source . "duoi.php";
?>