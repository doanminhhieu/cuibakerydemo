<?php
  $table = '#_seo_name';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }
    }
  if(!empty($_POST))
    {
      $data                   = array();
      $data['tenbaiviet_vi']  = @$tenbaiviet_vi;
      $data['tenbaiviet_en']  = @$tenbaiviet_en;
      $data['tenbaiviet_cn']  = @$tenbaiviet_cn;
      $data['tenbaiviet_jp']  = @$tenbaiviet_jp;
      $data['p1_vi']          = @$p1_vi;
      $data['p1_en']          = @$p1_en;
      $data['p1_cn']          = @$p1_cn;
      $data['p1_jp']          = @$p1_jp;
      $data['noidung_vi']     = @$noidung_vi;
      $data['noidung_en']     = @$noidung_en;
      $data['noidung_cn']     = @$noidung_cn;
      $data['noidung_jp']     = @$noidung_jp;
      $data['seo_name']       = @$seo_name;

      $hinhanh        = UPLOAD_image("icon", "../".$duongdantin."/", time());

      if($id > 0){
        $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
        $sql_thongtin = mysql_fetch_assoc($sql_thongtin);
      }
      if($hinhanh != false)
        {
          $data['icon']   = $hinhanh;
          TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 500, 500); 
          if($id > 0 && is_array($sql_thongtin)){
            @unlink("../".$sql_thongtin["duongdantin"]."/".$sql_thongtin["icon"]);
            @unlink("../".$sql_thongtin["duongdantin"]."/thumb_".$sql_thongtin["icon"]);
          }
        }
        if($id == 0){
          $id = ACTION_db($data, $table , 'add', NULL, NULL);
          $_SESSION['show_message_on'] =  "Thêm thông tin khác thành công!";
        }else{
          ACTION_db($data, $table, 'update', NULL, "`id` = '".$id."'");
          $_SESSION['show_message_on'] =  "Cập nhật thông tin khác thành công!";
        }
      // LOCATION_js($url_page . "&edit=" . $id);
      // exit();
    }

  if($id > 0)
  {
    $sql_se       = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
    $sql_se       = mysql_fetch_array($sql_se);
    foreach ($sql_se as $key => $value) {
      ${$key} = SHOW_text($value);
    }

    if($icon != '') {
      $full_icon = "../$duongdantin/$icon";
    }
      
  }
?>

<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a style="cursor: pointer;" onclick="AUTO_dich(this)">[NGÔN NGỮ]</a> <a class="js_okkk" style="cursor: pointer;" onclick="OKKK_by_lh()">[UPDATE]</a> <?php } ?>Quản lý thông tin khác</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý thông tin khác</li>
    </ol>
</section>

<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> thông tin khác
              </h2>
              <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <?php include _source."lang.php" ?>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label>Tên bài viết</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
                </div>
                <?php if(admin_check(@$is_mota)){ ?>
                <div class="form-group">
                  <?=admin_input("is_mota", @$is_mota, "#_seo_name", @$id) ?>
                  <label>Mô tả</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_vi) ? SHOW_text($p1_vi) : ''?>" name="p1_vi" id="p1_vi">
                </div>
                <?php } ?>

                <div class="form-group">
                  <label>Nội dung bài viết</label>
                  <textarea id="noidung_vi" name="noidung_vi" class="paEditor"><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
                </div>
              </div>
              <?php if($lang_nb2){ ?>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên bài viết (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
                </div>
                <?php if(admin_check(@$is_mota)){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_en) ? SHOW_text($p1_en) : ''?>" name="p1_en" id="p1_en">
                </div>
                <?php } ?>

                <div class="form-group">
                  <label>Nội dung bài viết (<?=_lang_nb2_key ?>)</label>
                  <textarea id="noidung_en" name="noidung_en" class="paEditor"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
                </div>
              </div>
              <?php } ?>
              <?php if($lang_nb3){ ?>
              <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  <label>Tên bài viết (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_cn) ? SHOW_text($tenbaiviet_cn) : ''?>" name="tenbaiviet_cn" id="tenbaiviet_cn">
                </div>
                <?php if(admin_check(@$is_mota)){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_cn) ? SHOW_text($p1_cn) : ''?>" name="p1_cn" id="p1_cn">
                </div>
                <?php } ?>

                <div class="form-group">
                  <label>Nội dung bài viết (<?=_lang_nb3_key ?>)</label>
                  <textarea id="noidung_cn" name="noidung_cn" class="paEditor"><?=!empty($noidung_cn) ? SHOW_text($noidung_cn) : ''?></textarea>
                </div>
              </div>
              <?php } ?>
              <?php if($lang_nb4){ ?>
              <div class="tab-pane" id="tab_4">
                <div class="form-group">
                  <label>Tên bài viết (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_jp) ? SHOW_text($tenbaiviet_jp) : ''?>" name="tenbaiviet_jp" id="tenbaiviet_jp">
                </div>
                <?php if(admin_check(@$is_mota)){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_jp) ? SHOW_text($p1_jp) : ''?>" name="p1_jp" id="p1_jp">
                </div>
                <?php } ?>

                <div class="form-group">
                  <label>Nội dung bài viết (<?=_lang_nb4_key ?>)</label>
                  <textarea id="noidung_jp" name="noidung_jp" class="paEditor"><?=!empty($noidung_jp) ? SHOW_text($noidung_jp) : ''?></textarea>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <section class="col-lg-12">
        <div class="box p10">
          <?php if(admin_check(@$is_hinhanh)){ ?>
          <div class="form-group">
            <?=admin_input("is_hinhanh", @$is_hinhanh, "#_seo_name", @$id) ?>
            <?=admin_input_text("is_hinhanh_size", @$is_hinhanh_size, "#_seo_name", @$id) ?>
            <label for="exampleInputFile2">Hình ảnh <?=@$is_hinhanh_size ?></label>
            <div class="dv-anh-chitiet-img-cont">
              <div class="dv-anh-chitiet-img">
                <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
                <input type="file" name="icon" id="input_icon" class="cls_hinhanh" accept="image/*" onchange="pa_previewImg(event, '#img_icon','input_icon');">
                <img src="<?=@$full_icon  ?>" alt="" class="img_chile_dangtin" style="<?php if(!empty($full_icon) && $full_icon != "") echo "display: block"; else echo "display: none" ?>" id="img_icon">
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if(admin_check(@$is_lienket)){ ?>
          <div class="form-group">
            <?=admin_input("is_lienket", @$is_lienket, "#_seo_name", @$id) ?>
            <label>Liên kết <a data-tooltip="Nếu Link đến URL của Web khác thì phải có http:// ở đầu."> </a></label>
            <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? $seo_name : ''?>"> 
          </div>
          <?php } ?>
        </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
      <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
      <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>

<script>
  function checkSubmit(){
    if($("#tenbaiviet_vi").val() == '')
    {
      alert("Hãy nhập tên bài viết!");
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>