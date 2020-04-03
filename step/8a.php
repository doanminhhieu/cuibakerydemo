<?php
  $kietxuat_name = DB_fet("*", "#_danhmuc", "`showhi` = 1 AND `step` = '".$slug_step."' AND `id` = '".$arr_running['id_parent']."'", "`id` DESC", 1, "arr", 1);
  if(empty($kietxuat_name)) 
    $kietxuat_name = $thongtin_step['tenbaiviet_'.$lang];
  else
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_'.$lang];

  if($slug_table == 'step'){
      $lay_all_kx = LAYDANHSACH_idkietxuat(0, $slug_step);
  }
  else{
      $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);
  }

  $wh = " AND `id` <> '".$arr_running['id']."' ";
  $numview = 6;
  $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh ORDER BY `catasort` DESC LIMIT 0,$numview");

?>
<?php include _source."left_menu.php";?>
<div class="right_home">
  <div class="conten_page">
    <div class="titile_page"><?=$kietxuat_name ?></div>
    <div class="box_video_left">
      <div class="video_view">
        <li>
          <div id="video-hls">Please wait...</div>
          <script src="js/jwplayer.js"></script>
          <?php 
            $link_news      = @GET_ID_youtube($arr_running['p1']);
            if($link_news  != "") {
              $link_news = "https://www.youtube.com/watch?v=".$link_news;
            }
            else {
              $link_news = $arr_running['p1'];
              if($_SESSION['sub_demo_check']){
                $link_news = str_replace($_SESSION['sub_demo'], "", $link_news);  
              }
            }

            if($arr_running['opt_km'] == 1) {
              $link_news = $fullpath."/datafiles/files/".$arr_running['dowload'];  
            }
          ?>
          <script type="text/javascript">
            $(function(){
              jwplayer("video-hls").setup({
                width: "100%",
                height : "500px",
                androidhls:true,
                primary: "html5",
                // mute: true,
                autostart: true,
                events:{
                  onComplete: function() {
                      auto_play_video();
                  }
                },
                autostart: true,
                playlist: [
                {
                  file :'<?=$link_news ?>',
                  image: "",
                }]
              });
              jwplayer("video-hls").play();
            })
          </script>
          <script>
            function auto_play_video() {
              if(!$(".js_check_auto_play").is(":checked")) return false;
              if($(".ajax_auto_play_video").length != 0) {
                if($(".ajax_auto_play_video.play").lengh == 0) {
                  $(".ajax_auto_play_video").addClass("play");
                }
                $(".ajax_auto_play_video").removeClass("acti");
                var id = $(".ajax_auto_play_video.play").eq(0).attr("data");
                $(".ajax_auto_play_video.play").eq(0).addClass("acti");
                $(".ajax_auto_play_video.play").eq(0).removeClass("play");

              }
              jwplayer("video-hls").load([{
                file: id,
                image: ''
              }]);
              jwplayer().play();
            }
          </script>
        </li>
        <ul>
          <h3><?=SHOW_text($arr_running['tenbaiviet_'.$lang]) ?></h3>
          <p><i class="fa fa-eye"></i><?=number_format($arr_running['soluotxem']) ?> <?=$glo_lang['luot_xem'] ?><i class="fa fa-calendar-check-o"></i><?=date("d/m/Y", $arr_running['ngaydang']) ?></p>
          <div id="sharelink">
            <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
          </div>
        </ul>
      </div>
      <div class="showText">
        <?=SHOW_text($arr_running['noidung_'.$_SESSION['lang']]) ?><div class="clr"></div>
      </div>
      <div class="dv-fb_coment">
        <?php include _source."fb_coment.php"; ?>
      </div>
    </div>
    <div class="box_video_right">
      <div class="dv-video-quangcao">
        <?php 
          $banner_top = LAY_banner_new("`id_parent` = 26");
          foreach ($banner_top as $rows) {
        ?>
        <a <?=full_href($rows) ?>><img src="<?=full_src($rows, '') ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"></a>
        <?php } ?>
      </div>
      <div class="dv-tieotheo">
        <h3><?=$glo_lang['tiep_theo'] ?></h3>
        <h4>
          <?=$glo_lang['tu_dong_phat'] ?>
          <label>
            <input type="checkbox" class="js_check_auto_play">
            <span><a></a></span>
          </label>
        </h4>
        <div class="clr"></div>
      </div>
      <?php
        $step_video = LAY_baiviet(2, 10, "", "RAND()");
        foreach ($step_video as $rows) {
          $link_news      = @GET_ID_youtube($rows['p1']);
          if($link_news  != "") {
            $link_news = "https://www.youtube.com/watch?v=".$link_news;
          }
          else {
            $link_news = $rows['p1'];
            if($_SESSION['sub_demo_check']){
              $link_news = str_replace($_SESSION['sub_demo'], "", $link_news);  
            }
          }

          if($rows['opt_km'] == 1) {
            $link_news = $fullpath."/datafiles/files/".$rows['dowload'];  
          }
      ?>
      <div class="list_video ajax_auto_play_video play" data="<?=$link_news ?>">
        <a <?=full_href($rows) ?> >
          <li><img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"/></li>
          <ul>
            <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
            <p><i class="fa fa-eye" aria-hidden="true"></i><?=number_format($rows['soluotxem']) ?> <span><?=$glo_lang['luot_xem'] ?></span></p>
            <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?=date("d/m/Y", $rows['ngaydang']) ?></p>
          </ul>
        </a>
        <div class="clr"></div>
      </div>
      <?php } ?>
      <div class="clr"></div>
      
    </div>
    <div class="clr"></div>
  </div>
</div>
