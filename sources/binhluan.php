<?php 
  //
  if(isset($_POST['btn_dangbinhluan'])) {
  // if(isset($_POST['btn_dangbinhluan']) && isset($_SESSION['id'])) {
    if($_SESSION['capmd5'] == $_POST['checkcapbl'] || $_SESSION['capmd6'] == $_POST['checkcapbl_new']) {
      $noidung_bl = isset($_POST['noidung_bl']) ? $_POST['noidung_bl'] : "";
      $tenbinhluan_bl = isset($_POST['tenbinhluan_bl']) ? $_POST['tenbinhluan_bl'] : "";
      $loai_binhluan = isset($_POST['loai_binhluan']) ? $_POST['loai_binhluan'] : 0;
      if($noidung_bl != "") {
        $data = array();
        $data['id_sp']      = $arr_running['id'];
        $data['ip_gui']     = GET_ip();
        $data['uid']        = @!empty($_SESSION['id']) ? $_SESSION['id'] : 0;
        $data['tenbaiviet_vi'] = $tenbinhluan_bl;
        $data['noidung_vi'] = strip_tags($noidung_bl);
        $data['loai_binhluan'] = strip_tags($loai_binhluan);
        $data['showhi']     = 1;
        $data['ngay_dang']  = time();
        $data['id_parent']  = isset($_POST['id_parent']) ? $_POST['id_parent'] : 0;


        ACTION_db($data, "#_binhluan", "add", NULL);
        ALERT_js($glo_lang['binh_luan_da_duoc_gui']);
        LOCATION_js($full_url."/".$motty."/");
        exit();
      }
    }
  }
  
  //
    $numview              = 10;
    $pzer                 = 1;
    $vi_tri               = PHANTRANG_start($pzer, $numview);
    $pzz                  = 0;

    $nd_kietxuat_bl = DB_que("SELECT * FROM `#_binhluan` WHERE `showhi` =  1 AND `id_sp` = '".$arr_running['id']."' AND `id_parent` = 0   AND `loai_binhluan` = 0 ORDER BY `id` DESC LIMIT $vi_tri,$numview");
    $nd_total    = DB_que("SELECT * FROM `#_binhluan` WHERE `showhi` =  1 AND `id_sp` = '".$arr_running['id']."' AND `id_parent` = 0  AND `loai_binhluan` = 0 ");

    $numlist     = @mysql_num_rows($nd_total);
    $numshow     = ceil($numlist / $numview);
    $sotrang     = PHANTRANG_findPages($numlist, $numview);

    $numlist_list    = DB_que("SELECT `id` FROM `#_binhluan` WHERE `showhi` =  1 AND `id_sp` = '".$arr_running['id']."'");
    $numlist_list    = mysql_num_rows($numlist_list);
  ?>
<div class="box_view_more" id="danhgia_nhatxer">
      <div class="titile_page_id">
        <ul>
          <h3><?=$glo_lang['danh_gia_nhan_xet'] ?></h3>
          <div class="clr"></div>
        </ul>
      </div>
      <div class="page_more">
        <div class="danhgia_tringbinh"> <span class="heading"><?=$glo_lang['danh_gia_trung_binh'] ?></span>
          <p>
            <?php
                $dtb = str_replace("[diem]", $arr_running['num_1'], $glo_lang['trung_binh_diem_danh_gia']);
                $dtb = str_replace("[luot]", $arr_running['num_2'], $dtb);
                echo $dtb;

                $nam_sao     = 0;
                $nam_sao_sao = 0;

                $bon_sao     = 0;
                $bon_sao_sao = 0;

                $ba_sao     = 0;
                $ba_sao_sao = 0;

                $hai_sao     = 0;
                $hai_sao_sao = 0;

                $mot_sao     = 0;
                $mot_sao_sao = 0;
                $chitiet_sao = DB_que("SELECT * FROM `#_baiviet_sao` WHERE `id_baiviet` = '".$arr_running['id']."' LIMIT 1");
                if(mysql_num_rows($chitiet_sao)) {
                  $chitiet_sao = mysql_fetch_assoc($chitiet_sao);
                  $nam_sao     = number_format($chitiet_sao['sao_5']);
                  $nam_sao_sao = $chitiet_sao['sao_5'] / $arr_running['num_2'] * 100;

                  $bon_sao     = number_format($chitiet_sao['sao_4']);
                  $bon_sao_sao = $chitiet_sao['sao_4'] / $arr_running['num_2'] * 100;

                  $ba_sao     = number_format($chitiet_sao['sao_3']);
                  $ba_sao_sao = $chitiet_sao['sao_3'] / $arr_running['num_2'] * 100;

                  $hai_sao     = number_format($chitiet_sao['sao_2']);
                  $hai_sao_sao = $chitiet_sao['sao_2'] / $arr_running['num_2'] * 100;

                  $mot_sao     = number_format($chitiet_sao['sao_1']);
                  $mot_sao_sao = $chitiet_sao['sao_1'] / $arr_running['num_2'] * 100;
                }
              ?>
          </p>
        </div>
        <div class="row">
          <div class="side">
            <div>5 <?=$glo_lang['sao'] ?></div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-5" style="width: <?=$nam_sao_sao ?>%"></div>
            </div>
          </div>
          <div class="side right">
            <div><?=$nam_sao ?></div>
          </div>
          <div class="side">
            <div>4 <?=$glo_lang['sao'] ?></div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-4" style="width: <?=$bon_sao_sao ?>%"></div>
            </div>
          </div>
          <div class="side right">
            <div><?=$bon_sao ?></div>
          </div>
          <div class="side">
            <div>3 <?=$glo_lang['sao'] ?></div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-3" style="width: <?=$ba_sao_sao ?>%"></div>
            </div>
          </div>
          <div class="side right">
            <div><?=$ba_sao ?></div>
          </div>
          <div class="side">
            <div>2 <?=$glo_lang['sao'] ?></div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-2" style="width: <?=$hai_sao_sao ?>%"></div>
            </div>
          </div>
          <div class="side right">
            <div><?=$hai_sao ?></div>
          </div>
          <div class="side">
            <div>1 <?=$glo_lang['sao'] ?></div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-1" style="width: <?=$mot_sao_sao ?>%"></div>
            </div>
          </div>
          <div class="side right">
            <div><?=$mot_sao ?></div>
          </div>
        </div>
        <div class="comment_pro">
          <h2><?=$glo_lang['khach_hang_nhan_xet'] ?></h2>
          <div class="dv-js-binhluan dv-js-binhluan-0">
          <?php 
            while ($rows = mysql_fetch_assoc($nd_kietxuat_bl)) {
          ?>
          <ul>
            <li><a><?=substr(strip_tags($rows['tenbaiviet_vi']),0, 1) ?></a></li>
            <h3><a><?=SHOW_text(strip_tags($rows['tenbaiviet_vi'])) ?></a></h3>
            <h4><?=CHECK_phut($rows['ngay_dang'], $glo_lang) ?></h4>
            <div class="clr"></div>
            <p><?=SHOW_text(strip_tags($rows['noidung_vi'])) ?></p>
          </ul>
          <?php } ?>
        </div>

        </div>
        <?php if($numlist > $numview){ ?>
          <div class="button_readmore">
            <a class='cur' onclick="LOAD_ajax_binhluan('<?=$full_url ?>/load-binhluan/','<?=$numlist ?>','<?=$numview ?>', 0, '<?=$arr_running['id'] ?>', 0)"><?=$glo_lang['doc_them_binh_luan'] ?><img src="images/loading2.gif" class="ajax_img_loading"></a> 
          </div>
        <?php } ?>

        <div class="boxComment_danhgia">
          <form action="" method="post">
            <h3><?=$glo_lang['gui_nhan_xet_cua_ban'] ?></h3>
            <li><?=$glo_lang['danh_gia_sp_nay'] ?>: <p style="display: inline-block;"><?= GET_sao_sp($arr_running['num_1'], $arr_running['num_2'], $arr_running['id']) ?></p></li>
            <li><?=$glo_lang['tieu_de_cua_nhan_xet'] ?> (*):</li>
            <div class="col-md-1 row-frm">
              <input type="text" name="tenbinhluan_bl" class="form-control js_check_null_1" placeholder="<?=$glo_lang['tieu_de'] ?>">
            </div>
            <li><?=$glo_lang['viet_nhan_xet'] ?> (*):</li>
            <div class="col-md row-frm">
              <textarea class="form-control js_check_null_2" name="noidung_bl" style="height:80px; padding-top:15px;" placeholder="<?=$glo_lang['viet_danh_gia'] ?>"></textarea>
              <h4>
                <input type="hidden" name="loai_binhluan" value="0">
                <button type="submit" class="dangbt_btn" name="btn_dangbinhluan" onclick="return check_nhanxet('.js_check_null_1', '.js_check_null_2')"><?=$glo_lang['dang_binh_luan'] ?></button>
                <input type="hidden" name="checkcapbl" value="<?=$_SESSION['capmd5'] =  md5(time()) ?>">
              </h4>
              <div class="clr"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="box_view_more" id="hoi_dap">
      <div class="titile_page_id">
        <ul>
          <h3><?=$glo_lang['hoi_dap'] ?></h3>
          <div class="clr"></div>
        </ul>
      </div>
      <div class="page_more js_replyall">
        <div class="boxComment_danhgia">
          <h3><?=$glo_lang['gui_cau_hoi_cua_ban'] ?></h3>
          <div class="col-md row-frm ">
            <form action="" method="post">
              <input type="text" name="tenbinhluan_bl" class="js_tenbinhluan_bl form-control js_check_null_4" placeholder="<?=$glo_lang['ho_va_ten'] ?>" style="margin-bottom: 10px">
              <textarea class="form-control js_check_null_3" name="noidung_bl" style="height:80px; padding-top:15px;" placeholder="<?=$glo_lang['viet_binh_luan_cua_ban'] ?>"></textarea>
              <input type="hidden" name="loai_binhluan" value="1">
              <input type="hidden" name="id_parent" class="js_id_parent" value="0">
              <input type="hidden" name="checkcapbl_new" value="<?=$_SESSION['capmd6'] =  md5(time()) ?>">
              <h4>
                <button type="submit" class="dangbt_btn" name="btn_dangbinhluan" onclick="return check_nhanxet('.js_check_null_4', '.js_check_null_3')"><?=$glo_lang['gui_cau_hoi'] ?></button>
              </h4>
            </form>
            <div class="clr"></div>
          </div>
        </div>
        <div class="dv-js-binhluan-1">
          <?php
            $nd_kietxuat_bl = DB_que("SELECT * FROM `#_binhluan` WHERE `showhi` =  1 AND `id_sp` = '".$arr_running['id']."' AND `id_parent` = 0   AND `loai_binhluan` = 1 ORDER BY `id` DESC LIMIT $vi_tri,$numview");
            $nd_total    = DB_que("SELECT * FROM `#_binhluan` WHERE `showhi` =  1 AND `id_sp` = '".$arr_running['id']."' AND `id_parent` = 0  AND `loai_binhluan` = 1 ");

            $numlist     = @mysql_num_rows($nd_total);
            $numshow     = ceil($numlist / $numview);
            $sotrang     = PHANTRANG_findPages($numlist, $numview);

              while ($rows = mysql_fetch_assoc($nd_kietxuat_bl)) {
            ?>
          <div class="box_dg_ch">
            <div class="name_coment">
              <li><?=substr(strip_tags($rows['tenbaiviet_vi']),0, 1) ?></li>
              <ul>
                <h3><?=SHOW_text(strip_tags($rows['tenbaiviet_vi'])) ?><span><?=CHECK_phut($rows['ngay_dang'], $glo_lang) ?></span></h3>
                <p><?=SHOW_text(strip_tags($rows['noidung_vi'])) ?></p>
                <?php if(!empty($_SESSION['luluwebproadmin'])){ ?>
                <h4><a class="cur" onclick="$('.js_id_parent').val('<?=$rows['id'] ?>');$('.js_tenbinhluan_bl').val('Admin'); GOTO_sport('.js_replyall')"><?=$glo_lang['tra_loi'] ?></a></h4>
                <?php } ?>
              </ul>
              <div class="clr"></div>
            </div>
            <?php
              $nd_kietxuat_bl_child = DB_que("SELECT * FROM `#_binhluan` WHERE `showhi` =  1 AND `id_sp` = '".$arr_running['id']."' AND `id_parent` = '".$rows['id']."'   AND `loai_binhluan` = 1 ORDER BY `id` ASC");
              while ($rows_2 = mysql_fetch_assoc($nd_kietxuat_bl_child)) {
            ?>
            <div class="box_admin_cm">
              <div class="name_coment name_coment_2">
                <li class="admin_images"><?=substr(strip_tags($rows_2['tenbaiviet_vi']),0, 1) ?></li>
                <ul>
                  <h3><?=SHOW_text(strip_tags($rows_2['tenbaiviet_vi'])) ?> <span><?=CHECK_phut($rows_2['ngay_dang'], $glo_lang) ?></span></h3>
                  <p><?=SHOW_text(strip_tags($rows_2['noidung_vi'])) ?></p>
                </ul>
                <div class="clr"></div>
              </div>
            </div>
            <?php } ?>
          </div>
          <?php } ?>
          <?php if($numlist > $numview){ ?>
            <div class="button_readmore">
              <a class='cur' onclick="LOAD_ajax_binhluan('<?=$full_url ?>/load-binhluan/','<?=$numlist ?>','<?=$numview ?>', 0, '<?=$arr_running['id'] ?>', 1)"><?=$glo_lang['doc_them_binh_luan'] ?><img src="images/loading2.gif" class="ajax_img_loading"></a> 
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

<script>
  function check_nhanxet(cls1, cls2) {
    if($(cls1).val() == '') {
      $(cls1).focus();
      return false;
    }
    if($(cls2).val() == '') {
      $(cls2).focus();
      return false;
    }
    return true;
  }
</script>