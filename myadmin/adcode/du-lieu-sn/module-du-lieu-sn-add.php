<?php
 
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }
      $catasort           = str_replace(".", "", $_REQUEST['catasort']);
      $showhi             = isset($_POST['showhi']) ? 1 : 0; 
      
      $spchon = "";
      foreach ($_POST['spchon'] as $key) {
        $check_key = explode(",", $spchon);
        if(in_array($key, $check_key)) continue;
        $spchon .= $spchon == "" ? $key : ",".$key ;
      }
    }


  if(!empty($_POST))
    {

      $data                    = array(); 
      $data['tenbaiviet_vi']   = @$tenbaiviet_vi;
      $data['tenbaiviet_en']   = @$tenbaiviet_en;
      $data['mota_vi']         = @$mota_vi;
      $data['mota_en']         = @$mota_en;
      $data['catasort']        = is_numeric($catasort) ? $catasort : 0;
      $data['showhi']          = is_numeric($showhi) ? $showhi : 0;
      $data['id_parent']       = is_numeric($id_parent) ? $id_parent : 0;
      $data['seo_name']        = @$seo_name;
      $data['blank']           = @$blank;
      $data['val_1']           = @$val_1;
      $data['val_2']           = @$val_2;
      $data['spchon']          = @$spchon;

      if($id == 0){
        $id                           = ACTION_db($data, $table , 'add',NULL,NULL);
        $_SESSION['show_message_on']  =  "Thêm dữ liệu thành công!";
      }else{
        ACTION_db($data, $table, 'update', NULL, "`id` = ".$id);
        $_SESSION['show_message_on'] =  "Cập nhật dữ liệu thành công!";
      }
      LOCATION_js($url_page."&edit=".$id);
      exit();
    }
 
    
  if($id > 0)
    {
      $sql_se             = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se             = mysql_fetch_array($sql_se);

      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }
    }
    else 
    {
      $catasort   = layCatasort($table);
      $catasort   = number_format(SHOW_text($catasort),0,',','.');
    }
?>

<section class="content-header">
  <h1><?php if(isset($_SESSION['admin'])){ ?><a style="cursor: pointer;" onclick="AUTO_dich(this)">[NGÔN NGỮ]</a> <a class="js_okkk" style="cursor: pointer;" onclick="OKKK_by_lh()">[UPDATE] </a> <?php } ?><?=$full_name ?></h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active"><?=$full_name ?></li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i><?=$id > 0 ? 'Sửa' : 'Thêm mới' ?>
            </h2>
            <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
            </h3>
          </div>
        </div>
      </section>
      <section class="col-lg-12">
        <div class="nav-tabs-custom" style="margin-bottom: 0;">
          <?php include _source."lang.php" ?>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
              </div>
            </div>
            <?php if($lang_nb2){ ?>
            <div class="tab-pane" id="tab_2">
              <div class="form-group">
                <label>Tiêu đề (<?=_lang_nb2_key ?>)</label>
                <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="box p10">
          <div class="form-group" style="display: none">
            <label>Số điện thoại</a></label>
            <input type="text" class="form-control" name="val_1" id="val_1" value="<?=!empty($val_1) ? Show_text($val_1) : "" ?>">
          </div>
          <div class="form-group" style="display: none">
            <label>Toạ độ Google <a data-tooltip="Tọa độ google lấy từ https://www.google.com/maps/, ví dụ tọa độ: 10.780725, 106.686722"> </a></label>
            <input type="text" class="form-control" name="val_2" id="val_2" value="<?=!empty($val_2) ? Show_text($val_2) : "" ?>">
          </div>
          <div class="form-group" style="display: none">
            <label>Seo name <a data-tooltip="Đường dẫn chuẩn bao gồm các ký tự [a-zA-Z0-9-]."> </a></label>
            <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? Show_text($seo_name) : "" ?>">
          </div>
          <div class="form-group" style="display: none">
              <label>Target</label>
              <select name="blank" id="blank" class="form-control">
                  <option value="" <?=LAY_selected(@$blank, "") ?>>Mặc định </option>
                  <option value="_blank" <?=LAY_selected(@$blank, "_blank") ?>>Cửa sổ mới</option>
              </select>
          </div>
          <div class="form-group">
              <label>Thuộc nhóm</label>
              <select name="id_parent" id="id_parent" class="form-control">
                  <<option value="-2" <?=!empty($id_parent) && $id_parent == -2 ? 'selected="selected"' : ""; ?>>Sản phẩm</option>
                  <<option value="-1" <?=!empty($id_parent) && $id_parent == -1 ? 'selected="selected"' : ""; ?>>Video nỗi bật</option>
                  <<option value="-3" <?=!empty($id_parent) && $id_parent == -3 ? 'selected="selected"' : ""; ?>>Khách hàng</option>
                  <?php
                  $list_array = DB_fet("*", "#_danhmuc", "`step` = 1 AND `id_parent` = 0", "`catasort` ASC", "", "arr");
                  foreach ($list_array as $val) {
                      echo '<option value="' . $val['id'] . '" ' . (($id_parent == $val['id']) ? 'selected="selected"' : '') . '>' . $val['tenbaiviet_vi'] . '</option>';
                  }
                  ?>
              </select>
          </div>
          <?php
            if(!empty($id_parent) && ($id_parent > 0 || $id_parent == -2)){
          ?>
          <style>
            .dvjs-nd-sp-chon li + li { border-top: 1px dashed #ccc; padding-top: 6px; margin-top: 6px; }
            .dvjs-nd-sp-chon li { list-style: none; font-size: 12px; }
            .dvjs-nd-sp-chon li a { position: absolute; left: 0; }
            .dvjs-nd-sp-chon li { list-style: none; padding-left: 38px; position: relative; }
            .dvjs-nd-sp-chon { max-height: 300px; overflow-y: auto; margin-top: 8px; }
            ul.js_load_sp { border: 1px solid #ccc; margin-top: -1px; max-height: 200px; overflow-y: auto; padding: 0; }
            ul.js_load_sp a { display: none; }
            ul.js_load_sp a.cur.add { display: inline-block; margin-left: 7px; }
            ul.js_load_sp li { list-style: none; border-bottom: 1px dashed #ccc; padding: 6px 10px; font-size: 12px; }
            .dvjs-nd-sp-chon li a.cur.add { display: none; }
          </style>
          <div class="form-group">
            <label>Chọn sản phẩm</label>
            <input type="text" placeholder="Nhập sản phẩm tìm kiếm" class="form-control" onkeyup="js_timsanpham(this)">
            <ul class="js_load_sp" style="display: none"></ul>
            <div class="dvjs-nd-sp-chon">
              <?php
                if(!empty($spchon) && $spchon != ""){
                  $baiviet = LAY_baiviet(1,0,"`id` IN ($spchon)");
                  foreach ($baiviet as $rows) {
                    echo '<li> <a class="cur" onclick="js_xoa_chon(this)">[Xóa]</a> '.SHOW_text($rows['tenbaiviet_vi']).' <input type="hidden" name="spchon[]" value="'.$rows['id'].'"> <a class="cur add" onclick="js_add_chon(this)">[Thêm sản phẩm]</a></li>';
                  }
                }
              ?>
            </div>
          </div>
          <script>
            function js_timsanpham(obj) {
              $(".js_load_sp").html("");
              $(".js_load_sp").hide();
              $.ajax({
                  type: "POST",
                  url: "index.php",
                  data: {"key": $(obj).val(), "apos": "js_timsanpham"},
                  success: function (response) {
                    if(response != "") {
                      $(".js_load_sp").html(response);
                      $(".js_load_sp").show();
                    }
                    
                  }
              });
            }
            function js_add_chon(obj) {
              $(".dvjs-nd-sp-chon").append("<li>"+$(obj).parent().html()+"</li>");
              $(obj).parent().remove();
            }
            function js_xoa_chon(obj){
              $(obj).parent().remove();
            }
          </script>
          <?php } ?>
          <!-- <div class="form-group">
              <label>Option thuộc</label>
              <select name="id_parent" id="id_parent" class="form-control">
                  <?php if ((isset($id_parent) && $id_parent == 0) || isset($_SESSION['admin'])) { ?>
                      <option value="0">Chọn chủ đề con</option>
                  <?php } ?>
                  <?php
                  $list_array = DB_fet("*", $table, "", "`catasort` ASC", "", "arr");
                  foreach ($list_array as $val) {
                      if ($val['id_parent'] != 0) continue;
                      echo '<option value="' . $val['id'] . '" ' . (($id_parent == $val['id']) ? 'selected="selected"' : '') . ' ' . (($id == $val['id']) ? 'disabled="disabled"' : '') . '>' . $val['tenbaiviet_vi'] . '</option>';
                      foreach ($list_array as $val_2) {
                          if ($val_2['id_parent'] != $val['id']) continue;
                          echo '<option  value="' . $val_2['id'] . '">╚═► ' . $val_2['tenbaiviet_vi'] . '</option>';
                          foreach ($list_array as $val_3) {
                            if ($val_3['id_parent'] != $val_2['id']) continue;
                            echo '<option disabled="disabled" value="' . $val_3['id'] . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╚═► ' . $val_3['tenbaiviet_vi'] . '</option>';
                        }
                      }
                  }
                  ?>
              </select>
          </div> -->
          <div class="form-group">
            <label>Số thứ tự</label>
            <input type="text" class="form-control" name="catasort" id="catasort" value="<?=SHOW_text($catasort)?>" onkeyup="SetCurrency(this)">
          </div>
          <div class="form-group">
            <label class="mr-20 checkbox-mini">
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
      $("#tenbaiviet_vi").focus();
      return false;
    }
  }
</script>