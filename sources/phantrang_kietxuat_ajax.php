<?php 
    $page           = isset($_POST['page']) ? $_POST['page'] : "";
    $list_check_now = $list_check = isset($_POST['list_check']) ? $_POST['list_check'] : "";
    $list_check_pri = isset($_POST['list_check_pri']) ? $_POST['list_check_pri'] : "";
    $cls_idprsp     = isset($_POST['cls_idprsp']) ? $_POST['cls_idprsp'] : "";
    $tnn_pri_dm     = isset($_POST['tnn_pri_dm']) ? $_POST['tnn_pri_dm'] : "";
    $is_sapxep      = isset($_POST['is_sapxep']) ? $_POST['is_sapxep'] : "";
    $js_danhmuc     = isset($_POST['js_danhmuc']) ? $_POST['js_danhmuc'] : 0;
    $js_search      = isset($_POST['js_search']) ? $_POST['js_search'] : 0;
    $js_key         = isset($_POST['js_key']) ? $_POST['js_key'] : "";
    $th             = isset($_POST['th']) ? $_POST['th'] : 0;


    $step       = 2;
    $numview    = 12;
 
    $pzer                   = is_numeric($page) ? $page : 1;

    $vi_tri                 = PHANTRANG_start($pzer, $numview);
    if ($pzer               == 1 || $pzer == NULL) 
        $pzz                = 0;
    else $pzz               = $pzer * $numview;
    // list tinh nang loai tru
    $list_re     = "";
    $tinhnang_rm = DB_fet("*","`#_baiviet_tinhnang`","`id_parent` = 5","`id` DESC","","arr");
    foreach ($tinhnang_rm as $rows) {
      $list_re   .= $list_re != "" ? ",".$rows['id'] : $rows['id']; 
    }
    //
    //,1,2,3,4,5,
    //
    $wh     = "";
    if($list_check != "") { 
      $list_check  = str_replace("-", ",", $list_check);

      // load tn
 
      $list_check   = trim($list_check,",");
      $list_check   = ",".$list_check.",";

      if($list_re != "") {
        $list_re_arr  = explode(",", $list_re);
        foreach ($list_re_arr as $reis) {
          if($reis != "") {
            $list_check = str_replace(",$reis,", "", $list_check);
            $list_check = trim($list_check, ",");
            $list_check = ",$list_check,";
          }
          
        }
      }
      
      $list_check   = trim($list_check, ",");
      $tn           = $list_check;
      //
      if($tn != "") {
        $tn_arr = explode(",", $list_check);
        $tn_arr = count($tn_arr);

   
        $list_id_tn_sp = DB_que("SELECT * FROM `#_baiviet_select_tinhnang`  WHERE `id_val` IN ($tn) GROUP by `id_baiviet` HAVING count(*) >= $tn_arr");
        $list_id_sp    = "0";
        while ($rows   = mysql_fetch_assoc($list_id_tn_sp)) {
          $list_id_sp    .= $list_id_sp    == "" ? $rows['id_baiviet'] : ",".$rows['id_baiviet'];
        }

        if($list_id_sp != "") {
          $wh .= " AND `id` IN (".$list_id_sp.")  ";
        }
      }
      
    }
    //tim theo dm chon
    if($tnn_pri_dm != "") {
      $wh .= " AND `id_parent` IN (".$tnn_pri_dm.")  ";
    }
 
    //tim theo gia
    if($list_check_pri != "") {

      $list_nhomgia     = DB_fet("*","#_lien_ket_nhanh","`id` IN ($list_check_pri)","`catasort` ASC","", "arr");
      $wh_or            = "";
      foreach ($list_nhomgia as $rows) {
        $wc     = " (`giatien` >= '".$rows['gia_min']."'";
        if($rows['gia_max'] > 0) {
          $wc  .= " AND `giatien` <= '".$rows['gia_max']."'";
        }
        $wc    .= ") ";
        $wh_or .= $wh_or == "" ? $wc  : " OR ". $wc ;
      }
      $wh      .= $wh_or != "" ? " AND ($wh_or) " : "";

    }
    if($js_search == 1) {
      $wh .= "  AND (`tenbaiviet_vi` LIKE '%$js_key%' OR `tenbaiviet_en` LIKE '%$js_key%' OR `p1` LIKE '%$js_key%')"; 
    }
    //
    if($cls_idprsp != 0 || $js_danhmuc != 0){
      if($js_danhmuc != 0) {
        $lay_all_kx = LAYDANHSACH_idkietxuat($js_danhmuc, $step);
      }
      else {
        $lay_all_kx = LAYDANHSACH_idkietxuat($cls_idprsp, $step);
      }
      $wh .= "  AND `id_parent` in (".$lay_all_kx.") "; 
    }

    //sap xep
    $order_by = "";
    if($is_sapxep != "") {
      if($is_sapxep == 1) $order_by = "`soluotxem` DESC,";
      else if($is_sapxep == 2) $order_by = "`opt2` DESC,";
      else if($is_sapxep == 3) $order_by = "`giatien` ASC,";
      else if($is_sapxep == 4) $order_by = "`giatien` DESC,";
    }
    //opt2
    if($th > 0) {
      $wh .= " AND `id` IN (SELECT `id_baiviet` FROM `#_baiviet_select_tinhnang` WHERE `id_val` = '".$th."' AND `show` = 1) ";
      $name_titile = DB_que("SELECT * FROM `#_baiviet_tinhnang` WHERE `id` = '".$th."' LIMIT 1");
      $name_titile = mysql_result($name_titile, 0, "tenbaiviet_".$lang);
    }
    $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` = '$step' $wh ORDER BY  $order_by `catasort` DESC, `id` DESC LIMIT $vi_tri,$numview");
  
    $nd_total    = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` = '$step' $wh");

    $nd_total        = @mysql_num_rows($nd_total);
    $numshow        = ceil($nd_total / $numview);
    $sotrang        = PHANTRANG_findPages($nd_total, $numview);

    // $quatang_sp    = LAY_baiviet(14, 0, "`opt1` = 1", '', 'id');
?>
<div class="pro_home_id_2 pro_home_id_2_ds box_padding flex ">
  <?php 
      if($nd_total == 0){
          echo "<div class='dv-notfull'>".$glo_lang['khong_tim_thay_du_lieu_nao']."</div>";
      }else{
        while ($rows = mysql_fetch_assoc($nd_kietxuat)) { 
          $gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
      ?>
      <ul>
        <!-- <?=$gia['pt'] != 0 ? '<div class="discount-tag">-'.$gia['pt']."%</div>" : "" ?> -->
        <a <?=full_href($rows) ?>>
          <li><img src="<?=full_src($rows) ?>" alt=""></li>
          <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
          <h4><?=$gia['text_gia'].$gia['text_km'] ?></h4>
        </a>
        <div class="view_more_pro">
          <div class="clolum_id"><a class="cur p_yeuthich p_yeuthich_<?=$rows['id'] ?>" onclick="ADD_yeuthich(this, <?=$rows['id'] ?>)" data="0"><i class="fa fa-heart-o" ></i></a></div>
          <div class="clolum_id"><a <?=full_href($rows) ?>><i class="fa fa-eye" ></i></a></div>
          <div class="clolum_id"><a href="<?=$full_url."/gio-hang/?id=".$rows['id'] ?>" ><i class="fa fa-cart-plus" ></i></a></div>
          <div class="clr"></div>
        </div>
      </ul>
    <?php }} ?>
  <div class="clr"></div>
</div>

<div class="nums no_box">
  <ul>
    <?=PHANTRANG_ajax($pzer, $sotrang, $list_check) ?>
  </ul>
  <div class="clr"></div>
</div> 