<?php
  if(!isset($_GET['edit']) && !isset($_SESSION['admin'])) LOCATION_js("index.php");
  $id = isset($_GET['edit']) && is_numeric($_GET['edit']) ? $_GET['edit'] : 0;
  $table      = '#_step';

  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      
      foreach ($_POST as $key => $value) {
        ${$key}           = $value;
      }
      $catasort           = str_replace(".", "", $_REQUEST['catasort']);

      $seo_title_vi       = @LAY_uutien($seo_title_vi, $tenbaiviet_vi);
      $seo_title_en       = @LAY_uutien($seo_title_en, $tenbaiviet_en);
      $seo_title_cn       = @LAY_uutien($seo_title_cn, $tenbaiviet_cn);
      $seo_title_jp       = @LAY_uutien($seo_title_cn, $tenbaiviet_jp);
      $seo_description_vi = @LAY_uutien($seo_description_vi, $tenbaiviet_vi);
      $seo_description_en = @LAY_uutien($seo_description_en, $tenbaiviet_en);
      $seo_description_cn = @LAY_uutien($seo_description_cn, $tenbaiviet_cn);
      $seo_description_jp = @LAY_uutien($seo_description_cn, $tenbaiviet_jp);
      $seo_keywords_vi    = @LAY_uutien($seo_keywords_vi, $tenbaiviet_vi);
      $seo_keywords_en    = @LAY_uutien($seo_keywords_en, $tenbaiviet_en);
      $seo_keywords_cn    = @LAY_uutien($seo_keywords_cn, $tenbaiviet_cn);
      $seo_keywords_jp    = @LAY_uutien($seo_keywords_cn, $tenbaiviet_jp);

      $num_view           = str_replace(".", "", $num_view);
      $step = isset($_POST['step']) ? $_POST['step'] : "";
    }

    if(!empty($_POST))
      {
        $seo_name                     = LAY_uutien($seo_name, $tenbaiviet_vi);
        
        $hinhanh                      = UPLOAD_image("icon", "../".$duongdantin."/", time());
        $_POST['ngaydang']             = time();
        $_POST['duongdantin']          = $duongdantin;
        $_POST['seo_title_vi']         = $seo_title_vi;
        $_POST['seo_title_en']         = $seo_title_en;
        $_POST['seo_title_cn']         = $seo_title_cn;
        $_POST['seo_title_jp']         = $seo_title_jp;
        $_POST['seo_description_vi']   = $seo_description_vi;
        $_POST['seo_description_en']   = $seo_description_en;
        $_POST['seo_description_cn']   = $seo_description_cn;
        $_POST['seo_description_jp']   = $seo_description_jp;
        $_POST['seo_keywords_vi']      = $seo_keywords_vi;
        $_POST['seo_keywords_en']      = $seo_keywords_en;
        $_POST['seo_keywords_cn']      = $seo_keywords_cn;
        $_POST['seo_keywords_jp']      = $seo_keywords_jp;

        $_POST['catasort']             = $catasort;
        $_POST['num_view']             = $num_view;

        if($step != null){
          $_POST['step']               = $step;
        }

        if($id > 0) {
          $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
          $sql_thongtin = mysql_fetch_assoc($sql_thongtin);
        }

        if($hinhanh != false)
          {
            $_POST['icon']             = $hinhanh;
            TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 500, 500);
            if($id > 0 AND is_array($sql_thongtin)){
              @unlink("../".$sql_thongtin["duongdantin"]."/".$sql_thongtin["icon"]);
              @unlink("../".$sql_thongtin["duongdantin"]."/thumb_".$sql_thongtin["icon"]);
            }
          }
        if($id == 0){
          $id                           = ACTION_db($_POST, $table , 'add', array("themmoi"),NULL);
          $_SESSION['show_message_on'] =  "Thêm module thành công!";
          THEM_seoname($id, $seo_name, $table, $id, "0");
          LOCATION_js($url_page."&edit=".$id);
          exit();
        }else{
          ACTION_db($_POST, $table, 'update', array("themmoi"), "`id` = ".$id);
          $_SESSION['show_message_on'] =  "Cập nhật module thành công!";
          THEM_seoname($id, $seo_name, $table, $id, "1");
          
        }
        
      }
  if($id > 0)
    {
      $sql_se             = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se             = mysql_fetch_array($sql_se);
      foreach ($sql_se as $key => $value) {
        ${$key} = SHOW_text($value);
      }

      $catasort           = number_format($catasort,0,',','.');
      $num_view           = number_format($num_view,0,',','.');
      if ($icon != '') {
        $full_icon  = $fullpath."/".$duongdantin."/".$icon;
      }
 

    }
    else 
    {
      $step       = 1;
      $catasort   = layCatasort($table);
      $catasort   = number_format(SHOW_text($catasort),0,',','.');
    }
?>
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a style="cursor: pointer;" onclick="AUTO_dich(this)">[NGÔN NGỮ]</a> <a class="js_okkk" style="cursor: pointer;" onclick="OKKK_by_lh()">[UPDATE]</a> <?php } ?>Main module</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý main module</li>
    </ol>
</section>

<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> <?=!empty($tenbaiviet_vi) ? 'Sửa' : 'Thêm' ?> main module
              </h2>
              <h3 class="box-title box-title-td pull-right">
                  <button onclick="return CHECK_sb()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                  <?php
                    if(isset($_SESSION['admin'])) echo '<a href="?module='.$module.'&action='.$action.'&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</a>';
                  ?>
                  <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
              </h3>
          </div>
          <div class="nav-tabs-custom">
            <?php include _source."lang.php" ?>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label>Tên module</label>
                  <input type="text" class="form-control cls_ms" message="Bạn chưa nhập tên module!" value="<?=!empty($tenbaiviet_vi) ? SHOW_text($tenbaiviet_vi) : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
                </div>

                <!-- <div class="form-group">
                  <label>Tên hiển thị</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_vi) ? SHOW_text($p1_vi) : ''?>" name="p1_vi" id="p1_vi">
                </div> -->

                <?php if(CHECK_key_setting("main-menu-mo-ta")){ ?>
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea id="p3_vi" name="p3_vi" class="paEditor"><?=!empty($p3_vi) ? SHOW_text($p3_vi) : ''?></textarea>
                </div>
                <!-- <div class="form-group">
                  <label>Nội dung</label>
                  <textarea id="noidung_vi" name="noidung_vi" class="paEditor"><?=!empty($noidung_vi) ? SHOW_text($noidung_vi) : ''?></textarea>
                </div> -->
                <?php } ?>


                <div class="form-group">
                  <label>Seo Title</label>
                  <input type="text" class="form-control" name="seo_title_vi" value="<?=!empty($seo_title_vi) ? Show_text($seo_title_vi) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo Description</label>
                  <input type="text" class="form-control" name="seo_description_vi" value="<?=(!empty($seo_description_vi)) ? Show_text($seo_description_vi) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo keywords</label>
                  <input type="text" class="form-control" name="seo_keywords_vi" value="<?=!empty($seo_keywords_vi) ? Show_text($seo_keywords_vi) : "" ?>">
                </div>
              </div>
              <?php if($lang_nb2){ ?>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên module (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control " message="Bạn chưa nhập Tên module (<?=_lang_nb2_key ?>)!" value="<?=!empty($tenbaiviet_en) ? SHOW_text($tenbaiviet_en) : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
                </div>

                <!-- <div class="form-group">
                  <label>Tên hiển thị (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_en) ? SHOW_text($p1_en) : ''?>" name="p1_en" id="p1_en">
                </div> -->
                <?php if(CHECK_key_setting("main-menu-mo-ta")){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb2_key ?>)</label>
                  <textarea id="p3_en" name="p3_en" class="paEditor"><?=!empty($p3_en) ? SHOW_text($p3_en) : ''?></textarea>
                </div>
                <!-- <div class="form-group">
                  <label>Nội dung (<?=_lang_nb2_key ?>)</label>
                  <textarea id="noidung_en" name="noidung_en" class="paEditor"><?=!empty($noidung_en) ? SHOW_text($noidung_en) : ''?></textarea>
                </div> -->
                <?php } ?>

                <div class="form-group">
                  <label>Seo Title (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" name="seo_title_en" value="<?=!empty($seo_title_en) ? Show_text($seo_title_en) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo Description (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" name="seo_description_en" value="<?=!empty($seo_description_en) ? Show_text($seo_description_en) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo keywords (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" name="seo_keywords_en" value="<?=!empty($seo_keywords_en) ? Show_text($seo_keywords_en) : "" ?>">
                </div>
              </div>
              <?php } ?>
              <?php if($lang_nb3){ ?>
              <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  <label>Tên module (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control " message="Bạn chưa nhập Tên module (<?=_lang_nb3_key ?>)!" value="<?=!empty($tenbaiviet_cn) ? SHOW_text($tenbaiviet_cn) : ''?>" name="tenbaiviet_cn" id="tenbaiviet_cn">
                </div>

                <!-- <div class="form-group">
                  <label>Tên hiển thị (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_cn) ? SHOW_text($p1_cn) : ''?>" name="p1_cn" id="p1_cn">
                </div> -->
                <?php if(CHECK_key_setting("main-menu-mo-ta")){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb3_key ?>)</label>
                  <textarea id="p3_cn" name="p3_cn" class="paEditor"><?=!empty($p3_cn) ? SHOW_text($p3_cn) : ''?></textarea>
                </div>
                <div class="form-group">
                  <label>Nội dung (<?=_lang_nb3_key ?>)</label>
                  <textarea id="noidung_cn" name="noidung_cn" class="paEditor"><?=!empty($noidung_cn) ? SHOW_text($noidung_cn) : ''?></textarea>
                </div>
                <?php } ?>

                <div class="form-group">
                  <label>Seo Title (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" name="seo_title_cn" value="<?=!empty($seo_title_cn) ? Show_text($seo_title_cn) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo Description (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" name="seo_description_cn" value="<?=!empty($seo_description_cn) ? Show_text($seo_description_cn) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo keywords (<?=_lang_nb3_key ?>)</label>
                  <input type="text" class="form-control" name="seo_keywords_cn" value="<?=!empty($seo_keywords_cn) ? Show_text($seo_keywords_cn) : "" ?>">
                </div>
              </div>
              <?php } ?>
              <?php if($lang_nb4){ ?>
              <div class="tab-pane" id="tab_4">
                <div class="form-group">
                  <label>Tên module (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control " message="Bạn chưa nhập Tên module (<?=_lang_nb4_key ?>)!" value="<?=!empty($tenbaiviet_jp) ? SHOW_text($tenbaiviet_jp) : ''?>" name="tenbaiviet_jp" id="tenbaiviet_jp">
                </div>

                <!-- <div class="form-group">
                  <label>Tên hiển thị (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($p1_jp) ? SHOW_text($p1_jp) : ''?>" name="p1_jp" id="p1_jp">
                </div> -->
                <?php if(CHECK_key_setting("main-menu-mo-ta")){ ?>
                <div class="form-group">
                  <label>Mô tả (<?=_lang_nb4_key ?>)</label>
                  <textarea id="p3_jp" name="p3_jp" class="paEditor"><?=!empty($p3_jp) ? SHOW_text($p3_jp) : ''?></textarea>
                </div>
                <?php } ?>
                <div class="form-group">
                  <label>Nội dung (<?=_lang_nb4_key ?>)</label>
                  <textarea id="noidung_jp" name="noidung_jp" class="paEditor"><?=!empty($noidung_jp) ? SHOW_text($noidung_jp) : ''?></textarea>
                </div>

                <div class="form-group">
                  <label>Seo Title (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" name="seo_title_jp" value="<?=!empty($seo_title_jp) ? Show_text($seo_title_jp) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo Description (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" name="seo_description_jp" value="<?=!empty($seo_description_jp) ? Show_text($seo_description_jp) : "" ?>">
                </div>

                <div class="form-group">
                  <label>Seo keywords (<?=_lang_nb4_key ?>)</label>
                  <input type="text" class="form-control" name="seo_keywords_jp" value="<?=!empty($seo_keywords_jp) ? Show_text($seo_keywords_jp) : "" ?>">
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
            <label>Seo name <a data-tooltip="Đường dẫn chuẩn bao gồm các ký tự [a-zA-Z0-9-]."> </a></label>
            <input type="text" class="form-control" name="seo_name" id="seo_name" value="<?=!empty($seo_name) ? Show_text($seo_name) : "" ?>">
            <label class="noweight noweight-top checkbox-mini">
              <input class="minimal auto_get_link" type="checkbox" <?=empty($id) || $id == 0 ? 'checked="checked"' : '' ?>> Lấy đường dẫn tự động
            </label>
          </div>

          <div class="form-group">
            <label for="exampleInputFile2">Ảnh đại diện <?=!empty($thongtin_step['size_img']) && $thongtin_step['size_img'] != '' ? "(".str_replace("x", "px x ", $thongtin_step['size_img'])."px)" : '' ?></label>
            <div class="dv-anh-chitiet-img-cont">
              <div class="dv-anh-chitiet-img">
                <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
                <input type="file" name="icon" id="input_icon" class="cls_hinhanh" accept="image/*" onchange="pa_previewImg(event, '#img_icon','input_icon');">
                <img src="<?=@$full_icon  ?>" alt="" class="img_chile_dangtin" style="<?php if(!empty($full_icon) && $full_icon != "") echo "display: block"; else echo "display: none" ?>" id="img_icon">
              </div>
            </div>
          </div>

          <?php
            if($step == 5)
            {
          ?>
              <div class="form-group">
                <label>Google map</label>
                <input type="text" class="form-control" name="map_google" id="map_google" value="<?=!empty($map_google) ? SHOW_text($map_google) : ''?>">
              </div>
          <?php
            }
          ?>
          
          <?php if(isset($_SESSION['admin'])){  ?>
          <div class="form-group">
            <label>Kiểu hiển thị</label>
            <?=DANHSACH_page(@$step, 'step', 'form-control', 0) ?>
          </div>
          <?php } ?>

          <div class="form-group">
            <label>Số lượng bài viết hiển thị trên 1 trang</label>
            <input type="text" class="form-control" name="num_view" value="<?=!empty($num_view) ? SHOW_text($num_view) : "0"?>" onkeyup="SetCurrency(this)">
          </div>

          <div class="form-group">
            <label>Số thứ tự</label>
            <input type="text" class="form-control" name="catasort" id="catasort" value="<?=!empty($catasort) ? SHOW_text($catasort) : "0"?>" onkeyup="SetCurrency(this)">
          </div>

          <div class="form-group">
            <label class="mr-20">
              <input type="radio" name="showhi" value="1" <?=!empty($showhi) ? LAY_checked($showhi, 1) : 'checked' ?>> Hiện thị
            </label>
            <label>
              <input type="radio" name="showhi" value="2" <?=!empty($showhi) ? LAY_checked($showhi, 2) : '' ?>> Ẩn
            </label>
          </div>
        </div>
      </section>
    </div>
  </section>

  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
      <button onclick="return CHECK_sb()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
      <?php
        if(isset($_SESSION['admin'])) echo '<a href="?module='.$module.'&action='.$action.'&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</a>';
      ?>
      <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>