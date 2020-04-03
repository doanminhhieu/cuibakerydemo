<?php 
    $bre = isset($_GET['view']) ? $glo_lang['chi_tiet_don_hang'] :  $glo_lang['dang_tin'];
    if(empty($thongtin_step)){
      $thongtin_step['id'] = 1;
    }
    $thongtin_step   = LAY_anhstep_now($thongtin_step['id']);
    if(empty($_SESSION['id'])) {
      LOCATION_js($full_url);
      exit();
    }
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    if(isset($_GET['del'])) {
      $sql_se     = DB_que("SELECT * FROM `#_baiviet` WHERE `id`='".$_GET['del']."' AND `id_user` = '".$_SESSION['id']."' LIMIT 1");

      if(mysql_num_rows($sql_se) > 0) {
        $icon         = @mysql_result($sql_se,0,'icon');
        $duongdantin  = @mysql_result($sql_se,0,'duongdantin');
        @unlink("./".$duongdantin."/".$icon);
        @unlink("./".$duongdantin."/thumb_".$icon);

        DB_que("DELETE FROM `#_slug` WHERE `id_bang`='".$_GET['del']."' AND `bang` = 'baiviet'");
        DB_que("DELETE FROM `#_baiviet` WHERE `id` = '".$_GET['del']."' LIMIT 1");
        DB_que("DELETE FROM `#_binhluan` WHERE `id_sp` = '".$_GET['del']."'");
        // Xóa ảnh con
        $sql_img    = DB_que("SELECT * FROM `#_baiviet_img` WHERE `id_parent` ='".$_GET['del']."'");
        if(mysql_num_rows($sql_img) > 0)
        {
          while($row = mysql_fetch_assoc($sql_img))
          {
            $p_name   = $row['p_name'];
            $path_img = $row['duongdantin'];
            @unlink("./datafiles/".$path_img."/".$p_name);
            @unlink("./datafiles/".$path_img."/thumb_".$p_name);
          }
          DB_que("DELETE FROM `#_baiviet_img` WHERE `id_parent` = '".$_GET['del']."'");;
        }
        // End xóa ảnh con        
        LOCATION_js($full_url."/quan-ly-tin/");
        exit();
      }
    }
    if($id > 0) {
      $baiviet = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '$id' AND `id_user` = '".$_SESSION['id']."' LIMIT 1");
      if(mysql_num_rows($baiviet) == 0) {
        LOCATION_js($full_url);
        exit();
      }
      $baiviet = mysql_fetch_assoc($baiviet);
      foreach ($baiviet as $key => $value) {
        ${$key} = SHOW_text($value);
      }
    }
?>
<div class="bg_link_page" style="background-image:url('<?=checkImage($fullpath, $thongtin_step['icon'], $thongtin_step['duongdantin']) ?>');">
  <div class="pagewrap">
    <ul>
      <h3></h3>
    </ul>
  </div>
</div>
<div class="link_page">
  <div class="pagewrap">
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a><?=$bre ?></a></li>
      <div class="clr"></div>
    </ul>
    <div class="clr"></div>
  </div>
</div>
<div class="page_conten_page">
  <div class="pagewrap">
    <div class="padding_pagewrap">
      <!--  -->
      <div class="dv-dangtin-cont no_box">
        <div class="dv-dangtin-rught">
          <h3><?=$glo_lang['quan_ly_tin_dang'] ?></h3>
          <div class="nd">
            <!--  -->
            <?php 
              $numview                = 20;
              $pzer                   = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

              $vi_tri                 = PHANTRANG_start($pzer, $numview);
              if ($pzer               == 1 || $pzer == NULL) 
                  $pzz                = 0;
              else $pzz               = $pzer * $numview;

 
              $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `step` = 4  AND `id_user` = '".$_SESSION['id']."' ORDER BY `catasort` DESC, `id` DESC LIMIT $vi_tri,$numview");
 
              $nd_total     = DB_que("SELECT * FROM `#_baiviet` WHERE `step` = 4 AND `id_user` = '".$_SESSION['id']."' ");

              $nd_total     = @mysql_num_rows($nd_total);
              $numshow      = ceil($nd_total / $numview);
              $sotrang      = PHANTRANG_findPages($nd_total, $numview);
            ?>
            <!--  -->
            <div class="dv-dc-group-qlt dv-dc-group-qlt-top">
              <div class="dv-isten"><?=$glo_lang['bai_dang'] ?></div>
              <div class="dv-istrangthai"><?=$glo_lang['trang_thai'] ?></div>
              <div class="dv-istacvu"><?=$glo_lang['tac_vu'] ?></div>
              <div class="clr"></div>
            </div>
            <?php 
              while ($rows = mysql_fetch_assoc($nd_kietxuat)) { 
            ?>
            <div class="dv-dc-group-qlt">
              <div class="dv-isten is<?=$rows['showhi'] == 1 ? 1 : 2 ?>">
                <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], 'thumb_') ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"/>
                <?php if($rows['showhi'] == 1){ ?>
                <a href="<?=GET_link($full_url, $rows['seo_name']) ?>" target="_blank"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
                <?php }else{ ?>
                <a><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
                <?php } ?>
                <p><?=$glo_lang['ngay_dang'].": ".date('d-m-Y', $rows['ngaydang']) ?></p>
              </div>
              <div class="dv-istrangthai is<?=$rows['showhi'] == 1 ? 1 : 2 ?>"><?=$rows['showhi'] == 1 ? $glo_lang['da_duyet'] : $glo_lang['chua_duyet'] ?></div>
              <div class="dv-istacvu">
                <a href="<?=$full_url ?>/dang-tin/?id=<?=$rows['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="<?=$full_url ?>/quan-ly-tin/?del=<?=$rows['id'] ?>" onclick="return confirm('<?=$glo_lang['ban_that_su_muon_xoa'] ?>');"><i class="fa fa-times" aria-hidden="true"></i></a>
              </div>
              <div class="clr"></div>
            </div>
            <?php } ?>
            <div class="clr"></div>
            <div class="nums nums_qltin">
              <ul>
                <?=PHANTRANG($pzer, $sotrang, $full_url."/".$motty, $_SERVER['QUERY_STRING']) ?>
              </ul>
              <div class="clr"></div>
            </div>
          </div>
        </div>
        <div class="dv-dangtin-left">
          <h3><?=$glo_lang['tai_khoan'] ?></h3>
          <ul>
            <li>
              <a href="<?=$full_url."/dang-tin/" ?>"><?=$glo_lang['dang_tin'] ?></a>
              <a href="<?=$full_url."/quan-ly-tin/" ?>"><?=$glo_lang['quan_ly_tin_dang'] ?></a>
              <a class="cur" onclick="LOAD_popup_new('<?=$full_url ?>/pa-size-child/tai-khoan/', '400px')"><?=$glo_lang['thong_tin_tai_khoan'] ?></a>
              <a class="cur" onclick="LOAD_popup_new('<?=$full_url ?>/pa-size-child/doi-mat-khau/', '400px')"><?=$glo_lang['thay_doi_mat_khau'] ?></a>
              <a href="<?=$full_url ?>/kiem-tra-don-hang/?id=<?=$_SESSION['id'] ?>"><?=$glo_lang['lich_su_mua_hang'] ?></a>
            </li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
      <!--  -->
    </div>
  </div>
</div> 