<?php


  $kietxuat_name = DB_fet("*", "#_danhmuc", "`showhi` = 1 AND `step` = '".$slug_step."' AND `id` = '".$arr_running['id_parent']."'", "`id` DESC", 1, "arr", 1);
  if(empty($kietxuat_name)) 
    $kietxuat_name = $thongtin_step['tenbaiviet_'.$lang];
  else
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_'.$lang];

  $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);

  $wh           = "  AND `id_parent` in (".$lay_all_kx.") AND `id` <>  '".$arr_running['id']."'";
  $numview      = 7;

  $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh ORDER BY `catasort` DESC LIMIT 0,$numview");

  $img_bg = checkImage($fullpath, $thongtin_step['icon'], $thongtin_step['duongdantin']);
 
  if($arr_running['icon_hover'] != "") {
    $img_bg = checkImage($fullpath, $arr_running['icon_hover'], $arr_running['duongdantin']);
  }
?>

<div class="breadcrumb-agile" style="background: url(<?=full_src($thongtin_step, '') ?>) no-repeat top center fixed;background-size: cover;">
    <div class="container">
         <h1 class="title_h1"><?=$kietxuat_name ?></h1>
     </div>
</div>
<div class="box_breadcrumb_agile">
    <div class="container">
        <ul class="bread_link no_style" style="margin-left: 0;">
            <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/') ?></li>
        </ul>
    </div>
</div>

<div class="content_page_child"> 
    <div class="container">
        <div class="title_news title_news_line">
          <h2><?=SHOW_text($arr_running['tenbaiviet_'.$_SESSION['lang']]) ?></h2>
        </div>
        <div class="content_detail content_detail_table">
          <div class="dv-top-hd">
            <span><?=$glo_lang['chon_ngay'] ?> </span>
            <label>
              <input type="text" placeholder="dd/mm/YYYY" class="js_day datepicker">
              <button type="button" onclick="seach_lichday('<?=$arr_running['id'] ?>')">
                <i class="fa fa-search"></i>
                <img src="images/loading2.gif" alt="" class="show_lichhoc_img">
              </button>
            </label>
            <h3><?=str_replace("[name]", SHOW_text($arr_running['tenbaiviet_'.$lang]), $glo_lang['lich_day_cua']) ?></h3>
            <div class="clr"></div>
          </div>
          <!--  -->
          <?php
            $ngay_now   = date("d/m/Y", time());
            $ngay_now   = explode("/", $ngay_now);
            $ngay_time  = mktime(0,0,0,$ngay_now[1],$ngay_now[0],$ngay_now[2]);
            
            // 
            $thu_trong_tuan = jddayofweek(cal_to_jd(CAL_GREGORIAN,$ngay_now[1],$ngay_now[0],$ngay_now[2]),0);
            
            if($thu_trong_tuan == 0) {
              $tam            = 6; 
            }
            else {
              $tam            = $thu_trong_tuan - 1; 
            }

            $ngaythuhai     = strtotime(date("Y-m-d", $ngay_time) . " -$tam days"); 
            $ngaythuhai_day = date("d-m-Y",$ngaythuhai);
            $ngaythuhai_day = explode("-", $ngaythuhai_day);
            $ngay_thu_hai_time = mktime(0,0,0,$ngaythuhai_day[1],$ngaythuhai_day[0],$ngaythuhai_day[2]);
          ?>
          <!--  -->
          <div class="dv-js-load-table">
            <table>
              <tr>
                <td rowspan="2"><?=$glo_lang['moc_thoi_gian'] ?></td>
                <td><?=$glo_lang['thu_hai'] ?></td>
                <td><?=$glo_lang['thu_ba'] ?></td>
                <td><?=$glo_lang['thu_tu'] ?></td>
                <td><?=$glo_lang['thu_nam'] ?></td>
                <td><?=$glo_lang['thu_sau'] ?></td>
                <td><?=$glo_lang['thu_bay'] ?></td>
                <td><?=$glo_lang['chu_nhat'] ?></td>
              </tr>
              <tr>
              <?php 
                $lich_day    = DB_que("SELECT * FROM `#_lichday` WHERE `id_parent` = '".$arr_running['id']."' AND `showhi` = 1");
                $arr_check   = array();
                while ($rows = mysql_fetch_assoc($lich_day)) {
                  array_push($arr_check, $rows['id_parent']."-".$rows['is_time']."-".$rows['is_ngay']);
                }

                for ($i=2; $i <=8 ; $i++) { 
                  $now_date     = date("d-m-Y",strtotime(date("Y-m-d", $ngay_thu_hai_time) . " +".($i-2)." days"));
                  $now_date_ar  = explode("-", $now_date);

                  ${"ngay_".$i} = mktime(0,0,0,$now_date_ar[1],$now_date_ar[0],$now_date_ar[2]);
                   
              ?>
              <td><?=$now_date ?></td>
              <?php } ?>
              </tr>
              <?php 
                for ($j=8; $j < 20; $j++) {  
              ?>
              <tr>
                <td><?=$j.":00 - ".($j + 1).":00" ?></td>
                <?php 
                  for ($i=2; $i <=8 ; $i++) { 
                    $check_num_1  = $arr_running['id']."-".$j."-".${"ngay_".$i};
                    $check_num_2  = $arr_running['id']."-".$j."-".$i;
                ?>
                <td>
                  <?=in_array($check_num_1, $arr_check) || in_array($check_num_2, $arr_check) ? '<i class="fa fa-check"></i>' : "" ?>
                </td>
                <?php } ?>
              </tr>
              <?php } ?>
            </table>
          </div>
          <div style="padding-bottom: 10px">
            <?=SHOW_text($arr_running['noidung_'.$_SESSION['lang']]) ?><div class="clr"></div>
          </div>
        </div>
        <div id="sharelink">
          <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
        </div>
        <div class="dv-fb_coment">
          <?php include _source."fb_coment.php"; ?>
        </div>
    </div>
</div>
<script src="js/jquery-ui.js?v=2"></script>
<link rel="stylesheet" href="css/jquery-ui.css?v=2">
<script>
  $('.datepicker').attr('autocomplete','off');
  $(".datepicker").each(function(){
      $(this).datepicker({
        autoclose: true,
        changeMonth: true,
        changeYear: true,
        format: 'dd/mm/yyyy'
      });
    });
  
  function seach_lichday(id){
    var day = $(".js_day").val();
    if(day == "") {
      $(".js_day").focus();
      return false;
    }
    $(".show_lichhoc_img").show();
    $.ajax({
        type: "POST",
        url: full_url +"/seach_lichday/",
        data: {"day" : day, "id" : id},
        success: function(response)
        {
          $(".show_lichhoc_img").hide();
          $(".dv-js-load-table").html(response);
        }
    });
  }
</script>