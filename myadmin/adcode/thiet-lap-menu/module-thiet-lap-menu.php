<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-thiet-lap-menu-add.php";
  }else{
    $table      = '#_menu';
    $table_slug = str_replace("#_", "", $table);


    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme     = $_POST["idme$i"];

            if(isset($_POST["xoa_gr_arr_$i"])){
              //xoa
              $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1"); 
              if(mysql_num_rows($sql_se) > 0)
              {
                $icon         = @mysql_result($sql_se,0,'icon');
                $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
                $id           = @mysql_result($sql_se,0,'id');

                DB_que("DELETE FROM $table WHERE `id` ='".$idofme."' LIMIT 1", $table);
                //xoa pr child
                $sql_se_c1    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$idofme."'");
                while ($row_1   = mysql_fetch_array($sql_se_c1)) 
                  {
                    DB_que("DELETE from $table WHERE `id`  = '".$row_1['id']."' LIMIT 1", $table);
                    //xoa cap 2
                    $sql_se_c2    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_1['id']."'");
                    while ($row_2   = mysql_fetch_array($sql_se_c2)) 
                      {
                        DB_que("DELETE from $table WHERE `id`  = '".$row_2['id']."' LIMIT 1", $table);
                        //xoa cap 3
                        $sql_se_c3    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_2['id']."'");
                        while ($row_3 = mysql_fetch_array($sql_se_c3)) 
                          {
                            DB_que("DELETE FROM $table WHERE `id` = '".$row_3['id']."' LIMIT 1", $table);
                            //xoa cap 3
                            $sql_se_c4    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_3['id']."'");
                            while ($row_4   = mysql_fetch_array($sql_se_c4)) 
                              {
                                DB_que("DELETE FROM $table WHERE `id` = '".$row_4['id']."' LIMIT 1", $table);
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


    $sql        = DB_que("SELECT * FROM `$table` ORDER BY `catasort` ASC ");
    $sql_array  =  array();
    while ($r   = mysql_fetch_assoc($sql)) {
      $sql_array[] = $r;
    }

?>
<section class="content-header">
    <h1> Danh sách menu</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách menu</li>
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
                          <i class="fa fa-pencil-square-o"></i> Thiết lập menu
                      </h2>
                      <h3 class="box-title box-title-td pull-right">
                        <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach table-menu">
                        <tbody>
                          <tr>
                            
                            <th class="w80 text-center">STT</th>
                            <th>Menu</th>
                            <?php if(!empty($st_anhmenu) && $st_anhmenu == 1){ ?>
                            <th class="w100 text-center">Hình ảnh</th>
                            <?php } ?>
                            <th class="w100 text-center">Hiển thị</th>
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

                              $ida              = $rows['id'];
                              foreach ($rows as $key => $value) {
                                ${$key}         = SHOW_text($value);
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
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en?></p>
                              </div>
                              
                            </td>
                            <?php if(!empty($st_anhmenu) && $st_anhmenu == 1){ ?>
                            <td class="text-center"></td>
                            <?php } ?>
    
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                </div>
                            </td>
                            <!-- <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="<?=luu_lai ?>"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida.'&token='.GET_token() ?>" class="do"  onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td> -->
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
                                <a href="<?=$url_page ?>&edit=<?=$ida_1?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi_1?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en_1 ?></p>
                              </div>
                              
                            </td>
                            <?php if(!empty($st_anhmenu) && $st_anhmenu == 1){ ?>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$duongdantin_1."/thumb_".$icon_1 ?>'>
                            </td>
                            <?php } ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_1 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_1, 1)?>></label>
                                </div>
                            </td>
                            <!-- <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida_1?>" title="<?=luu_lai ?>"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida_1.'&token='.GET_token() ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td> -->
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                          </tr>
                            <!-- c2 -->
                            <?php 
                              foreach ($sql_array as $rows_2) 
                              {
                                if($rows_2['id_parent'] != $rows_1['id']) continue;
                                $cl++;
                                $ida_2                  = $rows_2['id'];
                                foreach ($rows_2 as $key  => $value) {
                                  ${$key.'_2'}          = SHOW_text($value);
                                }
                                $catasort_2             = number_format($catasort_2,0,',','.');
                            ?>
                            <tr>
                              
                              <td class="text-center">
                                <input name="idme<?=$cl?>" value="<?=$ida_2?>" type="hidden">
                                <input type="text" class="text-center" value="<?=$catasort_2 ?>" onchange="UPDATE_colum(this, '<?=$ida_2 ?>', 'catasort','<?=$table ?> ')">
                              </td>
                              <td>
                                <span class="sp-list-cap2">╚═►</span>
                                <div class="name name_list_cap_2">
                                  <a href="<?=$url_page ?>&edit=<?=$ida_2?>" title="<?=luu_lai ?>" ><?=$tenbaiviet_vi_2?></a>
                                  <p class="p_lang_en"><?=$tenbaiviet_en_2 ?></p>
                                </div>
                                 
                              </td>
                              <?php if(!empty($st_anhmenu) && $st_anhmenu == 1){ ?>
                              <td class="text-center"></td>
                              <?php } ?>
                              <td class="text-center">
                                <div id="cus" class="cus_menu">
                                  <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_2, 1)?>></label>
                                  </div>
                              </td>
                              <!-- <td class="text-center">
                                  <a href="<?=$url_page ?>&edit=<?=$ida_2?>" title="<?=luu_lai ?>" ><i class="fa fa-pencil-square-o"></i></a>
                                  <a href="<?=$url_page.'&del=ok&catalogid='.$ida_2.'&token='.GET_token() ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                              </td> -->
                              <td class="text-center">
                                <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                              </td>
                            </tr>
                              <!-- c3 -->
                              <?php 
                                foreach ($sql_array as $rows_3) 
                                {
                                  if($rows_3['id_parent'] != $rows_2['id']) continue;
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
                                    <a href="<?=$url_page ?>&edit=<?=$ida_3?>" title="<?=luu_lai ?>" ><?=$tenbaiviet_vi_3?></a>
                                    <p class="p_lang_en"><?=$tenbaiviet_en_3 ?></p>
                                  </div>
                                  
                                </td>
                                <?php if(!empty($st_anhmenu) && $st_anhmenu == 1){ ?>
                                <td class="text-center"></td>
                                <?php } ?>
                                <td class="text-center">
                                  <div id="cus" class="cus_menu">
                                    <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_3 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_3, 1)?>></label>
                                    </div>
                                </td>
                                <!-- <td class="text-center">
                                    <a href="<?=$url_page ?>&edit=<?=$ida_3?>" title="<?=luu_lai ?>" ><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?=$url_page.'&del=ok&catalogid='.$ida_3.'&token='.GET_token() ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                                </td> -->
                                <td class="text-center">
                                  <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                                </td>
                              </tr>
                              <?php } ?>
                              <!--  -->
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