<?php
  $table = '#_menu';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? $_GET['edit'] : 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }
      $catasort         = str_replace(".", "", $_REQUEST['catasort']);
      $showhi           = isset($_POST['showhi']) ? 1 : 0;
      $cua_so_moi       = isset($_POST['cua_so_moi']) ? 1 : 0;
       
    }
  if(!empty($_POST))
    {
      $hinhanh                = UPLOAD_image("icon", "../".$duongdantin."/", time());
      $icon_hover                = UPLOAD_image("icon_hover", "../".$duongdantin."/", time());
      $data                   = array();
      $data['catasort']       = is_numeric(@$catasort) ? @$catasort : 0;
      $data['showhi']         = is_numeric(@$showhi) ? @$showhi : 0;
      $data['cua_so_moi']     = is_numeric(@$cua_so_moi) ? @$cua_so_moi : 0;;
      $data['id_parent']      = is_numeric(@$id_parent) ? @$id_parent : 0;
      $data['tenbaiviet_vi']  = @$tenbaiviet_vi;
      $data['tenbaiviet_en']  = @$tenbaiviet_en;
      $data['tenbaiviet_cn']  = @$tenbaiviet_cn;
      $data['tenbaiviet_jp']  = @$tenbaiviet_jp;
      $data['seo_name']       = @$seo_name;
      $data['step']           = is_numeric(@$step) ? @$step : 0;
      $data['danhmuc']        = is_numeric(@$danhmuc) ? @$danhmuc : 0;
      $data['kieu_hien_thi']  = is_numeric(@$kieu_hien_thi) ? @$kieu_hien_thi : 0;
      $data['kieu_chon']      = is_numeric(@$kieu_chon) ? @$kieu_chon : 0;
      $data['duongdantin']    = @$duongdantin;

      if($id > 0){
        $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['edit']."' LIMIT 1");
        $sql_thongtin = mysql_fetch_assoc($sql_thongtin);
      }
      if($hinhanh != false) {
        $data['icon']     = $hinhanh;
        TAO_anhthumb("../" . $duongdantin . "/" . $hinhanh, "../" . $duongdantin . "/thumb_" . $hinhanh, 200, 200);
        if($id > 0 && is_array($sql_thongtin)){
              @unlink("../".$sql_thongtin["duongdantin"]."/".$sql_thongtin["icon"]);
              @unlink("../".$sql_thongtin["duongdantin"]."/thumb_".$sql_thongtin["icon"]);
            //end
          }
        }

      if($icon_hover != false) {
        $data['icon_hover']     = $icon_hover;
        TAO_anhthumb("../" . $duongdantin . "/" . $icon_hover, "../" . $duongdantin . "/thumb_" . $icon_hover, 200, 200);
        if($id > 0 && is_array($sql_thongtin)){
            @unlink("../".$sql_thongtin["duongdantin"]."/".$sql_thongtin["icon_hover"]);
            @unlink("../".$sql_thongtin["duongdantin"]."/thumb_".$sql_thongtin["icon_hover"]);
          }
        }
      
      if($id == 0){
        $id = ACTION_db($data, $table , 'add', NULL,NULL);
        $_SESSION['show_message_on'] =  "Thêm menu thành công!";
        LOCATION_js($url_page."&edit=".$id);
        exit();
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
        $_SESSION['show_message_on'] =  "Cập nhật menu thành công!";
      }
    }

  if($id > 0){
      $sql_se           = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se           = mysql_fetch_array($sql_se);
      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }
      $catasort         = number_format($catasort,0,',','.');
      if ($icon != '') {
        $full_icon  = $fullpath."/".$duongdantin."/".$icon;
      }
      if ($icon_hover != '') {
          $full_icon_hover    = $fullpath."/".$duongdantin."/".$icon_hover;
      }
    }
  else 
    {
      $catasort   = layCatasort($table);
      $catasort   = number_format(SHOW_text($catasort),0,',','.');
    }
?>
<style>
  .nhom_module_menu_hide{display: none !important}
</style>
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a style="cursor: pointer;" onclick="AUTO_dich(this)">[NGÔN NGỮ]</a><?php } ?>Thiết lập menu</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Thiết lập menu</li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> menu
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <?php include _source."lang.php" ?>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label>Tên menu</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
                </div>
              </div>
              <?php if($lang_nb2){ ?>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên menu (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
                </div>
              </div>
              <?php } ?>
              <?php if($lang_nb3){ ?>
              <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  <label>Tên menu (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_cn) ? SHOW_text($tenbaiviet_cn) : ''?>" name="tenbaiviet_cn" id="tenbaiviet_cn">
                </div>
              </div>
              <?php } ?>
              <?php if($lang_nb4){ ?>
              <div class="tab-pane" id="tab_4">
                <div class="form-group">
                  <label>Tên menu (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_jp) ? SHOW_text($tenbaiviet_jp) : ''?>" name="tenbaiviet_jp" id="tenbaiviet_jp">
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <section class="col-lg-12">
        <div class="box p10">
          <div class="form-group">
            <label>Loại menu</label>
            <?=LAY_menu(@$id_parent, 'id_parent', 'form-control', 0, $id_step, $id, 'true') ?>
          </div>
          <div class="form-group">
            <label>Số thứ tự</label>
            <input type="text" class="form-control" name="catasort" id="catasort" value="<?=SHOW_text($catasort)?>" onkeyup="SetCurrency(this)">
          </div>
          <div class="form-group">
            <label class="mr-20 checkbox-mini noweight">
              <input class="minimal auto_menu_lienket" type="radio" name="kieu_chon" value="0" <?=!isset($kieu_chon) || $kieu_chon == 0 ? 'checked="checked"' : '' ?>> Nhập liên kết
            </label>
            <label class="mr-20 checkbox-mini noweight">
              <input class="minimal auto_menu_module" type="radio" name="kieu_chon" value="1" <?=isset($kieu_chon) && $kieu_chon == 1 ? 'checked="checked"' : '' ?>> Chọn module
            </label>
          </div>

          <div class="form-group form-group-none nhom_lienket">
            <label>Liên kết <a data-tooltip="Nếu Link đến URL của Web khác thì phải có http:// ở đầu."> </a></label>
            <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? SHOW_text($seo_name) : ''?>">
          </div>
          <div class="form-group form-group-none nhom_module_menu">
            <label>Module <a data-tooltip="Lấy liên kết theo module chọn."> </a></label>
            <select name="step" class="form-control" onchange="LOAD_danhmuc_mn(this)">
              <option value="0">Chọn module</option>
              <?php 
                $loaibanner = DB_que('SELECT * FROM `#_step` WHERE `showhi` = 1 ORDER BY `catasort` ASC');
                while($r    = mysql_fetch_array($loaibanner))
                  {
                    echo '<option value="'.$r['id'].'" '.LAY_selected($r['id'], $step).'>'.$r['tenbaiviet_vi'].'</option>';
                  }
              ?>
            </select>
          </div>
          <!-- danh muc -->
          <?php if(admin_check(@$thongtin['menu_danhmuc'])){ ?>
          <div class="form-group form-group-none nhom_module_menu" >
            <?=admin_input("menu_danhmuc", @$thongtin['menu_danhmuc'], "#_seo", 1) ?>

            <label>Danh mục <a data-tooltip="Lấy liên kết theo danh mục chọn."> </a></label>
            <select name="danhmuc" class="form-control form-control-dm-menu" >
              <option value="0">Chọn danh mục</option>
              <?php 
                if(!empty($step) && $step != 0){
                    $chude_arr  = DB_fet("*","#_danhmuc", "`showhi` = '1' AND `step` = ".$step."", "`catasort` ASC","", "arr");
                    foreach ($chude_arr as $row_1)
                          {   
                            if($row_1['id_parent'] != 0) continue;
                              echo  '<option value="'.$row_1['id'].'" '.LAY_selected($row_1['id'], @$danhmuc).'>'.$row_1['tenbaiviet_vi'].'</option> ';
                              foreach ($chude_arr as $row_2) 
                              { 
                                if($row_2['id_parent'] != $row_1['id']) continue; 
                                  echo  '<option value="'.$row_2['id'].'" '.LAY_selected($row_2['id'], @$danhmuc).'>╚═►'.$row_2['tenbaiviet_vi'].'</option> ';
                                  foreach ($chude_arr as $row_3)
                                  { 
                                    if($row_3['id_parent'] != $row_2['id']) continue;
                                      echo  '<option value="'.$row_3['id'].'" '.LAY_selected($row_3['id'], @$danhmuc).'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_3['tenbaiviet_vi'].'</option> ';
                                      foreach ($chude_arr as $row_4) 
                                      { 
                                        if($row_4['id_parent'] != $row_3['id']) continue;
                                      echo  '<option value="'.$row_4['id'].'" '.LAY_selected($row_4['id'], @$danhmuc).'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_4['tenbaiviet_vi'].'</option> ';

                                }
                            }
                        }
                    }
                  }
                else if(!empty($step) && $step != -1){
                    $baiviet_arr  = DB_fet("*","#_baiviet", "`showhi` = '1' AND `step` = 0", "`catasort` DESC","", "arr");
                    foreach ($baiviet_arr as $row_1)
                      {
                        echo  '<option value="'.$row_1['id'].'" '.LAY_selected($row_1['id'], @$danhmuc).'>'.$row_1['tenbaiviet_vi'].'</option> ';
                      }
                }
              ?>
            </select>
          </div>
          <?php } ?>
          <!-- end  -->
          <!-- kieu hien thi -->
          <?php if(admin_check(@$thongtin['menu_kieuhienthi'])){ ?>
          <div class="form-group form-group-none nhom_module_menu">
            <?=admin_input("menu_kieuhienthi", @$thongtin['menu_kieuhienthi'], "#_seo", 1) ?>

            <label>Kiểu hiển thị <a data-tooltip="Tư động hiển thị các cấp con của danh mục hoặc danh sách bài viết của danh mục."> </a></label>
            <select name="kieu_hien_thi" class="form-control">
              <option value="0" <?=LAY_selected(0, @$kieu_hien_thi) ?>>Chọn kiểu hiển thị</option>
              <option value="1" <?=LAY_selected(1, @$kieu_hien_thi) ?>>Tự động theo danh mục</option>
              <option value="3" <?=LAY_selected(3, @$kieu_hien_thi) ?>>Tự động theo danh mục ngang</option>
              <option value="2" <?=LAY_selected(2, @$kieu_hien_thi) ?>>Tự động theo bài viết</option>
            </select>
          </div>
          <?php } ?>
          <!-- hinh anh -->
          <?php if(admin_check(@$thongtin['menu_hinhanh'])){ ?>
          <div class="form-group">
            <?=admin_input("menu_hinhanh", @$thongtin['menu_hinhanh'], "#_seo", 1) ?>
            <?=admin_input_text("menu_hinhanh_size", @$thongtin['menu_hinhanh_size'], "#_seo", 1) ?>
            <label for="exampleInputFile">
              Hình đại diện <?=$thongtin['menu_hinhanh_size'] ?>
            </label>
            <div class="dv-anh-chitiet-img-cont">
              <div class="dv-anh-chitiet-img">
                <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
                <input type="file" name="icon" id="input_icon" class="cls_hinhanh" accept="image/*" onchange="pa_previewImg(event, '#img_icon','input_icon');">
                <img src="<?=@$full_icon  ?>" alt="" class="img_chile_dangtin" style="<?php if(!empty($full_icon) && $full_icon != "") echo "display: block"; else echo "display: none" ?>" id="img_icon">
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- end -->
          <!-- hinh anh hv-->
          <?php if(admin_check(@$thongtin['menu_hinhanh_hv'])){ ?>
          <div class="form-group">
            <?=admin_input("menu_hinhanh_hv", @$thongtin['menu_hinhanh_hv'], "#_seo", 1) ?>
            <label for="exampleInputFile">
              Hình thay đổi <?=$thongtin['menu_hinhanh_size'] ?>
            </label>
            <div class="dv-anh-chitiet-img-cont">
              <div class="dv-anh-chitiet-img">
                <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
                <input type="file" name="icon_hover" id="input_icon_icon_hover" class="cls_hinhanh" accept="image/*" onchange="pa_previewImg(event, '#icon_hover','input_icon_icon_hover');">
                <img src="<?=@$full_icon_hover  ?>" alt="" class="img_chile_dangtin" style="<?php if(!empty($full_icon_hover) && $full_icon_hover != "") echo "display: block"; else echo "display: none" ?>" id="icon_hover">
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- end -->
          <div class="form-group">
            <label class="mr-20 checkbox-mini noweight" style="display: block; margin-bottom: 10px">
              <input type="checkbox" name="cua_so_moi" class="minimal" <?=isset($cua_so_moi) && $cua_so_moi == 1 ? 'checked="checked"' : '' ?>> Hiển thị cửa sổ mới
            </label>
            <label class="mr-20 checkbox-mini noweight">
              <input type="checkbox" name="showhi" class="minimal" <?=isset($showhi) && $showhi == 0 ? '' : 'checked="checked"' ?>> Hiển thị
            </label>
          </div>
        </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
      <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
      <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
      <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>

<script>
  function checkSubmit(){
    if($("#tenbaiviet_vi").val() == '')
    {
      alert("Hãy nhập tên menu!");
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>