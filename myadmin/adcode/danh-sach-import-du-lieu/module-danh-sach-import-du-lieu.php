<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-import-du-lieu-add.php";
  }else{
    $table = '#_file_import_data';
    if(isset($_GET['del'])) {
        $sql_se               = DB_que("SELECT * FROM `$table` WHERE `id`='".@$_GET['catalogid']."' LIMIT 1");
        $file_excel           = SHOW_text(@mysql_result($sql_se,0,'file_excel'));
        $duongdantin          = SHOW_text(@mysql_result($sql_se,0,'duongdantin'));
        $del_name             = SHOW_text(@mysql_result($sql_se,0,'tenbaiviet_vi'));
        @unlink("../".$duongdantin."/".$file_excel);
        DB_que("DELETE from $table WHERE id='".$_GET['catalogid']."' limit 1");
        $_SESSION['show_message_on'] = 'Đã xóa [<strong>'.$del_name.'</strong>] thành công!';
        LOCATION_js($url_page);
        exit();
    }
    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu'])) {
      for($i=0;$i<$_REQUEST['maxvalu'];$i++) {
          $idofme     = $_POST["idme$i"];
          if(isset($_POST["xoa_gr_arr_$i"])){
          //xoa
            $sql_se               = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
            $file_excel           = @mysql_result($sql_se,0,'file_excel');
            $duongdantin          = @mysql_result($sql_se,0,'duongdantin');
            @unlink("../".$duongdantin."/".$file_excel);
            DB_que("DELETE FROM $table WHERE id='".$idofme."' LIMIT 1");
          //
          }
      }
      $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }

    $numview = 20;
    $pz = 0;
    $pzz = 0;
    if(isset($_GET['pz'])) {
      $pz = $_GET['pz'];
      if($pz     == "" || $pz == 0)  $pzz = 0;
      else      $pzz = $pz * $numview;
    }
    $sql     = DB_que("SELECT * FROM `$table`  ORDER BY `id` DESC LIMIT $pzz,$numview");
    $sql_num = DB_que("SELECT * FROM `$table`  ");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);
?>
<section class="content-header">
    <h1>Danh sách file import dữ liệu</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách file import dữ liệu</li>
    </ol>
</section>
<form action="" method="post" enctype='multipart/form-data'>
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Danh sách file import dữ liệu                    
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
                            <th class="w50 text-center">
                              <label>
                                <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                              </label>
                            </th>
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w200">File</th>
                            <th class="w150 text-center">Ngày đăng</th>
                            <th class="w100 text-center">Tác vụ</th>
                          </tr>
                    <?php
                      $cl = 0;
                      while($rows = mysql_fetch_array($sql))
                      {
                        $ida                = SHOW_text($rows['id']);
                        $ten_vi             = SHOW_text($rows['ten_vi']);
                        $duongdantin        = SHOW_text($rows['duongdantin']);
                        $file_excel         = SHOW_text($rows['file_excel']);
                        $ngay_dang          = SHOW_text($rows['ngay_dang']);
                        $so_lan_import      = SHOW_text($rows['so_lan_import']);
                        $import_cuoi        = SHOW_text($rows['import_cuoi']);

                    ?>
                          <tr>
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <?=($cl+1) ?>
                            </td>
                            <td>
                              <div class="name">
                                <input type="text" name="ten_vi<?=$cl?>" value="<?=$ten_vi?>">
                              </div>
                              <a onclick="IMPORT_data('<?=$ida ?>')" class="cur" style="cursor: pointer;">[Import dữ liệu]</a> 
                              
                            </td>
                            <td >
                              <a href="../<?=$duongdantin ?>/<?=$file_excel ?>" download><?=$file_excel ?></a>
                              <?=!is_file("../$duongdantin/$file_excel") ? '<span style="font-size: 12px; color: #f43636;">(File không tồn tại)<span>' : '' ?>
                              <p style="font-size: 12px; margin-top: 3px; color: #989797;">Số lần import <b><?=$so_lan_import ?></b>. <br/>Import cuối: <?=($import_cuoi != 0) ? date('d-m-Y H:i:s', $import_cuoi) : "" ?></p>
                            </td>
                            <td class="text-center">
                               <?=date('d-m-Y', $ngay_dang) ?>
                            </td>
                            <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida ?>&token=<?=GET_token() ?>" class="do" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                        <?php
                              $cl++;
                            }
                        ?> 
                        </tbody>
                      </table>
                      <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                    </div>
                    <div class="box-header">
                      <div class="paging_simple_numbers">
                        <ul class="pagination">
                          <?php
                            PHANTRANG_admin($numshow, $url_page, $pz, '', '', 20);
                          ?>
                        </ul>
                      </div>
                      <h3 class="box-title box-title-td pull-right">
                        <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>


<style type="text/css">
  .dv-load-import .dv-nd-import-dulieu-cont { height: 245px; overflow-y: auto; border: 1px solid #e2e2e2; padding: 7px; margin-top: 10px; }
  .dv-load-import-cont {display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.38); z-index: 10000;}
  .dv-load-import {display: none; width: 600px; height: 300px; position: fixed; background: #fff; left: 50%; margin-left: -300px; top: 50%; margin-top: -150px; padding: 12px; z-index: 10001; border-radius: 5px; }
  .dv-load-import h3 { margin: 0; padding: 0; font-size: 16px; line-height: 20px; }
  .dv-load-import h3 a { float: right; cursor: pointer; }
  .dv-load-import h3 span img { height: 20px; margin-right: 6px; position: relative; top: -2px; }
  .dv-load-import h3 i{margin-right: 4px}
  .dv-nd-import-dulieu p{margin: 0; padding: 0; margin-bottom: 3px; font-size: 12px; color: #197cb5;}
  .dv-nd-import-dulieu .f{text-decoration: line-through;color: #818181;}
  span.ip_total { font-size: 11px; float: right; margin-right: 10px; color: #737373; }
</style>
<div class="dv-load-import-cont"></div>
<div class="dv-load-import">
  <h3><span class="img"></span><a class="cur" onclick="DONG_import()"><i class="fa fa-times"></i></a><span class="con"><img src="images/loading_apple.gif">Bắt đầu import dữ liệu...</span><span class="ip_total"></span></h3>
  <div class="dv-nd-import-dulieu-cont"><div class="dv-nd-import-dulieu"></div></div>
</div>
<script type="text/javascript">
  var load = 0;
  function IMPORT_data(id){
    if(load == 0){
      var cf = confirm("Bạn chắc import dữ liệu?");
      if(cf){
        $(".dv-load-import-cont").show();
        $(".dv-load-import").show();
        $(".dv-load-import h3 .img").html('<img src="images/loading_apple.gif">');
        $(".dv-load-import h3 .con").html('Bắt đầu import dữ liệu...');
        $(".dv-nd-import-dulieu").html("");
        $(".ip_total").html("");
        $(".n_dong").html("");
        load = 1;
        $.ajax({
          type: "POST",
          url: "index.php",
          data: {"id":id, "action":"import_file"},
          success: function(data){
            console.log(data)
            load = 0;
            $(".dv-nd-import-dulieu").html(data);
            $(".dv-load-import h3 .img").html('');
            $(".dv-load-import h3 .con").html('<i class="fa fa-pencil-square-o"></i>Hoàn thành import dữ liệu ');
          }
        });
      }
    }
  }
  function DONG_import() {
    $(".dv-load-import-cont").hide();
    $(".dv-load-import").hide();
  }
</script>
