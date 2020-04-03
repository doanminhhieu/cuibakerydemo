<?php 
  $arr_running = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '".$_GET['id']."' AND `showhi` = 1 AND `step` = 2 LIMIT 1");
  if(mysql_num_rows($arr_running)){
    $arr_running = mysql_fetch_assoc($arr_running);
?>
<div class="dv-muangay">
	<div class="box_popup_sp">
	  <div class="images_popup"><img src="<?=checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>"></div>
	  <div class="chitiet_popup no_box">
	    <div class="titile_page_2" style="    margin-left: 0;
	    margin-right: 0;"><?=$glo_lang['dang_ky_mua_online'] ?></div>
	    <!--  -->
		<form action="" class="formBox no_box" method="post" accept-charset="UTF-8" name="formnamecontact2" id="formnamecontact2">
			<input type="hidden" name="send_lienhe">
			<input type="hidden" class="lang_ok" value="<?=$glo_lang['yeu_cau_cua_ban_da_duoc_gui'] ?>">
			<input type="hidden" class="lang_false" value="<?=$glo_lang['nhap_ma_bao_ve_chua_dung'] ?>">
			<input type="hidden" name="tieude_lienhe" value="<?= base64_encode($glo_lang['mua_online']) ?>">

			<input type="hidden" name="s_fullname_s" value="<?=base64_encode($glo_lang['ho_va_ten']) ?>">
			<input class="cls_data_check_form form-control" data-rong="1" name="s_fullname" id="s_fullname" type="text" placeholder="<?=$glo_lang['ho_va_ten'] ?> (*)" data-name="<?=$glo_lang['ho_va_ten'] ?> (*)" data-msso="<?=$glo_lang['nhap_ho_ten'] ?>"/>

			<input type="hidden" name="s_dienthoai_s" value="<?=base64_encode($glo_lang['so_dien_thoai']) ?>">
			<input class="cls_data_check_form form-control" data-rong="1"  name="s_dienthoai" id="s_dienthoai" type="text" placeholder="<?=$glo_lang['so_dien_thoai'] ?> (*)"  data-name="<?=$glo_lang['so_dien_thoai'] ?> (*)" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>" data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>"/>

			<input type="hidden" name="s_email_s" value="<?=base64_encode($glo_lang['email']) ?>">
			<input class="cls_data_check_form form-control" data-rong="1" data-email="1" name="s_email" id="s_email" type="text" placeholder="<?=$glo_lang['email'] ?> (*)" data-msso="<?=$glo_lang['chua_nhap_dia_chi_email'] ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>"/>

			<input type="hidden" name="s_message_s" value="<?=base64_encode($glo_lang['ghi_chu_cua_quy_khach']) ?>">

			<input class="cls_data_check_form form-control" data-rong="1" name="s_message" id="s_message" type="text" placeholder="<?=$glo_lang['ghi_chu_cua_quy_khach'] ?> (*)" data-msso="<?=$glo_lang['nhap_ghi_chu'] ?>" />
			<input type="hidden" name="s_title_s" value="<?=base64_encode($glo_lang['cart_ten_sp']) ?>">
			<input  name="s_title" id="s_title" type="hidden" value="<?=$arr_running['tenbaiviet_'.$lang] ?>"/>
			
			<input type="hidden" name="capcha_hd" value="<?=$_SESSION['cap'] = md5(time()) ?>">

			<a onclick="return CHECK_send_lienhe('<?=$full_url ?>/','#formnamecontact2', '.cls_data_check_form')" style="cursor:pointer" class="button"><?=$glo_lang['dang_ky_ngay']  ?> <img src="images/loading2.gif" class="ajax_img_loading"></a>

		  <div class="clr"></div>
		</form>
	    <!--  -->

	  </div>
	  <div class="clr"></div>
	</div>
</div>
<?php } ?>