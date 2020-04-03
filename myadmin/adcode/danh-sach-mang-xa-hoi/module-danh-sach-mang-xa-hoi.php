<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-mang-xa-hoi-add.php";
  }else{
    $table      = '#_mangxahoi';
    if(isset($_GET['del']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        $icon         = @mysql_result($sql_se,0,'icon');
        $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
        $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
        $id           = @mysql_result($sql_se,0,'id');

        @unlink("../".$duongdantin."/".$icon);
        DB_que("DELETE from $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1", $table);

        $_SESSION['show_message_on'] = 'Xóa dữ liệu [<strong>'.$del_name.'</strong>] thành công';
      } else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page);
      exit();
    }

 

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme         = $_POST["idme$i"];

            if(isset($_POST["xoa_gr_arr_$i"])){
 
                $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1"); 
                if(mysql_num_rows($sql_se) > 0)
                {
                  $icon         = @mysql_result($sql_se,0,'icon');
                  $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
                  $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
                  $id           = @mysql_result($sql_se,0,'id');

                  @unlink("../".$duongdantin."/".$icon);
                  DB_que("DELETE from $table WHERE `id` ='".$idofme."' LIMIT 1",$table);

                  $_SESSION['show_message_on'] = 'Xóa dữ liệu [<strong>'.$del_name.'</strong>] thành công';
                }
            }
            else {
              $hinhanh      = UPLOAD_image("upload_$i", "../".$duongdantin."/", time());
              $data         = array();
              if($hinhanh != false)
              {
                $data['icon'] = $hinhanh;
                TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 300, 300);

                $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
                @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
                @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/thumb_".mysql_result($sql_thongtin, 0, "icon"));
              }
              ACTION_db($data, $table, 'update', NULL, "`id` = '$idofme' ");
            }
            
          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


    $sql        = DB_que("SELECT * FROM `$table`   ORDER BY `catasort` DESC ");
    $sql_array  = array();
    while ($r   = mysql_fetch_assoc($sql)) {
      $sql_array[] = $r;
    }

?>
<section class="content-header">
    <h1> Danh sách mạng xã hội</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách mạng xã hội</li>
    </ol>
</section>
<style>
  .cls_hide { display: none; }
</style>
<form action="" method="post" enctype='multipart/form-data'>
  <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Mạng xã hội 
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w100 text-center">Hình ảnh</th>
                            <th class="w100 text-center cls_hide">Đầu trang</th>
                            <th class="w100 text-center cls_hide">Cuối trang</th>
                            <th class="w100 text-center">Hiển thị</th>
                            <th class="w50 text-center">
                              <label>
                                <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                              </label>
                            </th>
                          </tr>
                          <?php
                            $cl = 0;
                            foreach ($sql_array as $rows) 
                            {
                              $cl++;

                              $ida                = SHOW_text($rows['id']);
                              foreach ($rows as $key => $value) {
                                ${$key}         = SHOW_text($value);
                              }
                              $catasort           = number_format($catasort,0,',','.');

                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$ida ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            
                            <td>
                              <div class="name">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><?=$tenbaiviet_vi?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
                              </div>
                              
                            </td>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/thumb_".$icon ?>'>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <input type="file" name="upload_<?=$cl?>">
                              <?php } ?>
                            </td>
                            <td class="text-center cls_hide">
                              <div id="cus" class="cus_menu">
                                <label><input is_top type='checkbox' class='minimal minimal_click' colum="is_top" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($is_top, 1)?>></label>
                                </div>
                            </td>
                            <td class="text-center cls_hide">
                              <div id="cus" class="cus_menu">
                                <label><input is_foot type='checkbox' class='minimal minimal_click' colum="is_foot" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($is_foot, 1)?>></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                </div>
                            </td>

                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                          </tr>
                          <!--  -->
                        <?php  } ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>