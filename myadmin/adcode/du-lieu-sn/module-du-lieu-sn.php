<?php
  $table      = '#_du_lieu_sn';
  $full_name  = "Hiển thị trang chủ";
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-du-lieu-sn-add.php";
  }else{
    if(isset($_GET['del']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        DB_que("UPDATE $table SET `is_admin` = 0 WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");

        $_SESSION['show_message_on'] = 'Xóa dữ liệu thành công';
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
        DB_que("DELETE from $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");

        $_SESSION['show_message_on'] = 'Xóa dữ liệu thành công';
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
    <h1> <?=$full_name ?></h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active"><?=$full_name ?></li>
    </ol>
</section>

<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> <?=$full_name ?>
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
                            <!-- <th class="w100 text-center">Tiêu biểu</th> -->
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
                              // if($rows['id_parent'] != 0) continue;
                              $cl++;
                              $ida                = SHOW_text($rows['id']);
                              foreach ($rows as $key => $value) {
                                ${$key} = $value;
                              }
                              $catasort           = number_format($catasort,0,',','.');

                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$ida ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            <td>
                              <div class="name " style="width: 100%;">
                                <a href="<?=$url_page ?>&edit=<?=$ida ?>" title="Cập nhật"><?=$tenbaiviet_vi ?></a>
                              </div>
                              <p style="width: 100%; float: left; font-size: 10px; color: #6d6d6d; margin: 2px 0 0; padding-left: 0px;"><?=$blank != "" ? "[Cửa sổ mới]" : "" ?></p>
                            </td>
                            <!-- <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt, 1)?>></label>
                              </div>
                            </td> -->
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                              </div>
                            </td>
                            
                            <td class="text-center">
                              <?php if(empty($_SESSION['admin'])){ ?>
                              <input  type='checkbox' class='minimal ' disabled="disabled">
                              <?php }else{ ?>
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                              <?php } ?>
                            </td>
                          </tr>

                          <!--  -->
                          <?php 
                            foreach ($sql_array as $rows_2) 
                              {
                                continue;
                                if($rows_2['id_parent'] != $rows['id']) continue;
                                $cl++;
                                $ida_2                = SHOW_text($rows_2['id']);
                                foreach ($rows_2 as $key => $value) {
                                  ${$key."_2"}      = SHOW_text($value);
                                }
                                $catasort_2           = number_format($rows_2['catasort'],0,',','.');
                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida_2?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort_2 ?>" onchange="UPDATE_colum(this, '<?=$ida_2 ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            
                            <td>
                              <span class="sp-list-cap1">╚═►</span>
                              <div class="name name_list_cap_1" style="width: 100%;">
                                <a href="<?=$url_page ?>&edit=<?=$ida_2?>" title="Cập nhật"><?=$tenbaiviet_vi_2?></a>
                              </div>
                              <p style="width: 100%; float: left; font-size: 10px; color: #6d6d6d; margin: 2px 0 0; padding-left: 38px;"><?=$blank_2 != "" ? "[Cửa sổ mới]" : "" ?></p>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt_2, 1)?>></label>
                              </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_2, 1)?>></label>
                              </div>
                            </td>
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                          </tr>
                          <!--  -->
                          <?php 
                            foreach ($sql_array as $rows_3) 
                              {
                                if($rows_3['id_parent'] != $rows_2['id']) continue;
                                $cl++;
                                $ida_3                = SHOW_text($rows_3['id']);
                                foreach ($rows_3 as $key => $value) {
                                  ${$key."_3"}      = SHOW_text($value);
                                }
                                $catasort_3           = number_format($rows_3['catasort'],0,',','.');
                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida_3?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort_3 ?>" onchange="UPDATE_colum(this, '<?=$ida_3 ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            
                            <td>
                              <span class="sp-list-cap2">╚═►</span>
                              <div class="name name_list_cap_2" style="width: 100%;">
                                <a href="<?=$url_page ?>&edit=<?=$ida_3?>" title="Cập nhật"><?=$tenbaiviet_vi_3?></a>
                              </div>
                              <p style="width: 100%; float: left; font-size: 10px; color: #6d6d6d; margin: 2px 0 0; padding-left: 38px;"><?=$blank_3 != "" ? "[Cửa sổ mới]" : "" ?></p>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$ida_3 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt_3, 1)?>></label>
                              </div>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_3 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_3, 1)?>></label>
                              </div>
                            </td>
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                          </tr>
                          <?php } ?>
                          <!--  -->
                          <?php } ?>
                          <!--  -->
                        <?php }  ?> 
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