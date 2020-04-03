<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-loai-hinh-anh-add.php";
  }else{
    if(!isset($_SESSION['admin'])) LOCATION_js("index.php");

    $table      = '#_banner_danhmuc';
    if(isset($_GET['del']))
    {
      $sql_se     = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1");
      $del_name   = @mysql_result($sql_se,0,'tenbaiviet_vi');
      DB_que("DELETE from $table WHERE id='".$_GET['catalogid']."' limit 1");
      $_SESSION['show_message_on'] = 'Đã xóa [<strong>'.$del_name.'</strong>] thành công!';
      LOCATION_js($url_page);
      exit();
    }

 
    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {
      for($i=0;$i<$_REQUEST['maxvalu'];$i++)
        {
          $idofme     = $_POST["idme$i"];
          $sort       = $_POST["sortby$i"];
          $tenbv_vi   = $_POST["ncata_vi$i"];
          $showhi     = isset($_POST["showhi_$i"]) ? "1": "0";

          DB_que("UPDATE `$table` SET `tenbaiviet_vi`='$tenbv_vi',`catasort`='$sort',`showhi`='$showhi' WHERE `id`='$idofme' limit 1");
        }
      $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }

  $numview  = 20;
  $pz       = 0;
  $pzz      = 0;
  if(isset($_GET['pz']))
  {
    $pz = $_GET['pz'];
    if($pz     == "" || $pz == 0)  $pzz = 0;
    else      $pzz = $pz * $numview;
  }

  $sql     = DB_que("SELECT * FROM `$table`  ORDER BY `catasort` ASC LIMIT $pzz,$numview");
  $sql_num = DB_que("SELECT * FROM `$table` ");

  $numlist = @mysql_num_rows($sql_num);
  $numshow = ceil($numlist/$numview);
?>
<section class="content-header">
    <h1>Danh sách loại hình ảnh</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách loại hình ảnh</li>
    </ol>
</section>
<form action="" method="post">
  <input type="hidden" name="token" value="<?=GET_token() ?>">
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
              <h2 class="h2_title">
                  <i class="fa fa-pencil-square-o"></i> Danh sách
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
                  <th>Tên loại hình ảnh</th>
                  <th class="w100 text-center">Rộng</th>
                  <th class="w100 text-center">Cao</th>
                  <th class="w100 text-center">Hiển thị</th>
                  <th class="w100 text-center">Tác vụ</th>
                </tr>
                <?php
                  $cl = 0;
                  while($rows = mysql_fetch_assoc($sql))
                  {
                    $ida            = $rows['id'];
                    $catasort       = SHOW_text($rows['catasort']);
                    $tenbaiviet_vi  = SHOW_text($rows['tenbaiviet_vi']);
                    $rong           = SHOW_text($rows['rong']);
                    $cao            = SHOW_text($rows['cao']);
                    $showhi         = SHOW_text($rows['showhi']);
                ?>
                <tr>
                  <td class="text-center">
                    <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                    <input type="text" class="text-center" name="sortby<?=$cl?>" value="<?=$catasort?>">
                  </td>
                  <td>
                    <div class="name">
                      <input type="text" name="ncata_vi<?=$cl?>" value="<?=$tenbaiviet_vi?>">
                    </div>
                  </td>
                  <td class="w100 text-center"><?=$rong?></td>
                  <td class="w100 text-center"><?=$cao?></td>
                  <td class="text-center">
                    <div id="cus" class="cus_menu">
                      <label><input type="checkbox" name="showhi_<?=$cl ?>" value="1" <?=(($showhi == 1) ? "checked='checked'" : "" )?> ></label>
                      </div>
                  </td>
                  <td class="text-center">
                    <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                    <a href="<?=$url_page.'&del=ok&catalogid='.$ida."&token=".GET_token() ?>" class="do"  onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
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
                    PHANTRANG_admin($numshow, $url_page, $pz, '', '', '');
                  ?>
                </ul>
              </div>
              <h3 class="box-title box-title-td pull-right">
                  <button type="submit" name="addgiatri" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                  <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
              </h3>
          </div>
        </div>
      </section>
    </div>
  </section>
</form>
<?php } ?>