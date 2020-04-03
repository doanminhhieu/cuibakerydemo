<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-tinh-nang-admin-add.php";
  }else{
    $table      = '#_module_tinhnang';

    if(isset($_GET['del']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        DB_que("DELETE FROM $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");
        
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
            $m_action   = $_POST["m_action$i"];
            $icon       = $_POST["icon$i"];
            $lien_ket   = $_POST["lien_ket$i"];

            $m_xem      = isset($_POST["m_xem$i"]) ? "1": "0";
            $m_them     = isset($_POST["m_them$i"]) ? "1": "0";
            $m_sua      = isset($_POST["m_sua$i"]) ? "1": "0";
            $m_xoa      = isset($_POST["m_xoa$i"]) ? "1": "0";
            $showhi     = isset($_POST["showhi$i"]) ? "1": "0";
            $m_other     = isset($_POST["m_other$i"]) ? "1": "0";

            DB_que("UPDATE `$table` SET `ten_vi`='$ten_vi', `m_action`='$m_action', `m_xem`='$m_xem', `m_them` = '$m_them',`m_sua`='$m_sua',`m_xoa`='$m_xoa',`showhi`='$showhi' ,`sort`='$sort',`icon`='$icon',`lien_ket`='$lien_ket',`m_other`='$m_other' WHERE `id`='$idofme' LIMIT 1");

          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


    $sql        = DB_que("SELECT * FROM `$table` ORDER BY `sort` ASC ");
    $sql_array  =  array();
    while ($r   = mysql_fetch_assoc($sql)) {
      $sql_array[] = $r;
    }

    if(isset($_POST['xoa_all_data'])){
      DB_que("TRUNCATE `#_baiviet`");
      DB_que("TRUNCATE `#_baiviet_img`");
      DB_que("TRUNCATE `#_banner`");
      DB_que("TRUNCATE `#_count_date`");
      DB_que("TRUNCATE `#_danhmuc`");
      DB_que("TRUNCATE `#_step`");

      DB_que("TRUNCATE `#_form_lienhe`");
      DB_que("TRUNCATE `#_slug`");
      DB_que("TRUNCATE `#_menu`");
      DB_que("TRUNCATE `#_email_follow`");
      DB_que("TRUNCATE `#_baiviet_tinhnang`");
 
      DB_que("TRUNCATE `#_lien_ket_nhanh`");
      DB_que("TRUNCATE `#_magiamgia`");
      DB_que("TRUNCATE `#_magiamgia_chitiet`");
      DB_que("TRUNCATE `#_file_import_data`");
      DB_que("TRUNCATE `#_mangxahoi`");

      DB_que("TRUNCATE `#_baiviet_select_tinhnang`");

      //xoa anh trong datafile
      XOA_all_file('../datafiles');
      //
      $_SESSION['show_message_on'] = 'Đã xóa tất cả dữ liệu thành công!';
    }
    
?>
<section class="content-header">
    <h1> Tính năng hệ thống</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Tính năng hệ thống</li>
    </ol>
</section>
 
<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Tính năng hệ thống
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
                            <th>Tính năng</th>
                            <th class="w70 text-center">Xem</th>
                            <th class="w70 text-center">Thêm</th>
                            <th class="w70 text-center">Sửa</th>
                            <th class="w70 text-center">Xóa </th>
                            <th class="w70 text-center">Orther </th>
                            <th class="w90 text-center">Hiển thị</th>
                            <th class="w100 text-center">Tác vụ</th>
                          </tr>
                          <?php
                            $cl = 0;
                            foreach ($sql_array as $rows) 
                            {
                              if($rows['id_parent'] != 0) continue;
                              $cl++;
                              $ten_vi             = SHOW_text($rows['ten_vi']);
                              $m_action           = SHOW_text($rows['m_action']);
                              $m_xem              = SHOW_text($rows['m_xem']);
                              $m_them             = SHOW_text($rows['m_them']);
                              $m_sua              = SHOW_text($rows['m_sua']);
                              $m_xoa              = SHOW_text($rows['m_xoa']);
                              $showhi             = SHOW_text($rows['showhi']);
                              $sort               = SHOW_text($rows['sort']);
                              $ida                = SHOW_text($rows['id']);
                              $icon               = SHOW_text($rows['icon']);
                              $lien_ket           = SHOW_text($rows['lien_ket']);
                              $m_other           = SHOW_text($rows['m_other']);

                          ?>
                          <tr>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" name="sort<?=$cl?>" value="<?=$sort?>">
                            </td>
                            
                            <td class="dvhide-row">
                              <div class="name">
                                <input type="text" name="ten_vi<?=$cl?>" value="<?=$ten_vi ?>" placeholder="ten_vi">
                                <div class="dvhide-row">
                                <input type="text" name="m_action<?=$cl?>" value="<?=$m_action ?>" placeholder="m_action">
                                <input type="text" name="icon<?=$cl?>" value="<?=$icon ?>" placeholder="icon">
                                <input type="text" name="lien_ket<?=$cl?>" value="<?=$lien_ket ?>" placeholder="lien_ket">
                                </div>
                              </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_xem<?=$cl ?>" value="1" <?=(($m_xem == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_them<?=$cl ?>" value="1" <?=(($m_them == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_sua<?=$cl ?>" value="1" <?=(($m_sua == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_xoa<?=$cl ?>" value="1" <?=(($m_xoa == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_other<?=$cl ?>" value="1" <?=(($m_other == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="showhi<?=$cl ?>" value="1" <?=(($showhi == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida ?>&token=<?=GET_token() ?>" class="do" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                          <!-- //cap 2 -->
                          <?php
                            foreach ($sql_array as $rows_2) 
                            {
                              if($rows_2['id_parent'] != $rows['id']) continue;
                              $cl++;
                              $ten_vi_2             = SHOW_text($rows_2['ten_vi']);
                              $m_action_2           = SHOW_text($rows_2['m_action']);
                              $m_xem_2              = SHOW_text($rows_2['m_xem']);
                              $m_them_2             = SHOW_text($rows_2['m_them']);
                              $m_sua_2              = SHOW_text($rows_2['m_sua']);
                              $m_xoa_2              = SHOW_text($rows_2['m_xoa']);
                              $m_other_2              = SHOW_text($rows_2['m_other']);
                              $showhi_2             = SHOW_text($rows_2['showhi']);
                              $sort_2               = SHOW_text($rows_2['sort']);
                              $ida_2                = SHOW_text($rows_2['id']);
                              $icon_2               = SHOW_text($rows_2['icon']);
                              $lien_ket_2           = SHOW_text($rows_2['lien_ket']);
                          ?>
                          <tr>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida_2?>" type="hidden">
                              <input type="text" class="text-center" name="sort<?=$cl?>" value="<?=$sort_2 ?>">
                            </td>
                            
                            <td class="dvhide-row">
                              <span class="sp-list-cap1">╚═►</span>
                              <div class="name name_list_cap_1">
                                <input type="text" name="ten_vi<?=$cl?>" value="<?=$ten_vi_2 ?>" placeholder="ten_vi">
                                <div class="dvhide-row">
                                  <input type="text" name="m_action<?=$cl?>" value="<?=$m_action_2 ?>" placeholder="m_action">
                                  <input type="text" name="icon<?=$cl?>" value="<?=$icon_2 ?>" placeholder="icon">
                                  <input type="text" name="lien_ket<?=$cl?>" value="<?=$lien_ket_2 ?>" placeholder="lien_ket">
                                  </div>
                              </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_xem<?=$cl ?>" value="1" <?=(($m_xem_2 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_them<?=$cl ?>" value="1" <?=(($m_them_2 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_sua<?=$cl ?>" value="1" <?=(($m_sua_2 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_xoa<?=$cl ?>" value="1" <?=(($m_xoa_2 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_other<?=$cl ?>" value="1" <?=(($m_other_2 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="showhi<?=$cl ?>" value="1" <?=(($showhi_2 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida_2?>"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida_2 ?>&token=<?=GET_token() ?>" class="do" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                          <!-- /nhom 3 -->
                          <?php
                            foreach ($sql_array as $rows_3) 
                            {
                              if($rows_3['id_parent'] != $rows_2['id']) continue;
                              $cl++;
                              $ten_vi_3             = SHOW_text($rows_3['ten_vi']);
                              $m_action_3           = SHOW_text($rows_3['m_action']);
                              $m_xem_3              = SHOW_text($rows_3['m_xem']);
                              $m_them_3             = SHOW_text($rows_3['m_them']);
                              $m_sua_3              = SHOW_text($rows_3['m_sua']);
                              $m_xoa_3              = SHOW_text($rows_3['m_xoa']);
                              $m_other_3              = SHOW_text($rows_3['m_other']);
                              $showhi_3             = SHOW_text($rows_3['showhi']);
                              $sort_3               = SHOW_text($rows_3['sort']);
                              $ida_3                = SHOW_text($rows_3['id']);
                              $icon_3               = SHOW_text($rows_3['icon']);
                              $lien_ket_3           = SHOW_text($rows_3['lien_ket']);
                          ?>
                          <tr>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida_3?>" type="hidden">
                              <input type="text" class="text-center" name="sort<?=$cl?>" value="<?=$sort_3 ?>">
                            </td>
                            
                            <td class="dvhide-row">
                              <span class="sp-list-cap2">╚═►</span>
                              <div class="name name_list_cap_2">
                                <input type="text" name="ten_vi<?=$cl?>" value="<?=$ten_vi_3 ?>" placeholder="ten_vi">
                                <div class="dvhide-row">
                                  <input type="text" name="m_action<?=$cl?>" value="<?=$m_action_3 ?>" placeholder="m_action">
                                  <input type="text" name="icon<?=$cl?>" value="<?=$icon_3 ?>" placeholder="icon">
                                  <input type="text" name="lien_ket<?=$cl?>" value="<?=$lien_ket_3 ?>" placeholder="lien_ket">
                                </div>
                              </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_xem<?=$cl ?>" value="1" <?=(($m_xem_3 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_them<?=$cl ?>" value="1" <?=(($m_them_3 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_sua<?=$cl ?>" value="1" <?=(($m_sua_3 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_xoa<?=$cl ?>" value="1" <?=(($m_xoa_3 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="m_other<?=$cl ?>" value="1" <?=(($m_other_3 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" class='minimal' name="showhi<?=$cl ?>" value="1" <?=(($showhi_3 == 1) ? "checked='checked'" : "" )?> ></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida_3?>"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida_3 ?>&token=<?=GET_token() ?>" class="do" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                        <?php  } ?> 
                          <!-- end 3 -->
                        <?php  } ?> 
                          <!-- end cap 2 -->
                        <?php  } ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                          <button type="submit" name="xoa_all_data" onclick="return confirm('Bạn chắc xóa tất cả dữ liệu trên website?')" class="btn btn-primary"><i class="fa fa-times"></i> Xóa tất cả dữ liệu</button>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>