<?php 
    if(!defined("MOTTY")) die('???');
    $page       = isset($_POST['page']) ? $_POST['page'] : 0;
    $total      = isset($_POST['total']) ? $_POST['total'] : 0;
    $numview    = isset($_POST['numview']) ? $_POST['numview'] : 0;
    $id_par     = isset($_POST['id_par']) ? $_POST['id_par'] : 0;
    $loai     = isset($_POST['loai']) ? $_POST['loai'] : 0;
    $id_run     = !empty($_POST['id_run']) && is_numeric($_POST['id_run']) ? $_POST['id_run'] : 0;

    if(!is_numeric($numview))  $numview      = 6; 
    

    if ($page < 1)  $page = 1;
    $start = ($numview * $page) - $numview;
    $wh = "";

    if($id_run > 0){
      $wh .= " AND `id` <> ".$id_run." ";
    }

    // $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` = '".$step."' $wh ORDER BY `catasort` DESC LIMIT $start,".$numview);

    $nd_kietxuat = DB_que("SELECT * FROM `#_binhluan` WHERE `showhi` =  1 AND `id_sp` = '".$id_par."' $wh  AND `id_parent` = 0 AND `loai_binhluan` = '$loai' ORDER BY `id` DESC LIMIT $start,".$numview);

    // echo "SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` = '".$step."' $wh ORDER BY `catasort` DESC LIMIT $start,".$numview;

    $i           = 0;
    $member      = DB_fet("*","#_members","`phanquyen` = 0","","","arr",1);
    while ($rows = mysql_fetch_assoc($nd_kietxuat)) { 
    $i ++;
    if($loai == 0){
?>
<ul>
    <?php if($i == 1){ ?><div class="ajax_scron ajax_scron_0_<?=$page ?>"></div> <?php } ?>
    <li><a><?=substr(strip_tags($rows['tenbaiviet_vi']),0, 1) ?></a></li>
    <h3><a><?=SHOW_text(strip_tags($rows['tenbaiviet_vi'])) ?></a></h3>
    <h4><?=CHECK_phut($rows['ngay_dang'], $glo_lang) ?></h4>
    <div class="clr"></div>
    <p><?=SHOW_text(strip_tags($rows['noidung_vi'])) ?></p>
</ul>
<?php } else { ?>
<div class="box_dg_ch">
    <?php if($i == 1){ ?><div class="ajax_scron ajax_scron_1_<?=$page ?>"></div> <?php } ?>
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
<?php }} ?>
<?php 
    if ($total <= ($numview * $page)){
        echo '<script language="javascript">stopped = true; $(".button_readmore").hide();  </script>';
    }
?>