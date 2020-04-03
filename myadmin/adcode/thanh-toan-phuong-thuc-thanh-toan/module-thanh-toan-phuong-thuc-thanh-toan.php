<?php
  $table      = '#_ship_thanhtoan_setup';
  $table_slug = str_replace("#_", "", $table);

  if(isset($_REQUEST['addgiatri'])) {
    ACTION_db($_POST, $table, 'update', array('addgiatri'), "`id` = 1");
    $_SESSION['show_message_on'] = 'Cập nhật dữ liệu thành công!';
  }
  $sql_se       = DB_que("SELECT * FROM $table WHERE `id`= 1 LIMIT 1");
  $sql_se       = mysql_fetch_assoc($sql_se);
  foreach ($sql_se as $key => $value) {
    ${$key}     = SHOW_text($value);
  }
  $khuvuc_arr = LAY_khuvuc();

?>
<section class="content-header">
    <h1> Danh sách chủ đề</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Phương thức thanh toán</li>
    </ol>
</section>
<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Phương thức thanh toán
                      </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                        </h3>
                    </div>
                    <style>
                      .dv-group-vanchuyen { padding: 10px; }
                      .dv-group-vanchuyen .dv-left{width: 35%; float: left; padding-right: 20px}
                      .dv-group-vanchuyen .dv-right { width: 65%; float: left; border: 1px solid #eaeaea; border-radius: 7px; padding: 10px; background: #f9f9f9; }
                      .dv-group-vanchuyen h3 { font-size: 15px; font-weight: 500; color: #505050; margin: 10px 0 15px; }
                      .dv-group-vanchuyen { margin: 10px; border-bottom: 1px solid #efeeee; padding-bottom: 20px; }
                      .dv-group-vanchuyen:last-child { border: none}
                      .dv-group-vanchuyen h4 { font-size: 13px; margin-bottom: 15px; }
                      .dv-group-vanchuyen .dv-right label { width: 100%; margin-bottom: 10px; }
                      .dv-group-vanchuyen .dv-right label input, .dv-group-vanchuyen .dv-right label select, .dv-group-vanchuyen .dv-right label textarea { width: 100%; height: 30px; border: 1px solid #ccc; background: #fff; padding: 0 4px; font-weight: 500; outline: none; }
                      .dv-group-vanchuyen .dv-right label p { margin-bottom: 5px; font-weight: 500; }
                      .dv-group-vanchuyen h3 img { width: 20px; position: relative; top: -2px; margin-right: 5px}
                      .dv-group-vanchuyen .dv-right label textarea {height: 150px; padding: 10px}
                      .dv-group-vanchuyen .dv-right input[type="radio"] { width: 17px; height: 17px; margin: 0; float: left; margin-right: 7px; }
                      .dv-group-vanchuyen .dv-right label.rad { float: left; width: auto; margin-right: 15px; font-weight: 500; }
                    </style>
                    <div class="box-body table-responsive no-padding table-danhsach-cont" >
                      <div class="dv-group-vanchuyen" style="display: none">
                        <div class="dv-left">
                          <h3><img src="images/icon-congty.png"> Thanh toán tại công ty</h3>
                        </div>
                        <div class="dv-right">
                          <label class='rad'>
                            <input type="radio" name="check_tai_cong_ty" value="1" <?=LAY_checked(1, @$check_tai_cong_ty) ?>> Hiển thị
                          </label>
                          <label class='rad'>
                            <input type="radio" name="check_tai_cong_ty" value="0" <?=LAY_checked(0, @$check_tai_cong_ty) ?>> Ẩn
                          </label>
                          <div class="clr"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="dv-group-vanchuyen" style="display: none">
                        <div class="dv-left">
                          <h3><img src="images/icon-cod.png" >Thanh toán khi nhận hàng</h3>
                        </div>
                        <div class="dv-right">
                          <label class='rad'>
                            <input type="radio" name="check_khi_nhan_hang" value="1" <?=LAY_checked(1, @$check_khi_nhan_hang) ?>> Hiển thị
                          </label>
                          <label class='rad'>
                            <input type="radio" name="check_khi_nhan_hang" value="0" <?=LAY_checked(0, @$check_khi_nhan_hang) ?>> Ẩn
                          </label>
                          <div class="clr"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="dv-group-vanchuyen" style="display: none">
                        <div class="dv-left">
                          <h3><img src="images/icon-chuyenkhoan.png" >Thanh toán chuyển khoản</h3>
                        </div>
                        <div class="dv-right">
                          <label class='rad'>
                            <input type="radio" name="check_chuyen_khoan" value="1" <?=LAY_checked(1, @$check_chuyen_khoan) ?>> Hiển thị
                          </label>
                          <label class='rad'>
                            <input type="radio" name="check_chuyen_khoan" value="0" <?=LAY_checked(0, @$check_chuyen_khoan) ?>> Ẩn
                          </label>
                          <div class="clr"></div>
                          <label>
                            <textarea name="noidung_chuyenkhoan" placeholder="Nội dung chuyển khoản"><?=!empty($noidung_chuyenkhoan) ? $noidung_chuyenkhoan : '' ?></textarea>
                          </label>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="dv-group-vanchuyen" style="display: none">
                        <div class="dv-left">
                          <h3><img src="images/icon-nganluong.png" > Thanh toán qua NganLuong.vn</h3>
                        </div>
                        <div class="dv-right">
                            <label>
                              <p>Trang thái</p>
                              <select name="check_ngan_luong">
                                <option value="1" <?=LAY_selected(1, @$check_ngan_luong) ?>>Hiển thị</option>
                                <option value="0" <?=LAY_selected(0, @$check_ngan_luong) ?>>Ẩn</option>
                              </select>
                            </label>
                            <label>
                              <p>URL ngân lượng</p>
                              <input type="text" name="url_nganluong" URL_WS value="<?=!empty($url_nganluong) ? $url_nganluong : "" ?>">
                            </label>
                            <label>
                              <p>Email tài khoản Ngân Lượng</p>
                              <input type="text" name="email_nganluong" RECEIVER value="<?=!empty($email_nganluong) ? $email_nganluong : "" ?>">
                            </label>
                            <label>
                              <p>Mã kết nối</p>
                              <input type="text" name="maketnoi_nganluong" MERCHANT_ID value="<?=!empty($maketnoi_nganluong) ? $maketnoi_nganluong : "" ?>">
                            </label>
                            <label>
                              <p>Mật khẩu kết nối</p>
                              <input type="text" name="matkhau_nganluong" MERCHANT_PASS value="<?=!empty($matkhau_nganluong) ? $matkhau_nganluong : "" ?>">
                            </label>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="dv-group-vanchuyen" style="display: none">
                        <div class="dv-left">
                          <h3><img src="images/icon-baokim.png">Thanh toán qua BaoKim.vn</h3>
                        </div>
                        <div class="dv-right">
                            <label>
                              <p>Trang thái</p>
                              <select name="check_bao_kim">
                                <option value="1" <?=LAY_selected(1, @$check_bao_kim) ?>>Hiển thị</option>
                                <option value="0" <?=LAY_selected(0, @$check_bao_kim) ?>>Ẩn</option>
                              </select>
                            </label>
                            <label>
                              <p>URL BaoKim</p>
                              <input type="text" name="url_baokim" URL_WS value="<?=!empty($url_baokim) ? $url_baokim : "" ?>">
                            </label>
                            <label>
                              <p>Email BaoKim</p>
                              <input type="text" name="email_baokim" URL_WS value="<?=!empty($email_baokim) ? $email_baokim : "" ?>">
                            </label>
                            <label>
                              <p>Mật khẩu BaoKim</p>
                              <input type="text" name="matkhau_baokim" URL_WS value="<?=!empty($matkhau_baokim) ? $matkhau_baokim : "" ?>">
                            </label>
                            <label>
                              <p>Mã website</p>
                              <input type="text" name="ma_website_baokim" URL_WS value="<?=!empty($ma_website_baokim) ? $ma_website_baokim : "" ?>">
                            </label>
                            <label>
                              <p>API user </p>
                              <input type="text" name="api_user_baokim" URL_WS value="<?=!empty($api_user_baokim) ? $api_user_baokim : "" ?>">
                            </label>
                            <label>
                              <p>API password</p>
                              <input type="text" name="api_pass_baokim" URL_WS value="<?=!empty($api_pass_baokim) ? $api_pass_baokim : "" ?>">
                            </label>
                            <label>
                              <p>Privete Key</p>
                              <textarea name="private_key_baokim" cols="30" rows="10"><?=!empty($private_key_baokim) ? $private_key_baokim : "" ?></textarea>
                            </label>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="dv-group-vanchuyen" >
                        <div class="dv-left">
                          <h3><img src="images/icon-paypal.png">Thanh toán qua Paypal</h3>
                        </div>
                        <div class="dv-right">
                          <!-- <label class='rad'>
                            <input type="radio" name="check_paypal" value="1" <?=LAY_checked(1, @$check_paypal) ?>> Hiển thị
                          </label>
                          <label class='rad'>
                            <input type="radio" name="check_paypal" value="0" <?=LAY_checked(0, @$check_paypal) ?>> Ẩn
                          </label> -->
                          <div class="clr"></div>
                          <label>
                            <input type="text" name="url_paypal" value="<?=!empty($url_paypal) ? $url_paypal : ""  ?>" placeholder="URL Paypal">
                          </label>
                          <label>
                            <input type="text" name="email_paypal" value="<?=!empty($email_paypal) ? $email_paypal : ""  ?>" placeholder="Email nhận tiền paypal">
                          </label>
                          <label>
                            <input type="text" name="ti_le_paypal" value="<?=!empty($ti_le_paypal) ? $ti_le_paypal : ""  ?>" placeholder="Tỉ lệ VNĐ - USD">
                          </label>
                        </div>
                        <div class="clear"></div>
                      </div>
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>