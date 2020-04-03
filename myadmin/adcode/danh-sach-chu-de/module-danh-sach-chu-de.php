<?php
  $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '$step' LIMIT 1");
  $thongtin_step = mysql_fetch_assoc($thongtin_step);
  if(isset($_GET['upload']) && (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-chu-de-upload.php";
  }
  else if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-chu-de-add.php";
  }
  else{
    $table      = '#_danhmuc';
    $table_slug = str_replace("#_", "", $table);

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme     = $_POST["idme$i"];
            $data                   = array();

            if(isset($_POST["coppy_row$i"])){
              COPPY_row($table, $idofme, $step);
            }

            if(isset($_SESSION['admin']) && isset($_POST["id_parent$i"])){
              $id_parent                = @$_POST["id_parent$i"];
              $data['id_parent']        = $id_parent;

            }
            if(isset($_POST["xoa_gr_arr_$i"]))
            {
              //xoa
              $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1"); 
              if(mysql_num_rows($sql_se) > 0)
              {
                $icon         = @mysql_result($sql_se,0,'icon');
                $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
                $del_name     = @mysql_result($sql_se,0,'tenbaiviet_vi');
                $id           = @mysql_result($sql_se,0,'id');

                @unlink("../".$duongdantin."/".$icon);
                @unlink("../".$duongdantin."/thumb_".$icon);
                @unlink("../".$duongdantin."/thumbnew_".$icon);

                DB_que("DELETE FROM `#_slug` WHERE `id_bang`='".$idofme."' AND `bang` = '$table_slug' LIMIT 1", "#_slug");
                DB_que("DELETE FROM $table WHERE `id` ='".$idofme."' LIMIT 1", $table);
                //xoa pr child
                $sql_se_c1    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$idofme."'");
                while ($row_1   = mysql_fetch_array($sql_se_c1)) 
                  {
                    @unlink("../".$row_1['duongdantin']."/".$row_1['icon']);
                    @unlink("../".$row_1['duongdantin']."/thumb_".$row_1['icon']);
                    @unlink("../".$row_1['duongdantin']."/thumbnew_".$row_1['icon']);
                    DB_que("DELETE from `#_slug` WHERE `id_bang` = '".$row_1['id']."' AND `bang` = '$table_slug' LIMIT 1", "#_slug");
                    DB_que("DELETE from $table WHERE `id`  = '".$row_1['id']."' LIMIT 1", $table);
                    //xoa cap 2
                    $sql_se_c2    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_1['id']."'");
                    while ($row_2   = mysql_fetch_array($sql_se_c2)) 
                      {
                        @unlink("../".$row_2['duongdantin']."/".$row_2['icon']);
                        @unlink("../".$row_2['duongdantin']."/thumb_".$row_2['icon']);
                        @unlink("../".$row_2['duongdantin']."/thumbnew_".$row_2['icon']);
                        DB_que("DELETE from `#_slug` WHERE `id_bang` = '".$row_2['id']."' AND `bang` = '$table_slug' LIMIT 1", "#_slug");
                        DB_que("DELETE from $table WHERE `id`  = '".$row_2['id']."' LIMIT 1", $table);
                        //xoa cap 3
                        $sql_se_c3    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_2['id']."'");
                        while ($row_3 = mysql_fetch_array($sql_se_c3)) 
                          {
                            @unlink("../".$row_3['duongdantin']."/".$row_3['icon']);
                            @unlink("../".$row_3['duongdantin']."/thumb_".$row_3['icon']);
                            @unlink("../".$row_3['duongdantin']."/thumbnew_".$row_3['icon']);
                            DB_que("DELETE from `#_slug` WHERE `id_bang`='".$row_3['id']."' AND `bang` = '$table_slug' LIMIT 1", "#_slug");
                            DB_que("DELETE FROM $table WHERE `id` = '".$row_3['id']."' LIMIT 1", $table);
                            //xoa cap 3
                            $sql_se_c4    = DB_que("SELECT * FROM `$table` WHERE `id_parent`='".$row_3['id']."'");
                            while ($row_4   = mysql_fetch_array($sql_se_c4)) 
                              {
                                @unlink("../".$row_4['duongdantin']."/".$row_4['icon']);
                                @unlink("../".$row_4['duongdantin']."/thumb_".$row_4['icon']);
                                @unlink("../".$row_4['duongdantin']."/thumbnew_".$row_4['icon']);
                                DB_que("DELETE FROM `#_slug` WHERE `id_bang`='".$row_4['id']."' AND `bang` = '$table_slug' LIMIT 1", "#_slug");
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
            else{
              $hinhanh      = UPLOAD_image("upload_$i", "../".$duongdantin."/", time());
              if($hinhanh != false)
              {
                $data['icon'] = $hinhanh;
                if($_POST['anh_sp_'.$i] != ''){
                  $anh_sp = explode("x", $_POST['anh_sp_'.$i]);
                  $wid    = $anh_sp[0];
                  $hig    = $anh_sp[1];
                  TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, $wid, $hig, "images/trang_".$wid."_".$hig.".png");
                }
                else{
                    TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 500, 500);
                } 
                TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumbnew_".$hinhanh, 300, 300);

                $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
                $sql_thongtin = mysql_fetch_assoc($sql_thongtin);

                @unlink("../".$sql_thongtin["duongdantin"]."/".$sql_thongtin["icon"]);
                @unlink("../".$sql_thongtin["duongdantin"]."/thumb_".$sql_thongtin["icon"]);
                @unlink("../".$sql_thongtin["duongdantin"]."/thumbnew_".$sql_thongtin["icon"]);
              }
              ACTION_db($data, $table, 'update', NULL, "`id` = '$idofme' ");
              
            }
          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }
    $mo       = '';
    $uri      = '';
    $numview  = 25;

    $pz  = 0;
    $pzz = 0;

    if(isset($_GET['pz'])){
      $pz       = $_GET['pz'];
      if($pz    == "" || $pz == 0)  $pzz = 0;
      else $pzz = $pz * $numview;
    }
    $sql     = DB_que("SELECT * FROM `$table` WHERE `step`='".$step."'  AND `id_parent` = 0  ORDER BY `catasort` ASC LIMIT $pzz,$numview");
    $sql_num = DB_que("SELECT * FROM `$table` WHERE `step`='".$step."'  AND `id_parent` = 0 ");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);


    $sql_2        = DB_que("SELECT * FROM `$table` WHERE  `step` = '".$step."'  ORDER BY `catasort` ASC ");

    $sql_array  =  array();
    while ($r   = mysql_fetch_assoc($sql_2)) {
      $sql_array[] = $r;
    }
 

    $check_dm_tb       = DB_que("SELECT * FROM `#_module_setting` WHERE `id` = '6' LIMIT 1");
    $check_dm_tb       = mysql_fetch_assoc($check_dm_tb);
    $check_dm_tb       = explode(",", $check_dm_tb['ten_key']);

    $name_title    = "Danh sách chủ đề";
?>
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a onclick="LOAD_sort()" class="cur load_okkk">[SORT]</a> <?php } ?> <?=$name_title ?></h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active"><?=$name_title ?></li>
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
<form id="form_submit" name="form_submit" action="" method="post" enctype='multipart/form-data'>
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> <?=GETNAME_step($step)?>
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <?php if(in_array($step, $check_anh_dm)){ ?>
                            <th class="w100 text-center">Hình ảnh</th>
                            <?php } ?>
                            <?php 
                              if(in_array($step, $check_dm_tb)){
                            ?>
                            <th class="w150 text-center">Tiêu biểu</th>
                            <?php } ?>
                            <th class="w100 text-center">Hiển thị</th>
                            <!-- <th class="w120 text-center">Tác vụ</th> -->
                            <th class="w50 text-center">
                              <label>
                                <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                <input type="hidden" name="token" value="<?=GET_token() ?>">
                              </label>
                            </th>
                          </tr>
                          <?php
                            $cl                 = 0;
                            $token              = GET_token();
                            // foreach ($sql_array as $rows) 
                            while ($rows = mysql_fetch_assoc($sql)) {
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
                                <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$ida?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi ?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
                              </div>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <?=LAY_chude($id_parent, $step, 'id_parent'.$cl, 'form-control', 0, $id_step, $ida, 'true', 0) ?>
                              <?php } ?>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <label>
                                <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                              </label>
                              <?php } ?>
                            </td>
                            <?php if(in_array($step, $check_anh_dm)){ ?>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/thumb_".$icon ?>'>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <input type="file" name="upload_<?=$cl?>">
                              <input type="hidden" name="anh_sp_<?=$cl?>" value="<?=!empty($thongtin_step['size_img_dm']) && $thongtin_step['size_img_dm'] != '' ? $thongtin_step['size_img_dm'] : '' ?>">
                              <?php } ?>
                            </td>
                            <?php } ?>
                            <?php if(in_array($step, $check_dm_tb)){ ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt, 1)?>></label>
                              </div>
                            </td>
                            <?php } ?>
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
                                <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$ida_1 ?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi_1 ?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en_1 ?></p>

                              </div>
                               
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <?=LAY_chude($id_parent_1, $step, 'id_parent'.$cl, 'form-control', 0, $id_step, $ida_1, 'true', 0) ?>
                              <?php } ?>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <label>
                                <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                              </label>
                              <?php } ?>
                            </td>
                            <?php if(in_array($step, $check_anh_dm)){ ?>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows_1['duongdantin']."/thumb_".$icon_1 ?>'>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <input type="file" name="upload_<?=$cl?>">
                              <input type="hidden" name="anh_sp_<?=$cl?>" value="<?=!empty($thongtin_step['size_img_dm']) && $thongtin_step['size_img_dm'] != '' ? $thongtin_step['size_img_dm'] : '' ?>">
                              <?php } ?>
                            </td>
                            <?php } ?>

                            <?php if(in_array($step, $check_dm_tb)){ ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$ida_1 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt_1, 1)?>></label>
                              </div>
                            </td>
                            <?php } ?>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_1 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_1, 1)?>></label>
                                </div>
                            </td>
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
                                  <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$ida_2 ?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi_2 ?></a>
                                  <p class="p_lang_en"><?=$tenbaiviet_en_2 ?></p>
                                </div>
                                <?php if(isset($_SESSION['admin'])){ ?>
                                <?=LAY_chude($id_parent_2, $step, 'id_parent'.$cl, 'form-control', 0, $id_step, $ida_2, 'true', 0) ?>
                                <?php } ?>
                                <?php if(isset($_SESSION['admin'])){ ?>
                                <label>
                                  <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                                </label>
                                <?php } ?>
                              </td>
                              <?php if(in_array($step, $check_anh_dm)){ ?>
                              <td class="text-center">
                                <img class='img_show_ds' src='<?=$fullpath."/".$rows_2['duongdantin']."/thumb_".$icon_2 ?>'>
                                <?php if(isset($_SESSION['admin'])){ ?>
                                <input type="file" name="upload_<?=$cl?>">
                                <input type="hidden" name="anh_sp_<?=$cl?>" value="<?=!empty($thongtin_step['size_img_dm']) && $thongtin_step['size_img_dm'] != '' ? $thongtin_step['size_img_dm'] : '' ?>">
                                <?php } ?>
                              </td>
                              <?php } ?>
                              <?php if(in_array($step, $check_dm_tb)){ ?>
                              <td class="text-center">
                                <div id="cus" class="cus_menu">
                                  <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt_2, 1)?>></label>
                                </div>
                              </td>
                              <?php } ?>
                              <td class="text-center">
                                <div id="cus" class="cus_menu">
                                  <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida_2 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi_2, 1)?>></label>
                                  </div>
                              </td>

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
                                    <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$ida_3 ?>" title="<?=luu_lai ?>"><?=$tenbaiviet_vi_3 ?></a>
                                    <p class="p_lang_en"><?=$tenbaiviet_en_3 ?></p>
                                  </div>
                                   
                                  <?php if(isset($_SESSION['admin'])){ ?>
                                  <?=LAY_chude($id_parent_3, $step, 'id_parent'.$cl, 'form-control', 0, $id_step, $ida_3, 'true', 0) ?>
                                  <?php } ?>
                                  <?php if(isset($_SESSION['admin'])){ ?>
                                  <label>
                                    <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                                  </label>
                                  <?php } ?>
                                </td>
                                <?php if(in_array($step, $check_anh_dm)){ ?>
                                <td class="text-center">
                                  <img class='img_show_ds' src='<?=$fullpath."/".$rows_3['duongdantin']."/thumb_".$icon_3 ?>'>
                                  <?php if(isset($_SESSION['admin'])){ ?>
                                  <input type="file" name="upload_<?=$cl?>">
                                  <input type="hidden" name="anh_sp_<?=$cl?>" value="<?=!empty($thongtin_step['size_img_dm']) && $thongtin_step['size_img_dm'] != '' ? $thongtin_step['size_img_dm'] : '' ?>">
                                  <?php } ?>
                                </td>
                                <?php } ?>
                                <?php if(in_array($step, $check_dm_tb)){ ?>
                                <td class="text-center">
                                  <div id="cus" class="cus_menu">
                                    <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$ida_3 ?>" table="<?=$table ?>" value='1' <?=LAY_checked($opt_3, 1)?>></label>
                                  </div>
                                </td>
                                <?php } ?>
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
                            PHANTRANG_admin($numshow, $url_page."&step=$step&id_step=$id_step", $pz, $uri);
                          ?>
                        </ul>
                      </div>
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div>
                    <!--  -->
                      <div class="dv-show-setting">
                        <?=admin_input_setting(6) ?>
                        <?=admin_input_setting(47) ?>
                        <?=admin_input_setting(48) ?>
                        <?=admin_input_setting(60) ?>
                        <?=admin_input_setting(61) ?>
                        <div class="clr"></div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>