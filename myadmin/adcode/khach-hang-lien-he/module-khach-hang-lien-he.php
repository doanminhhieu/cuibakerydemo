<?php

  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-khach-hang-lien-he-xem.php";
  }else{
    $table = '#_form_lienhe';
    if(isset($_GET['del']))
    {
      //xoa file
      $file  = DB_que("SELECT * FROM $table WHERE id='".$_GET['catalogid']."' LIMIT 1");
      $file  = mysql_fetch_assoc($file);
      @unlink("../datafiles/post/".$file['file_1']);
      @unlink("../datafiles/post/".$file['file_2']);
      //
      DB_que("DELETE from $table WHERE id='".$_GET['catalogid']."' limit 1");
      $_SESSION['show_message_on'] = 'Đã xóathành công!';
      LOCATION_js($url_page);
      exit();
    }

  if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {
      for($i=0;$i<$_REQUEST['maxvalu'];$i++)
      {
          $idofme     = $_POST["idme$i"];

          if(isset($_POST["xoa_gr_arr_$i"])){
            //xoa file
            $file  = DB_que("SELECT * FROM $table WHERE id='".$idofme."' LIMIT 1");
            $file  = mysql_fetch_assoc($file);
            @unlink("../datafiles/post/".$file['file_1']);
            @unlink("../datafiles/post/".$file['file_2']);
            //
            //xoa
            DB_que("DELETE from $table WHERE id='".$idofme."' limit 1");
            //
          }
      }
      $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }
  
  $mo       = '';
  $uri      = '';
  $numview  = 50;

  $s_trangthai = isset($_GET['trang-thai']) && is_numeric($_GET['trang-thai']) ? $_GET['trang-thai'] : 0;
  $s_hienthi   = isset($_GET['hien-thi']) && is_numeric($_GET['hien-thi']) ? $_GET['hien-thi'] : 0;

  if($s_hienthi == 1)      $numview = 15;
  else if($s_hienthi == 2) $numview = 30;
  else if($s_hienthi == 3) $numview = 60;
  else if($s_hienthi == 4) $numview = 100;
  else if($s_hienthi == 5) $numview = 200;

  $pz  = 0;
  $pzz = 0;

  if(isset($_GET['pz'])){
    $pz       = $_GET['pz'];
    if($pz    == "" || $pz == 0)  $pzz = 0;
    else $pzz = $pz * $numview;
  }

  if($s_trangthai != 0){
    $sta  = $s_trangthai == 1 ? 1 : 0;
    $mo  .= ' AND `showhi`='.$sta.' ';
    $uri .= '&trang-thai='.$s_trangthai;
  }

  $sql      = DB_que("SELECT * FROM `$table` WHERE 1 = 1 $mo ORDER BY `id` DESC LIMIT $pzz,$numview");
  $sql_num  = DB_que("SELECT * FROM `$table` WHERE 1 = 1 $mo ");

  $numlist  = @mysql_num_rows($sql_num);
  $numshow  = ceil($numlist/$numview);
?>
<section class="content-header">
    <h1>Danh sách liên hệ</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý liên hệ</li>
    </ol>
</section>
<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        </h3>
                        <div class="box-tools">
                          <div class="dv-hd-locsds">
                            <div class="form-group">
                                <select name='docid' class="js_trangthai_js form-control" onchange='SEARCH_jsstep()'>
                                    <option selected="selected" value="0">Trạng thái</option>
                                    <option value="1" <?=LAY_selected(1, $s_trangthai) ?>>Đã xem</option>
                                    <option value="2" <?=LAY_selected(2, $s_trangthai) ?>>Chưa xem</option>
                                </select>
                            </div>

                            <div class="form-group">
                              <select class="js_hienthi_ds form-control" onchange='SEARCH_jsstep()'>
                                  <option selected="selected" value="0">Hiển thị</option>
                                  <option value="1" <?=LAY_selected(1, $s_hienthi) ?>>15</option>
                                  <option value="2" <?=LAY_selected(2, $s_hienthi) ?>>30</option>
                                  <option value="3" <?=LAY_selected(3, $s_hienthi) ?>>60</option>
                                  <option value="4" <?=LAY_selected(4, $s_hienthi) ?>>100</option>
                                  <option value="5" <?=LAY_selected(5, $s_hienthi) ?>>200</option>
                              </select>
                            </div>
                            <!-- <div class="form-group">
                              <a href="?module=quan-ly-website&action=khach-hang-lien-he&excel-lh=true&loai=1" style="padding: 8px 12px; display: inline-block; font-size: 11px;">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i> Ứng tuyển
                              </a>
                              <a href="?module=quan-ly-website&action=khach-hang-lien-he&excel-lh=true&loai=2" style="padding: 8px 12px; display: inline-block; font-size: 11px;">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i> Tuyển dụng
                              </a>
                              <a href="?module=quan-ly-website&action=khach-hang-lien-he&excel-lh=true&loai=3" style="padding: 8px 12px; display: inline-block; font-size: 11px;">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i> YC tư vấn
                              </a>
                              <a href="?module=quan-ly-website&action=khach-hang-lien-he&excel-lh=true&loai=0" style="padding: 8px 12px; display: inline-block; font-size: 11px;">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i> Liên hệ
                              </a>
                            </div> -->
                          </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            
                            <th class="w50 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w200 ">IP gửi</th>
                            <th class="w150 ">Ngày gửi</th>
                            <th class="w100 ">Trạng thái</th>
                            <!-- <th class="w100 text-center">Tác vụ</th> -->
                            <th class="w50 text-center">
                              <label>
                                <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                              </label>
                            </th>
                          </tr>
                          <?php
                            $cl = 0;
                            while($rows = mysql_fetch_array($sql))
                            {
                              $ida                = SHOW_text($rows['id']);
                              $tenbaiviet_vi      = SHOW_text($rows['tenbaiviet_vi']);
                              $ip_gui             = SHOW_text($rows['ip_gui']);
                              $ngaydang           = date('d-m-Y H:i', SHOW_text($rows['ngay_dang']));
                              $active             = SHOW_text($rows['showhi']);
                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <?=$cl + 1?>
                            </td>
                            <td >
                              <?=$tenbaiviet_vi?>
                              <p><a href="?module=<?=$module ?>&action=<?=$action ?>&edit=<?=$ida?>">[Xem chi tiết]</a></p>
                            </td>
                            <td>
                              <?=$ip_gui?>
                            </td>
                            <td><?=$ngaydang?></td>
                            <td><?=$active == 1 ? "<p>[Đã xem]</p>" : "<p><a style='color:#3c8dbc' href='?module=".$module."&action=".$action."&edit=".$ida."'>[Chưa xem]</a></p>" ?></td>
                            <!-- <td class="text-center">
                                <a href="?module=<?=$module ?>&action=<?=$action ?>&del=ok&catalogid=<?=$ida ?>&token=<?=GET_token() ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td> -->
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                          </tr>
                        <?php  $cl++; } ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <div class="paging_simple_numbers">
                        <ul class="pagination">
                          <?php
                            PHANTRANG_admin($numshow, $url_page, $pz, $uri);
                          ?>
                        </ul>
                      </div>
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<script type="text/javascript">
    function SEARCH_jsstep() {
        var url              = "";
        if($(".js_trangthai_js").length > 0){
          var js_trangthai_js  = $(".js_trangthai_js").val().trim();
          if(js_trangthai_js != 0) url += "&trang-thai="+js_trangthai_js;
        }
        if($(".js_hienthi_ds").length > 0){
          var js_hienthi_ds    = $(".js_hienthi_ds").val().trim();
          if(js_hienthi_ds != 0) url += "&hien-thi="+js_hienthi_ds;
        }
        window.location.href = "<?=$url_page ?>"+url;
    }
</script>
<?php } ?>