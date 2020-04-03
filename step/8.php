<?php
  if((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
      $numview          = 12;
  else $numview         = $thongtin_step['num_view'];

  $key       = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
  $is_search = isset($_GET['key']) ? true : false;

  $name_titile      = !empty($arr_running['tenbaiviet_'.$lang]) ? SHOW_text($arr_running['tenbaiviet_'.$lang]) : "";
  $wh               = "";
  $wh_goto_ex       = "";
  if($is_search){
    $name_titile    = $glo_lang['tim_kiem']; 
    $wh .= " AND (`tenbaiviet_".$lang."` LIKE '%".$key."%')";
    $slug_step      = 2;

    $wh_goto_ex     .= "key|==|$key>>>";
  }
  else if($motty    == 'thinh-hanh'){
    $wh .= " AND `opt2` = 1";
    $slug_step      = 2;
    $wh_goto_ex     .= "opt2|==|1>>>";
  }
  if($is_search || $motty    == 'thinh-hanh'){ 
    $thongtin_step = LAY_step($slug_step);
    $thongtin_step = reset($thongtin_step);

    if((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
      $numview          = 12;
    else $numview         = $thongtin_step['num_view'];
  }
  


  include _source."phantrang_kietxuat.php";

  
?>
<?php include _source."left_menu.php";?>
<div class="right_home">
  <div class="conten_page">
    <?php if(!$is_search){ ?>
    <div class="video_tinh">
        <li>
          <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/nQ7neIwFEvM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
          <div id="video-hls">Please wait...</div>
        </li>
        <ul>
         <?php include _source."banner_top.php";?>
        </ul>
        <div class="clr"></div>
    </div>
    <script src="js/jwplayer.js"></script>
    <?php 
      $top_video      = LAY_baiviet($slug_step, 1, " 1 = 1 $wh ", "`top_video` DESC");
      $top_video      = reset($top_video);
      $link_news      = @GET_ID_youtube($top_video['p1']);
      if($link_news  != "") {
        $link_news = "https://www.youtube.com/watch?v=".$link_news;
      }
      else {
        $link_news = $top_video['p1'];
        if($_SESSION['sub_demo_check']){
          $link_news = str_replace($_SESSION['sub_demo'], "", $link_news);  
        }
      }

      if($top_video['opt_km'] == 1) {
        $link_news = $fullpath."/datafiles/files/".$top_video['dowload'];  
      }
    ?>
    <script type="text/javascript">
      $(function(){
        jwplayer("video-hls").setup({
          width: "100%",
          height : "350px",
          androidhls:true,
          primary: "html5",
          autostart: true,
          playlist: [
          {
            file :'<?=$link_news ?>',
            image: "",
          }]
        });
        // jwplayer("video-hls").play();
      })
    </script>
    <?php } ?>
    <div class="titile_page"><?=$name_titile ?></div>
    <div class="pro_id pro_id_load_js_video dv-danhsachpto flex">
      <?php 
        if($nd_total == 0){
          echo "<div class='dv-notfull'>".$glo_lang['khong_tim_thay_du_lieu_nao']."</div>";
        }
        else{
          while ($rows = mysql_fetch_array($nd_kietxuat)) 
            { 
      ?>
      <ul>
        <a <?=full_href($rows) ?>>
        <li><?=full_img($rows) ?></li>
        <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
        <p><i class="fa fa-eye"></i><?=number_format($rows['soluotxem']) ?> <span><?=$glo_lang['luot_xem'] ?></span><i class="fa fa-calendar-check-o"></i><?=date("d/m/Y", $rows['ngaydang']) ?></p>
        </a>
      </ul>
      <?php }} ?>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="dv-img-load-js ajax_img_loading button_readmore" style="text-align: center; display: none">
      <img src="images/loader.gif" alt="" style=" height: 50px;">
    </div>
  </div>
</div>
<div class="dv-scrollTop"></div>
<div class="dv-document"></div>
<div class="dv-window"></div>
<script>
  $(document).ready(function(){
    $(window).scroll(function(){
      var cthem = 1;
      if($(document).width() < 991) cthem = 100;
        if($(window).scrollTop() + cthem >= $(document).height() - $(window).height()){
          LOAD_ajax_product('<?=$full_url."/load-products-ajax/video/" ?>', '<?=$slug_step ?>', '<?=$nd_total ?>', '<?=$numview ?>', '<?=$wh_goto_ex ?>' )
        }
    });
  });
</script>
