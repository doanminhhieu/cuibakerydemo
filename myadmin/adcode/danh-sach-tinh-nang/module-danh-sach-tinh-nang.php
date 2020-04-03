<?php
  $is_kieuchon    = 0;
  $is_hinhanh    = 0;
  $is_kieuhienthi = 0;
  $is_mamau       = 0;
  $is_option_th   = 1;

  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-tinh-nang-add.php";
  }else{
    $table      = '#_baiviet_tinhnang';

    if(isset($_GET['del']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
        $id           = @mysql_result($sql_se,0,'id');

        $sql = DB_que("DELETE from $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");
        //xoa pr child
        $sql_se_c1    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$_GET['catalogid']."'");
        while ($row_1   = mysql_fetch_array($sql_se_c1))  {
          DB_que("DELETE from $table WHERE `id`  = '".$row_1['id']."' LIMIT 1");
          DB_que("DELETE from $table WHERE `id_parent` ='".$row_1['id']."'");
        }
        //
        $_SESSION['show_message_on'] = 'Đã xóa [<strong>'.$del_name.'</strong>] thành công';
      } 
      else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page."&step=".@$step."&id_step=".@$id_step);
      exit();
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++) {
            $idofme     = $_POST["idme$i"];
            $up_sort    = "";
            if(isset($_POST["sortby$i"])){
              $sort     = str_replace(".", "", $_POST["sortby$i"]);
              $up_sort  = ", `catasort`='$sort'"; 
            }
            
            if(isset($_POST["xoa_gr_arr_$i"])){
            //xoa
            $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
            if(mysql_num_rows($sql_se) > 0) {
              $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
              $id           = @mysql_result($sql_se,0,'id');

              $sql = DB_que("DELETE from $table WHERE `id` ='".$idofme."' LIMIT 1");
              //xoa pr child
              $sql_se_c1    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$idofme."'");
              while ($row_1   = mysql_fetch_array($sql_se_c1))  {
                DB_que("DELETE from $table WHERE `id`  = '".$row_1['id']."' LIMIT 1");
                DB_que("DELETE from $table WHERE `id_parent` ='".$row_1['id']."'");
              }
            }
            //
          }
        }
        $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }

 

    $sql        = DB_que("SELECT * FROM `$table` WHERE `step` = '".$step."' ORDER BY `catasort` ASC");
    $sql_array  = array();
    while ($r   = mysql_fetch_assoc($sql)) {
      $sql_array[] = $r;
    }
?>
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a onclick="LOAD_sort()" class="cur load_okkk">[SORT]</a> <?php } ?> Danh sách tính năng</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách tính năng</li>
    </ol>
</section>
<script>
  function LOAD_sort(){
    var n_sort = $( "input[name^='sortby']" ).length;
    $( "input[name^='sortby']" ).each(function(index){
      $(this).val(index + 1);
    });
    $(".load_okkk").html("[OK]");
  }
</script>
<style>
  .cls_tieubieu {display: none}
  .cls_noibat {display: none}
</style>
<form action="" method="post">
  <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> <?=GETNAME_step($step)?>
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            
                            <th class="w80 text-center">STT</th>
                            
                            <th>Tiêu đề</th>
                            <th class="cls_tieubieu w100 text-center">Nổi bật</th>
                            <th class="cls_noibat w100 text-center">Tiêu biểu</th>
                            <?php if($is_hinhanh) { ?>
                            <th class="w100 text-center">Hình ảnh</th>
                            <?php } ?>

                            <?php if($is_kieuchon) { ?>
                            <th class=" w100 text-center">Kiểu chọn</th>
                            <?php } ?>
                            <?php if($is_kieuhienthi){ ?>
                            <th class="cls_timkiem w100 text-center">Tìm kiếm</th>
                            <?php } ?>
                            <th class="w100 text-center">Hiển thị</th>
                            <?php if(isset($_SESSION['admin'])){ ?>
                            <th class="w100 text-center">Admin</th>
                            <?php } ?>
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
                              if($rows['id_parent'] != 0) continue;
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
                              <div class="name">
                                <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$ida?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi?></a>
                              </div>
                            </td>
                            <td class="text-center cls_tieubieu">
                              <div id="cus" class="cus_menu">
                                <label><input noi_bat type='checkbox' class='minimal minimal_click' colum="noi_bat" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($noi_bat, 1)?>></label>
                              </div>
                            </td>
                            <td class="text-center cls_noibat">
                              <div id="cus" class="cus_menu">
                                <label><input tieu_bieu type='checkbox' class='minimal minimal_click' colum="tieu_bieu" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($tieu_bieu, 1)?>></label>
                              </div>
                            </td>
                            <?php if($is_hinhanh) { ?>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/thumb_".$icon ?>'>
                            </td>
                            <?php } ?>
                            <?php if($is_kieuchon) { ?>
                            <td class="text-center ">
                              <div id="cus" class="cus_menu">
                                <label><input loai_hienthi type='checkbox' class='minimal minimal_click' colum="loai_hienthi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($loai_hienthi, 1)?>></label>
                              </div>
                            </td>
                            <?php } ?>
                            <?php if($is_kieuhienthi){ ?>
                            <td class="text-center cls_timkiem">
                              <div id="cus" class="cus_menu">
                                <label><input tim_kiem type='checkbox' class='minimal minimal_click' colum="tim_kiem" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($tim_kiem, 1)?>></label>
                              </div>
                            </td>
                            <?php } ?>
                            

                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                              </div>
                            </td>
                            <?php if(isset($_SESSION['admin'])){ ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input khong_xoa type='checkbox' class='minimal minimal_click' colum="khong_xoa" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($khong_xoa, 1)?>></label>
                              </div>
                            </td>
                            <?php } ?>
                            
                            <td class="text-center">
                              <?php if($khong_xoa){ ?>
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
                              <div class="name name_list_cap_1">
                                <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$ida_2?>" title="Cập nhật"><?=$tenbaiviet_vi_2?></a>
                              </div>
                              <?php if($ma_mau_2 != ''){  ?>
                              <p style="background: <?=$ma_mau_2 ?>;height: 15px; width: 30px; margin: 6px 0 0; border: 1px solid #ccc;"></p>
                              <?php } ?>

                            </td>
                            <td class="text-center cls_tieubieu">
                              <div id="cus" class="cus_menu">
                                <label><input noi_bat type='checkbox' class='minimal minimal_click' colum="noi_bat" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($noi_bat_2, 1)?>></label>
                              </div>
                            </td>
                            <td class="text-center cls_noibat">
                              <div id="cus" class="cus_menu">
                                <label><input tieu_bieu type='checkbox' class='minimal minimal_click' colum="tieu_bieu" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($tieu_bieu_2, 1)?>></label>
                              </div>
                            </td>
                            <?php if($is_hinhanh) { ?>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows_2['duongdantin']."/thumb_".$rows_2['icon'] ?>'>
                            </td>
                            <?php } ?>
                            <?php if($is_kieuchon) { ?>
                            <td></td>
                            <?php } ?>
                            <?php if($is_kieuhienthi){ ?>
                            <td class="text-center cls_timkiem"></td>
                            <?php } ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_2, 1)?>></label>
                              </div>
                            </td>
                            <?php if(isset($_SESSION['admin'])){ ?>
                            <td class="text-center"></td>
                            <?php } ?>
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                          </tr>
                          <?php } ?>
                          <!--  -->
                        <?php }  ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div> 
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>