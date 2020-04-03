<?php
  $id_parent  = isset($_GET['id-parent']) ? $_GET['id-parent'] : 0;
  $step_id    = isset($_GET['step']) ? $_GET['step'] : 0;

  //
  $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '$step_id' LIMIT 1");
  $thongtin_step = mysql_fetch_assoc($thongtin_step);

  $tenbv = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '$id_parent' LIMIT 1");
  $tenbv = mysql_fetch_assoc($tenbv);


  $table = '#_baiviet_chitiet';
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-bai-viet-chi-tiet-add.php";
  }else{
 
    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {
      for($i=0;$i<$_REQUEST['maxvalu'];$i++)
      {
          $idofme     = $_POST["idme$i"];
          $showhi     = isset($_POST["showhi_$i"]) ? "1": "0";

          if(isset($_POST["xoa_gr_arr_$i"])){
            //xoa
            $sql_se         = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
            $icon           = @mysql_result($sql_se,0,'icon');
            $duongdantin    = @mysql_result($sql_se,0,'duongdantin');
            @unlink("../".$duongdantin."/".$icon);
            @unlink("../".$duongdantin."/thumb_".$icon);
            DB_que("DELETE FROM $table WHERE id='".$idofme."' LIMIT 1", $table);
            //
          }
          else{
              $hinhanh      = UPLOAD_image("upload_$i", "../".$duongdantin."/", time());
              if($hinhanh != false)
              {
                $data         = array();
                $data['icon'] = $hinhanh;
                $data['duongdantin'] = $duongdantin;
                if($_POST['anh_sp_'.$i] != ''){
                  $anh_sp = explode("x", $_POST['anh_sp_'.$i]);
                  $wid    = $anh_sp[0];
                  $hig    = $anh_sp[1];
                  TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, $wid, $hig, "images/trang_".$wid."_".$hig.".png");
                }
                else{
                    TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 500, 500);
                } 

                $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
                @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
                @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/thumb_".mysql_result($sql_thongtin, 0, "icon"));
                ACTION_db($data, $table, 'update', NULL, "`id` = '$idofme' ");
              }
              
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

    $sql     = DB_que("SELECT * FROM `$table` WHERE `id_parent` = '$id_parent' $mo ORDER BY `catasort` DESC, `id` DESC,  `catasort` DESC LIMIT $pzz,$numview");
    $sql_num = DB_que("SELECT * FROM `$table` WHERE `id_parent` = '$id_parent' $mo ");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);
?>
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a class="js_okkk" style="cursor: pointer;" onclick="LOAD_sort()">[SORT] <?php } ?></a><?=$thongtin_step['tenbaiviet_vi'] ?></h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Bài viết chi tiết</li>
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
   <?php 
    if(isset($_SESSION['admin'])){
  ?>
  <div style=" padding: 0 20px;">
    <input type="text" name="is_coppy_sl_id" value="0" placeholder="ID coppy">
    <input type="text" name="is_coppy_sl" value="0" placeholder="Số lượng coppy">
    <input type="file" name="is_muti_file[]" multiple="multiple">
  </div>
  <?php } ?>
  <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&id-parent=<?=$id_parent."&step=".$step_id ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                          <a href="?module=main-module&action=danh-sach-bai-viet&step=<?=$step_id ?>&id_step=2" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                        </h3>
                        <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> <?=$tenbv['tenbaiviet_vi'] ?>
                        </h2>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            
                            <th class="w80 text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th class="w100 text-center">Hình ảnh</th>
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
                              $ida                = SHOW_text($rows['id']);
                              foreach ($rows as $key => $value) {
                                ${$key} = $value;
                              }
                              $catasort           = number_format($catasort,0,',','.');
                   

                          ?>
                          <tr>
                            
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <input type="text" class="js_sorty text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$ida ?>', 'catasort','<?=$table ?> ')">
                            </td>
                            
                            <td>
                              <div class="name">
                                <a href="<?=$url_page ?>&id-parent=<?=$id_parent."&step=".$step_id ?>&edit=<?=$ida?>" title="Cập nhật"><?=$tenbaiviet_vi?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
                              </div>
                            </td>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/thumb_".$icon ?>'>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <input type="file" name="upload_<?=$cl?>">
                              <input type="hidden" name="anh_sp_<?=$cl?>" value="<?=!empty($thongtin_step['size_img']) && $thongtin_step['size_img'] != '' ? $thongtin_step['size_img'] : '' ?>">
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
                            PHANTRANG_admin($numshow, $url_page, $pz, $uri);
                          ?>
                        </ul>
                      </div>
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&id-parent=<?=$id_parent."&step=".$step_id ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                          <a href="?module=main-module&action=danh-sach-bai-viet&step=<?=$step_id ?>&id_step=2" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                      </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>
 