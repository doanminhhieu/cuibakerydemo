<?php
    $table      = '#_magiamgia_chitiet';
    $table_slug = str_replace("#_", "", $table);
    if(isset($_GET['del'])) {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 
      if(mysql_num_rows($sql_se) > 0) {
        $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
        DB_que("DELETE FROM $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");
        $_SESSION['show_message_on'] = 'Xóa mã giảm giá [<strong>'.$del_name.'</strong>] thành công';
      } else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page.'&mgg='.$_GET['mgg']);
      exit();
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1; $i <= $_REQUEST['maxvalu']; $i++) {
            $idofme     = $_POST["idme$i"];
            if(isset($_POST["xoa_gr_arr_$i"])){
              DB_que("DELETE FROM $table WHERE `id` ='".$idofme."' LIMIT 1");
            }
        }
        $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


    $sql     = DB_que("SELECT * FROM `$table` WHERE `id_parent` = '".$_GET['mgg']."' ORDER BY `id` ASC");
    $numlist = @mysql_num_rows($sql);

    //check
    if(!$numlist){
      DB_que("DELETE FROM `#_magiamgia` WHERE `id` = '".$_GET['mgg']."' LIMIT 1");
      LOCATION_js($url_page);
    }
 

?>
<section class="content-header">
    <h1> Danh sách mã giảm giá</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách mã giảm giá</li>
    </ol>
</section>

<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Danh sách mã giảm giá
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            <th class="w50 text-center">
                              <label>
                                <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                <input type="hidden" name="token" value="<?=GET_token() ?>">
                              </label>
                            </th>
                            <th class="w80 text-center">STT</th>
                            <th>Mã giảm giá </th>
                            <th style="width: 20%" class="text-center">Sử dụng</th>
                            <th class="w80 text-center">Tác vụ</th>
                          </tr>
                          <?php
                            $cl                 = 0;
                            $token              = GET_token();
                            while($rows = mysql_fetch_assoc($sql)){
                              $cl++;
                          ?>
                          <tr>
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                              
                            </td>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$rows['id'] ?>" type="hidden">
                              <?=$cl ?>
                            </td>
                            <td>
                              <div class="name">
                                <?=$rows['ma_giam_gia'] ?>
                              </div>
                            </td>
                            <td class="text-center">
                              <?=$rows['so_lan_su_dung']."/".$rows['tong_su_dung'] ?>
                            </td>
                            <td class="text-center">
                              <a href="<?=$url_page.'&del=ok&mgg='.$_GET['mgg'].'&token='.$token ?>&catalogid=<?=$rows['id'] ?>" class="do" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                        <?php  } ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                        <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>