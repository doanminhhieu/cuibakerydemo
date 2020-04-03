<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-setting-add.php";
  }else{
    $table      = '#_module_setting';

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

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme     = $_POST["idme$i"];

            $sort       = str_replace(".", "", $_POST["sort$i"]);
            $ten_vi     = $_POST["ten_vi$i"];
            $ten_key    = $_POST["ten_key$i"];
            $is_check   = isset($_POST["is_check$i"]) ? "1": "0";

            DB_que("UPDATE `$table` SET `ten_vi`='$ten_vi', `ten_key`='$ten_key',`is_check`='$is_check' ,`sort`='$sort' WHERE `id`='$idofme' LIMIT 1");
            // echo "UPDATE `$table` SET `ten_vi`='$ten_vi', `ten_key`='$ten_key',`is_check`='$is_check' ,`sort`='$sort' WHERE `id`='$idofme' LIMIT 1<br/>";

          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


    $sql        = DB_que("SELECT * FROM `$table` ORDER BY `sort` ASC ");
    $sql_array  =  array();
    while ($r   = mysql_fetch_assoc($sql)) {
      $sql_array[] = $r;
    }

?>
<section class="content-header">
    <h1>Danh sách Setting</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách Setting</li>
    </ol>
</section>

<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Danh sách Setting
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            <th class="w80 text-center">STT</th>
                            <th>Setting</th>
                            <th class="w100 text-center">Check</th>
                            <th class="w120 text-center">Tác vụ</th>
                          </tr>
                          <?php
                            $cl = 0;
                            foreach ($sql_array as $rows) 
                            {
                              $cl++;
                              $ten_vi             = SHOW_text($rows['ten_vi']);
                              $ten_key            = SHOW_text($rows['ten_key']);
                              $is_check           = SHOW_text($rows['is_check']);
                              $sort               = SHOW_text($rows['sort']);
                              $ida                = SHOW_text($rows['id']);
                          ?>
                          <tr>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" name="sort<?=$cl?>" value="<?=$sort?>">
                            </td>
                            
                            <td>
                              <div class="name">
                                <input type="text" name="ten_vi<?=$cl?>" value="<?=$ten_vi ?>">
                                <input type="text" name="ten_key<?=$cl?>" value="<?=$ten_key ?>">
                              </div>
                            </td>
                            
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="is_check<?=$cl ?>" value="1" <?=(($is_check == 1) ? "checked='checked'" : "" )?> ></label>
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
                          <button type="submit" name="addgiatri" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
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