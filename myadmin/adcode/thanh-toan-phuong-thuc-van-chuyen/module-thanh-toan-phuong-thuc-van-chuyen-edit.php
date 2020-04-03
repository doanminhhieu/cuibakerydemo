<?php
  $id     = isset($_GET['edit']) && is_numeric($_GET['edit']) ? $_GET['edit'] : 0;
  $kv     = isset($_GET['kv']) && is_numeric($_GET['kv']) ? $_GET['kv'] : 0;
  $table  = '#_ship_vanchuyen_khac';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $toi_thieu                  = str_replace(".", "", $_POST['toi_thieu']);
    $toi_da                     = str_replace(".", "", $_POST['toi_da']);
    $phi_van_chuyen             = str_replace(".", "", $_POST['phi_van_chuyen']);

    if($kv != 0){
      $arr_id                     = $_POST['arr_id'];
      $gia_dieu_chinh             = $_POST['gia_dieu_chinh'];
      $i = 0;
      $arr_id_c                   = count($arr_id);
      $araay_pdc                  = array();
      for ($i=0; $i < $arr_id_c; $i++) { 
        $araay_pdc[$arr_id[$i]]   = str_replace(".", "", $gia_dieu_chinh[$i]);
      }
      $araay_pdc                  = json_encode($araay_pdc);
    }
  }
  if(!empty($_POST)){
    if(empty($araay_pdc))  $araay_pdc                = "";

    $_POST['toi_thieu']         = $toi_thieu;
    $_POST['toi_da']            = $toi_da;
    $_POST['phi_van_chuyen']    = $phi_van_chuyen;
    $_POST['id_kv']             = $kv;
    $_POST['gia_dieu_chinh']    = @$araay_pdc;

    if($id == 0){
      $id                   = ACTION_db($_POST, $table , 'add', array('arr_id') ,NULL);
      $_SESSION['show_message_on'] =  "Thêm phí vận chuyển thành công!";
      LOCATION_js($url_page."&edit=".$id);
      exit();
    }else{
      ACTION_db($_POST, $table, 'update', array('arr_id') , "`id` = '".$id."'");
      $_SESSION['show_message_on'] =  "Cập nhật phí vận chuyển thành công!";
    }
  }

  if($id > 0){
    $sql_se       = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
    $sql_se       = mysql_fetch_assoc($sql_se);
    foreach ($sql_se as $key => $value) {
      if($key == "gia_dieu_chinh") {
        ${$key}     = ($value);
      }
      else {
        ${$key}     = SHOW_text($value);
      }
    }
  }

  $khuvuc_arr = LAY_khuvuc();
?>

<section class="content-header">
    <h1>Phương thức vận chuyển</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Phương thức vận chuyển</li>
    </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post">
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
                <h2 class="h2_title">
                    <i class="fa fa-pencil-square-o"></i> <?=$id > 0 ? 'Sửa' : 'Thêm' ?> phí vận chuyển cho <b><?=$kv == 0 ? 'các tỉnh/thành khác' : $khuvuc_arr[$kv]['tenbaiviet_vi']  ?></b>
                </h2>
                <h3 class="box-title box-title-td pull-right">
                  <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                  <a href="<?=$url_page ?>&kv=<?=$kv ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                  <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                </h3>
            </div>
            <div class="nav-tabs-custom">
            <?php include _source."lang.php" ?>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <label>Tên phương thức vận chuyển</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_vi) ? $tenbaiviet_vi : ''?>" name="tenbaiviet_vi" id="tenbaiviet_vi">
                </div>
              </div>
              <?php if($lang_nb2){ ?>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên phương thức vận chuyển (<?=_lang_nb2_key ?>)</label>
                  <input type="text" class="form-control" value="<?=!empty($tenbaiviet_en) ? $tenbaiviet_en : ''?>" name="tenbaiviet_en" id="tenbaiviet_en">
                </div>
              <?php } ?>
            </div>
            </div>
            <div class="box p10">
              <div class="form-group">
                <label>Thời gian giao dự kiến <a data-tooltip="Các mức thời gian giao hàng dự kiến và được tính theo giờ, mỗi thời gian cách nhau bở dấu , Ví dụ: giao hàng khoản thời gian 24h và 48h nhập: 24, 48"> </a></label>
                <input type="text" class="form-control" name="du_kien" id="catasort" value="<?=!empty($du_kien)  ? $du_kien : "" ?>" >
              </div>
            </div>
            <div class="box p10">
              <!-- <div class="form-group">
                <label>Loại vận chuyển</label>
                <select name="loai" id="loai" class="form-control" onchange="if($(this).val() == 0) $('.sp_dvt').text('đ'); else $('.sp_dvt').text('Kg'); ">
                  <option value="0" <?=LAY_selected(0, @$loai) ?>>Theo giá trị đơn hàng</option>
                  <option value="1" <?=LAY_selected(1, @$loai) ?>>Theo khối lượng sản phẩm</option>
                </select>
              </div> -->
              <div class="form-group">
                <div>
                  <label style=" width: 49.5%; float: left; position: relative;">
                    <p>Tối thiểu</p>
                    <input type="text" class="form-control" value="<?=!empty($toi_thieu) ? NUMBER_fomat($toi_thieu) : 0?>" name="toi_thieu" id="toi_thieu" onkeyup="SetCurrency(this)"><span class="sp_dvt" style="position: absolute; bottom: 6px; right: 10px; font-weight: 600; color: #656565;"><?=!empty($loai) && $loai == 1 ? "Kg": "đ" ?></span>
                  </label>
                  <label style=" width: 49.5%; float: right; position: relative;">
                    <p>Tối đa <span style="color: #a5a5a5;">(Nhập 0 mặc định trở lên)</span></p>
                    <input type="text" class="form-control" value="<?=!empty($toi_da) ? NUMBER_fomat($toi_da) : 0?>" name="toi_da" id="toi_da" onkeyup="SetCurrency(this)"><span class="sp_dvt" style="position: absolute; bottom: 6px; right: 10px; font-weight: 600; color: #656565;"><?=!empty($loai) && $loai == 1 ? "Kg": "đ" ?></span>
                  </label>
                  <div class="clr"></div>
                </div>
              </div>

              <div class="form-group">
                <label>Phí vận chuyển</label>
                <input type="text" class="form-control" name="phi_van_chuyen" id="catasort" value="<?=!empty($phi_van_chuyen)  ? NUMBER_fomat($phi_van_chuyen) : 0 ?>" onkeyup="SetCurrency(this)">
              </div>
              <?php if($kv != 0){ ?>
              <div class="dv-giadieu-chinh form-group">
                <p><b>Giá điều chỉnh</b> <span style="color: #ff0404;">(Giá cộng thêm vào giá gốc)</span></p>
                <div>
                  <?php
                    if(!empty($gia_dieu_chinh)) {
                      $gia_dieu_chinh = json_decode($gia_dieu_chinh, true);
                    }

                    foreach ($khuvuc_arr as $value) { 
                      if($value['id_parent'] != $kv) continue;
                  ?>
                  <label style="width: 230px; margin-right: 15px; margin-bottom: 10px; margin-top: 10px">
                    <p style="margin-bottom: 5px; font-weight: 500;"><?=$value['tenbaiviet_vi'] ?></p>
                    <input type="text" name="gia_dieu_chinh[]" value="<?=!empty($gia_dieu_chinh[$value['id']]) ? NUMBER_fomat($gia_dieu_chinh[$value['id']]) : 0 ?>" class="form-control" onkeyup="SetCurrency(this)">
                    <input type="hidden" name="arr_id[]" value="<?=$value['id'] ?>">
                  </label>

                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
      </section>
    </div>
  </section>
  <div class="box-header mb-60">
    <h3 class="box-title box-title-td pull-right">
        <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
        <a href="<?=$url_page ?>&kv=<?=$kv ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
        <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
    </h3>
  </div>
</form>

<script>
  function checkSubmit(){
    if($("#tenbaiviet_vi").val() == '')
    {
      alert("Tên phương thức vận chuyển không được để trống!");
      $("#tenbaiviet_vi").focus();
      return false;
    }
    return true;
  }
</script>