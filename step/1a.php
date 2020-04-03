<?php 
	if($motty 	== "404"){
		$nd_404 		 = DB_fet_rd("*","`#_seo_name` "," `id` = 1 ","",1);
  	$arr_running = reset($nd_404);
  		// $bre 				= SHOW_text($arr_running['tenbaiviet_'.$_SESSION['lang']]);
	}

  $bre  = SHOW_text($arr_running['tenbaiviet_'.$lang]);
	if(empty($thongtin_step)){
		$thongtin_step['id'] = 1;
  }
  else {
    $bre =  '<a href="'.GET_link($full_url, SHOW_text($thongtin_step['seo_name'])).'">'.$thongtin_step['tenbaiviet_'.$lang].'</a>';
  }
	$thongtin_step   = LAY_anhstep_now($thongtin_step['id']);

  // $img_bg = checkImage($fullpath, $thongtin_step['icon'], $thongtin_step['duongdantin']);
  
  // if($arr_running['icon_hover'] != "") {
  //   $img_bg = checkImage($fullpath, $arr_running['icon_hover'], $arr_running['duongdantin']);
  // }
// full_src($thongtin_step, '')
?>
<!-- <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span><i class="fa fa-angle-right"></i></span><a <?=full_href($arr_running) ?>><?=$arr_running['tenbaiviet_'.$lang] ?></a></li> -->
<div class="link_title" style="background-image:url(<?=full_src($thongtin_step, '') ?>);">
  <div class="pagewrap">
    <h3><?= SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h3>
    <ul>
      <li><i class="fa fa-home"></i><a href="<?=$full_url ?>"><?=$glo_lang['trang_chu'] ?></a><span>/</span><a <?=full_href($arr_running) ?>><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></a></li>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<?php
  if(!empty($slug_step)){
  $baiviet = LAY_baiviet($slug_step);
  if(count($baiviet) > 1) {
?>
<div id="pro_tabs">
  <div class="box_tab">
    <ul class="listtabs">
      <?php foreach ($baiviet as $rows) { ?>
      <li><a <?=full_href($rows) ?> class="<?=$rows['id'] == $arr_running['id'] ? "selected" : "" ?>"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></li>
      <?php } ?>
      <div class="clr"></div>
    </ul>
  </div>
</div>
<?php }} ?>
<div class="pagewrap page_conten_page">
  <div class="padding_pagewrap">
     <!--  -->
      <div class="showText">
        <?php
          $nd   = SHOW_text($arr_running['noidung_'.$_SESSION['lang']]);
          if($motty   == "404"){
            $nd = str_replace('[tencongty]', $thongtin['tenbaiviet_'.$lang], $nd);
          }
          echo $nd;
        ?><div class="clr"></div>
      </div>
      <!--  -->
      <?php if($motty   == "404"){ ?>
      <div class="dv_404_gohome">
          <a href="<?=$full_url ?>"><?=$glo_lang['ve_trang_chu'] ?> <span class="time_doi"></span></a>
      </div>
      <script type="text/javascript">
          var time_doi = 11;
          setInterval(function(){ time_doi--; $('.time_doi').html("("+time_doi+")"); if(time_doi < 1) window.location.href = '<?=$full_url ?>' }, 1000);
      </script>
      <?php }else if($slug_step != 3){ ?>
      <div id="sharelink">
        <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
      </div>
      <div class="dv-fb_coment">
        <?php include _source."fb_coment.php"; ?>
      </div>
      <?php } ?>
      <!--  -->
  </div>
</div>