<?php 
    $bre = isset($_GET['view']) ? $glo_lang['chi_tiet_don_hang'] :  $glo_lang['kiem_tra_don_hang'];
    if(empty($thongtin_step)){
      $thongtin_step['id'] = 1;
    }
    $thongtin_step   = LAY_anhstep_now($thongtin_step['id']);
    $bre  = $glo_lang['thong_tin_don_hang'];
?>
<div class="page_conten_page">
  <div class="pagewrap">
    <div class="link_page">
        <ul>
          <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span>/</span><a><?=$bre ?></a></li>
          <div class="clr"></div>
        </ul>
    </div>
    <div class="titile_page">
      <ul>
        <h3><?=$bre ?></h3>
        <div class="clr"></div>
      </ul>
    </div>
    <div class="dv-thongtin-donhang">
      <!--  -->
      <div class="kiemtra_donhang no_box">
        <!--  -->
        <?php
            $madh         = isset($_GET['view']) ? $_GET['view'] : "";
            $nd_kietxuat  = DB_que("SELECT * FROM `#_order` WHERE `id` = '".$madh."' LIMIT 1");
            if(!mysql_num_rows($nd_kietxuat)){
              echo $glo_lang['ma_dh_khong_ton_tai'];
            }
            else {
              $nd_kietxuat  = mysql_fetch_assoc($nd_kietxuat);

              echo '<div class="dv-table-reposive dv-thongtin-thanhtoan">
                      <table class="tb-thongtin-tv tb-bg-fff" border="1" cellspacing="0" cellpadding="4" style="width:100%; border-collapse: collapse; font-family:Tahoma; font-size:11px;text-align: center;" bordercolor="#cccccc">
                        <tbody>
                          <tr>
                            <td colspan="3" style="width:160px; font-size: 13px">'.$glo_lang['ma_dh'].'</td>
                            <td colspan="4" width="400"><span style="display:block; padding-left:5px; font-size: 13px">'.$nd_kietxuat['madh'].'</span></td>
                          </tr>
                          <tr><td colspan="3" style="width:160px; font-size: 13px">'.$glo_lang['thanh_toan'].'</td>
                            <td colspan="4" width="400"><span style="display:block; padding-left:5px; font-size: 13px">'.($nd_kietxuat['thanh_toan'] == 0 ? $glo_lang['don_hang_chua_duoc_thanh_toan'] : $glo_lang['don_hang_da_thanh_toan']).'<p style="line-height: 1; font-size: 10px; margin-bottom: 10px; color: #dc0c0c;">'.$nd_kietxuat['ma_paypal'].'</p></span></td>
                          </tr>
                        </tbody>
                      </table>
                      '.$nd_kietxuat['thongtin_thanhtoan'].'
                    </div>';
            }
        ?>
        <!--  -->
      </div>
      <!--  -->
    </div>
  </div>
</div>