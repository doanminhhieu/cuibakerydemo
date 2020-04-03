<?php
  if($_SESSION['phanquyen'] != 1)
  {
    LOCATION_js("index.php");
    exit();
  }
  if(isset($_GET['upload']) && (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-main-menu-upload.php";
  }
  else if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-main-menu-add.php";
  }
  else{
    $table      = '#_step';
    $table_slug = str_replace("#_", "", $table);
    if(isset($_GET['del']) && isset($_GET['catalogid']) && isset($_SESSION['admin']))
      {
        $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 
        if(mysql_num_rows($sql_se) > 0){
          $sql_se = mysql_fetch_assoc($sql_se);

          $del_name = $sql_se['tenbaiviet_vi'];
          @unlink("../".$sql_se['duongdantin']."/".$sql_se['icon']);
          @unlink("../".$sql_se['duongdantin']."/thumb_".$sql_se['icon']);

          DB_que("DELETE FROM $table WHERE `id` ='".@$_GET['catalogid']."' LIMIT 1", $table);
          DB_que("DELETE FROM `#_slug` WHERE `bang` = '$table_slug' AND `id_bang` = ".$_GET['catalogid']." LIMIT 1", "#_slug");
          $_SESSION['show_message_on'] = 'Đã xóa [<strong>'.$del_name.'</strong>] thành công!';

        }
        
        else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
        LOCATION_js($url_page);
        exit();
      }

    if(isset($_REQUEST['addgiatri']) AND $_REQUEST['maxvalu'])
      {
        for($i=0; $i < $_REQUEST['maxvalu']; $i++)
          {
            $idofme     = @$_POST["idme$i"];

            $add_admin = "";
            if(isset($_SESSION['admin'])){
              $size_img   = @$_POST["size_img$i"];
              $add_admin .= " `size_img` = '$size_img'";

              $size_img_dm   = @$_POST["size_img_dm$i"];
              $add_admin    .= ", `size_img_dm` = '$size_img_dm'";
              DB_que("UPDATE `$table` SET  $add_admin WHERE `id`='$idofme' LIMIT 1", $table);
            }

        	$hinhanh     = UPLOAD_image("upload_$i", "../".$duongdantin."/", time());
        	$data 		 = array();
            if($hinhanh != false)
              {
                $data['icon'] = $hinhanh;
                TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 500, 500);

                $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
                $sql_thongtin = mysql_fetch_assoc($sql_thongtin);

                @unlink("../".$sql_thongtin["duongdantin"]."/".$sql_thongtin["icon"]);
                @unlink("../".$sql_thongtin["duongdantin"]."/thumb_".$sql_thongtin["icon"]);
             }
            ACTION_db($data, $table, 'update', NULL, "`id` = '$idofme' ");
     
            
          }
        $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


      $sql         = DB_que("SELECT * FROM `$table`  ORDER BY `catasort` ASC");
      $check_foot  = CHECK_key_setting("main-menu-footer");                    
?>

<section class="content-header">
    <h1>Main module</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý main module</li>
    </ol>
</section>
<form action="" method="post" enctype='multipart/form-data'>
  <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="h2_title">
                            <i class="fa fa-pencil-square-o"></i> Danh sách
                        </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <?php
                            if(isset($_SESSION['admin'])) echo '<a href="?module='.$module.'&action='.$action.'&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</a>';
                          ?>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w80 text-center">Hình ảnh</th>
                            <!-- <th class="w80 text-center">Menu </th> -->
                            <?php if($check_foot){ ?>
                            <th class="w80 text-center">Footer </th>
                            <?php } ?>
                            <th class="w80 text-center">Hiển thị</th>
                            <th class="w100 text-center">Tác vụ</th>
                          </tr>
                    <?php
                      $cl = 0;
                      

                      while($rows = mysql_fetch_array($sql))
                      {
                        $ida                = SHOW_text($rows['id']);
                        foreach ($rows as $key => $value) {
                          ${$key}         = SHOW_text($value);
                        }
                        $catasort           = number_format(SHOW_text($rows['catasort']),0,',','.');
 
              
                    ?>
                          <tr >
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$ida ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            
                            <td>
                              <div class="name">
                                <a href="?module=<?=$module ?>&action=<?=$action ?>&edit=<?=$ida?>&step=<?=$step?>"><?=$tenbaiviet_vi?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
                              </div>
                   

                              <?php if(CHECK_key_setting("main-menu-anh-slider")){ ?>
                              <p style="margin: 5px 0;"><a href="?module=<?=$module ?>&action=<?=$action ?>&edit=<?=$ida?>&step=<?=$step?>&upload=true">[Ảnh slider] [<?=$soluonganh_con ?>]</a></p>
                              <?php } ?>

                              <?php  if(isset($_SESSION['admin'])) { ?>
                                  <div class="name" id="en">
                                    <input type="text" name="size_img<?=$cl?>" class="" value="<?=$size_img ?>" placeholder="Kích thước ảnh bài viết" onchange="UPDATE_colum(this, '<?=$id ?>', 'size_img','<?=$table ?>')">
                                  </div>
                                  <p style="padding: 0; margin: 0"><?php 
                                      if(trim($size_img) != ''){
                                        $file = "images/trang_".str_replace("x", "_", trim($size_img)).".png";
                                        if(is_file($file)){
                                          echo '<span style="font-size: 12px; color: #2247fd; display: block; margin: 4px 0px 0;">File OK<span>';
                                        }else{
                                          echo '<span style="font-size: 12px; color: #ff1212; display: block; margin: 4px 0px 0;">File không tồn tại<span>';
                                        }
                                      }
                                  ?></p>
                                  <div class="name" id="en">
                                    <input type="text" name="size_img_dm<?=$cl?>" class="" value="<?=$size_img_dm ?>" placeholder="Kích thước ảnh danh mục" onchange="UPDATE_colum(this, '<?=$id ?>', 'size_img_dm','<?=$table ?>')">
                                  </div>
                                  <p style="padding: 0; margin: 0"><?php 
                                      if(trim($size_img_dm) != ''){
                                        $file = "images/trang_".str_replace("x", "_", trim($size_img_dm)).".png";
                                        if(is_file($file)){
                                          echo '<span style="font-size: 12px; color: #2247fd; display: block; margin: 4px 0px 0;">File OK<span>';
                                        }else{
                                          echo '<span style="font-size: 12px; color: #ff1212; display: block; margin: 4px 0px 0;">File không tồn tại<span>';
                                        }
                                      }
                                  ?></p>
                                  <div class="name" id="en">
                                    <input type="text"  value="<?=$num_view ?>" placeholder="Phân trang..." onchange="UPDATE_colum(this, '<?=$id ?>', 'num_view','<?=$table ?>')">
                                  </div>
                              <?php } ?>
                            </td>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/thumb_".$icon ?>'>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <input type="file" name="upload_<?=$cl?>">
                              <?php } ?>
                            </td>
                            <!-- <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label ><input type="checkbox" name="opt_1_<?=$cl ?>" value="1" <?=(($rows['opt'] == 1) ? "checked='checked'" : "" )?> class="minimal"></label>
                                </div>
                            </td> -->
                            <?php if($check_foot){ ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="opt1" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt1, 1)?>></label>

                                </div>
                            </td>
                            <?php } ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                </div>
                            </td>

                            <td class="text-center">
                                <div id="cus" class="cus_menu">
                                <a href="?module=<?=$module ?>&action=<?=$action ?>&edit=<?=$ida?>&step=<?=$step?>"><i class="fa fa-pencil-square-o"></i></a>
                                <?php  if(isset($_SESSION['admin'])) { ?>
                                    <a href="<?=$url_page.'&del=ok&catalogid='.$ida.'&token='.GET_token() ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                                <?php } ?>
                                </div>
                            </td>
                          </tr>
                    <?php
                          $cl++;
                        }
                    ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <?php
                            if(isset($_SESSION['admin'])) echo '<a href="?module='.$module.'&action='.$action.'&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</a>';
                          ?>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>