<?php
	session_start();
	@header("Content-Type: text/html; charset=UTF-8");
	@header('X-XSS-Protection:0');
	@mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary");
  	@date_default_timezone_set('Asia/Saigon');
	if($_SERVER['HTTP_HOST'] != 'localhost'){
		error_reporting(0);
	}
	$db_localhost 		 		= "localhost";
	$db_user 			 		= "root";
	$db_pass 			 		= '';
	$db_data 			 		= "2020_ducviet";
	$_SESSION['sub_demo'] 		= "2020_trieuxuan/";
	$check_fl_domain 			= "webdemo5.pavietnam.vn";
	$_SESSION['sub_demo_check'] = false;
	$_SESSION['thumuc']  		= $_SESSION['sub_demo']."datafiles/img_data";

	if($_SERVER['HTTP_HOST'] 	!= 'localhost' && $_SERVER['HTTP_HOST'] != $check_fl_domain ) {
		$_SESSION['thumuc']  		= "datafiles/img_data";
		$_SESSION['sub_demo_check'] = true;
	}

  	$db   = @mysql_connect($db_localhost, $db_user, $db_pass);
	if(is_string($db)){
		include("config/db_mysql_error.php");
		exit();
	}
	$dbuse 		= @mysql_select_db($db_data ,$db);
	if(!$dbuse){
		include("myadmin/config/db_mysql_error.php");
		exit();
	}
	mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary");
	include("function.php");

	$domain1ty	= $_SERVER['HTTP_HOST'];
	$docpat     = urldecode(mb_strtolower(htmlspecialchars($_SERVER['REQUEST_URI'])));
	$docpat 	= trim($docpat, "/");
	$docpat 	= @explode("/", $docpat);

	if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == $check_fl_domain){
		$file_coder 			= @$docpat[0];
		$domain1ty			 	= $domain1ty."/".$file_coder;
		$file_coder 			= $file_coder."/";
		$motty      			= @CAT_CHUOI_tuchuoi($docpat[1], "?");
        $haity      			= @CAT_CHUOI_tuchuoi($docpat[2], "?");
        $baty       			= @CAT_CHUOI_tuchuoi($docpat[3], "?");
        $bonty      			= @CAT_CHUOI_tuchuoi($docpat[4], "?");
        $namty      			= @CAT_CHUOI_tuchuoi($docpat[5], "?");
	}
	else{
		$file_coder  			= "";
		$motty      			= @CAT_CHUOI_tuchuoi($docpat[0], "?");
        $haity      			= @CAT_CHUOI_tuchuoi($docpat[1], "?");
        $baty       			= @CAT_CHUOI_tuchuoi($docpat[2], "?");
        $bonty      			= @CAT_CHUOI_tuchuoi($docpat[3], "?");
        $namty      			= @CAT_CHUOI_tuchuoi($docpat[4], "?");
	}

	if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$fullpath		= 'https://'.$domain1ty;
	}
	else {
		$fullpath		= 'http://'.$domain1ty;
	}
	$fullpath_admin 	= $fullpath."/myadmin/";
	$auto_key_pass		= "wlh_2019";


    $thongtin           = AOK("*", "#_seo", "", "", 1, "", "where_clear");
    $thongtin           = reset($thongtin);
	if(!strpos($_SERVER['REQUEST_URI'],"myadmin") && $thongtin['is_https'] == 1) {
		if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'){
		    header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		    exit();
	    }
	}

	if(!empty($_GET)){
		$_GET = PROCESS_data($_GET);
	}
	if(!empty($_POST)){
		$_POST = PROCESS_data($_POST);
	}
	if(!empty($_COOKIE)){
		$_COOKIE = PROCESS_data($_COOKIE);
	}
	if(!empty($_REQUEST)){
		$_REQUEST = PROCESS_data($_REQUEST);
	}
	$duongdantin = "datafiles/setone";
	if(!is_dir('/'.$file_coder.'datafiles/img_data')){
		@mkdir('/'.$file_coder.'datafiles/img_data','0777');
	}

	if(!is_dir("../".$duongdantin)){
		@mkdir("../".$duongdantin,'0777');
	}
	// xu ly 301
	$link_check 	 = urldecode(mb_strtolower(htmlspecialchars($_SERVER['REQUEST_URI'])));
	if($link_check  != "") {
		$link_check 	= rtrim($link_check,"/");
		$link_check_new = $link_check."/";

		$link_check  	= DB_que("SELECT * FROM `#_lienket` WHERE (`tenbaiviet_vi` = '$link_check' OR `tenbaiviet_vi` = '$link_check_new') AND `showhi` = 1 LIMIT 1");
		if(mysql_num_rows($link_check)) {
			$link_check = mysql_fetch_assoc($link_check);
			if($link_check['lien_ket'] != "" && $link_check['lien_ket'] != $link_check['tenbaiviet_vi']) {
				//update
				DB_que("UPDATE `#_lienket` SET `thuc_hien` = `thuc_hien` + 1, `lan_cuoi` = '".time()."' WHERE `tenbaiviet_vi` = '".$link_check['tenbaiviet_vi']."' AND `showhi` = 1 LIMIT 1");
				//
				@header("HTTP/1.1 301 Moved Permanently"); 
				@header("Location: ".$link_check['lien_ket']); 
				exit();
			}
		}
	} 
	// end
?>