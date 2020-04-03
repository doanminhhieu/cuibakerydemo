<?php
  if(isset($_POST['xoa_sp']))
  {
      if(isset($_SESSION['cart'][$_POST['id_die']])) unset($_SESSION['cart'][$_POST['id_die']]);
      if(count($_SESSION['cart']) == 0) unset($_SESSION['cart']);
  } 

  if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
    $_SESSION['cart'][$_GET['id']] = 1;
    LOCATION_js($full_url."/gio-hang/");
  }

  if(isset($_POST['id'])){
    $id = isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0;
    if($id == 0) {
      LOCATION_js($full_url."/gio-hang/");
      exit();
    } 

    if(isset($_POST['qty_cart']) && is_numeric($_POST['qty_cart']) && $_POST['qty_cart'] > 0){
      $_SESSION['cart'][$_POST['id']] = $_POST['qty_cart'];
    }
    else{
      $_SESSION['cart'][$id] = 1;
    }
    if(isset($_POST['tinhnang'])) {
      $_SESSION['tinhnang'][$id] = implode(",",$_POST['tinhnang']);
    } 
    if(isset($_POST['them_vao_gio_hang'])) {
      LOCATION_js($full_url."/dat-hang/");
    }
    else {
      LOCATION_js($full_url."/gio-hang/");
    }
    exit();
  }

  // print_r($_SESSION['cart']);
  // unset($_SESSION['cart']);
 
  $thongtin_step   = LAY_anhstep_now(LAY_id_step(1));
?>

<div class="link_pageload">
  <div class="pagewrap">
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span><i class="fa fa-angle-right"></i></span><a><?=$glo_lang['gio_hang'] ?></a></li>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<div class="pagewrap page_conten_page">
  <div class="title_page_id"><?=$glo_lang['gio_hang'] ?></div>
  <div class="pro_home_box pro_home_box_2">
    <div class="padding_pagewrap">
    <!--  -->
    <div id="cart_list">
      <div class="dv-gio-hang">
      <!--  -->
        <?php 
          $link_cart = GET_link($full_url, SHOW_text(laySeoName('seo_name', '#_step', '`showhi` = 1 AND `step` = 2')));
          if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
          {
        ?>
            <div class="cart-empty"><?=$glo_lang['hien_chua_co_san_pham_nao_trong_gio_hang'] ?></div>
            <div class="continue-shopping"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?=$link_cart ?>"><?=$glo_lang['tiep_tuc_mua_hang']  ?></a></div>
        <?php
          }
          else
          { 
        ?>
        <div id="cart_list" class="tb_rps">
            <div class="dv-table-reposive dv-table-reposive-cart">
              <table width="100%" border="0" cellspacing="1" cellpadding="5">
                <tr>
                  <!-- <th class="cls_cart_mb" width="5%">STT</th> -->
                  <th><?=$glo_lang['cart_ten_sp'] ?></th>
                  <th width="10%" class="text-center"><?=$glo_lang['cart_qty'] ?></th>
                  <th width="15%" style="text-align:right"><?=$glo_lang['cart_dongia'] ?></th>
                  <th width="15%" style="text-align:right"><?=$glo_lang['cart_thanhtien'] ?></th>
                  <th width="10%" class="text-center"><?=$glo_lang['cart_thaotac'] ?></th>
                </tr>
                <?php 
                  $tongtien      = 0;
                  $stt           = 0;
                  
                  foreach ($_SESSION['cart'] as $key => $value)  { 

                    $id_sp     = $key;
                    $stt       ++;
                    $sanpham   = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` = 1 AND `id` = '".$id_sp."' LIMIT 1");
                    if(mysql_num_rows($sanpham) > 0) {
                      $sanpham    = mysql_fetch_assoc($sanpham);
                      $dongia     = check_gia_sql($id_sp, @$_SESSION['tinhnang'][$id_sp], $sanpham['giatien']);
  
                      $thanhtien  = $dongia * $value;
                      $tongtien  += $thanhtien;
                      
                      $tinhnang_arr  = @DB_fet("*","#_baiviet_tinhnang","`id` IN (".@$_SESSION['tinhnang'][$id_sp].")","`catasort` DESC","","arr");
                ?> 
                 <tr>
                    <!-- <td class="cls_cart_mb" ><?=$stt ?></td> -->
                    <td style="text-align:left" title="<?=$glo_lang['cart_ten_sp'] ?>" class="dv-anh-cart-sp">
                      <a href="<?=GET_link($full_url, SHOW_text($sanpham['seo_name'])) ?>"><img src="<?=checkImage($fullpath, $sanpham['icon'], $sanpham['duongdantin'], 'thumb_') ?>" alt="<?=SHOW_text($sanpham['tenbaiviet_'.$_SESSION['lang']]) ?>"/></a>
                      <div class="dv-anh">

                        <a href="<?=GET_link($full_url, SHOW_text($sanpham['seo_name'])) ?>"><?=SHOW_text($sanpham['tenbaiviet_'.$_SESSION['lang']]) ?></a>
                        <p><?=SHOW_text($sanpham['p1']) ?></p> 
                        
                        <p class="p_mota_cart">
                          <?php foreach ($tinhnang_arr as $tnr) {
                             echo '<span>'.$tnr['tenbaiviet_'.$lang].'</span>';
                          } ?>
                        </p>
                      </div>
                    </td>
                    <td  title="<?=$glo_lang['cart_qty'] ?>">
                      <div class="mobileqty no_box">
                        <!-- <input type='button' value='-' class='qtyminus' onclick="add_num_sp('#product-quantity-<?=$id_sp ?>',-1); updateQty_notthis('<?=$full_url."/update-qty/" ?>', '<?=$id_sp ?>');" /> -->
                        <input type='text' min="1" max="9999" name='quantity' value='<?=$value ?>' class='qty qty_is_soluong' id="product-quantity-<?=$id_sp ?>" onchange='updateQty("<?=$full_url."/update-qty/" ?>","<?=$key ?>", this)' style="width: 50px" />
                        <!-- <input type='button' value='+' class='qtyplus' onclick="add_num_sp('#product-quantity-<?=$id_sp ?>',+1); updateQty_notthis('<?=$full_url."/update-qty/" ?>', '<?=$id_sp ?>');" /> -->
                    </div>

                    </td>
                    <td style="text-align:right" title="<?=$glo_lang['cart_dongia'] ?>"><b><?=($dongia == 0) ? 0 : NUMBER_fomat($dongia)." ".$glo_lang['dvt'] ?></b></td>
                    <td style="text-align:right" title="<?=$glo_lang['cart_thanhtien'] ?>"><b><span class="td_thanhtien_<?=$key ?>"><?=($thanhtien== 0)  ? 0 : NUMBER_fomat($thanhtien) ?></span> <?=$glo_lang['dvt'] ?></b></td>
                    <td title="<?=$glo_lang['cart_thaotac'] ?>">
                      <form action="" method="post">
                        <input type="hidden" name="id_die" value="<?=$key ?>" a>
                        <button type="submit" class="pro_del" name="xoa_sp" onclick="return confirm('<?=$glo_lang['ban_that_su_muon_xoa'] ?>')"><?=$glo_lang['cart_xoa'] ?></button>
                      </form>
                    </td>
                  </tr>
                <?php  } } ?>
              </table>
            </div>
            <div class="clr"></div>
            <div class="dv-tongtien no_box">
              <input type="hidden" class="cls_datafalse" value="<?=$glo_lang['alert_dat_hang'] ?>">
              <span id="pro_sum"><?=$glo_lang['cart_tong_tien'] ?>:
              <label class='tb_tongtien'><?=($tongtien == 0) ? "0": NUMBER_fomat($tongtien)." ".$glo_lang['dvt'] ?></label>
              </span>
            </div>
            <div class="clr"></div>
            <div class="dv-btn-cart no_box formBox">
              <a href="<?=$link_cart ?>" class="pro_del button mar"><?=$glo_lang['tiep_tuc_mua_hang'] ?></a> 
              <a onclick="cap_nhat_so_luong()" class="cur button pro_del mar"><?=$glo_lang['cap_nhat_so_luong'] ?><img src="images/loading2.gif" class="ajax_img_loading"></a> 
              <a href="<?=$full_url?>/dat-hang/" class="pro_del button mar"><?=$glo_lang['gui_don_hang'] ?></a>
            </div>
          <div class="clr"></div>
        </div>
        <?php } ?>
        <!--  -->
        <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
    <!--  -->
    </div>
  </div>
</div>


<script type="text/javascript">
  $(function(){
    $(".dangky_giohang ul h3 a, .is_num_cart").html("<?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']); else echo "0"; ?>");
  })
</script>