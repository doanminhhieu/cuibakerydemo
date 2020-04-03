<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-ho-tro-add.php";
  }else{
      $table = '#_sponline';
      if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu'])) {
        for($i=1; $i <= $_REQUEST['maxvalu']; $i++)
            {
                $idofme             = isset($_POST["idme$i"]) ? $_POST["idme$i"] : "";
                if(isset($_POST["coppy_row$i"])){
                    COPPY_row($table, $idofme, 0);
                }

                if(isset($_POST["xoa_gr_arr_$i"])){
                //xoa
                    DB_que("DELETE from $table WHERE id='".$idofme."' limit 1");
                //
                }
                else{
                      $hinhanh      = UPLOAD_image("upload_$i", "../".$duongdantin."/", time());
                      $data         = array();
                      if($hinhanh != false)
                      {
                        $data['icon'] = $hinhanh;
                        $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
                        @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
                      }
                      ACTION_db($data, $table, 'update', NULL, "`id` = '$idofme' ");
                      
                    }
            }
            $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }
?>

<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a onclick="LOAD_sort()" class="cur load_okkk">[SORT]</a> <?php } ?>Danh sách hỗ trợ</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách hỗ trợ</li>
    </ol>
</section>
<script>

  function LOAD_sort(){
    var n_sort = $(".table-danhsach tr").length;
    $(".table-danhsach tr").each(function(index){
      $('td:nth-child(1) input[type="text"]',this).val(index);
      $('td:nth-child(1) input[type="text"]',this).trigger('change');
    });
    $(".load_okkk").html("[OK]");
  }
</script>
<form action="" method="post" enctype='multipart/form-data'>
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
                            <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                        <table class="table table-hover table-danhsach">
                            <tbody>
                                <tr>
                                    
                                    <th class="w80 text-center">STT</th>
                                    <th>Tên hỗ trợ</th>
                                    <th class="w100 text-center">Hình ảnh</th>
                                    <th class="w100 text-center">Hiển thị</th>
                                    <th class="w50 text-center">
                                        <label>
                                            <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                        </label>
                                    </th>
                                </tr>
                            <?php
                                $sql        = DB_que("SELECT * FROM `$table` ORDER BY `catasort` ASC");
                                $sql_array  =  array();
                                while ($r   = mysql_fetch_assoc($sql)) {
                                  $sql_array[] = $r;
                                }

                                $cl         = 0;
                                foreach ($sql_array as $rows) { 
                                    if($rows['id_user'] != 0) continue;
                                    $ida              = $rows['id'];
                                    foreach ($rows as $key => $value) {
                                        ${$key} = $value;
                                    }
                                    $cl++;
                            ?>
                                <tr>
                                    
                                    <td class="text-center">
                                        <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                                        <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$ida ?>', 'catasort','<?=$table ?> ')">
                                    </td>
                                    <td>
                                        <div class="name">
                                            <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><?=$tenbaiviet_vi?></a>
                                        </div>
                                        <p><?=$phone?> - <?=$email?> - <?=$note?></p>
                                        <?php if(isset($_SESSION['admin'])){ ?>
                                            <label>
                                                <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                                            </label>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                      <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/".$icon ?>'>
                                      <?php if(isset($_SESSION['admin'])){ ?>
                                      <input type="file" name="upload_<?=$cl?>">
                                      <?php } ?>
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
                                <?php
                                foreach ($sql_array as $rows_1) { 
                                    if($rows_1['id_user'] != $rows['id']) continue;
                                    $ida_1              = $rows_1['id'];
                                    foreach ($rows_1 as $key  => $value) {
                                        ${$key.'_1'}          = SHOW_text($value);
                                      }
                                    $cl++;
                                ?>
                                <tr>
                                    
                                    <td class="text-center">
                                        <input name="idme<?=$cl?>" value="<?=$ida_1 ?>" type="hidden">
                                        <input type="text" class="text-center" value="<?=$catasort_1 ?>" onchange="UPDATE_colum(this, '<?=$ida_1 ?>', 'catasort','<?=$table ?> ')">
                                    </td>
                                    <td>
                                        <span class="sp-list-cap1">╚═►</span>
                                        <div class="name name_list_cap_1">
                                            <a href="<?=$url_page ?>&edit=<?=$ida_1 ?>" title="Cập nhật"><?=$tenbaiviet_vi_1 ?></a>
                                        </div>
                                        <p><?=$phone_1 ?> - <?=$email_1 ?></p>
                                        <?php if(isset($_SESSION['admin'])){ ?>
                                            <label>
                                                <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                                            </label>
                                        <?php } ?>
                                    </td> 
                                    <td class="text-center">
                                      <img class='img_show_ds' src='<?=$fullpath."/".$rows_1['duongdantin']."/".$rows_1['icon'] ?>'>
                                      <?php if(isset($_SESSION['admin'])){ ?>
                                      <input type="file" name="upload_<?=$cl?>">
                                      <?php } ?>
                                    </td>
                                    <td class="text-center">
                                      <div id="cus" class="cus_menu">
                                        <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_1 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_1, 1)?>></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                                    </td> 
                                </tr>
                                <?php }} ?> 
                            </tbody>
                        </table>
                        <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                        <h3 class="box-title box-title-td pull-right">
                           <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                            <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>