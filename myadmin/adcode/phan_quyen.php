<?php 
  $glo_quyen   = 1;
  

  if($step != ""){
    $ac     = $step;
    $re_url = $url_page."&step=".@$step."&id_step=".@$id_step;
  }else{
    $ac = $action;
    $re_url = $url_page;
  }
  if(!empty($check_post_phanquyen)) {
    $ac = $action   = isset($_POST['action']) ? $_POST['action'] : "";
    $step     = isset($_POST['step']) ? $_POST['step'] : "";
    $id_step  = isset($_POST['id_step']) ? $_POST['id_step'] : "";
    if($step != "") {
      $ac     = $step;
    }
  }

  //check token
  // if(isset($_GET['del']) || isset($_GET['token'])){ //xoa
  //   $token = isset($_GET['token']) ? $_GET['token'] : "";
  //   if(!CHECK_token($token)){
  //     $_SESSION['show_message_off'] = "Mã token không hợp lệ!";
  //     header("Location: ".$re_url);
  //     exit();
  //   }      
  // }
  if(isset($_POST['token'])){
    $token = $_POST['token'];
    if(!CHECK_token($token)){
      $_SESSION['show_message_off'] = "Mã token không hợp lệ!";
      header("Location: ".$re_url);
      exit();
    }  
  }


  //
  if(isset($_SESSION['phanquyen']) && $_SESSION['phanquyen'] != 1){
    $glo_quyen = DB_fet("*", "#_module_nhomtaikhoan", "`id` = '".$_SESSION['phanquyen']."'", "`sort` ASC, `id` ASC");
    $glo_quyen = mysql_fetch_assoc($glo_quyen);
    $glo_quyen = $glo_quyen['phan_quyen'];
    $glo_quyen = json_decode($glo_quyen, true);

    if(is_array($glo_quyen)){
      foreach ($glo_quyen as $key => $val) {
        if(strtolower($key) == strtolower($ac)){
          if(isset($_REQUEST['addgiatri'])){
            $name_key = array_keys($_POST);
            foreach ($name_key as $key) {
              if(strstr($key, "xoa_gr_arr") != "" ){
                if($val['xoa'] == 0){
                  $_SESSION['show_message_off'] = "Bạn không có quyền XÓA nội dung!";
                  header("Location: ".$re_url);
                  exit();
                  break;
                }
              }
            }
            if($val['sua'] == 0){
              $_SESSION['show_message_off'] = "Bạn không có quyền SỬA nội dung!";
              header("Location: ".$re_url);
              exit();
            }
          } 
          else if(!empty($check_post_phanquyen)) {
            if($check_post_phanquyen == 'edit') {
              if($val['sua'] == 0){
                echo "Bạn không có quyền SỬA nội dung!";
                exit();
              }
            }
          }
          else if(isset($_GET['them-moi'])){ //them moi
            if($val['them'] == 0){
              $_SESSION['show_message_off'] = "Bạn không có quyền THÊM nội dung!";
              header("Location: ".$re_url);
              exit();
            }
          }
          elseif(isset($_GET['edit'])){ //sua
            if($val['sua'] == 0){
              $_SESSION['show_message_off'] = "Bạn không có quyền SỬA nội dung!";
              header("Location: ".$re_url);
              exit();
            }
          }
          elseif(isset($_GET['del'])){ //xoa
            if($val['xoa'] == 0){
              $_SESSION['show_message_off'] = "Bạn không có quyền XÓA nội dung!";
              header("Location: ".$re_url);
              exit();
            }
          }
          else{
            if(!empty($check_post_phanquyen)) {
              if($check_post_phanquyen == 'edit') {
                if($val['sua'] == 0){
                  echo "Bạn không có quyền SỬA nội dung!";
                  exit();
                }
              }
            }
            else  if(!empty($_POST)){ //sua
              if($val['sua'] == 0){
                $_SESSION['show_message_off'] = "Bạn không có quyền SỬA nội dung!";
                header("Location: ".$re_url);
                exit();
              }
            }
            else{ //xem
              if($val['xem'] == 0){
                header("Location: ".$fullpath."/myadmin/");
                exit();
              }
            }
          }
        }
      }
    }

  }
  
?>