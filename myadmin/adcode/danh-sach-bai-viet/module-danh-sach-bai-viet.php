<?php

  if(isset($_GET['lich-day'])){
      include "module-danh-sach-lich-day.php";
  }
  else if(isset($_GET['upload']) && (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-bai-viet-upload.php";
  }
  else if(isset($_GET['tinh-nang']) && (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-bai-viet-tinh-nang.php";
  }
  else if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-bai-viet-add.php";
  }else{
    
    $table         = '#_baiviet';
    $table_slug    = str_replace("#_", "", $table);
    if($id_step    == 2)
      $n_bviet     = "sản phẩm";
    else
      $n_bviet     = "bài viết";

    if(isset($_GET['del_bl']))
    {
      $sql_se     = DB_que("SELECT * FROM `#_binhluan` WHERE `id`='".$_GET['del_bl']."' LIMIT 1");

      if(mysql_num_rows($sql_se) > 0)
      {
        DB_que("DELETE FROM `#_binhluan` WHERE `id` = '".$_GET['del_bl']."'", "#_binhluan");
        // End xóa ảnh con        
        $_SESSION['show_message_on'] = 'Xóa bình luận thành công!';

      }
      else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page."&step=".@$step."&id_step=".@$id_step);
      exit();
    }
    if(isset($_GET['del']))
    {
      $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1");

      if(mysql_num_rows($sql_se) > 0)
      {
        $icon         = @mysql_result($sql_se,0,'icon');
        $dowload      = @mysql_result($sql_se,0,'dowload');
        $icon_new     = @mysql_result($sql_se,0,'icon_new');
        $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
        $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');

        @unlink("../".$duongdantin."/".$icon);
        @unlink("../".$duongdantin."/thumb_".$icon);
        @unlink("../".$duongdantin."/thumbnew_".$icon);
        @unlink("../datafiles/files/".$dowload);

        DB_que("DELETE FROM `#_slug` WHERE `id_bang`='".$_GET['catalogid']."' AND `bang` = '$table_slug'", "#_slug");
        DB_que("DELETE FROM $table WHERE `id` = '".$_GET['catalogid']."' LIMIT 1", $table);
        DB_que("DELETE FROM `#_baiviet_select_tinhnang` WHERE `id_baiviet` = '".$_GET['catalogid']."'", "#_baiviet_select_tinhnang");
        DB_que("DELETE FROM `#_binhluan` WHERE `id_sp` = '".$_GET['catalogid']."'", "#_binhluan");
        // Xóa ảnh con
        $sql_img    = DB_que("SELECT * FROM `#_baiviet_img` WHERE `id_parent` ='".$_GET['catalogid']."'");
        if(mysql_num_rows($sql_img) > 0)
        {
          while($row = mysql_fetch_assoc($sql_img))
          {
            $p_name   = $row['icon'];
            $path_img = $row['duongdantin'];
            @unlink("../datafiles/".$path_img."/".$p_name);
            @unlink("../datafiles/".$path_img."/thumb_".$p_name);
          }
          DB_que("DELETE FROM `#_baiviet_img` WHERE `id_parent` = '".$_GET['catalogid']."'","#_baiviet_img");
        }
        // End xóa ảnh con        
        $_SESSION['show_message_on'] = 'Xóa '.$n_bviet.' [<strong>'.$del_name.'</strong>] thành công!';

      }
      else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page."&step=".@$step."&id_step=".@$id_step);
      exit();
    }
    if(isset($_REQUEST['xuat_file_excel']))
    {
      include "export_excel_baiviet.php";
    }
    if(isset($_POST['is_coppy_sl']) && $_POST['is_coppy_sl'] != 0 && isset($_POST['is_coppy_sl_id']) && $_POST['is_coppy_sl_id'] != 0) {
      
      for ($i=0; $i < $_POST['is_coppy_sl']; $i++) { 
        COPPY_row($table, $_POST['is_coppy_sl_id'], $step);
      }
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {

      for($i=0;$i<$_REQUEST['maxvalu'];$i++)
      {
        $idofme                 = isset($_POST["idme$i"]) ? $_POST["idme$i"] : 0;
        $data                   = array();

        if(isset($_SESSION['admin']) && isset($_POST["id_parent$i"])){
          $data['id_parent'] = $_POST["id_parent$i"];
        }
        if(isset($_POST["coppy_row$i"])){
          COPPY_row($table, $idofme, $step);
        }

        if(isset($_POST["xoa_gr_arr_$i"])){
          //xoa
          $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
          if(mysql_num_rows($sql_se) > 0)
          {
            $icon         = @mysql_result($sql_se,0,'icon');
            $dowload      = @mysql_result($sql_se,0,'dowload');
            $icon_new     = @mysql_result($sql_se,0,'icon_new');
            $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
            $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
            @unlink("../".$duongdantin."/".$icon);
            @unlink("../".$duongdantin."/thumb_".$icon);
            @unlink("../".$duongdantin."/thumbnew_".$icon);
            @unlink("../datafiles/files/".$dowload);

            DB_que("DELETE FROM `#_slug` WHERE `id_bang`='".$idofme."' AND `bang` = '$table_slug'", "#_slug");
            DB_que("DELETE FROM $table WHERE `id` = '".$idofme."' LIMIT 1", $table);
            DB_que("DELETE FROM `#_baiviet_select_tinhnang` WHERE `id_baiviet` = '".$idofme."'", "#_baiviet_select_tinhnang");
            DB_que("DELETE FROM `#_binhluan` WHERE `id_sp` = '".$idofme."'", "#_binhluan");
            // Xóa ảnh con
            $sql_img    = DB_que("SELECT * FROM `#_baiviet_img` WHERE `id_parent` ='".$idofme."'");
            if(mysql_num_rows($sql_img) > 0)
            {
              while($row = mysql_fetch_assoc($sql_img))
              {
                $p_name   = $row['icon'];
                $path_img = $row['duongdantin'];
                @unlink("../datafiles/".$path_img."/".$p_name);
                @unlink("../datafiles/".$path_img."/thumb_".$p_name);
                @unlink("../datafiles/".$path_img."/thumbnew_".$p_name);
              }
              DB_que("DELETE FROM `#_baiviet_img` WHERE `id_parent` = '".$idofme."'", "#_baiviet_img");;
            }
          }
          //
        }else{
          $hinhanh      = UPLOAD_image("upload_$i", "../".$duongdantin."/", time());
          if($hinhanh != false)
          {
            $data['icon'] = $hinhanh;
            if($_POST['anh_sp_'.$i] != ''){
              $anh_sp = explode("x", $_POST['anh_sp_'.$i]);
              $wid    = $anh_sp[0];
              $hig    = $anh_sp[1];
              TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, $wid, $hig, "images/trang_".$wid."_".$hig.".png");
            }
            else{
                TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 500, 500);
            } 
            TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 500, 500);

            $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
            @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
            @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/thumb_".mysql_result($sql_thongtin, 0, "icon"));
            @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/thumbnew_".mysql_result($sql_thongtin, 0, "icon"));
          }
          //end
          ACTION_db($data, $table, 'update', NULL, "`id` = '$idofme' ");
        }
      }
      //update anh voi row = null
      if(isset($_FILES['is_muti_file'])) {
        // 
        foreach($_FILES['is_muti_file']['name'] as $name => $value) {
          if($_FILES['is_muti_file']['name'][$name] == "") continue;

          $uploaddir      = "../$duongdantin/"; 
          $img_real_name  = time()."_".CONVERT_vn($_FILES['is_muti_file']['name'][$name]);  
          $size_img       = isset($_POST["anh_sp_0"]) ? $_POST["anh_sp_0"] : "";

          // check _sp co anh null
          $sql     = DB_que("SELECT * FROM `$table` WHERE `step`='".$step."' AND `icon` = '' LIMIT 1");

          if(mysql_num_rows($sql)) {

            if (move_uploaded_file($_FILES['is_muti_file']['tmp_name'][$name], $uploaddir.$img_real_name)) { 
              if($size_img == ""){
                TAO_anhthumb($uploaddir.$img_real_name,$uploaddir."thumb_".$img_real_name, 500, 500, "images/trang_500_500.png");
              }
              else {
                $anh_sp = explode("x", $size_img);
                $wid = $anh_sp[0];
                $hig = $anh_sp[1];
                TAO_anhthumb($uploaddir.$img_real_name,$uploaddir."thumb_".$img_real_name, $wid, $hig, "images/trang_" . $wid . "_" . $hig . ".png");
              }
            }
          }
          else {
            break;
          }
          $id_x = mysql_result($sql, 0, "id");
          DB_que("UPDATE  `$table` SET `icon` = '$img_real_name' WHERE `id` = '".$id_x."' LIMIT 1", $table);
           
        }
      }
      //
      $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }

    $mo       = '';
    $uri      = '';
    $numview  = 50;

    $s_chude     = isset($_GET['chu-de']) && is_numeric($_GET['chu-de']) ? $_GET['chu-de'] : 0;
    $s_trangthai = isset($_GET['trang-thai']) && is_numeric($_GET['trang-thai']) ? $_GET['trang-thai'] : 0;
    $s_ksearch   = isset($_GET['ksearch']) ? strip_tags(str_replace("+", " ", $_GET['ksearch'])) : "";
    $s_hienthi   = isset($_GET['hien-thi']) && is_numeric($_GET['hien-thi']) ? $_GET['hien-thi'] : 0;
    $js_thuoctinh   = isset($_GET['js_thuoctinh']) && is_numeric($_GET['js_thuoctinh']) ? $_GET['js_thuoctinh'] : 0;

    if($s_hienthi == 1)      $numview = 15;
    else if($s_hienthi == 2) $numview = 30;
    else if($s_hienthi == 3) $numview = 60;
    else if($s_hienthi == 4) $numview = 100;
    else if($s_hienthi == 5) $numview = 200;

    $pz  = 0;
    $pzz = 0;

    if(isset($_GET['pz'])){
      $pz       = $_GET['pz'];
      if($pz    == "" || $pz == 0)  $pzz = 0;
      else $pzz = $pz * $numview;
    }

    if($s_trangthai != 0){
      $sta  = $s_trangthai == 1 ? 1 : 0;
      $mo  .= ' AND `showhi`='.$sta.' ';
      $uri .= '&trang-thai='.$s_trangthai;
    }

    if($js_thuoctinh != 0) {
      if($js_thuoctinh == 1) $mo  .= ' AND `opt` = 1';
      if($js_thuoctinh == 2) $mo  .= ' AND `opt1` = 1';
      if($js_thuoctinh == 3) $mo  .= ' AND `opt2` = 1';
      $uri .= '&js_thuoctinh='.$js_thuoctinh;
    }

    if($s_ksearch != ""){
      $mo  .=  " AND (`tenbaiviet_vi` LIKE '%".$s_ksearch."%' OR `tenbaiviet_en` LIKE '%".$s_ksearch."%')";
      $uri .= '&ksearch='.str_replace(" ", "+", $s_ksearch);
    }

    if($s_chude != 0 ){
      if($id_step == 2) { 
        $lay_all_kietxuat = LAYDANHSACH_idkietxuat($s_chude, $step);
        $mo              .= ' AND (FIND_IN_SET( '.$s_chude.', `id_parent_muti`) <> 0 OR  `id_parent` IN ('.$lay_all_kietxuat.'))  ';
      }
      else{
        $lay_all_kietxuat = LAYDANHSACH_idkietxuat($s_chude, $step);
        $mo              .= ' AND `id_parent` in ('.$lay_all_kietxuat.')';
      }
      
      $uri             .= '&chu-de='.$s_chude;
    }

    $order_by = "";
    if($id_step == 23) {
      $order_by = "`showhi` ASC,";
    }

    $sql     = DB_que("SELECT * FROM `$table` WHERE `step`='".$step."' $mo ORDER BY $order_by `catasort` DESC, `id` DESC LIMIT $pzz,$numview");

    $sql_num = DB_que("SELECT * FROM `$table` WHERE `step`='".$step."' $mo");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);

    $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '$step' LIMIT 1");
    $thongtin_step = mysql_fetch_assoc($thongtin_step);

    $list_danhmuc  = DB_fet("*", "#_danhmuc", "","`id` DESC", "", "arr", 1);
    $list_bv_img   = DB_fet("*", "#_baiviet_img","`the_loai` <> 0",'`id` ASC', '', 'arr'); 
    $members_dang = DB_fet("*","`#_members`","`phanquyen` <> 0","`id` ASC","","arr",1);   
?>
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a onclick="LOAD_sort()" class="cur load_okkk">[SORT]</a> <?php } ?><?=GETNAME_step($step)?></h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý <?=GETNAME_step($step)?></li>
    </ol>
</section>
<script>
  function LOAD_sort(){
    var n_sort = $(".table-danhsach tr").length;
    $(".table-danhsach tr").each(function(index){
      $('td:nth-child(1) input[type="text"]',this).val(n_sort - index);
      $('td:nth-child(1) input[type="text"]',this).trigger('change');
    });
    $(".load_okkk").html("[OK]");
  }
</script>
<form action="" method="post" enctype='multipart/form-data'>
  <?php 
    if(isset($_SESSION['admin'])){
  ?>
  <div style=" padding: 0 20px;">
    <input type="text" name="is_coppy_sl_id" value="0" placeholder="ID coppy">
    <input type="text" name="is_coppy_sl" value="0" placeholder="Số lượng coppy">
    <input type="file" name="is_muti_file[]" multiple="multiple">
  </div>
  <?php } ?>
  <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <?php 
                      $name_list_opti = json_decode($name_list_opti, true);
                    ?>
                    <div class="box-header" style='padding-bottom: 0'>
                        <h3 class="box-title box-title-td pull-right">
                          
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                        <div class="box-tools">
                          <?php include _source."search_baiviet.php" ?>
                        </div>
                    </div>
                    <?php 
                      if(is_file("step/".$id_step."a.php")) include("step/".$id_step."a.php"); 
                    ?>
                    <div class="box-header">
                      <div class="paging_simple_numbers">
                        <ul class="pagination">
                          <?php
                            PHANTRANG_admin($numshow, $url_page."&step=$step&id_step=$id_step", $pz, $uri);
                          ?>
                        </ul>
                      </div>
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div>
                    <div class="dv-show-setting">
                            <?=admin_input_setting(59) ?>
                            <?=admin_input_setting(11) ?>
                            <?=admin_input_setting(43) ?>
                            <?=admin_input_setting(52) ?>
                            <?=admin_input_setting(53) ?>
                            <?=admin_input_setting(38) ?>
                            <?=admin_input_setting(6) ?>
                            <?=admin_input_setting(46) ?>
                            <?=admin_input_setting(39) ?>
                            <?=admin_input_setting(49) ?>
                            <?=admin_input_setting(50) ?>
                            <?=admin_input_setting(51) ?>
                            <?=admin_input_setting(62) ?>
                            <?=admin_input_setting(12) ?>
                            <?=admin_input_setting(63) ?>
                            <div class="clr"></div>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>
