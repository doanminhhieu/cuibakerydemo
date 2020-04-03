<?php
    $iddh       = isset($_GET['edit']) && is_numeric($_GET['edit']) ? $_GET['edit'] : "";
    $donhang    = DB_fet("*", "#_order", "`id` = '".$iddh."'","", 1);
    $donhang    = mysql_fetch_assoc($donhang);
?>
<section class="content-header">
    <h1>Danh sách đơn hàng</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Danh sách đơn hàng</li>
    </ol>
</section>
<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="h2_title"><i class="fa fa-pencil-square-o"></i> Thông Tin Mua Hàng</h2>
                        <h3 class="box-title box-title-td pull-right">
                            <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                        <table class="table table-hover table-danhsach">
                            <tbody>
                                <?php
                                    if(SHOW_text(@$donhang['iduser']) != 0) {
                                ?>
                                <tr>
                                    <td><strong>Thành viên</strong></td>
                                    <td><?=@layEmailUser(SHOW_text($donhang['iduser'])) ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td style="width: 300px"><strong>Mã đơn hàng</strong></td>
                                    <td><?=SHOW_text($donhang['madh'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Họ tên</strong></td>
                                    <td><?=SHOW_text($donhang['hoten'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Số điện thoại</strong></td>
                                    <td><?=SHOW_text($donhang['sodienthoai'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td><?=SHOW_text($donhang['email'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Địa chỉ giao hàng</strong></td>
                                    <td><?=SHOW_text($donhang['diachi'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ghi chú</strong></td>
                                    <td><?=SHOW_text($donhang['ghichu'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ngày đặt</strong></td>
                                    <td><?=date("d/m/Y - H:i:s",$donhang['ngaydat'])?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h2 class="h2_title"><i class="fa fa-pencil-square-o"></i> Thông Tin nhận hàng</h2>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                        <table class="table table-hover table-danhsach">
                            <tbody>
                                <?php if($donhang['is_nhan'] == 1){ ?>
                                <tr>
                                    <td><strong>Họ tên</strong></td>
                                    <td><?=SHOW_text($donhang['hoten'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Số điện thoại</strong></td>
                                    <td><?=SHOW_text($donhang['sodienthoai'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td><?=SHOW_text($donhang['email'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Địa chỉ giao hàng</strong></td>
                                    <td><?=SHOW_text($donhang['diachi'])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ghi chú</strong></td>
                                    <td><?=SHOW_text($donhang['ghichu'])?></td>
                                </tr>
                                <?php } ?>
                                <?php if($donhang['thanh_pho'] != 0){ $khuvuc = LAY_khuvuc(); ?>
                                <tr>
                                    <td style="width: 300px"><strong>Tỉnh thành</strong></td>
                                    <td><?=SHOW_text($khuvuc[$donhang['thanh_pho']]['tenbaiviet_vi'])?></td>
                                </tr>
                                <tr>
                                    <td style="width: 300px"><strong>Quận huyện</strong></td>
                                    <td><?=SHOW_text($khuvuc[$donhang['quan_huyen']]['tenbaiviet_vi'])?></td>
                                </tr>
                                <?php } ?>
                                <?php if($donhang['ma_giam_gia'] != ""){ ?>
                                <tr>
                                    <td style="width: 300px"><strong>Mã giảm giá</strong></td>
                                    <td><?=SHOW_text($donhang['ghichu'])?></td>
                                </tr>
                                <tr>
                                    <td style="width: 300px"><strong>Khuyến mãi</strong></td>
                                    <td><?=number_format($donhang['gia_km']) ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($donhang['phi_ship'] <> 0){ ?>
                                <tr>
                                    <td style="width: 300px"><strong>Phí vận chuyển</strong></td>
                                    <td><?=number_format($donhang['phi_ship']) ?></td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                    <td><strong>Hình thức thanh toán</strong></td>
                                    <td>
                                    <?php 
                                        $pthucthanhtoan = DB_fet("*","#_phuongthucthanhtoan","`id` = '".$donhang['thanhtoan']."'","`catasort` DESC",1,"arr");
                                        if(count($pthucthanhtoan)) {
                                          echo $pthucthanhtoan[0]['tenbaiviet_vi'];
                                        }
                                    ?>   
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h2 class="h2_title"><i class="fa fa-pencil-square-o"></i> Thông tin đơn hàng</h2>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                        <table class="table table-hover table-danhsach">
                            <tbody>
                                <tr>
                                    <th class="w80 text-center">STT</th>
                                    <th class="w100 text-center">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th class="w100 text-center">Mã sản phẩm</th>
                                    <th class="w120 text-center">Đơn giá (VNĐ)</th>
                                    <th class="w100 text-center">Số lượng</th>
                                    <th class="w120 text-center">Thành tiền</th>
                                </tr>

                                <?php
                                    $idSanphams = explode(',', $donhang['idsp']);
                                    $dongias    = explode(',', $donhang['dongia']);
                                    $soluongs   = explode(',', $donhang['soluong']);
                                    $is_key     = explode('|', $donhang['is_key']);
                                    // $don_vi     = explode('|', $donhang['don_vi']);
                                    $i          = 0;
                                    $tongtien   = 0;
                                    $tinhnang_arr  = LAY_bv_tinhnang(LAY_id_step(2));
                                    foreach ($idSanphams as $value) {
                                        $sanpham   = DB_fet("*", "#_baiviet", "`id` = '".$value."'", "", 1);
                                        $sanpham   = mysql_fetch_assoc($sanpham);

                                        if($sanpham['icon'] != '')
                                          $thumb = "<img class='img_show_ds' src='".checkImage($fullpath, $sanpham['icon'], $sanpham['duongdantin'], 'thumb_')."'>";
                                        else
                                          $thumb = "<img class='img_show_ds' src='".$fullpath."/admin/images/noimage.png'>";

                                        $dongia    = $dongias[$i];
                                        // $dongia    = check_gia_sql($value, @$is_key[$i], $dongias[$i]);
                                
                                        $thanhtien = $soluongs[$i] * $dongia;
                                        $tongtien += $thanhtien;
                                        $tinhnang_arr  = @DB_fet("*","#_baiviet_tinhnang","`id` IN (".@$is_key[$i].")","`catasort` DESC","","arr");
                                ?>
                                <tr>
                                    <td class="text-center"><?=$i+1?></td>
                                    <td class="text-center">
                                        <?=$thumb?>
                                        
                                    </td>
                                    <td>
                                        <a href="<?=$fullpath ?>/<?=$sanpham['seo_name']?>/" target="_blank"><?=$sanpham['tenbaiviet_vi']?></a><p style="margin: 2px 0 0; color: #fd6207; font-size: 12px;"><?=@$tinhnang_arr[$id_bvsl]['tenbaiviet_vi'] ?> </p>
                                        <p class="p_mota_cart">
                                          <?php 
                                          foreach ($tinhnang_arr as $tnr) {
                                             echo '<span style="background: #ec8417; border-radius: 3px; padding: 2px 5px; margin: 2px 5px 2px 0; color: #fff; font-size: 12px;display: inline-block;">'.$tnr['tenbaiviet_vi'].'</span>';
                                          } 
                                          ?>
                                          <?php 
                                            $isthuoctinh = @explode(",", $is_key[$i]);
                                              foreach ($isthuoctinh as $ittinh) { 
                                                if($ittinh == "") continue;
                                                echo '<span style="background: #ec8417; border-radius: 3px; padding: 2px 5px; margin: 2px 5px 2px 0; color: #fff; font-size: 12px;display: inline-block;">'.SHOW_text($ittinh).'</span>';
                                              }
                                          ?>
                                        </p>
                                    </td>
                                    <td class="text-center"><?=$sanpham['p1']?></td>
                                    <td class="text-center"><?=NUMBER_fomat($dongia) ?></td>
                                    <td class="text-center"><?=$soluongs[$i]?></td>
                                    <td class="text-center"><?=NUMBER_fomat($thanhtien) ?></td>
                                </tr>
                                <?php
                                        $i++;
                                    }
                                    if($donhang['gia_km'] != 0 || $donhang['phi_ship'] != 0){

                                ?>  
                                <tr>
                                    <td colspan="7" style="text-align: right; font-size: 13px; line-height: 20px; padding: 15px 10px 0;">Tạm tính : <span style="font-weight: 600;"><?=NUMBER_fomat($tongtien)?></span></td>
                                </tr> 
                                <?php } if($donhang['phi_ship'] != 0){ ?>
                                <tr>
                                    <td colspan="7" style="text-align: right; font-size: 13px; line-height: 20px; padding: 5px 10px 0;">Phí vận chuyển: <span style="font-weight: 600;"><?=NUMBER_fomat($donhang['phi_ship'])?></span></td>
                                </tr>
                                <?php } if($donhang['gia_km'] != 0){ ?>
                                <tr>
                                    <td colspan="7" style="text-align: right; font-size: 13px; line-height: 20px; padding: 5px 10px 0;">Giá khuyến mãi: <span style="font-weight: 600;">-<?=NUMBER_fomat($donhang['gia_km'])?></span></td>
                                </tr>
                                <?php } ?> 
                                <tr>
                                    <td colspan="7" style="text-align: right;font-size: 14px;">Tổng tiền: <span style="color: #F00;font-weight: 600;"><?=NUMBER_fomat($tongtien + $donhang['phi_ship'] - $donhang['gia_km'])?></span></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    <div class="box-header">
                        <h3 class="box-title box-title-td pull-right">
                            <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                        </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</form>