<?php
  if(isset($_GET['them-moi'])){
      include "module-thanh-toan-phuong-thuc-van-chuyen-add.php";
  }
  else if(isset($_GET['kv']) && is_numeric($_GET['kv'])){
      include "module-thanh-toan-phuong-thuc-van-chuyen-edit.php";
  }
  else{

    $table      = '#_ship_vanchuyen_khac';
    $table_slug = str_replace("#_", "", $table);
    if(isset($_GET['del']) && is_numeric($_GET['del'])){
      DB_que("DELETE FROM $table WHERE `id` ='".$_GET['del']."' LIMIT 1");
      $_SESSION['show_message_on'] = 'Xóa phí vận chuyển thành công';
      LOCATION_js($url_page);
      exit();
    }

    if(isset($_REQUEST['addgiatri'])) {
      $data                       = array();
      $data['loai_ship']          = $_POST['loai_ship'];
      $data['url_shipchung']      = $_POST['url_shipchung'];
      $data['api_shipchung']      = $_POST['api_shipchung'];
      $data['url_giaohangnhanh']  = $_POST['url_giaohangnhanh'];
      $data['api_giaohangnhanh']  = $_POST['api_giaohangnhanh'];
      $data['kho_tinhthanh']      = $_POST['kho_tinhthanh'];
      $data['kho_quanhuyen']      = $_POST['kho_quanhuyen'];

      ACTION_db($data, "#_ship_vanchuyen_setup", 'update', NULL, "`id` = 1");
      $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
    }
  $sql_se       = DB_que("SELECT * FROM `#_ship_vanchuyen_setup` WHERE `id`= 1 LIMIT 1");
  $sql_se       = mysql_fetch_assoc($sql_se);
  foreach ($sql_se as $key => $value) {
    ${$key}     = SHOW_text($value);
  }
  $khuvuc_arr = LAY_khuvuc();

?>
<section class="content-header">
    <h1> Phương thức vận chuyển</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Phương thức vận chuyển</li>
    </ol>
</section>
<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Phương thức vận chuyển
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        </h3>
                    </div>
                    <style>
                      .dv-group-vanchuyen { padding: 10px; }
                      .dv-group-vanchuyen .dv-left{width: 35%; float: left; padding-right: 20px}
                      .dv-group-vanchuyen .dv-right { width: 65%; float: left; border: 1px solid #eaeaea; border-radius: 7px; padding: 10px; background: #f9f9f9; }
                      .dv-group-vanchuyen h3 { font-size: 15px; font-weight: 600; color: #505050; margin: 10px 0 15px; }
                      .dv-group-vanchuyen { margin: 10px; border-bottom: 1px solid #efeeee; padding-bottom: 20px; }
                      .dv-group-vanchuyen:last-child { border: none}
                      .dv-group-vanchuyen h4 { font-size: 13px; margin-bottom: 15px; }
                      .dv-buton {margin-top: 20px}
                      .dv-buton .right{ float: right; }
                      .dv-khuvuc { margin: 20px 0 35px; }
                      .dv-prices .r{float: right;}
                      .dv-prices { font-weight: 600; color: #616161; font-size: 14px; }
                      .dv-khuvuc{padding-bottom: 30px}
                      .dv-khuvuc:hover .dv-buton{display: block}
                      .dv-buton{display: none}
                      .dv-khuvuc .dv-buton { position: absolute; width: 100%; top: 0px; margin-top: 0;}
                      .dv-khuvuc { padding-bottom: 10px; position: relative; margin: 0; border-bottom: 1px solid #e4e4e4; margin-bottom: 15px; }
                      .dv-khuvuc:last-child {border: none}
                      .dv-khuvuc .dv-buton a { padding: 4px 10px; font-size: 12px; }
                      .dv-shipchung {}
                      .dv-shipchung img { height: 35px; display: block; margin-bottom: 15px; }
                      .dv-shipchung { border-bottom: 1px solid #e2e2e2; padding-bottom: 10px; margin-bottom: 10px; } 
                      .dv-shipchung.dv-giaohang-nhanh { border-bottom: none; padding-bottom: 0; margin-bottom: 7px; }
                      .dv-shipchung .dv-thietla{}
                      .dv-shipchung.dv-giaohang-nhanh img { height: 26px; }
                      .dv-thietlap { text-align: right; margin-top: 10px; }
                      .dv-shipchung label , .dv-labels label{ line-height: 1.8; }
                      .dv-shipchung label input , .dv-labels label input{ width: 18px; height: 18px; float: left; margin-right: 6px; }
                      .dv-thietlap-ship{ width: 100%; display: none}
                      .dv-thietlap-ship label p { margin-bottom: 3px; width: 100%; display: block;  }
                      .dv-thietlap-ship label { width: 100%; display: block; font-weight: 500; }
                      .dv-thietlap-ship label input { width: 100%; height: 30px; padding: 0 7px; border: 1px solid #ccc; margin-bottom: 10px; border-radius: 4px; }
  
                    </style>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <div class="dv-group-vanchuyen" style="display: none">
                        <div class="dv-left">
                          <h3>Thiết lập kho hàng</h3>
                          <p>Thiết lập kho hàng để tính phí vận chuyển</p>
                        </div>
                        <div class="dv-right form-group">
                          <select name="kho_tinhthanh" id="" onchange="LOAD_tinhthanh(this, '#id_quanhuyen', 'Chọn Quận / Huyện')" class="form-control" style="width: 50%; float: left;">
                            <option value="0">Chọn Tỉnh / Thành</option>
                            <?php
                              $tinhthanh = LAY_khuvuc();
                              foreach ($tinhthanh as $value) { 
                                if($value['id_parent'] != 0) continue;
                            ?>
                            <option value="<?=$value['id']  ?>" <?=LAY_selected(@$kho_tinhthanh, $value['id']) ?>><?=$value['tenbaiviet_vi']  ?></option>
                            <?php } ?>
                          </select>
                          <select name="kho_quanhuyen" id="id_quanhuyen" class="form-control" style="width: 49%; float: right;">
                            <option value="0">Chọn Quận / Huyện</option>
                            <?php
                              $tinhthanh = LAY_khuvuc();
                              foreach ($tinhthanh as $value) { 
                                if($value['id_parent'] != @$kho_tinhthanh) continue;
                            ?>
                            <option value="<?=$value['id']  ?>" <?=LAY_selected(@$kho_quanhuyen, $value['id']) ?>><?=$value['tenbaiviet_vi']  ?></option>
                            <?php } ?>
                          </select>
                           
                        </div>
                        <div class="clear"></div>
                        
                      </div>
                      <div class="dv-group-vanchuyen" >
                        <div class="dv-left">
                          <h3>Phí vận chuyển</h3>
                          <p>Thêm phí vận chuyển mới cho các khu vực vận chuyển khác nhau.</p>
                          <a class="btn btn-primary" href="?module=quan-ly-thanh-toan&action=thanh-toan-phuong-thuc-van-chuyen&them-moi=true">Thêm mới khu vực vận chuyển</a>
                        </div>
                        <div class="dv-right">
                          <h3>Khu vực vận chuyển</h3>
                          <?php 
                            $khuvuc = DB_que("SELECT * FROM `#_ship_vanchuyen_khac` ORDER BY `id_kv` ASC");
                            while ($row = mysql_fetch_assoc($khuvuc)) { 
                          ?>
                          <div class="dv-khuvuc">
                            <h4><?=$row['id_kv'] == 0 ? 'CÁC TỈNH/THÀNH KHÁC' : $khuvuc_arr[$row['id_kv']]['tenbaiviet_vi']  ?>  </h4>
                            <div>
                              <div>
                                <p><a href="?module=quan-ly-thanh-toan&action=thanh-toan-phuong-thuc-van-chuyen&edit=<?=$row['id'] ?>&kv=<?=$row['id_kv'] ?>"><?=$row['tenbaiviet_vi'] ?></a></p>
                              </div>
                              <div class="dv-prices">
                                <dv class="l"><?=number_format($row['toi_thieu']).($row['loai'] == 0 ? 'đ' : 'kg' ) ?><?=$row['toi_da'] != 0  ? " - ".number_format($row['toi_da']).($row['loai'] == 0 ? 'đ' : 'kg' ) : "" ?></dv>
                                <dv class="r"><?=number_format($row['phi_van_chuyen']) ?>đ</dv>
                                <dv class="clear"></dv>
                              </div>
                            </div>
                            <div class="dv-buton">
                              <a class="btn btn-default right" href="?module=quan-ly-thanh-toan&action=thanh-toan-phuong-thuc-van-chuyen&kv=<?=$row['id_kv'] ?>">Thêm phí vận chuyển</a>
                              <a class="btn btn-danger right" href="?module=quan-ly-thanh-toan&action=thanh-toan-phuong-thuc-van-chuyen&del=<?=$row['id'] ?>&token=<?=GET_token() ?>" onclick="return confirm('Bạn thật sự muốn xóa?')" style="margin-right: 7px;">Xóa</a>
                              
                            </div>
                          </div>
                          <?php } ?>
                          <div class="clear"></div>
                          <!-- <div class="dv-labels">
                            <label>
                              <input type="radio" value="1" name="loai_ship" <?=!empty($loai_ship) && $loai_ship == 1 ? "checked='checked'" : "" ?>>Sử dụng Phí vận chuyển tính giá vận chuyển mặc định
                            </label>
                          </div> -->
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="dv-group-vanchuyen" style="display: none">
                        <div class="dv-left">
                          <h3>Các dịch vụ vận chuyển</h3>
                          <p>Các dịch vụ vận chuyển giúp bạn chuyển hàng tới khách hàng một cách nhanh chóng, hiệu quả.</p>
                        </div>
                        <div class="dv-right">
                          <div class="dv-shipchung">
                            <img src="images/logo-shipchung.png" alt="">
                            <label>
                              <input type="radio" value="2" name="loai_ship" <?=!empty($loai_ship) && $loai_ship == 2 ? "checked='checked'" : "" ?>>Sử dụng Ship chung tính giá vận chuyển mặc định
                            </label>
                            <div class="dv-thietlap">
                              <a onclick="$('.dv-thietlap-shipchung').toggle();" class="cur btn btn-default">Thiết lập</a>
                            </div>
                            <div class="clear"></div>
                            <div class="dv-thietlap-ship dv-thietlap-shipchung">
                              <label>
                                <p>URL Ship chung</p>
                                <input type="text" name="url_shipchung" value="<?=!empty($url_shipchung) ? $url_shipchung : ""  ?>" class="form-control">
                              </label>
                              <label>
                                <p>API Ship chung</p>
                                <input type="text" name="api_shipchung" value="<?=!empty($api_shipchung) ? $api_shipchung : ""  ?>" class="form-control">
                              </label>
                              <div class="clear"></div>
                            </div>
                              
                          </div>
                          <div class="dv-shipchung dv-giaohang-nhanh form-group">
                            <img src="images/logo-ghn.png" alt="">
                            <label>
                              <input type="radio" value="3" name="loai_ship" <?=(!empty($loai_ship) && $loai_ship == 3) || empty($loai_ship) ? "checked='checked'" : "" ?>>Sử dụng Giao hàng nhanh tính giá vận chuyển mặc định
                            </label>
                            <div class="dv-thietlap">
                              <a onclick="$('.dv-thietlap-giohangnhanh').toggle('fade');" class="cur btn btn-default">Thiết lập</a>
                            </div>
                            <div class="clear"></div>
                            <div class="dv-thietlap-ship dv-thietlap-giohangnhanh form-group">
                              <label>
                                <p>URL Giao hàng nhanh</p>
                                <input type="text" name="url_giaohangnhanh" value="<?=!empty($url_giaohangnhanh) ? $url_giaohangnhanh : ""  ?>" class="form-control">
                              </label>
                              <label>
                                <p>API Giao hàng nhanh</p>
                                <input type="text" name="api_giaohangnhanh" value="<?=!empty($api_giaohangnhanh) ? $api_giaohangnhanh : ""  ?>" class="form-control">
                              </label>
                              <div class="clear"></div>
                            </div>
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" onclick="return CHECK_name_emty()"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>