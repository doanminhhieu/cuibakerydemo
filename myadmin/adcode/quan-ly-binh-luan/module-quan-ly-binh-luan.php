<?php
    $table      = '#_binhluan';
    $table_slug = str_replace("#_", "", $table);
    if(isset($_GET['del']))
    {
      $sql_se   = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1"); 

      if(mysql_num_rows($sql_se) > 0)
      {
        DB_que("DELETE FROM $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");
        DB_que("DELETE from $table WHERE `id_parent`  = '".$row_1['id']."' LIMIT 1");
        //xoa pr child
        $_SESSION['show_message_on'] = 'Xóa bình luận thành công';
      } 
      else $_SESSION['show_message_off'] = 'Dữ liệu không hợp lệ!';
      LOCATION_js($url_page);
      exit();
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
      {
        for($i=1;$i <= $_REQUEST['maxvalu'];$i++)
          {
            $idofme     = $_POST["idme$i"];
            $showhi     = isset($_POST["showhi_$i"]) ? "1": "0"; 

            if(isset($_POST["xoa_gr_arr_$i"])){
              //xoa
              DB_que("DELETE FROM $table WHERE `id` ='".$idofme."' LIMIT 1");
              DB_que("DELETE FROM $table WHERE `id_parent` ='".$idofme."' LIMIT 1");
              //
            }
          }
          $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
      }


    // $sql        = DB_que("SELECT * FROM `$table`  ORDER BY `id` DESC ");
    // $sql_array  =  array();
    // while ($r   = mysql_fetch_assoc($sql)) {
    //   $sql_array[] = $r;
    // }
    
    $mo       = '';
    $uri      = '';
    $numview  = 50;


    $pz  = 0;
    $pzz = 0;

    if(isset($_GET['pz'])){
      $pz       = $_GET['pz'];
      if($pz    == "" || $pz == 0)  $pzz = 0;
      else $pzz = $pz * $numview;
    }
 
    $sql     = DB_que("SELECT * FROM `$table` ORDER BY  `id` DESC LIMIT $pzz,$numview");
    $sql_num = DB_que("SELECT * FROM `$table`");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);
?>
<section class="content-header">
    <h1> Quản lý bình luận</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý bình luận</li>
    </ol>
</section>

<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Quản lý bình luận
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <!-- <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> -->
                        </h3>
                    </div>
                    <style>
                      .hide_url{display: none}
                      /*.table-danhsach tr:hover .hide_url{display: block}*/
                    </style>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w100 text-center">Ngày đăng</th>
                            <th class="w100 text-center">Hiển thị</th>
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
                            $member             = DB_fet("*","#_members","`phanquyen` = 0","","","arr",1);

                            while ($rows = mysql_fetch_assoc($sql))
                            {
                              // if($rows['id_parent'] != 0) continue;
                              $cl++;

                              $ida                = SHOW_text($rows['id']);
                              foreach ($rows as $key => $value) {
                                ${$key} = SHOW_text($value);
                              }

                              $sanpham = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '".$rows['id_sp']."' LIMIT 1");
                              $sanpham = mysql_fetch_assoc($sanpham);
                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <?=$cl?>
                            </td>
                              
                            <td>
                              <div><b><?=SHOW_text($tenbaiviet_vi) ?></b></div>
                              <div><a style="font-size: 12px; display: block;" href="../<?=$sanpham['seo_name'] ?>/" target="_blank"><?=SHOW_text($sanpham['tenbaiviet_vi']) ?></a></div>
                              <?php //if($uid != 0){ ?>
                              <!-- <p style="margin: 5px 0;">
                                <a style="display: block; font-size: 10px; color: #fb1919;" href="?module=quan-ly-thanh-vien&action=danh-sach-thanh-vien&edit=<?=$uid ?>" target='_blank'><?=@$member[$uid]['hoten'] ?> - <?=@$member[$uid]['email'] ?></a>
                              </p> -->
                              <?php //} ?>
                              <p><a style="cursor: pointer; font-size: 12px; color: #4CAF50;" onclick="show_binhtluan('<?=$ida ?>')">Xem bình luận</a></p>
                              <div class="hide_url hide_url<?=$ida ?>" style="color: #585858; font-size: 12px;"><?=$noidung_vi ?></div>
                            </td>
                            <td class="text-center"><?=date("d-m-Y H:i", $ngay_dang) ?></td>
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
                          <!-- <a href="<?=$url_page ?>&them-moi=true&step=<?=$step?>&id_step=<?=$id_step?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> -->
                      </h3>
                    </div> 
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<script>
  function show_binhtluan(id) {
    $(".hide_url").hide();
    $(".hide_url"+id).show();
  }
</script>