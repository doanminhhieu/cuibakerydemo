
<footer id="footer">
 <div class="footer_bottom">
        <div class="container">
            <ul class="no_style list_footer_bottom cl">
                <li class="col_ft_bt">
                    <h2 class="title_footer">Củi Babkery</h2>
                    <ul class="contact_ft no_style">
					 	<li class="adress_ft">78 Hùng Vương, Phường 9, Đà Lạt</li>
					 	<li class="phone_ft">0918.036.835</li>
					 	<li class="mail_ft">cuibakery@gmail.com</li>
					</ul>
                </li>
                <li class="col_ft_bt">
                    <h2 class="title_footer">Link nhanh </h2>

                    <ul class="list_ft no_style">
                        <li><a href="http://localhost/cuicake/lien-he">Liên hệ</a></li>
                        <li><a href="http://localhost/cuicake/mau-banh-kem-da-lat">Sản phẩm</a></li>
                        <li><a href="#">Quyền và Nghĩa vụ người mua</a></li>
                        <li><a href="#">Hình thức thanh toán</a></li>
                    </ul>
                </li>
                <li class="col_ft_bt">
                    <h2 class="title_footer">Liên hệ ngay</h2>
                  	<p class="note">Gửi sđt cho chúng tôi để được tư vấn và đặt bánh thôi nào !</p>
                  	<div class="box_buy_online box_ft_online ">
	                  	<form action="" class="formBox no_box" method="post" accept-charset="UTF-8" name="formnamecontact3" id="formnamecontact3">
						  <input type="hidden" name="send_lienhe">
						  <input type="hidden" class="lang_ok" value="<?=$glo_lang['yeu_cau_cua_ban_da_duoc_gui'] ?>">
						 

						    <div class="phone">
						      <input type="hidden" name="s_dienthoai_s" value="<?=base64_encode($glo_lang['so_dien_thoai']) ?>">
						      <input class="cls_data_check_form_3" data-rong="1"  name="s_dienthoai" id="s_dienthoai" type="text" placeholder="<?=$glo_lang['so_dien_thoai'] ?> (*)" value="<?=!empty($_POST['s_dienthoai']) ? $_POST['s_dienthoai'] : @$sodienthoai ?>" onFocus="if (this.value == '<?=$glo_lang['so_dien_thoai'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['so_dien_thoai'] ?> (*)';}" data-name="<?=$glo_lang['so_dien_thoai'] ?> (*)" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>" data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>"/>
						    </div>

						   
						       <div class="code">
							      <span style="line-height: 0;padding-right: 0;"><img src="<?=$full_url."/load-capcha/" ?>" alt="CAPTCHA code" style="height: 40px;
								    width: auto;
								    cursor: pointer;
								    position: relative;
								    top: 8px;
								    right: 0px; " onclick="$(this).attr('src','<?=$full_url."/load-capcha/" ?>')" class="img_contact_cap"><i class="fa fa-refresh" style="position: absolute; right: 3px; bottom: 3px; font-size: 10px; color: #f29409;" onclick="$('#formnamecontact3 .img_contact_cap').attr('src','<?=$full_url."/load-capcha/" ?>')"></i></span>
							      <input class="cls_data_check_form_3" data-rong="1" name="mabaove" class="mabaove" type="text" placeholder="<?=$glo_lang['ma_bao_ve'] ?> (*)" value="" onFocus="if (this.value == '<?=$glo_lang['ma_bao_ve'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['ma_bao_ve'] ?> (*)';}" data-msso="<?=$glo_lang['vui_long_nhap_ma_bao_ve'] ?>"/>
							    </div>
						    
						    <a onclick="RefreshFormMailContact(formnamecontact3)" style="cursor:pointer" class="button"><?=$glo_lang['lam_lai']  ?></a>
						    <a onclick="return CHECK_send_lienhe('<?=$full_url ?>/','#formnamecontact3', '.cls_data_check_form_3')" style="cursor:pointer" class="button"><?=$glo_lang['gui']  ?> <img src="images/loading2.gif" class="ajax_img_loading"></a>   
						</form>
					</div>
                </li>
                <li class="col_ft_bt">
                    <div class="fb-page" data-href="https://www.facebook.com/CUIBAKERYDALAT/" data-tabs="timeline" data-width="" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/CUIBAKERYDALAT/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/CUIBAKERYDALAT/">Củi Bakery - Tiệm bánh kem sinh nhật Đà Lạt</a></blockquote></div>

                </li>
            </ul>
        </div>
    </div>
    <div class="copyright <?=isset($home_footer)?"home_footer":""?>">
    	<div class="container">
            <p>© Bản quyền thuộc về thuộc về cuibakery.com</p>
		 </div>	    	
	</div>
</footer>

<a class="scrollup " style="display: inline;">
    <div class="gradient_bg tap_top">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </div>
</a>

<?php include _source."hotline.php"; ?>

<!-- 
    <p><?=$glo_lang['dang_online'] ?>: <?=number_format($online_tv) ?> | <?=$glo_lang['tong_view'] ?>: <?=number_format($thongke_tv) ?></p>
</div> -->