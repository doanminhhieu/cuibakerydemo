<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-nhom-thanh-vien-add.php";
  }else{
    $table      = '#_members_nhom';

    if(isset($_GET['del']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        DB_que("DELETE from $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");
        
        $_SESSION['show_message_on'] = 'Đã xóa thành công';
      } else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page);
      exit();
    }

    if(isset($_POST['chiet_khau_def']) && is_numeric($_POST['chiet_khau_def'])) {
      DB_que("UPDATE `#_seo` SET `chiet_khau_def` = '".$_POST['chiet_khau_def']."' LIMIT 1");
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme     = $_POST["idme$i"];

            $catasort          = str_replace(".", "", $_POST["catasort$i"]);
            $tenbaiviet_vi     = $_POST["tenbaiviet_vi$i"];
            $phan_tram         = $_POST["phan_tram$i"];
            $showhi            = isset($_POST["showhi$i"]) ? "1": "0";

            if(isset($_POST["xoa_gr_arr_$i"])){
              DB_que("DELETE from $table WHERE `id` ='".$idofme."' LIMIT 1");
            }else{
              DB_que("UPDATE `$table` SET `tenbaiviet_vi`='$tenbaiviet_vi', `showhi`='$showhi' ,`catasort`='$catasort',`phan_tram` = $phan_tram WHERE `id`='$idofme' LIMIT 1"); 
            }
          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


    $sql        = DB_que("SELECT * FROM `$table` ORDER BY `catasort` ASC ");
    $sql_array  = array();
    while ($r   = mysql_fetch_assoc($sql)) {
      $sql_array[] = $r;
    }

?>
<section class="content-header">
    <h1>Nhóm thành viên</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Nhóm thành viên</li>
    </ol>
</section>

<form action="" method="post">
  <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Nhóm thành viên
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <?php 
                      $chietkhau = DB_que("SELECT * FROM `#_seo` LIMIT 1");
                      $chietkhau = mysql_fetch_assoc($chietkhau);
                    ?>
                    <div class="form-group" style="margin: 0 10px;">
                        <p style="font-size: 13px; font-weight: 600; margin: 0 0 7px;">Chiết khấu (%) cho thành viên thường</p>
                        <input type="text" class="form-control" name="chiet_khau_def" value="<?=$chietkhau['chiet_khau_def'] ?>">
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            <th class="w50 text-center">
                              <label>
                                <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                              </label>
                            </th>
                            <th class="w80 text-center">STT</th>
                            <th>Nhóm thành viên</th>
                            <th class="w150 text-center">Chiết khấu (%)</th>
                            <th class="w100 text-center">Hiển thị</th>
                            <th class="w120 text-center">Tác vụ</th>
                          </tr>
                          <?php
                            $cl = 0;
                            foreach ($sql_array as $rows) 
                            {
                              $cl++;
                              $tenbaiviet_vi      = SHOW_text($rows['tenbaiviet_vi']);
                              $showhi             = SHOW_text($rows['showhi']);
                              $catasort           = SHOW_text($rows['catasort']);
                              $ida                = SHOW_text($rows['id']);
                              $phan_tram          = SHOW_text($rows['phan_tram']);
                          ?>
                          <tr>
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" name="catasort<?=$cl?>" value="<?=$catasort ?>">
                            </td>
                            <td>
                              <div class="name">
                                <input type="text" name="tenbaiviet_vi<?=$cl?>" value="<?=$tenbaiviet_vi ?>">
                              </div>
                            </td>
                            <td class="text-center">
                              <input type="text" class="text-center" name="phan_tram<?=$cl?>" value="<?=$phan_tram ?>">
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="showhi<?=$cl ?>" value="1" <?=(($showhi == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida ?>&token=<?=GET_token() ?>" class="do"  onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
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