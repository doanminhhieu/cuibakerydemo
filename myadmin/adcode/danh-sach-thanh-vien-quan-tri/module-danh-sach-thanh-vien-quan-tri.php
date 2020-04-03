<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-thanh-vien-quan-tri-add.php";
  }else{
    $table = '#_members';

    if(isset($_GET['del']))
        {   
            $sql_se = DB_que("SELECT * from $table WHERE `id` ='".$_GET['catalogid']."'  AND `id` <> '".$_SESSION['luluwebproadmin']."' LIMIT 1");
            if(mysql_num_rows($sql_se) > 0)
            {
                DB_que("DELETE from $table WHERE `id` ='".$_GET['catalogid']."'  AND `id` <> '".$_SESSION['luluwebproadmin']."' LIMIT 1");
                $_SESSION['show_message_on'] = 'Đã xóa thành viên thành công!';
                LOCATION_js($url_page);
                exit();
            }
            else
            {
                $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
            }
        }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {
        for($i=0;$i<$_REQUEST['maxvalu'];$i++){
            $idofme     = $_POST["idme$i"];
            $key        = $_POST["key$i"];
            $showhi     = isset($_POST["showhi_$i"]) ? "1": "0";
            if(isset($_POST["xoa_gr_arr_$i"])){
                if($_SESSION['luluwebproadmin'] != $idofme) {
                    DB_que("DELETE from $table WHERE `id` ='".$idofme."' AND `id` <> '".$_SESSION['luluwebproadmin']."' LIMIT 1");
                }
            }
            // else{
            //     if($_SESSION['luluwebproadmin'] != $idofme) {
            //         DB_que("UPDATE `$table` SET `showhi`='$showhi' WHERE `id`='$idofme' LIMIT 1");
            //     }
            // }
            
        }
        $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';    
    }  
?>

<section class="content-header">
    <h1> Danh sách thành viên quản trị</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active"> Danh sách thành viên quản trị</li>
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
                                    <th>Tên tài khoản</th>
                                    <th class="w120">Loại tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th class="w100 text-center">Hiển thị</th>
                                    <!-- <th class="w100 text-center">Tác vụ</th> -->
                                    <th class="w50 text-center">
                                      <label>
                                        <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                      </label>
                                    </th>
                                </tr>
                                <?php
                                    $numview        = 20;
                                    if(!isset($_GET['pz']) || $_GET['pz']  =="" || $_GET['pz']==0)     $pzz = 0;
                                    else $pzz       = $_GET['pz'] * $numview;
                                    $wh = "";
                                    if($_SESSION['phanquyen'] != 1){
                                        $wh = " AND `phanquyen` <> 1 ";
                                    }


                                    $sql            = DB_que("SELECT * FROM `$table` WHERE `phanquyen` <> 0 $wh ORDER BY `id` ASC LIMIT $pzz,$numview");
                                    $sql_num        = DB_que("SELECT * FROM `$table` WHERE `phanquyen` <> 0 $wh");
                                    $numlist        = @mysql_num_rows($sql_num);
                                    $numshow        = ceil($numlist/$numview);

                                    $cl = 0;
                                    $i = $pzz;

                                    $list_quyen = GET_danhsachquyen();
                                    while($rows = mysql_fetch_assoc($sql))
                                    {
                                        $i++;
                                        $ida                = $rows['id'];
                                        $tentaikhoan        = SHOW_text($rows['tentruycap']);
                                        $email              = SHOW_text($rows['email']);
                                        $hoten              = SHOW_text($rows['hoten']);
                                        $showhi             = SHOW_text($rows['showhi']);
                                        $phanquyen          = SHOW_text($rows['phanquyen']);
                                        $keypass            = md5(SHOW_text($rows['keypass']));

                                        $quyen = "";
                                        foreach ($list_quyen as $val) {
                                           if($val['id'] == $phanquyen) {
                                                $quyen   = $val['ten_vi'];
                                                break;
                                           }
                                        }

                                ?>
                                <tr>
                                    
                                    
                                    <td class="text-center">
                                        <?=$cl+1 ?>
                                        <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                                        <input name="key<?=$cl?>" value="<?=$keypass ?>" type="hidden">
                                    </td>
                                    <td>
                                        <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><?=$tentaikhoan ?></a>
                                    </td>
                                    <td>
                                        <?=$quyen ?>
                                    </td>
                                    <td>
                                        <?=$hoten ?>
                                    </td>
                                    <td>
                                        <?=$email ?>
                                    </td>
                                    <td class="text-center">
                                      <div id="cus" class="cus_menu">
                                        <?php if($_SESSION['luluwebproadmin'] != $ida) { ?>
                                        <!-- <label><input type="checkbox" name="showhi_<?=$cl ?>" value="1" <?=(($showhi == 1) ? "checked='checked'" : "" )?> class="minimal"></label> -->
                                        <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                        <?php }else{ ?>
                                        <label><input type="checkbox" value="1" <?=(($showhi == 1) ? "checked='checked'" : "" )?> class="minimal" disabled="disabled"></label>
                                        <?php } ?>
                                        </div>
                                    </td>
                                    <!-- <td class="w120 text-center">
                                        <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                                        <?php if($_SESSION['luluwebproadmin'] != $ida) { ?>
                                        <a href="<?=$url_page.'&del=ok&catalogid='.$ida.'&token='.GET_token() ?>" class="do"   onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                                        <?php }else{ ?>
                                        <a><i class="fa fa-times" style="color: #aaa;"></i></a>
                                        <?php } ?>
                                    </td> -->
                                    <?php if($_SESSION['luluwebproadmin'] != $ida) { ?>
                                    <td class="text-center">
                                      <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                                    </td>
                                    <?php }else{ ?>
                                    <td class="text-center">
                                      <input disabled="disabled" type='checkbox' class='minimal '>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php
                                        $cl++;
                                    }
                                ?> 
                            </tbody>
                        </table>
                    </div>
                    <div class="box-header">
                        <h3 class="box-title box-title-td pull-right">
                            <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                            <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                            <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>