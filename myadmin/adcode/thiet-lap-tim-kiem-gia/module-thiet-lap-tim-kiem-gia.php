<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-thiet-lap-tim-kiem-gia-add.php";
  }else{
    $table      = '#_lien_ket_nhanh';
    if(isset($_GET['del']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        $icon         = @mysql_result($sql_se,0,'icon');
        $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
        $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
        $id           = @mysql_result($sql_se,0,'id');

        DB_que("UPDATE $table SET `is_admin` = 0 WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");

        $_SESSION['show_message_on'] = 'Xóa liên kết nhanh [<strong>'.$del_name.'</strong>] thành công';
      } 
      else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page);
      exit();
    }

    if(isset($_GET['admindel']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        $icon         = @mysql_result($sql_se,0,'icon');
        $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
        $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
        $id           = @mysql_result($sql_se,0,'id');

        @unlink("../".$duongdantin."/".$icon);
        DB_que("DELETE from $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");

        $_SESSION['show_message_on'] = 'Xóa liên kết nhanh [<strong>'.$del_name.'</strong>] thành công';
      } else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page);
      exit();
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme         = $_POST["idme$i"];
            // $target         = $_POST["target$i"];

            if(isset($_POST["coppy_row$i"])){
              COPPY_row($table, $idofme, 0);
            }

            if(isset($_POST["xoa_gr_arr_$i"])){
              $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1"); 
              if(mysql_num_rows($sql_se) > 0)
              {
                $icon         = @mysql_result($sql_se,0,'icon');
                $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
                $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
                $id           = @mysql_result($sql_se,0,'id');
                @unlink("../".$duongdantin."/".$icon);
                DB_que("DELETE from $table WHERE `id` ='".$idofme."' LIMIT 1");
              }
            }
          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


    $sql   = DB_que("SELECT * FROM `$table` ORDER BY `catasort` ASC ");
    $sql_array  =  array();
    while ($r   = mysql_fetch_assoc($sql)) {
      $sql_array[] = $r;
    }

?>
<section class="content-header">
    <h1> Thiết lập tìm kiếm giá</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Thiết lập tìm kiếm giá</li>
    </ol>
</section>

<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Thiết lập tìm kiếm giá
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <style type="text/css">.name { width: 48%; float: left; margin: 1px 0.5%; min-width: 200px}</style>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w200 text-center">Giá</th>
                            <th class="w100 text-center">Hiển thị</th>
                            <!-- <th class="w120 text-center">Tác vụ</th> -->
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
                              $gia_min = number_format($gia_min, 0, ',', '.');
                              $gia_max = number_format($gia_max, 0, ',', '.');
                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$id ?>', 'catasort','<?=$table ?>')">
                            </td>
                            <td>
                              <div class="name">
                                <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$id ?>"><?=$tenbaiviet_vi ?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
                              </div>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <label>
                                <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                              </label>
                              <?php } ?>
                            </td>
                            <td class="text-center">
                              <?=$gia_min ?> - <?=$gia_max ?>
                            </td>
                            
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$id ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                </div>
                            </td>
                            <!-- <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td> -->
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