<form action="" class="formBox no_box" method="post" accept-charset="UTF-8" name="formnamecontact2" id="formnamecontact2">
  <input type="hidden" name="send_lienhe">
  <input type="hidden" class="lang_ok" value="<?=$glo_lang['yeu_cau_cua_ban_da_duoc_gui'] ?>">
  <input type="hidden" class="lang_false" value="<?=$glo_lang['nhap_ma_bao_ve_chua_dung'] ?>">
  <input type="hidden" name="tieude_lienhe" value="<?=!empty($thongtin_lienhe) ? $thongtin_lienhe : base64_encode($glo_lang['thongtin_lienhe']) ?>">
  <div class="left">
    <li class="name">
      <input type="hidden" name="s_fullname_s" value="<?=base64_encode($glo_lang['ho_va_ten']) ?>">
      <input class="cls_data_check_form" data-rong="1" name="s_fullname" id="s_fullname" type="text" placeholder="<?=$glo_lang['ho_va_ten'] ?> (*)" value="<?=!empty($_POST['s_fullname']) ? $_POST['s_fullname'] : @$hoten ?>" onFocus="if (this.value == '<?=$glo_lang['ho_va_ten'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['ho_va_ten'] ?> (*)';}" data-name="<?=$glo_lang['ho_va_ten'] ?> (*)" data-msso="<?=$glo_lang['nhap_ho_ten'] ?>"/>
    </li>
    <li class="phone">
      <input type="hidden" name="s_dienthoai_s" value="<?=base64_encode($glo_lang['so_dien_thoai']) ?>">
      <input class="cls_data_check_form" data-rong="1"  name="s_dienthoai" id="s_dienthoai" type="text" placeholder="<?=$glo_lang['so_dien_thoai'] ?> (*)" value="<?=!empty($_POST['s_dienthoai']) ? $_POST['s_dienthoai'] : @$sodienthoai ?>" onFocus="if (this.value == '<?=$glo_lang['so_dien_thoai'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['so_dien_thoai'] ?> (*)';}" data-name="<?=$glo_lang['so_dien_thoai'] ?> (*)" data-msso="<?=$glo_lang['nhap_so_dien_thoai'] ?>" data-msso1="<?=$glo_lang['so_dien_thoai_khong_hop_le'] ?>"/>
    </li>
    <li class="mail">
      <input type="hidden" name="s_email_s" value="<?=base64_encode($glo_lang['email']) ?>">
      <input class="cls_data_check_form" data-rong="1" data-email="1" name="s_email" id="s_email" type="text" placeholder="<?=$glo_lang['email'] ?> (*)" value="<?=!empty($_POST['s_email']) ? $_POST['s_email'] : @$email  ?>" onFocus="if (this.value == '<?=$glo_lang['email'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['email'] ?> (*)';}" data-msso="<?=$glo_lang['chua_nhap_dia_chi_email'] ?>" data-msso1="<?=$glo_lang['dia_chi_email_khong_hop_le'] ?>"/>
    </li>
    <li class="local">
      <input type="hidden" name="s_address_s" value="<?=base64_encode($glo_lang['dia_chi']) ?>">
      <input name="s_address" id="s_address" type="text" placeholder="<?=$glo_lang['dia_chi'] ?>" value="<?=!empty($_POST['s_address']) ? $_POST['s_address'] : @$diachi ?>" onFocus="if (this.value == '<?=$glo_lang['dia_chi'] ?>'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['dia_chi'] ?>';}"/>
    </li>
    
    <li class="subject">
      <input type="hidden" name="s_title_s" value="<?=base64_encode($glo_lang['tieu_de']) ?>">
      <input  name="s_title" id="s_title" type="text" placeholder="<?=$glo_lang['tieu_de'] ?>" value="<?=!empty($_POST['s_title']) ? $_POST['s_title'] : '' ?>" onFocus="if (this.value == '<?=$glo_lang['tieu_de'] ?>'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['tieu_de'] ?>';}" data-name="<?=$glo_lang['tieu_de'] ?>" data-msso="<?=$glo_lang['nhap_tieu_de'] ?>"/>
    </li>
  </div>
  <div class="right">
    
    <li class="mess">
      <input type="hidden" name="s_message_s" value="<?=base64_encode($glo_lang['noi_dung_lien_he']) ?>">
       <textarea class="cls_data_check_form" data-rong="1" name="s_message" id="s_message" cols="" rows="" placeholder="<?=$glo_lang['noi_dung_lien_he'] ?>  (*)" data-msso="<?=$glo_lang['nhap_noi_dung'] ?>"><?=!empty($_POST['s_message']) ? $_POST['s_message'] : '' ?></textarea>
       <div class="clr"></div>
    </li>
    <li class="code">
      <span style="line-height: 0;padding-right: 0;"><img src="<?=$full_url."/load-capcha/" ?>" alt="CAPTCHA code" style="height: 41px; width: auto; cursor: pointer; position: relative; top: 2px; right: 2px;" onclick="$(this).attr('src','<?=$full_url."/load-capcha/" ?>')" id="img_contact_cap"><i class="fa fa-refresh" style="position: absolute; right: 3px; bottom: 3px; font-size: 10px; color: #666;" onclick="$('#img_contact_cap').attr('src','<?=$full_url."/load-capcha/" ?>')"></i></span>
      <input class="cls_data_check_form" data-rong="1" name="mabaove" id="mabaove" type="text" placeholder="<?=$glo_lang['ma_bao_ve'] ?> (*)" value="" onFocus="if (this.value == '<?=$glo_lang['ma_bao_ve'] ?> (*)'){this.value='';}" onBlur="if (this.value == '') {this.value='<?=$glo_lang['ma_bao_ve'] ?> (*)';}" data-msso="<?=$glo_lang['vui_long_nhap_ma_bao_ve'] ?>"/>
    </li>
    <p class="require_pc" style="color:red;"><?=$glo_lang['thong_tin_bat_buoc'] ?></p>
    <a onclick="RefreshFormMailContact(formnamecontact2)" style="cursor:pointer" class="button"><?=$glo_lang['lam_lai']  ?></a>
    <a onclick="return CHECK_send_lienhe('<?=$full_url ?>/','#formnamecontact2', '.cls_data_check_form')" style="cursor:pointer" class="button"><?=$glo_lang['gui']  ?> <img src="images/loading2.gif" class="ajax_img_loading"></a>   
  </div>
  <div class="clr"></div>
</form>
