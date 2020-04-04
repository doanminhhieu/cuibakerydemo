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
	$db_user 			 		= "cuibakery_db";
	$db_pass 			 		= 'Gj2FwdhJ';
	$db_data 			 		= "cuibakery_db";
	$_SESSION['sub_demo'] 		= "cuicake_demo/";
	$check_fl_domain 			= "cuibakery.com";
	$cache_file   				= "on";
	$redis_on_off 				= "off";
	$_SESSION['sub_demo_check'] = false;
	$_SESSION['thumuc']  		= $_SESSION['sub_demo']."datafiles";



	if($_SERVER['HTTP_HOST'] 	!= 'localhost' && $_SERVER['HTTP_HOST'] != $check_fl_domain ) {
		$_SESSION['thumuc']  		= "datafiles";
		$_SESSION['sub_demo_check'] = true;
	}

  	$db   = @mysql_connect($db_localhost, $db_user, $db_pass);
	if(is_string($db)){
		include("db_mysql_error.php");
		exit();
	}
	$dbuse 		= @mysql_select_db($db_data ,$db);
	if(!$dbuse){
		include("db_mysql_error.php");
		exit();
	}
	mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary");
	
	function CAT_CHUOI_tuchuoi($str, $char){
		$vitri = strpos("pa".$str, $char);
		if($vitri >= 2){
			return trim(substr($str, 0,$vitri-2));
		}
		return $str;
	}


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

	if($motty == "myadmin") {
		$is_myadmin = "on";
	}

	include("function.php");
	include("redis.php");



	if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$fullpath		= 'https://'.$domain1ty;
	}
	else {
		$fullpath		= 'http://'.$domain1ty;
	}
	$fullpath_admin 	= $fullpath."/myadmin/";
	$auto_key_pass		= "wlh_2019";

    $thongtin           = DB_fet_rd("*", "#_seo", "", "", 1, ""," 1 = 1");
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
	$duongdantin = "datafiles";
	if(!is_dir('/'.$file_coder.'datafiles/cache')){
		@mkdir('/'.$file_coder.'datafiles/cache','0777');
	}

	if(!is_dir("../".$duongdantin)){
		@mkdir("../".$duongdantin,'0777');
	}
	// xu ly 301
	f_link301();
	// end
?>