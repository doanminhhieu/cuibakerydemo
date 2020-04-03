<?php
  $table = '#_phuongthucthanhtoan';
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-phuong-thuc-thanh-toan-add.php";
  }else{

    if(isset($_POST['is_coppy_sl']) && $_POST['is_coppy_sl'] != 0 && isset($_POST['is_coppy_sl_id']) && $_POST['is_coppy_sl_id'] != 0) {
      
      for ($i=0; $i < $_POST['is_coppy_sl']; $i++) { 
        COPPY_row($table, $_POST['is_coppy_sl_id'], 0);
      }
    }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {
      for($i=0;$i<$_REQUEST['maxvalu'];$i++)
      {
          $idofme     = $_POST["idme$i"];
          $showhi     = isset($_POST["showhi_$i"]) ? "1": "0";

          if(isset($_POST["coppy_row$i"])){
            COPPY_row($table, $idofme, 0);
          }

          if(isset($_POST["xoa_gr_arr_$i"])){
            //xoa
            $sql_se         = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
            $icon           = @mysql_result($sql_se,0,'icon');
            $duongdantin    = @mysql_result($sql_se,0,'duongdantin');
            @unlink("../".$duongdantin."/".$icon);
            @unlink("../".$duongdantin."/thumb_".$icon);
            DB_que("DELETE from $table WHERE id='".$idofme."' limit 1");
            //
          }else{
            if(isset($_SESSION['admin'])){

              $hinhanh            = UPLOAD_image("icon$i", "../".$duongdantin."/", time());
              if($hinhanh != false){
                $wh       = "`icon`='$hinhanh',`duongdantin`='$duongdantin'";
                TAO_anhthumb("../".$duongdantin."/".$hinhanh, "../".$duongdantin."/thumb_".$hinhanh, 200, 200); 
                //xoa anh
                $sql_thongtin = DB_que("SELECT * FROM `$table` WHERE `id`='".$idofme."' LIMIT 1");
                @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/".mysql_result($sql_thongtin, 0, "icon"));
                @unlink("../".mysql_result($sql_thongtin, 0, "duongdantin")."/thumb_".mysql_result($sql_thongtin, 0, "icon"));
                //end
                DB_que("UPDATE `$table` SET  $wh WHERE `id`='$idofme' limit 1");       
              }     
            }
          }
      }
      $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }

    $mo       = '';
    $uri      = '';
    $numview  = 50;

    $s_trangthai = isset($_GET['trang-thai']) && is_numeric($_GET['trang-thai']) ? $_GET['trang-thai'] : 0;
    $s_hienthi   = isset($_GET['hien-thi']) && is_numeric($_GET['hien-thi']) ? $_GET['hien-thi'] : 0;


    $pz  = 0;
    $pzz = 0;

    if(isset($_GET['pz'])){
      $pz       = $_GET['pz'];
      if($pz    == "" || $pz == 0)  $pzz = 0;
      else $pzz = $pz * $numview;
    }
 
    $sql     = DB_que("SELECT * FROM `$table` ORDER BY  `catasort` DESC LIMIT $pzz,$numview");
    $sql_num = DB_que("SELECT * FROM `$table` ");

    $numlist = @mysql_num_rows($sql_num);
    $numshow = ceil($numlist/$numview);
?>
<section class="content-header">
    <h1><?php if(isset($_SESSION['admin'])){ ?><a class="js_okkk" style="cursor: pointer;" onclick="LOAD_sort()">[SORT] <?php } ?></a><?=$loaibanner['tenbaiviet_vi'] ?></h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Phương thức thanh toán</li>
    </ol>
</section>
<script>
  function LOAD_sort(){
    var n_sort = $(".table-danhsach tr").length;
    $(".table-danhsach tr").each(function(index){
      $('td:nth-child(2) input[type="text"]',this).val(index);
      $('td:nth-child(2) input[type="text"]',this).trigger('change');
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
                        <h2 class="h2_title">
                            <i class="fa fa-pencil-square-o"></i> Danh sách
                        </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
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
                            $loaibanner = DB_fet('*',' `#_banner_danhmuc` ', ' `showhi` = 1 ',' `catasort` ASC', '', 'arr');
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
                                <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><?=$tenbaiviet_vi?></a>
                              </div>

                              <?php if(isset($_SESSION['admin'])){ ?>
                              <label>
                                <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
                              </label>
                              <?php } ?>
                            </td>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/".$icon ?>'>
                              <?php if(isset($_SESSION['admin'])){ ?>
                              <input name="icon<?=$cl?>" type="file" class="form-control" id="exampleInputFile">
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
                          <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                      </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>
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