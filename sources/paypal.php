<?php
    $thongtin_paypal        = DB_que("SELECT * FROM `#_ship_thanhtoan_setup` LIMIT 1");
    $thongtin_paypal        = mysql_fetch_assoc($thongtin_paypal);

    $paypal_url             = $thongtin_paypal['url_paypal'];//'https://www.sandbox.paypal.com/cgi-bin/webscr';
    $merchant_email         = $thongtin_paypal['email_paypal'];//'trunghieu220994-buyer-2@gmail.com';
    $cancel_return          = $full_url."/paypal-false/";
    $success_return         = $full_url."/paypal-success/";

    // echo '<pre>';
    // var_dump($_REQUEST);
    // linhhuynhpa2@gmail.com
    // linhhuynhpa2
    //if($motty == "dat-hang"){ 
?>
<style>
    .dv-paypal {display: none; width: 200px; height: 100px; position: fixed; z-index: 999999; top: 50%; left: 50%; padding: 15px; text-align: center; background: #fff; box-shadow: 0 0 20px rgb(107, 107, 107); margin-top: -50px; margin-left: -100px; border-radius: 7px; }
    .dv-paypal img { height: 100px; }
    .dv-paypal-cont {display: none; position: fixed; top: 0; left: 0; z-index: 99999; background: rgba(0, 0, 0, 0.4);  width: 100%; height: 100%; }
</style>
<div class="dv-paypal-cont"></div>
<div class="dv-paypal">
    <img src="images/animated-paypal-loading.gif" alt="">
</div>
<form name="myform" action="<?=$paypal_url ?>" method="post" id="paypal_form_new">
    <input type="hidden" name="business" value="<?=$merchant_email ?>"/>
    <input type="hidden" name="cancel_return" value="<?=$cancel_return ?>"/>
    <input type="hidden" name="return" value="<?=$success_return ?>"/>
    <input type="hidden" name="rm" value="2"/>
    <input type="hidden" name="lc" value=""/>
    <input type="hidden" name="no_shipping" value="1"/>
    <input type="hidden" name="no_note" value="1"/>
    <input type="hidden" name="currency_code" value="USD"/>
    <input type="hidden" name="page_style" value="paypal"/>
    <input type="hidden" name="charset" value="utf-8"/>
    <input type="hidden" name="item_name" value="" class="ma_donhang_paypal"/>
    <input type="hidden" name="cbt" value="cbt"/>
    <input type="hidden" value="_xclick" name="cmd"/>
    <input type="hidden" name="amount" value="0" class="num_price_paypal"/>
    <input type="submit" name="submit" value="" class="paypal_form_new">
</form>
<script>
    function TIEN_paypal(num, iddh){
        var tile  = <?=!empty($thongtin_paypal['ti_le_paypal']) && is_numeric($thongtin_paypal['ti_le_paypal']) ? $thongtin_paypal['ti_le_paypal'] : 1 ?>;
        var price = parseFloat(num / tile);
            price = Math.round(price * 100) / 100;
        $(".num_price_paypal").val(price);
        $(".ma_donhang_paypal").val(iddh);
    }
</script>
