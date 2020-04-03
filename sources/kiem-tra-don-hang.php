<?php 
    $bre = isset($_GET['view']) ? $glo_lang['chi_tiet_don_hang'] :  $glo_lang['kiem_tra_don_hang'];
    if(empty($thongtin_step)){
      $thongtin_step['id'] = 1;
    }
    $thongtin_step   = LAY_anhstep_now($thongtin_step['id']);
    if($motty == 'lich-su-mua-hang') {
      $bre  = $glo_lang['lich_su_mua_hang'];
    }

    // if($motty == "lich-su-mua-hang" && empty($_SESSION['id'])) {
    //   LOCATION_js($fullpath.'/signin/');
    //   exit();
    // }
?>

<div class="link_pageload">
  <div class="pagewrap">
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span><i class="fa fa-angle-right"></i></span><a><?=$bre ?></a></li>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<div class="pagewrap page_conten_page">
  <div class="title_page_id"><?=$bre ?></div>
  <!--  -->
  <div class="kiemtra_donhang no_box">
    <ul>
      <?php if($motty != "lich-su-mua-hang"){ ?>
      <div class="dv_kiemtra_donhang_cont">
        <li>
          <span><i class="fa fa-chain-broken" aria-hidden="true"></i><?=@$glo_lang['nhap_ma_don_hang'] ?>:</span>
          <input type="text" name="cont_cmnd" class="cls_madh_s form-control" placeholder="VD: DH123456 *">
        </li>
        <li>
          <span><i class="fa fa-envelope" aria-hidden="true"></i><?=@$glo_lang['hoac_so_dien_thoai_va_mail_dat_hang'] ?>:</span>
          <input type="text" name="cont_cmnd" class="cls_email_sdt form-control" placeholder="VD: abc...@gmail.com *">
        </li>
        <div class="clr"></div>
        <h4><a onclick="LOAD_search_dh('<?=$full_url."/check_donhang/" ?>', 0)" class="cur"><?=$glo_lang['kiem_tra'] ?></a></h4>
        <div class="clr"></div>
      </div>
      <?php } ?>
      <div class="clr"></div>
      <div class="dv-load-hd-js dv-load-hd-js-top">
        <?php 
          if($motty == "lich-su-mua-hang"){ 
            $numview  = 10;
            $pzer                   = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

            $vi_tri                 = PHANTRANG_start($pzer, $numview);
            if ($pzer               == 1 || $pzer == NULL) 
                $pzz                = 0;
            else $pzz               = $pzer * $numview;


            $nd_kietxuat = DB_que("SELECT * FROM `#_order` WHERE  `iduser` = '".$_SESSION['id']."'  ORDER BY `id` DESC LIMIT $vi_tri,$numview");
            $nd_total    = DB_que("SELECT * FROM `#_order` WHERE  `iduser` = '".$_SESSION['id']."'  ");

            $nd_total        = @mysql_num_rows($nd_total);
            $numshow        = ceil($nd_total / $numview);
            $sotrang        = PHANTRANG_findPages($nd_total, $numview);
        
            if(!mysql_num_rows($nd_kietxuat)) echo "<div class='dv-notfull-cart'>".$glo_lang['khong_tim_thay_don_hang_nao']."</div>";
            else{
              echo '<div class="dv-donhhang dv-dangnhap ">
                    <div id="cart_list" style="margin: 0; line-height: 1.7">
                      <div class="dv-table-reposive tb_rps">
                        <table width="100%" border="0" cellspacing="1" cellpadding="5" class="tb-bg-fff">
                          <tbody><tr>
                            <th width="10px">'.$glo_lang['stt'].'</th>
                            <th>'.$glo_lang['ma_dh'].'</th>
                            <th width="20%">'.$glo_lang['ngay_dat'].'</th>
                            <th width="20%" class="text-center">'.$glo_lang['cart_thanhtien'].'</th>
                          </tr>';
                          
                            $stt = 0;
                            while ($rows = mysql_fetch_assoc($nd_kietxuat)) {
                              $stt++;
                              $soluong  = explode(",", $rows['soluong']);
                              $dongia   = explode(",", $rows['dongia']);
                              $is_key     = explode('|', $rows['is_key']);

                              $thanhtien = 0;
                              $soluong_num = count($soluong);
                              for ($i=0; $i < $soluong_num; $i++) { 
                                $thanhtien += $soluong[$i] * $dongia[$i];
                              }
         
                          echo '<tr>
                              <td class="text-center" title="'.$glo_lang['stt'].'">
                                '.$stt.'
                              </td>
                              <td title="'.$glo_lang['ma_dh'].'">
                                <p><span style="color: red; float: left; margin-right: 5px;"><a class="cur is_red" onclick="LOAD_chitiet_dh(\''.$full_url."/load_chi_tiet_dh/".'\',\''.$rows['id'].'\')">'.$rows['madh'].'</a></span>
                                '.TRANGTHAI_donhang($rows['trangthai'], $glo_lang).'</p>';
                                // <p class="thanhtoan">'.($rows['thanh_toan'] == 0 ? $glo_lang['don_hang_chua_duoc_thanh_toan'] : $glo_lang['don_hang_da_thanh_toan']).'</p>
                                // <p class="p_xemchitiet"><a class="cur" onclick="LOAD_chitiet_dh(\''.$full_url."/load_chi_tiet_dh/".'\',\''.$rows['id'].'\')"><i class="fa fa-angle-double-right" ></i>'.$glo_lang['chi_tiet_don_hang'].'</a></p>
                              echo '</td>
                              <td title="'.$glo_lang['ngay_dat'].'">'.date('d-m-Y H:i', $rows['ngaydat']).'</td>
                              <td title="'.$glo_lang['cart_thanhtien'].'" class="text-center">'.NUMBER_format($thanhtien).' '.$glo_lang['dvt'].'</td>
                            </tr>';
                           } 
                          echo '</tbody>
                        </table> 
                      </div>
                      <div class="clr"></div> 
                    </div>
                    </div>';
                  }
        ?>
        <div class="clr"></div>
        <div class="nums no_box">
          <ul>
            <?=PHANTRANG($pzer, $sotrang, $full_url."/".$motty, $_SERVER['QUERY_STRING']) ?>
          </ul>
          <div class="clr"></div>
        </div>
        <?php } ?>
      </div>
      <div class="dv-load-hd-js-new dv-load-hd-js"></div>
      
      <script>
        function LOAD_search_dh(url, id){
          $(".dv-load-hd-js-new").html('<img src="images/loadernew.gif" alt="" style="height: 30px; padding: 0 5px;">');
          $.ajax({
            type: "POST",
            url: url,
            data: {"madh": $(".cls_madh_s").val(), "email": $(".cls_email_sdt").val(), "id": id},
            success: function(response)
            { 
              $(".dv-load-hd-js-new").html(response);
            }
          });
        };
        
        function LOAD_chitiet_dh(url, madh) {
          $(".dv-load-hd-js-new").html('<img src="images/loadernew.gif" alt="" style="height: 30px; padding: 0 5px;">');
          $.ajax({
            type: "POST",
            url: url,
            data: {"madh": madh},
            success: function(response)
            { 
              $(".dv-load-hd-js-new").html(response);
            }
          });
        }
      </script>
    </ul>
  </div>
  <!--  -->
</div>

