<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
      include "module-danh-sach-thanh-vien-add.php";
  }else{
    $table = '#_members';

    if(isset($_GET['tao-ma'])) {
        $ma_kh = RANDOM_chuoi(8);
        $check = DB_que("SELECT * FROM `#_members` WHERE `ma_kich_hoat` = '$ma_kh' LIMIT 1");
        if(mysql_num_rows($check)) {
            $ma_kh .= $_GET['tao-ma'];
        }
        DB_que("UPDATE `#_members` SET `ma_kich_hoat` = '$ma_kh' WHERE `id` = '".$_GET['tao-ma']."' AND `phanquyen` = 0 LIMIT 1 ");
        $_SESSION['show_message_on'] = 'Tạo mã kích hoạt thành công!';
        LOCATION_js($url_page);
        exit();
    }




    if(isset($_GET['del']))
        {   
            DB_que("DELETE from $table WHERE `id` ='".$_GET['catalogid']."' LIMIT 1");
            $_SESSION['show_message_on'] = 'Đã xóa thành viên thành công!';
            LOCATION_js($url_page);
            exit();
        }

    if(isset($_REQUEST['addgiatri']) AND isset($_REQUEST['maxvalu']))
    {
        for($i=0;$i<$_REQUEST['maxvalu'];$i++)
        {
            $idofme     = $_POST["idme$i"];          
            $showhi     = isset($_POST["showhi_$i"]) ? "1": "0";
  
            if(isset($_POST["xoa_gr_arr_$i"])){
                //xoa
                DB_que("DELETE from $table WHERE `id` ='".$idofme."' LIMIT 1");
                //
            }else{
                DB_que("UPDATE `$table` SET `showhi`='$showhi' WHERE `id`='$idofme' LIMIT 1");
            }
        }
         $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    } 
    
?>

<section class="content-header">
    <h1> Danh sách thành viên</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active"> Danh sách thành viên</li>
    </ol>
</section>
<form action="" method="post">
    <input type="hidden" name="token" value="<?=GET_token() ?>">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                        <?php 
                            $ksearch = isset($_GET['ksearch']) ? str_replace("+", " ", $_GET['ksearch']) : '';
                        ?>
                          <div class="input-group input-group-sm input-group-sm-timkiem">
                              <input name="ksearch" type="text" value="<?=$ksearch ?>" class="form-control pull-right key_search" placeholder="Nhập từ khóa tìm kiếm">
                              <div class="input-group-btn">
                                  <button name="search" type="button" class="btn btn-default btn_search_ds" onclick="SEARCH_jsstep()"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                            <?php 
                                $s_chude = isset($_GET['chu-de']) ? $_GET['chu-de']: "";
                                $mt_11_vi = isset($_GET['hien-thi']) ? $_GET['hien-thi']: "";
                                $trangthai = isset($_GET['trang-thai']) ? $_GET['trang-thai']: "";
                            ?>
                            <div class="dv-hd-locsds">
                                <div class="form-group">
                                    <select name="docid" class="js_trangthai_js form-control" onchange="SEARCH_jsstep()">
                                        <option selected="selected" value="0">Trạng thái</option>
                                        <option value="1" <?=LAY_selected(1, @$trangthai) ?>>Hiện</option>
                                        <option value="2" <?=LAY_selected(2, @$trangthai) ?>>Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <script type="text/javascript">
                                function SEARCH_jsstep() {
                                    var url              = "";
                                    if($(".key_search").length > 0){
                                      var key_search       = $(".key_search").val().trim().replace(/ /g,"+");
                                          key_search       = key_search.trim().replace(/#/g,"");
                                      if(key_search != "") url += "&ksearch="+key_search;
                                    }
                                    if($(".cls_chude").length > 0){
                                      var cls_chude        = $(".cls_chude").val().trim();
                                      if(cls_chude != 0) url += "&chu-de="+cls_chude;
                                    }
                                    if($(".js_trangthai_js").length > 0){
                                      var js_trangthai_js  = $(".js_trangthai_js").val().trim();
                                      if(js_trangthai_js != 0) url += "&trang-thai="+js_trangthai_js;
                                    }
                                    if($(".js_hienthi_ds").length > 0){
                                      var js_hienthi_ds    = $(".js_hienthi_ds").val().trim();
                                      if(js_hienthi_ds != 0) url += "&hien-thi="+js_hienthi_ds;
                                    }
                                    window.location.href = "?module=quan-ly-thanh-vien&action=danh-sach-thanh-vien"+url;
                                }
                            </script>                        </div>
                        <h3 class="box-title box-title-td pull-right">
                            <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                            <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        </h3>
                    </div> 
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                        <table class="table table-hover table-danhsach">
                            <tbody>
                                <tr>
                                    
                                    <th class="w80 text-center">STT</th>
                                    <th>Email</th> 
                                    <th class="w150">Hình ảnh</th>
                                    <th class="w100 text-center">Hiển thị</th>
                                    <!-- <th class="w120 text-center">Tác vụ</th> -->
                                    <th class="w50 text-center">
                                      <label>
                                        <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
                                      </label>
                                    </th>
                                </tr>
                                <?php
                                    $whe = "";
                                    if($trangthai == 1) $whe .= " AND `showhi` = 1";
                                    else if($trangthai == 2) $whe .= " AND `showhi` = 0";
                                        
                                    
                                    if($ksearch != ''){
                                        $whe .= " AND (`cmnd` LIKE '%".$ksearch."%' OR `email` LIKE '%".$ksearch."%' OR `sodienthoai` LIKE '%".$ksearch."%' OR `hoten` LIKE '%".$ksearch."%' OR `diachi` LIKE '%".$ksearch."%' OR `id` = '".$ksearch."') ";
                                    }
                                    $numview        = 20;


                                    $pz  = 0;
                                    $pzz = 0;
                                    $uri = "";
                                    if(isset($_GET['pz'])){
                                      $pz       = $_GET['pz'];
                                      if($pz    == "" || $pz == 0)  $pzz = 0;
                                      else $pzz = $pz * $numview;
                                    }
                                    if($mt_11_vi != ""){
                                      $uri .= '&hien-thi='.$mt_11_vi;
                                    }

                                    if($ksearch != ""){
                                      $uri .= '&ksearch='.str_replace(" ", "+", $ksearch);
                                    }

                                    if($trangthai != ""){
                                      $uri             .= '&trang-thai='.$trangthai;
                                    }
                                    if($s_chude != ""){
                                      $uri             .= '&chu-de='.$s_chude;
                                    }


                                    $sql            = DB_que("SELECT * FROM `$table` WHERE `phanquyen` = 0 $whe ORDER BY `id` DESC LIMIT $pzz,$numview");
                                    $sql_num        = DB_que("SELECT * FROM `$table` WHERE `phanquyen` = 0 $whe ");
                                    $numlist        = @mysql_num_rows($sql_num);
                                    $numshow        = ceil($numlist/$numview);

                                    $cl = 0;
                                    $i = $pzz;

                                    $nhom   = DB_fet("*" , "`#_members_nhom`","","`catasort` DESC","","arr",1);
                                    $pkham   = DB_fet("*" , "`#_danhmuc`","`step` = 2 AND `id_parent` <> 0","`id` DESC","","arr",1); 
                                    
                                    while($rows = mysql_fetch_assoc($sql))
                                    {
                                        $i++;
                                        $ida                = $rows['id'];
                                        foreach ($rows as $key => $value) {
                                            ${$key} = SHOW_text($value);
                                        }
                                        $keypass            = md5(SHOW_text($rows['keypass']));

                                ?>
                                <tr>
                                    
                                    <td class="text-center">
                                        <?=$i ?>
                                        <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                                    </td>
                                    <td>
                                        <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><?=$email ?></a>
                                        <p>
                                            <?php if($id_facebook != 0){ ?>
                                            <a href="https://fb.com/<?=$id_facebook ?>" target="_blank"  style="width: 20px; height: 20px; background: #3c8dbc; text-align: center; color: #fff; border-radius: 100px; line-height: 20px; margin-top: 7px;"><i class="fa fa-facebook" aria-hidden="true" style="font-size: 12px;"></i></a>
                                            <?php } if($id_google != 0){ ?>
                                            <a href="https://plus.google.com/<?=$id_google ?>" target="_blank" style="width: 20px; height: 20px; background: #e81a1a; text-align: center; color: #fff; border-radius: 100px; line-height: 20px; margin-top: 7px;" ><i class="fa fa-google" aria-hidden="true" style="font-size: 12px;"></i></a>
                                            <?php } ?>
                                        </p>
                                    </td> 
                                    
                                    <td>
                                        <img class='img_show_ds' src='<?=$fullpath."/datafiles/member/".$icon ?>'>
                                        <?php if($id_facebook == 0){ ?>
                                        <!-- <img src="http://graph.facebook.com/<?=$id_facebook ?>/picture?type=large" alt="" style="height: 55px; max-width: 100% "> -->
                                        <?php } else if($id_google == 0){ ?>
                                        <!-- <img src="<?=$google_icon ?>" alt="" style="height: 55px; max-width: 100% "> -->
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                      <div id="cus" class="cus_menu">
                                        <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                        </div>
                                    </td>
                                    <!-- <td class="text-center">
                                        <a href="<?=$url_page ?>&edit=<?=$ida?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?=$url_page.'&del=ok&catalogid='.$ida.'&token='.GET_token() ?>" class="do" title="Xóa" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                                    </td> -->
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
                    </div>
                    <div class="box-header">
                        <div class="paging_simple_numbers">
                            <ul class="pagination">
                              <?php
                                PHANTRANG_admin($numshow, $url_page, $pz, $uri);
                              ?>
                            </ul>
                          </div>
                        <input type='hidden' value='<?=$cl?>' name='maxvalu'>
                        <h3 class="box-title box-title-td pull-right">
                            <button type="submit" name="addgiatri" class="btn btn-primary"  onclick="return CHECK_delimg()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
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
 