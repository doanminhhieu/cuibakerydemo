<?php
  $table = '#_lienket';
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-quan-ly-link-add.php";
  }else{

    if(isset($_REQUEST['list_id_edit'])) {
      foreach ($_POST['list_id_edit'] as $idofme) {
        $tenbaiviet_vi  = isset($_POST["tenbaiviet_vi".$idofme]) ? $_POST["tenbaiviet_vi".$idofme] : "";
        $lien_ket       = isset($_POST["lien_ket".$idofme]) ? $_POST["lien_ket".$idofme] : "";

        $showhi         = isset($_POST["showhi".$idofme]) ? "1": "0";

        if(isset($_POST["xoa_gr_arr_".$idofme])){
            DB_que("DELETE from $table WHERE id='".$idofme."' LIMIT 1");
          }
          else{
            $tenbaiviet_vi = mb_strtolower($tenbaiviet_vi);
            $tenbaiviet_vi =str_replace("http://", "", $tenbaiviet_vi);
            $tenbaiviet_vi =str_replace("https://", "", $tenbaiviet_vi);
            $tenbaiviet_vi =str_replace($_SERVER['HTTP_HOST'], "", $tenbaiviet_vi);
            $data          = array();
            $data['tenbaiviet_vi']  = @$tenbaiviet_vi;
            $data['lien_ket']       = @$lien_ket;
            $data['showhi']         = $showhi;

            ACTION_db($data, $table, 'update', NULL, "`id` = '".$idofme."'");
          }
      }
 
      $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }

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


    $sql     = DB_que("SELECT * FROM `$table` ORDER BY `id` DESC LIMIT $pzz,$numview");
    $sql_num = DB_que("SELECT * FROM `$table` WHERE 1 $mo ");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);
?>
<section class="content-header">
    <h1>Quản lý link 301</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý link 301</li>
    </ol>
</section>
<form action="" method="post" enctype='multipart/form-data'>
  <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                        <h2 class="h2_title"> <i class="fa fa-pencil-square-o"></i> Danh sách </h2>
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
                              </label>
                            </th>
                          </tr>
                          <?php
                            $cl = 0;
                            while($rows = mysql_fetch_array($sql))
                            {
                              foreach ($rows as $key => $value) {
                                ${$key} = $value;
                              }

                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="list_id_edit[]" value="<?=$id?>" type="hidden">
                              <?=$cl + 1 ?>
                            </td>
                            
                            <td>
                              <div class="name">
                                <input type="text" name="tenbaiviet_vi<?=$id ?>" class="cls_emty_name" value="<?=$tenbaiviet_vi?>" placeholder="Link nguồn..." >
                              </div>
                              <div class="name" id="en">
                                <input type="text" name="lien_ket<?=$id ?>" class="cls_emty_name" value="<?=$lien_ket ?>" placeholder="Link đến..."  >
                              </div>
                              <p style="font-size: 10px; color: rgba(41, 127, 202, 0.55); margin: 0; margin-top: 2px;">Thự hiện: <?=number_format($thuc_hien) ?> -  Lần cuối: <?=date("d-m-Y H:i:s", $lan_cuoi) ?></p>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input type="checkbox" name="showhi<?=$id  ?>" value="1" <?=(($showhi == 1) ? "checked='checked'" : "" )?> class="minimal minimal_click" colum="showhi" idcol="<?=$id ?>" table="<?=$table ?>" value='1' ></label>
                                </div>
                            </td>
                            <td class="text-center">
                              <input name='xoa_gr_arr_<?=$id ?>' type='checkbox' class='minimal cls_showxoa'>
                            </td>
                          </tr>
                          <?php
                                $cl++;
                              }
                          ?> 
                        </tbody>
                      </table>
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
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>