<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-mail-he-thong-add.php";
  }else{
      $table = '#_email_config';
      if(isset($_GET['del']))
      {
        $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1");
        $del_name   = @mysql_result($sql_se,0,'email');
        DB_que("DELETE from $table WHERE id='".$_GET['catalogid']."' LIMIT 1");
        $_SESSION['show_message_on'] = 'Đã xóa [<strong>'.$del_name.'</strong>] thành công!';
        LOCATION_js($url_page);
        exit();
      }
 
        if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
        {
            for($i=0;$i<$_REQUEST['maxvalu'];$i++)
                {
                    $idofme     = $_POST["idme$i"];
                    if(isset($_POST["xoa_gr_arr_$i"])){
                    //xoa
                        DB_que("DELETE from $table WHERE id='".$idofme."' LIMIT 1");
                    //
                    }
                
                }
            $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
        }
?>

<section class="content-header">
    <h1> Danh sách email</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active"> Danh sách email</li>
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
                            <i class="fa fa-pencil-square-o"></i> Danh sách
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
                                    <th>Email</th>
                                    <!-- <th class="w150">Loại</th> -->
                                    <th class="w100 text-center">Hiển thị</th>
                                    <!-- <th class="w100 text-center">Tác vụ</th> -->
                                    <th class="w50 text-center">
                                      <label>
                                        <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                      </label>
                                    </th>
                                </tr>
                                <?php
                                    $sql        = DB_que("SELECT * FROM `$table`");
                                    $cl         = 0;
                                    while($rows = mysql_fetch_assoc($sql))
                                    {
                                        $ida              = $rows['id'];
                                        $email            = SHOW_text($rows['email']); 
                                        $type             = SHOW_text($rows['type']);

                                        $showhi           = SHOW_text($rows['showhi']);
                                ?>
                                <tr>
                                    
                                    <td class="text-center">
                                        <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                                        <?=$cl+1?>
                                    </td>
                                    <td>
                                        <div class="name">
                                            <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><?=$email?></a>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <?=($type == 1) ? "Email liên hệ" : "" ?>
                                    </td> -->
                                    <td class="text-center">
                                      <div id="cus" class="cus_menu">
                                        <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                        </div>
                                    </td>
                                    <!-- <td class="text-center">
                                        <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?=$url_page.'&del=ok&catalogid='.$ida."&token=".GET_token() ?>" class="do"   onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                                    </td> -->
                                    <td class="text-center">
                                      <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
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