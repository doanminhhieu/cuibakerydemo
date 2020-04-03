<?php
    $table      = '#_ship_khuvuc';
    $table_slug = str_replace("#_", "", $table);
    if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-dia-diem-add.php";
    }
    else{
    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme     = $_POST["idme$i"];
            $data                   = array();

 
            if(isset($_POST["xoa_gr_arr_$i"])){
              //xoa
              $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1"); 

              if(mysql_num_rows($sql_se) > 0)
              {

                DB_que("DELETE FROM $table WHERE `id` ='".$idofme."' LIMIT 1");
                //xoa pr child
                $sql_se_c1    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$idofme."'");
                while ($row_1   = mysql_fetch_array($sql_se_c1)) 
                  {
                    DB_que("DELETE from $table WHERE `id`  = '".$row_1['id']."' LIMIT 1");
                    //xoa cap 2
                    $sql_se_c2    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_1['id']."'");
                    while ($row_2   = mysql_fetch_array($sql_se_c2)) 
                      {
                        DB_que("DELETE from $table WHERE `id`  = '".$row_2['id']."' LIMIT 1");
                        //xoa cap 3
                        $sql_se_c3    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_2['id']."'");
                        while ($row_3 = mysql_fetch_array($sql_se_c3)) 
                          {
                            DB_que("DELETE FROM $table WHERE `id` = '".$row_3['id']."' LIMIT 1");
                            //xoa cap 3
                            $sql_se_c4    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_3['id']."'");
                            while ($row_4   = mysql_fetch_array($sql_se_c4)) 
                              {
                                DB_que("DELETE FROM $table WHERE `id` = '".$row_4['id']."' LIMIT 1");
                              }
                            //end
                          }
                        //end
                      }
                    //end
                  }
                //
              }
              //
            }
          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }

    $numview  = 1;
    $pz  = 0;
    $pzz = 0;

    if(isset($_GET['pz'])){
      $pz       = $_GET['pz'];
      if($pz    == "" || $pz == 0)  $pzz = 0;
      else $pzz = $pz * $numview;
    }

    $sql     = DB_que("SELECT * FROM `$table` WHERE `id_parent`= 0 ORDER BY `catasort` ASC LIMIT $pzz,$numview");
    $sql_num = DB_que("SELECT * FROM `$table` WHERE `id_parent`= 0 ");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);

    $sql_2        = DB_que("SELECT * FROM `$table`   ORDER BY `catasort` ASC ");
    $sql_array  =  array();
    while ($r   = mysql_fetch_assoc($sql_2)) {
      $sql_array[] = $r;
    }
?>
<section class="content-header">
    <h1> Danh sách địa điểm</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách địa điểm</li>
    </ol>
</section>
<style>
  .td_hover:hover .p_hover{display: block !important}
</style>
<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Danh sách địa điểm
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w100 text-center">Hiển thị</th>
                            <th class="w50 text-center">
                              <label>
                                <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                <input type="hidden" name="token" value="<?=GET_token() ?>">
                              </label>
                            </th>
                          </tr>
                          <?php
                            $readonly = "";
                            if (empty($_SESSION['admin'])) $readonly = ' disabled="disabled"';

                            $cl                 = 0;
                            $token              = GET_token();
                            while($rows = mysql_fetch_assoc($sql)){
                              $cl++;

                              $ida                = SHOW_text($rows['id']);
                              foreach ($rows as $key => $value) {
                                ${$key}         = SHOW_text($value);
                              }
                              $catasort           = number_format($catasort,0,',','.');

                          ?>
                          <tr class="td_hover">
                            <td class="text-center ">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$ida ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            
                            <td>
                              <div class="name">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi ?></a>
                              </div>
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
                          <!-- c1 -->
                          <?php 
                            foreach ($sql_array as $rows_1) 
                            {

                              if($rows_1['id_parent'] != $rows['id']) continue;
                              $cl++;
                              $ida_1                  = $rows_1['id'];
                              foreach ($rows_1 as $key  => $value) {
                                ${$key.'_1'}          = SHOW_text($value);
                              }
                              $catasort_1             = number_format($catasort_1,0,',','.');
                          ?>
                          <tr>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida_1?>" type="hidden">
                              <input type="text" class="text-center" value="<?=$catasort_1 ?>" onchange="UPDATE_colum(this, '<?=$ida_1 ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            <td>
                              <span class="sp-list-cap1">╚═►</span>
                              <div class="name name_list_cap_1">
                                <a href="<?=$url_page ?>&edit=<?=$ida_1 ?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi_1 ?></a>
                              </div>
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
                          <!-- c3 -->
                              <?php 
                                foreach ($sql_array as $rows_3)  {
                                  if($rows_3['id_parent'] != $rows_1['id']) continue;
                                  $cl++;
                                  $ida_3                = $rows_3['id'];
                                  foreach ($rows_3 as $key  => $value) {
                                    ${$key.'_3'}          = SHOW_text($value);
                                  }
                                  $catasort_3             = number_format($catasort_3,0,',','.');
                              ?>
                              <tr>
                                
                                <td class="text-center">
                                  <input name="idme<?=$cl?>" value="<?=$ida_3?>" type="hidden">
                                  <input type="text" class="text-center" value="<?=$catasort_3 ?>" onchange="UPDATE_colum(this, '<?=$ida_3 ?>', 'catasort','<?=$table ?> ')">
                                </td>
                                <td>
                                  <span class="sp-list-cap3">╚═►</span>
                                  <div class="name name_list_cap_3">
                                    <a href="<?=$url_page ?>&edit=<?=$ida_3 ?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi_3 ?></a>
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
                        <?php  } ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <div class="paging_simple_numbers">
                        <ul class="pagination">
                          <?php
                            PHANTRANG_admin($numshow, $url_page, $pz);
                          ?>
                        </ul>
                      </div>
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
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