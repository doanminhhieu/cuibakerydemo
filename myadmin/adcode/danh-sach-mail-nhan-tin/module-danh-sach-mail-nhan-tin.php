<?php
    $table = '#_email_follow';
    if(isset($_GET['del']))
    {
        $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1");
        $del_name   = @mysql_result($sql_se,0,'email');
        DB_que("DELETE from $table WHERE id='".$_GET['catalogid']."' limit 1");
        @unlink("../datafiles/post/".@mysql_result($sql_se,0,'icon'));
        $_SESSION['show_message_on'] = 'Đã xóa [<strong>'.$del_name.'</strong>] thành công!';
        LOCATION_js($url_page);
        exit();
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {
        for($i=0;$i<$_REQUEST['maxvalu'];$i++)
        {
            $idofme     = $_POST["idme$i"];
            // $tenbv_vi   = $_POST["ncata_vi$i"];
            // $v_name     = $_POST["v_name$i"];

            $showhi     = isset($_POST["showhi_$i"]) ? "1": "0";
            if(isset($_POST["xoa_gr_arr_$i"])){
                DB_que("DELETE FROM $table WHERE id='".$idofme."' LIMIT 1");
                $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
                @unlink("../datafiles/post/".@mysql_result($sql_se,0,'icon'));
            }else{
                DB_que("UPDATE `$table` SET `showhi`='$showhi' WHERE `id`='$idofme' LIMIT 1");
            }
            
        }
        $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }
?>
<section class="content-header">
    <h1>Danh sách email nhận tin</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách email nhận tin</li>
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
                            <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                        <table class="table table-hover table-danhsach">
                            <tbody>
                                <tr>
                                    
                                    <th class="w80 text-center">STT</th>
                                    <th>Email</th>
                                    <th class="w100 text-center">Hiển thị</th>
                                    <th class="w50 text-center">
                                      <label>
                                        <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                      </label>
                                    </th>
                                    <!-- <th class="w100 text-center">Tác vụ</th> -->
                                </tr>
                                <?php
                                    $sql        = DB_que("SELECT * FROM `$table`");
                                    $cl         = 0;
                                    while($rows = mysql_fetch_assoc($sql))
                                    {
                                        $ida              = $rows['id'];
                                        foreach ($rows as $key => $value) {
                                            ${$key} = SHOW_text($value);
                                        }
                                ?>
                                <tr>
                                    
                                    <td class="text-center">
                                        <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                                        <?=$cl+1?>
                                    </td>
                                    <td>
                                        <?php if($v_name != ""){ ?>
                                        <!-- <div class="name">
                                          <input type="text" name="v_name<?=$cl?>" value="<?=$v_name?>">
                                        </div> -->
                                        <?php } ?>
                                        <p><?=$email?>
                                        <p><?=$v_name?><?=$v_phone != '' ? ' - '.$v_phone : '' ?> <?php if($icon != ""){ ?>
                                        <a href="../datafiles/post/<?=$icon ?>" download>[Tải file]</a>

                                        <?php } ?></p>

                                        <!-- <div class="name">
                                          <input type="text" name="ncata_vi<?=$cl?>" value="<?=$email?>">
                                        </div> -->
                                    </td>
                                    <td class="text-center">
                                      <div id="cus" class="cus_menu">
                                        <label><input type="checkbox" name="showhi_<?=$cl ?>" value="1" <?=(($showhi == 1) ? "checked='checked'" : "" )?> class="minimal"></label>
                                        </div>
                                    </td>
                                    <!-- <td class="text-center">
                                        <a href="<?=$url_page.'&del=ok&catalogid='.$ida."&token=".GET_token() ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                                    </td> -->
                                    <td class="text-center">
                                      <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
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
                            <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>