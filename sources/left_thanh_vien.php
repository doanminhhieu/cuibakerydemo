<ul>
  <?php if(!empty($_SESSION['id'])){ ?>
  <li>
    <a href="<?=$full_url."/tai-khoan/" ?>"><?=$glo_lang['thong_tin_ca_nhan'] ?></a>
  </li>
  <li>
    <a href="<?=$full_url."/doi-mat-khau/" ?>"><?=$glo_lang['doi_mat_khau'] ?></a>
  </li>
  <li>
    <a href="<?=$full_url."/danh-sach-bai-dang/" ?>"><?=$glo_lang['dan_sach_bai_dang'] ?></a>
  </li>
  <li>
    <a href="<?=$full_url."/thoat/" ?>"><?=$glo_lang['thoat'] ?></a>
  </li>
  <?php }else { ?>
  <li>
    <a href="<?=$full_url ?>"><?=$glo_lang['ve_trang_chu'] ?></a>
  </li>
  <?php } ?>
</ul>