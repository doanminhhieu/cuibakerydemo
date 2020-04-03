<?php

  $name = $motty == "paypal-success" ? $glo_lang['thong_tin_thanh_toan'] : $glo_lang['chi_tiet_don_hang'];
  $id   = !empty($_REQUEST['item_name']) ? $_REQUEST['item_name'] : 0;


  if(empty($_REQUEST)) {
    LOCATION_js($full_url);
    exit();
  }

  DB_que("UPDATE `#_order` SET `thanh_toan` = 1, `ma_paypal` = '".$_REQUEST['payer_id']."'  WHERE `id` = '".$_REQUEST['item_name']."' LIMIT 1");

  $lay_dh = DB_que("SELECT * FROM `#_order` WHERE `id` = '".$_REQUEST['item_name']."' LIMIT 1");
  LOCATION_js($full_url."/thong-tin-don-hang/?view=".mysql_result($lay_dh, 0, "id"));
  exit();
?>
